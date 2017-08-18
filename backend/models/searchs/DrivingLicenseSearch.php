<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午3:30
 *
 */

namespace backend\models\searchs;


use backend\models\DrivingLicense;
use yii\data\ActiveDataProvider;

class DrivingLicenseSearch extends DrivingLicense
{
    public function search($params)
    {
        $query = DrivingLicense::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if (!empty($params)) {
            $query->andFilterWhere(['member_id' => $params['member_id']]);
        }

        return $dataProvider;
    }
}