<?php

namespace backend\models;

use common\models\BusinessDetail;
use common\models\CompensatoryDetail;
use common\models\Element;
use common\models\Upload;
use Yii;
use yii\web\UploadedFile;
use yii\db\Exception;

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

    public $c_sn;
    public $c_wn;
    public $c_cost;
    public $c_tt;
    public $c_st;
    public $c_et;
    public $b_sn;
    public $b_wn;
    public $b_cost;
    public $b_st;
    public $b_et;
    public $Warranty;

    public $transaction;

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
            [['c_sn','c_wn','c_cost','c_tt','c_st','c_et'],'required'],
            [['b_sn','b_wn','b_cost','b_st','b_et','Warranty'],'required'],
            [['c_sn','c_wn','b_sn','b_wn'],'integer'],
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
            'c_sn' => '交强险流水号',
            'c_wn' => '交强险保单号',
            'c_cost' => '交强险价格',
            'c_tt' => '车船税',
            'c_st' => '交强险生效时间',
            'c_et' => '交强险失效时间',
            'b_sn' => '商业险流水号',
            'b_wn' => '商业险保单号',
            'b_cost' => '商业险价格',
            'b_st' => '商业险生效时间',
            'b_et' => '商业险失效时间',
            'Warranty' => '保单图片',
        ];
    }

    public function getInsuranceOrder()
    {
        return $this->hasOne(InsuranceOrder::className(), ['id'=> 'order_id'])->alias('io');
    }

    public function getInsuranceDetail()
    {
        return $this->hasOne(InsuranceDetail::className(), ['order_id'=> 'order_id'])->alias('idd');
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

    public function changeInfo($modelImgs=null,$data)
    {

//        echo '<pre>';
//        print_r(UploadedFile::getInstances($modelImgs, 'img'));die;

        if (empty($data['c_sn']) || empty($data['c_wn']) || empty($data['c_cost']) || empty($data['c_tt']) ||
            empty($data['c_st']) || empty($data['c_et']) || empty($data['b_sn']) || empty($data['b_wn']) ||
            empty($data['b_cost']) || empty($data['b_st']) || empty($data['b_et'])) {
            $this->addError('img', '所填信息不能为空');
            return false;
        }
        if (empty(UploadedFile::getInstances($modelImgs, 'img'))) {
            $this->addError('img', '需要上传正确图片格式');
            return false;
        }
        if (!is_numeric($data['c_sn']) || !is_numeric($data['c_wn']) || !is_numeric($data['b_sn']) || !is_numeric($data['b_wn'])) {
            $this->addError('img', '流水号或保单号格式不对');
            return false;
        }

        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            $user_id = Yii::$app->user->identity->id;
            $user = Adminuser::findOne(['id'=>$user_id])->name;
            $id = $data['order_id'];
            $model = Warranty::findOne(['order_id'=>$id]);
            $business = BusinessDetail::findOne(['id'=>$model->business_id]);
            $compensatory = CompensatoryDetail::findOne(['id'=>$model->compensatory_id]);
            $model->start_at = strtotime($data['c_st']);
            $model->end_at = strtotime($data['c_et']);
            if(!$model->save(false)){
                $this->addError('img', '保单信息保存失败');
                $this->transaction->rollBack();
                return false;
            }
            // 交强险
            $compensatory->serial_number = $data['c_sn'];
            $compensatory->warranty_number = $data['c_wn'];
            $compensatory->cost = $data['c_cost'];
            $compensatory->travel_tax = $data['c_tt'];
            $compensatory->start_at = strtotime($data['c_st']);
            $compensatory->end_at = strtotime($data['c_et']);
            if(!$compensatory->save(false)){
                $this->addError('img', '交强险信息保存失败');
                $this->transaction->rollBack();
                return false;
            }

            // 商业险
            $business->serial_number = $data['b_sn'];
            $business->warranty_number = $data['b_wn'];
            $business->cost = $data['b_cost'];
            $business->start_at = strtotime($data['b_st']);
            $business->end_at = strtotime($data['b_et']);
            if(!$business->save(false)){
                $this->addError('img', '商业险信息保存失败');
                $this->transaction->rollBack();
                return false;
            }

            // 付款
            $cost = InsuranceOrder::findOne(['id'=>$id]);
            $cost->cost = $data['c_tt'] + $data['c_cost'] + $data['b_cost'];
            if ($cost->cost > 0) {
                $cost->payment_action = '已付款';
                $cost->updated_at = time();
            }
            if(!$cost->save(false)){
                $this->addError('img', '款项信息保存失败');
                $this->transaction->rollBack();
                return false;
            }

            $order = InsuranceDetail::findOne(['order_id'=>$id]);
            $order->action = '已付款';
            $order->chit = 1;
            $order->updated_at = time();
            if(!$order->save(false)){
                $this->addError('img', '订单付款信息保存失败');
                $this->transaction->rollBack();
                return false;
            }

            // 订单动态详情
            $act = ActInsurance::findOne(['order_id'=>$id]);
            $act->status = 4;
            $act->info = '已付款';
            $act->port = 3;
            $act->user_id = $user_id;
            $act->user = $user;
            $act->id = null;
            $act->created_at = time();
            $act->isNewRecord = 1;
            if(!$act->save(false)){
                $this->addError('img', '订单付款信息保存失败');
                $this->transaction->rollBack();
                return false;
            }

            if ($modelImgs != null) {
                $images = UploadedFile::getInstances($modelImgs, 'img');
                foreach ($images as $v) {
                    if ($v->type != 'image/jpeg') {
                        $this->addError('img', '图片格式有毛病啊');
                        $this->transaction->rollBack();
                        return false;
                    }
                    $extension = $v->extension;
                    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                    $upload = new Upload();
                    $img_path = $upload->getSavePath('insuranceAct', $chars, $extension);
                    $v->saveAs(Yii::getAlias('@common').'/static'.$img_path);
                    $modelImg = new InsuranceActimg();
                    $modelImg->act_id = $act->id;
                    $modelImg->img_path = $img_path;;
                    $modelImg->created_at = time();

                    if (!$modelImg->save(false)) {
                        $this->addError('img', '保单图片保存失败');
                        $this->transaction->rollBack();
                        return false;
                    }
                }
            } else {
                $this->addError('img', '保单图片不能为空');
                $this->transaction->rollBack();
                return false;
            }
            $this->transaction->commit();

        } catch (Exception $exception){
            $this->transaction->rollBack();
            $this->addError('img', '操作失败');
            return false;
        }
        return true;
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
