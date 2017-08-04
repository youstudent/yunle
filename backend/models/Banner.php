<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $describe
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['describe'], 'string'],
            [['status', 'created_at', 'updated_at', 'action_type'], 'integer'],
            [['name', 'action_value'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '广告标题',
            'describe' => '广告标题',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'action_type' => '跳转类型',
            'action_value' => '地址',
        ];
    }
}
