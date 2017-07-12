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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use api\models\Banner;

class BannerController extends ApiController
{
    //轮播图
    public function actionList()
    {
        $model = new Banner();
        $data = $model->getBanner();
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '图片暂不存在');
    }

}