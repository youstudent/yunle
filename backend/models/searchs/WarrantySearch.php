<?php

namespace backend\models\searchs;

use backend\models\Member;
use pd\admin\components\Helper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Warranty;
use yii\helpers\ArrayHelper;

/**
 * WarrantySearch represents the model behind the search form about `backend\models\Warranty`.
 */
class WarrantySearch extends Warranty
{
    /**
     * @inheritdoc
     */
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
        $query = Warranty::find();
        $query->alias('war')->joinWith('insuranceOrder')->joinWith('insuranceDetail');

        $query = $this->authFilter($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['idd.chit'=>1]),
        ]);
        ;
        if (!($this->load($params))) {
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
     * 1.管理员所有权限可以看到所有的
     * 2.管理员所属权利即客户经理，可以看到自己的服务商的订单和自己服务商下面业务员的会员的
     * 3.服务商或者代理商-可以看到分发到自己下面的订单，和自己业务员下面的人的
     * @param \yii\db\ActiveQuery $query
     * @return \yii\db\ActiveQuery
     */
    protected function authFilter(\yii\db\ActiveQuery $query)
    {
        //如果有这个权限，那么只能看自己对应的服务商的业务员
        if(Helper::checkRoute('/abs-route/customer-manager')){
            $id = \Yii::$app->user->identity->id;
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceIds($id);
            //获取这些service的会员id
            $member_ids  = Member::find()->where(['pid'=>$ids])->select('id')->column();
            $query->andWhere(['war.member_id'=>$member_ids]);
            return $query;
        }
        //如果是服务商/代理商
        $service_id = \common\components\Helper::getLoginMemberServiceId();
        if($service_id){
            //这能看自己的业务员
            $member_ids  = Member::find()->where(['pid'=>$service_id])->select('id')->column();
            $query->andWhere(['war.member_id'=>$member_ids]);
        }
        return $query;
    }
}
