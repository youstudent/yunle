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
    /**
     * 角色列表
     * @return string
     */
    public function actionRoleIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find()->where(['type'=>1]),
        ]);

        return $this->renderPjax('role-index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 创建角色
     * @return string|\yii\web\Response
     */
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

    /**
     * 更新角色
     * @param $name
     * @return string|\yii\web\Response
     */
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

    /**
     * 菜单授权页
     * @param $name
     * @return string
     */
    public function actionMenuAssign($name)
    {
        return $this->renderPjax('menu-assign', [
            'role' => $name
        ]);
    }

    /**
     * 设置菜单
     * @return \yii\web\Response
     */
    public function actionSetMenu()
    {
        $model = new AuthItemChild();
        if($model->updatMenuAssign()){
            return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
        }
        return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
    }

    /**
     * 获取菜单
     * @param $name
     * @return \yii\web\Response
     */
    public function actionGetMenu($name)
    {
        $menu = AuthItemChild::getAuthMenu($name);

        return $this->asJson($menu);
    }

    /**
     * 账号列表
     * @return string
     */
    public function actionAccountIndex()
    {
        $searchModel = new AdminuserSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('account-index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * 创建账号
     * @return string|\yii\web\Response
     */
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

    /**
     * 更细账号信息
     * @param $id
     * @return string|\yii\web\Response
     */
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

    /**
     * 变更角色
     * @param $id
     * @return string|\yii\web\Response
     */
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

    /**
     * 添加账号的ajax验证
     * @param $scenario
     * @param null $id
     * @return array
     */
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

    /**
     * 更改密码
     * @param $id
     * @return string|\yii\web\Response
     */
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

    /**
     * 删除role
     * @param $name
     * @return \yii\web\Response
     */
    public function actionRoleDelete($name)
    {
        $model = AuthItem::findOne(['name'=>$name]);
        $model->delete();
        return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['role-index'])]);
    }

    /**
     * 添加角色表单验证
     * @param $scenario
     * @param null $name
     * @return array
     */
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