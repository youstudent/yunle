<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 9:39
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

use api\models\Article;
use Yii;
use api\models\Column;

class ColumnController extends ApiController
{
    public function actionList()
    {
        $model = new Column();
        $data = $model->getColumn(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无栏目内容');
    }

    public function actionDetail()
    {
        $model = new Article();
        $data = $model->getArticle(Yii::$app->request->post());
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无详细内容');
    }
}