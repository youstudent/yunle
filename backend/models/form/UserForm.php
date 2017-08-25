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
use common\models\UserImg;
use Yii;
use yii\base\Exception;

class UserForm extends User
{
    public $head;
    public $head_id;
    public $attachment;
    public $atta_id;
    public $role_id;


    public function rules()
    {
        return [
            [['pid', 'status', 'last_login_at', 'created_at', 'updated_at', 'deleted_at', 'licence'], 'integer'],
            [['username', 'last_login_ip'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 80],
            [['access_token'], 'string', 'max' => 60],
            [['username'], 'unique', 'on'=> ['create']],
            [['username'], 'checkUsername', 'on'=> ['update']],
            [['username', 'name', 'pid', 'phone', 'password'], 'required', 'on' => ['create']],
            [['username', 'name', 'pid', 'phone'], 'required', 'on' => ['update']],
            [['username', 'phone', 'name'], 'filter', 'filter' => 'trim' ],
            [['username'], 'string', 'max' => 16, 'min'=>6],
            [['username'], 'match', 'pattern' => \pd\helpers\PregRule::USERNAME ],
            [['phone'], 'match', 'pattern' => \pd\helpers\PregRule::PHONE],
            ['password', 'string', 'max' => 60, 'min'=>6, 'on' => 'create'],
            [[ 'head_id', 'atta_id'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return [
            'create'  => ['username', 'name', 'pid', 'phone', 'password', 'level', 'head_id', 'atta_id', 'role_id', 'licence'],
            'update'  => ['username', 'name', 'pid', 'phone', 'password', 'level',  'head_id', 'atta_id', 'role_id', 'licence'],
        ];
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'head' => '头像',
            'attachment' => '业务员附件',
            'role_id' => '角色'
        ]);
    }

    public function attributeHints()
    {
        return [
            'username' => 'APP业务员登录账号,最短6位，最长16位',
            'password' => '最少6位，最长16位',
            'phone' => '业务员的联系电话',
            'status' => '负责人名称',
            'system_switch' => '是否接受APP订单状态推送',
            'check_switch' => '是否接受APP审核订单推送',
            'sid' => '业务员所属服务商',
            'head' => '头像',
            'attachment' => '附件',
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
            //绑定图片

            //设置图片绑定
            foreach($this->head_id as $h){
                $m = UserImg::findOne($h);
                $m->user_id = $this->id;
                $m->status = 1;
                if(!$m->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }

            foreach($this->atta_id as $a){
                $m = UserImg::findOne($a);
                $m->user_id = $this->id;
                $m->status = 1;
                if(!$m->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }

            //生成会员的邀请吗
            if(!InvitationCode::genCode($this->id)){
                throw new Exception("生成邀请信息失败");
            }
            //绑定添加的业务员到业务员的角色
            Helper::bindAppUserDefaultRole($this->id,$this->pid);

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

            //变更图片的绑定
            $old_head = UserImg::find()->where(['user_id'=>$this->id, 'status'=> 1, 'type'=>1])->select('id')->column();
            $reduces_head = array_diff($old_head, $this->head_id);
            foreach($reduces_head as $r){
                $model = UserImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $incsrease_head = array_diff($this->head_id, $old_head);
            foreach($incsrease_head as $i){
                $model = UserImg::findOne($i);
                $model->status = 1;
                $model->user_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }

            $old_atta = UserImg::find()->where(['user_id'=>$this->id, 'status'=> 1, 'type'=>0])->select('id')->column();
            $reduces_atta = array_diff($old_atta, $this->atta_id);
            foreach($reduces_atta as $r){
                $model = UserImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $incsrease_atta = array_diff($this->atta_id, $old_atta);
            foreach($incsrease_atta as $i){
                $model = UserImg::findOne($i);
                $model->status = 1;
                $model->user_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }

            if($this->getOldAttribute('role_id') != $this->role_id){
                //去掉以前的绑定
                Helper::unBindAppUserRole($this->id, $this->pid);

                //绑定添加的业务员到业务员的角色
                Helper::bindAppUserDefaultRole($this->id,$this->pid);
            }

            return $this;
        });
    }

    public  function checkUsername($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->username != $this->getOldAttribute('username')){
                $count = User::find()->where(['username' => $this->username ])->count();
                if($count > 0){
                    $this->addError($attribute, '用户名不能重复');
                }
            }
        }
    }

    public function saveImg($data, $type = 'head')
    {
        $model = new UserImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->type = $type == 'head' ? 1 : 0;
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save()){
            return null;
        }
        return $model;
    }

}