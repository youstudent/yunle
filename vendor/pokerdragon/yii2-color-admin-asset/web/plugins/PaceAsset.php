<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/6 - 下午1:46
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;
use Yii\web\View;

class PaceAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'plugins/pace/pace.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
}