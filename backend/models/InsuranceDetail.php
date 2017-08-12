<?php

namespace backend\models;

use common\models\BusinessDetail;
use common\models\CompensatoryDetail;
use common\models\Upload;
use Yii;
use yii\web\UploadedFile;

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
    public $total;

    public $cover;
    public $img;
    public $warrantyImg;
    public $costImg;
    public $head;
    public $attachment;
    public $saleman_id;
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

        $actId = ActInsurance::findOne(['order_id'=>$id, 'status'=>4]);
        $images = InsuranceActimg::find()->select('id, img_path')->where(['act_id'=> $actId])->all();
        $warrantyImg = [];
        if ($images) {
            foreach ($images as &$v) {
                $warrantyImg[] = Yii::$app->params['img_domain'].$v['img_path'];
            }
        }
        $model->warrantyImg =$warrantyImg;

        $costId = ActInsurance::findOne(['order_id'=>$id, 'status'=>97]);
        $imagess = InsuranceActimg::find()->select('id, img_path')->where(['act_id'=> $costId])->all();
        $costImg = [];
        if ($imagess) {
            foreach ($imagess as &$v) {
                $costImg[] = Yii::$app->params['img_domain'].$v['img_path'];
            }
        }
        $model->costImg =$costImg;

        return $model;

    }

    public static function cancel($id)
    {
        //取消订单
        $user_id = $_SESSION['LOGIN_MEMBER']['id'];
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
        $orderOrder = InsuranceOrder::findOne(['id'=>$id]);
        $orderOrder->updated_at = time();
        if ($act->save(false) && $order->save(false) && $orderOrder->save(false)) {
            return true;
        }
        return false;
    }

    public function checkSuccess($model, $data = null, $id)
    {
        $user_id = $_SESSION['LOGIN_MEMBER']['id'];
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
            //图片处理
            $images = UploadedFile::getInstances($model, 'img');
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
        $order = InsuranceDetail::findOne(['order_id'=>$id]);
        $order->action = '核保成功';
        $order->updated_at = time();
        $orderOrder = InsuranceOrder::findOne(['id'=>$id]);
        $orderOrder->check_action = '核保成功';
        $orderOrder->check_at = time();
        if (!$order->save(false) || !$orderOrder->save(false)) {
            return false;
        }
        $newsA = '您的保险订单：【'. $orderOrder->order_sn .'】，已核保成功，请及时确认购买';
        $user_idA = $order->member_id;
        $switch = \common\models\Member::findOne($user_idA);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('member', $user_idA, $newsA);
            \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
            \common\components\Helper::pushMemberMessage($user_idA,$newsA);
        }
        $newsB = '您的会员【'. $orderOrder->user .'】的保险订单【'. $orderOrder->order_sn .'】，已核保成功，请及时确认购买';
        $member = Member::findOne($this->member_id);
        $user_idB = $member->pid;
        $switch = \common\models\User::findOne($user_idB);
        if ($switch->system_switch == 1) {
            \common\models\Notice::userNews('user', $user_idB, $newsB);
            \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
            \common\components\Helper::pushServiceMessage($user_idB,$newsB);
        }

        return true;
    }

    public function checkFailed($data, $id)
    {
        $user_id = $_SESSION['LOGIN_MEMBER']['id'];
        $user = Adminuser::findOne(['id'=>$user_id])->name;
        $act = ActInsurance::findOne(['order_id'=>$id]);
        $act->status = 98;
        $act->info = trim($data['info']);
        $act->port = 3;
        $act->user_id = $user_id;
        $act->user = $user;
        $act->id = null;
        $act->created_at = time();
        $act->isNewRecord = 1;
        $order = InsuranceDetail::findOne(['order_id'=>$id]);
        $order->action = '核保失败';
        $order->updated_at = time();
        $orderOrder = InsuranceOrder::findOne(['id'=>$id]);
        $orderOrder->check_action = '核保失败';
        $orderOrder->check_at = time();

        if ($act->save(false) && $order->save(false) && $orderOrder->save(false)) {
            $newsA = '您的保险订单：【'. $orderOrder->order_sn .'】，核保失败，失败原因为【'. $act->info .'】';
            $user_idA = $order->member_id;
            $switch = \common\models\Member::findOne($user_idA);
            if ($switch->system_switch == 1) {
                \common\models\Notice::userNews('member', $user_idA, $newsA);
                \common\components\Helper::pushMemberMessage($user_idA,$newsA,'message');
                \common\components\Helper::pushMemberMessage($user_idA,$newsA);
            }
            $newsB = '您的会员【'. $orderOrder->user .'】的保险订单【'. $orderOrder->order_sn .'】，核保失败，失败原因为【'. $act->info .'】';
            $member = Member::findOne($this->member_id);
            $user_idB = $member->pid;
            if ($switch->system_switch == 1) {
                \common\models\Notice::userNews('user', $user_idB, $newsB);
                \common\components\Helper::pushServiceMessage($user_idB,$newsB,'message');
                \common\components\Helper::pushServiceMessage($user_idB,$newsB);
            }
            return true;
        }
        return false;
    }

    public function saveImg($data, $type = 'head')
    {
        $model = new ServiceImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->type = $type == 'head' ? 1 : 0;
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save()){
            return null;
        }
        return $model;
    }

}
