<?php
namespace api\models;

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
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use common\components\Helper;
use common\models\Identification;
use common\models\Member;
use common\models\MemberCode;
use Yii;
use common\models\InvitationCode;
use yii\base\Model;
use yii\db\Exception;
use yii\web\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $transaction;

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
        $code = InvitationCode::findOne(['code'=>$data['code']]);

        if(!isset($code) || empty($code)){
            $this->addError('message', '邀请码不存在');
            return false;
        }
        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            // 生成账号
            $user = new Member();
            $user->pid = $code->user_id;
            $user->phone = $data['phone'];
            $user->created_at = time();
            $user->last_login_at = time();
            $user->last_login_ip = Yii::$app->request->getUserIP();
            if (!$user->save(false)) {
                $this->errorMsg = '账号注册失败';
                $this->transaction->rollBack();
                return false;
            }

            $id = $user->attributes['id'];
            //生成记录
            $inviteCode = new MemberCode();
            $inviteCode->member_id = $id;
            $inviteCode->code_id = $code->id;
            $inviteCode->created_at = time();
            if (!$inviteCode->save(false)) {
                $this->errorMsg = '邀请码绑定失败';
                $this->transaction->rollBack();
                return false;
            }

            //生成认证空记录
            $identification = new Identification();
            $identification->member_id = $id;
            $identification->created_at = time();
            if (!$identification->save(false)) {
                $this->errorMsg = '认证信息失败';
                $this->transaction->rollBack();
                return false;
            }

            //生成消息提示给业务员
            $news = '您成功邀请一位新会员，手机号：【'. $data['phone'] .'】';
            $model = 'user';
            $user_id = $code->user_id;
            $switch = \common\models\User::findOne($user_id);
            if ($switch->system_switch == 1) {
                Helper::pushServiceMessage($user_id,$news);
                Helper::pushServiceMessage($user_id,$news,'message');
                \common\models\Notice::userNews($model, $user_id, $news);
            }

            $mem = [
                'member' => [ 'id'=> $id, 'phone'=> $data['phone']],
                'sites' => ['site_name'=> '云乐享车', 'version'=> '1.0', 'adminEmail'=> 'a@a.com']
            ];
            Yii::$app->session->set('mem',$mem);

            $this->transaction->commit();
            return true;
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }
    }
}
