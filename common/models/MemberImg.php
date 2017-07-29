<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%member_img}}".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $img_path
 * @property integer $created_at
 * @property integer $updated_at
 */
class MemberImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'created_at', 'updated_at'], 'integer'],
            [['img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'member_id' => '用户id',
            'img_path' => '图片地址',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
