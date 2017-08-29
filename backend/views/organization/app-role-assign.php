<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc-u
 * Date: 2017/8/6
 * Time: 17:02
 */
use yii\helpers\Json;
use yii\helpers\Url;

$this->title = '权限分配';
pd\coloradmin\web\plugins\JstreeAsset::register($this);


$url = Url::to(['get-app-permission', 'name'=> $id]);
$assign_url = Url::to(['assign-app-permission', 'name'=>$id]);
$remove_url = Url::to(['remove-app-permission', 'name'=>$id]);
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
// $('#jstree-checkable').on('changed.jstree', function(e, data) {  
//     r = [];  
//     var i, j;  
//     for (i = 0, j = data.selected.length; i < j; i++) {  
//         var node = data.instance.get_node(data.selected[i]);  
//         if (data.instance.is_leaf(node)) {  
//             r.push(node.text);
//         }  
//     }
// })
$('#jstree-checkable').on('changed.jstree', function(e, data) {
    if(data.action == 'deselect_node' || data.action == 'select_node'){
        //直接更新授权
        assign(data.selected);
    }
})

function assign(item){
 var url = "{$assign_url}";
 $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                item:item
            },
            success: function (res) {
                if(res.code == 1){
                    
                }else{
                    //swal("授权失败", "error");
                }
            },
            error: function (xhr) {
                swal("网络错误", "", "error");
            }
        });   
}
   
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
    </div>
</div>
<!-- end col-6 -->
