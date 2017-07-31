<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 11:04
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

use Yii;
use common\models\Identification;

class IdentificationController extends ApiController
{
    /*
     * 个人认证
     */
    public function actionApprove()
    {
        $model = new Identification();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();

        if ($model->approve($form, $member)) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    /*
     * 个人认证浏览
     */
    public function actionView()
    {
        $model = new Identification();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();
        $data = $model->view($form, $member);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }
}