<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_insurance_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property integer $type
 * @property integer $created_at
 */
class InsuranceDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_insurance_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'car_id', 'member_id'], 'integer'],
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
            'car_id' => 'Car ID',
            'member_id' => 'Member ID',
        ];
    }
}
