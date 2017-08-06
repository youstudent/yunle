<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc-u
 * Date: 2017/8/6
 * Time: 17:02
 */
$this->title = '权限分配';
pd\coloradmin\web\plugins\JstreeAsset::register($this);

$data = json_encode($model, JSON_UNESCAPED_UNICODE);

$this->registerJs('
$("#jstree-checkable").jstree({
        plugins: ["wholerow", "checkbox", "types"],
        core: {
            themes: {responsive: !1},
            data: '.$data.'
        },
        types: {"default": {icon: "fa fa-folder text-primary fa-lg"}, file: {icon: "fa fa-file text-success fa-lg"}}
    })
');

?>

<!-- begin col-6 -->
<div class="col-md-10">
    <div class="panel panel-inverse" data-sortable-id="tree-view-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Checkable Tree</h4>
        </div>
        <div class="panel-body">
            <div id="jstree-checkable"></div>
        </div>
    </div>
</div>
<!-- end col-6 -->
