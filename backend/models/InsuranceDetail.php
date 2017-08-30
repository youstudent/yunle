<?php

namespace backend\models;

use common\models\BusinessDetail;
use common\models\CompensatoryDetail;
use common\models\Upload;
use Yii;
use yii\web\UploadedFile;
use yii\db\Exception;

/**
 * This is the model class for table "{{%insurance_detail}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $car_id
 * @property integer $member_id
 * @property string $action
 * @property string $chit
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
    public $img_id;
    public $warrantyImg;
    public $warrantyImg_id;
    public $costImg;
    public $costImg_id;
    public $head;
    public $attachment;
    public $saleman_id;

    public $transaction;
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
            [['order_id', 'car_id', 'member_id', 'created_at', 'updated_at', 'chit'], 'integer'],
            [['action'], 'string', 'max' => 50],
            [['insurance','car','person','element','warranty','compensatory','business','total'], 'safe'],
            [['cover','img','img_id','warrantyImg','warrantyImg_id','costImg','compensatory','costImg_id','head'], 'safe'],
            [['attachment','saleman_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chit' => '是否生成保单',
            'order_id' => '订单id',
            'car_id' => '车辆id',
            'member_id' => '投保人',
            'action' => '最新动态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'costImg' => '报价单图片',
            'warrantyImg' => '保单图片',
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
        $user_id = Yii::$app->user->identity->id;
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

    public function checkSuccess($id)
    {
        $user_id = Yii::$app->user->identity->id;
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
        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            //保存动态详情
            if(!$act->save(false)){
                $this->addError('img', '添加动态信息失败');
                $this->transaction->rollBack();
                return false;
            }
            //图片
            if(count($this->img_id) < 1){
                $this->addError('img', '报价单必须上传');
                $this->transaction->rollBack();
                return false;
            }

            //设置图片绑定
            if ($this->img_id) {
                foreach($this->img_id as $h){
                    $m = InsuranceActimg::findOne($h);
                    $m->act_id = $this->id;
                    $m->status = 1;
                    if(!$m->save(false)){
                        $this->addError('img', '图片绑定失败');
                        $this->transaction->rollBack();
                        return false;
                    }
                }
            }

            $this->transaction->commit();
        } catch (Exception $exception){
            $this->transaction->rollBack();
            $this->addError('img', '操作失败');
            return false;
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
        $user_id = Yii::$app->user->identity->id;
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

    /**
     * 上传土图片要用到的
     * @param $data
     * @return |null|
     */
    public function saveImg($data)
    {
        $model = new InsuranceActimg();
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
        return $this->hasMany(InsuranceActimg::className(), ['act_id'=> 'id'])->where(['status'=> 1]);
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
