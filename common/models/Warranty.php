<?php

namespace common\models;

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "cdc_warranty".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $member_id
 * @property integer $compensatory_id
 * @property integer $business_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Warranty extends \yii\db\ActiveRecord
{
    public $transaction;
    public $errorMsg;
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
            [['id'], 'required'],
            [['id', 'order_id', 'compensatory_id', 'business_id', 'created_at', 'updated_at'], 'integer'],
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
            'compensatory_id' => 'Compensatory ID',
            'business_id' => 'Business ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /*
     * 创建保单
     */
    public function createdWarranty($data, $order_id, $member_id)
    {
        $this->transaction = Yii::$app->db->beginTransaction();
        try {
            //交强险信息
            $compensatory_id = $this->createCompensatory();
            if ($compensatory_id == false) {
                $this->errorMsg = '险种绑定失败';
                $this->transaction->rollBack();
                return false;
            }
            //商业险信息
            $business_id = $this->createBusiness();
            if ($business_id == false) {
                $this->errorMsg = '订单详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //生成保单
            $insurance = $this->createWarranty($order_id, $member_id, $compensatory_id, $business_id);
            if ($insurance == false) {
                $this->errorMsg = '险种绑定失败';
                $this->transaction->rollBack();
                return false;
            }
            $this->transaction->commit();
            return true;
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }

    }

    /*
     * 创建交强险详情
     */
    public function createCompensatory()
    {
        $compensatory = new CompensatoryDetail();

        $compensatory->created_at = time();

        if ($compensatory->save(false)) {
            $compensatory_id = $compensatory->attributes['id'];
            return $compensatory_id ? $compensatory_id : 0;
        }
        return false;
    }

    /*
     * 创建商业险详情
     */
    public function createBusiness()
    {
        $business = new BusinessDetail();

        $business->created_at = time();

        if ($business->save(false)) {
            $business_id = $business->attributes['id'];
            return $business_id ? $business_id : 0;
        }
        return false;
    }


    /*
     * 创建保单
     */
    public function createWarranty($order_id, $member_id, $compensatory_id, $business_id)
    {
        $warranty = new Warranty();

        $warranty->order_id = $order_id;
        $warranty->member_id = $member_id;
        $warranty->compensatory_id = $compensatory_id;
        $warranty->business_id = $business_id;
        $warranty->created_at = time();

        if (!$warranty->save(false)) {
            return false;
        }
        return true;
    }

    /*
     * 保单列表
     */
    public function getList($data, $member)
    {
        if (!isset($data['member_id']) || empty($data['member_id'])) {
            $member_id = $member['member']['id'];
        } else {
            $member_id = $data['member_id'];
        }

        $warranty = Warranty::find()->select('id, order_id, start_at, end_at')
            ->where(['member_id'=>$member_id, 'state'=>1])
            ->asArray()
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        if (!isset($warranty) || empty($warranty)) {
            return null;
        }
        foreach ($warranty as &$v) {
            $v['car'] = $this->getNames($v['order_id'])->car;
            $v['user'] = $this->getNames($v['order_id'])->user;
            $v['status'] = $this->getStatus($v['start_at'], $v['end_at']);
            $v['start_at'] = date('Y年m月d日 H:i', $v['start_at']);
            $v['end_at'] = date('Y年m月d日 H:i', $v['end_at']);

        }

        return $warranty;
    }

    /*
     * 保单详情
     */
    public function getDetail($data)
    {
        $oldWarranty = Warranty::findOne(['id'=>$data['id']]);
        $memberType = Member::findOne(['id'=>$oldWarranty->member_id])->type;

        $warranty = [];

        $warranty['car'] = $this->getNames($oldWarranty->order_id)->car;

        $name = $this->getNames($oldWarranty->order_id)->user;
        $sex = $this->getNames($oldWarranty->order_id)->sex;
        $nation = $this->getNames($oldWarranty->order_id)->nation;
        $licence = $this->getNames($oldWarranty->order_id)->licence;

        if ($memberType == 1) {
            $warranty['person'] = ['name'=>$name, 'sex'=>$sex, 'nation'=>$nation, 'licence'=>$licence];
        } else {
            $warranty['person'] = ['name'=>$name, 'licence'=>$licence];
        }

        $warranty['compensatory'] = $this->getCompensatory($oldWarranty->compensatory_id);
        $warranty['business'] = $this->getBusiness($oldWarranty->business_id, $oldWarranty->order_id);

        return $warranty;

    }

    /*
     * 订单列表
     * 获取信息
     */
    public function getNames($order_id)
    {
        $names = InsuranceOrder::findOne(['id'=>$order_id]);

        return $names;
    }

    /*
     * 获取交强险的详情
     */
    public function getCompensatory($compensatory_id)
    {
        $detail = CompensatoryDetail::findOne(['id'=>$compensatory_id])->toArray();
        $detail['start_at'] = date('Y年m月d日 H:i', $detail['start_at']);
        $detail['end_at'] = date('Y年m月d日 H:i', $detail['end_at']);

        return $detail;
    }

    /*
     * 获取商业险的详情
     */
    public function getBusiness($business_id, $order_id)
    {
        $detail = BusinessDetail::find()
            ->where(['id'=>$business_id])
            ->asArray()
            ->all();
        foreach ($detail as &$v) {
            $v['element'] = $this->getElement($order_id);
            $v['start_at'] = date('Y年m月d日 H:i', $v['start_at']);
            $v['end_at'] = date('Y年m月d日 H:i', $v['end_at']);
        }

        return $detail;
    }

    /*
     * 获取保单当前状态
     */
    public function getStatus($start, $end)
    {
        $at = time();

        if ($at < $start) {
            $statusNum = 0;
            $statusName = '未起保';
            $days = 0;
        } elseif ($at > $end) {
            $statusNum = 2;
            $statusName = '已到期';
            $days = 0;
        } else {
            $statusNum = 1;
            $statusName = '正常';
            $days = ceil(($end-$at)/(3600*24)).'天';
        }
        $status = ['statusNum' => $statusNum, 'statusName' => $statusName, 'days' => $days];
        return $status;
    }

    /*
     * 获取险种信息
     */
    public function getElement($order_id)
    {
        $element = InsuranceElement::find()->select('insurance, element, deduction')
            ->where(['order_id'=>$order_id])
            ->asArray()
            ->all();

        return $element;
    }


}
