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
use common\models\Notice;
/**
 * This is the model class for table "cdc_order".
 *
 * @property string $id
 * @property string $order_sn
 * @property integer $type
 * @property string $user
 * @property string $phone
 * @property string $car
 * @property integer $pick
 * @property string $pick_at
 * @property string $pick_addr
 * @property integer $distributing
 * @property string $service
 * @property string $cost
 * @property integer $created_at
 * @property integer $updated_at
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
            [['type', 'pick', 'distributing', 'created_at', 'updated_at'], 'integer'],
            [['cost'], 'number'],
            [['order_sn'], 'string', 'max' => 100],
            [['user', 'phone', 'car'], 'string', 'max' => 50],
            [['pick_at', 'pick_addr', 'service'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_sn' => 'Order Sn',
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /*
     * 订单列表
     */
    public function getOrder($data, $member=null)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }
        if (!isset($data['search']) || empty($data['search'])) {
            $search = '';
        } else {
            $search = $data['search'];
        }
        if (!isset($data['top']) || empty($data['top'])) {
            $top = 0;
        } else {
            $top = $data['top'];
        }
        if (!isset($data['type']) || empty($data['type'])) {
            $type = 0;
        } else {
            $type = $data['type'];
        }
        if (!isset($data['status']) || empty($data['status'])) {
            $status = 0;
        } else {
            $status = $data['status'];
        }
        if (!isset($data['page']) || empty($data['page'])) {
            $data['page'] = 1;
        }
        if (!empty($search) || $status !=0 || $type != 0) {
            $data['searchPage'] = 1;
        } else {
            $data['searchPage'] = 0;
        }
        $count =OrderDetail::find()->where(['member_id'=>$member_id])->count();
        //TODO:size修改
        $size = 3;
        $pageTotal = ceil($count/$size);
        $pageSize = ($data['page']-1) * $size;
        $list = OrderDetail::find()->select('car_id, order_id, created_at')
            ->where(['member_id'=> $member_id])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit($size)
            ->offset($pageSize)
            ->asArray()
            ->all();
        if (!empty($search) || $status != 0 || $type != 0) {
            $list = OrderDetail::find()->select('car_id, order_id, created_at')
                ->where(['member_id'=> $member_id])
                ->orderBy(['created_at' => SORT_DESC])
                ->asArray()
                ->all();
        }

        if(!isset($list) || empty($list)){
            $list = [];
        }
        foreach ($list as &$v) {
            $v['car'] = $this->getNames($v['order_id'])->car;
            $v['user'] = $this->getNames($v['order_id'])->user;
            $v['phone'] = $this->getNames($v['order_id'])->phone;
            $v['type'] = $this->getNames($v['order_id'])->type;
            $v['action'] = Helper::getAction($v['order_id']);
        }


        $insurance = InsuranceOrder::getOrder($member_id, $size, $pageSize);

        if (!empty($search) || $status != 0 || $type != 0) {
            $insurance = InsuranceOrder::getOrder($member_id, $size, $pageSize, 1);
        }
        if(!isset($insurance) || empty($insurance)){
            $insurance = [];
        }

        $listAll = array_merge($list, $insurance);
        if (!isset($listAll) || empty($listAll)) {
            return null;
        }

        $datetime = array();
        foreach ($listAll as &$v) {
            $datetime[] = $v['created_at'];
        }

        array_multisort($datetime,SORT_DESC,$listAll);
        foreach ($listAll as &$v) {
            $v['created_at'] = date('Y年m月d日 H:i', $v['created_at']);
            $v['typeName'] = Helper::getType($v['type']);
            if ($v['type'] == 6) {
                $v['actionName'] = Helper::getInsuranceStatus($v['action']);
            } else {
                $v['actionName'] = Helper::getStatus($v['action'],$v['type']);
            }
        }

        $aaa = [];
        $bbb = [];
        $ccc = [];
        foreach ($listAll as &$v) {
            if (preg_match("/($search)/is", $v['phone']) ||
                preg_match("/($search)/is", $v['user']) ||
                preg_match("/($search)/is", $v['car'])){
                $aaa[] = $v;
            }
        }

        foreach ($aaa as &$v) {
            if ($type == 0) {
                $bbb[] = $v;
            }

            if ($status == 0) {
                if ($v['type'] == $type) {
                    $bbb[] = $v;
                }
            } else {
                if ($v['type'] == $type && $v['action'] == $status) {
                    $bbb[] = $v;
                }
            }
        }

        foreach ($bbb as &$v) {
            if ($top == 1) {
                if ($v['actionName'] == '待接单') {
                    $ccc[] = $v;
                }
            } elseif ($top == 2) {
                if ($v['actionName'] == '待交车') {
                    $ccc[] = $v;
                }
            } elseif ($top == 3) {
                if ($v['actionName'] == '核保成功') {
                    $ccc[] = $v;
                }
            } else {
                $ccc[] = $v;
            }
        }
        if (!isset($ccc) || empty($ccc)) {
            return null;
        }
        if ($data['searchPage'] == 1) {
            $pageTotal = ceil(count($ccc) / $size);
            $a = array_chunk($ccc, $size,false);
            $ccc = $a[$data['page']-1];
        }
        $pageInfo = ['page'=>$data['page'], 'pageTotal'=>$pageTotal];
        $status = Helper::getStatusList();

        $all = ['orderList'=>$ccc, 'pageInfo'=>$pageInfo, 'statusList'=>$status];
        return $all;
    }

    /*
     * 订单详情
     */
    public function getDetail($data=null)
    {
        //订单详情
        $str = 'order_sn, phone, car, type, pick, pick_addr, pick_at, distributing, created_at, updated_at, cost';
        $detail = Order::find()->select($str)->asArray()
            ->where(['id'=>$data['order_id']])
            ->one();

        $detail['typeName'] = Helper::getType($detail['type']);
        $detail['pick'] = Helper::getPick($detail['pick']);
        $detail['distributing'] = Helper::getDistributing($detail['distributing']);
        $detail['created_at'] = date('Y-m-d H:i',$detail['created_at']);
        $detail['updated_at'] = date('Y-m-d H:i',$detail['updated_at']);

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
        } elseif ($actEnd['status'] == 99 || $actEnd['status'] == 100) {
            $top = '已完成';
        } else {
            $top = '处理中';
        }
        //按钮状态
        $buttonStatus = 0;
        if ($detail['type'] == 4 && $actEnd['status'] < 3) {
            $buttonStatus = 1;
        }
        if ($detail['type'] == 5 && $actEnd['status'] < 2) {
            $buttonStatus = 1;
        }
        if ($detail['type'] == 1 && $actEnd['status'] < 7) {
            $buttonStatus = 1;
        }
        if ($detail['type'] == 2 && $actEnd['status'] < 7) {
            $buttonStatus = 1;
        }
        if ($detail['type'] == 3 && $actEnd['status'] < 7) {
            $buttonStatus = 1;
        }

        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getStatus($v['status'],$detail['type']);
        }
        $order = ['act'=>$act, 'detail'=>$detail, 'topStatus'=>$top, 'endStatus'=>$actEnd['status']];

        //保险信息
        $car_id = OrderDetail::findOne(['order_id'=>$data['order_id']])->car_id;
        $ins = InsuranceDetail::findOne(['car_id'=>$car_id]);
        if (!isset($ins) || empty($ins)) {
            $insurance = [];
        } else {
            $ins_id = $ins->order_id;
            $insurance = InsuranceOrder::findOne(['id'=>$ins_id]);

            $element = InsuranceElement::find()->select('insurance, element, deduction')
                ->where(['order_id'=>$ins_id])
                ->asArray()
                ->all();
            $insurance = ['person'=>['user'=>$insurance->user,'licence'=>$insurance->licence], 'company'=>$insurance->company, 'element'=>$element];
        }

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
        $fac['img_path'] = Yii::$app->params['img_domain'].ServiceImg::findOne(['service_id'=>$fac['id'],'type'=>1])->img_path;


        $all = ['buttonStatus'=>$buttonStatus, 'order'=>$order, 'insurance'=>$insurance, 'service'=>$fac];
        return $all;
    }

    /*
     * 全部动态详情
     */
    public function getMany($data)
    {
        $act = ActDetail::find()->select('id, status, info, user, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        $order = Order::findOne(['id'=>$data['order_id']]);
        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getStatus($v['status'],$order->type);
            $img = ActImg::find()->select('img_path')->where(['act_id'=> $v['id']])->asArray()->all();
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
    public function getInfo($data, $member=null)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }
        $phone = Member::findOne(['id'=>$member_id])->phone;
        $name = Identification::findOne(['member_id'=>$member_id]);
        if (!isset($name) || empty($name)) {
            $name = '';
        } else {
            $name = $name->name;
        }
        $person = ['name'=>$name,'phone'=>$phone];
        //获取个人车辆
        $car = Car::find()->select('id, license_number')
            ->where(['member_id'=> $member_id])
            ->orderBy(['stick' => SORT_DESC, 'created_at' => SORT_DESC])
            ->asArray()
            ->all();
        if (!isset($car) || empty($car)) {
            $car = '';
        }
        //获取服务商信息
//        $service = Service::find()->select('id, name, level, lat, lng, open_at, close_at')
//            ->asArray()
//            ->all();
        //获取服务商图片,标签,距离,是否营业
//        foreach ($service as &$v) {
//                //图片
//                $v['img'] = ServiceImg::findOne(['service_id'=>$v['id'],'type'=>1])->img_path;
//                //标签
//                $v['tag'] = Helper::getServiceTag($v['id']);
//                //距离
//                $v['distance'] = Helper::getDistance($data['lat'], $data['lng'], $v['lat'], $v['lng']);
//                //是否营业
//                $status = Helper::getOpen($v['open_at'], $v['close_at']);
//                $v['status'] = Helper::getClose($status);
//        }
        //重新定义以距离最近排序
//        $distance = array();
//        foreach ($service as &$v) {
//            $distance[] = $v['distance'];
//        }
//        array_multisort($distance,SORT_ASC,$service);
        $addressValue = \common\components\Helper::getSystemSetting();
        $address = explode('|',$addressValue['delivery_address']);

        $mailAddress = ['address'=>$address[0],'receiver'=>$address[1],'mobile'=>$address[2]];

        $list = ['member_id'=>$member_id, 'person'=>$person, 'car'=>$car, 'mailAddress'=>$mailAddress];
        return $list;

    }

    /*
     * 添加订单
     */
    public function addOrder($data, $member=null, $port)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }
        $userId = Member::findOne(['id'=>$member_id])->pid;
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
            //创建订单详情
            $service = Order::findOne(['id'=>$order_id])->service;
            $act = $this->createAct($service,$order_id, $member_id);
            if ($act == false) {
                $this->errorMsg = '订单动态详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            $this->transaction->commit();

            $order = Order::findOne(['id'=>$order_id])->toArray();
            if ($port == 'member') {
                //生成消息提示给业务员
                $user = Member::findOne(['id'=>$member_id]);
                $real = Identification::findOne(['member_id'=>$member_id]);
                if (!isset($real) || empty($real)) {
                    $realName = $user->phone;
                } else {
                    $realName = $real->name;
                }
                $newsA = '您的会员【'. $realName .'】创建了一个【'. Helper::getType($order['type']) .'】订单，订单号：【'. $order['order_sn'] .'】';
                $modelA = 'user';
                $user_idA = $user->pid;
                Notice::userNews($modelA, $user_idA, $newsA);
            } else {
                $user = User::findOne(['id'=>$userId]);
                $newsB = '您的管家【'. $user->name .'】为您创建了一个【'. Helper::getType($order['type']) .'】订单，订单号：【'. $order['order_sn'] .'】';
                $modelB = 'member';
                $user_idB = $member_id;
                Notice::userNews($modelB, $user_idB, $newsB);
            }
            if ($order['distributing'] == 1) {
                $service = $data['service'];
                $orderSn = $order['order_sn'];
                $type = $order['type'];
                $order = ['type'=>$type, 'order_id'=>$order_id, 'service'=>$service, 'orderSn'=>$orderSn];
                return $order;
            }
            if ($order['type'] == 5) {
                $type = $order['type'];
                $orderSn = $order['order_sn'];
                $order = ['type'=>$type, 'order_id'=>$order_id, 'mail'=>$this->getMail(), 'orderSn'=>$orderSn];
                return $order;
            }
            $order['pick'] = Helper::getPick($order['pick']);
            $order['created_at'] = date('Y年m月d日 H:i',$order['created_at']);
            $order['typeName']  = Helper::getType($order['type']);
            $order['distributing']  = Helper::getDistributing($order['distributing']);
            $order['service'] = $this->getNewService($data);
            $order['user_lat'] = $data['lat'];
            $order['user_lng'] = $data['lng'];

            return $order;
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }

    }

    /*
     * 取消订单
     */
    public function delOrder($data, $member=null)
    {
        if (!isset($member['user']['id']) || empty($member['user']['id'])) {
            $id = $member['member']['id'];
            $user = Helper::getName($member['member']['id']);
        } else {
            $id = $member['user']['id'];
            $user = User::findOne(['id'=>$id])->name;
        }
        //取消订单
        $a = ActDetail::findOne(['order_id'=>$data['order_id']]);
        $a->status = 100;
        $a->info = '取消订单';
        $a->user_id = $id;
        $a->user = $user;
        $a->id = null;
        $a->created_at = time();
        $a->isNewRecord = 1;
        $order = OrderDetail::findOne(['order_id'=>$data['order_id']]);
        $order->action = '已取消';
        if ($a->save(false) && $order->save(false)) {
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
        if ($order->save(false) && $orderDetail->save(false)) {
            $order = ['order_id'=>$order->id, 'service'=>$order->service, 'orderSn'=>$order->order_sn];
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
        $this->order_sn = $orderSn;
        $this->created_at = time();
        if ($this->save(false)) {

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
        $orderDetail->action = '待接单';
        $orderDetail->service_id = $data['service_id'];
        $orderDetail->created_at = time();

        if ($orderDetail->save(false)) {
            return $orderDetail?$orderDetail:null;
        }
        return false;
    }

    /*
     * 生成动态
     */
    public function createAct($service, $order_id, $member_id)
    {
        $act = new ActDetail();
        $act->user_id = $member_id;
        $act->user = Helper::getName($member_id);
        $act->order_id = $order_id;
        $act->info = '订单已分派给服务商'.$service.'，等待接单';
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
        if (!isset($data['page']) || empty($data['page'])) {
            $data['page'] = 1;
        }
        $count = Service::find()->count();
        //TODO:size修改
        $size = 3;
        $pageTotal = ceil($count/$size);
        $pageSize = ($data['page']-1)* $size;
        $service = Service::find()->select('id, name, level, lat, lng, open_at, close_at, state')
            ->where(['deleted_at'=>null])
            ->asArray()
            ->all();
        //获取服务商图片,距离,是否营业
        foreach ($service as &$v) {
            $v['level'] = intval($v['level']);
            $v['tag'] = Helper::getServiceTag($v['id']);
            //图片
            $v['img'] = Yii::$app->params['img_domain'].ServiceImg::findOne(['service_id'=>$v['id'],'type'=>1])->img_path;
            //距离
            $v['distance'] = Helper::getDistance($data['lat'], $data['lng'], $v['lat'], $v['lng']);
            //是否营业
//            $status = Helper::getOpen($v['open_at'], $v['close_at']);
            $v['status'] = Helper::getClose($v['state']);
        }
        //TODO:按照标签的符合度筛选
        //重新定义以距离最近排序
        $distance = array();
        foreach ($service as &$v) {
            $distance[] = $v['distance'];
        }
        array_multisort($distance,SORT_ASC,$service);

        $a = array_chunk($service,$size,false);

        $list = $a[$data['page']-1];
        $pageInfo = ['page'=>$data['page'], 'pageTotal'=>$pageTotal];
        $all = ['list'=>$list,'pageInfo'=>$pageInfo];
        return $all;
    }

    //自动派单返回的服务商
    public function getNewService($data)
    {
        //获取服务商信息
        $service = Service::find()->select('id, name, level, lat, lng, open_at, close_at')
            ->asArray()
            ->where(['deleted_at'=>null, 'state'=>1])
            ->all();
        //获取服务商图片,距离,是否营业
        foreach ($service as &$v) {
            $v['level'] = intval($v['level']);
            $v['tag'] = Helper::getServiceTag($v['id']);
            //图片
            $v['img'] = Yii::$app->params['img_domain'].ServiceImg::findOne(['service_id'=>$v['id'],'type'=>1])->img_path;
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
        return $service[0];
    }
    /*
     * 获取服务商详情
     */
    public function getServiceDetail($data)
    {
        $service = Service::findOne(['id'=>$data['service_id']]);
        $status = Helper::getOpen($service->open_at, $service->close_at);

        $fac = ['name'=>$service->name, 'level'=>intval($service->level), 'lat'=>$service->lat, 'lng'=>$service->lng,
            'tag'=>Helper::getServiceTag($service->id),
            'img'=>Yii::$app->params['img_domain'].ServiceImg::findOne(['service_id'=>$service->id,'type'=>1])->img_path,
            'distance'=>Helper::getDistance($data['lat'], $data['lng'], $service->lat, $service->lng),
            'status'=>Helper::getClose($status),
            'contact_phone'=>$service->contact_phone,
            'introduction'=>$service->introduction
            ];
        return $fac;
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

//    --------------------------------------服务端分割线----------------------------------------------------
    /*
     * 客户端
     * 客户订单
     */
    public static function getNamess($order_id)
    {
        $names = InsuranceOrder::findOne(['id'=>$order_id]);

        return $names;
    }

    public function getTotalList($data, $user=null)
    {
        //获取个人信息
        $user_id = $user['user']['id'];

        if (!isset($data['search']) || empty($data['search'])) {
            $search = '';
        } else {
            $search = $data['search'];
        }
        if (!isset($data['top']) || empty($data['top'])) {
            $top = 0;
        } else {
            $top = $data['top'];
        }
        if (!isset($data['type']) || empty($data['type'])) {
            $type = 0;
        } else {
            $type = $data['type'];
        }
        if (!isset($data['status']) || empty($data['status'])) {
            $status = 0;
        } else {
            $status = $data['status'];
        }
        if (!isset($data['page']) || empty($data['page'])) {
            $data['page'] = 1;
        }

        //五大订单
        $client = Member::find()->select('id, pid')->where(['pid'=>$user_id])->asArray()->all();
        $order1 = [];
        $order =[];
        foreach ($client as &$v) {
            $order1[] = OrderDetail::find()->select('car_id, order_id, created_at')
                ->where(['member_id' => $v['id']])
                ->asArray()
                ->all();
        }
        //除空去键
        $order2 = array_filter($order1);
        foreach ($order2 as $v) {
            foreach ($v as $vv) {
                $order[] = $vv;
            }
        }
        if (!isset($order) || empty($order)) {
            $order = [];
        } else {
            foreach ($order as &$v) {
                $v['car'] = $this->getNames($v['order_id'])->car;
                $v['user'] = $this->getNames($v['order_id'])->user;
                $v['phone'] = $this->getNames($v['order_id'])->phone;
                $v['type'] = $this->getNames($v['order_id'])->type;
                $v['action'] = Helper::getAction($v['order_id']);
            }
        }

        //保险订单
        $insurance1 = [];
        $insurance =[];
        $client = Member::find()->select('id, pid')->where(['pid'=>$user_id])->asArray()->all();
        foreach ($client as &$v) {
            $insurance1[] = InsuranceDetail::find()->select('car_id, order_id, created_at')
                ->where(['member_id'=> $v['id']])
                ->asArray()
                ->all();
        }
        //除空去键
        $insurance2 = array_filter($insurance1);
        foreach ($insurance2 as $v) {
            foreach ($v as $vv) {
                $insurance[] = $vv;
            }
        }
        if(!isset($insurance) || empty($insurance)){
            $insurance= [];
        } else {
            foreach ($insurance as &$v) {
                $v['car'] = self::getNamess($v['order_id'])->car;
                $v['user'] = self::getNamess($v['order_id'])->user;
                $v['phone'] = self::getNamess($v['order_id'])->phone;
                $v['type'] = self::getNamess($v['order_id'])->type;
                $v['action'] = Helper::getInsAction($v['order_id']);
            }
        }

        $listAll = array_merge($order, $insurance);
        if (!isset($listAll) || empty($listAll)) {
            return null;
        }

        $datetime = array();
        foreach ($listAll as &$v) {
            $datetime[] = $v['created_at'];
        }

        array_multisort($datetime,SORT_DESC,$listAll);
        foreach ($listAll as &$v) {
            $v['created_at'] = date('Y年m月d日 H:i', $v['created_at']);
            $v['typeName'] = Helper::getType($v['type']);
            if ($v['type'] == 6) {
                $v['actionName'] = Helper::getInsuranceStatus($v['action']);
            } else {
                $v['actionName'] = Helper::getStatus($v['action'],$v['type']);
            }
        }

        $aaa = [];
        $bbb = [];
        $ccc = [];
        foreach ($listAll as &$v) {
            if (preg_match("/($search)/is", $v['phone']) ||
                preg_match("/($search)/is", $v['user']) ||
                preg_match("/($search)/is", $v['car'])){
                $aaa[] = $v;
            }
        }

        foreach ($aaa as &$v) {
            if ($type == 0) {
                $bbb[] = $v;
            }

            if ($status == 0) {
                if ($v['type'] == $type) {
                    $bbb[] = $v;
                }
            } else {
                if ($v['type'] == $type && $v['action'] == $status) {
                    $bbb[] = $v;
                }
            }
        }

        foreach ($bbb as &$v) {
            if ($top == 1) {
                if ($v['actionName'] == '待接单') {
                    $ccc[] = $v;
                }
            } elseif ($top == 2) {
                if ($v['actionName'] == '待交车') {
                    $ccc[] = $v;
                }
            } elseif ($top == 3) {
                if ($v['actionName'] == '核保成功') {
                    $ccc[] = $v;
                }
            } else {
                $ccc[] = $v;
            }
        }
        if (!isset($ccc) || empty($ccc)) {
            return null;
        }

        $size = 3;
        $pageTotal = ceil(count($ccc) / $size);
        $a = array_chunk($ccc, $size,false);
        $ccc = $a[$data['page']-1];

        $pageInfo = ['page'=>$data['page'], 'pageTotal'=>$pageTotal];
        $status = Helper::getStatusList();

        $all = ['orderList'=>$ccc, 'pageInfo'=>$pageInfo, 'statusList'=>$status];
        return $all;
    }

    /*
     * 订单处理的列表
     */
    public function getDealList($data, $user=null)
    {
        //获取个人信息
        $user_id = $user['user']['id'];
        $service_id = User::findOne(['id'=>$user_id])->pid;
        if (!isset($data['search']) || empty($data['search'])) {
            $search = '';
        } else {
            $search = $data['search'];
        }
        if (!isset($data['top']) || empty($data['top'])) {
            $top = 0;
        } else {
            $top = $data['top'];
        }
        if (!isset($data['type']) || empty($data['type'])) {
            $type = 0;
        } else {
            $type = $data['type'];
        }
        if (!isset($data['status']) || empty($data['status'])) {
            $status = 0;
        } else {
            $status = $data['status'];
        }
        if (!isset($data['page']) || empty($data['page'])) {
            $data['page'] = 1;
        }

        //四大订单
        $order1 = OrderDetail::find()->select('car_id, order_id, created_at')
            ->where(['service_id' => $service_id])
            ->orderBy(['created_at' => SORT_DESC])
            ->asArray()
            ->all();

        if (!isset($order1) || empty($order1)) {
            return null;
        }
        foreach ($order1 as &$v) {
            $v['car'] = $this->getNames($v['order_id'])->car;
            $v['user'] = $this->getNames($v['order_id'])->user;
            $v['phone'] = $this->getNames($v['order_id'])->phone;
            $v['type'] = $this->getNames($v['order_id'])->type;
            $v['action'] = Helper::getAction($v['order_id']);
        }

        foreach ($order1 as &$v) {
            $v['created_at'] = date('Y年m月d日 H:i', $v['created_at']);
            $v['typeName'] = Helper::getType($v['type']);
            $v['actionName'] = Helper::getStatus($v['action'],$v['type']);
        }
        //干掉5号
        $order = [];
        foreach ($order1 as &$v) {
            if ($v['type'] != 5) {
                $order[] = $v;
            }
        }
        $aaa = [];
        $bbb = [];
        $ccc = [];
        foreach ($order as &$v) {
            if (preg_match("/($search)/is", $v['phone']) ||
                preg_match("/($search)/is", $v['user']) ||
                preg_match("/($search)/is", $v['car'])){
                $aaa[] = $v;
            }
        }

        foreach ($aaa as &$v) {
            if ($type == 0) {
                $bbb[] = $v;
            }

            if ($status == 0) {
                if ($v['type'] == $type) {
                    $bbb[] = $v;
                }
            } elseif ($status == 10000) {
                if ($v['type'] == $type && $v['actionName'] != '已完成' && $v['actionName'] != '已取消') {
                    $bbb[] = $v;
                }
            } else {
                if ($v['type'] == $type && $v['action'] == $status) {
                    $bbb[] = $v;
                }
            }
        }

        foreach ($bbb as &$v) {
            if ($top == 1) {
                if ($v['actionName'] == '待接单') {
                    $ccc[] = $v;
                }
            } elseif ($top == 2) {
                if ($v['actionName'] == '待交车') {
                    $ccc[] = $v;
                }
            } elseif ($top == 3) {
                if ($v['actionName'] == '核保成功') {
                    $ccc[] = $v;
                }
            } else {
                $ccc[] = $v;
            }
        }
        if (!isset($ccc) || empty($ccc)) {
            return null;
        }

        $size = 3;
        $pageTotal = ceil(count($ccc) / $size);
        $a = array_chunk($ccc, $size,false);
        $ccc = $a[$data['page']-1];

        $pageInfo = ['page'=>$data['page'], 'pageTotal'=>$pageTotal];
        $status = Helper::getStatusLists();

        $all = ['orderList'=>$ccc, 'pageInfo'=>$pageInfo, 'statusList'=>$status];
        return $all;
    }

    /*
     * 处理订单详情
     */
    public function getDetails($data)
    {
        $str = 'order_sn, phone, car, type, pick, pick_addr, pick_at, distributing, created_at, updated_at, cost';
        $detail = Order::find()->select($str)->asArray()
            ->where(['id'=>$data['order_id']])
            ->one();

        $detail['typeName'] = Helper::getType($detail['type']);
        $detail['pick'] = Helper::getPick($detail['pick']);
        $detail['distributing'] = Helper::getDistributing($detail['distributing']);
        $detail['created_at'] = date('Y-m-d H:i',$detail['created_at']);
        $detail['updated_at'] = date('Y-m-d H:i',$detail['updated_at']);

        //动态列表
        $act = ActDetail::find()->select('status, user, created_at')
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
        } elseif ($actEnd['status'] == 99 || $actEnd['status'] == 100) {
            $top = '已完成';
        } else {
            $top = '处理中';
        }
        //按钮状态
        $buttonStatus = 0;
        if ($actEnd['status'] == 1) {
            $buttonStatus = 1;
        }

        foreach ($act as &$v) {
            $v['created_at'] = date('Y-m-d H:i', $v['created_at']);
            $v['status'] = Helper::getStatus($v['status'],$detail['type']);
        }
        $order = ['act'=>$act, 'detail'=>$detail, 'topStatus'=>$top, 'endStatus'=>$actEnd['status']];

        //保险信息
        $car_id = OrderDetail::findOne(['order_id'=>$data['order_id']])->car_id;
        $ins = InsuranceDetail::findOne(['car_id'=>$car_id]);
        if (!isset($ins) || empty($ins)) {
            $insurance = [];
        } else {
            $ins_id = $ins->order_id;
            $insurance = InsuranceOrder::findOne(['id'=>$ins_id]);

            $element = InsuranceElement::find()->select('insurance, element, deduction')
                ->where(['order_id'=>$ins_id])
                ->asArray()
                ->all();
            $insurance = ['person'=>['user'=>$insurance->user,'licence'=>$insurance->licence], 'company'=>$insurance->company, 'element'=>$element];
        }

        $all = ['buttonStatus'=>$buttonStatus, 'order'=>$order, 'insurance'=>$insurance];
        return $all;
    }

    /*
     * 拒绝订单
     */
    public function refuseOrder($data, $user=null)
    {
        $id = $user['user']['id'];
        $name = User::findOne(['id'=>$id])->name;

        //拒绝订单
        $a = ActDetail::findOne(['order_id'=>$data['order_id']]);
        $a->status = 100;
        $a->info = '订单已被服务商拒绝';
        $a->user_id = $id;
        $a->user = $name;
        $a->id = null;
        $a->created_at = time();
        $a->isNewRecord = 1;
        $order = OrderDetail::findOne(['order_id'=>$data['order_id']]);
        $order->action = '已取消';
        if ($a->save(false) && $order->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 接受订单
     */
    public function adoptOrder($data, $user=null)
    {
        $id = $user['user']['id'];
        $name = User::findOne(['id'=>$id])->name;

        //接受订单
        $a = ActDetail::findOne(['order_id'=>$data['order_id']]);
        $a->status = 2;
        $a->info = '已接单';
        $a->user_id = $id;
        $a->user = $name;
        $a->id = null;
        $a->created_at = time();
        $a->isNewRecord = 1;
        $order = OrderDetail::findOne(['order_id'=>$data['order_id']]);
        $order->action = '已接单';
        if ($a->save(false) && $order->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 更新前数据获取
     */
    public function renewalList($data, $user)
    {
        $updateLists = Helper::getUpdateLists();
        $actEnd = ActDetail::find()->select('status, created_at')
            ->where(['order_id'=>$data['order_id']])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->one();

        $act['actId'] = $actEnd['status']+1;
        $act['actName'] = Helper::getStatus($act['actId'], $data['type']);

        $order['order_id'] = $data['order_id'];
        $order['type'] = $data['type'];
        $all = ['updateLists'=>$updateLists, 'act'=>$act, 'order'=>$order];
        return $all;

    }

    /*
     * 更新数据
     */
    public function alter($data, $user)
    {
        $user_id = $user['user']['id'];
        $name = User::findOne(['id'=>$user_id])->name;

        //接受订单
        $a = ActDetail::findOne(['order_id'=>$data['order_id']]);
        $a->status = $data['actId'];
        if (!isset($data['info'])  && empty($data['info'])) {
            $a->info = $data['actName'];
        } else {
            $a->info = $data['info'];
        }
        $a->user_id = $user_id;
        $a->user = $name;
        $a->id = null;
        $a->created_at = time();
        $a->isNewRecord = 1;

        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            //保存动态详情
            if(!$a->save(false)){
                $this->errorMsg = '动态详情更新失败';
                $this->transaction->rollBack();
                return false;
            }
            $act_id = $a->attributes['id'];
            //更新订单详情
            $order = OrderDetail::findOne(['order_id'=>$data['order_id']]);
            $order->action = $data['actName'];
            if(!$order->save(false)){
                $this->errorMsg = '订单详情更新失败';
                $this->transaction->rollBack();
                return false;
            }
            //评估价格更新
            if ($data['actId'] == 6 && $data['type'] != 4) {
                if (!isset($data['cost'])  && empty($data['cost'])) {
                    $data['cost'] = 0;
                }
                $orderCost = Order::findOne(['id'=>$data['order_id']]);
                $orderCost->cost = $data['cost'];
                if(!$orderCost->save(false)){
                    $this->errorMsg = '评估价格更新失败';
                    $this->transaction->rollBack();
                    return false;
                }
            }
            $upload = new Upload();
            $type = 'act';
            if (isset($data['img'])  && !empty($data['img'])) {
                $img = $upload->setImageInformation($data['img'], $act_id, $type);
                if (!$img) {
                    $this->errorMsg = '图片保存失败';
                    $this->transaction->rollBack();
                    return null;
                }
            }
            $this->transaction->commit();
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }
        return true;
    }

    public function Stat($data, $user) {
        $user_id = $user['user']['id'];
        $service_id = User::findOne(['id'=>$user_id])->pid;
        $rescue_num = OrderDetail::find()->select('type, car_id, order_id, created_at')
            ->leftJoin(Order::tableName(), '{{%order}}.id = {{%order_detail}}.order_id')
            ->where(['service_id' => $service_id,'type' => 1])
            ->andWhere(['!=', 'action', '已完成'])
            ->andWhere(['!=', 'action', '已取消'])
            ->count();

        $maintain_num = OrderDetail::find()->select('type, car_id, order_id, created_at')
            ->leftJoin(Order::tableName(), '{{%order}}.id = {{%order_detail}}.order_id')
            ->where(['service_id' => $service_id,'type' => 2])
            ->andWhere(['!=', 'action', '已完成'])
            ->andWhere(['!=', 'action', '已取消'])
            ->count();
        $upkeep_num = OrderDetail::find()->select('type, car_id, order_id, created_at')
            ->leftJoin(Order::tableName(), '{{%order}}.id = {{%order_detail}}.order_id')
            ->where(['service_id' => $service_id,'type' => 3])
            ->andWhere(['!=', 'action', '已完成'])
            ->andWhere(['!=', 'action', '已取消'])
            ->count();
        $check_num = OrderDetail::find()->select('type, car_id, order_id, created_at')
            ->leftJoin(Order::tableName(), '{{%order}}.id = {{%order_detail}}.order_id')
            ->where(['service_id' => $service_id,'type' => 4])
            ->andWhere(['!=', 'action', '已完成'])
            ->andWhere(['!=', 'action', '已取消'])
            ->count();

        $num = ['rescue' => $rescue_num, 'maintain' => $maintain_num, 'upkeep' => $upkeep_num, 'check' => $check_num];

        return $num;
    }

}
