<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午2:47
 *
 */

namespace backend\models\searchs;


use backend\models\Car;
use yii\data\ActiveDataProvider;

class CarSearch extends Car
{
    public function rules()
    {
        return [
            ['member_id', 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Car::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['status'=>[1,2]])
        ]);

        if (isset($params['member_id']) && !empty($params['member_id'])) {

            $query->andFilterWhere(['member_id' => $params['member_id']]);
        }
        $query->andFilterWhere(['member_id' => $this->id]);
        return $dataProvider;
    }
}