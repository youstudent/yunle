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
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Car extends \yii\db\ActiveRecord
{
    public $img_ids;
    protected $transaction;
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
    public function getList($data, $member=null)
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
    public function getCar($data, $member=null)
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
            ->where(['id'=> $data['car_id']])
            ->asArray()
            ->one();

        if(!isset($car) || empty($car)){
            return null;
        }
        //转换时间和加入图片
        $img = CarImg::find()->select('img_path')->where(['car_id'=> $car['id']])->asArray()->all();
        $carImg = [];
        foreach ($img as &$v) {
            $carImg[] = Yii::$app->params['img_domain'].$v['img_path'];
        }
        $car['img_path'] = $carImg;
        return $car;
    }

    /**
     * 添加车车
     */
    public function addCar($data, $member=null)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }
        $this->load(['formName'=>$data],'formName');
        $this->member_id = $member_id;
        $this->created_at = time();
        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            if(!$this->save(false)){
                $this->errorMsg = '保存失败';
                $this->transaction->rollBack();
                return null;
            }

            $car_id = $this->attributes['id'];
            $upload = new Upload();
            $type = 'car';
            $img = $upload->setImageInformation($data['img'], $car_id, $type);
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

    /**
     * 删除车车
     */
    public function delCar($data)
    {
        $discern_num = $this::findOne(['id'=>$data['car_id']])->discern_num;
        $code = substr($discern_num,(strlen($discern_num)-6));
        if ($data['code'] == $code ) {
            Car::findOne(['id'=>$data['car_id']])->delete();
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
        $car = Car::findOne(['id'=>$data['car_id']]);
        if (!isset($car) || empty($car)) {
            $this->addError('message', '要啥自行车');
            return false;
        }
        $car->load(['formName'=>$data],'formName');
        $car->status = 0;
        if ($car->save(false)) {
            return true;
        }
        return false;
    }

    /*
     * 设置默认
     */
    public function changeDefault($data, $member=null)
    {
        $old = Car::findOne(['stick'=>1]);
        if (isset($old) || !empty($old)) {
            $old->stick = 0;
            if (!$old->save(false)) {
                return false;
            }
        }

        $car = Car::findOne(['id'=>$data['car_id']]);
        $car->stick = 1;

        if (!$car->save(false)) {
            return false;
        }
        return true;
    }

}
