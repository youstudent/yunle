<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=cloud_car',
            'username' => 'cloud_car',
            'password' => '7gwSjEN9bjjs9mm',
            'charset' => 'utf8',
            'tablePrefix' => 'cdc_',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
