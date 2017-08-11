<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/10 - 下午5:56
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class RaphaelAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'plugins/morris/raphael.min.js',
    ];
}