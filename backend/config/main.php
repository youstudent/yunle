<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => '云乐享车',
    'homeUrl' => '/panel/index',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'modules' => [
        'admin' => [
            'class' => 'pd\admin\Module',
        ],
        's' => [
            'class' => 'backend\modules\s\module',
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@common/static/upload/redactor',
            'uploadUrl' => 'http://img.car.ypxl/upload/redactor',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'KIyOZVHLRMgh-Uef6sMAJL630ctmmj4f',
        ],
        'user' => [
            'identityClass' => 'pd\admin\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['admin/user/login'],
            'on afterLogin' => function($event) {
                $user = $event->identity; //这里的就是User Model的实例了
                $data = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'mark' => $user->mark,
                    'master' => $user->master,
                    'platform_type' => 1,
                    'platform_id' => 1
                ];
                Yii::$app->session->set("LOGIN_MEMBER", $data);
            },
            'on afterLogout' => function($event) {
                Yii::$app->session->remove("LOGIN_MEMBER");
            }
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'as access' => [
        'class' => 'pd\admin\components\AccessControl',
        'allowActions' => [
            'admin/user/login',
            'admin/user/logout',
        ]
    ],
    'params' => $params,
];
