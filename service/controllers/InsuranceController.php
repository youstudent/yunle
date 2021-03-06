<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/19
 * Time: 13:35
 */

namespace service\controllers;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use common\models\InsuranceOrder;
use common\models\Warranty;
use Yii;

class InsuranceController extends ApiController
{
    //订单列表
    public function actionList()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getOrder($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无订单');
    }

    //订单详情
    public function actionDetail()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getDetail($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, $model->errorMsg);
    }

    //全部动态
    public function actionMany()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getMany($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, $model->errorMsg);
    }

    //建单之前的数据读取
    public function actionInfo()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getInfo($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, $model->errorMsg);
    }

    //订单添加
    public function actionAdd()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        $port = 'user';
        $data = $model->addOrder($form,$user,$port);
        if ($data) {
            return $this->jsonReturn(1, '下单成功', $data);
        }

        return $this->jsonReturn(0, $model->errorMsg);
    }

    //订单取消
    public function actionDel()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        if ($model->delOrder($form, $user)) {
            return $this->jsonReturn(1, '取消成功');
        }

        return $this->jsonReturn(0, '取消失败');
    }

    //确认购买
    public function actionAffirm()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        if ($model->affirm($form,$user)) {
            return $this->jsonReturn(1, '确认成功');
        }

        return $this->jsonReturn(0, '确认失败');
    }

    //取消购买
    public function actionAbandon()
    {
        $model = new InsuranceOrder();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        if ($model->abandon($form,$user)) {
            return $this->jsonReturn(1, '取消成功');
        }

        return $this->jsonReturn(0, '取消失败');
    }

    //我的保单
    public function actionWarranty()
    {
        $model = new Warranty();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getUserInfo();

        $data = $model->getWarranty($form, $member);
        if ($data) {
            return $this->jsonReturn(1,'success', $data);
        }
        return $this->jsonReturn(0, '暂无保单');
    }

    //保单详情
    public function actionWarranties()
    {
        $model = new Warranty();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getDetail($form);
        if ($data) {
            return $this->jsonReturn(1,'success', $data);
        }
        return $this->jsonReturn(0, '肯定有,这个错肯定是我的错');
    }

}
