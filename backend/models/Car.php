<?php

namespace backend\models;

use common\models\Helper;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "cdc_car".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $license_number
 * @property string $type
 * @property string $owner
 * @property string $nature
 * @property string $brand_num
 * @property string $discern_num
 * @property string $motor_num
 * @property integer $load_num
 * @property string $sign_at
 * @property string $certificate_at
 * @property integer $stick
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Car extends \yii\db\ActiveRecord
{
    public $info;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%car}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'load_num', 'stick', 'status', 'created_at', 'updated_at'], 'integer'],
            [['license_number', 'type', 'nature', 'brand_num', 'discern_num', 'motor_num', 'sign_at', 'certificate_at'], 'string', 'max' => 50],
            [['owner', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'member_id' => '所属人id',
            'license_number' => '车牌号',
            'type' => '车辆类型',
            'owner' => '车辆所有人',
            'nature' => '使用性质',
            'brand_num' => '品牌型号',
            'discern_num' => '车辆识别代号',
            'motor_num' => '发动机编号',
            'load_num' => '荷载人数',
            'sign_at' => '注册日期',
            'certificate_at' => '发证日期',
            'stick' => '车辆默认 0:不 1:默认',
            'status' => '1:正常 0:待审核',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'info' => '不通过的理由',
        ];
    }


    public function addCar()
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

    public function updateCar()
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

    public function checkInfo()
    {
        $query = Car::find()->select('id, member_id, status, updated_at')->where(['status'=>[0,2]])->orderBy(['status'=>SORT_ASC,'updated_at'=>SORT_DESC]);

        $model = new ActiveDataProvider([
            'query' => $query
        ]);
        return $model;
    }

    public function carPass($id)
    {
        $car = Car::findOne($id);
        $car->status = 2;

        if (!$car->save(false)) {
            return false;
        }

        $real = \common\models\Identification::findOne(['member_id'=>$car->member_id]);
        $member = Member::findOne(['id'=>$car->member_id]);
        if (!isset($real) || empty($real)) {
            $realName = $member->phone;
        } else {
            $realName = $real->name;
        }

        $newsA = '您的车辆【'. $car->license_number .'】信息更改请求通过';
        $user_idA = $member->id;
        $switch = \common\models\Member::findOne($user_idA);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('member', $user_idA, $newsA);
            \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
            \common\components\Helper::pushMemberMessage($user_idA,$newsA);
        }
        $newsB = '您的会员【'. $realName .'】的车辆【'. $car->license_number .'】信息更改请求通过';
        $user_idB = $member->pid;
        $switch = \common\models\User::findOne($user_idB);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('user', $user_idB, $newsB);
            \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
            \common\components\Helper::pushServiceMessage($user_idB,$newsB);
        }
        return true;
    }

    public function carOut($data)
    {
        $id = $data['Car']['id'];
        $info = $data['Car']['info'];

        $car = Car::findOne($id);
        $car->status = 2;
        if (!$car->save(false)) {
            return false;
        }
        $real = \common\models\Identification::findOne(['member_id'=>$car->member_id]);
        $member = Member::findOne(['id'=>$car->member_id]);
        if (!isset($real) || empty($real)) {
            $realName = $member->phone;
        } else {
            $realName = $real->name;
        }

        $newsA = '您的车辆【'. $car->license_number .'】信息更改请求未通过';
        $user_idA = $member->id;
        $switch = \common\models\Member::findOne($user_idA);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('member', $user_idA, $newsA);
            \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
            \common\components\Helper::pushMemberMessage($user_idA,$newsA);
        }
        $newsB = '您的会员【'. $realName .'】的车辆【'. $car->license_number .'】信息更改请求未通过，理由为 【'. trim($info) .'】';
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
