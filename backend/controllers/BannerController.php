<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午4:43
 *
 */

namespace backend\controllers;


use backend\models\form\BannerForm;
use backend\models\searchs\BannerSearch;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class BannerController extends BackendController
{
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
        if($model->addBanner(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['banner/index'])]);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }
}