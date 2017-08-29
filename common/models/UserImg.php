<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_user_img".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $img_path
 * @property integer $type
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'img_path' => 'Img Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
