<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 上午11:42
 *
 */

namespace backend\models\searchs;


use backend\models\OrderDetail;
use yii\data\ActiveDataProvider;

class OrderDetailSearch extends OrderDetail
{
    public function rules()
    {
        return [
            [['action', 'order_sn', 'car_car_no', 'member_name', 'service_name'], 'string'],
        ];
    }

    public function search($params)
    {
        $query = OrderDetail::find();
        $query->alias('od')->joinWith('Order');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        //格式化时间
        if ($this->created_at) {
            $start_date = substr($this->created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'od.created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'od.created_at', $end]);
            }
        }
//        $query->andFilterWhere(['type' => $this->type])
//            ->andFilterWhere(['LIKE', 'service', $this->service])
//            ->andFilterWhere(['LIKE', 'user', $this->user])
//            ->andFilterWhere(['LIKE', 'phone', $this->phone]);


        return $dataProvider;
    }
}