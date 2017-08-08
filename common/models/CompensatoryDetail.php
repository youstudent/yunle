<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_compensatory_detail".
 *
 * @property integer $id
 * @property string $serial_number
 * @property string $warranty_number
 * @property string $cost
 * @property string $travel_tax
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class CompensatoryDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%compensatory_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['cost', 'travel_tax'], 'number'],
            [['serial_number', 'warranty_number'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Serial Number',
            'warranty_number' => 'Warranty Number',
            'cost' => 'Cost',
            'travel_tax' => 'Travel Tax',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
