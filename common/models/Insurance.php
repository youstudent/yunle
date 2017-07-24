<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_insurance".
 *
 * @property string $id
 * @property string $title
 * @property integer $type
 * @property string $cost
 * @property integer $deduction
 * @property integer $created_at
 * @property integer $updated_at
 */
class Insurance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'cost', 'deduction', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'cost' => 'Cost',
            'deduction' => 'Deduction',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
