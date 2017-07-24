<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_tag".
 *
 * @property string $id
 * @property string $name
 * @property integer $pid
 * @property integer $created_at
 * @property integer $updated_at
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'created_at', 'updated_at'], 'integer'],
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
            'name' => 'Name',
            'pid' => 'Pid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
