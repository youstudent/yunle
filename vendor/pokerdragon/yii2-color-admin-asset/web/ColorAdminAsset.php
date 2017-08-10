<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/6 - 下午4:31
 *
 */

namespace pd\coloradmin\web;
use yii\web\AssetBundle as BaseColorAdminAsset;

class ColorAdminAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'js/site.js',
    ];

    public $depends = [
        'pd\coloradmin\web\AppAsset'
    ];
}