<?php

namespace backend\models;

use common\models\BusinessDetail;
use common\models\CompensatoryDetail;
use common\models\Upload;
use common\models\Warranty;
use Yii;

/**
 * This is the model class for table "{{%insurance_detail}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property string $action
 * @property integer $created_at
 * @property integer $updated_at
 */
class InsuranceDetail extends \yii\db\ActiveRecord
{
    public $insurance;
    public $car;
    public $person;
    public $element;
    public $warranty;
    public $compensatory;
    public $business;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'car_id', 'member_id', 'created_at', 'updated_at'], 'integer'],
            [['action'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单id',
            'car_id' => '车辆id',
            'member_id' => '投保人',
            'action' => '最新动态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    public function getInsuranceOrder()
    {
        return $this->hasOne(InsuranceOrder::className(), ['id'=> 'order_id'])->alias('io');
    }

    public static function getDetail($id)
    {
        $model = InsuranceDetail::findOne(['order_id'=>$id]);
        $model->insurance = InsuranceOrder::findOne($id);
        $model->car = Car::findOne(['id'=>$model->car_id]);
        $model->person = Member::findOne(['id'=>$model->member_id]);
        $model->element = InsuranceElement::findAll(['order_id'=>$id]);
        $model->warranty = Warranty::findOne(['order_id'=>$id]);
        $model->business = BusinessDetail::findOne(['id'=>$model->warranty->business_id]);
        $model->compensatory = CompensatoryDetail::findOne(['id'=>$model->warranty->compensatory_id]);

        return $model;

    }

    public static function cancel($id)
    {
        //取消订单
        $user_id = $_SESSION['__id'];
        $user = Adminuser::findOne(['id'=>$user_id])->name;
        $act = ActInsurance::findOne(['order_id'=>$id]);
        $act->status = 100;
        $act->info = '订单已取消';
        $act->port = 3;
        $act->user_id = $user_id;
        $act->user = $user;
        $act->id = null;
        $act->created_at = time();
        $act->isNewRecord = 1;
        $order = InsuranceDetail::findOne(['order_id'=>$id]);
        $order->action = '已取消';
        $order->updated_at = time();
        if ($act->save(false) && $order->save(false)) {
            return true;
        }
        return false;
    }

    public function checkSuccess($data, $id)
    {
        $user_id = $_SESSION['__id'];
        $user = Adminuser::findOne(['id'=>$user_id])->name;
        $act = ActInsurance::findOne(['order_id'=>$id]);
        $act->status = 97;
        $act->info = '核保成功';
        $act->port = 3;
        $act->user_id = $user_id;
        $act->user = $user;
        $act->id = null;
        $act->created_at = time();
        $act->isNewRecord = 1;
        if ($act->save(false)) {
            $imgId = $act->id;
            $upload = new Upload();
            //TODO:等龙哥图片
            $img  = 1;
            if (!$img) {
                return false;
            }
        }
        $order = InsuranceDetail::findOne(['order_id'=>$id]);
        $order->action = '已取消';
        $order->updated_at = time();
        if (!$order->save(false)) {
            return false;
        }
        return true;
    }

    public function checkFailed($data, $id)
    {
        $user_id = $_SESSION['__id'];
        $user = Adminuser::findOne(['id'=>$user_id])->name;
        $act = ActInsurance::findOne(['order_id'=>$id]);
        $act->status = 98;
        $act->info = $data['info'];
        $act->port = 3;
        $act->user_id = $user_id;
        $act->user = $user;
        $act->id = null;
        $act->created_at = time();
        $act->isNewRecord = 1;
        $order = InsuranceDetail::findOne(['order_id'=>$id]);
        $order->action = '核保失败';
        $order->updated_at = time();
        if ($act->save(false) && $order->save(false)) {
            return true;
        }
        return false;
    }

}
