<?php

namespace backend\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Warranty;
use yii\helpers\ArrayHelper;

/**
 * WarrantySearch represents the model behind the search form about `backend\models\Warranty`.
 */
class WarrantySearch extends Warranty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'member_id', 'compensatory_id', 'business_id', 'start_at', 'end_at', 'state', 'created_at', 'updated_at'], 'integer'],
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
            'order_nation',
            'order_licence',
            'order_company',
            'order_cost',
            'order_status',
            'order_created_at',
        ]);
    }

    public function search($params)
    {
        $query = Warranty::find();
        $query->alias('war')->joinWith('insuranceOrder');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        ;
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        //格式化时间
        if ($this->created_at) {
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
        $query->andFilterWhere(['LIKE', 'io.user', $this->user])
            ->andFilterWhere(['LIKE', 'io.phone', $this->phone]);

        return $dataProvider;
    }
}
