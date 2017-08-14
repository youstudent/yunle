<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => '云乐享车',
    'components' => [
        'cache'       => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],
    ],
    "aliases" => [
        "@Aliyun" => "@vendor/pokerdragon/yii-dysms/src",
    ],
];
