<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/8 - 上午10:49
 *
 */

namespace backend\models\searchs;


use backend\models\AuthAssignment;
use yii\data\ActiveDataProvider;

class AuthAssignmentSearch extends AuthAssignment
{
    public function search($params)
    {
        $query = AuthAssignment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['name' => $this->item_name]);


        return $dataProvider;
    }
}