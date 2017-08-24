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
    public $name;

    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['status', 'column_id', 'views', 'created_at', 'updated_at'], 'integer'],
            [['title', 'author', 'name'], 'string', 'max' => 50],
        ];
    }

    public function search($params)
    {
        $query = Article::find();
        $query->alias('a')->joinWith('column');

//        $this->authFilter($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params))) {
            return $dataProvider;
        }
        //格式化时间
        if ($this->created_at) {
            $start_date = substr($this->created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'a.created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'a.created_at', $end]);
            }
        }
        $query->andFilterWhere(['a.title' => $this->title])
            ->andFilterWhere(['a.status' => $this->status])
            ->andFilterWhere(['c.name' => $this->name]);

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