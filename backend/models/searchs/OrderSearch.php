<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:17
 *
 */

namespace backend\models\searchs;


use backend\models\Order;
use backend\models\OrderDetail;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class OrderSearch extends OrderDetail
{

    public $salesman_name;


    public function rules()
    {
        return [
            [['order_type'], 'integer'],
            [['created_at', 'salesman_name',], 'string'],
            [['order_created_at', 'order_user', 'order_phone', 'order_car', 'order_service'], 'string'],
        ];
    }

    public function attributes()
    {
        return ArrayHelper::merge(parent::attributes(), [
            'order_created_at',
            'order_user',
            'order_phone',
            'order_car',
            'order_service',
            'order_type'
        ]);
    }

    public function search($params)
    {
        $query = OrderDetail::find();
        $query->alias('od')->joinWith('order');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        //格式化时间
        if ($this->order_created_at) {
            $start_date = substr($this->order_created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'o.created_at', $start]);
            }

            $end_date = substr($this->o_created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'o.created_at', $end]);
            }
        }
        $query->andFilterWhere(['o.type' => $this->order_type])
            ->andFilterWhere(['LIKE', 'o.service', $this->order_service])
            ->andFilterWhere(['LIKE', 'o.user', $this->order_user])
            ->andFilterWhere(['LIKE', 'o.phone', $this->order_phone])
            ->andFilterWhere(['LIKE', 'o.car', $this->order_car]);

        return $dataProvider;
    }
}