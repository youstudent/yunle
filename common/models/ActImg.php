<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_act_img".
 *
 * @property string $id
 * @property integer $act_id
 * @property string $img_path
 * @property integer $created_at
 * @property integer $updated_at
 */
class ActImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%act_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id'], 'required'],
            [['act_id', 'created_at', 'updated_at'], 'integer'],
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
            'act_id' => 'Act ID',
            'img_path' => 'Img Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
