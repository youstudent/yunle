<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/6 - 下午4:16
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class CrossJsAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'crossbrowserjs/html5shiv.js',
        'crossbrowserjs/respond.min.js',
        'crossbrowserjs/excanvas.min.js',
    ];
}