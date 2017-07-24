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
 * This is the model class for table "cdc_car".
 *
 * @property string $id
 * @property integer $member_id
 * @property string $license_number
 * @property string $type
 * @property string $owner
 * @property string $nature
 * @property string $brand_num
 * @property string $discern_num
 * @property string $motor_num
 * @property integer $load_num
 * @property integer $sign_at
 * @property integer $certificate_at
 * @property integer $stick
 * @property integer $created_at
 * @property integer $updated_at
 */
class Car extends \yii\db\ActiveRecord
{
    //暂存图片的id
    public $img_ids;

    public $errorMsg;
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
            [['member_id'], 'required'],
            [['member_id', 'load_num', 'sign_at', 'certificate_at', 'stick', 'created_at', 'updated_at'], 'integer'],
            [['license_number', 'type', 'nature', 'brand_num', 'discern_num', 'motor_num'], 'string', 'max' => 50],
            [['owner'], 'string', 'max' => 255],
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
            'license_number' => 'License Number',
            'brand' => 'Brand',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 获取首页车牌车
     * @return array
     */
    public function getList($member)
    {
        //获取个人信息
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        $car = Car::find()->select('id, license_number, stick')
            ->where(['member_id'=> $member_id])
            ->orderBy(['stick' => SORT_DESC, 'created_at' => SORT_DESC])
            ->asArray()
            ->limit(10)
            ->all();

        if(!isset($car) || empty($car)){
            return null;
        }
        foreach ($car as &$v) {
            $v['stick'] = Helper::getStick($v['stick']);
        }
        return $car;
    }

    /**
     * 获取车车车
     * @return array
     */
    public function getCar($member)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        $car = Car::find()->select('id, license_number, type, created_at, stick')
            ->where(['member_id'=> $member_id])
            ->orderBy(['stick' => SORT_DESC, 'created_at' => SORT_DESC])
            ->asArray()
            ->limit(10)
            ->all();

        if(!isset($car) || empty($car)){
            return null;
        }
        foreach ($car as &$v) {
            $v['created_at'] = date('Y/m/d H:i', $v['created_at']);
        }
        return $car;
    }

    /**
     * 获取车车详情
     * @return array
     */
    public function getDetail($data)
    {
        //详情所需字段
        $arr = ['id','license_number','type','owner','nature','brand_num','discern_num','motor_num','load_num','sign_at','certificate_at'];
        $car = Car::find()->select($arr)
            ->where(['id'=> $data['id']])
            ->asArray()
            ->one();

        if(!isset($car) || empty($car)){
            return null;
        }
        //转换时间和加入图片
        $img = CarImg::find()->select('img_path')->where(['car_id'=> $car['id']])->asArray()->all();
        $carImg = [];
        foreach ($img as &$v) {
            $carImg[] = $v['img_path'];
        }
        $car['img_path'] = $carImg;
        return $car;
    }

    /**
     * 添加车车
     */
    public function addCar($data)
    {
        $this->load(['formName'=>$data],'formName');
        $this->created_at = time();
        //TODO: 图片的添加

        //同步上传逻辑,处理图片
        $upload = new Upload();
        $img_id = $upload->uploadCarImgs(null);
        if(!isset($img_id)){
            $this->errorMsg = '图片获取失败';
            return null;
        }
        if(!$this->save()){
            $this->errorMsg = '保存失败';
            return null;
        }
        //更新上传文件
        CarImg::bindCar($this->id, $img_id);
        return $this->id ? $this : null;
    }

    /**
     * 删除车车
     */
    public function delCar($data)
    {
        $discern_num = $this::findOne(['id'=>$data['id']])->discern_num;
        $code = substr($discern_num,(strlen($discern_num)-6));
        if ($data['code'] == $code ) {
            Car::findOne($data['id'])->delete();
            return true;
        } else {
            $this->addError('message', '识别码错误');
            return false;
        }
    }

    /*
     * 修改车车
     */
    public function updateCar($data)
    {
        $car = Car::findOne(['id'=>$data['id']]);
        if (!isset($car) || empty($car)) {
            $this->addError('message', '要啥自行车');
            return false;
        }
        $car->load(['formName'=>$data],'formName');

        if ($car->save(false)) {
            return true;
        }
        return false;
    }

}
