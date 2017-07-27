<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午3:44
 *
 */

namespace backend\models\searchs;


use backend\models\InsuranceOrder;
use yii\data\ActiveDataProvider;

class InsuranceOrderSearch extends InsuranceOrder
{
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at','user', 'car'], 'string'],
            [['phone'], 'number'],
        ];
    }

    public function search($params)
    {
        $query = InsuranceOrder::find();

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
        $query->andFilterWhere(['type' => $this->status])
            ->andFilterWhere(['LIKE', 'user', $this->user])
            ->andFilterWhere(['LIKE', 'phone', $this->phone]);


        return $dataProvider;
    }
}