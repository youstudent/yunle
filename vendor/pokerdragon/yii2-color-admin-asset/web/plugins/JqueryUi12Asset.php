<?php
namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

/**
 * User: harlen-angkemac
 * Date: 2017/7/5 - 下午5:21
 *
 */
class JqueryUi12Asset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/jquery-ui-1.12.1/jquery-ui.css'
    ];
    public $js = [
        'plugins/jquery-ui-1.12.1/jquery-ui.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}