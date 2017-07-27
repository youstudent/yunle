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

use Yii;

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
 */
class Identification extends \yii\db\ActiveRecord
{
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
            [['member_id', 'status'], 'integer'],
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
            'member_id' => 'Member ID',
            'name' => 'Name',
            'nation' => 'Nation',
            'status' => 'Status',
            'licence' => 'Licence',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'start_at' => 'Start At',
            'end_at' => 'End At',
        ];
    }

    /*
     * 查看认证
     */
    public function view($data)
    {
        //TODO:id
        if (!isset($data['id']) || empty($data['id'])) {
            $member_id = 1;
            //TODO:id
        } else {
            $member_id = $data['id'];
        }
        $type = Member::findOne(['id'=>$member_id])->type;
        $identification = Identification::findOne(['member_id'=>$member_id]);
        if (!isset($identification) || empty($identification)) {
            $this->addError('message', '请认证');
            return false;
        }
        if ($type == 1) {
            $identification = Identification::findOne(['member_id'=>$member_id]);
        } else {
            $identification = Identification::find()->select('name, licence')->where(['member_id'=>$member_id])->asArray()->all();
        }

        return $identification;
    }

    /*
     * 认证
     */
    public function approve($data)
    {
        if (!isset($data['id']) || empty($data['id'])) {
            $member_id = 1;
            //TODO:id
        } else {
            $member_id = $data['id'];
        }

        if (empty($data['name']) || empty($data['licence'])) {
            $this->addError('message', '认证信息不能为空');
            return false;
        }
        $member = Member::findOne(['id'=>$member_id]);
        $member->type = $data['type'];

        $this->load(['formName'=>$data],'formName');
        $this->member_id = $member_id;

        if ($this->save(false) && $member->save(false)) {
            return true;
        }
        return false;
    //TODO: 图片的添加
        //同步上传逻辑,处理图片
//        $upload = new Upload();
//        $img_id = $upload->uploadCarImgs(null);
//        if(!isset($img_id)){
//            $this->errorMsg = '图片获取失败';
//            return null;
//        }
//        if(!$this->save()){
//            $this->errorMsg = '保存失败';
//            return null;
//        }
//        //更新上传文件
//        CarImg::bindCar($this->id, $img_id);
//        return $this->id ? $this : null;
    }
}
