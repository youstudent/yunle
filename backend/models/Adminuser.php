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
 * @property integer $mark
 * @property integer $master
 */
class Adminuser extends \yii\db\ActiveRecord
{

    public $old_password;
    public $new_password;
    public $re_password;
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
            [['status', 'created_at', 'updated_at', 'mark', 'master'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['name', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['username', 'password_hash'], 'required', 'on' => 'addServiceUser'],
            [['password', 'new_password', 're_password'], 'required', 'on' => 'modifyPassword'],
            [['new_password'], 'string', 'max'=> '16', 'on' => 'modifyPassword'],
            [['new_password'], 'validateNewPassword', 'on'=> 'modifyPassword'],
            [['old_password'], 'validatePassword', 'on'=> 'modifyPassword'],
        ];
    }
    public function scenarios()
    {
        return [
            'addServiceUser' => ['username', 'password'],
            'updateServiceUser' => ['username', 'password'],
            'modifyPassword' => ['old_password', 'new_password', 're_password'],
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
            'name' => '姓名',
            'auth_key' => 'Auth Key',
            'password_hash' => '密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function addServiceUser($model, $mark = 1)
    {
        $this->scenario = 'addServiceUser';

        $this->username = $model->username;
        $this->password_hash = $model->password;
        $this->master = 1;

        $this->mark = $mark;

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

    public function validatePassword($attributes, $params)
    {
        if(!$this->hasErrors()){
            if(!Yii::$app->security->validatePassword($this->old_password, $this->password_hash)){
                $this->addError('old_password', '旧密码不正确');
            }
        }
    }

    public function validateNewPassword($attributes, $params)
    {
        if(!$this->hasErrors()){
            if($this->new_password != $this->re_password){
                $this->addError('re_password', '两次密码不正确');
            }
        }
    }

    public function modifyPassword()
    {
        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->new_password);
            $this->save();
            return $this;
        });
    }

    public static function getCustomerManager()
    {
        $ids = Yii::$app->getAuthManager()->getUserIdsByRole("客户经理");
        $data = Adminuser::find()->where(['id'=>$ids])->select('username,id')->column();
        return $data;
    }
}
