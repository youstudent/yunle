<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午2:56
 *
 */

namespace backend\models\form;


use backend\models\Car;
use common\models\CarImg;
use yii\helpers\ArrayHelper;
use Yii;
use yii\db\Exception;

class CarForm extends Car
{
    public $car_imgs;
    public $car_img;

    public $car_img_id;


    public function rules()
    {
        return [
            [['car_img_id'], 'safe']
        ];
    }

    public function scenarios()
    {

        return [
            'create' => ['car_img','car_imgs','car_img_id','member_id', 'license_number', 'type', 'owner', 'nature', 'brand_num', 'discern_num', 'motor_num', 'load_num', 'sign_at', 'certificate_at', 'stick', 'status'],
            'update' => ['car_img','car_imgs','car_img_id','member_id', 'license_number', 'type', 'owner', 'nature', 'brand_num', 'discern_num', 'motor_num', 'load_num', 'sign_at', 'certificate_at', 'stick', 'status'],
        ];
    }

    public function attributeHints()
    {
        return [
            'car_img' => '行驶证图片,最少<span style="color:red;">一</span>张正面,请和所填<span style="color:red;">真实有效</span>,请务必点击<span style="color:red;">上传</span>',
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'car_img' => '行驶证图片'
        ]);
    }

    /**
     * 添加车辆
     * @param $form
     * @return bool|mixed
     */
    public function addCar()
    {
        if(!$this->validate()){
            return false;
        }

        if(count($this->car_img_id) < 1 || count($this->car_img_id) > 12){
            $this->addError('car_img', '行驶证图片为1-2张');
            return false;
        }

        return Yii::$app->db->transaction(function()
        {
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save(false)){
                throw new Exception('添加车辆信息失败');
            }

            //设置图片绑定
            foreach($this->car_img_id as $h){
                $m = CarImg::findOne($h);
                $m->car_id = $this->id;
                $m->status = 1;
                if(!$m->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }

            return $this;
        });
    }

    /**
     * 更新车辆
     * @return bool|mixed
     */
    public function updateCar()
    {
        return Yii::$app->db->transaction(function()
        {
            if(!$this->save()){
                throw new Exception("更新车辆信息失败");
            }

            //变更图片的绑定
            $old_car_img = CarImg::find()->where(['car_id'=>$this->id, 'status'=> 1, 'type'=>1])->select('id')->column();
            $reduces_car_img = array_diff($old_car_img, $this->car_img_id);
            foreach($reduces_car_img as $r){
                $model = CarImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $increase_car_img = array_diff($this->car_img_id, $old_car_img);
            foreach($increase_car_img as $i){
                $model = CarImg::findOne($i);
                $model->status = 1;
                $model->car_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }
            return $this;
        });
    }

    /**
     * 上传土图片要用到的
     * @param $data
     * @return CarImg|null
     */
    public function saveImg($data)
    {
        $model = new CarImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save(false)){
            return null;
        }
        return $model;
    }

    public  function getPic()
    {
        return $this->hasMany(CarImg::className(), ['car_id'=> 'id'])->where(['status'=> 1]);
    }

    public function getPicImg()
    {
        $arr = [];
        foreach($this->pic as $i){
            $arr[] = '<img src="'.Yii::$app->params['img_domain']. $i->thumb.'" />';
        }
        return $arr;
    }
}