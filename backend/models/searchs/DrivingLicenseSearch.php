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
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        //格式化时间
        if ($this->created_at){
            $start_date = substr($this->created_at,0,10);
            $start = strtotime($start_date);

            if($start > 0){
                $query->andFilterWhere(['>=','created_at',$start]);
            }

            $end_date =  substr($this->created_at,12);
            $end = strtotime($end_date);

            if($end > 0){
                $query->andFilterWhere(['<=','created_at',$end]);
            }
        }

        return $dataProvider;
    }
}