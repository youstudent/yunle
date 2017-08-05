<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%act_insurance}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $user_id
 * @property string $user
 * @property integer $status
 * @property string $info
 * @property integer $created_at
 * @property integer $updated_at
 */
class ActInsurance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%act_insurance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['user'], 'string', 'max' => 50],
            [['info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'order_id' => '订单id',
            'user_id' => '操作人id',
            'user' => '操作人名',
            'status' => '状态
1.待审核 2.等待确认 3.等待付款  97.核保成功 98.核保失败 99.已完成 100.已取消',
            'info' => '备注信息',
            'created_at' => '操作时间',
            'updated_at' => '修改时间',
        ];
    }
}
