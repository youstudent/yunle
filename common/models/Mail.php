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
 * This is the model class for table "cdc_mail".
 *
 * @property integer $id
 * @property string $addr
 * @property string $phone
 * @property string $receiver
 */
class Mail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addr'], 'string', 'max' => 255],
            [['phone', 'receiver'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addr' => 'Addr',
            'phone' => 'Phone',
            'receiver' => 'Receiver',
        ];
    }
}
