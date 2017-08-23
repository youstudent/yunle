<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午4:44
 *
 */

namespace backend\controllers;


use backend\models\Article;
use backend\models\form\ArticleForm;
use backend\models\form\BannerForm;
use backend\models\searchs\ArticleSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class ArticleController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' =>  [
                'class' => VerbFilter::className(),
                'actions' => [
                    'set-status' => ['post'],
                    'delete' => ['post']
                ]
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        $model = new ArticleForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addArticle()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model =  ArticleForm::findOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateArticle()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '修改成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '修改失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        if(BannerForm::findOne(['action_value'=>$id])){
            Yii::$app->session->setFlash('error', '请先删除关联此文章的广告，再执行此操作!');
            return $this->redirect(['index']);
        }
        //先价差有没有关联对应广告
        ArticleForm::findOne($id)->delete();
        Yii::$app->session->setFlash('success', '删除成功');

        return $this->redirect(['index']);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = ArticleForm::findOne($id);
        }else{
            $model = new ArticleForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }

    public function actionSetStatus($id, $opt){
        Article::setStatus($id, $opt);
        Yii::$app->session->setFlash('success', $opt ? '文章已显示' : '文章已隐藏');
        return $this->redirect(['index']);

    }

    public function actionDropDownList($column_id, $article_id = 0)
    {
        return Article::dropDownListHtml($column_id, $article_id);
    }
}