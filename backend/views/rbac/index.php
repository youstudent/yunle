<?php

$this->title = '权限设置';
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => 'index'];
$this->params['breadcrumbs'][] = $this->title;

pd\coloradmin\web\plugins\JstreeAsset::register($this);
$this->registerJs(<<<JS
$("#jstree-checkable").jstree({
    plugins: ["wholerow", "checkbox", "types"],
    core: {
        themes: {responsive: !1},
        data: {$menu}
    },
    types: {"default": {icon: "fa fa-folder text-primary fa-lg"}, file: {icon: "fa fa-file text-success fa-lg"}}
})
    

JS
)
?>
<div class="rbac-view">

    <h1>权限设置</h1>
    <div class="row">
        <div class="col-md-6">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">角色列表</h4>
                </div>
                <div class="panel-body">
                    <div id="jstree-role"></div>


                    <div class="pull-right">
                        <button type="button" role="button" class="btn btn-default btn-info">更新</button>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <div class="col-md-6">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">权限清单</h4>
                </div>
                <div class="panel-body">
                    <div id="jstree-checkable"></div>


                    <div class="pull-right">
                        <button type="button" role="button" class="btn btn-default btn-info">更新</button>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>

</div>



