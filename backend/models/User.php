<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property integer $pid
 * @property string $phone
 * @property string $password
 * @property integer $status
 * @property integer $last_login_at
 * @property string $last_login_ip
 * @property string $access_token
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'last_login_at', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['username', 'phone', 'last_login_ip'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 80],
            [['access_token'], 'string', 'max' => 60],
            [['username'], 'unique'],
            [['access_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'pid' => '推荐人id',
            'phone' => '电话',
            'password' => '密码',
            'status' => '状态 1:正常 0:冻结',
            'last_login_at' => '最后登录时间',
            'last_login_ip' => 'Last Login Ip',
            'access_token' => 'Access Token',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
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
