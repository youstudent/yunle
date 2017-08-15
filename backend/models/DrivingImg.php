<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%driving_img}}".
 *
 * @property integer $id
 * @property integer $driver_id
 * @property string $img_path
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $thumb
 * @property integer $status
 * @property string $size
 * @property string $img
 */
class DrivingImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%driving_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['driver_id', 'created_at', 'updated_at', 'status','size'], 'integer'],
            [['img_path'], 'required'],
            [['img_path', 'thumb'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'driver_id' => '驾驶证ID',
            'img_path' => '存放路径',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'thumb' => 'Thumb',
            'status' => 'Status',
            'size' => 'Size',
            'img' => 'Img',
        ];
    }
}
