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
            [['order_id', 'car_id', 'member_id', 'service_id', 'start_at'], 'integer'],
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
            'start_at' => '创建时间',
        ];
    }

    public function getMember()
    {
        return $this->hasOne(Member::className(), ['member_id' => 'id']);
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id'])->alias('o');
    }


}
