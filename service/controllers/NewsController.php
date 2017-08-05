<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/15
 * Time: 17:10
 */

namespace service\controllers;


use Yii;
use common\models\Notice;

class NewsController extends ApiController
{
    public function actionList()
    {
        $model = new Notice();
        $form = $this->getForm(Yii::$app->request->post('data'));
        $user = $this->getUserInfo();
        $user_id = $user['user']['id'];
        $modelName = 'user';
        $data = $model->getNews($form, $modelName ,$user_id);
        if ($data) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, '暂无消息');
    }
}