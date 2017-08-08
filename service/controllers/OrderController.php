<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 14:06
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

use common\models\Order;
use Yii;


class OrderController extends ApiController
{

    //订单列表
    public function actionList()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getUserInfo();
        $data = $model->getOrder($form, $member);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无订单');
    }

    //订单详情
    public function actionDetail()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $data = $model->getDetail($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //全部动态
    public function actionMany()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $data = $model->getMany($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //建单之前的数据返回
    public function actionInfo()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getInfo($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //订单添加
    public function actionAdd()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $port = 'user';
        $user = $this->getUserInfo();
        $data = $model->addOrder($form, $user, $port);
        if ($data) {
            return $this->jsonReturn(1, '下单成功', $data);
        }
        return $this->jsonReturn(0,$model->errorMsg);
    }

    //订单取消
    public function actionDel()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->delOrder($form, $user)) {
            return $this->jsonReturn(1, '取消成功');
        }

        return $this->jsonReturn(0, '取消失败');
    }

    //服务商确认
    public function actionUpdate()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->updateOrder($form);
        if ($data) {
            return $this->jsonReturn(1, '订单确认成功',$data);
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //获取服务商列表
    public function actionService()
    {
        $model = new Order();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getService($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //服务商详情
    public function actionServicedetail()
    {
        $model = new Order();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getServiceDetail($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //--------------------------------------------------服务端分割线------------------------------------------------------
    //客户订单列表
    public function actionTotal()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        $data = $model->getTotalList($form, $user);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无订单');
    }

    //订单处理列表
    public function actionDeal()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        $data = $model->getDealList($form, $user);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无订单');
    }

    //处理的订单详情
    public function actionDetails()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $data = $model->getDetails($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //拒绝订单
    public function actionRefuse()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->refuseOrder($form, $user)) {
            return $this->jsonReturn(1, '已拒绝');
        }

        return $this->jsonReturn(0, '拒绝失败');
    }

    //接受订单
    public function actionAdopt()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->adoptOrder($form, $user)) {
            return $this->jsonReturn(1, '接单成功');
        }

        return $this->jsonReturn(0, '接单失败');
    }


    //订单更新前数据获取
    public function actionRenewal()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        $data = $model->renewalList($form, $user);
        if ($data) {
            return $this->jsonReturn(1, 'success',$data);
        }

        return $this->jsonReturn(0, '数据获取失败请重试');
    }

    //订单更新
    public function actionAlter()
    {
        $model = new Order();
        //数据处理
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        $data = $model->alter($form, $user);
        if ($data) {
            return $this->jsonReturn(1, 'success',$data);
        }

        return $this->jsonReturn(0, $model->errorMsg);
    }

    //站内消息
    public function actionStat()
    {
        $model = new Order();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        $data = $model->stat($form, $user);
        if ($data) {
            return $this->jsonReturn(1, 'success',$data);
        }

        return $this->jsonReturn(0, $model->errorMsg);
    }
}
