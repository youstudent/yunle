<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 上午11:08
 *
 */

namespace backend\models\searchs;


use backend\models\Member;
use yii\data\ActiveDataProvider;

class MemberSearch extends Member
{
    public $salesman_username;
    public $member_name;


    public function rules()
    {
        return [
            ['type', 'integer'],
            [['phone', 'status'], 'number'],
            [['created_at','salesman_username', 'member_name'],'string'],
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


        $query->andFilterWhere(['LIKE', 'u.username' , $this->salesman_username]);
        $query->andFilterWhere(['LIKE', 'm.phone' , $this->phone]);
        $query->andFilterWhere(['LIKE', 'md.name' , $this->member_name]);

        return $dataProvider;
    }

    public function authFilter(\yii\db\ActiveQuery $query)
    {
        if(\pd\admin\components\Helper::checkRoute('/abs-route/get-all-member')) {
            return $query;
        }

        $group = \common\components\Helper::getLoginMemberRoleGroup();
        $id = \Yii::$app->user->identity->id;
        if($group == 1){
            //用客户经理的身份查询
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceMemberIds($id);
            $query->andWhere(['m.pid'=>$ids]);
            return $query;
        }
        if($group == 2){
            //由服务商查询
            $service_id = \common\components\Helper::byAdminIdGetServiceId($id);
            $query->andWHere(['u.id' => $id]);
            return $query;
        }


    }
}