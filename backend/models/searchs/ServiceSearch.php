<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/17 - 下午8:00
 *
 */

namespace backend\models\searchs;


use backend\models\Service;
use yii\data\ActiveDataProvider;

class ServiceSearch extends Service
{
    public function rules()
    {
        return [
            [['created_at', 'name', 'principal', 'contact_phone', 'pid'] ,'string'],
        ];
    }


    public function search($params)
    {
        $query = Service::find()->alias('s')->where(['s.type'=> 1]);;

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


        $query->andFilterWhere(['LIKE', 'name' , $this->name]);
        $query->andFilterWhere(['LIKE', 'principal' , $this->principal]);
        $query->andFilterWhere(['LIKE', 'contact_phone' , $this->contact_phone]);
        $query->andFilterWhere(['pid'=> $this->pid]);

        return $dataProvider;
    }
}