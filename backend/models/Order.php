<?php

namespace backend\models;

use common\models\Helper;
use Yii;

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
 * @property integer $update_at
 */
class Order extends \yii\db\ActiveRecord
{
    public $status_id;
    public $type_label;
    public $member_id;

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
            [['type', 'pick', 'pick_at', 'distributing', 'created_at', 'update_at'], 'integer'],
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
}
