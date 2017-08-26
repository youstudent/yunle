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
     * 个人信息
     */
    public function actionInfo()
    {
        $model = new User();
        $user = $this->getUserInfo();
        $user_id = $user['user']['id'];
        $data = $model->myInfo($user_id);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }


    /*
     * 我的客户
     */
    public function actionMy()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        $data = $model->myUser($form, $user);
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
        $user = $this->getUserInfo();

        $data = $model->invite($user);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 设置
     */
    public function actionSwitch()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        if ($model->setSwitch($form,$user)) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, '设置失败');
    }

    /*
     * 客户手机号更换
     */
    public function actionPhone()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));

        if ($model->newPhone($form)) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 业务员手机号更换
     */
    public function actionMobile()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->userPhone($form, $user)) {
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
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->addUser($form, $user)) {
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
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        $data = $model->userList($form, $user);
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
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        $data = $model->userDetail($form, $user);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 头像上传
     */
    public function actionPhoto()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->photo($form,$user)) {
            return $this->jsonReturn(1, '修改成功');
        }
        return $this->jsonReturn(0, '修改失败');
    }

    /*
     * 修改姓名
     */
    public function actionRename()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();

        if ($model->changeName($form,$user)) {
            return $this->jsonReturn(1, '修改成功');
        }
        return $this->jsonReturn(0, '修改失败');
    }

    /*
     * 配置
     */
    public function actionDeploy()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        $data = $model->getDeploy($form,$user);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, '读取失败');
    }

}