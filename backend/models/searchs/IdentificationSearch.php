<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午3:30
 *
 */

namespace backend\models\searchs;

use backend\models\Identification;
use backend\models\Member;
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

        if (isset($params['member_id']) || !empty($params['member_id'])) {
            $query->andFilterWhere(['member_id' => $params['member_id']]);
        }
        $query->andFilterWhere(['member_id' => $this->id]);
        return $dataProvider;
    }
    
}