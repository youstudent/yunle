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
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error', 'test', 'init-menu', 'test1'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
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
        $model = \common\models\Helper::getStatCount();
        return $this->renderPjax('index', [
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

    public function actionTest()
    {

       Helper::getAppRoleMenu("1_app_操作员");

    }

    public function actionPushAllMessage($msg)
    {
        echo '发送成功:' . json_encode($msg, JSON_UNESCAPED_UNICODE);
        echo '<hr>';
        Helper::pushAllMemberMessage($msg, 'message');
        echo 'success';die;

    }
    public function actionPushAllMessage1($msg)
    {
        echo '发送成功:' . json_encode($msg, JSON_UNESCAPED_UNICODE);
        echo '<hr>';
        Helper::pushServiceMessage($msg, 'message');
        echo 'success';die;

    }

    public function actionInitMenu()
    {
        //初始化菜单用的，一般用不到
        $model = new AuthItem();
        $model->initMenu();
        $model->initAppMenu();
    }

}
