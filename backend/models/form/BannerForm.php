<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午5:51
 *
 */

namespace backend\models\form;


use backend\models\Banner;
use Yii;
use yii\base\Exception;

class BannerForm extends Banner
{

    public function scenarios()
    {
        return [
            'create' => ['name', 'describe', 'status', 'created_at', 'updated_at', 'action_type', 'action_value'],
            'update' => ['name', 'describe', 'status', 'created_at', 'updated_at', 'action_type', 'action_value'],
        ];
    }

    public function addBanner()
    {

        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }

    public function updateBanner()
    {
        if(!$this->validate()){
            return false;
        }
        return Yii::$app->db->transaction(function(){
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }

}