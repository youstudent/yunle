<?php

namespace backend\controllers;

use backend\models\InsuranceCompany;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\Response;

class InsuranceCompanyController extends BackendController
{
    /**
     *
     * 保险商列表
     * @return string
     */
    public function actionIndex()
    {
        $model = new InsuranceCompany();
        $data  =$model->getList();
        return $this->renderPjax('index',['data'=>$data,'model'=>$model]);
    }
    
    
    
    /**
     * Creates a new Adminuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InsuranceCompany();
        $model->scenario = 'create';
        if($model->load(Yii::$app->request->post())){
            if($model->addInsuranceCompany()){
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['salesman/index'])]);
            }
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作失败', 'url'=> Url::to(['salesman/index'])]);
        }
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * Creates a new Adminuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = InsuranceCompany::findOne(['id'=>$id]);
        $model->scenario = 'update';
        if($model->load(Yii::$app->request->post())){
            if($model->updateInsuranceCompany()){
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['salesman/index'])]);
            }
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作失败', 'url'=> Url::to(['salesman/index'])]);
        }
        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * Deletes an existing Adminuser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $company = new InsuranceCompany();
        $data = $company->findOne($id)->delete();
        if ($data) {
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作失败', 'url'=> Url::to(['index'])]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($id){
            $model = InsuranceCompany::findOne($id);
        }else{
            $model = new InsuranceCompany();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return ActiveForm::validate($model);
    }
    
}
