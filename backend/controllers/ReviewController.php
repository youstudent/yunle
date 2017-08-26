<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/21
 * Time: 10:40
 */

namespace backend\controllers;


use backend\models\Car;
use backend\models\DrivingLicense;
use yii\helpers\Url;
use Yii;
use yii\web\Response;

class ReviewController extends BackendController
{
    // 车辆审核
    public function actionCarList()
    {
        $car = new Car();
        $dataProvider = $car->checkInfo(Yii::$app->request->queryParams);

        return $this->renderPjax('car', [
            'dataProvider' => $dataProvider,
            'searchModel' => $car,
        ]);
    }

    public function actionCarPass($id)
    {
        $model = new Car();

        if($model->carPass($id)){
            Yii::$app->session->setFlash('success', '操作成功!');
            return $this->redirect(['car-list']);
        }
        Yii::$app->session->setFlash('success', '操作失败!');
        return $this->redirect(['car-list']);
    }

    public function actionCarOut()
    {
        $id = Yii::$app->request->get('id')?Yii::$app->request->get('id'):Yii::$app->request->post('id');
        $model = Car::findOne($id);
        if (Yii::$app->request->isPost) {

            $data = Yii::$app->request->post();

            if(!empty($data)){
                if($model->carOut($data)){
                    return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '拒绝成功', 'url'=> Url::to(['driver-list'])]);
                }
                return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
            }
        }
        return $this->renderAjax('car-out', [
            'model' => $model
        ]);
    }

    public function actionCarDetail($id)
    {
        $model = Car::findOne($id);
        return $this->renderAjax('car-detail', [
            'model' => $model
        ]);
    }

    // 驾驶证审核
    public function actionDriverList()
    {

        $driver = new DrivingLicense();
        $driver->scenario = 'search';
        $dataProvider = $driver->checkInfo(Yii::$app->request->queryParams);

        return $this->renderPjax('driver', [
            'dataProvider' => $dataProvider,
            'searchModel' => $driver,
        ]);
    }

    public function actionDriverPass($id)
    {
        $model = new DrivingLicense();

        if($model->driverPass($id)){
            Yii::$app->session->setFlash('success', '操作成功!');
            return $this->redirect(['driver-list']);
        }
        Yii::$app->session->setFlash('success', '操作失败!');
        return $this->redirect(['car-list']);
    }

    public function actionDriverOut()
    {
        $id = Yii::$app->request->get('id')?Yii::$app->request->get('id'):Yii::$app->request->post('id');
        $model = DrivingLicense::findOne($id);

        if (Yii::$app->request->isPost) {

            $data = Yii::$app->request->post();

            if(!empty($data)){
                if($model->driverOut($data)){
                    return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '拒绝成功', 'url'=> Url::to(['driver-list'])]);
                }
                return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '操作失败']);
            }
        }

        return $this->renderAjax('driver-out', [
            'model' => $model
        ]);
    }

    public function actionDriverDetail($id)
    {
        $model = DrivingLicense::findOne($id);
        return $this->renderAjax('driver-detail', [
            'model' => $model
        ]);
    }
}