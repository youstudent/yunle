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

        return $this->renderPjax('platform_account', [
            'model' => Yii::$app->getAuthManager()->getRolesByUser(1)
        ]);
    }

    //平台信息
    public function actionPlatform()
    {

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