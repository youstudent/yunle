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
 * @property string $open_at
 * @property string $close_at
 * @property integer $level
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $pid
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
            [['level', 'status', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
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
            'principal' => '负责人姓名',
            'contact_phone' => '客服电话',
            'introduction' => '简介',
            'address' => '位置',
            'lat' => '纬度',
            'lng' => '经度',
            'level' => '评分星级',
            'status' => '状态',
            'open_at' => '营业开始时间',
            'close_at' => '营业结束时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
            'sid' => '客户经理',
            'pid' => '上级账户',
            'owner_username' => '注册账户',
        ];
    }

    public function updateField($post, $field)
    {
        //TODO::验证filed字段权限

    }

    public function getPlatform()
    {
        return $this->hasOne(Adminuser::className(), ['id'=>'pid']);
    }


    public function getAccount()
    {
        return $this->hasOne(Adminuser::className(), ['id'=> 'owner_id'])->alias('a');
    }

    public static function dropDownList($json = false)
    {
        $list = Service::find()->where(['deleted_at'=> null])->select('name')->asArray()->column();
        if($json) $list = json_encode($list, JSON_UNESCAPED_UNICODE);
        return $list;
    }


    public function getServiceImg()
    {
        return $this->hasMany(ServiceImg::className(), ['service_id'=>'id']);
    }


}
