<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/4 - 下午9:37
 *
 */

namespace backend\controllers;


use backend\models\DrivingLicense;
use backend\models\searchs\DrivingLicenseSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class DriverController extends BackendController
{
    public function actionIndex()
    {
        $searchModel = new DrivingLicenseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate($member_id=null)
    {
        $model = new DrivingLicense();
        $model->scenario = 'create';
        $model->member_id = $member_id;

        if($model->load(Yii::$app->request->post())){
            if($model->addDrivingLicense()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index?member_id='.$member_id])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model =  DrivingLicense::getOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateDrivingLicense()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败']);
        }

        return $this->renderPjax('update', [
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