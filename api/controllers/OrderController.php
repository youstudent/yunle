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
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $member = $this->getMemberInfo($b['token']);
        $data = $model->getOrder($b, $member);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无订单');
    }

    //订单详情
    public function actionDetail()
    {
        $model = new Order();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $data = $model->getDetail($b);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //全部动态
    public function actionMany()
    {
        $model = new Order();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $data = $model->getMany($b);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //建单之前的数据返回
    public function actionInfo()
    {
        $model = new Order();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $member = $this->getMemberInfo($b['token']);
        $data = $model->getInfo($b, $member);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //订单添加
    public function actionAdd()
    {
        $model = new Order();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $member = $this->getMemberInfo($b['token']);

        $data = $model->addOrder($b, $member);
        if ($data) {
            return $this->jsonReturn(1, '下单成功', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //订单取消
    public function actionDel()
    {
        $model = new Order();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $member = $this->getMemberInfo($b['token']);
        if ($model->delOrder($b, $member)) {
            return $this->jsonReturn(1, '取消成功');
        }

        return $this->jsonReturn(0, '取消失败');
    }

    //服务商确认
    public function actionUpdate()
    {
        $model = new Order();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $data = $model->updateOrder($b);
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
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $data = $model->getService($b);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

}