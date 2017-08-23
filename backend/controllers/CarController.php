<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/4 - 下午9:25
 *
 */

namespace backend\controllers;


use backend\models\Car;
use backend\models\form\CarForm;
use backend\models\Insurance;
use backend\models\InsuranceDetail;
use backend\models\Order;
use backend\models\OrderDetail;
use backend\models\searchs\CarSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Response;

class CarController extends BackendController
{
    public function actionIndex()
    {

        $searchModel = new CarSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate($member_id)
    {
        $model = new CarForm();
        $model->scenario = 'create';
        $model->member_id = $member_id;

        if($model->load(Yii::$app->request->post())){
            if($model->addCar()){
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
        $model =  CarForm::findOne($id);
        $model->scenario = 'update';


        if($model->load(Yii::$app->request->post())){
            if($model->updateCar()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $order = OrderDetail::findOne(['car_id'=>$id]);
        $insurance = InsuranceDetail::findOne(['car_id'=>$id]);

        if (isset($order) && !empty($order)) {
            Yii::$app->session->setFlash('danger', '删除失败! 该车辆有订单处理中');
            return $this->redirect(['index']);
        } elseif (isset($insurance) && !empty($insurance)) {
            Yii::$app->session->setFlash('danger', '删除失败! 该车辆有保险订单处理中');
            return $this->redirect(['index']);
        } else {
            Car::findOne($id)->delete();
            Yii::$app->session->setFlash('success', '删除成功!');
            return $this->redirect(['index']);
        }
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($id){
            $model = CarForm::findOne($id);
        }else{
            $model = new CarForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}