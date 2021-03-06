<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午1:49
 *
 */

namespace backend\controllers;


use backend\models\Adminuser;
use backend\models\form\ServiceForm;
use backend\models\Service;
use common\components\Helper;
use Yii;

class AccountController extends BackendController
{
    //账号信息
    public function actionIndex()
    {
        $id = Yii::$app->user->identity->id;
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

    //服务商商信息
    protected function serviceProfile($user_id)
    {
        $service_id = Helper::getLoginMemberServiceId();
        $model =  ServiceForm::getOne($service_id);

        return $this->renderPjax('service_profile', [
            'model' => $model
        ]);
    }
    //代理商信息
    protected function agentProfile($user_id)
    {
        $service_id = Helper::getLoginMemberServiceId();
        $model =  ServiceForm::getOne($service_id);

        return $this->renderPjax('agent_profile', [
            'model' => $model
        ]);
    }

    //代理商平台信息
    protected function serviceAccount($user_id)
    {
        $service_id = Helper::byAdminIdGetServiceId($user_id);
        $model = Service::findOne($service_id);
        return $this->renderPjax('service_account', [
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

    //更改账户密码
    public function actionModifyPassword()
    {
        $id = Yii::$app->user->identity->id;
        $model = Adminuser::findOne($id);
        $model->scenario = 'modifyPassword';
        if($model->load(Yii::$app->request->post())){
            if($model->modifyPassword()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson([
                'data'=> '',
                'code'=>0,
                'message'=> current($model->getFirstErrors())
            ]);
        }
        return $this->renderAjax('modify-password', [
            'model' => $model
        ]);
    }

    /**
     * 更改自身服务商营业状态
     */
    public function actionServiceStatus($opt, $id = null)
    {
        $service_id = $id ? $id : Helper::getLoginMemberServiceId();
        $model = Service::findOne($service_id);
        $model->state = intval($opt);
        if($model->save()){
            return $this->asJson([
                'data'=> '',
                'code'=>1,
                'message'=> '修改成功'
            ]);
        }
        return $this->asJson([
            'data'=> '',
            'code'=>0,
            'message'=> current($model->getFirstErrors())
        ]);

    }
}