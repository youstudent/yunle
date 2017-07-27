<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/15
 * Time: 17:10
 */

namespace service\controllers;


use service\models\News;

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