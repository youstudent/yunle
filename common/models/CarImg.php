<?php

namespace common\models;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use Yii;

/**
 * This is the model class for table "cdc_car_img".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $img_path
 * @property string $img
 * @property string $thumb
 * @property double $size
 * @property string $status
 * @property integer $type
 */
class CarImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%car_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'created_at', 'updated_at'], 'integer'],
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
            'car_id' => '车辆id',
            'img' => '图片名称',
            'thumb' => '缩略图名称',
            'size' => '文件大小',
            'status' => '是否被绑定了',
            'type' => '1.封面图',
            'img_path' => '图片路径',
        ];
    }
}
