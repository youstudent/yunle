<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:32
 *
 */

namespace backend\controllers;


use yii\web\Controller;

class PanelController extends BackendController
{
    public function actionIndex()
    {
        return $this->renderPjax('index', []);
    }
}