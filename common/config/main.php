<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => '云乐享车',
    'components' => [
        'cache'       => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.2.116;dbname=cloud_car',
            'username' => 'cloud_car',
            'password' => '7gwSjEN9bjjs9mm',
            'charset' => 'utf8',
            'tablePrefix' => 'cdc_',
        ],
    ],
    "aliases" => [
        "@Aliyun" => "@vendor/pokerdragon/yii-dysms/src",
    ],
];
