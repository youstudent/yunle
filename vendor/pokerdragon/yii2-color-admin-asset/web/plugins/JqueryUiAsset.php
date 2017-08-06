<?php
namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

/**
 * User: harlen-angkemac
 * Date: 2017/7/5 - 下午5:21
 *
 */
class JqueryUiAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/jquery-ui/themes/base/minified/jquery-ui.min.css'
    ];
    public $js = [
        'plugins/jquery-ui/ui/minified/jquery-ui.min.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}