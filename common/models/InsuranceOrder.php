<?php

namespace common\models;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "cdc_insurance_order".
 *
 * @property string $id
 * @property string $order
 * @property integer $type
 * @property string $user
 * @property string $sex
 * @property string $nation
 * @property string $licence
 * @property string $phone
 * @property string $car
 * @property string $company
 * @property string $cost
 * @property integer $status
 * @property integer $start_at
 * @property integer $end_at
 */
class InsuranceOrder extends \yii\db\ActiveRecord
{
    public $transaction;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_insurance_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'cost', 'status', 'start_at', 'end_at'], 'integer'],
            [['order'], 'string', 'max' => 100],
            [['user', 'sex', 'nation', 'licence', 'phone', 'car', 'company'], 'string', 'max' => 50],
            [['order'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order' => 'Order',
            'type' => 'Type',
            'user' => 'User',
            'sex' => 'Sex',
            'nation' => 'Nation',
            'licence' => 'Licence',
            'phone' => 'Phone',
            'car' => 'Car',
            'company' => 'Company',
            'cost' => 'Cost',
            'status' => 'Status',
            'start_at' => 'Start At',
            'end_at' => 'End At',
        ];
    }

    /*
     * 订单列表
     */
    public static function getOrder($member_id)
    {
        $list = InsuranceDetail::find()->select('car_id, order_id, start_at')
            ->where(['member_id'=> $member_id])
            ->orderBy(['start_at' => SORT_DESC])
            ->asArray()
            ->all();

        if(!isset($list) || empty($list)){
            return null;
        }
        foreach ($list as &$v) {
            $v['car'] = self::getNames($v['order_id'])->car;
            $v['user'] = self::getNames($v['order_id'])->user;
            $v['phone'] = self::getNames($v['order_id'])->phone;
            $v['type'] = self::getNames($v['order_id'])->type;
            $v['action'] = Helper::getInsAction($v['order_id'],self::getNames($v['order_id'])->type);
        }
        return $list;
    }

    /*
     * 订单详情
     */
    public function getDetail($data)
    {
        //订单详情
        $str = 'order, car, type, start_at, end_at, cost';
        $detail = InsuranceOrder::find()->select($str)->asArray()
            ->where(['id'=>$data['order_id']])
            ->one();
        $detail['type'] = Helper::getType($detail['type']);
        $detail['start_at'] = date('Y-m-d H:i',$detail['start_at']);
        $detail['end_at'] = date('Y-m-d H:i',$detail['end_at']);

        //动态列表
        $act = ActInsurance::find()->select('status, user, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();
        //最后的动态
        $actEnd = ActInsurance::find()->select('status, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
        if ($actEnd['status'] == 1) {
            $top = '待核保';
        } elseif ($actEnd['status'] == 99) {
            $top = '已完成';
        } else {
            $top = '处理中';
        }

        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getInsuranceStatus($v['status']);
        }

        //保险信息
        $ins = InsuranceOrder::findOne(['id'=>$data['order_id']]);

        $person = ['name'=>$ins->user, 'licence'=>$ins->licence];
        $company = $ins->company;
        $element = InsuranceElement::find()->select('insurance, element, deduction')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->all();
        $insurance = ['person'=>$person, 'company'=>$company, 'element'=>$element];
        $detail = ['act'=>$act, 'detail'=>$detail, 'topStatus'=>$top];
        $all = ['order_id'=>$data['order_id'], 'order'=>$detail, 'insurance'=>$insurance];
        return $all;
    }

    /*
     * 全部动态详情
     */
    public function getMany($data)
    {
        $act = ActInsurance::find()->select('status, info, user, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getInsuranceStatus($v['status'], $v['info']);
        }
        return $act;
    }

    /*
     * 跳转之前
     */
    public function getInfo($data ,$member)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
            //TODO:id
        } else {
            $member_id = $data['member_id'];
        }
        $model= Member::findOne(['id'=>$member_id]);
        $phone = $model->phone;
        $type = $model->type;

        if ($type == 1) {
            $type = '个人用户';
        } else {
            $type = '组织用户';
        }
        $person = Identification::find()->select('name, sex, nation, licence')
            ->where(['member_id'=>$member_id])
            ->asArray()
            ->one();
        //个人车辆信息
        $car = Car::find()->select('id, license_number')
            ->where(['member_id'=> $member_id])
            ->orderBy(['stick' => SORT_DESC, 'created_at' => SORT_DESC])
            ->asArray()
            ->limit(10)
            ->all();
        //承保公司

        $company = InsuranceCompany::find()->select('id , name')
            ->asArray()
            ->all();

        $insurance = Insurance::find()->select('id , title, deduction, type')
            ->asArray()
            ->all();
        foreach ($insurance as &$v) {
            $v['element'] = $this->getElement($v['id']);
            $v['flag'] = false;
        }
        $list = ['member_id'=>$member_id, 'type'=>$type, 'phone'=>$phone, 'person'=>$person, 'car'=>$car,
            'company'=>$company, 'insurance'=>$insurance,];
        return $list;

    }

    /*
     * 添加订单
     */
    public function addOrder($data, $member)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
            //TODO:id
        } else {
            $member_id = $data['member_id'];
        }

        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            //生成订单快照
            $order_id = $this->createOrderSnapshoot($data, $member_id);
            if ($order_id == false) {
                $this->errorMsg = '订单创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //险种快照
            $insurance = $this->createInsurance($data, $order_id);
            if ($insurance == false) {
                $this->errorMsg = '险种绑定失败';
                $this->transaction->rollBack();
                return false;
            }
            //创建订单
            $orderDetail = $this->createOrder($data, $order_id, $member_id);
            if ($orderDetail == false) {
                $this->errorMsg = '订单详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //创建动态详情
            $act = $this->createAct($order_id, $member_id);
            if ($act == false) {
                $this->errorMsg = '订单动态详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            $this->transaction->commit();

            $orderSn = Helper::getOrder($order_id);
            $order = ['id'=>$order_id, 'order'=>$orderSn];
            return $order;
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }

    }

    /*
     * 取消订单
     */
    public function delOrder($data)
    {
        //取消订单
        $order = ActInsurance::findOne(['order_id'=>$data['order_id']]);
        $order->status = 100;
        $order->info = '取消';
        $order->id = null;
        $order->created_at = time();
        $order->isNewRecord = 1;
        if ($order->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 生成订单号和订单快照
     */
    public function createOrderSnapshoot($data, $member_id)
    {
        $order = new InsuranceOrder();
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');
        $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        $this->load(['formName'=>$data],'formName');
        $order->order = $orderSn;
        $order->start_at = time();

        if ($order->save(false)) {
//            $order_id = Yii::$app->db->getLastInsertID();
            $order_id = $order->attributes['id'];
            return $order_id?$order_id:null;
        }
        return false;
    }

    /*
     * 生成订单详情
     */
    public function createOrder($data, $order_id, $member_id)
    {
        $order = new InsuranceDetail();
        $order->car_id = $data['car_id'];
        $order->member_id = $member_id;
        $order->order_id = $order_id;

        if ($order->save(false)) {
            return $order?$order:null;
        }
        return false;
    }

    /*
     * 生成险种的绑定
     */
    public function createInsurance($data, $order_id)
    {
        $order = new InsuranceElement();

        foreach ($data['insurance'] as &$v) {
            $order->order_id = $order_id;
            $order->insurance = Helper::getInsuranceName($v['id']);
            $order->element = Helper::getElement($v['element']);
            $order->deduction = Helper::getDeduction($v['deduction']);
            $order->created_at = time();
            $order->save(false);
            $order = new InsuranceElement();
        }
        return true;
    }

    /*
     * 生成动态
     */
    public function createAct($order_id, $member_id)
    {
        $act = new ActDetail();
        $act->user_id = $member_id;
        $act->user = Helper::getName($member_id);
        $act->order_id = $order_id;
        $act->status = 1;
        $act->info = '待核保';
        $act->created_at = time();

        if ($act->save(false)) {
            return $act?$act:null;
        }
        return false;
    }

    /*
     * 险种要素
     */
    public function getElement($insurance_id)
    {
        $element = Element::find()->select('id , name')
            ->where(['insurance_id'=>$insurance_id])
            ->asArray()
            ->all();

        if (!isset($element) || empty($element)) {
            return null;
        }
        return $element;
    }

    /*
     * 订单列表
     * 获取信息
     */
    public static function getNames($order_id)
    {
        $names = InsuranceOrder::findOne(['id'=>$order_id]);

        return $names;
    }

}
