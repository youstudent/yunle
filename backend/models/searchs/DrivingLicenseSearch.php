<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午3:30
 *
 */

namespace backend\models\searchs;


use backend\models\DrivingLicense;
use backend\models\Member;
use pd\admin\components\Helper;
use yii\data\ActiveDataProvider;

class DrivingLicenseSearch extends DrivingLicense
{
    public function search($params)
    {
        $query = DrivingLicense::find();

        $query = $this->authFilter($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if (isset($params['member_id']) && !empty($params['member_id'])) {
            $query->andFilterWhere(['member_id' => $params['member_id']]);
        }

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
            // 获取到自己服务商或代理商id组
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceMemberIds($id);
            $query->andWhere(['member_id'=>$ids]);
            return $query;
        }
        //如果是服务商/代理商
        $service_id = \common\components\Helper::getLoginMemberServiceId();
        if($service_id){
            //这能看自己的业务员下的会员的订单
            $ids = \common\components\Helper::byServiceIdGetServiceMemberIds($service_id);
            $query->andWhere(['member_id'=>$ids]);
        }
        return $query;
    }
}