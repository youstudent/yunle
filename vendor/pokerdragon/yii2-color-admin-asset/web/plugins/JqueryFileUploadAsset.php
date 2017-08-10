<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/13 - 下午6:06
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class JqueryFileUploadAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css',
        'plugins/jquery-file-upload/css/jquery.fileupload.css',
        'plugins/jquery-file-upload/css/jquery.fileupload-ui.css',
    ];
    public $js = [
        'plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js',
        'plugins/jquery-file-upload/js/vendor/tmpl.min.js',
        'plugins/jquery-file-upload/js/vendor/load-image.min.js',
        'plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js',
        'plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js',
        'plugins/jquery-file-upload/js/jquery.iframe-transport.js',
        'plugins/jquery-file-upload/js/jquery.fileupload.js',
        'plugins/jquery-file-upload/js/jquery.fileupload-process.js',
        'plugins/jquery-file-upload/js/jquery.fileupload-image.js',
        'plugins/jquery-file-upload/js/jquery.fileupload-audio.js',
        'plugins/jquery-file-upload/js/jquery.fileupload-video.js',
        'plugins/jquery-file-upload/js/jquery.fileupload-validate.js',
        'plugins/jquery-file-upload/js/jquery.fileupload-ui.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\JqueryAsset'
    ];
}