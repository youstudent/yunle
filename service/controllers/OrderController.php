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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
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
        $data = $model->getOrder(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无车辆');
    }

    //订单详情
    public function actionDetail()
    {
        $model = new Order();
        $data = $model->getDetail(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //订单添加
    public function actionAdd()
    {
        $model = new Order();
        $data = $model->addOrder(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, '下单成功', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //订单删除
    public function actionDel()
    {
        $model = new Order();
        if ($model->delOrder(Yii::$app->request->post())) {
            return $this->jsonReturn(1, '删除成功');
        }

        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //订单修改
    public function actionUpdate()
    {
        $model = new Order();
        if ($model->updateOrder(Yii::$app->request->post())) {
            return $this->jsonReturn(1, '修改成功');
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

}