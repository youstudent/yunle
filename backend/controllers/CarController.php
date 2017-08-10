<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/4 - 下午9:25
 *
 */

namespace backend\controllers;


use backend\models\Car;
use backend\models\form\CarForm;
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
        //TODO::检查栏目下是否有文章
        Car::findOne($id)->delete();
        return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['index'])]);
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