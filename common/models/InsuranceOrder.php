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
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "cdc_insurance_order".
 *
 * @property string $id
 * @property string $order_sn
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
 * @property integer $created_at
 * @property integer $updated_at
 */
class InsuranceOrder extends \yii\db\ActiveRecord
{
    public $transaction;
    public $errorMsg;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'cost', 'status', 'created_at', 'updated_at'], 'integer'],
            [['order_sn'], 'string', 'max' => 100],
            [['user', 'sex', 'nation', 'licence', 'phone', 'car', 'company'], 'string', 'max' => 50],
            [['order_sn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_sn' => '订单号',
            'type' => '订单类型',
            'user' => '下单用户',
            'sex' => '性别',
            'nation' => '民族',
            'licence' => '身份证号',
            'phone' => '联系电话',
            'car' => '投保车辆',
            'company' => '承保公司',
            'insurance' => '险种',
            'element' => '要素',
            'cost' => '价格',
            'status' => '订单状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /*
     * 订单列表
     */
    public static function getOrder($member_id, $size = 0, $pageSize = 0, $status = 0)
    {
        if ($status ==0 ) {
            $list = InsuranceDetail::find()->select('car_id, order_id, created_at')
                ->where(['member_id'=> $member_id])
                ->orderBy(['created_at' => SORT_DESC])
                ->limit($size)
                ->offset($pageSize)
                ->asArray()
                ->all();
        } else {
            $list = InsuranceDetail::find()->select('car_id, order_id, created_at')
                ->where(['member_id'=> $member_id])
                ->orderBy(['created_at' => SORT_DESC])
                ->asArray()
                ->all();
        }


        if(!isset($list) || empty($list)){
            return null;
        }
        foreach ($list as &$v) {
            $v['car'] = self::getNames($v['order_id'])->car;
            $v['user'] = self::getNames($v['order_id'])->user;
            $v['phone'] = self::getNames($v['order_id'])->phone;
            $v['type'] = self::getNames($v['order_id'])->type;
            $v['action'] = Helper::getInsAction($v['order_id']);
        }
        return $list;
    }

    /*
     * 订单详情
     */
    public function getDetail($data)
    {
        //订单详情
        $str = 'order_sn, car, type, created_at, cost';
        $detail = InsuranceOrder::find()->select($str)->asArray()
            ->where(['id'=>$data['order_id']])
            ->one();
        $detail['typeName'] = Helper::getType($detail['type']);
        $detail['created_at'] = date('Y-m-d H:i',$detail['created_at']);

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
        } elseif ($actEnd['status'] == 99 || $actEnd['status'] == 100) {
            $top = '已完成';
        } else {
            $top = '处理中';
        }
        //按钮状态
        if ($actEnd['status'] == 1) {
            $buttonStatus = 1;
        } elseif ($actEnd['status'] == 97) {
            $buttonStatus = 2;
        } else {
            $buttonStatus = 3;
        }
        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getInsuranceStatus($v['status']);
        }

        //保险信息
        $ins = InsuranceOrder::findOne(['id'=>$data['order_id']]);

        $person = ['user'=>$ins->user, 'licence'=>$ins->licence];
        $company = $ins->company;
        $element = InsuranceElement::find()->select('insurance, element, deduction')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->all();
        $insurance = ['person'=>$person, 'company'=>$company, 'element'=>$element];
        $detail = ['act'=>$act, 'detail'=>$detail, 'topStatus'=>$top];

        $all = ['type'=>6, 'buttonStatus'=>$buttonStatus, 'order_id'=>$data['order_id'], 'order'=>$detail, 'insurance'=>$insurance];
        return $all;
    }

    /*
     * 全部动态详情
     */
    public function getMany($data)
    {
        $act = ActInsurance::find()->select('id, status, info, user, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getInsuranceStatus($v['status'], $v['info']);
            $img = InsuranceActimg::find()->select('img_path')->where(['act_id'=> $v['id']])->asArray()->all();
            $actImg = [];
            foreach ($img as & $vv) {
                $actImg[] = Yii::$app->params['img_domain'].$vv['img_path'];
            }
            $v['img_path'] = $actImg;
        }
        return $act;
    }

    /*
     * 跳转之前
     */
    public function getInfo($data ,$member=null)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }
        $model= Member::findOne(['id'=>$member_id]);
        if (!isset($model) || empty($model)) {
            $this->errorMsg = '未实名认证';
            return false;
        }

        $phone = $model->phone;
        $typeNum = $model->type;
        if ($typeNum == 1) {
            $typeName = '个人用户';
        } else {
            $typeName = '组织用户';
        }
        $type = ['typeNum'=>$typeNum, 'typeName'=>$typeName];
        $person = Identification::find()->select('name, sex, nation, licence')
            ->where(['member_id'=>$member_id])
            ->asArray()
            ->one();
        //个人车辆信息
        $car = Car::find()->select('id, license_number')
            ->where(['member_id'=> $member_id])
            ->orderBy(['stick' => SORT_DESC, 'created_at' => SORT_DESC])
            ->asArray()
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
    public function addOrder($data, $member=null, $port)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
            $userId = '';
        } else {
            $userId = $member['user']['id'];
            $member_id = $data['member_id'];
        }

        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            //生成订单快照
            $order_id = $this->createOrderSnapshoot($data, $member_id);
            if ($order_id == false) {
                $this->errorMsg = '订单快照创建失败';
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

            //生成保单
            $warrantyMolde =new Warranty();
            $warranty = $warrantyMolde->createdWarranty($data, $order_id, $member_id);
            if ($warranty == false) {
                $this->errorMsg = '保单创建失败';
                $this->transaction->rollBack();
                return false;
            }

            $this->transaction->commit();
            $orderSn = Helper::getOrder($order_id);
            $order = ['order_id'=>$order_id, 'orderSn'=>$orderSn];
            if ($port == 'member') {
                $user = Member::findOne(['id'=>$member_id]);
                $real = Identification::findOne(['member_id'=>$member_id]);
                if (!isset($real) || empty($real)) {
                    $realName = $user->phone;
                } else {
                    $realName = $real->name;
                }
                $newsA = '您的会员【'. $realName .'】创建了一个【 保险 】订单，订单号：【'. $orderSn .'】';
                $user_idA = $user->pid;
                $switch = User::findOne($user_idA);
                if ($switch->system_switch == 1) {
                    \common\components\Helper::pushServiceMessage($user_idA,$newsA,'message');
                    \common\components\Helper::pushServiceMessage($user_idA,$newsA);
                    Notice::userNews('user', $user_idA, $newsA);
                }
            } else {
                $user = User::findOne(['id'=>$userId]);
                $newsB = '您的管家【'. $user->name .'】创建了一个【 保险 】订单，订单号：【'. $orderSn .'】';
                $modelB = 'member';
                $user_idB = $member_id;
                $switch = Member::findOne($user_idB);
                if ($switch->system_switch == 1) {
                    Notice::userNews($modelB, $user_idB, $newsB);
                    \common\components\Helper::pushMemberMessage($user_idB,$newsB,'message');
                    \common\components\Helper::pushMemberMessage($user_idB,$newsB);
                }
            }

            return $order;
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }

    }

    /*
     * 取消订单
     */
    public function delOrder($data, $member)
    {
        if (!isset($member['user']['id']) || empty($member['user']['id'])) {
            $id = $member['member']['id'];
            $user = Helper::getName($member['member']['id']);
        } else {
            $id = $member['user']['id'];
            $user = User::findOne(['id'=>$id])->name;
        }
        //取消订单
        $order = ActInsurance::findOne(['order_id'=>$data['order_id']]);
        $order->status = 100;
        $order->info = '取消订单';
        $order->user_id = $id;
        $order->user = $user;
        $order->id = null;
        $order->created_at = time();
        $order->isNewRecord = 1;
        $insurance = InsuranceDetail::findOne(['order_id'=>$data['order_id']]);
        $insurance->action = '已取消';
        if ($order->save(false) && $insurance->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 确认购买
     */
    public function affirm($data,$member)
    {
        if (!isset($member['user']['id']) || empty($member['user']['id'])) {
            $id = $member['member']['id'];
            $user = Helper::getName($member['member']['id']);
        } else {
            $id = $member['user']['id'];
            $user = User::findOne(['id'=>$id])->name;
        }
        //确认购买
        $order = ActInsurance::findOne(['order_id'=>$data['order_id']]);
        $order->status = 3;
        $order->info = '确认购买';
        $order->id = null;
        $order->user_id = $id;
        $order->user = $user;
        $order->created_at = time();
        $order->isNewRecord = 1;
        $insurance = InsuranceDetail::findOne(['order_id'=>$data['order_id']]);
        $insurance->action = '已付款';
        if ($order->save(false) && $insurance->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 取消购买
     */
    public function abandon($data,$member)
    {
        if (!isset($member['user']['id']) || empty($member['user']['id'])) {
            $id = $member['member']['id'];
            $user = Helper::getName($member['member']['id']);
        } else {
            $id = $member['user']['id'];
            $user = User::findOne(['id'=>$id])->name;
        }
        //取消购买
        $order = ActInsurance::findOne(['order_id'=>$data['order_id']]);
        $order->status = 100;
        $order->info = '取消购买';
        $order->id = null;
        $order->user_id = $id;
        $order->user = $user;
        $order->created_at = time();
        $order->isNewRecord = 1;
        $insurance = InsuranceDetail::findOne(['order_id'=>$data['order_id']]);
        $insurance->action = '已取消';
        if ($order->save(false) && $insurance->save(false)) {
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
        $order->load(['formName'=>$data],'formName');
        $order->order_sn = $orderSn;
        $order->type = 6;
        $order->created_at = time();

        if ($order->save(false)) {
//            $order_id = Yii::$app->db->getLastInsertID();
            $order_id = $order->attributes['id'];
            return $order_id ? $order_id : null;
        }
        return false;
    }

    /*
     * 生成订单详情
     */
    public function createOrder($data, $order_id, $member_id)
    {
        $order = new InsuranceDetail();
        if (!isset($data['car_id']) || empty($data['car_id'])) {
            $car_id = $data->car_id;
        } else {
            $car_id = $data['car_id'];
        }
        $order->car_id = $car_id;
        $order->member_id = $member_id;
        $order->order_id = $order_id;
        $order->action = '待核保';
        $order->created_at = time();

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

        foreach ($data['insurance'] as &$v) {

            $order = new InsuranceElement();
            $order->order_id = $order_id;
            if (isset($v['id']) || !empty($v['id'])) {
                $order->insurance = Helper::getInsuranceName($v['id']);
                $order->element = Helper::getElement($v['element']);
                if (!isset($v['deduction']) || empty($v['deduction'])) {
                    $v['deduction'] = 0;
                }
                $order->deduction = Helper::getDeduction($v['deduction']);
                $order->created_at = time();
                $order->save(false);
            }
        }
        return true;
    }

    /*
     * 生成动态
     */
    public function createAct($order_id, $member_id)
    {
        $act = new ActInsurance();
        $act->user_id = $member_id;
        $act->user = Helper::getName($member_id);
        $act->order_id = $order_id;
        $act->status = 1;
        $act->info = '订单创建成功,等待核保';
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
