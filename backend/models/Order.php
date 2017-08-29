<?php

namespace backend\models;

use common\models\ActImg;
use common\models\Helper;
use Yii;
use yii\db\Exception;
use common\models\Notice;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property string $order_sn
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
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    public $status_id;
    public $type_label;
    public $member_id;

    public $img;
    public $img_id;
    public $info;
    public $errorMsg;
    public $transaction;
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
            [['type', 'pick', 'pick_at', 'distributing', 'created_at', 'updated_at'], 'integer'],
            [['cost'], 'number'],
            [['order_sn'], 'string', 'max' => 100],
            [['user', 'phone', 'car'], 'string', 'max' => 50],
            [['pick_addr', 'service'], 'string', 'max' => 255],
            [['img', 'img_id', 'info', 'cost'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'order_sn' => '订单号',
            'type' => '订单类型',
            'user' => '联系人',
            'phone' => '联系人电话',
            'car' => '车牌号',
            'pick' => '接车',
            'pick_at' => '接车时间',
            'pick_addr' => '接车地点',
            'distributing' => '派单',
            'service' => '服务商',
            'cost' => '价格',
            'created_at' => '下单时间',
            'update_at' => '完成时间',
        ];
    }

    public  function softDelete($id)
    {
        $this->deleted_at = time();
        return $this->save();
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this->save();
    }

    protected function getService()
    {
        return $this->hasOne(Service::className(), ['id'=> 'pid'])->alias('s');
    }

    protected function getOrderAct()
    {
        return $this->hasOne(ActDetail::className(), ['order_id'=> 'id'])->alias('act');
    }

    public static function getOrderDetail($id)
    {
        $model = Order::findOne($id);
        $model->status_id = $model->getOrderAct()->orderBy(['id'=> SORT_DESC])->one()->status;
        $model->type_label = Helper::getType($model->type);
        $model->member_id = OrderDetail::findOne(['order_id'=>$id])->member_id;
        return $model;
    }

    //    变更状态
    public function alter($data, $id)
    {
        // 处理图片
//        if(!$this->validate()){
//            return false;
//        }

        if(count($this->img_id) < 1 || count($this->img_id) > 12){
            $this->addError('img', '附件最多为12张');
            return false;
        }

        $act = new ActDetail();
        $act->created_at = time();
        $act->updated_at = time();
        $act->order_id = $id;
        $act->info = $this->info;
        if(!$this->save(false)){
            $this->addError('img', '添加动态信息失败');
        }

        //设置图片绑定
        foreach($this->img_id as $h){
            $m = ActImg::findOne($h);
            $m->act_id = $this->id;
            $m->status = 1;
            if(!$m->save()){
                $this->addError('img', '图片绑定失败');
            }
        }

        $user_id = 1000;
        $name = '系统';

        //接受订单
        $a = ActDetail::findOne(['order_id'=>$id]);
        $b = Order::findOne($id);
        $a->status = $this->status_id;
        $a->info = $this->info;
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
            $order->action = Helper::getStatus($this->status_id,$b->type);
            if(!$order->save(false)){
                $b->errorMsg = '订单详情更新失败';
                $b->transaction->rollBack();
                return false;
            }
            //评估价格更新
            if ($this->status_id == 6 && $b->type != 4) {
                if (!isset($data['cost'])  && empty($data['cost'])) {
                    $data['cost'] = 0;
                }
                $orderCost = Order::findOne(['id'=>$id]);
                $act = ActDetail::findOne($act_id);
                $act->info = $this->info;
                $act->save(false);
                $orderCost->cost = $this->cost;
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

        if ($this->status_id == 8 && $b->type != 4) {
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

    /**
     * 添加附件
     * @param $form
     * @return bool|mixed
     */
    public function addAct()
    {

    }

    /**
     * 更新动态
     * @return bool|mixed
     */
    public function updateAct()
    {
        return Yii::$app->db->transaction(function()
        {
            if(!$this->save()){
                throw new Exception("更新动态详情信息失败");
            }

            //变更图片的绑定
            $old_car_img = ActImg::find()->where(['act_id'=>$this->id, 'status'=> 1])->select('id')->column();
            $reduces_car_img = array_diff($old_car_img, $this->car_img_id);
            foreach($reduces_car_img as $r){
                $model = ActImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $increase_car_img = array_diff($this->car_img_id, $old_car_img);
            foreach($increase_car_img as $i){
                $model = ActImg::findOne($i);
                $model->status = 1;
                $model->act_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }
            return $this;
        });
    }

    /**
     * 上传土图片要用到的
     * @param $data
     * @return ActImg|null|
     */
    public function saveImg($data)
    {
        $model = new ActImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save(false)){
            return null;
        }
        return $model;
    }

    public  function getPic()
    {
        return $this->hasMany(ActImg::className(), ['act_id'=> 'id'])->where(['status'=> 1]);
    }

    public function getPicImg()
    {
        $arr = [];
        foreach($this->pic as $i){
            $arr[] = '<img src="'.Yii::$app->params['img_domain']. $i->thumb.'" />';
        }
        return $arr;
    }
}
