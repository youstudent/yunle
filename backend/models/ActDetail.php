<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%act_detail}}".
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
维修和保养和救援
1.待接单 2.已接单 3.接车中 4.正在返回 5.已接车 6.已评估 7.处理中 8.待交车 99.已完成 100.已取消
上线审车
1.待接单 2.已接单 3.处理中 4.待交车 5.已出发 6.返修中 99.已完成 100.已取消
不上线审车
1.待邮寄 2.处理中 98.未通过 99.已完成 100.已取消',
            'info' => '备注信息',
            'created_at' => '操作时间',
            'updated_at' => '修改时间',
        ];
    }
}
