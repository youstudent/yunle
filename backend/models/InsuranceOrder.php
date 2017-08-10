<?php

namespace backend\models;

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "{{%insurance_order}}".
 *
 * @property integer $id
 * @property string $order
 * @property integer $type
 * @property string $user
 * @property string $sex
 * @property string $nation
 * @property string $licence
 * @property string $phone
 * @property string $car
 * @property string $company
 * @property string $check_action
 * @property string $payment_action
 * @property integer $cost
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $check_at
 */
class InsuranceOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'cost', 'status', 'created_at', 'updated_at'], 'integer'],
            [['order'], 'string', 'max' => 100],
            [['user', 'sex', 'nation', 'licence', 'phone', 'car', 'company'], 'string', 'max' => 50],
            [['order'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'order' => '订单号id',
            'type' => '保险',
            'user' => '投保人',
            'sex' => '性别',
            'nation' => '民族',
            'licence' => '身份证号',
            'phone' => '联系人电话',
            'car' => '车牌号',
            'company' => '承保公司',
            'cost' => '价格',
            'status' => '状态 0:正常 100:取消',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

}
