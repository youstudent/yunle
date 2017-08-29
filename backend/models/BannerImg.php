<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%banner_img}}".
 *
 * @property integer $id
 * @property integer $size
 * @property integer $banner_id
 * @property string $img_path
 */
class BannerImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banner_id'], 'integer'],
            [['img_path'], 'required'],
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
            'banner_id' => 'bannerID',
            'img_path' => '存放路径',
        ];
    }
}
