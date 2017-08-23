<?php

namespace backend\models;

use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%driving_license}}".
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
    public $img;
    public $imgs;
    public $info;
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
            [['member_id', 'name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at', 'imgs'], 'required'],
            [['member_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at'], 'string', 'max' => 50],
            [['info'], 'string', 'max' => 200],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at', 'imgs'],
            'update' => ['name', 'sex', 'nationality', 'papers', 'birthday', 'certificate_at', 'permit', 'start_at', 'end_at', 'imgs'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => '用户id',
            'name' => '姓名',
            'sex' => '性别',
            'nationality' => '国籍',
            'papers' => '证件号',
            'birthday' => '出生日期',
            'certificate_at' => '领证日期',
            'permit' => '准驾车型',
            'start_at' => '生效时间',
            'end_at' => '失效时间',
            'status' => '1:正常 0:待审核',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'img' => '驾驶证图片',
            'info' => '不通过的理由'
        ];
    }
    public function addDrivingLicense()
    {
        if(!$this->validate()){
            return false;
        }

        $this->imgs = explode(',', trim($this->imgs,','));
        if(count($this->imgs) < 2){
            $this->addError('imgs', '请上传2张附件');
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                print_r($this->getFirstErrors());
                throw new Exception('error');
            }

            //更新图片
            //设置图片绑定
            $models =  DrivingImg::find()->where(['id'=> $this->imgs])->all();
            foreach ($models as $model){
                $model->driver_id = $this->id;
                $model->status = 1;
                if(!$model->save(false)){
                    throw new Exception("绑定图片信息失败");
                }
            }

            return $this;
        });
    }

    public function updateDrivingLicense()
    {

        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }

    /**
     * 上传土图片要用到的
     * @param $data
     * @param string $type
     * @return ServiceImg|null
     */
    public function saveImg($data, $type = 'head')
    {
        $model = new DrivingImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save()){
            return null;
        }
        return $model;
    }

    public static function getOne($id)
    {
        $model = DrivingLicense::findOne($id);

        $imgs = DrivingImg::find()->where(['driver_id'=>$id, 'status'=> 1])->select('id')->column();

        $model->imgs = implode(",",$imgs);

        return $model;
    }

    public  function getPic()
    {
        return $this->hasMany(DrivingImg::className(), ['driver_id'=> 'id'])->where(['status'=> 1]);
    }

    public function getPicImg()
    {
        $arr = [];
        foreach($this->pic as $i){
            $arr[] = '<img src="'.Yii::$app->params['img_domain']. $i->thumb.'" />';
        }
        return $arr;
    }

    public function checkInfo()
    {
        $query = DrivingLicense::find()->select('id, member_id, status, updated_at')->where(['status'=>[0,2]])->orderBy(['status'=>SORT_ASC,'updated_at'=>SORT_DESC]);

        $model = new ActiveDataProvider([
            'query' => $query
        ]);
        return $model;
    }

    public function driverPass($id)
    {
        $driver = DrivingLicense::findOne($id);
        $driver->status = 2;
        if (!$driver->save(false)) {
            return false;
        }

        $real = \common\models\Identification::findOne(['member_id'=>$driver->member_id,'status'=>1]);
        $member = Member::findOne(['id'=>$driver->member_id]);

        if (!isset($real) || empty($real)) {
            $realName = $member->phone;
        } else {
            $realName = $real->name;
        }

        $newsA = '您的驾驶证【'. $driver->name .'】信息更改请求通过';
        $user_idA = $member->id;
        $switch = \common\models\Member::findOne($user_idA);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('member', $user_idA, $newsA);
            \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
            \common\components\Helper::pushMemberMessage($user_idA,$newsA);
        }
        $newsB = '您的会员【'. $realName .'】的驾驶证【'. $driver->name .'】信息更改请求通过';
        $user_idB = $member->pid;
        $switch = \common\models\User::findOne($user_idB);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('user', $user_idB, $newsB);
            \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
            \common\components\Helper::pushServiceMessage($user_idB,$newsB);
        }

        return true;
    }

    public function driverOut($data)
    {
        $id = $data['DrivingLicense']['id'];
        $info = $data['DrivingLicense']['info'];

        $driver = DrivingLicense::findOne($id);
        $driver->status = 2;
        if (!$driver->save(false)) {
            return false;
        }

        $driver = DrivingLicense::findOne($id);
        $real = \common\models\Identification::findOne(['member_id'=>$driver->member_id,'status'=>1]);
        $member = Member::findOne(['id'=>$driver->member_id]);

        if (!isset($real) || empty($real)) {
            $realName = $member->phone;
        } else {
            $realName = $real->name;
        }

        $newsA = '您的驾驶证【'. $driver->name .'】信息更改请求未通过';
        $user_idA = $member->id;
        $switch = \common\models\Member::findOne($user_idA);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('member', $user_idA, $newsA);
            \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
            \common\components\Helper::pushMemberMessage($user_idA,$newsA);
        }
        $newsB = '您的会员【'. $realName .'】的驾驶证【'. $driver->name .'】信息更改请求未通过，理由为 【'. trim($info) .'】';
        $user_idB = $member->pid;
        $switch = \common\models\User::findOne($user_idB);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('user', $user_idB, $newsB);
            \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
            \common\components\Helper::pushServiceMessage($user_idB,$newsB);
        }

        return true;
    }
}
