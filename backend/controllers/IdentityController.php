<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/4 - 下午9:44
 *
 */

namespace backend\controllers;


use backend\models\Identification;
use backend\models\searchs\IdentificationSearch;
use Yii;
use yii\helpers\Url;


class IdentityController extends BackendController
{
    public function actionIndex()
    {
        $searchModel = new IdentificationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate($member_id=null)
    {
        $model = new Identification();
        $model->member_id = $member_id;
        $model->status = 1;
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addIdentification()){
                Identification::findOne(['member_id'=>$member_id,'status'=>0])->delete();
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index?member_id='.$member_id])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> $model->getFirstError('imgs')]);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model =  Identification::getOne($id);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){

            if($model->updateIdentification()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['index?member_id='.$model->member_id])]);
            }
            return json_encode(['data'=> '', 'code'=>0, 'message'=> '操作失败', 'url'=> Url::to(['index?member_id='.$model->member_id])]);
        }


        return $this->renderPjax('update', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = Identification::getOne($id);

        return $this->renderPjax('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        //TODO::检查栏目下是否有文章
        Identification::findOne($id)->delete();
        return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['index'])]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = Identification::findOne($id);
        }else{
            $model = new Identification();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }

//    public function actionAsyncImage()
//    {
//        $model = new Identification();
//        $id = $model->saveImg(Yii::$app->request->post());
//
//        Yii::$app->response->format = Response::FORMAT_JSON;
//
//        if($id){
//            return ['code'=>1, 'message'=> 'success', 'data' => ['id'=>$id], 'timestamp'=>time()];
//        }
//        return ['code'=>0, 'message'=> 'error', 'data' => [], 'timestamp'=>time()];
//
//    }
}