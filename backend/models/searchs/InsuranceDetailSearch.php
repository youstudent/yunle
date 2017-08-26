<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午3:44
 *
 */

namespace backend\models\searchs;


use backend\models\InsuranceDetail;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class InsuranceDetailSearch extends InsuranceDetail
{
    public function rules()
    {
        return [
            [['action', 'member_id'], 'integer'],
            [['order_created_at','order_user', 'order_car', 'order_company'], 'string'],
            [['order_phone'], 'number'],
        ];
    }

    public function attributes()
    {
        return ArrayHelper::merge(parent::attributes(), [
            'order_sn',
            'order_user',
            'order_phone',
            'order_car',
            'order_service',
            'order_type',
            'order_nation',
            'order_licence',
            'order_company',
            'order_cost',
            'order_status',
            'order_created_at',
            'member_id',
        ]);
    }

    public function search($params)
    {
        $query = InsuranceDetail::find();
        $query->alias('ind')->joinWith('insuranceOrder');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        ;
        if (!($this->load($params))) {
            return $dataProvider;
        }

        //格式化时间
        if ($this->order_created_at) {
            $start_date = substr($this->created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'io.created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'io.created_at', $end]);
            }
        }
        $query->andFilterWhere(['type' => $this->order_type])
            ->andFilterWhere(['LIKE', 'io.user', $this->order_user])
            ->andFilterWhere(['LIKE', 'io.phone', $this->order_phone])
            ->andFilterWhere(['LIKE', 'io.car', $this->order_car])
            ->andFilterWhere(['LIKE', 'io.company', $this->order_company]);


        return $dataProvider;
    }
}