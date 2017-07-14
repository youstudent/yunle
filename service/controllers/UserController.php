<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/25
 * Time: 16:10
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

use common\models\DrivingLicense;
use common\models\Identification;
use common\models\User;
use yii;

class UserController extends ApiController
{
    /*
     * 我的客户
     */
    public function actionMy()
    {
        $model = new User();
        $data = $model->myUser(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 我的邀请码
     */
    public function actionInvite()
    {
        $model = new User();
        $data = $model->invite();
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 手机号更换
     */
    public function actionPhone()
    {
        $model = new User();
        if ($model->phone(Yii::$app->request->post())) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 添加客户
     */
    public function actionAdd()
    {
        $model = new User();
        if ($model->addUser(Yii::$app->request->post())) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 客户列表
     */
    public function actionList()
    {
        $model = new User();
        $data = $model->userList(Yii::$app->request->post('page'));
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 客户详情
     */
    public function actionDetail()
    {
        $model = new User();
        $data = $model->userDetail(Yii::$app->request->post('id'));
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

}