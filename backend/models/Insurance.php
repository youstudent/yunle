<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%insurance}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property integer $cost
 * @property integer $deduction
 * @property integer $created_at
 * @property integer $updated_at
 */
class Insurance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'cost', 'deduction', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'title' => '险种名',
            'type' => '类型 1:交强险 2:商业险',
            'cost' => '价格',
            'deduction' => '是否免赔 1:不计免赔 0:无',
            'created_at' => '创建时间',
            'updated_at' => '是否有不计免赔 1:不计免赔 0:无',
        ];
    }
}
