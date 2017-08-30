<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:17
 *
 */

namespace backend\models\searchs;


use backend\models\Order;
use backend\models\OrderDetail;
use pd\admin\components\Helper;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class OrderSearch extends OrderDetail
{

    public $salesman_name;


    public function rules()
    {
        return [
            [['order_type', 'member_id'], 'integer'],
            [['created_at', 'order_salesman'], 'string'],
            [['order_created_at', 'order_user', 'order_phone', 'order_car', 'order_service'], 'string'],
        ];
    }

    public function attributes()
    {
        return ArrayHelper::merge(parent::attributes(), [
            'order_created_at',
            'order_user',
            'order_phone',
            'order_car',
            'order_service',
            'order_type',
            'member_id',
            'order_salesman',
        ]);
    }

    public function search($params)
    {
        $query = OrderDetail::find();
        $query->alias('od')->joinWith('order');
        $query->joinWith('member');

        $query = $this->authFilter($query);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (isset($params['action']) && !empty($params['action'])) {
            $query->andFilterWhere(['o.type' => 5])
                ->andFilterWhere(['od.action'=> ['处理中','待接单','待邮寄']]);

            return $dataProvider;
        }
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        //格式化时间
        if ($this->order_created_at) {
            $start_date = substr($this->order_created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'o.created_at', $start]);
            }

            $end_date = substr($this->o_created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'o.created_at', $end]);
            }
        }
        $query->andFilterWhere(['o.type' => $this->order_type])
            ->andFilterWhere(['LIKE', 'o.service', $this->order_service])
            ->andFilterWhere(['LIKE', 'o.user', $this->order_user])
            ->andFilterWhere(['LIKE', 'o.phone', $this->order_phone])
            ->andFilterWhere(['LIKE', 'o.car', $this->order_car])
            ->andFilterWhere(['od.member_id'=> $this->member_id]);

        return $dataProvider;
    }

    /**
     ** 权限过滤
     * 1.管理员所有权限可以看到所有的订单
     * 2.管理员所属权利即客户经理，可以看到自己的服务商的订单和自己服务商下面业务员的会员的订单
     * 3.服务商或者代理商-可以看到分发到自己下面的订单，和自己业务员下面的人的订单
     * @param \yii\db\ActiveQuery $query
     * @return \yii\db\ActiveQuery
     */
    protected function authFilter(\yii\db\ActiveQuery $query)
    {
        //如果有这个权限，那么只能看自己对应的服务商的业务员
        if(Helper::checkRoute('/abs-route/customer-manager')){
            $id = \Yii::$app->user->identity->id;
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceIds($id);
            $query->andWhere(['od.service_id'=>$id]);
            return $query;
        }
        //如果是服务商/代理商
        $service_id = \common\components\Helper::getLoginMemberServiceId();
        if($service_id){
            //这能看自己的业务员
            $query->andWhere(['od.service_id' => $service_id]);
        }
        return $query;

    }
}