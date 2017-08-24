<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午1:43
 *
 */

namespace backend\models\searchs;


use backend\models\Adminuser;
use backend\models\Service;
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

        $this->authFilter($query);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (isset($params['id']) && !empty($params['id'])) {
            $this->service_name = Service::findOne($params['id'])->name;
            $query->andFilterWhere(['LIKE', 's.name', $this->service_name]);

            return $dataProvider;
        }
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

    public function authFilter(\yii\db\ActiveQuery $query)
    {
        if(\pd\admin\components\Helper::checkRoute('/abs-route/get-all-salesman')) {
            return $query;
        }
        $group = \common\components\Helper::getLoginMemberRoleGroup();
        $id = \Yii::$app->user->identity->id;
        if($group == 1){
            //用客户经理的身份查询
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceIds($id);
            $query->andWhere(['s.pid'=>$id]);
            return $query;
        }else{
            //以服务商代理商的身份查询 - 1. 如果有查看代理商或者服务商所有销售的权限
            $service_id = \common\components\Helper::byAdminIdGetServiceId($id);
            $query->andWHere(['u.pid' => $service_id]);
            return $query;
        }
    }
}