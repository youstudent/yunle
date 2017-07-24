<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */
/* @var $form yii\widgets\ActiveForm */

pd\coloradmin\web\plugins\ParsleyAsset::register($this);
pd\coloradmin\web\plugins\WizardAsset::register($this);
pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);
$this->registerJs($this->render('_script.js'), \yii\web\View::POS_HEAD);
$this->registerJs(<<<JS
//FormWizardValidation.init();

var map = new BMap.Map("Bmap");
map.centerAndZoom("成都", 12);



 // 添加带有定位的导航控件
var navigationControl = new BMap.NavigationControl({
// 靠左上角位置
anchor: BMAP_ANCHOR_TOP_LEFT,
// LARGE类型
type: BMAP_NAVIGATION_CONTROL_LARGE,
// 启用显示定位
enableGeolocation: false
});
map.addControl(navigationControl);


//添加定位控件
var geolocationControl = new BMap.GeolocationControl();
geolocationControl.addEventListener("locationSuccess", function(e){
// 定位成功事件
var address = '';
address += e.addressComponent.province;
address += e.addressComponent.city;
address += e.addressComponent.district;
address += e.addressComponent.street;
address += e.addressComponent.streetNumber;
document.getElementById('address').value = address;

var Geo = new BMap.Geocoder().getPoint(address, function(local){
  setLocal(local);
});


});
geolocationControl.addEventListener("locationError",function(e){
// 定位失败事件
alert(e.message);
});
map.addControl(geolocationControl);

var ac = new BMap.Autocomplete({
    "input" : "address",
    "location": map
});

var myValue;
ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
    var _value = e.item.value;
    myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    setPlace();
});

function setPlace(){
    map.clearOverlays();    //清除地图上所有覆盖物
    function myFun(){
        var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
        map.centerAndZoom(pp, 18);
        marker = new BMap.Marker(pp,{enableDragging: true});
        map.addOverlay(marker);    //添加标注
        setLocal(pp);
    }
    var local = new BMap.LocalSearch(map, { //智能搜索
        onSearchComplete: myFun
    });
    local.search(myValue);
   
}

function setLocal(local){
    document.getElementById('lat').value = local.lat;
    document.getElementById('lng').value = local.lng;
}

JS

    , \yii\web\View::POS_READY);
?>
<div class="adminuser-form">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
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
                    <h4 class="panel-title">表单</h4>
                </div>
                <div class="panel-body">
                    <form action="<?= Url::to(['service/create']) ?>" method="POST" data-parsley-validate="true"
                          name="form-wizard" enctype="multipart/form-data" id="service-form">
                        <div id="wizard">
                            <ol>
                                <li>
                                    基本信息
                                    <small>在这里填写一些账号信息.</small>
                                </li>
                                <li>
                                    高级信息
                                    <small></small>
                                </li>
                                <li>
                                    扩展信息
                                    <small></small>
                                </li>
                                <li>
                                    后续
                                    <small>.</small>
                                </li>
                            </ol>
                            <!-- begin wizard step-1 -->
                            <div class="wizard-step-1">
                                <fieldset>
                                    <legend class="pull-left width-full">账户信息</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group block1">
                                                <label>用户名</label>
                                                <input type="text" name="username" placeholder="用户名.格式为6-16位字母或者数字"
                                                       class="form-control" data-parsley-group="wizard-step-1"
                                                       data-parsley-required data-parsley-pattern="[A-Za-z0-9_]{6,16}"/>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>密码</label>
                                                <input type="text" name="password" placeholder="密码.格式为6-16位字母或者数字"
                                                       class="form-control" data-parsley-group="wizard-step-1"
                                                       data-parsley-required data-parsley-pattern="[A-Za-z0-9_]{6,16}"/>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>重复输入密码</label>
                                                <input type="text" name="re_password" placeholder="重复输入密码"
                                                       class="form-control" data-parsley-group="wizard-step-1"
                                                       data-parsley-required data-parsley-re-password="password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-1 -->
                            <!-- begin wizard step-2 -->
                            <div class="wizard-step-2">
                                <fieldset>
                                    <legend class="pull-left width-full">高级信息</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>服务商名字</label>
                                                <input type="text" name="name" placeholder="服务商名称" class="form-control"
                                                       data-parsley-group="wizard-step-2" required/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>负责人名称</label>
                                                <input type="text" name="principal" placeholder="负责人名称"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>客服电话</label>
                                                <input type="text" name="contact_phone" placeholder="客服电话"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>服务商头像</label>
                                                <input type="TEXT" id="head" name="head" value="3" placeholder="服务商头像"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>服务商附件</label>
                                                <input type="TEXT" id="attachment" name="attachment[]" value="1" placeholder="服务商的图片"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                                <input type="TEXT" id="attachment" name="attachment[]" value="2" placeholder="服务商的图片"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                                <input type="TEXT" id="attachment" name="attachment[]" value="2" placeholder="服务商的图片"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>简介</label>
                                                <input type="text" name="introduction" placeholder="简介"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>地址</label>
                                                <input type="text" name="address" id="address" placeholder="请输入地址"
                                                       class="form-control" data-parsley-group="wizard-step-2"
                                                       required/>
                                                <input type="hidden" name="lat" id="lat"/>
                                                <input type="hidden" name="lng" id="lng"/>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->

                                        <!-- begin col-6 -->
                                        <div class="col-md-8" id="Bmap" style="width: 900px; height: 700px;">
                                        </div>
                                        <!-- end col-6 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-2 -->
                            <!-- begin wizard step-3 -->
                            <div class="wizard-step-3">
                                <fieldset>
                                    <legend class="pull-left width-full">其他信息</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>服务范畴</label>
                                                <div class="controls">
                                                    <input type="text" name="username" placeholder="服务的内容"
                                                           class="form-control" data-parsley-group="wizard-step-3"
                                                           required/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>客户经理</label>
                                                <div class="controls">
                                                    <input type="text" name="password" placeholder="客户经理"
                                                           class="form-control" data-parsley-group="wizard-step-3"
                                                           required/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">星级</label>
                                                <div class="col-md-9">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" value="0">
                                                        0星
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" value="1">
                                                        1星
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" value="2" checked="">
                                                        2星
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" value="3">
                                                        3星
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" value="4" checked="">
                                                        4星
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadios" value="5">
                                                        5星
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <!-- begin wizard step-4 -->
                            <div>

                                <div class="jumbotron m-b-0 text-center">
                                    <h1>添加服务商成功</h1>
                                    <p> 一些提示信息 </p>
                                    <p><a class="btn btn-success ajax-post" data-toggle="modal"
                                          data-form-id="service-form" role="button">
                                            提交</a></p>
                                </div>
                            </div>
                            <!-- end wizard step-4 -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->

    </div>
    <!-- end row -->


</div>
<!-- begin modal -->
<div class="modal fade" id="modal-alert-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">重要提示</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> 确认添加!</h4>
                    <p>确认添加此服务商</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white " data-dismiss="modal">取消</a>
                <a href="javascript:;" class="btn btn-sm btn-danger ajax-post"
                   data-url="<?= Url::to(['service/create']) ?>" data-id="modal-alert-confirm"
                   data-dismiss="modal">确认</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-alert-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">操作成功</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> 确认添加!</h4>
                    <p>确认添加此服务商</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary" data-dismiss="modal">确定</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-alert-error">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">操作失败</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> 确认添加!</h4>
                    <p>确认添加此服务商</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary" data-dismiss="modal">确定</a>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->



