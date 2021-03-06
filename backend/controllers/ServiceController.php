<?php

namespace backend\controllers;

use backend\models\AppRoleAssign;
use backend\models\form\ServiceForm;
use backend\models\searchs\ServiceSearch;
use backend\models\Service;
use backend\models\ServiceImg;
use common\models\ServiceTag;
use Yii;
use backend\models\Adminuser;
use backend\models\searchs\Adminuser as AdminuserSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceController implements the CRUD actions for Adminuser model.
 */
class ServiceController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'set-status' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Adminuser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adminuser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model =  ServiceForm::getOne($id);

        return $this->renderPjax('view', [
            'model' => $model
        ]);
    }
    /**
     * Creates a new Adminuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addService()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
        }
        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }


    public function actionUpdate($id)
    {
        $model =  ServiceForm::getOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateService()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
        }
        return $this->renderPjax('update', [
            'model' => $model
        ]);
    }


    /**
     * Finds the Adminuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adminuser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionProfile()
    {
        return $this->renderPjax('profile', [
           'model' => new Service(),
        ]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = ServiceForm::findOne($id);
        }else{
            $model = new ServiceForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }

    public function actionSetStatus($id, $opt)
    {
        $model = Service::findOne($id);
        $model->status = $opt;
        $model->save();
        Yii::$app->session->setFlash('success', '服务商 ['. $model->name .' ] 状态变更成功');
        return $this->redirect(['index']);
    }

    /**
     * 获取指定服务商，所有APP角色
     * @param $service_id
     * @param $salesman_id
     * @return mixed
     */
    public function actionRoleList($service_id, $salesman_id)
    {
        return AppRoleAssign::dropDownListHtml($service_id, $salesman_id);
    }
    
    
    
    //修改服务商密码
    public function actionUpdatePassword($id)
    {
        $member = ServiceForm::findOne($id);
       // $member = Service::findOne($id);
        $member->scenario = 'updatepassword';
        if ($member->load(Yii::$app->request->post())) {
            if ($member->updatePassword()) {
                return $this->asJson(['data' => '', 'code' => 1, 'message' => '更新成功', 'url' => Url::to(['service/index'])]);
            }
            return $this->asJson(['data' => '', 'code' => 0, 'message' =>current($member->getFirstErrors())]);
        }
        return $this->renderAjax('updatepassword', [
            'model' => $member,
        ]);
    }

}
