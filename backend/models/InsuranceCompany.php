<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%insurance_company}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $brief
 * @property integer $created_at
 * @property integer $updated_at
 */
class InsuranceCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_company}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'brief'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '保险公司名',
            'brief' => '简介',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
