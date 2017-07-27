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
 * This is the model class for table "cdc_order".
 *
 * @property string $id
 * @property string $order
 * @property integer $type
 * @property string $user
 * @property string $phone
 * @property string $car
 * @property integer $pick
 * @property integer $pick_at
 * @property string $pick_addr
 * @property integer $distributing
 * @property string $service
 * @property string $cost
 * @property integer $start_at
 * @property integer $end_at
 */
class Order extends \yii\db\ActiveRecord
{
    public $errorMsg;

    protected $transaction;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'pick', 'pick_at', 'distributing', 'start_at', 'end_at'], 'integer'],
            [['cost'], 'number'],
            [['order'], 'string', 'max' => 100],
            [['user', 'phone', 'car'], 'string', 'max' => 50],
            [['pick_addr', 'service'], 'string', 'max' => 255],
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
            'phone' => 'Phone',
            'car' => 'Car',
            'pick' => 'Pick',
            'pick_at' => 'Pick At',
            'pick_addr' => 'Pick Addr',
            'distributing' => 'Distributing',
            'service' => 'Service',
            'cost' => 'Cost',
            'start_at' => 'Start At',
            'end_at' => 'End At',
        ];
    }

    /*
     * 订单列表
     */
    public function getOrder($data, $member)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
            //TODO:id
        } else {
            $member_id = $data['member_id'];
        }

        $list = OrderDetail::find()->select('car_id, order_id, start_at')
            ->where(['member_id'=> $member_id])
            ->orderBy(['start_at' => SORT_DESC])
            ->asArray()
            ->all();

        if(!isset($list) || empty($list)){
            return null;
        }
        foreach ($list as &$v) {
            $v['car'] = $this->getNames($v['order_id'])->car;
            $v['user'] = $this->getNames($v['order_id'])->user;
            $v['phone'] = $this->getNames($v['order_id'])->phone;
            $v['type'] = $this->getNames($v['order_id'])->type;
            $v['action'] = Helper::getAction($v['order_id'],$this->getNames($v['order_id'])->type);
        }

        $insurance = InsuranceOrder::getOrder($member_id);
        $listAll = array_merge($list, $insurance);
        $datetime = array();
        foreach ($listAll as &$v) {
            $datetime[] = $v['start_at'];
        }

        array_multisort($datetime,SORT_DESC,$listAll);
        foreach ($listAll as &$v) {
            $v['start_at'] = date('Y-m-d H:i', $v['start_at']);
            $v['type'] = Helper::getType($v['type']);
        }

        return $listAll;
    }

    /*
     * 订单详情
     */
    public function getDetail($data)
    {
        //订单详情
        $str = 'order, phone, car, type, pick, pick_addr, pick_at, distributing, start_at, end_at, cost';
        $detail = Order::find()->select($str)->asArray()
            ->where(['id'=>$data['order_id']])
            ->one();
        $detail['type'] = Helper::getType($detail['type']);
        $detail['pick'] = Helper::getPick($detail['pick']);
        $detail['distributing'] = Helper::getDistributing($detail['distributing']);
        $detail['start_at'] = date('Y-m-d H:i',$detail['start_at']);
        $detail['end_at'] = date('Y-m-d H:i',$detail['end_at']);

        //动态列表
        $act = ActDetail::find()->select('status, user_id, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();
        $actEnd = ActDetail::find()->select('status, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
        if ($actEnd['status'] == 2) {
            $top = '待接单';
        } elseif ($actEnd['status'] == 99) {
            $top = '已完成';
        } else {
            $top = '待处理';
        }
        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getStatus($v['status']);
        }
        $order = ['act'=>$act, 'detail'=>$detail, 'topStatus'=>$top];

        //保险信息
        $car_id = OrderDetail::findOne(['order_id'=>$data['order_id']])->car_id;
        $ins = InsuranceDetail::findOne(['car_id'=>$car_id]);
        if (!isset($ins) || empty($ins)) {
            $this->addError('code',2);
            $this->addError('message','暂未购买保险');
            return false;
        } else {
            $ins_id = $ins->order_id;
        }
        $insurance = InsuranceOrder::findOne(['id'=>$ins_id]);
        $element = InsuranceElement::find()->select('insurance, element, deduction')
            ->where(['order_id'=>$ins_id])
            ->asArray()
            ->all();
        $insurance = ['user'=>$insurance->user, 'company'=>$insurance->company, 'element'=>$element];

        //获取服务商信息
        $service_id = OrderDetail::findOne(['order_id'=>$data['order_id']])->service_id;
        $service = Service::find()->select('id, name, level, lat, lng, open_at, close_at')
            ->where(['id'=>$service_id])
            ->asArray()
            ->one();
        //获取服务商图片
        //TODO:图片
        $fac = [];
        $fac['id'] = $service['id'];
        $fac['name'] = $service['name'];
        $fac['level'] = $service['level'];
        //计算时间区间
        $status = Helper::getOpen($service['open_at'], $service['close_at']);
        $fac['tag'] = Helper::getServiceTag($fac['id']);
        $fac['status'] = Helper::getClose($status);
        $fac['distance'] = Helper::getDistance($data['lat'], $data['lng'], $service['lat'], $service['lng']);
        $fac['img_path'] = '132167646465464/13216546/111';

        $all = ['order'=>$order, 'insurance'=>$insurance, 'facilitator'=>$fac];
        return $all;
    }

    /*
     * 全部动态详情
     */
    public function getMany($data)
    {
        $act = ActDetail::find()->select('status, info, user_id, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getStatus($v['status']);
            $v['user_id'] = Helper::getUser($v['user_id']);
        }
        return $act;
    }

    /*
     * 跳转之前
     */
    public function getInfo($data, $member)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
            //TODO:id
        } else {
            $member_id = $data['member_id'];
        }
        $phone = Member::findOne(['id'=>$member_id])->phone;
        $name = Identification::findOne(['member_id'=>$member_id])->name;
        $person = ['name'=>$name,'phone'=>$phone];
        //获取个人车辆
        $car = Car::find()->select('id, license_number')
            ->where(['member_id'=> $member_id])
            ->orderBy(['stick' => SORT_DESC, 'created_at' => SORT_DESC])
            ->asArray()
            ->limit(10)
            ->all();
        //获取服务商信息
        $service = Service::find()->select('id, name, level, lat, lng, open_at, close_at')
            ->asArray()
            ->all();
        //获取服务商图片,标签,距离,是否营业
        foreach ($service as &$v) {
                //图片
                $v['img'] = ServiceImg::findOne(['service_id'=>$v['id'],'type'=>1])->img_path;
                //标签
                $v['tag'] = Helper::getServiceTag($v['id']);
                //距离
                $v['distance'] = Helper::getDistance($data['lat'], $data['lng'], $v['lat'], $v['lng']);
                //是否营业
                $status = Helper::getOpen($v['open_at'], $v['close_at']);
                $v['status'] = Helper::getClose($status);
        }
        //重新定义以距离最近排序
        $distance = array();
        foreach ($service as &$v) {
            $distance[] = $v['distance'];
        }
        array_multisort($distance,SORT_ASC,$service);

        $list = ['member_id'=>$member_id, 'type'=>$data['type'], 'person'=>$person, 'car'=>$car, 'service'=>$service];
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
            $order_id = $this->createOrderSnapshoot($data);
            if ($order_id == false) {
                $this->errorMsg = '订单创建失败';
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
            $act = $this->createAct($order_id, $member_id);
            if ($act == false) {
                $this->errorMsg = '订单动态详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            $this->transaction->commit();
            $order = Order::findOne(['id'=>$order_id])->toArray();
            if ($order['distributing'] == 1) {
                $service = $data['service'];
                $orderSn = $order['order'];
                $type = $order['type'];
                $order = ['type'=>$type, 'order_id'=>$order_id, 'service'=>$service, 'order'=>$orderSn];
                return $order;
            }
            if ($order['type'] == 5) {
                $type = $order['type'];
                $orderSn = $order['order'];
                $order = ['type'=>$type, 'order_id'=>$order_id, 'mail'=>$this->getMail(), 'order'=>$orderSn];
                return $order;
            }
            $order['pick'] = Helper::getPick($order['pick']);
            $order['typeName']  = Helper::getType($order['type']);
            $order['distributing']  = Helper::getDistributing($order['distributing']);
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
        //取消订单
        //TODO:修改测试id
        $a = ActDetail::findOne(['order_id'=>$data['order_id']]);
        $a->status = 100;
        $a->info = '已取消';
        $a->user_id = 1000;
        $a->id = null;
        $a->created_at = time();
        $a->isNewRecord = 1;
        if ($a->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 服务商确认
     */
    public function updateOrder($data)
    {
        //修改服务商
        $order = Order::findOne(['id'=>$data['order_id']]);
        $order->service = $data['service'];
        $orderDetail = OrderDetail::findOne(['order_id'=>$data['order_id']]);
        $orderDetail->service_id = $data['service_id'];
        if ($order->save(false) && $orderDetail->save()) {
            $order = ['id'=>$order['id'], 'service'=>$order['service'], 'orderSn'=>$order['order']];
            return $order;
        }
        return false;
    }

    /*
     * 生成订单号和订单快照
     */
    public function createOrderSnapshoot($data)
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');
        $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        $this->load(['formName'=>$data],'formName');
        $this->order = $orderSn;
        $this->start_at = time();
        if ($this->save(false)) {
//            $order_id = Yii::$app->db->getLastInsertID();
            $order_id = $this->attributes['id'];
            return $order_id?$order_id:null;
        }
        return false;
    }

    /*
     * 生成订单详情
     */
    public function createOrder($data, $order_id, $member_id)
    {
        $orderDetail = new OrderDetail();
        $orderDetail->member_id = $member_id;
        $orderDetail->order_id = $order_id;
        $orderDetail->car_id = $data['car_id'];
        $orderDetail->service_id = $data['service_id'];
        $orderDetail->start_at = time();

        if ($orderDetail->save(false)) {
            return $orderDetail?$orderDetail:null;
        }
        return false;
    }

    /*
     * 生成动态
     */
    public function createAct($order_id, $member_id)
    {
        $act = new ActDetail();
        $act->user_id = $member_id;
        $act->order_id = $order_id;
        $act->status = 1;
        $act->created_at = time();

        if ($act->save(false)) {
            return $act?$act:null;
        }
        return false;
    }

    /*
     * 获取服务商列表
     */
    public function getService($data)
    {
        //获取服务商信息
        $service = Service::find()->select('id, name, level, lat, lng, open_at, close_at')
            ->asArray()
            ->all();
        //获取服务商图片,距离,是否营业
        foreach ($service as &$v) {
            $v['tag'] = Helper::getServiceTag($v['id']);
            //图片
            $v['img'] = ServiceImg::findOne(['service_id'=>$v['id'],'type'=>1])->img_path;
            //距离
            $v['distance'] = Helper::getDistance($data['lat'], $data['lng'], $v['lat'], $v['lng']);
            //是否营业
            $status = Helper::getOpen($v['open_at'], $v['close_at']);
            $v['status'] = Helper::getClose($status);
        }
        //TODO:按照标签的符合度筛选
        //重新定义以距离最近排序
        $distance = array();
        foreach ($service as &$v) {
            $distance[] = $v['distance'];
        }
        array_multisort($distance,SORT_ASC,$service);

        return $service;
    }

    /*
     * 获取邮寄地址
     */
    public function getMail()
    {
        $mail = Mail::find()->select('addr, receiver, phone')->asArray()->one();
        return $mail;
    }


    /*
     * 订单列表
     * 获取信息
     */
    public function getNames($order_id)
    {
        $names = Order::findOne(['id'=>$order_id]);

        return $names;
    }

}
