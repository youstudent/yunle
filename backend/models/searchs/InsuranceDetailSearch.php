<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午3:44
 *
 */

namespace backend\models\searchs;


use backend\models\InsuranceDetail;
use pd\admin\components\Helper;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class InsuranceDetailSearch extends InsuranceDetail
{
    public function rules()
    {
        return [
            [['action', 'member_id'], 'integer'],
            [['order_created_at','order_user', 'order_car', 'order_company'], 'string'],
            [['order_phone'], 'number'],
        ];
    }

    public function attributes()
    {
        return ArrayHelper::merge(parent::attributes(), [
            'order_sn',
            'order_user',
            'order_phone',
            'order_car',
            'order_service',
            'order_type',
            'order_nation',
            'order_licence',
            'order_company',
            'order_cost',
            'order_status',
            'order_created_at',
            'member_id',
        ]);
    }

    public function search($params)
    {
        $query = InsuranceDetail::find();
        $query->alias('ind')->joinWith('insuranceOrder');

        $query = $this->authFilter($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        ;
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        //格式化时间
        if ($this->order_created_at) {
            $start_date = substr($this->created_at, 0, 10);
            $start = strtotime($start_date);

            if ($start > 0) {
                $query->andFilterWhere(['>=', 'io.created_at', $start]);
            }

            $end_date = substr($this->created_at, 12);
            $end = strtotime($end_date);

            if ($end > 0) {
                $query->andFilterWhere(['<=', 'io.created_at', $end]);
            }
        }
        $query->andFilterWhere(['type' => $this->order_type])
            ->andFilterWhere(['LIKE', 'io.user', $this->order_user])
            ->andFilterWhere(['LIKE', 'io.phone', $this->order_phone])
            ->andFilterWhere(['LIKE', 'io.car', $this->order_car])
            ->andFilterWhere(['LIKE', 'io.company', $this->order_company]);


        return $dataProvider;
    }

    /**
     ** 权限过滤
     * 1.管理员所有权限可以看到所有的订单
     * 2.管理员所属权利即客户经理，可以看到自己的服务商的订单和自己服务商下面业务员的会员的订单
     * 3.服务商或者代理商-可以看到自己业务员下面的人的订单
     * @param \yii\db\ActiveQuery $query
     * @return \yii\db\ActiveQuery liao ge tian zhai di yi ha ha ha
     */
    protected function authFilter(\yii\db\ActiveQuery $query)
    {
        //如果有这个权限，那么只能看自己对应的服务商的业务员
        if(Helper::checkRoute('/abs-route/customer-manager')){
            $id = \Yii::$app->user->identity->id;
            // 获取到自己服务商或代理商id组
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceMemberIds($id);
            $query->andWhere(['ind.member_id'=>$ids]);
            return $query;
        }
        //如果是服务商/代理商
        $service_id = \common\components\Helper::getLoginMemberServiceId();
        if($service_id){
            //这能看自己的业务员下的会员的订单
            $ids = \common\components\Helper::byServiceIdGetServiceMemberIds($service_id);
            $query->andWhere(['ind.member_id'=>$ids]);
        }
        return $query;

    }
}