<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/19 - 下午3:29
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class BaiduMapAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $js = [
        'http://api.map.baidu.com/api?v=2.0&ak=7WqxPNwpMtVbiDxGLpRwq9qxpOL1bVOn',
    ];
}