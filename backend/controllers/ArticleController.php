<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午4:44
 *
 */

namespace backend\controllers;


use backend\models\form\ArticleForm;
use backend\models\searchs\ArticleSearch;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        $model = new ArticleForm();
        if($model->addArticle(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['backend/index'])]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }
}