<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:15
 *
 */

namespace backend\controllers;


use backend\models\ActDetail;
use backend\models\form\OrderForm;
use backend\models\Order;
use backend\models\searchs\InsuranceOrderSearch;
use backend\models\searchs\OrderSearch;
use common\models\ActInsurance;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class OrderController extends BackendController
{
    //订单列表
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        $model = new OrderForm();
        if($model->addOrder(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['member/index'])]);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }


    public function actionUpdate($id)
    {
        $model = OrderForm::findOne(['id'=>$id]);

        if($model->updateOrder(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['member/index'])]);
        }
        return $this->renderPjax('update', [
            'model' => $model
        ]);
    }

    public function actionLog($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActDetail::find()->where(['order_id'=>$id]),
        ]);

        return $this->renderAjax('log', [
            'dataProvider' => $dataProvider,
        ]);

    }

}