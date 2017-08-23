<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => '云乐享车',
    'timeZone' => 'Asia/Shanghai',
    'components' => [
        'cache'       => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],
    ],
    "aliases" => [
        "@pd/admin" => "@vendor/pokerdragon/yii2-admin",
        "@pd/coloradmin" => "@vendor/pokerdragon/yii2-color-admin-asset",
        "@pd/helpers" => "@vendor/pokerdragon/helpers",
        "@Aliyun" => "@vendor/pokerdragon/yii2-ali-sms/src",
    ],

];
