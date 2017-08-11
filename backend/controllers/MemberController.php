<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 上午11:06
 *
 */

namespace backend\controllers;


use backend\models\form\MemberForm;
use backend\models\form\MemberInfoForm;
use backend\models\Member;
use backend\models\searchs\MemberSearch;
use backend\models\Service;
use common\models\Identification;
use common\models\MessageCode;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class MemberController extends BackendController
{

    //会员列表
    public function actionIndex()
    {
        $searchModel = new MemberSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderPjax('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new MemberForm();

        if ($model->addMember(Yii::$app->request->post())) {
            return json_encode(['data' => '', 'code' => 1, 'message' => '添加成功', 'url' => Url::to(['member/index'])]);
        }
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    //更新会员信息
    public function actionUpdate($id)
    {
        $member = MemberForm::getOne($id);
        $identification = Identification::findOne(['member_id'=>$member->id]);

        $member->scenario = 'update';
        if ($member->load(Yii::$app->request->post()) && $identification->load(Yii::$app->request->post())) {
            if( $member->updateMember() && $identification->updateInfo() ){
                return $this->asJson(['data' => '', 'code' => 1, 'message' => '更新成功', 'url' => Url::to(['member/index'])]);
            }
            return $this->asJson(['data' => '', 'code' => 0, 'message' => '更新失败']);
        }
        return $this->renderAjax('update', [
            'member' => $member,
            'identification' => $identification,
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
        $model = Member::findOne(['id' => $id]);
        if ($model->setStatus($status)) {
            return json_encode(['data' => '', 'code' => 1, 'message' => '操作成功', 'url' => Url::to(['member/index'])]);
        }
        return json_encode(['data' => '', 'code' => 1, 'message' => '操作失败', 'url' => Url::to(['member/index'])]);
    }

    public function actionSoftDelete($id)
    {
        $model = Member::findOne(['id' => $id]);
        if ($model->softDelete($id)) {
            return json_encode(['data' => '', 'code' => 1, 'message' => '删除成功', 'url' => Url::to(['member/index'])]);
        }
        return json_encode(['data' => '', 'code' => 1, 'message' => '删除失败', 'url' => Url::to(['member/index'])]);
    }

    public function actionInfo($id)
    {
        $model = MemberInfoForm::findOne(['id'=>$id]);
        if($model->saveMemberInfo(Yii::$app->request->post())){
            return json_encode(['data' => '', 'code' => 1, 'message' => '保存成功', 'url' => Url::to(['member/index'])]);
        }
        return $this->renderAjax('info', [
            'model' => $model
        ]);
    }
    public function actionTest()
    {
        $menu = Yii::$app->params['app_menu'];
        return json_encode(['data' => $menu, 'code' => 1, 'message' => ''], JSON_UNESCAPED_UNICODE);
    }

    public function actionModifySalesman($id)
    {
        $model = Member::findOne($id);
        $model->service = Service::findOne(['id'=>$model->pid]) ? Service::findOne(['id'=>$model->pid])->id : '';
        if($model->load(Yii::$app->request->post())){
            if($model->modifySalesman()){
                return $this->asJson(['data'=> [], 'code'=> 1, 'message'=> '变更成功']);
            }
            return $this->asJson(['data'=> [], 'code'=>0, 'message'=> '变更失败']);
        }
        return $this->renderAjax('modify-salesman',[
           'model' => $model
        ]);
    }

    public function actionValidateForm($scenario, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($id){
            $model = MemberForm::findOne($id);
        }else{
            $model = new MemberForm();
        }

        $model->scenario = $scenario;
        $model->load(Yii::$app->request->post());
        return ActiveForm::validate($model);
    }
    //用户实名认证信息
    public function actionReal($id)
    {
        $member = MemberForm::getOne($id);
        $identification = Identification::findOne(['member_id'=>$member->id]);

        $member->scenario = 'update';
        if ($member->load(Yii::$app->request->post()) && $identification->load(Yii::$app->request->post())) {
            if( $member->updateMember() && $identification->updateInfo() ){
                return $this->asJson(['data' => '', 'code' => 1, 'message' => '更新成功', 'url' => Url::to(['member/index'])]);
            }
            return $this->asJson(['data' => '', 'code' => 0, 'message' => '更新失败']);
        }
        return $this->renderPjax('real', [
            'member' => $member,
            'identification' => $identification,
        ]);

    }
}