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


    public function actionWaitCheckOrder()
    {
        return $this->asJson(['data'=> ['num'=> 100], 'code'=>1, 'message'=> '']);
    }

    public function actionWaitCheckInsuranceOrder()
    {
        return $this->asJson(['data'=> ['num'=> 100], 'code'=>1, 'message'=> '']);
    }


    public function actionWaitCheckInsuranceOrderSuccess()
    {
        return $this->asJson(['data'=> ['num'=> 100], 'code'=>1, 'message'=> '']);
    }

    public function actionWaitCheckState()
    {
        return $this->asJson(['data'=> ['num'=> 100], 'code'=>1, 'message'=> '']);
    }
}