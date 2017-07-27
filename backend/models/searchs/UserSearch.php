<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午1:43
 *
 */

namespace backend\models\searchs;


use backend\models\User;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public $service_name;

    public function rules()
    {
        return [
            [['created_at', 'service_name'], 'string'],
            ['phone', 'number'],
            ['status', 'integer'],
        ];
    }

    public function search($params)
    {
        $query = User::find();
        $query->where(['u.deleted_at' => null]);
        $query->alias('u')->joinWith('service');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        //格式化时间
        if ($this->created_at) {
            $start_date = substr($this->created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'u.created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'u.created_at', $end]);
            }
        }


        $query->andFilterWhere(['LIKE', 's.name', $this->service_name]);

        return $dataProvider;
    }
}