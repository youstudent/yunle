<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/13 - 下午7:20
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class ParsleyAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/parsley/css/parsley.css',
    ];
    public $js = [
        'plugins/parsley/js/parsley.js',
        'js/pokerdragon_parsley.js',
        'plugins/parsley/i18n/zh_cn.js',
        'plugins/parsley/i18n/zh_cn.extra.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}