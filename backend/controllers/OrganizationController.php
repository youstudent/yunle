<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/20 - 上午10:26
 * 基于 yii2-admin RBAC二次开发
 */

namespace backend\controllers;

use backend\models\AppMenu;
use backend\models\AppMenuWithout;
use backend\models\AppRole;
use backend\models\AppRoleAssign;
use backend\models\AuthItem;
use backend\models\form\Role;
use backend\models\searchs\AppRoleSearch;
use backend\models\searchs\BackendAuthItemSearch;
use backend\models\searchs\OrganizationSearch;
use backend\models\searchs\ServiceAuthItemSearch;
use common\components\Helper;
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

class OrganizationController extends BackendController
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
        $searchModel = new ServiceAuthItemSearch(['type' => 1]);
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
        $id = Helper::getRolePrefix().$id;
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
        $searchModel = new OrganizationSearch();
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
            if($model->serviceAddAccount()){
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
     * 删除员工账号
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAccountDelete($id)
    {
        $model =  AdminuserForm::deleteAll(['id'=>$id]);
        if($model){
            return $this->redirect(['/organization/account-index']);
          // return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['index'])]);
        }
           return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '删除失败']);
        
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
            if($model->modifyServiceRole()){
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
        $name = Helper::getRolePrefix().$name;

        $item = $auth->getRole($name);

        $model = new AuthItem($item);
        $item = $model->getPermissionItems();
        $permission = array_merge($item['avaliable'], $item['assigned']);
        //读取一个服务商允许的权限表.过滤掉不允许的权限

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
            return $this->asJson(['data'=>[], 'message'=> '操作失败', 'code'=>0]);
        }
        return $this->renderAjax('modify-password', [
            'model' => $model
        ]);
    }

    public function actionAppRoleIndex()
    {
        $searchModel = new AppRoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('app-role-index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionAppRoleCreate()
    {
        $model = new AppRole();
        $model->service_id = Helper::byAdminIdGetServiceId(Yii::$app->user->identity->id);
        if( $model->load(Yii::$app->request->post()) ){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=>[], 'message'=> '操作失败', 'code'=>0]);
        }
        return $this->renderAjax('app-role-create', [
            'model' => $model
        ]);
    }
    public function actionAppRoleUpdate($id)
    {
        $model = AppRole::findOne($id);
        if( $model->load(Yii::$app->request->post())){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['role-index'])]);
            }
            return $this->asJson(['data'=>[], 'message'=> '操作失败', 'code'=>0]);
        }
        return $this->renderAjax('app-role-update', [
            'model' => $model
        ]);
    }
    public function actionAppRoleAssign($id)
    {
        return $this->renderPjax('app-role-assign', [
           'id' => $id
        ]);

    }
    public function actionGetAppPermission($name)
    {
        //判断角色所属的服务商，是代理商还是服务商
        $service_type = Helper::byAppRoleGetServiceType($name);
        if($service_type == 1){
            $items = AppMenu::find()->select('name,parent,id')->select('id,name as text,parent as pid')->indexBy('id')->asArray()->all();
        }else{
            $items = AppMenu::find()->select('name,parent,id')->where(['only_service'=> 0])->select('id,name as text,parent as pid')->indexBy('id')->asArray()->all();

        }
        $service_id =  Helper::byAdminIdGetServiceId(Yii::$app->user->identity->id);
        $out = AppMenuWithout::find()->select('menu_id')->where(['service_id'=>$service_id, 'role_id'=>$name])->column();


        //格式化成树形菜单
        $tree = [];
        foreach($items as $key => $item){
            $items[$key]['children'] = [];
            $items[$key]['state']['selected'] = false;
            $items[$key]['state']['opened'] = true;
            if(!in_array($item['id'], $out) ){
                $items[$key]['state']['selected'] = true;
            }
            if(in_array($item['id'], [1,2,7,8,14,19,21])){
                $items[$key]['state']['selected'] = false;
            }
            if(isset($items[$item['pid']])){
                $items[$item['pid']]['children'][] = &$items[$item['id']];
            }else{
                $tree[] = &$items[$item['id']];
            }
        }

        return $this->asJson($tree);
    }

    /**
     * 授权APP菜单
     * @param $name
     * @return \yii\web\Response
     */
    public function actionAssignAppPermission($name)
    {
        $items = Yii::$app->request->post('item', []);
        //先清空老的菜单
        $service_id =  Helper::byAdminIdGetServiceId(Yii::$app->user->identity->id);
        AppMenuWithout::deleteAll(['service_id'=>$service_id, 'role_id'=>$name]);

        //获取所有的菜单id
        $service_type = Helper::byAppRoleGetServiceType($name);
        if($service_type == 1){
            $all_app_menu_ids = AppMenu::find()->select('id')->column();
        }else{
            $all_app_menu_ids = AppMenu::find()->where(['only_service'=> 0])->select('id')->column();
        }

        //找到没有的id,即使无权限，或者取消授权的id
        $with_out_ids = array_diff($all_app_menu_ids, $items);
        $with_out = [];
        foreach ($with_out_ids as $id){
            $with_out[] = [
                'service_id' => $service_id,
                'role_id' => $name,
                'menu_id' => $id
            ];
        }
        Yii::$app->db->createCommand()->batchInsert(AppMenuWithout::tableName(), ['service_id', 'role_id', 'menu_id'], $with_out)->execute();


        return $this->asJson(['data'=>[], 'message'=>'success', 'code'=> 1, 'url'=> '']);
    }

    public function actionRemoveAppPermission($name)
    {
        $items = Yii::$app->request->post('item', []);
        $service_id =  Helper::byAdminIdGetServiceId(Yii::$app->user->identity->id);
        $model = new AppMenuWithout();
        $model->service_id = $service_id;
        $model->role_id = $name;
        $model->menu_id = $items;

        if($model->save()){
            return $this->asJson(['data'=>[], 'message'=>'success', 'code'=> 1, 'url'=> '']);
        }
        return $this->asJson(['data'=>[], 'message'=> '授权失败', 'code'=>0]);
    }

    /**
     * 变更app 角色
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAccountAppModifyRole($id)
    {
        $model = AppRoleAssign::getOne($id);
        if($model->load(Yii::$app->request->post())){
            if($model->save()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '保存失败']);

        }

        return $this->renderAjax('account-app-modify-role', [
            'model' => $model
        ]);
    }
}