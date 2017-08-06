<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/6 - 上午11:45
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class JqueryCookieAsset extends BaseColorAdminAsset
{

    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';


    public $js = [
        'plugins/jquery-cookie/jquery.cookie.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}