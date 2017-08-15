<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午3:51
 *
 */

namespace backend\models\form;


use backend\models\AppMenu;
use backend\models\AppMenuWithout;
use backend\models\AppRoleAssign;
use backend\models\User;
use common\components\Helper;
use common\models\InvitationCode;
use Yii;
use yii\base\Exception;

class UserForm extends User
{
    public function rules()
    {
        return [
            [['pid', 'status', 'last_login_at', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['username', 'last_login_ip'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 80],
            [['access_token'], 'string', 'max' => 60],
            [['username'], 'unique', 'on'=> ['create']],
            [['username'], 'checkUsername', 'on'=> ['update']],
            [['username', 'name', 'pid', 'phone', 'password', 'status', 'system_switch', 'check_switch'], 'required', 'on' => ['create']],
            [['username', 'name', 'pid', 'phone', 'status', 'system_switch', 'check_switch'], 'required', 'on' => ['update']],
            [['username', 'phone', 'name'], 'filter', 'filter' => 'trim' ],
            [['username'], 'string', 'max' => 16, 'min'=>6],
            [['username'], 'match', 'pattern' => \pd\helpers\PregRule::USERNAME ],
            [['phone'], 'match', 'pattern' => \pd\helpers\PregRule::PHONE],
            ['password', 'string', 'max' => 60, 'min'=>6, 'on' => 'create'],
        ];
    }

    public function scenarios()
    {
        return [
            'create'  => ['username', 'name', 'pid', 'phone', 'password', 'status', 'level', 'system_switch', 'check_switch'],
            'update'  => ['username', 'name', 'pid', 'phone', 'password', 'status', 'level', 'system_switch', 'check_switch'],
        ];
    }

    public function addUser()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
            if(!$this->save()){
                throw new Exception("添加会员信息失败");
            }
            //生成会员的邀请吗
            if(!InvitationCode::genCode($this->id)){
                throw new Exception("生成邀请信息失败");
            }
            //绑定添加的业务员到业务员的角色
            Helper::bindAppUserRole($this->id,$this->pid);

            return $this;
        });
    }

    public function updateUser()
    {
        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();

            if($this->password){
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            }
            if(!$this->save()){
                throw new Exception("更新会员信息失败");
            }
            return $this;
        });
    }

    public  function checkUsername($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->username != $this->getOldAttribute('username')){
                $count = UserForm::find()->where(['username' => $this->username ])->count();
                if($count > 0){
                    $this->addError($attribute, '用户名不能重复');
                }
            }
        }
    }


}