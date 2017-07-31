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
 * This is the model class for table "cdc_insurance_element".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $insurance
 * @property string $element
 * @property string $deduction
 * @property integer $created_at
 */
class InsuranceElement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_element}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'created_at'], 'integer'],
            [['insurance', 'element', 'deduction'], 'string', 'max' => 50],
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
            'insurance' => 'Insurance',
            'element' => 'Element',
            'deduction' => 'Deduction',
            'created_at' => 'Created At',
        ];
    }
}
