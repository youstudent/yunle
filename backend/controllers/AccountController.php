<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午1:49
 *
 */

namespace backend\controllers;


use backend\models\Adminuser;
use backend\models\Service;
use Yii;

class AccountController extends BackendController
{
    //账号信息
    public function actionIndex()
    {
        $id = Yii::$app->user->getId();
        $roles = Yii::$app->getAuthManager()->getRolesByUser($id);
        $role = !empty($roles) && is_array($roles) ? current($roles)->name : '默认';

        switch($role){
            case '服务商':
                return $this->serviceProfile($id);
                break;
            case '代理商':
                return $this->agentProfile($id);
                break;
        }
        return $this->defaultProfile($id, $role);

    }

    //平台信息
    public function serviceProfile($user_id)
    {
        $id = Yii::$app->user->getId();
        $role = Yii::$app->getAuthManager()->getRolesByUser($id);
    }

    //代理商平台信息
    protected function serviceAccount($user_id)
    {
        $id = 1;
        $model = Service::findOne($id);
        return $this->renderPjax('service_account', [
            'model' => $model
        ]);
    }
    protected function agentProfile($user_id)
    {
        $id = 1;
        $model = Service::findOne($id);
        return $this->renderPjax('agent_account', [
            'model' => $model
        ]);
    }
    protected function defaultProfile($user_id, $role)
    {
        $model = Adminuser::findOne($user_id);
        return $this->renderPjax('default_account', [
            'model' => $model,
            'role' => $role
        ]);
    }

    /**
     * 选择客户经理的空方法,只用来展示路由
     */
    public function actionGetCustomerManager()
    {

    }

}