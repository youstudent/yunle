<?php

namespace backend\controllers;

use Yii;
use backend\models\Warranty;
use backend\models\searchs\WarrantySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * WarrantyController implements the CRUD actions for Warranty model.
 */
class WarrantyController extends BackendController
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

    public function actionIndex()
    {
        $searchModel = new WarrantySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetail($id)
    {
        $model =  Warranty::getDetail($id);

        return $this->renderPjax('detail', [
            'model' => $model
        ]);
    }

    public function actionEdit($id)
    {

        $model =  Warranty::getDetail($id);

        return $this->renderPjax('update', [
            'model' => $model
        ]);
    }

    public function actionUpdate()
    {
        $data = Yii::$app->request->post();

        $model =  Warranty::getDetail($data['order_id']);
        $info = Warranty::changeInfo(null,$data);

        if($info){
            Yii::$app->session->setFlash('success', '修改成功!  ');
            return $this->redirect(['index']);
        }
        Yii::$app->session->setFlash('success', '修改失败!  ');
        return $this->redirect(['index', 'id' => $model->order_id]);
    }

}
