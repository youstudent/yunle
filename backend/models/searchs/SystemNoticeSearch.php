<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 上午11:08
 *
 */

namespace backend\models\searchs;

use backend\models\SystemNotice;
use yii\data\ActiveDataProvider;

class SystemNoticeSearch extends SystemNotice
{
    
    public function rules()
    {
        return [
            [['send_out_people'],'string'],
        ];
    }

    public function search($params)
    {
        $query = SystemNotice::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['LIKE', 'send_out_people' , $this->send_out_people]);
        return $dataProvider;
    }
    
}