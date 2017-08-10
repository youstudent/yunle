<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%notice}}".
 *
 * @property integer $id
 * @property string $model
 * @property integer $user_id
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['model'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'member,user,service',
            'user_id' => 'user',
            'content' => '消息内容',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
