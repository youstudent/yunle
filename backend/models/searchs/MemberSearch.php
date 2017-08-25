<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 上午11:08
 *
 */

namespace backend\models\searchs;


use backend\models\Member;
use backend\models\User;
use pd\admin\components\Helper;
use yii\data\ActiveDataProvider;

class MemberSearch extends Member
{
    public $salesman_name;
    public $member_name;


    public function rules()
    {
        return [
            ['type', 'integer'],
            [['phone', 'status'], 'number'],
            [['created_at','salesman_name', 'member_name'],'string'],
        ];
    }

    public function search($params)
    {

        $query = Member::find();
        $query->where(['m.deleted_at'=> null]);
        $query->alias('m')->joinWith("salesmanName");
        $query->joinWith("memberInfo");

        $this->authFilter($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        //格式化时间
        if ($this->created_at){
            $start_date = substr($this->created_at,0,10);
            $start = strtotime($start_date);

            if($start > 0){
                $query->andFilterWhere(['>=','m.created_at',$start]);
            }

            $end_date =  substr($this->created_at,12);
            $end = strtotime($end_date);

            if($end > 0){
                $query->andFilterWhere(['<=','m.created_at',$end]);
            }
        }

        if($this->status != 'ALL'){
            $query->andFilterWhere(['m.status'=> $this->status]);
        }
        if($this->type){
            $query->andFilterWhere(['m.type'=>$this->type]);
        }


        $query->andFilterWhere(['LIKE', 'u.name' , $this->salesman_name]);
        $query->andFilterWhere(['LIKE', 'm.phone' , $this->phone]);
        $query->andFilterWhere(['LIKE', 'md.name' , $this->member_name]);

        return $dataProvider;
    }

    public function authFilter(\yii\db\ActiveQuery $query)
    {
        //所属权限。如果有这个权限，那么只能看自己对应的服务商的业务员
        if(Helper::checkRoute('/abs-route/customer-manager')){
            $id = \Yii::$app->user->identity->id;
            $service_ids = \common\components\Helper::byCustomerManagerIdGetServiceIds($id);
            //根据服务商ids找到对应的会员
            $ids = Member::find()->where(['pid'=>$service_ids])->select('id')->column();
            $query->andWhere(['s.pid'=>$ids]);
            return $query;
        }
        //以下都是- 所有权限

        $service_id = \common\components\Helper::getLoginMemberServiceId();
        //如果有service_id 。则登录的是服务商。那么可以看到的就是自己服务商下面的会员
        if($service_id){
            $ids = User::find()->where(['pid'=>$service_id])->select('id')->column();
            $query->andWhere(['m.pid' => $ids]);
            return $query;
        }
        return $query;
    }
}