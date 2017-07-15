<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/15 - 上午11:26
 *
 */

namespace backend\models\form;

use backend\models\Adminuser;
use backend\models\Service;
use Yii;
use yii\db\Exception;

class ServiceForm  extends Service
{
    public $username;
    public $password;

    public function addService($form)
    {
        if(!$this->load($form, '')){
            return false;
        }

        //添加一个管理员用户
        $model = &$this;
        return Yii::$app->db->transaction(function() use ($model, $form){
            $adminuser = new Adminuser();
            if(!$adminuser->addServiceUser($form)){
                $model->addError('username', '用户名不可用');
                throw new Exception("添加会员信息失败");
            }


            $model->created_at = time();
            $model->updated_at = time();
            if(!$model->save()){
                throw new Exception("添加会员信息失败");
            }
            return $model;
        });
    }

}