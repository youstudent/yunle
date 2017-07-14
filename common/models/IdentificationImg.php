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
 * This is the model class for table "cdc_identification_img".
 *
 * @property integer $id
 * @property integer $ident_id
 * @property string $img_path
 */
class IdentificationImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%identification_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ident_id'], 'integer'],
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
            'ident_id' => 'Ident ID',
            'img_path' => 'Img Path',
        ];
    }
}
