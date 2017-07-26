<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%insurance_element}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $insurance
 * @property string $element
 * @property string $deduction
 * @property integer $created_at
 * @property integer $updated_at
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
            [['order_id', 'created_at', 'updated_at'], 'integer'],
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
            'order_id' => '保险订单id',
            'insurance' => '险种名',
            'element' => '要素',
            'deduction' => '是否免赔',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
