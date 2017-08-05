<?php
/**  */
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

use Yii;

/**
 * This is the model class for table "cdc_member".
 *
 * @property string $id
 * @property string $phone
 * @property integer $pid
 * @property string $email
 * @property integer $status
 * @property integer $system_switch
 * @property integer $order_switch
 * @property integer $check_switch
 * @property integer $type
 * @property integer $last_login_at
 * @property string $last_login_ip
 * @property string $access_token
 * @property integer $created_at
 * @property integer $updated_at
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'type', 'last_login_at', 'created_at', 'updated_at'], 'integer'],
            [['phone', 'last_login_ip'], 'string', 'max' => 50],
            [['email', 'access_token'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'pid' => 'Pid',
            'email' => 'Email',
            'status' => 'Status',
            'type' => 'Type',
            'last_login_at' => 'Last Login At',
            'last_login_ip' => 'Last Login Ip',
            'access_token' => 'Access Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /*
     * 客户端登录
     */
    public function login($data)
    {
        //登录表单
        if (empty($data['phone']) || empty($data['code'])) {
            $this->addError('message', '手机号或验证码不能为空');
            $this->addError('code', 2);
            return false;
        }

        //TODO:测试要去除
        // 验证码
        if ($data['code'] != 0000) {
            $code = MessageCode::findOne(['phone' => $data['phone'], 'code' => $data['code'], 'status'=>0]);
            if (!isset($code) || empty($code)) {
                $this->addError('message', '验证码错误');
                $this->addError('code', 3);
                return false;
            }
        }


        //账号验证
        $member = Member::findOne(['phone'=>$data['phone']]);

        if (!isset($member) || empty($member)) {
            $this->addError('message', '账号不存在,请注册');
            $this->addError('code', 4);
            return false;
        }

        if ($member->status != 1) {
            $this->addError('message', '账号异常,请联系管理员');
            $this->addError('code', 5);
            return false;
        }

        //保存登录数据
        $member->last_login_at = time();
        $member->last_login_ip = Yii::$app->request->getUserIP();

        $mem = [
            'member' => [ 'id'=> $member->id, 'phone'=> $member->phone, 'type'=> $member->type],
            'sites' => ['site_name'=> '云乐享车', 'version'=> '1.0', 'adminEmail'=> 'a@a.com']
        ];
        Yii::$app->session->set('mem',$mem);

        if ($member->save(false)) {
            return true;
        }
        return false;
    }

    /**
     * 退出登录
     * @param
     * @return bool|array
     */
    public function logout()
    {
        Yii::$app->session->destroy();
        Yii::$app->session->removeAll();
        return true;
    }

    /*
     * 个人信息
     */
    public function info($data, $member=null)
    {
        $member_id = $member['member']['id'];
        $img = MemberImg::findOne(['member_id'=>$member_id]);
        if (!isset($img) || empty($img)) {
            $photo = '';
        } else {
            $photo = Yii::$app->params['img_domain'].$img->img_path;
        }

        $phone = $member['member']['phone'];
        $type = Member::findOne(['phone'=>$phone])->type;
        $ident = Identification::findOne(['member_id'=>$member_id, 'status'=>1]);
        if (!isset($ident) || empty($ident)) {
            $status = 0;
            $name = '';
        } else {
            $status = 1;
            $name = $ident->name;
        }
        $person = ['photo'=>$photo, 'type'=>$type, 'phone'=>$phone, 'status'=>$status, 'name'=>$name];

        //三种状态订单数量
        $count1 = OrderDetail::find()->select('member_id, action')
            ->where(['member_id'=>$member_id, 'action'=>'待接单'])
            ->count();
        $count2 = OrderDetail::find()->select('member_id, action')
            ->where(['member_id'=>$member_id, 'action'=>'待交车'])
            ->count();
        $count3 = InsuranceDetail::find()->select('member_id, action')
            ->where(['member_id'=>$member_id, 'action'=>'核保成功'])
            ->count();
        $topStatus = [['statusName'=> '待接单','top'=>1,'count'=>$count1], ['statusName'=> '待交车', 'top'=>2,'count'=>$count2], ['statusName'=> '待交车', 'top'=>3,'count'=>$count3]];

        //我的管家
        $pid = Member::findOne(['id'=>$member_id])->pid;
        $myButler = User::findOne(['id'=>$pid]);
        if (!isset($myButler) || empty($myButler)) {
            $butlerName = '你从哪里来?';
            $level = '五星好不好';
        } else {
            $butlerName = $myButler->name;
            $level = $myButler->level;
            $phone = $myButler->phone;
        }
        $butler = ['butlerName'=>$butlerName, 'level'=>$level, 'phone'=>$phone];

        $info = ['person'=>$person, 'topStatus'=>$topStatus, 'butler'=>$butler];
        return $info;
    }

    /*
     * 头像上传
     */
    public function photo($data, $member=null)
    {
        $member_id = $member['member']['id'];
        $img = MemberImg::findOne(['member_id'=>$member_id]);
        $type = 'photo';
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
    public function setSwitch($data, $member=null)
    {
        $member_id = $member['member']['id'];
        $member = Member::findOne(['id'=>$member_id]);

        if (isset($data['system_switch']) || !empty($data['system_switch'])) {
            $member->system_switch = $data['system_switch'];
            if (!$member->save(false)) {
                return false;
            }
            return true;
        }
        if (isset($data['order_switch']) || !empty($data['order_switch'])) {
            $member->order_switch = $data['order_switch'];
            if (!$member->save(false)) {
                return false;
            }
            return true;
        }
        if (isset($data['check_switch']) || !empty($data['check_switch'])) {
            $member->check_switch = $data['check_switch'];
            if (!$member->save(false)) {
                return false;
            }
            return true;
        }

        return false;
    }

    /*
     * 配置信息
     */
    public function getDeploy($data,$member)
    {
        $member_id = $member['member']['id'];
        $deploy = Member::find()->select('system_switch, order_switch, check_switch')->asArray()
            ->where(['id'=>$member_id])
            ->one();

        if (!isset($deploy) || empty($deploy)) {
            return null;
        }
        if ($deploy['check_switch'] == 1) {
            $deploy['check_switch'] = true;
        } else {
            $deploy['check_switch'] = false;
        }
        if ($deploy['order_switch'] == 1) {
            $deploy['order_switch'] = true;
        } else {
            $deploy['order_switch'] = false;
        }
        if ($deploy['system_switch'] == 1) {
            $deploy['system_switch'] = true;
        } else {
            $deploy['system_switch'] = false;
        }
        return $deploy;

    }
}
