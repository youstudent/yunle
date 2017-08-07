<?php
namespace common\models;

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

use SebastianBergmann\CodeCoverage\Driver\Driver;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "cdc_user".
 *
 * @property string $id
 * @property string $username
 * @property string $name
 * @property integer $pid
 * @property integer $role_id
 * @property string $phone
 * @property string $password
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $system_switch
 * @property integer $check_switch
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $last_login_at
 * @property string $last_login_ip
 * @property string $access_token
 * @property string $login_count
 * @property integer $type
 * @property integer $level
 */
class User extends ActiveRecord
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
            [['pid', 'role_id', 'status', 'created_at', 'updated_at', 'last_login_at', 'type'], 'integer'],
            [['username', 'phone', 'last_login_ip', 'login_count', 'name'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 80],
            [['password_reset_token', 'email', 'auth_key', 'access_token'], 'string', 'max' => 60],
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
            'username' => 'Username',
            'name' => 'name',
            'pid' => 'Pid',
            'role_id' => 'Role ID',
            'phone' => 'Phone',
            'password' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'last_login_at' => 'Curr Login At',
            'last_login_ip' => 'Curr Login Ip',
            'access_token' => 'Access Token',
            'login_count' => 'Login Count',
        ];
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password, $hash)
    {
        return Yii::$app->security->validatePassword($password, $hash);
    }


    /**
     * Validates code
     *
     */
    public function validateCode($phone, $code)
    {

    }

    /**
     * 服务端登录
     * @param $username $password
     * @return bool|array
     */
    public function login($data)
    {
        if(empty($data['username']) || empty($data['password'])){
            $this->addError('message', '账号或密码不能为空');
            return false;
        }

        $user = User::findOne(['username'=>$data['username']]);
        if(!isset($user) || !User::validatePassword($data['password'], $user->password)){
            $this->addError('message', '账号或密码错误');
            return false;
        }
        if($user->status != 1){
            $this->addError('message', '请联系管理员');
            return false;
        }
        $user->last_login_at = time();
        $user->last_login_ip = Yii::$app->request->getUserIP();

        $userInfo = [
            'user' => [ 'id'=> $user->id, 'phone'=> $user->phone],
        ];
        Yii::$app->session->set('user',$userInfo);

        //TODO:更改权限
        if ($user->save(false)) {
            return Helper::getRbac();
        }

        return false;

    }

    /*
     * 个人信息
     */
    public function myInfo($id)
    {
        $img = UserImg::findOne(['user_id'=>$id]);
        if (!isset($img) || empty($img)) {
            $photo = '';
        } else {
            $photo = $_SERVER['HTTP_HOST'].$img->img_path;
        }
        $user = User::findOne(['id'=>$id]);
        $phone = $user->phone;
        $name = $user->name;

        $person = ['photo'=>$photo, 'phone'=>$phone, 'name'=>$name];


        //我的上司
        $pid = $user->pid;
        $myButler = Service::findOne(['id'=>$pid]);
        if (!isset($myButler) || empty($myButler)) {
            $butlerName = '你从哪里来?';
            $level = '五星好不好';
            $photo = '';
        } else {
            $butlerName = $myButler->name;
            $level = $myButler->level;
            $path =
            $img = ServiceImg::findOne(['service_id'=>$pid]);
            if (!isset($img) || empty($img)) {
                $photo = '';
            } else {
                $photo = Yii::$app->params['img_domain'].$img->img_path;
            }

        }
        $state = $myButler->state;
        if ($state == 1) {
            $state = true;
        } else {
            $state = false;
        }
        $butler = ['butlerName'=>$butlerName, 'level'=>$level, 'photo'=>$photo, 'state' =>$state];

        $info = ['person'=>$person, 'butler'=>$butler];
        return $info;

    }

    /*
     * 客户端手机号更换
     */
    public function phone($data, $member=null)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        if (empty($data['phone']) || empty($data['code'])) {
            $this->addError('message', '手机号或验证码不能为空');
            return false;
        }

        $user = Member::findOne(['id'=>$member_id]);
        if ($data['step'] == 1 && $data['phone'] != $user->phone) {
            $this->addError('message', '手机号不正确请核对');
            return false;
        }
        $code = MessageCode::findOne(['phone' => $data['phone'], 'code' => $data['code'], 'status'=>0]);
        if (!isset($code) || empty($code)) {
            $this->addError('message', '验证码错误');
            return false;
        }
        $code->status = -1;
        $code->save(false);

        if ($data['step'] == 2) {
            $user = Member::findOne(['id'=>$member_id]);
            $user->phone = $data['phone'];
            $user->save(false);
        }

        return true;
    }

    /*
     * 服务端手机号更换
     */
    public function userPhone($data, $user=null)
    {
        if (empty($data['phone']) || empty($data['code'])) {
            $this->addError('message', '手机号或验证码不能为空');
            return false;
        }

        if ($data['step'] == 1 && $data['phone'] != $user['user']['phone']) {
            $this->addError('message', '手机号不正确请核对');
            return false;
        }
        $code = MessageCode::findOne(['phone' => $data['phone'], 'code' => $data['code'], 'status'=>0]);
        if (!isset($code) || empty($code)) {
            $this->addError('message', '验证码错误');
            return false;
        }
        $code->status = -1;
        $code->save(false);
        //获取个人信息
        $user_id = $user['user']['id'];

        if ($data['step'] == 2) {
            $userInfo = User::findOne(['id'=>$user_id]);
            $userInfo->phone = $data['phone'];
            $userInfo->save(false);
        }

        return true;
    }

    /*
     * 我的邀请码
     */
    public function invite($user)
    {
        $user_id = $user['user']['id'];

        $code = InvitationCode::findOne(['user_id'=>$user_id,'status'=>0]);
        if (!isset($code) || empty($code)) {
            $this->addError('message', '您还有没有邀请码');
            return false;
        }
        $code =  ['inviteCode' => $code->code];
        return $code;
    }
    /*
     * 配置信息
     */
    public function getDeploy($data,$user)
    {
        $user_id = $user['user']['id'];
        $deploy = User::find()->select('system_switch, check_switch')->asArray()
            ->where(['id'=>$user_id])
            ->one();

        if (!isset($deploy) || empty($deploy)) {
            return null;
        }
        if ($deploy['check_switch'] == 1) {
            $deploy['check_switch'] = true;
        } else {
            $deploy['check_switch'] = false;
        }
        if ($deploy['system_switch'] == 1) {
            $deploy['system_switch'] = true;
        } else {
            $deploy['system_switch'] = false;
        }
        return $deploy;

    }

    /*
     * 姓名修改
     */
    public function changeName($data, $user)
    {
        $id = $user['user']['id'];
        $user = User::findOne(['id'=>$id]);

        //修改姓名
        $user->name = $data['name'];
        if ($user->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 头像上传
     */
    public function photo($data, $user=null)
    {
        $user_id = $user['user']['id'];
        $img = UserImg::findOne(['user_id'=>$user_id]);
        $type = 'portrait';
        $upload = new Upload();
        $img = $upload->setImageInformation($data['img'], $img->id, $type);

        if ($img) {
            return true;
        }
        return false;
    }

    /*
     * 开关
     */
    public function setSwitch($data, $user=null)
    {
        $user_id = $user['user']['id'];
        $user = User::findOne(['id'=>$user_id]);

        if (isset($data['system_switch']) || !empty($data['system_switch'])) {
            $user->system_switch = $data['system_switch'];
            if (!$user->save(false)) {
                return false;
            }
            return true;
        }

        if (isset($data['check_switch']) || !empty($data['check_switch'])) {
            $user->check_switch = $data['check_switch'];
            if (!$user->save(false)) {
                return false;
            }
            return true;
        }

        if (isset($data['open_switch']) || !empty($data['open_switch'])) {

            $service = Service::findOne(['id'=>$user->pid]);
            $service->state = $data['open_switch'];
            if (!$service->save(false)) {
                return false;
            }
            return true;
        }

        return false;
    }


    /*
     * 我的客户
     */
    public function myUser($data, $user)
    {
        $user_id = $user['user']['id'];

        //1.我的会员总数
        $count = Member::find()->where(['pid' => $user_id])->count();
        $end_at = time();
        //2.最近新增会员数
        $newCount = 0;
        if (!isset($data['days']) || empty($data['days'])) {
            $days = 3;
        } else {
            $days = $data['days'];
        }
        switch ($days) {
            case 3:
                $start_at = time() - 3*24*3600;
                $newCount = Member::find()->where(['between', 'created_at', $start_at, $end_at])->andWhere(['pid' => $user_id])->count();
                break;
            case 7:
                $start_at = time() - 7*24*3600;
                $newCount = Member::find()->where(['between', 'created_at', $start_at, $end_at])->andWhere(['pid' => $user_id])->count();
                break;
            case 30:
                $start_at = time() - 30*24*3600;
                $newCount = Member::find()->where(['between', 'created_at', $start_at, $end_at])->andWhere(['pid' => $user_id])->count();
                break;
        }

        $user = ['amount' => $count, 'newCount' => $newCount];
        return $user;
    }

    /*
     * 添加客户
     */
    public function addUser($data, $user)
    {
        $user_id = $user['user']['id'];

        $member = Member::findOne(['phone' => $data['phone']]);
        if ($member) {
            $this->addError('message', '该手机号已被注册');
            return false;
        }

        //生成账号;
        $model = new Member();
        $model->phone = $data['phone'];
        $model->pid = $user_id;
        $model->created_at = time();
//        $model->type = $data['type'];
        if (!$model->save(false)) {
            $this->addError('message', '注册失败');
            return false;
        }

        //同步生成邀请码的绑定
        $code_id = InvitationCode::findOne(['user_id'=>$user_id])->id;
        $new_id = Member::findOne(['phone' => $data['phone']])->id;
        $code = new MemberCode();
        $code->member_id = $new_id;
        $code->code_id = $code_id;
        $code->created_at = time();
        if (!$code->save(false)) {
            $this->addError('message', '注册失败');
            return false;
        }

        //生成空的认证
        $identification = new Identification();
        $identification->member_id = $model->id;
        $identification->created_at = time();
        if (!$identification->save(false)) {
            $this->addError('message', '认证信息失败');
            return false;
        }

        return true;
    }

    /*
     * 客户列表
     */
    public function userList($data, $user)
    {
        $user_id = $user['user']['id'];
        if (!isset($data['page']) || empty($data['page'])) {
            $data['page'] = 1;
        }

        $count = Member::find()->where(['pid' => $user_id])->count();
        //TODO:修改size
        $size = 3;
        $pageTotal = ceil($count/$size);
        $pageSize = ($data['page']-1)* $size;
        $list = Member::find()->select('id, phone, type, created_at')
            ->where(['pid' => $user_id])
            ->orderBy(['created_at' => SORT_DESC])
            ->asArray()
            ->limit($size)
            ->offset($pageSize)
            ->all();


        if (!isset($list) || empty($list)) {
            $this->addError('message', '暂无用户');
            return null;
        }

        foreach ($list as &$v) {
            // 加入客户姓名
            $name = Identification::findOne(['member_id'=>$v['id'],'status'=>1]);
            if (!isset($name) || empty($name)) {
                $v['name'] = '未实名认证';
            } else {
                $v['name'] = $name->name;
            }
            // 转换客户类型
            if ($v['type'] == 1){
                $v['type'] = '个人用户';
            } elseif($v['type'] == 2) {
                $v['type'] = '组织用户';
            } else {
                $v['type'] = '未认证';
            }
            //头像
            $img = MemberImg::findOne(['member_id'=>$v['id']]);
            if (!isset($img) || empty($img)) {
                $v['photo'] = '';
            } else {
                $v['photo'] = Yii::$app->params['img_domain'].$img->img_path;
            }
        }
        $pageInfo = ['page'=>$data['page'], 'pageTotal'=>$pageTotal];
        $all = ['list'=>$list, 'pageInfo'=>$pageInfo];
        return $all;
    }

    /*
     * 客户详情
     */
    public function userDetail($data, $user)
    {
        //用户信息
        $member = Member::find()->select('id, phone, type')
            ->where(['id' => $data['member_id']])
            ->asArray()
            ->one();
        if ($member['type'] == 1) {
            $arr = 'name, sex, birthday, licence, start_at, end_at';
        } else {
            $arr = 'name, licence';
        }

        //用户实名认证信息
        $name = Identification::find()->select($arr)
            ->where(['member_id' => $data['member_id']])
            ->asArray()
            ->one();
        if (!isset($name) || empty($name)) {
            $member['name'] = '未实名认证';
            $name = '暂未实名认证';
        } else {
            $member['name'] = $name['name'];
        }
        // 转换客户类型
        if ($member['type'] == 1){
            $member['typeName'] = '个人用户';
        } elseif($member['type'] == 2) {
            $member['typeName'] = '组织用户';
        } else {
            $member['typeName'] = '未认证';
        }

        //TODO:头像怎么拿到
        //头像
        $img = MemberImg::findOne(['member_id'=>$member['id']]);
        if (!isset($img) || empty($img)) {
            $photo = '';
        } else {
            $photo = Yii::$app->params['img_domain'].$img->img_path;
        }
        $member['photo'] = $photo;

        //用户驾驶证信息
        $license = DrivingLicense::find()->where(['member_id'=>$member['id']])->asArray()->all();
        if (!isset($license) || empty($license)) {
            $license = '';
        }

        $data = ['member'=>$member, 'realInfo'=>$name, 'license'=>$license];
        return $data;
    }


}
