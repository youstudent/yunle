<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/5 - 上午9:48
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class JqueryFlotAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'plugins/flot/jquery.flot.min.js',
        'plugins/flot/jquery.flot.time.min.js',
        'plugins/flot/jquery.flot.resize.min.js',
        'plugins/flot/jquery.flot.pie.min.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}