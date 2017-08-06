<?php
namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

/**
 * User: harlen-angkemac
 * Date: 2017/7/5 - 下午5:21
 *
 */
class JqueryAsset extends BaseColorAdminAsset
{

//    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';
//
//
//    public $js = [
//        'plugins/jquery/jquery-1.9.1.min.js',
//        'plugins/jquery/jquery-migrate-1.1.0.min.js',
//    ];


    public $sourcePath = '@bower/jquery/dist';
    public $js = [
        'jquery.js',
    ];
}