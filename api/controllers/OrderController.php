<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 14:06
 */

namespace api\controllers;

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
        $member = $this->getMemberInfo();
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
        $member = $this->getMemberInfo();

        $data = $model->getInfo($form, $member);
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
        $member = $this->getMemberInfo();
        $port = 'member';

        $data = $model->addOrder($form, $member, $port);
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
        $member = $this->getMemberInfo();

        if ($model->delOrder($form, $member)) {
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

}