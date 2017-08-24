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
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
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
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getColumn($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无栏目内容');
    }

    public function actionDetail()
    {
        $model = new Article();
        $form = $this->getForm(Yii::$app->request->post('data'));

        $data = $model->getArticle($form);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '无详细内容');
    }
}