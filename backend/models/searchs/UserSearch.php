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
use pd\admin\components\Helper;
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


        $query->andFilterWhere(['LIKE', 's.name', $this->service_name])
            ->andFilterWhere(['LIKE', 'u.status', $this->status])
            ->andFilterWhere(['LIKE', 'u.phone', $this->phone]);

        return $dataProvider;
    }

    public function authFilter(\yii\db\ActiveQuery $query)
    {
        //如果有这个权限，那么只能看自己对应的服务商的业务员
        if(Helper::checkRoute('/abs-route/customer-manager')){
            $id = \Yii::$app->user->identity->id;
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceIds($id);
            $query->andWhere(['s.pid'=>$id]);
            return $query;
        }
        //如果是服务商/代理商
        $service_id = \common\components\Helper::getLoginMemberServiceId();
        if($service_id){
            //这能看自己的业务员
            $query->andWhere(['s.pid' => $service_id]);
        }
        return $query;
    }
}