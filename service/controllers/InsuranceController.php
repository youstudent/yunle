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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use common\models\InsuranceOrder;
use Yii;

class InsuranceController extends ApiController
{
    //订单列表
    public function actionList()
    {
        $model = new InsuranceOrder();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $member = $this->getMemberInfo($b['token']);
        $data = $model->getOrder($b);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无订单');
    }

    //订单详情
    public function actionDetail()
    {
        $model = new InsuranceOrder();
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
        $model = new InsuranceOrder();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $data = $model->getMany($b);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '要啥自行车');
    }

    //建单之前的数据读取
    public function actionInfo()
    {
        $model = new InsuranceOrder();
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
        $model = new InsuranceOrder();
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
        $model = new InsuranceOrder();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        if ($model->delOrder($b)) {
            return $this->jsonReturn(1, '取消成功');
        }

        return $this->jsonReturn(0, '取消失败');
    }

    //服务商确认
    public function actionUpdate()
    {
        $model = new InsuranceOrder();
        $data = $model->updateOrder(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, '订单确认成功',$data);
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }
}