<?php

namespace backend\models;

use common\models\BusinessDetail;
use common\models\CompensatoryDetail;
use Yii;

/**
 * This is the model class for table "cdc_warranty".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $member_id
 * @property integer $compensatory_id
 * @property integer $business_id
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $state
 * @property integer $created_at
 * @property integer $updated_at
 */
class Warranty extends \yii\db\ActiveRecord
{
    public $insurance;
    public $car;
    public $person;
    public $element;
    public $warranty;
    public $compensatory;
    public $business;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_warranty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'member_id', 'compensatory_id', 'business_id', 'start_at', 'end_at', 'state', 'created_at', 'updated_at'], 'integer'],
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
            'compensatory_id' => 'Compensatory ID',
            'business_id' => 'Business ID',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'state' => 'State',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getInsuranceOrder()
    {
        return $this->hasOne(InsuranceOrder::className(), ['id'=> 'order_id'])->alias('io');
    }

    public static function getDetail($id)
    {
        $model = Warranty::findOne(['order_id'=>$id]);
        $model->insurance = InsuranceOrder::findOne($id);
        $model->element = InsuranceElement::findAll(['order_id'=>$id]);
        $model->business = BusinessDetail::findOne(['id'=>$model->business_id]);
        $model->compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);

        return $model;
    }

    public static function changeInfo($data)
    {
        $id = $data['order_id'];
        $model = Warranty::findOne(['order_id'=>$id]);
        $business = BusinessDetail::findOne(['id'=>$model->business_id]);
        $compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);
        $model->start_at = $data['c_st'];
        $model->end_at = $data['c_en'];
        $model->save(false);
        $compensatory->serial_number = $data['c_sn'];
        $compensatory->warranty_number = $data['c_wn'];
        $compensatory->cost = $data['c_cost'];
        $compensatory->travel_tax = $data['c_tt'];
        $compensatory->start_at = $data['c_st'];
        $compensatory->end_at = $data['c_en'];

        $business->serial_number = $data['b_sn'];
        $business->warranty_number = $data['b_wn'];
        $business->cost = $data['b_cost'];
        $business->start_at = $data['b_st'];
        $business->end_at = $data['b_en'];

        $cost = InsuranceOrder::findOne(['id'=>$id]);
        $cost->cost = $data['c_tt'] + $data['c_cost'] + $data['b_cost'];
        if ($cost->cost > 0) {
            $cost->payment_action = '已付款';
            $cost->updated_at = time();
        }
        $cost->save(false);

        if ($compensatory->save(false) && $business->save(false)) {
            return true;
        }
        return false;
    }

}
