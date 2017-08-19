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
            [['type', 'user', 'member_id', 'phone', 'car', 'pick', 'distributing', 'service', 'cost'], 'required', 'on' => ['create', 'update']]
        ];
    }


    public function scenarios()
    {
        return [
            'create' => ['order_sn', 'type', 'user', 'phone', 'car', 'pick', 'pick_at', 'pick_addr', 'distributing', 'service', 'cost'],
            'update' => ['order_sn', 'type', 'user', 'phone', 'car', 'pick', 'pick_at', 'pick_addr', 'distributing', 'service', 'cost'],
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

//    变更状态
    public static function alter($data, $id)
    {
        $user_id = 1000;
        $name = '系统';

        //接受订单
        $a = ActDetail::findOne(['order_id'=>$id]);
        $b = Order::findOne($id);
        $a->status = $data['status_id'];
        $a->info = '系统将订单变更为'.Helper::getStatus($data['status_id'],$b->type);
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
            $order = OrderDetail::findOne(['order_id'=>$id]);
            $order->action = Helper::getStatus($data['status_id'],$b->type);
            if(!$order->save(false)){
                $b->errorMsg = '订单详情更新失败';
                $b->transaction->rollBack();
                return false;
            }
            //评估价格更新
            if ($data['status_id'] == 6 && $b->type != 4) {
                if (!isset($data['cost'])  && empty($data['cost'])) {
                    $data['cost'] = 0;
                }
                $orderCost = Order::findOne(['id'=>$id]);
                $orderCost->cost = $data['cost'];
                if(!$orderCost->save(false)){
                    $b->errorMsg = '评估价格更新失败';
                    $b->transaction->rollBack();
                    return false;
                }
            }
//            $upload = new Upload();
//            $type = 'act';
//            if (isset($data['img'])  && !empty($data['img'])) {
//                $img = $upload->setImageInformation($data['img'], $act_id, $type);
//                if (!$img) {
//                    $this->errorMsg = '图片保存失败';
//                    $this->transaction->rollBack();
//                    return null;
//                }
//            }
            $b->transaction->commit();
        } catch (Exception $exception){
            $b->transaction->rollBack();
            return false;
        }

        if ($data['status_id'] == 8 && $b->type != 4) {
            $order = OrderDetail::findOne(['order_id'=>$id]);
            $member = Member::findOne(['id'=>$order->member_id]);
            $orderSn = Order::findOne(['id'=>$id]);
            $real = Identification::findOne(['member_id'=>$order->member_id]);
            if (!isset($real) || empty($real)) {
                $realName = $member->phone;
            } else {
                $realName = $real->name;
            }

            $newsA = '您的【'. Helper::getType($b->type) .'】订单： 【'. $orderSn->order_sn .'】，服务商已完成处理，等待交车';
            $user_idA = $member->id;
            $switch = \common\models\Member::findOne($user_idA);
            if ($switch->system_switch == 1) {
                Notice::userNews('member', $user_idA, $newsA);
                \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
                \common\components\Helper::pushMemberMessage($user_idA,$newsA);
            }
            $newsB = '您的会员【'. $realName .'】的【'. Helper::getType($b->type) .'】订单： 【'. $orderSn->order_sn .'】，服务商已完成处理，等待交车';
            $user_idB = $member->pid;
            $switch = \common\models\User::findOne($user_idB);
            if ($switch->system_switch == 1) {
                Notice::userNews('user', $user_idB, $newsB);
                \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
                \common\components\Helper::pushServiceMessage($user_idB,$newsB);
            }
        }

        return true;
    }
}