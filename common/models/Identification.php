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
use yii\base\Exception;

/**
 * This is the model class for table "cdc_identification".
 *
 * @property string $id
 * @property integer $member_id
 * @property string $name
 * @property string $nation
 * @property integer $status
 * @property string $licence
 * @property string $sex
 * @property string $birthday
 * @property string $start_at
 * @property string $end_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class Identification extends \yii\db\ActiveRecord
{
    public $img_ids;
    protected $transaction;
    public $errorMsg;
    public $id_start_end_time;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%identification}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id'], 'required'],
            [['member_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'sex', 'nation', 'birthday', 'start_at', 'end_at'], 'string', 'max' => 50],
            [['licence'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => '会员id',
            'name' => '姓名',
            'nation' => '民族',
            'status' => 'Status',
            'licence' => '代码',
            'sex' => '性别',
            'birthday' => '生日',
            'start_at' => '身份证生效时间',
            'end_at' => '身份证失效时间',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => '实名认证状态',
            'id_start_end_time' => '身份证有效期限',
        ];
    }

    /*
     * 查看认证
     */
    public function view($data, $member)
    {
        //获取member_id
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        $type = Member::findOne(['id'=>$member_id])->type;
        $identification = Identification::findOne(['member_id'=>$member_id]);
        if (!isset($identification) || empty($identification)) {
            $this->addError('message', '请认证');
            return false;
        }

        if ($type == 1) {
            $identification = Identification::findOne(['member_id'=>$member_id])->toArray();
        } else {
            $identification = Identification::find()->select('id, name, licence')->where(['member_id'=>$member_id])->asArray()->one();
        }
        // 获取图片
        $identificationImg = IdentificationImg::find()->select('img_path')->where(['ident_id'=> $identification['id']])->asArray()->all();
        $img = [];
        foreach ($identificationImg as &$v) {
            $img[] = $v['img_path'];
        }
        $identification['img'] = $img;
        return $identification;
    }

    /*
     * 认证
     */
    public function approve($data, $member)
    {
        //获取member_id
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        if (empty($data['name']) || empty($data['licence'])) {
            $this->addError('message', '认证信息不能为空');
            return false;
        }
        $member = Member::findOne(['id'=>$member_id]);
        $member->type = $data['type'];

        $end = Identification::findOne(['member_id' => $member_id]);
        $end->load(['formName'=>$data],'formName');
        $end->member_id = $member_id;
        $end->status = 1;
        $end->created_at = time();

        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            if(!$end->save(false)){
                $this->errorMsg = '保存失败';
                $this->transaction->rollBack();
                return null;
            }
            if(!$member->save(false)){
                $this->errorMsg = '保存失败';
                $this->transaction->rollBack();
                return null;
            }

            $ident_id = $end->attributes['id'];
            $upload = new Upload();
            $type = 'identification';
            $img = $upload->setImageInformation($data['img'], $ident_id, $type);
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

    public function updateInfo()
    {
        //$this->scenario = 'update';
        if(!$this->validate()){
            return false;
        }

        $model = $this;
        return Yii::$app->db->transaction(function() use($model){
            if($model->id_start_end_time){
                $id_valid_time = explode("-", $model->id_start_end_time);
                list($this->start_at, $this->end_at) = $id_valid_time;
            }
            if(!$model->save()){
                throw new Exception("更新会员认证信息失败");
            }
            return $model;
        });
    }
}
