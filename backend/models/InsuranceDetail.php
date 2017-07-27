<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%insurance_detail}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class InsuranceDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'car_id', 'member_id', 'created_at', 'updated_at'], 'integer'],
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
            'member_id' => '投保人',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}