<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:19
 *
 */

namespace backend\models\form;


use backend\models\ActInsurance;
use backend\models\Car;
use backend\models\Identification;
use backend\models\Insurance;
use backend\models\InsuranceCompany;
use backend\models\InsuranceOrder;
use backend\models\Member;
use backend\models\InsuranceDetail;
use common\models\Company;
use common\models\Helper;
use common\models\Notice;
use common\models\Warranty;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class InsuranceOrderForm extends \common\models\InsuranceOrder
{
    public $errorMsg;
    public $transaction;
    public $member_id;
    public $car_id;
    public $company_id;
    public $element;
    public $insurance;

    public function rules()
    {
        return [
            [['type', 'user', 'member_id', 'phone', 'car', 'company', 'cost'], 'required', 'on' => ['create', 'update']]
        ];
    }


    public function scenarios()
    {
        return [
            'create' => ['order_sn', 'type', 'user', 'sex', 'nation', 'licence', '  phone', 'car', 'company', 'cost'],
            'update' => ['order_sn', 'type', 'user', 'sex', 'nation', 'licence', '  phone', 'car', 'company', 'cost'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'member_id' => '会员id',
        ]);
    }



    public static function getOne($id)
    {

    }

    public static function createInsuranceOrder($member_id)
    {
        $model = new InsuranceOrderForm();
        $member = Member::findOne($member_id);
        $model->member_id = $member_id;
        $model->user =  $member->memberInfo ? $member->memberInfo->name : '';;
        $model->phone = $member->phone;
        $model->sex = $member->memberInfo->sex;
        $model->nation = $member->memberInfo->nation;
        $model->licence = $member->memberInfo->licence;
        return $model;
    }

    public function addInsuranceOrder($data)
    {
        //$this->scenario = 'after-post-form';
        $this->transaction = Yii::$app->db->beginTransaction();
        try {
            $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');
            $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));

            $this->order_sn = $orderSn;
            $this->created_at = time();
            $this->type = 6;
            $this->car_id = $this->car;
            $this->company = InsuranceCompany::findOne($this->company)->name;
            $this->car = Car::findOne($this->car_id)->license_number;
            $this->cost = 0;
            if(!$this->save()){
                $this->errorMsg = '添加快照失败订单失败';
                $this->transaction->rollBack();
                return false;
            }

            //险种快照
            $insurance = $this->createInsurance($data, $this->id);
            if ($insurance == false) {
                $this->errorMsg = '险种绑定失败';
                $this->transaction->rollBack();
                return false;
            }
            //创建订单
            $orderDetail = $this->createOrder($this, $this->id, $this->member_id);
            if ($orderDetail == false) {
                $this->errorMsg = '订单详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //创建动态详情
            $act = $this->createAct($this->id, $this->member_id);
            if ($act == false) {
                $this->errorMsg = '订单动态详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //生成保单
            $warrantyMolde =new Warranty();
            $warranty = $warrantyMolde->createdWarranty($this, $this->id, $this->member_id);

            if ($warranty == false) {
                $this->errorMsg = '保单创建失败';
                $this->transaction->rollBack();
                return false;
            }
            $this->transaction->commit();

            $newsA = '系统为您创建了一个【 保险 】订单，订单号： 【'. $orderSn .'】';
            $user_idA = $this->member_id;
            $switch = \common\models\Member::findOne($user_idA);
            if ($switch->system_switch == 1) {
                Notice::userNews('member', $user_idA, $newsA);
                \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
                \common\components\Helper::pushMemberMessage($user_idA,$newsA);
            }
            $newsB = '系统为您的您的会员【'. $this->user .'】创建了一个【 保险 】订单，订单号： 【'. $orderSn .'】';
            $member = Member::findOne($this->member_id);
            $user_idB = $member->pid;
            $switch = \common\models\User::findOne($user_idB);
            if ($switch->system_switch == 1) {
                Notice::userNews('user', $user_idB, $newsB);
                \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
                \common\components\Helper::pushServiceMessage($user_idB,$newsB);
            }

            return $this;

        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }
    }

    public function updateOrder()
    {

        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();

            if(!$this->save()){
                throw new Exception("添加订单失败");
            }
            return $this;
        });
    }

    //    变更状态
    public static function alter($data, $id)
    {
        $user_id = 1000;
        $name = '系统';

        $a = ActInsurance::findOne(['order_id'=>$id]);
        $b = InsuranceOrder::findOne($id);
        $a->status = $data['status_id'];
        $a->info = '系统将订单变更为'.Helper::getInsuranceStatus($data['status_id']);
        $a->user_id = $user_id;
        $a->user = $name;
        $a->id = null;
        $a->created_at = time();
        $a->isNewRecord = 1;

        $b->transaction = Yii::$app->db->beginTransaction();
        try{
            //保存动态详情
            if(!$a->save(false)){
                $b->errorMsg = '动态详情更新失败';
                $b->transaction->rollBack();
                return false;
            }
            $act_id = $a->attributes['id'];
            //更新订单详情
            $order = InsuranceDetail::findOne(['order_id'=>$id]);
            $order->action = Helper::getInsuranceStatus($data['status_id']);
            if(!$order->save(false)){
                $b->errorMsg = '订单详情更新失败';
                $b->transaction->rollBack();
                return false;
            }

            if ($data['status_id'] == 100) {
                $order = InsuranceDetail::findOne(['order_id'=>$id]);
                $member = Member::findOne(['id'=>$order->member_id]);
                $orderSn = InsuranceOrder::findOne(['id'=>$id]);
                $real = Identification::findOne(['member_id'=>$order->member_id]);
                if (!isset($real) || empty($real)) {
                    $realName = $member->phone;
                } else {
                    $realName = $real->name;
                }
                
                $newsA = '您的【保险】订单： 【' . $orderSn->order_sn . '】，已取消';
                $user_idA = $member->id;
                $switch = \common\models\Member::findOne($user_idA);
                if ($switch->system_switch == 1) {
                    Notice::userNews('member', $user_idA, $newsA);
                    \common\components\Helper::pushMemberMessage($user_idA, $newsA, 'message');
                    \common\components\Helper::pushMemberMessage($user_idA, $newsA);
                }
                $newsB = '您的会员【' . $realName . '】的【' . Helper::getType($b->type) . '】订单： 【' . $orderSn->order_sn . '】，已取消';
                $user_idB = $member->pid;
                $switch = \common\models\User::findOne($user_idB);
                if ($switch->system_switch == 1) {
                    Notice::userNews('user', $user_idB, $newsB);
                    \common\components\Helper::pushServiceMessage($user_idB, $newsB, 'message');
                    \common\components\Helper::pushServiceMessage($user_idB, $newsB);
                }
            }
            $b->transaction->commit();
            return true;
        } catch (Exception $exception){
            $b->transaction->rollBack();
            return false;
        }
    }
}