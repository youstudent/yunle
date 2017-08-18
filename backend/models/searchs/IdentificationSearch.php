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

    public function rules()
    {
        return [
            ['member_id', 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Identification::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['status'=>1])
        ]);

        if (!empty($params)) {
            $query->andFilterWhere(['member_id' => $params['member_id']]);
        }
        $query->andFilterWhere(['member_id' => $this->id]);
        return $dataProvider;
    }
}