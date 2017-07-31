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
            'id' => '����id',
            'member_id' => '�û�id',
            'img_path' => 'ͼƬ��ַ',
            'created_at' => '����ʱ��',
            'updated_at' => '�޸�ʱ��',
        ];
    }
}
