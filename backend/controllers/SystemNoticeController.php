<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 上午11:06
 *
 */

namespace backend\controllers;
use backend\models\form\SystemNoticeForm;
use backend\models\searchs\SystemNoticeSearch;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\Response;

class SystemNoticeController extends BackendController
{

    //系统通知列表
    public function actionIndex()
    {
        $searchModel = new SystemNoticeSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new SystemNoticeForm();
         $model->scenario = 'create';
            if($model->load(Yii::$app->request->post())){
                if($model->addNotice()){
                    return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
                }
                return $this->asJson(['data'=> '', 'code'=>0, 'message'=> current($model->getFirstErrors())]);
            }
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    //更新通知
    public function actionUpdate($id)
    {
        $member = SystemNoticeForm::findOne($id);
        $member->scenario = 'update';
        if ($member->load(Yii::$app->request->post())) {
            if ($member->updateNotice()) {
                return $this->asJson(['data' => '', 'code' => 1, 'message' => '更新成功', 'url' => Url::to(['member/index'])]);
            }
            return $this->asJson(['data' => '', 'code' => 0, 'message' => '更新失败']);
        }
        $member->notice_people=json_decode($member->notice_people,true);
        return $this->renderAjax('update', [
            'model' => $member,
        ]);
    }

    public function actionView($id)
    {
        $model = SystemNoticeForm::findOne($id);

        return $this->renderPjax('view', [
            'model' => $model
        ]);
    }
    
    /**
     * 删除系统公告
     * @param $id
     * @return string
     */
    public function actionSoftDelete($id)
    {
        $model = SystemNoticeForm::findOne(['id' => $id]);
        if ($model->delete()) {
            return json_encode(['data' => '', 'code' => 1, 'message' => '删除成功', 'url' => Url::to(['member/index'])]);
        }
        return json_encode(['data' => '', 'code' => 1, 'message' => '删除失败', 'url' => Url::to(['member/index'])]);
    }
    
    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($id){
            $model = SystemNoticeForm::findOne($id);
        }else{
            $model = new SystemNoticeForm();
        }
        
        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return ActiveForm::validate($model);
    }
    
}