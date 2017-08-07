<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/20 - 上午10:26
 * 基于 yii2-admin RBAC二次开发
 */

namespace backend\controllers;


use backend\models\Adminuser;
use backend\models\AuthItem;
use backend\models\Menu;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class RbacController extends BackendController
{

    public function actionRoleIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find()->where(['type'=>1]),
        ]);

        return $this->renderPjax('role-index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionRoleCreate()
    {
        $model = new AuthItem();
        $model->scenario = 'create';
        if($model->load(Yii::$app->request->post())){
            if($model->addRole()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }
        return $this->renderAjax('role-create', [
            'model' => $model
        ]);
    }

    public function actionRoleUpdate($name)
    {
        $model = AuthItem::findOne(['name'=>$name]);
        $model->scenario = 'update';
        if($model->load(Yii::$app->request->post())){
            if($model->updateRole()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderAjax('role-create', [
            'model' => $model
        ]);
    }

    public function actionMenuAssign($name)
    {
        $role = $name;

        $model = new AuthItem();
        $model->initMenu();
        //获取role的权限

        $data = Yii::$app->params['menu'];

        return $this->renderPjax('menu-assign', [
            'model' => $data,
            'role' => $role
        ]);
    }

    public function actionRoleAssign()
    {

    }

    public function actionModifyPlatformPassword($id)
    {
        $model = Adminuser::findOne($id);
        $model->scenario = 'modifyPassword';
        if($model->load(Yii::$app->request->post())){
            if($model->modifyPassword()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['role-index'])]);
            }

        }
        return $this->renderAjax('modify-password', [
            'model' => $model
        ]);
    }

    public function actionValidateForm($scenario, $name = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($name){
            $model = AuthItem::findOne(['name'=> $name]);
        }else{
            $model = new AuthItem();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}