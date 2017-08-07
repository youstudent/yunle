<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cdc_warranty".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $member_id
 * @property integer $compensatory_id
 * @property integer $business_id
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $state
 * @property integer $created_at
 * @property integer $updated_at
 */
class Warranty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_warranty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'member_id', 'compensatory_id', 'business_id', 'start_at', 'end_at', 'state', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'member_id' => 'Member ID',
            'compensatory_id' => 'Compensatory ID',
            'business_id' => 'Business ID',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'state' => 'State',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getInsuranceOrder()
    {
        return $this->hasOne(InsuranceOrder::className(), ['id'=> 'order_id'])->alias('io');
    }
}
