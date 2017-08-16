<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午3:30
 *
 */

namespace backend\models\searchs;


use backend\models\Identification;
use yii\data\ActiveDataProvider;

class IdentificationSearch extends Identification
{
    public function search($params)
    {
        $query = Identification::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['member_id'=> $this->member_id]);

        return $dataProvider;
    }
}