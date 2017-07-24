<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $principal
 * @property string $contact_phone
 * @property string $introduction
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property integer $level
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'principal', 'contact_phone'], 'required'],
            [['level', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'principal', 'contact_phone', 'introduction', 'address', 'lat', 'lng'], 'string', 'max' => 256],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '服务商名称',
            'principal' => '负责人',
            'contact_phone' => '客服电话',
            'introduction' => '简介',
            'address' => '地址',
            'lat' => '纬度',
            'lon' => '经度',
            'level' => '星级',
            'status' => '状态; 10 已启用',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function updateField($post, $field)
    {
        //TODO::验证filed字段权限

    }
}
