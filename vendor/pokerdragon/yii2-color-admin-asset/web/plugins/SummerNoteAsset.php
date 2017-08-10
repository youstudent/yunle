<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/4 - 下午2:17
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class SummerNoteAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/summernote/summernote.css'
    ];
    public $js = [
        'plugins/summernote/summernote.js',
        'plugins/summernote/lang/summernote-zh-CN.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}