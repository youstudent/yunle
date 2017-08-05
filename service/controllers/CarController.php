<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 11:22
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

use Yii;
use common\models\Car;

class CarController extends ApiController
{
    //车车车
    public function actionList()
    {
        $model = new Car();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getCar($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无车辆');
    }

    //车车详情
    public function actionDetail()
    {
        $model = new Car();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getDetail($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无车辆');
    }

    //车车添加
    public function actionAdd()
    {
        $model = new Car();
        $form = $this->getForm(Yii::$app->request->post('data'));

        if ($model->addCar($form)) {
            return $this->jsonReturn(1, '添加成功');
        }
        return $this->jsonReturn(0, '添加失败,请重试');
    }

    //车车删除
    public function actionDel()
    {
        $model = new Car();
        $form = $this->getForm(Yii::$app->request->post('data'));
        if ($model->delCar($form)) {
            return $this->jsonReturn(1, '删除成功');
        }

        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //车车修改
    public function actionUpdate()
    {
        $model = new Car();
        $form = $this->getForm(Yii::$app->request->post('data'));
        if ($model->updateCar($form)) {
            return $this->jsonReturn(1, '修改成功');
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, '修改失败');
    }

    //设置为默认车辆
    public function actionChange()
    {
        $model = new Car();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->changeDefault($form);
        if ($data) {
            return $this->jsonReturn(1,'设置成功' ,$data);
        }

        return $this->jsonReturn(0,'设置失败');
    }
}
