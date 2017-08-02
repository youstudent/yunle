<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%adminuser}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Adminuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adminuser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['name', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['username', 'password_hash'], 'required', 'on' => 'addServiceUser']
        ];
    }
    public function scenarios()
    {
        return [
            'addServiceUser' => ['username', 'password'],
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
            'name' => '服务商名',
            'auth_key' => 'Auth Key',
            'password_hash' => '密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function addServiceUser($model)
    {
        $this->scenario = 'addServiceUser';

        $this->username = $model->username;
        $this->password_hash = $model->password;

        if(!$this->validate()){
            return false;
        }
        $this->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);

        return $this->save();

    }

    public function updateServiceUser($form)
    {
        $this->scenario = 'updateServiceUser';
        if(!$this->load($form) || !$this->validate()){
            return false;
        }
        $model = Adminuser::findOne(['username'=>$this->username]);
        if($this->password_hash && $model->password_hash != Yii::$app->security->generatePasswordHash($this->password_hash)){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password_hash);
        }
        return true;
    }

}
