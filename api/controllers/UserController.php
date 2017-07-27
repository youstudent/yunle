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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use api\models\SignupForm;
use common\models\Identification;
use common\models\User;
use yii;

class UserController extends ApiController
{
    /**
     * 获取会员个人信息和团队信息
     * @return array
     */
    public function actionUser()
    {

    }
    
    /**
     * 密码修改
     * @return array
     */
    public function actionPass()
    {

    }


    /**
     * 注册
     * @return array
     */
    public function actionRegister()
    {
        $model = new SignupForm();
        if ($model->signup(Yii::$app->request->post())) {
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
        if ($model->phone(Yii::$app->request->post())) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

}
