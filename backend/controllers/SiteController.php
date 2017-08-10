<?php
namespace backend\controllers;

use backend\models\AuthItem;
use common\components\Helper;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'test', 'init-menu'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'backend\action\BackendErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPjax('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPjax('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return Yii::$app->getResponse()->redirect(['/site/login']);
    }

    public function actionTest($c)
    {
        $registrationId = '100d855909733a7c407';
        $client = Helper::createjPush('service');
        $pusher = $client->push();
        $pusher->setPlatform('android');
        $pusher->addAllAudience() ;
        //$pusher->addRegistrationId($registrationId);
        $pusher->setNotificationAlert($c);
        $res = $pusher->send();
        echo '<pre>';
        print_r($res);
        echo '发送成功: rid:'. $registrationId;die;

//        try {
//            $pusher->send();
//        } catch (\JPush\Exceptions\JPushException $e) {
//            // try something else here
//            print $e;
//        }
//        $pusher->getCid($count = 1, $type = 'push');

        $device = $client->device();
        $device->updateAlias('100d855909733ac3789', 'zhangxiaohua');

    }

    public function actionInitMenu()
    {
        //初始化菜单用的，一般用不到
        $model = new AuthItem();
        $model->initMenu();
        $model->initAppMenu();
    }

}
