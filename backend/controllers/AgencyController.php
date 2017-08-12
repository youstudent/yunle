<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/9 - 下午4:37
 *
 */

namespace backend\controllers;


use backend\models\Agency;
use backend\models\form\AgencyForm;
use backend\models\searchs\AgencySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class AgencyController extends BackendController
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
        $searchModel = new AgencySearch();
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
        $model = new AgencyForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addAgency()){
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);

            }
            return json_encode(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
        }
        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }


    public function actionUpdate($id)
    {
        $model =  AgencyForm::getOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateAgency()){
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
        if (($model = Agency::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionProfile()
    {
        return $this->renderPjax('profile', [
            'model' => new Agency(),
        ]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = AgencyForm::findOne($id);
        }else{
            $model = new AgencyForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}