<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/23 - 上午9:24
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class BootStrap3DialogAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'plugins/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js',
    ];
    public $css = [
        'plugins/bootstrap3-dialog/dist/css/bootstrap-dialog.css',
    ];
}