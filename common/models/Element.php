<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_element".
 *
 * @property integer $id
 * @property integer $insurance_id
 * @property string $name
 * @property integer $created_at
 */
class Element extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_element';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['insurance_id', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'insurance_id' => 'Insurance ID',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }
}