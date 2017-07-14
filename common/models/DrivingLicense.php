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
 */
class DrivingLicense extends \yii\db\ActiveRecord
{
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
    public function getDriver($member_id)
    {
        if (!isset($member_id) || empty($member_id)) {
            $license = DrivingLicense::find()->select('id, name, sex, permit, papers')
                ->where(['member_id' => $member_id])
                ->asArray()
                ->all();
            if (!isset($license) || empty($license)) {
                $license = '暂无驾驶证';
            }

            return $license;
        } else {
            $arr = 'name, sex, nationality, papers, birthday, certificate_at, permit, start_at, end_at';
            $license = DrivingLicense::find()->select($arr)
                ->where(['member_id' => $member_id])
                ->asArray()
                ->all();
            if (!isset($license) || empty($license)) {
                $license = '暂无添加驾驶证';
            }

            return $license;
        }

    }

    /*
     * 添加驾驶证
     */
    public function addDriver($data)
    {
        if (empty($data['name']) || empty($data['sex']) || empty($data['papers']) || empty($data['permit'])) {
            $this->addError('message', '必填项信息不能为空');
            return false;
        }
        $member = Member::findOne(['id'=>$data['member_id']]);
        if ($member->type == 0) {
            $member->type = $data['type'];
            $member->save(false);
        }


        $this->load(['formName'=>$data],'formName');
        $this->member_id = $data['member_id'];

        if ($this->save(false)) {
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

    /**
     * 删除驾驶证
     */
    public function delDriver($data)
    {
        $driver = $this::findOne(['id'=>$data['id']])->delete();
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
        $driver = $this::findOne(['id'=>$data['id']]);
        if (!isset($driver) || empty($driver)) {
            $this->addError('message', '要啥自行车');
            return false;
        }
        $driver->load(['formName'=>$data],'formName');

        if ($driver->validate()) {
            $driver->save(false);
            return true;
        }

        return false;
    }
}
