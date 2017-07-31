<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_member_img".
 *
 * @property string $id
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
        return 'cdc_member_img';
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
            'id' => 'ID',
            'member_id' => 'Member ID',
            'img_path' => 'Img Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
