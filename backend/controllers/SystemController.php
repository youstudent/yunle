<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/27 - 上午10:00
 *
 */

namespace backend\controllers;


use common\models\Setting;
use pd\sms\Sms;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SystemController extends Controller
{
    public function actionIndex()
    {
        $model = new Setting();
        if($model->saveSetting(Yii::$app->request->post())){
            return json_encode(['data'=> '', 'code'=>1, 'message'=> '保存成功', 'url'=> Url::to(['system/index'])]);
        }
        return $this->render('index', [
            'setting' => $model->getSetting()
        ]);
    }
}