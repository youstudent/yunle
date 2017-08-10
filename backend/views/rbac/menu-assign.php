<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc-u
 * Date: 2017/8/6
 * Time: 17:02
 */
use yii\helpers\Url;

$this->title = '权限分配';
pd\coloradmin\web\plugins\JstreeAsset::register($this);


$url = Url::to(['get-menu', 'name'=> $role]);
$submit_url = Url::to(['set-menu']);
$this->registerJs(<<<JS
var r = [];
$("#jstree-checkable").jstree({
    plugins: ["wholerow", "checkbox", "types"],
    core: {
        themes: {responsive: !1},
        data: {
            url: "{$url}",
            data: function(res){
                console.log(res);
                return res;
            }
        }
    },
    types: {"default": {icon: "fa fa-folder text-primary fa-lg"}, file: {icon: "fa fa-file text-success fa-lg"}}
})
        // listen for event  
$('#jstree-checkable').on('changed.jstree', function(e, data) {  
    r = [];  
    var i, j;  
    for (i = 0, j = data.selected.length; i < j; i++) {  
        var node = data.instance.get_node(data.selected[i]);  
        if (data.instance.is_leaf(node)) {  
            r.push(node.id);  
        }  
    }  
})
$('.btn-submit').on('click', function () {
 swal({
        title: "确认更新权限",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "确定",
        closeOnConfirm: false,
        cancelButtonText: "取消"
    },
    function () {
        $.ajax({
            url: "{$submit_url}",
            type: 'post',
            dataType: 'json',
            data: {
                id:r,
                name: "{$role}"
            },
            success: function (res) {
                if (res.code == 1) {
                    swal({title: res.message, text: "3秒之后将自动跳转，点击确定立即跳转。", timer: 3000}, function () {
                        location.reload();
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 3000)
                } else {
                    swal(res.message, "", "error");
                }
            },
            error: function (xhr) {
                swal("网络错误", "", "error");
            }
        });
    });
       });    
JS
);

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
            <h4 class="panel-title">权限设置</h4>
        </div>
        <div class="panel-body">
            <div id="jstree-checkable"></div>
        </div>

        <button type="button" class="btn btn-sm btn-primary m-r-5 btn-submit">保存</button>
    </div>
</div>
<!-- end col-6 -->
