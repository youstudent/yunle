<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午4:45
 *
 */

namespace backend\models\searchs;


use backend\models\Article;
use yii\data\ActiveDataProvider;

class ArticleSearch extends Article
{
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['created_at', 'salesman_name', 'service_name', 'user', 'car', 'service'], 'string'],
            [['phone'], 'number'],
        ];
    }

    public function search($params)
    {
        $query = Article::find();

        //$query = $this->authFilter($query);

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
                $query->andFilterWhere(['>=', 'created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'created_at', $end]);
            }
        }
        $query->andFilterWhere(['type' => $this->type])
            ->andFilterWhere(['LIKE', 'service', $this->service])
            ->andFilterWhere(['LIKE', 'user', $this->user])
            ->andFilterWhere(['LIKE', 'phone', $this->phone]);


        return $dataProvider;
    }

    public function authFilter(\yii\db\ActiveQuery $query)
    {
        //如果没有获取所有管理服务商的权限。就筛选自己的服务商下级的服务商
        if(!\pd\admin\components\Helper::checkRoute('/abs-route/get-all-service')){
            $id = \Yii::$app->user->identity->id;
            $query->andWhere(['sid'=>$id]);
        }
        return $query;
    }
}