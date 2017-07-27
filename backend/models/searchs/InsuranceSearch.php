<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午3:30
 *
 */

namespace backend\models\searchs;


use backend\models\Insurance;
use yii\data\ActiveDataProvider;

class InsuranceSearch extends Insurance
{
    public function search($params)
    {
        $query = Insurance::find();

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
                $query->andFilterWhere(['>=', 'created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'created_at', $end]);
            }
        }
        $query->andFilterWhere(['type' => $this->type])
            ->andFilterWhere(['LIKE', 'service', $this->service])
            ->andFilterWhere(['LIKE', 'user', $this->user])
            ->andFilterWhere(['LIKE', 'phone', $this->phone]);


        return $dataProvider;
    }
}