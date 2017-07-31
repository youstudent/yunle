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
 * This is the model class for table "cdc_act_detail".
 *
 * @property string $id
 * @property integer $order_id
 * @property integer $user_id
 * @property string $user
 * @property integer $status
 * @property string $info
 * @property integer $created_at
 * @property integer $updated_at
 */
class ActDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%act_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['status', 'info', 'user'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'user' => 'User',
            'info' => 'Info',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
