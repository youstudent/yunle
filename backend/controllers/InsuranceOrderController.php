<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 上午10:16
 *
 */

namespace backend\controllers;


use backend\models\ActInsurance;
use backend\models\form\InsuranceOrderForm;
use backend\models\InsuranceDetail;
use backend\models\InsuranceElement;
use backend\models\InsuranceOrder;
use backend\models\searchs\InsuranceDetailSearch;
use backend\models\Warranty;
use common\models\Upload;
use Yii;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class InsuranceOrderController extends BackendController
{
    public function actionIndex()
    {
        $searchModel = new InsuranceDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate($member_id)
    {
        $model =   InsuranceOrderForm::createInsuranceOrder($member_id);
        $model->scenario = 'create';
        $insurance = Yii::$app->request->post('InsuranceOrderForm');
        if($model->load(Yii::$app->request->post())){
            if($model->addInsuranceOrder($insurance)){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['order/index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> $model->errorMsg]);
        }

        return $this->renderAjax('create', [
            'model' => $model
        ]);
    }

    public function actionLog($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActInsurance::find()->where(['order_id'=>$id]),
        ]);

        return $this->renderAjax('log', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInfo($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => InsuranceElement::find()->where(['order_id'=>$id]),
        ]);

        $model = InsuranceOrder::findOne($id);
        return $this->renderAjax('info', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionArchives()
    {
        $searchModel = new InsuranceDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionDetail($id)
    {
        $model =  InsuranceDetail::getDetail($id);

        return $this->renderPjax('detail', [
            'model' => $model
        ]);
    }

    public function actionCancel($id)
    {
        $model = InsuranceDetail::cancel($id);
        if($model){
            return json_encode(['data' => '', 'code' => 1, 'message' => '取消成功', 'url' => Url::to(['insurance-order/detail?id='. $id])]);
        }
        return json_encode(['data' => '', 'code' => 1, 'message' => '取消失败', 'url' => Url::to(['insurance-order/detail?id='. $id])]);

    }

    public function actionCheckSuccess($id)
    {
        $model = InsuranceDetail::findOne(['order_id'=>$id]);
        $data = Yii::$app->request->post();
        if(!empty($data)){

            if($model->checkSuccess($model,$data, $id)){
                return $this->redirect('detail?id='.$id);
            }
            return $this->redirect('detail?id='.$id);
        }

        return $this->renderAjax('success', [
            'model' => $model
        ]);
    }

    public function actionCheckFailed($id)
    {
        $model = InsuranceDetail::findOne(['order_id'=>$id]);
        $data = Yii::$app->request->post();
        if(!empty($data)){
            if($model->checkFailed($data, $id)){
                return $this->redirect('detail?id='.$id);
            }
            return $this->redirect('detail?id='.$id);
        }
        return $this->renderAjax('failed', [
            'model' => $model
        ]);
    }

    public function actionCost($id)
    {
        $model =  Warranty::getDetail($id);

        return $this->renderPjax('cost', [
            'model' => $model
        ]);
    }

    public function actionUpdate()
    {
        $data = Yii::$app->request->post();

        $model =  Warranty::getDetail($data['order_id']);
        $info = Warranty::changeInfo($model,$data);
        if($info){
            Yii::$app->session->setFlash('success', '修改成功!  ');
            return $this->redirect(['detail', 'id' => $model->order_id]);
        }
        Yii::$app->session->setFlash('success', '修改失败!  ');
        return $this->redirect(['detail', 'id' => $model->order_id]);
    }

    public function actionInsurance($id)
    {
//        echo 11111;die;
        $model =  InsuranceDetail::getDetail($id);

        return $this->renderAjax('insurance', [
            'model' => $model
        ]);
    }

    public function actionChange()
    {
        $data = Yii::$app->request->post();
        $info = Warranty::changeDetail($data);

        if($info){
            Yii::$app->session->setFlash('success', '修改成功!  ');
            return $this->redirect(['detail', 'id' => $data['order_id']]);
        }
        Yii::$app->session->setFlash('success', '修改失败!  ');
        return $this->redirect(['detail', 'id' => $data['order_id']]);
    }

}