<?php

namespace backend\models;

use Yii;
use yii\base\Exception;

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
            [['member_id', 'load_num', 'stick', 'status', 'created_at', 'updated_at'], 'integer'],
            [['license_number', 'type', 'nature', 'brand_num', 'discern_num', 'motor_num', 'sign_at', 'certificate_at'], 'string', 'max' => 50],
            [['owner'], 'string', 'max' => 255],
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
            'discern_num' => '识别代号',
            'motor_num' => '发动机编号',
            'load_num' => '荷载人数',
            'sign_at' => '注册日期',
            'certificate_at' => '发证日期',
            'stick' => '车辆默认 0:不 1:默认',
            'status' => '1:正常 0:待审核',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
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
}
