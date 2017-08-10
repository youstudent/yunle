<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/17 - 下午8:28
 *
 */

namespace pd\coloradmin\web\plugins;

use yii\web\AssetBundle as BaseColorAdminAsset;

class EditableAsset extends BaseColorAdminAsset
{
    public $sourcePath = '@vendor/pokerdragon/color-admin/assets';

    public $css = [
        'plugins/bootstrap3-editable/css/bootstrap-editable.css',
        'plugins/bootstrap3-editable/inputs-ext/address/address.css',
        'plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-datepicker/css/datepicker.css',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-datepicker/css/datepicker3.css',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/css/datetimepicker.css',
        'plugins/bootstrap3-editable/inputs-ext/select2/select2.css',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css',
    ];
    public $js = [
        'plugins/bootstrap3-editable/js/bootstrap-editable.min.js',
        'plugins/bootstrap3-editable/inputs-ext/address/address.js',
        'plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.js',
        'plugins/bootstrap3-editable/inputs-ext/typeaheadjs/typeaheadjs.js',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/wysihtml5.js',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js',
        'plugins/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
        'plugins/bootstrap3-editable/inputs-ext/select2/select2.min.js',
    ];

    public $depends = [
        'pd\coloradmin\web\plugins\BootStrapAsset'
    ];

}