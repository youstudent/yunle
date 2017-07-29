<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:15
 *
 */

namespace backend\controllers;


use backend\models\form\OrderForm;
use backend\models\Order;
use backend\models\searchs\InsuranceOrderSearch;
use backend\models\searchs\OrderSearch;
use common\models\ActInsurance;
use Yii;
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

    //更新会员信息
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

    //设置用户状态
    public function actionSetStatus($id, $status)
    {
        $model = Order::findOne(['id'=>$id]);
        if($model->setStatus($status)){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['member/index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作失败', 'url'=> Url::to(['member/index'])]);
    }

    public function actionSoftDelete($id)
    {
        $model = Order::findOne(['id'=>$id]);
        if($model->softDelete($id)){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['member/index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '删除失败', 'url'=> Url::to(['member/index'])]);
    }



    public function actionLogModal($id)
    {
        //$data = ActInsurance::find()->where(['order_id'=>$id])->all();
        Yii::$app->response->format =  Response::FORMAT_RAW;

        $this->renderPjaxPartial('_modal_log', [
            'model' => ActInsurance::find()
        ]);
    }
}