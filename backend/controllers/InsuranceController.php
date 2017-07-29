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

    public function actionCreate()
    {
        $model = new Insurance();
        if($model->addOrder(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '添加成功', 'url'=> Url::to(['member/index'])]);
        }

        return $this->renderPjax('create', [
            'model' => $model
        ]);
    }

    //更新会员信息
    public function actionUpdate($id)
    {
        $model = Insurance::findOne(['id'=>$id]);

        if($model->updateOrder(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '更新成功', 'url'=> Url::to(['member/index'])]);
        }
        return $this->renderPjax('update', [
            'model' => $model
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
    
    
    /**
     *   
     */
}