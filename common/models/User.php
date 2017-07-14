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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
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
 * @property integer $pid
 * @property integer $role_id
 * @property string $phone
 * @property string $password
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $last_login_at
 * @property string $last_login_ip
 * @property string $access_token
 * @property string $login_count
 * @property integer $type
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
            [['username', 'phone', 'last_login_ip', 'login_count'], 'string', 'max' => 50],
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
    public function validatePassword($password, $oldPassword)
    {
        return Yii::$app->security->validatePassword($password, $oldPassword);
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

        $detail = User::findOne(['username'=>$data['username']]);

        if(!isset($detail) || !User::validatePassword($data['password'],$detail->password)){
            $this->addError('message', '账号或密码错误');
            return false;
        }
        if($detail->status != 1){
            $this->addError('message', '请联系管理员');
            return false;
        }
        $detail->last_login_at = time();
        $detail->last_login_ip = Yii::$app->request->getUserIP();
        if ($detail->save(false)) {
            return true;
        }

        return false;

    }

    /*
     * 手机号更换
     */
    public function phone($data)
    {
        if (empty($data['phone']) || empty($data['code'])) {
            $this->addError('message', '手机号或验证码不能为空');
            return false;
        }
        $code = MessageCode::findOne(['phone' => $data['phone'], 'code' => $data['code'], 'status'=>0]);
        if (!isset($code) || empty($code)) {
            $this->addError('message', '验证码错误');
            return false;
        }

        $code->status = 1;
        $code->save(false);
        $user_id = 2;
        //TODO:id
        if ($data['step'] == 2) {
            $user = User::findOne(['id'=>$user_id]);
            $user->phone = $data['phone'];
            $user->save(false);
        }

        return true;
    }

    /*
     * 我的邀请码
     */
    public function invite()
    {
        $user_id = 2;
        //TODO:id
        $code = InvitationCode::findOne(['user_id'=>$user_id,'status'=>0]);
        if (!isset($code) || empty($code)) {
            $this->addError('message', '您还有没有邀请码');
            return false;
        }

        return $code->code;
    }

    /*
     * 我的客户
     */
    public function myUser($data)
    {
        $user_id = 2;
        //TODO:id
        //1.我的会员总数
        $count = Member::find()->where(['pid' => $user_id])->count();
        $end_at = time();
        //2.最近新增会员数
        $newCount = 0;
        switch ($data['date']) {
            case 1:
                $start_at = time() - 7*24*3600;
                $newCount = Member::find()->where(['between', 'created_at', $start_at, $end_at])->andWhere(['pid' => $user_id])->count();
                break;
            case 2:
                $start_at = time() - 30*24*3600;
                $newCount = Member::find()->where(['between', 'created_at', $start_at, $end_at])->andWhere(['pid' => $user_id])->count();
                break;
            case 3:
                $newCount = Member::find()->where(['pid' => $user_id])->count();
                break;
        }

        $user = ['amount' => $count, 'newCount' => $newCount];
        return $user;
    }

    /*
     * 添加客户
     */
    public function addUser($data)
    {
        $user_id = 2;
        //TODO:id
        $user = User::findOne(['username' => $data['phone']]);
        if($user){
            $this->addError('message', '该手机号已被注册');
            return false;
        }

        //生成账号;
        $this->username = $data['phone'];
        $this->pid = $user_id;
        $this->phone = $data['phone'];
        $this->created_at = time();
        $this->type = $data['type'];
        if (!$this->save(false)) {
            $this->addError('message', '注册失败');
            return false;
        }

        //同步生成邀请码的绑定
        $code_id = InvitationCode::findOne(['user_id'=>$user_id])->id;
        $new_id = User::findOne(['username' => $data['phone']])->id;
        $code = new UserCode();
        $code->user_id = $new_id;
        $code->code_id = $code_id;
        if (!$code->save(false)) {
            $this->addError('message', '注册失败');
            return false;
        }
        return true;
    }

    /*
     * 客户列表
     */
    public function userList($page)
    {
        $user_id = 2;
        //TODO:id
        $size = 15;
        $pagesize =($page-1)* $size;
        $data = User::find()->select('id, phone, type')
            ->where(['pid' => $user_id])
            ->asArray()
            ->limit($size)
            ->offset($pagesize)
//            ->batch(3);
//            ->each(3);
            ->all();
        if (!isset($data) || empty($data)) {
            $this->addError('message', '暂无用户');
            return null;
        }

        foreach ($data as &$v) {
            // 加入客户姓名
            $name = Identification::findOne(['user_id'=>$v['id']]);
            if (!isset($name) || empty($name)) {
                $v['name'] = '未实名认证';
            } else {
                $v['name'] = $name->name;
            }

            // 转换客户类型
            if ($v['type'] == 1){
                $v['type'] = '个人用户';
            } else {
                $v['type'] = '组织用户';
            }
        }

        return $data;
    }

    /*
     * 客户详情
     */
    public function userDetail($id)
    {
        //用户信息
        //TODO:记得删除测试数据
        $user = User::find()->select('id, phone, type')
            ->where(['id' => $id])
            ->asArray()
            ->one();
        if ($user['type'] == 1) {
            $arr = 'name, sex, birthday, licence, start_at, end_at';
        } else {
            $arr = 'name, licence';
        }

        //用户实名认证信息
        $name = Identification::find()->select($arr)
            ->where(['user_id' => $id])
            ->asArray()
            ->one();
        if (!isset($name) || empty($name)) {
            $user['name'] = '未实名认证';
            $name = '暂未实名认证';
        } else {
            $user['name'] = $name['name'];
        }
        // 转换客户类型
        if ($user['type'] == 1){
            $user['type'] = '个人用户';
        } else {
            $user['type'] = '组织用户';
        }

        //用户驾驶证信息
        $license = new DrivingLicense();
        $license = $license->getDriver($id);

        $data = ['user'=>$user, 'real'=>$name, 'license'=>$license];
        return $data;
    }


}
