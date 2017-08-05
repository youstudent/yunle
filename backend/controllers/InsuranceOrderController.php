<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 上午10:16
 *
 */

namespace backend\controllers;


use backend\models\ActInsurance;
use backend\models\InsuranceDetail;
use backend\models\InsuranceElement;
use backend\models\InsuranceOrder;
use backend\models\searchs\InsuranceDetailSearch;
use Yii;
use yii\data\ActiveDataProvider;

class InsuranceOrderController extends BackendController
{
    public function actionIndex()
    {
        $searchModel = new InsuranceDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionLog($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActInsurance::find()->where(['order_id'=>$id]),
        ]);

        return $this->renderAjax('log', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInfo($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => InsuranceElement::find()->where(['order_id'=>$id]),
        ]);

        $model = InsuranceOrder::findOne($id);
        return $this->renderAjax('info', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionArchives()
    {
        $searchModel = new InsuranceDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionDetail($id)
    {
        $model =  InsuranceDetail::getDetail($id);

        return $this->renderPjax('detail', [
            'model' => $model
        ]);
    }

}