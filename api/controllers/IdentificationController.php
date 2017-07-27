<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 11:04
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
        if ($model->approve(Yii::$app->request->post())) {
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
        $data = $model->view(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }
}