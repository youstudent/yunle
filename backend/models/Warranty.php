<?php

namespace backend\models;

use common\models\BusinessDetail;
use common\models\CompensatoryDetail;
use common\models\Element;
use common\models\Upload;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cdc_warranty".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $member_id
 * @property integer $compensatory_id
 * @property integer $business_id
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $state
 * @property integer $created_at
 * @property integer $updated_at
 */
class Warranty extends \yii\db\ActiveRecord
{
    public $insurance;
    public $car;
    public $person;
    public $element;
    public $warranty;
    public $compensatory;
    public $business;
    public $img;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%warranty}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'member_id', 'compensatory_id', 'business_id', 'start_at', 'end_at', 'state', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'member_id' => 'Member ID',
            'compensatory_id' => 'Compensatory ID',
            'business_id' => 'Business ID',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'state' => 'State',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getInsuranceOrder()
    {
        return $this->hasOne(InsuranceOrder::className(), ['id'=> 'order_id'])->alias('io');
    }

    public static function getDetail($id)
    {
        $model = Warranty::findOne(['order_id'=>$id]);
        $model->insurance = InsuranceOrder::findOne($id);
        $model->element = InsuranceElement::findAll(['order_id'=>$id]);
        $model->business = BusinessDetail::findOne(['id'=>$model->business_id]);
        $model->compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);

        return $model;
    }

    public static function changeInfo($modelImgs=null,$data)
    {
        $user_id = Yii::$app->user->identity->id;
        $user = Adminuser::findOne(['id'=>$user_id])->name;
        $id = $data['order_id'];
        $model = Warranty::findOne(['order_id'=>$id]);
        $business = BusinessDetail::findOne(['id'=>$model->business_id]);
        $compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);
        $model->start_at = strtotime($data['c_st']);
        $model->end_at = strtotime($data['c_et']);

        $model->save(false);
        $compensatory->serial_number = $data['c_sn'];
        $compensatory->warranty_number = $data['c_wn'];
        $compensatory->cost = $data['c_cost'];
        $compensatory->travel_tax = $data['c_tt'];
        $compensatory->start_at = strtotime($data['c_st']);
        $compensatory->end_at = strtotime($data['c_et']);

        $business->serial_number = $data['b_sn'];
        $business->warranty_number = $data['b_wn'];
        $business->cost = $data['b_cost'];
        $business->start_at = strtotime($data['b_st']);
        $business->end_at = strtotime($data['b_et']);

        $cost = InsuranceOrder::findOne(['id'=>$id]);
        $cost->cost = $data['c_tt'] + $data['c_cost'] + $data['b_cost'];
        if ($cost->cost > 0) {
            $cost->payment_action = '已付款';
            $cost->updated_at = time();
        }
        $cost->save(false);

        $order = InsuranceDetail::findOne(['order_id'=>$id]);
        $order->action = '已付款';
        $order->updated_at = time();
        $order->save(false);

        $act = ActInsurance::findOne(['order_id'=>$id]);
        $act->status = 4;
        $act->info = '已付款';
        $act->port = 3;
        $act->user_id = $user_id;
        $act->user = $user;
        $act->id = null;
        $act->created_at = time();
        $act->isNewRecord = 1;
        if ($act->save(false)) {
            //图片处理
            $images = UploadedFile::getInstances($modelImgs, 'img');
            foreach ($images as $v) {
                $extension = $v->extension;
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $upload = new Upload();
                $img_path = $upload->getSavePath('insuranceAct', $chars, $extension);
                $v->saveAs(Yii::getAlias('@common').$img_path);
                $modelImg = new InsuranceActimg();
                $modelImg->act_id = $act->id;
                $modelImg->img_path = $img_path;;
                $modelImg->created_at = time();

                if (!$modelImg->save(false)) {
                    return false;
                }
            }
        }
        if ($compensatory->save(false) && $business->save(false)) {
            return true;
        }
        return false;
    }

    public static function changeDetail($data)
    {
        $id = $data['order_id'];
//var_dump($data);die;
        $cost = InsuranceOrder::findOne(['id'=>$id]);
        $cost->company = InsuranceCompany::findOne(['id'=>$data['company']])->name;
        $cost->car = Car::findOne(['id'=>$data['car']])->license_number;
        $cost->phone = $data['phone'];
        $cost->check_action = $data['check'];
        $cost->check_at = time();
        $cost->payment_action = $data['payMent'];

        foreach ($data['insurance'] as $key => $v) {
            if (!isset($v['id']) || empty($v['id'])) {
                InsuranceElement::findOne($key)->delete();
            } else {
                $element = InsuranceElement::findOne($key);
                $element->element = Element::findOne($v['element'])->name;
                if (!isset($v['deduction']) || empty($v['deduction'])) {
                    $element->deduction = 0;
                } else {
                    $element->deduction = '不计免赔';
                }
                $element->save(false);
            }

        }

        if ($cost->payment_action == '未付款') {
            $model = Warranty::findOne(['order_id'=>$id]);
            $business = BusinessDetail::findOne(['id'=>$model->business_id]);
            $compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);
            $model->start_at = 0;
            $model->end_at = 0;
            $model->save(false);
            $compensatory->serial_number = '';
            $compensatory->warranty_number ='';
            $compensatory->cost = 0;
            $compensatory->travel_tax = 0;
            $compensatory->start_at = 0;
            $compensatory->end_at = 0;

            $business->serial_number = '';
            $business->warranty_number = '';
            $business->cost = 0;
            $business->start_at = 0;
            $business->end_at = 0;
            $cost->cost = 0;
            $cost->updated_at = time();
            if ($compensatory->save(false) && $business->save(false) && $cost->save(false)) {
                return true;
            }
            return false;
        } else {
            $model = Warranty::findOne(['order_id'=>$id]);
            $business = BusinessDetail::findOne(['id'=>$model->business_id]);
            $compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);
            $model->start_at = strtotime($data['c_st']);
            $model->end_at = strtotime($data['c_et']);
            $model->save(false);
            $compensatory->serial_number = $data['c_sn'];
            $compensatory->warranty_number = $data['c_wn'];
            $compensatory->cost = $data['c_cost'];
            $compensatory->travel_tax = $data['c_tt'];
            $compensatory->start_at = strtotime($data['c_st']);
            $compensatory->end_at = strtotime($data['c_et']);

            $business->serial_number = $data['b_sn'];
            $business->warranty_number = $data['b_wn'];
            $business->cost = $data['b_cost'];
            $business->start_at = strtotime($data['b_st']);
            $business->end_at = strtotime($data['b_et']);
            $cost->cost = $data['c_tt'] + $data['c_cost'] + $data['b_cost'];
            if ($compensatory->save(false) && $business->save(false) && $cost->save(false)) {
                return true;
            }
            return false;
        }
    }

}
