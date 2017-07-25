<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property string $order
 * @property integer $type
 * @property string $user
 * @property string $phone
 * @property string $car
 * @property integer $pick
 * @property integer $pick_at
 * @property string $pick_addr
 * @property integer $distributing
 * @property string $service
 * @property string $cost
 * @property integer $start_at
 * @property integer $end_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'pick', 'pick_at', 'distributing', 'start_at', 'end_at'], 'integer'],
            [['cost'], 'number'],
            [['order'], 'string', 'max' => 100],
            [['user', 'phone', 'car'], 'string', 'max' => 50],
            [['pick_addr', 'service'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'order' => '订单号',
            'type' => '类型 1:救援 2:维修 3:保养 4:上线审车 5:不上线审车',
            'user' => '联系人',
            'phone' => '联系人电话',
            'car' => '车牌号',
            'pick' => '是否接车 0:否 1:接',
            'pick_at' => '接车时间',
            'pick_addr' => '接车地点',
            'distributing' => '派单类型 0:自动 1:手动',
            'service' => '服务商',
            'cost' => '价格',
            'start_at' => '下单时间',
            'end_at' => '完成时间',
        ];
    }

    public  function softDelete($id)
    {
        $this->deleted_at = time();
        return $this->save();
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this->save();
    }

    protected function getService()
    {
        return $this->hasOne(Service::className(), ['id'=> 'pid'])->alias('s');
    }
}
