<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/20 - 上午10:26
 * 基于 yii2-admin RBAC二次开发
 */

namespace backend\controllers;

use backend\models\AuthItem;
use backend\models\form\Role;
use backend\models\searchs\BackendAuthItemSearch;
use pd\admin\models\Assignment;
use pd\admin\models\searchs\AuthItem as AuthItemSearch;
use backend\models\Adminuser;
use backend\models\form\AdminuserForm;
use backend\models\searchs\AdminuserSearch;
use backend\models\searchs\AuthAssignmentSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class RbacController extends BackendController
{
    public $type;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'assign' => ['post'],
                    'remove' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionRoleIndex()
    {
        $searchModel = new BackendAuthItemSearch(['type' => 1]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('role-index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    /**
     * 创建角色
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRoleCreate()
    {
        $model = new AuthItem(null);
        $model->type = 1;
        if($model->load(Yii::$app->getRequest()->post())){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
        }
        return $this->renderAjax('role-create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  string $id
     * @return mixed
     */
    public function actionRoleUpdate($id)
    {
        $this->type=1;
        $model = $this->findModel($id);
        if($model->load(Yii::$app->getRequest()->post())){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
        }

        return $this->renderAjax('role-update', [
            'model' => $model
        ]);
    }

    protected function findModel($id)
    {
        $auth = Yii::$app->getAuthManager();

        $item = $this->type === 1 ? $auth->getRole($id) : $auth->getPermission($id);
        if ($item) {
            return new AuthItem($item);
        } else {
            throw new NotFoundHttpException('页面不存在');
        }
    }


    /**
     * 添加角色表单验证
     * @param $scenario
     * @param null $name
     * @return array
     */
    public function actionValidateForm($scenario, $name = null)
    {
        return $this->asJson([]);
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

    /**
     * 账号列表
     * @return string
     */
    public function actionAccountIndex()
    {
        $manager = Yii::$app->getAuthManager();
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
        $model = new Role($id);
        if($model->load(Yii::$app->request->post())){
            if($model->modifyRole()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '保存失败']);

        }

        return $this->renderAjax('account-modify-role', [
           'model' => $model
        ]);
    }
    /**
     * Finds the Assignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer $id
     * @return Assignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAssignmentModel($id)
    {
        $class = $this->userClassName;
        if (($user = $class::findIdentity($id)) !== null) {
            return new Assignment($id, $user);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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

    public function actionRoleAssign($id)
    {
        return $this->renderPjax('role-assign', [
            'role' => $id
        ]);
    }

    public function actionGetPermission($name)
    {
        $auth = Yii::$app->getAuthManager();
        $item = $auth->getRole($name);

        $model = new AuthItem($item);
        $item = $model->getPermissionItems();
        $permission = array_merge($item['avaliable'], $item['assigned']);

        $tree = [
            'text' => '全部',
            'state' => [
                'selected' => count($item['avaliable']) === 0 ? true : false
            ],
            'children' => []
        ];
        foreach($permission as $k => $val)
        {
            $tree['children'][] = [
                'text' =>$k,
                'state' => [
                    'selected' => isset($item['assigned'][$k]) ? true : false
                ],
                'children' => []
            ];
        }
        return $this->asJson($tree);
    }

    public function actionAssignPermission($name)
    {
        $items = Yii::$app->request->post('item', []);
        $auth = Yii::$app->getAuthManager();
        $item = $auth->getRole($name);

        $model = new AuthItem($item);
        $model->type =1;
        $success = $model->addChildren($items);
        if($success == 1){
            return $this->asJson(['data'=>[], 'message'=>'success', 'code'=> 1, 'url'=> '']);
        }
        return $this->asJson(['data'=>[], 'message'=> '授权失败', 'code'=>0]);
    }

    public function actionRemovePermission($name)
    {
        $items = Yii::$app->request->post('item', []);
        $auth = Yii::$app->getAuthManager();
        $item = $auth->getRole($name);

        $model = new AuthItem($item);
        $model->type =1;
        $success = $model->removeChildren($items);
        if($success == 1){
            return $this->asJson(['data'=>[], 'message'=>'success', 'code'=> 1, 'url'=> '']);
        }
        return $this->asJson(['data'=>[], 'message'=> '取消授权失败', 'code'=>0]);
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

    //权限列表
    public function actionAssign($id)
    {


    }
}