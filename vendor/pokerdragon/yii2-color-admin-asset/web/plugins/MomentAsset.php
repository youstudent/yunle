<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/18 - 下午4:41
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class MomentAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'plugins/moment/moment-with-locales.js',
    ];
}