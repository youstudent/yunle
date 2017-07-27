<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 11:22
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

use Yii;
use common\models\Car;

class CarController extends ApiController
{
    //首页车牌
    public function actionIndex()
    {
        $model = new Car();
        $a =  file_get_contents('php://input', 'r');
        $b = json_decode($a,true);
        $member = $this->getMemberInfo($b['token']);
        $data = $model->getList($member);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无车辆');
    }

    //车车车
    public function actionList()
    {
        $model = new Car();
        $data = $model->getCar(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无车辆');
    }

    //车车详情
    public function actionDetail()
    {
        $model = new Car();
        $data = $model->getDetail(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无车辆');
    }

    //车车添加
    public function actionAdd()
    {
        $model = new Car();
        if ($model->addCar(Yii::$app->request->post())) {
            return $this->jsonReturn(1, '添加成功');
        }

        return $this->jsonReturn(0, '添加失败,请重试');
    }

    //车车删除
    public function actionDel()
    {
        $model = new Car();
        if ($model->delCar(Yii::$app->request->post())) {
            return $this->jsonReturn(1, '删除成功');
        }

        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //车车修改
    public function actionUpdate()
    {
        $model = new Car();
        if ($model->updateCar(Yii::$app->request->post())) {
            return $this->jsonReturn(1, '修改成功');
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, '修改失败');
    }
}