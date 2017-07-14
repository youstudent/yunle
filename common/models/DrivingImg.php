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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use Yii;

/**
 * This is the model class for table "cdc_driving_img".
 *
 * @property integer $id
 * @property integer $driving_license_id
 * @property string $img_path
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
            [['driving_license_id'], 'integer'],
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
            'driving_license_id' => 'Driving License ID',
            'img_path' => 'Img Path',
        ];
    }
}
