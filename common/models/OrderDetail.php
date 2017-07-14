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
 * This is the model class for table "cdc_order_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $member_id
 * @property integer $car_id
 * @property integer $type
 * @property integer $distributing
 * @property integer $cost
 * @property integer $pick
 * @property integer facilitator_id
 * @property string $pick_at
 * @property string $pick_addr
 * @property integer $post
 * @property integer $post_at
 * @property string $post_addr
 * @property integer $created_at
 * @property integer $updated_at
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_detail}}';
    }
//TODO:服务商名
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'car_id'], 'required'],
            [['id', 'order_id', 'member_id', 'car_id', 'facilitator_id', 'type', 'distributing', 'cost', 'pick', 'pick_at', 'post', 'post_at', 'created_at', 'updated_at'], 'integer'],
            [['pick_addr', 'post_addr'], 'string', 'max' => 255],
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
            'member_id' => 'Member ID',
            'car_id' => 'Car ID',
            'type' => 'Type',
            'distributing' => 'Distributing',
            'cost' => 'Cost',
            'pick' => 'Pick',
            'pick_at' => 'Pick At',
            'pick_addr' => 'Pick Addr',
            'post' => 'Post',
            'post_at' => 'Post At',
            'post_addr' => 'Post Addr',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
