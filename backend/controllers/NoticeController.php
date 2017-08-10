<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午3:53
 *
 */

namespace backend\controllers;


use backend\models\searchs\NoticeSearch;
use Yii;

class NoticeController extends BackendController
{
    public function actionIndex()
    {

        $searchModel = new NoticeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}