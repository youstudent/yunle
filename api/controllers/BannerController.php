<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 20:13
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

use api\models\Banner;
use Yii;

class BannerController extends ApiController
{
    //轮播图
    public function actionList()
    {
        $model = new Banner();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $data = $model->getBanner($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '图片暂不存在');
    }

}