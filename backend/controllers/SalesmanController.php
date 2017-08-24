<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午3:47
 *
 */

namespace backend\controllers;

use backend\models\form\UserForm;
use backend\models\Member;
use backend\models\searchs\UserSearch;
use backend\models\User;
use common\components\Helper;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class SalesmanController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ]
            ]
        ];
    }
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

        return $this->renderPjax('view', [
            'model' => $model
        ]);
    }

    public function actionSetStatus($id, $opt)
    {
        $model = User::findOne($id);
        $model->status = $opt;
        $model->save();
        Yii::$app->session->setFlash('success', '业务员 ['. $model->name .' ] 状态变更成功');
        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $member = Member::findOne(['pid'=>$id]);
        if (isset($member) && !empty($member)) {
            Yii::$app->session->setFlash('danger', '删除失败!该业务员拥有客户');
            return $this->redirect(['index']);
        } else {
            User::findOne($id)->delete();
            Yii::$app->session->setFlash('success', '删除成功!');
            return $this->redirect(['index']);
        }

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