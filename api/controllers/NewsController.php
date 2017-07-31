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

use common\models\Notice;

class NewsController extends ApiController
{
    public function actionList()
    {
        $model = new Notice();
        $member = $this->getMemberInfo();
        $member_id = $member['member']['id'];
        $modelName = 'member';
        $data = $model->getNews($modelName ,$member_id);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无消息');
    }
}