<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/20 - 上午10:26
 * 基于 yii2-admin RBAC二次开发
 */

namespace backend\controllers;


use backend\models\Adminuser;
use backend\models\AuthAssignment;
use backend\models\AuthItem;
use backend\models\AuthItemChild;
use backend\models\form\AdminuserForm;
use backend\models\Menu;
use backend\models\searchs\AdminuserSearch;
use backend\models\searchs\AuthAssignmentSearch;
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
        //$model->initAppMenu();
        //获取role的权限

        $menu = AuthItemChild::getAuthMenu($name);

        return $this->renderPjax('menu-assign', [
            'menu' => $menu,
            'role' => $role
        ]);
    }

    public function actionSetMenu()
    {
        $model = new AuthItemChild();
        if($model->updatMenuAssign(Yii::$app->request->post())){
            return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
        }
        return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
    }

    public function actionGetMenu($name)
    {
        $menu = AuthItemChild::getAuthMenu($name);

        return $this->asJson($menu);
    }

    //员工管理 begin
    public function actionAccountIndex()
    {
        $searchModel = new AdminuserSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('account-index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionAccountCreate()
    {
        $model = new AdminuserForm();
        $model->scenario = 'create';
        if($model->load(Yii::$app->request->post())){
            if($model->addAccount()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);

        }
        return $this->renderAjax('account-create', [
            'model' => $model
        ]);
    }

    public function actionAccountUpdate($id)
    {
        $model =  AdminuserForm::findOne($id);
        $model->scenario = 'update';
        if($model->load(Yii::$app->request->post())){
            if($model->updateAccount()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '保存失败']);

        }
        return $this->renderAjax('account-update', [
            'model' => $model
        ]);
    }

    public function actionAccountModifyRole($id)
    {
        $type = 1;
        $model =  AuthAssignment::assignRole($id, $type);

        if($model->load(Yii::$app->request->post())){
            if($model->modifyRole($type)){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '更新失败']);
        }

        return $this->renderAjax('account-modify-role', [
           'model' => $model
        ]);
    }

    public function actionAccountValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = AdminuserForm::findOne($id);
        }else{
            $model = new AdminuserForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }

    //员工管理 end


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

    public function actionRoleDelete($name)
    {
        $model = AuthItem::findOne(['name'=>$name]);
        $model->delete();
        return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['role-index'])]);
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