<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午3:47
 *
 */

namespace backend\controllers;

use backend\models\form\UserForm;
use backend\models\searchs\UserSearch;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SalesmanController extends BackendController
{
    //列表
    public function actionIndex()
    {
        $searchModel = new UserSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionCreate()
    {
        $model = new UserForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            if($model->addUser()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败', 'url'=> '']);
        }

        return $this->renderAjax('create', [
            'model' => $model
        ]);
    }

    //更新信息
    public function actionUpdate($id)
    {
        $model = UserForm::findOne(['id'=>$id]);
        $model->scenario = 'update';

        if($model->load(Yii::$app->request->post())){
            if($model->updateUser()){
                return $this->asJson(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['salesman/index'])]);
            }
            return $this->asJson(['data'=> '', 'code'=>0, 'message'=> '添加失败', 'url'=> '']);
        }

        return $this->renderAjax('update', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = UserForm::findOne(['id'=>$id]);

        return $this->renderAjax('view', [
            'model' => $model
        ]);
    }

    //设置用户状态
    public function actionSetStatus($id, $status)
    {
        $model = UserForm::findOne(['id'=>$id]);
        if($model->setStatus($status)){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作成功', 'url'=> Url::to(['salesman/index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '操作失败', 'url'=> Url::to(['salesman/index'])]);
    }

    public function actionSoftDelete($id)
    {
        $model = UserForm::findOne(['id'=>$id]);
        if($model->softDelete($id)){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '删除成功', 'url'=> Url::to(['salesman/index'])]);
        }
        return json_encode(['data'=> '', 'code'=>1, 'message'=> '删除失败', 'url'=> Url::to(['salesman/index'])]);
    }

    /**
     * 组装一个select回去
     * @param $pid 服务商id
     * @param $sid 销售人员id
     * @return string
     */
    public function actionDropDownList($pid, $sid)
    {
        //Yii::$app->response->format = Yii\web\Response::FORMAT_JSON;
        return UserForm::dropDownListHtml($pid, $sid);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        if($id){
            $model = UserForm::findOne($id);
        }else{
            $model = new UserForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return \yii\bootstrap\ActiveForm::validate($model);
    }
}