<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/8 - 上午11:18
 *
 */

namespace backend\models\form;


use backend\models\Adminuser;
use common\components\Helper;
use pd\helpers\PregRule;
use pd\helpers\Yii2Helpers;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

class AdminuserForm extends Adminuser
{
    public $password;
    public $re_password;

    public function rules()
    {
       return [
           [['username', 'name'], 'required', 'on'=> ['create', 'update']],
           [['password', 're_password'], 'required', 'on'=> ['create']],
           ['username', 'match', 'pattern' => PregRule::USERNAME , 'on'=> ['create', 'update']],
           ['username', 'unique', 'on'=> 'create'],
           ['username', 'validateUpdateUsername', 'on'=> 'update'],
           ['password', 'string', 'max'=> 16, 'min'=> 6 ,'on'=> ['create', 'update']],
           ['re_password', 'validateRePassword', 'on'=> ['create', 'update']],
           ['username', 'validateUpdateUsername' ,'message' => '手机号已存在.', 'on' => 'update'],
       ];

    }

    public function scenarios()
    {
        return [
            'create' => ['username', 'password', 're_password', 'name'],
            'update' => ['username', 'password', 're_password', 'name'],
        ];
    }


    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'password' => '密码',
            're_password' => '重复密码'
        ]);
    }

    public function addAccount()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            if(!$this->save()){
                throw new Exception('添加异常');
            }
            return $this;
        });
    }

    public function updateAccount()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            if(!$this->save()){
                throw new Exception('保存异常');
            }
            return $this;
        });
    }

    public function validateRePassword($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->password != $this->re_password){
                $this->addError('re_password', '两次密码不一致');
            }
        }
    }

    public function validateUpdateUsername($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->username != $this->getOldAttribute('username')){
                $count = Adminuser::find()->where(['username' => $this->username ])->count();
                if($count > 0){
                    $this->addError($attribute, '用户名不能重复');
                }
            }
        }
    }

    /**
     * 服务端添加员工
     */
    public function serviceAddAccount()
    {
        if(!$this->validate()){
            return false;
        }

        //判断一下当前的用户是代理商还是服务商
        $group = Helper::getLoginMemberRoleGroup();

        $this->mark = $group;
        if($this->mark == 1){
            $this->addError('mark', '平台用户组请不要在此处添加员工');
            return false;
        }


        return Yii::$app->db->transaction(function(){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            if(!$this->save()){
                throw new Exception('添加异常');
            }
            //在service组中添加一个会员
            Helper::bindService($this->id);
            return $this;
        });
    }

}