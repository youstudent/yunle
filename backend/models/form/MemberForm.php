<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:36
 *
 */

namespace backend\models\form;

use backend\models\Member;
use backend\models\User;
use common\models\Identification;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class MemberForm extends Member
{

    public $service;
    public $salesman;

    public $extend;

    public function rules()
    {
        return [
            [['phone'], 'filter', 'filter' => 'trim'],
            [['phone', 'pid', 'status', 'type', 'service'], 'required'],
            ['phone', 'match', 'pattern' => \pd\helpers\PregRule::PHONE, 'message' => '手机号格式不正确'],
            ['phone', 'unique', 'targetClass' => '\backend\models\Member', 'message' => '手机号已存在.', 'on' => 'create'],
            ['phone', 'validateUpdatePhone' ,'message' => '手机号已存在.', 'on' => 'update'],
            [['pid', 'status', 'type', 'last_login_at', 'created_at', 'updated_at', 'service'], 'integer'],
            [['last_login_ip'], 'string', 'max' => 50],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['phone', 'pid', 'status', 'type', 'service'],
            'update' => ['phone', 'pid', 'status', 'type', 'service'],
        ];
    }

    public function attributes()
    {
        return ArrayHelper::merge(parent::attributes(), [
            'service', 'salesman',
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'service' => '服务商',
            'salesman' => '业务员'
        ]);
    }

    public function attributeHints()
    {
        return [
            'phone' => '一个电话仅能使用一次',
        ];
    }

    public function addMember($form)
    {
        $this->scenario = 'create';
        if(!$this->load($form)){
            return false;
        }
        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
           $this->created_at = time();
            $this->updated_at = time();
           if(!$this->save() || !$this->createIdentification($this->id)){
               throw new Exception("添加会员信息失败");
           }
           return $this;
        });
    }



    public function updateMember()
    {
        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception("更新会员信息失败");
            }
            return $this;
        });
    }

    /**
     * 创建会员的实名信息
     * @param $member_id
     * @return bool
     */
    private function createIdentification($member_id)
    {
        $model = new Identification();
        $model->member_id = $member_id;
        $model->status = 0;
        return $model->save();
    }

    public static function getOne($member_id)
    {
        $model = MemberForm::findOne($member_id);
        return $model;
    }

    public function validateUpdatePhone($attribute, $params)
    {
        if(!$this->hasErrors()){
            if($this->phone != $this->getOldAttribute('phone')){
                $count = MemberForm::find()->where(['phone' => $this->phone ])->count();
                if($count > 0){
                    $this->addError($attribute, '手机号不能重复');
                }
            }
        }
    }
}