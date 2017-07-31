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

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "cdc_driving_license".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $name
 * @property string $sex
 * @property string $nationality
 * @property string $papers
 * @property string $birthday
 * @property string $certificate_at
 * @property string $permit
 * @property string $start_at
 * @property string $end_at
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class DrivingLicense extends \yii\db\ActiveRecord
{
    public $img_ids;
    protected $transaction;
    public $errorMsg;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%driving_license}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id'], 'integer'],
            [['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'member ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'nationality' => 'Nationality',
            'papers' => 'Papers',
            'birthday' => 'Birthday',
            'certificate_at' => 'Certificate At',
            'permit' => 'Permit',
            'start_at' => 'Start At',
            'end_at' => 'End At',
        ];
    }

    /**
     * 驾驶证列表
     */
    public function getDriver($data, $member)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        $arr = 'id, name, sex, papers, permit';
        $license = DrivingLicense::find()->select($arr)
            ->where(['member_id' => $member_id])
            ->asArray()
            ->all();
        //用户类型信息
        $userType = Member::findOne(['id'=>$member_id]);
        if (!isset($license) || empty($license)) {
            $license = ['userType'=>$userType->type, 'license'=>$license];
            return $license;
        }
        $license = ['userType'=>$userType->type, 'license'=>$license];
        return $license;
    }


    /*
     * 添加驾驶证
     */
    public function addDriver($data, $member)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        if (empty($data['name']) || empty($data['sex']) || empty($data['papers']) || empty($data['permit'])) {
            $this->addError('message', '必填项信息不能为空');
            return false;
        }
//        $member = Member::findOne(['id'=>$member_id]);
//        if ($member->type == 0) {
//            $member->type = $data['type'];
//            $member->save(false);
//        }

        $this->load(['formName'=>$data],'formName');
        $user = Member::findOne(['id'=>$member_id]);
        if (!isset($user) || empty($user)) {
            $this->addError('message', '用户不存在');
            return false;
        }
        $this->member_id = $member_id;
        $this->created_at = time();
        //生成消息提示给业务员
//        $real = Identification::findOne(['member_id'=>$member_id]);
//        if (!isset($real) || empty($real)) {
//            $realName = $user->phone;
//        } else {
//            $realName = $real->name;
//        }
//        $newsA = '您的会员【'. $realName .'】的驾驶证【'. $data['name'] .'】信息更改请求通过';
//        $modelA = 'user';
//        $user_idA = $user->pid;
//        $newA = \common\models\Notice::userNews($modelA, $user_idA, $newsA);
//        //生成消息提示给客户
//        $newsB = '您【'. $data['name'] .'】的驾驶证信息更改请求通过';
//        $modelB = 'member';
//        $user_idB = $member_id;
//        $newB = \common\models\Notice::userNews($modelB, $user_idB, $newsB);
//        if (!$newA || !$newB) {
//            return false;
//        }
        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            if(!$this->save(false)){
                $this->errorMsg = '保存失败';
                $this->transaction->rollBack();
                return null;
            }

            $driver_id = $this->attributes['id'];
            $upload = new Upload();
            $type = 'driver';
            $img = $upload->setImageInformation($data['img'], $driver_id, $type);
            if (!$img) {
                $this->errorMsg = '保存失败';
                $this->transaction->rollBack();
                return null;
            }
            $this->transaction->commit();
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }
        return true;
    }

    /*
     * 驾驶证详情
     */
    public function getDetail($data)
    {
        //详情所需字段
        $arr = ['id','name','sex','nationality','papers','birthday','certificate_at','permit','start_at','end_at'];
        $driver = DrivingLicense::find()->select($arr)
            ->where(['id'=> $data['driver_id']])
            ->asArray()
            ->one();

        if(!isset($driver) || empty($driver)){
            return null;
        }
        //转换时间和加入图片
        $img = DrivingImg::find()->select('img_path')->where(['driver_id'=> $driver['id']])->asArray()->all();
        $driverImg = [];
        foreach ($img as &$v) {
            $driverImg[] = $_SERVER['HTTP_HOST'].$v['img_path'];
        }
        $driver['img_path'] = $driverImg;
        return $driver;
    }

    /**
     * 删除驾驶证
     */
    public function delDriver($data)
    {
        $driver = $this::findOne(['id'=>$data['driver_id']])->delete();
        if ($driver) {
            return true;
        }
        return false;
    }

    /*
     * 修改驾驶证
     */
    public function updateDriver($data)
    {
        $driver = $this::findOne(['id'=>$data['driver_id']]);

        if (!isset($driver) || empty($driver)) {
            $this->addError('message', '要啥自行车');
            return false;
        }
        $driver->load(['formName'=>$data],'formName');
        $driver->status = 0;

        if ($driver->save(false)) {
            return true;
        }

        return false;
    }
}
