<?php

namespace backend\controllers;

use backend\models\InsuranceCompany;
use yii\helpers\Url;

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
        if(\Yii::$app->request->isPost){
            if ($model->add(\Yii::$app->request->post())) {
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['insurance-company/index'])]);
            }
        }
        return $this->renderPjax('create', [
            'model' => $model,
            'create' =>'create'
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
        if(\Yii::$app->request->isPost){
            if ($model->load(\Yii::$app->request->post()) && $model->save() ) {
                return json_encode(['data'=> '', 'code'=>1, 'message'=> '修改成功', 'url'=> Url::to(['insurance-company/index'])]);
            }else{
                print_r($model->getFirstErrors());die;
                return json_encode(['data'=> '', 'code'=>0, 'message'=> $model->getFirstErrors(), 'url'=> Url::to(['insurance-company/index'])]);
    
            }
           // $models = new InsuranceCompany();
            //$data  = \Yii::$app->request->post();
           // $model->editCompany(\Yii::$app->request->post());
           /* $new->id=$data['id'];
            $new->name=$data['name'];
            $new->brief=$data['brief'];
            var_dump($new->save(false));exit;*/
           
        }
        return $this->renderPjax('update', [
            'model' => $model,
            'create' =>'update'
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
        var_dump($id);EXIT;
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    
}
