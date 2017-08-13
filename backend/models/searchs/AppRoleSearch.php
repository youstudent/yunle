<?php
/**
 * Created by PhpStorm.
 * User: pc-u
 * Date: 2017/8/13
 * Time: 20:28
 */

namespace backend\models\searchs;

use backend\models\AppRole;
use common\components\Helper;
use Yii;
use yii\data\ActiveDataProvider;

class AppRoleSearch extends AppRole
{

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = AppRole::find();

        $service_id = Helper::byAdminIdGetServiceId(Yii::$app->user->identity->id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}