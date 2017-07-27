<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 上午11:08
 *
 */

namespace backend\models\searchs;


use backend\models\Member;
use yii\data\ActiveDataProvider;

class MemberSearch extends Member
{
    public $salesman_username;


    public function rules()
    {
        return [
            ['type', 'integer'],
            [['phone', 'status'], 'number'],
            [['created_at','salesman_username'],'string'],
        ];
    }

    public function search($params)
    {

        $query = Member::find();
        $query->where(['m.deleted_at'=> null]);
        $query->alias('m')->joinWith("salesmanName");


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
                $query->andFilterWhere(['>=','m.created_at',$start]);
            }

            $end_date =  substr($this->created_at,12);
            $end = strtotime($end_date);

            if($end > 0){
                $query->andFilterWhere(['<=','m.created_at',$end]);
            }
        }

        if($this->status != 'ALL'){
            $query->andFilterWhere(['m.status'=> $this->status]);
        }
        if($this->type){
            $query->andFilterWhere(['m.type'=>$this->type]);
        }


        $query->andFilterWhere(['LIKE', 'u.username' , $this->salesman_username]);
        $query->andFilterWhere(['LIKE', 'm.phone' , $this->phone]);

        return $dataProvider;
    }
}