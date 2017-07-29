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
        if($model->addUser(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['salesman/index'])]);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    //更新信息
    public function actionUpdate($id)
    {
        $model = UserForm::findOne(['id'=>$id]);

        if($model->updateUser(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['salesman/index'])]);
        }
        return $this->renderPjax('update', [
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
}