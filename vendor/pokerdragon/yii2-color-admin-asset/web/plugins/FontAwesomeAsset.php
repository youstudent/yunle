<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/6 - 下午1:55
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class FontAwesomeAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/font-awesome/css/font-awesome.min.css'
    ];

    public $js = [
        'plugins/bootstrap/js/bootstrap.min.js',
    ];
}