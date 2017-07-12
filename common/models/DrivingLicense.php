<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_driving_license".
 *
 * @property integer $id
 * @property integer $user_id
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
        return 'cdc_driving_license';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
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
            'user_id' => 'User ID',
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

    /*
     * 驾驶证添加
     */
    public function add($data)
    {
        if (!isset($data['id']) || empty($data['id'])) {
            $user_id = 1;
            //TODO:id
        } else {
            $user_id = $data['id'];
        }
        if (empty($data['name']) || empty($data['sex']) || empty($data['papers']) || empty($data['permit'])) {
            $this->addError('message', '必填项信息不能为空');
            return false;
        }
        $user = User::findOne(['id'=>$user_id]);
        if ($user->type == 0) {
            $user->type = $data['type'];
            $user->save(false);
        }


        $this->load(['formName'=>$data],'formName');
        $this->user_id = $user_id;

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
}
