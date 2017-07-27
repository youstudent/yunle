<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/15
 * Time: 17:10
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

use api\models\News;

class NewsController extends ApiController
{
    public function actionList()
    {
        $model = new News();
        $data = $model->getNews();
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无消息');
    }
}