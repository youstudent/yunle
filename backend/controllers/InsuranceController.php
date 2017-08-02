<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午3:29
 *
 */

namespace backend\controllers;


use backend\models\searchs\InsuranceOrderSearch;
use backend\models\searchs\InsuranceSearch;
use common\models\Insurance;
use Yii;
use yii\base\Controller;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\Response;

class InsuranceController extends BackendController
{
    //会员列表
    public function actionIndex()
    {
        $searchModel = new InsuranceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Creates a new Adminuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Insurance();
        $model->scenario = 'create';
        if($model->load(Yii::$app->request->post())){
            if($model->addInsurance()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作失败']);
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
        $model = Insurance::findOne(['id'=>$id]);
        $model->scenario = 'update';
        if($model->load(Yii::$app->request->post())){
            if($model->updateInsurance()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '操作失败']);
        }
        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    //设置用户状态
    public function actionSetStatus($id, $status)
    {
        $model = Insurance::findOne(['id'=>$id]);
        if($model->setStatus($status)){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['member/index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作失败', 'url'=> Url::to(['member/index'])]);
    }

    public function actionSoftDelete($id)
    {
        $model = Insurance::findOne(['id'=>$id]);
        if($model->softDelete($id)){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['member/index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '删除失败', 'url'=> Url::to(['member/index'])]);
    }
    /**
     * 保险订单
     * @return string
     */
    public function actionInsuranceOrder()
    {
        $searchModel = new InsuranceOrderSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('order-index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($id){
            $model = Insurance::findOne($id);
        }else{
            $model = new Insurance();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return ActiveForm::validate($model);
    }
}