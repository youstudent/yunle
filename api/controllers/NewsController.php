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
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use Yii;
use common\models\Notice;

class NewsController extends ApiController
{
    public function actionList()
    {
        $model = new Notice();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $member = $this->getMemberInfo();
        $member_id = $member['member']['id'];
        $modelName = 'member';
        $data = $model->getNews($form, $modelName ,$member_id);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无消息');
    }
}