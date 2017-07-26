<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%insurance_actimg}}".
 *
 * @property integer $id
 * @property integer $act_id
 * @property integer $order_id
 * @property string $img_path
 * @property integer $created_at
 * @property integer $updated_at
 */
class InsuranceActimg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_actimg}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id', 'order_id'], 'required'],
            [['act_id', 'order_id', 'created_at', 'updated_at'], 'integer'],
            [['img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'act_id' => ' 流转id',
            'order_id' => '订单id',
            'img_path' => '图片地址',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
