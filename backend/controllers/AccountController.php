<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午1:49
 *
 */

namespace backend\controllers;


use backend\models\Adminuser;
use backend\models\Service;

class AccountController extends BackendController
{
    public function actionIndex()
    {
        //判断当前用户是什么角色
        $role = 'platform';
        switch($role){
            case 'service':
                return $this->serviceAccount();
                break;
            case 'agent':
                return $this->agentAccount();
                break;
            case 'platform':
                return $this->platformAccount();
                break;
            case 'default':
                return $this->serviceAccount();
                break;
        }
    }

    protected function serviceAccount()
    {
        $id = 1;
        $model = Service::findOne($id);
        return $this->renderPjax('service_account', [
            'model' => $model
        ]);
    }
    protected function agentAccount()
    {
        $id = 1;
        $model = Service::findOne($id);
        return $this->renderPjax('agent_account', [
            'model' => $model
        ]);
    }
    protected function platformAccount()
    {
        $id = 1;
        $model = Adminuser::findOne($id);
        return $this->renderPjax('platform_account', [
            'model' => $model
        ]);
    }
    protected function defaultAccont()
    {

    }
}