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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "cdc_order".
 *
 * @property string $id
 * @property string $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    public $errorMsg;

    protected $transaction;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['order'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order' => 'Order',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /*
     * 这是要看一堆蛋
     */

    public function getOrder($data)
    {

    }

    /*
     * 这是要看一个蛋
     */

    public function getDetail($data)
    {

    }

    /*
     * 这次是要下蛋
     */
    public function addOrder($data)
    {
        $this->transaction = Yii::$app->db->beginTransaction();
        try{
            //生成订单快照
            $order_id = $this->createOrderSnapshoot();
            if($order_id == false){
                $this->errorMsg = '订单创建失败';
                $this->transaction->rollBack();
                return false;
            }
            //创建订单
            $orderDetail = $this->createOrder($data, $order_id);
            if($orderDetail == false){
                $this->errorMsg = '订单详情创建失败';
                $this->transaction->rollBack();
                return false;
            }
            $orderDetail = $orderDetail->toArray();
            $orderDetail['member_id'] = Helper::getPhone($orderDetail['member_id']);
            $orderDetail['car_id'] = Helper::getLicence($orderDetail['car_id']);
            $orderDetail['pick'] = Helper::getPick($orderDetail['pick']);
            $orderDetail['order_id'] = Helper::getOrder($orderDetail['order_id']);
            $orderDetail['type'] = Helper::getType($orderDetail['type']);
            $orderDetail['distributing'] = Helper::getDistributing($orderDetail['distributing']);
            $this->transaction->commit();
            return $orderDetail;
        } catch (Exception $exception){
            $this->transaction->rollBack();
            return false;
        }

    }

    /*
     * 这回要减蛋
     */
    public function delOrder($data)
    {

    }

    /*
     * 这下要重新孵蛋
     */
    public function updateOrder($data)
    {

    }

    /*
     * 生成订单号和订单快照
     */
    public function createOrderSnapshoot()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        $this->order = $orderSn;
        $this->created_at = time();

        if ($this->save(false)) {
//            $order_id = Yii::$app->db->getLastInsertID();
            $order_id = $this->attributes['id'];
            return $order_id?$order_id:null;
        }
        return false;
    }

    /*
     * 生成订单详情
     */
    public function createOrder($data, $order_id)
    {
        $orderDetail = new OrderDetail();
        $orderDetail->load(['formName'=>$data],'formName');
        $orderDetail->order_id = $order_id;
        $orderDetail->created_at = time();

        if ($orderDetail->save(false)) {
            return $orderDetail?$orderDetail:null;
        }
        return false;
    }
}
