<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%order_detail}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property integer $service_id
 * @property integer $start_at
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    public $status_id;
    public $type;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'car_id', 'member_id', 'service_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单id',
            'car_id' => '车辆id',
            'member_id' => '提交人',
            'service_id' => '服务商id',
            'action' => '订单状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id'])->alias('m');
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id'])->alias('o');
    }

    public function addOrderDetail($order)
    {
        $this->order_id = $order->id;
        $this->car_id = $order->car_id;
        $this->member_id = $order->member_id;
        $this->service_id = $order->service_id;
        $this->created_at = time();
        $this->action = '待接单';
        return $this->save();
    }

    public function getOrderAct()
    {
        return $this->hasOne(ActDetail::className(), ['id'=> 'order_id'])->alias('act');
    }

}
