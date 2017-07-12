<?php
namespace service\models;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use Yii;
use common\models\InvitationCode;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     */
    public function signup($data)
    {
        //TODO:此处phone和code为从token中获取的邀请码和手机号
        $code = InvitationCode::findOne(['code'=>$data['code']]);
        if(!isset($code) || empty($code)){
            $this->addError('message', '邀请码不存在');
            return false;
        }

        // 生成账号
        $user = new User();
        $user->username = $data['phone'];
        $user->pid = $code->user_id;
        $user->phone = $data['phone'];
        $user->created_at = time();
        $user->curr_login_at = time();
        $user->curr_login_ip = Yii::$app->request->getUserIP();

        //TODO:此处在修改一次token
        return $user->save(false) ? $user : null;
    }
}
