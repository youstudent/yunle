<?php

namespace common\models;

use Yii;
use yii\db\Exception;
/**
 * This is the model class for table "cdc_warranty".
 *
 * @property integer $id
 * @property integer $order_id
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
            if ($$business_id == false) {
                $this->errorMsg = '订单详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //生成保单
            $insurance = $this->createWarranty($order_id, $compensatory_id, $business_id);
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
    public function createWarranty($order_id, $compensatory_id, $business_id)
    {
        $warranty = new Warranty();

        $warranty->order_id = $order_id;
        $warranty->compensatory_id = $compensatory_id;
        $warranty->business_id = $business_id;
        $warranty->created_at = time();

        if (!$warranty->save(false)) {
            return false;
        }
        return true;
    }

}
