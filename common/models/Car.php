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
 * @property integer $user_id
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
        return 'cdc_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'load_num', 'sign_at', 'certificate_at', 'stick', 'created_at', 'updated_at'], 'integer'],
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
            'user_id' => 'User ID',
            'license_number' => 'License Number',
            'brand' => 'Brand',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 获取车车车
     * @return array
     */
    public function getCar($data)
    {
        if (!isset($data) || empty($data)) {
            $user_id = 1;
            //TODO:id
        } else {
            $user_id = $data['id'];
        }


        $car = Car::find()->select('license_number')
            ->where(['user_id'=> $user_id])
            ->orderBy(['stick' => SORT_DESC])
            ->asArray()
            ->all();

        if(!isset($car) || empty($car)){
            return null;
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
        $car['sign_at'] = date('Y年m月d日', $car['sign_at']);
        $car['certificate_at'] = date('Y年m月d日', $car['certificate_at']);
        $car['img_path'] = CarImg::find()->select('img_path')->where(['car_id'=> $car['id']])->asArray()->all();

        return $car;
    }

    /**
     * 添加车车
     */
    public function addCar($data)
    {
        if (!isset($data['id']) || empty($data['id'])) {
            $user_id = 1;
            //TODO:id
        } else {
            $user_id = $data['id'];
        }
        $this->load(['formName'=>$data],'formName');
        $this->user_id = $user_id;
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
            $del = Car::findOne($data['id'])->delete();
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
        $data['id'] = 1;
        $car = Car::findOne(['id'=>$data['id']]);
        if (!isset($car) || empty($car)) {
            $this->addError('message', '要啥自行车');
            return false;
        }
        $car->load(['formName'=>$data],'formName');

        if ($car->validate()) {
            $car->save(false);
            return true;
        }

        return false;
    }

}
