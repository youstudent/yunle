<?php

namespace api\models;

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
 * This is the model class for table "cdc_order_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property integer $service_id
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'car_id', 'member_id', 'service_id'], 'integer'],
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
            'car_id' => 'Car ID',
            'member_id' => 'Member ID',
            'service_id' => 'Service ID',
        ];
    }
}
