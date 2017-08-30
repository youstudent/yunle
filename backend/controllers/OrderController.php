<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:15
 *
 */

namespace backend\controllers;


use backend\models\ActDetail;
use backend\models\form\ActForm;
use backend\models\form\OrderForm;
use backend\models\Order;
use backend\models\OrderDetail;
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

    public function actionCreate($member_id)
    {
        $model =   OrderForm::createOrder($member_id);
        $model->scenario = 'create';
        if($model->load(Yii::$app->request->post())){
            if($model->addOrder()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['order/index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderAjax('create', [
            'model' => $model
        ]);
    }


    public function actionUpdate($id)
    {
        $model = OrderForm::findOne(['id'=>$id]);
        $model->scenario = 'update';


        if($model->load(Yii::$app->request->post())){
            if($model->updateOrder()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['order/index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderAjax('create', [
            'model' => $model
        ]);
    }

    public function actionLog($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActDetail::find()->where(['order_id'=>$id])->orderBy(['created_at'=>SORT_DESC]),
        ]);

        return $this->renderAjax('log', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionWall()
    {
        return $this->renderContent('这是啥');
    }

    public function actionModifyStatus($id)
    {
        //要写逻辑展示可以操作的订单状态
        $model = Order::getOrderDetail($id);
//echo '<pre>';
//print_r($model->load(Yii::$app->request->post()));die;
        if ($model->load(Yii::$app->request->post())) {
            if($model->alter($id)){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '变更成功', 'url'=> Url::to(['order/index?member_id='.$model->member_id])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> $model->getFirstError('img')]);
        }
        return $this->renderAjax('modify-status', [
            'model' => $model
        ]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = OrderForm::findOne($id);
        }else{
            $model = new OrderForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}