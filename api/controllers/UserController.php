<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/25
 * Time: 16:10
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

use api\models\SignupForm;
use common\models\Identification;
use common\models\Member;
use common\models\User;
use yii;

class UserController extends ApiController
{
    /**
     * 注册
     * @return array
     */
    public function actionRegister()
    {
        $model = new SignupForm();
        $form = json_decode(Yii::$app->request->post('data'),true);

        if ($model->signup($form)) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 手机号更换
     */
    public function actionPhone()
    {
        $model = new User();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();
        if ($model->phone($form,$member)) {
            $data['step'] = 2;
            return $this->jsonReturn(1, 'success', $data);
        }
        $data['step'] = 1;
        return $this->jsonReturn(0, $model->getFirstError('message'), $data);
    }

    /*
     * 个人信息
     */
    public function actionInfo()
    {
        $model = new Member();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();
        $data = $model->info($form,$member);
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
        $model = new Member();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();

        if ($model->photo($form,$member)) {
            return $this->jsonReturn(1, '修改成功');
        }
        return $this->jsonReturn(0, '修改失败');
    }

    /*
     * 设置
     */
    public function actionSwitch()
    {
        $model = new Member();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();
        if ($model->setSwitch($form,$member)) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, '设置失败');
    }

    /*
     * 配置
     */
    public function actionDeploy()
    {
        $model = new Member();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();
        $data = $model->getDeploy($form,$member);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, '读取失败');
    }


}
