<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%insurance_detail}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property string $action
 * @property integer $created_at
 * @property integer $updated_at
 */
class InsuranceDetail extends \yii\db\ActiveRecord
{
    public $insurance;
    public $car;
    public $person;
    public $element;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'car_id', 'member_id', 'created_at', 'updated_at'], 'integer'],
            [['action'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单id',
            'car_id' => '车辆id',
            'member_id' => '投保人',
            'action' => '最新动态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    public function getInsuranceOrder()
    {
        return $this->hasOne(InsuranceOrder::className(), ['id'=> 'order_id'])->alias('io');
    }

    public static function getDetail($id)
    {
        $model = InsuranceDetail::findOne(['order_id'=>$id]);
        $model->insurance = InsuranceOrder::findOne($id);
        $model->car = Car::findOne(['id'=>$model->car_id]);
        $model->person = Member::findOne(['id'=>$model->member_id]);
        $model->element = InsuranceElement::findAll(['order_id'=>$id]);

        return $model;

    }
}
