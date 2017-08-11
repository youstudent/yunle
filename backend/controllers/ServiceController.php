<?php

namespace backend\controllers;

use backend\models\form\ServiceForm;
use backend\models\searchs\ServiceSearch;
use backend\models\Service;
use backend\models\ServiceImg;
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
                    'delete' => ['POST'],
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
        return $this->renderPjax('view', [
            'model' => $this->findModel($id),
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
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
            }
            return json_encode(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
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
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
            }
            return json_encode(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
        }
        return $this->renderPjax('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Adminuser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
}
