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
use common\models\MessageCode;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

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
        return $this->renderPjax('create', [
            'model' => $model,
        ]);
    }

    //更新会员信息
    public function actionUpdate($id)
    {
        $model = MemberForm::findOne(['id' => $id]);

        if ($model->updateMember(Yii::$app->request->post())) {
            return json_encode(['data' => '', 'code' => 1, 'message' => '更新成功', 'url' => Url::to(['member/index'])]);
        }
        return $this->renderPjax('update', [
            'model' => $model,
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
    public function actionSms()
    {
        $model = new MessageCode();
        $model->sms("18030492737");
    }
}