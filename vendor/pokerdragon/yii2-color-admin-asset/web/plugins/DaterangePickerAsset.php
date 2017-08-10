<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/18 - 下午4:33
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class DaterangePickerAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/bootstrap-daterangepicker/daterangepicker.css',
    ];
    public $js = [
        'plugins/bootstrap-daterangepicker/daterangepicker.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset',
        'pd\coloradmin\web\plugins\BootStrapAsset',
        'pd\coloradmin\web\plugins\MomentAsset',
    ];
}