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
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = \common\models\Helper::getStatCount();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionStat($days)
    {
        $model = \common\models\Helper::getStat($days);
        if($model){
            return $this->asJson(['data'=> $model, 'code'=>1, 'message'=> 'success']);
        }
        return $this->asJson(['data'=> '', 'code'=>0, 'message'=> 'error']);
    }

    public function actionUserAdd()
    {

    }

    public function actionOrderAdd()
    {

    }

}