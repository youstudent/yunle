<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午4:43
 *
 */

namespace backend\controllers;


use backend\models\Banner;
use backend\models\form\BannerForm;
use backend\models\searchs\BannerSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class BannerController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new BannerSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        $model = new BannerForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addBanner()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0]);
        }
        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }


    public function actionUpdate($id)
    {
        $model = BannerForm::findOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateBanner()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0]);
        }
        return $this->renderPjax('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        BannerForm::findOne($id)->delete();
        Yii::$app->session->setFlash('success', '删除成功!');
        return $this->redirect(['index']);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = BannerForm::findOne($id);
        }else{
            $model = new BannerForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }

}