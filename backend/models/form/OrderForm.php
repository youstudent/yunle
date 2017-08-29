<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:19
 *
 */

namespace backend\models\form;


use backend\models\ActDetail;
use backend\models\Car;
use backend\models\Member;
use backend\models\Order;
use backend\models\OrderDetail;
use backend\models\Service;
use backend\models\User;
use common\models\Helper;
use common\models\Identification;
use common\models\Notice;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class OrderForm extends Order
{
    public $member_id;
    public $service_id;
    public $car_id;

    public function rules()
    {
        return [
            [['type', 'user', 'member_id', 'phone', 'car', 'pick', 'distributing', 'service', 'cost'], 'required', 'on' => ['create', 'update']],
            [['member_id', 'service_id', 'car_id'],'safe']
        ];
    }


    public function scenarios()
    {
        return [
            'create' => ['order_sn', 'type', 'user', 'phone', 'car', 'pick', 'pick_at', 'pick_addr', 'distributing', 'service', 'cost', 'service_id', 'car_id', 'member_id'],
            'update' => ['order_sn', 'type', 'user', 'phone', 'car', 'pick', 'pick_at', 'pick_addr', 'distributing', 'service', 'cost', 'service_id', 'car_id', 'member_id'],
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

    public static function createOrder($member_id)
    {
        $model = new OrderForm();
        $member = Member::findOne($member_id);
        $model->member_id = $member_id;
        $model->user = $member->memberInfo ? $member->memberInfo->name : $member->phone;
        $model->phone = $member->phone;
        $model->pick = 1;
        return $model;
    }

    public function addOrder()
    {
        if(!$this->validate()){
            return false;
        }
        //$this->scenario = 'after-post-form';

        return Yii::$app->db->transaction(function(){
            $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');
            $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));

            $this->order_sn = $orderSn;
            $this->created_at = time();
            $this->updated_at = time();
            $this->service_id = $this->service;
            $this->service = Service::findOne($this->service_id)->name;
            $this->car_id = $this->car;
            $this->car = Car::findOne($this->car_id)->license_number;
            if(!$this->save()){
                throw new Exception("添加快照失败订单失败");
            }
            $orderDetailModel = new OrderDetail();
            if(!$orderDetailModel->addOrderDetail($this)){
                throw new Exception("添加订单失败");
            }

            $ActDetailModel = new ActDetail();
            if(!$ActDetailModel->addActDetail($this)){
                throw new Exception("添加订单失败");
            }

            $newsA = '系统为您创建了一个【'. Helper::getType($this->type) .'】订单，订单号： 【'. $orderSn .'】';
            $user_idA = $this->member_id;
            $switch = \common\models\Member::findOne($user_idA);
            if ($switch->system_switch == 1) {
                Notice::userNews('member', $user_idA, $newsA);
                \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
                \common\components\Helper::pushMemberMessage($user_idA,$newsA);
            }
            $newsB = '系统为您的会员【'. $this->user .'】创建了一个【'. Helper::getType($this->type) .'】订单，订单号： 【'. $orderSn .'】';
            $member = Member::findOne($this->member_id);
            $user_idB = $member->pid;
            $switch = \common\models\User::findOne($user_idB);
            if ($switch->system_switch == 1) {
                Notice::userNews('user', $user_idB, $newsB);
                \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
                \common\components\Helper::pushServiceMessage($user_idB,$newsB);
            }

            return $this;
        });
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
}