<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/4 - 下午9:37
 *
 */

namespace backend\controllers;


use backend\models\DrivingLicense;
use Yii;
use yii\data\ActiveDataProvider;

class DriverController extends BackendController
{
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => DrivingLicense::find(),
        ]);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new DrivingLicense();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addDrivingLicense()){
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
        $model =  DrivingLicense::findOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateDrivingLicense()){
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
        DrivingLicense::findOne($id)->delete();
        return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['index'])]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = DrivingLicense::findOne($id);
        }else{
            $model = new DrivingLicense();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}