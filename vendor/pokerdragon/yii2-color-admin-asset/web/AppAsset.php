<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/6 - 下午1:47
 *
 */

namespace pd\coloradmin\web;

use yii\web\AssetBundle as BaseColorAdminAsset;

class AppAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';
    public $css = [
        //'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        'css/animate.min.css',
        'css/style.min.css',
        'css/style-responsive.min.css',
        'css/theme/default.css',
    ];

    public $js = [
        'js/poker-dragon.js',
        'js/apps.min.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\PaceAsset',
        'pd\coloradmin\web\plugins\BootStrapAsset',
        'pd\coloradmin\web\plugins\FontAwesomeAsset',
        'pd\coloradmin\web\plugins\PokerYiiAsset',
        'pd\coloradmin\web\plugins\SweetAlertAsset',
        'pd\coloradmin\web\plugins\JqueryMigrateAsset',
        'pd\coloradmin\web\plugins\JqueryPjaxAsset',
        'pd\coloradmin\web\plugins\JqueryUi12Asset',
        'pd\coloradmin\web\plugins\JquerySlimScrollAsset',
        'pd\coloradmin\web\plugins\JqueryCookieAsset',
        'pd\coloradmin\web\plugins\JqueryGritterAsset',
        'pd\coloradmin\web\plugins\SwitcheryAsset',
        'kartik\dialog\DialogAsset',
    ];
}