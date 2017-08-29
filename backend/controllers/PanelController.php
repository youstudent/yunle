<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:32
 *
 */

namespace backend\controllers;


use backend\models\SystemNotice;
use yii\filters\AccessControl;
use yii\web\Controller;

class PanelController extends BackendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = \common\models\Helper::getStatCount();
        $data = SystemNotice::find()->orderBy('created_at DESC')->limit(3)->asArray()->all();
        return $this->render('index', [
            'model' => $model,
            'data'  =>$data
        ]);
    }
    public function actionUserAdd($days)
    {
        $port = 'user';
        $model = \common\models\Helper::getStat($days,$port);
        if($model){
            return $this->asJson(['data'=> $model, 'code'=>1, 'message'=> 'success']);
        }
        return $this->asJson(['data'=> '', 'code'=>0, 'message'=> 'error']);
    }

    public function actionOrderAdd($days)
    {
        $port = 'order';
        $model = \common\models\Helper::getStat($days,$port);
        if($model){
            return $this->asJson(['data'=> $model, 'code'=>1, 'message'=> 'success']);
        }
        return $this->asJson(['data'=> '', 'code'=>0, 'message'=> 'error']);
    }

}