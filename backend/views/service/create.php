<?php

use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\ServiceForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = '添加服务商';
$this->params['breadcrumbs'][] = $this->title;

pd\coloradmin\web\plugins\ParsleyAsset::register($this);
pd\coloradmin\web\plugins\WizardAsset::register($this);
pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);
$this->registerJs(<<<JS
// FormWizardValidation.init();

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
document.getElementById('serviceform-address').value = address;

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
    "input" : "serviceform-address",
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
    console.log(local);
    document.getElementById('serviceform-lat').value = local.lat;
    document.getElementById('serviceform-lng').value = local.lng;
}

JS

    , \yii\web\View::POS_READY);
?>

<div class="service-create">

    <h1>添加服务商</h1>

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
                        <?php $form = \yii\bootstrap\ActiveForm::begin([
                            'id'                   => $model->formName(),
                            'layout'               => 'horizontal',
                            'fieldConfig'          => [
                                'template'             => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                'horizontalCssClasses' => [
                                    'label'   => 'control-label col-md-4 col-sm-4',
                                    'offset'  => '',
                                    'wrapper' => 'col-md-6 col-sm-6',
                                    'error'   => '',
                                    'hint'    => '',
                                ],
                            ],
                            'options'              => ['class' => 'form-horizontal form-bordered'],
                            'enableAjaxValidation' => true,
                            'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
                        ]) ?>

                        <?= $form->field($model, 'username')->textInput() ?>

                        <?= $form->field($model, 'password')->textInput() ?>

                        <?= $form->field($model, 'name')->textInput() ?>

                        <?= $form->field($model, 'principal')->textInput() ?>


                        <?= $form->field($model, 'contact_phone')->textInput() ?>


                        <?= $form->field($model, 'head')->widget(FileInput::classname(), [
                            'language'      => 'zh',
                            'options'       => [
                                'accept'   => 'image/*',
                                'multiple' => false,

                            ],
                            'pluginOptions' => [
                                'overwriteInitial'         => false,//不允许覆盖
                                'initialPreviewAsData'     => true,
                                'removeFromPreviewOnError' => true,
                                'autoReplace'              => true,
                                'uploadUrl'                => Url::to(['/media/image-upload', 'model' => 'service', 'type' => 'head']),
                                'maxFileSize'              => 2800,
                                'showPreview'              => true,
                                'showCaption'              => true,
                                'showRemove'               => true,
                                'showUpload'               => true,
                                'maxFileCount'             => 1,
                                //'minFileCount' => 1,
                            ],
                        ]) ?>

                        <?= $form->field($model, 'attachment')->widget(FileInput::classname(), [
                            'language'      => 'zh',
                            'options'       => [
                                'accept'   => 'image/*',
                                'multiple' => true,

                            ],
                            'pluginOptions' => [
                                'overwriteInitial'         => false,//不允许覆盖
                                'initialPreviewAsData'     => true,
                                'removeFromPreviewOnError' => true,
                                'autoReplace'              => true,
                                'uploadUrl'                => Url::to(['/media/image-upload', 'model' => 'service', 'type' => 'img']),
                                'maxFileSize'              => 2048,
                                'showPreview'              => true,
                                'showCaption'              => true,
                                'showRemove'               => true,
                                'showUpload'               => true,
                                'maxFileCount'             => 12,
                            ],
                        ]) ?>

                        <?= $form->field($model, 'introduction')->widget(\yii\redactor\widgets\Redactor::className(), [
                            'clientOptions' => [
                                'imageManagerJson' => ['/redactor/upload/image-json'],
                                'imageUpload'      => ['/redactor/upload/image'],
                                'fileUpload'       => ['/redactor/upload/file'],
                                'lang'             => 'zh_cn',
                                'minHeight'        => 300,
                                'plugins'          => ['clips', 'fontcolor', 'imagemanager'],
                            ],
                        ]) ?>

                        <?= $form->field($model, 'address')->textInput() ?>

                        <div class="form-group field-serviceform-address required">
                            <label class="control-label control-label col-md-4 col-sm-4"
                                   for="serviceform-address"></label>
                            <div class="col-md-6 col-sm-6">
                                <div id="Bmap" style="width:700px;height: 700px;"></div>
                            </div>
                        </div>

                        <?= $form->field($model, 'lat')->textInput() ?>

                        <?= $form->field($model, 'lng')->textInput() ?>

                        <?php $model->level = 1 ?>
                        <?= $form->field($model, 'level')->dropDownList([
                            1 => '一星',
                            2 => '二星',
                            3 => '三星',
                            4 => '四星',
                            5 => '五星',
                        ]) ?>
                        <?php if (pd\admin\components\Helper::checkRoute('/account/get-customer-manager')) : ?>
                            <?= $form->field($model, 'sid')->dropDownList(
                                \backend\models\Adminuser::getCustomerManager()
                            ) ?>
                        <?php else: ?>
                            <?= $form->field($model, 'sid')->dropDownList(
//                                \backend\models\Adminuser::getCustomerManager()
                                [Yii::$app->user->identity->id => Yii::$app->user->identity->name]
                            ) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'tags')->checkboxList(
                            \common\models\Tag::find()->select('name,id')->indexBy('id')->column()
                        ) ?>

                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <div class="col-md-6 col-sm-6">
                                <button type="button" class="btn btn-primary btn-submit">添加</button>
                            </div>
                        </div>

                        <?php \yii\bootstrap\ActiveForm::end() ?>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
<?php

$formId = $model->formName();
$this->registerJs(<<<JS
$(function () {
    var f = $('#{$formId}');
    $('.btn-submit').on('click', function () {
        var atth_count = getAllImgNodeCount('atth');
        var head_count = getAllImgNodeCount('head');
       if(head_count != 1){
                swal("必须且只能上传一个头图");
                return false;
        }
       if(atth_count <0 || atth_count > 12){
                swal("请上传1到12个附件");
                return false;
        }
        f.on('beforeSubmit', function (e) {
            swal({
                    title: "确认添加",
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
                        url: f.attr('action'),
                        type: 'post',
                        dataType: 'json',
                        data: f.serialize(),
                        success: function (res) {
                             if (res.code == 1) {
                                swal({title: res.message, text: "3秒之后将自动跳转，点击确定立即跳转。", timer: 3000}, function () {
                                   window.location.href = res.url;
                                });
                                setTimeout(function () {
                                   window.location.href = res.url;
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
            return false;

        });
        f.submit();
    });
    
        //处理上传图片
    $('.field-serviceform-head').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key, 'head');
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode('head');
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode('head');
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id, 'head');
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId, 'head');
    });
    
            //处理上传图片
    $('.field-serviceform-attachment').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key, 'atta');
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode('atta');
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode('atta');
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id, 'atta');
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId, 'atta');
    });
    
    //将图片id存入图容器
    function appendImgNode(img_id, previewId, type)
    {   
        if(type == 'head'){
            var html = '<input type="hidden" data-head-img-node="1" data-pid="'+ previewId +'" id="head_img_id_input_'+ img_id +'" name="ServiceForm[head_id][]" value="'+img_id+'">';
        }else{
            var html = '<input type="hidden" data-atth-img-node="1" data-pid="'+ previewId +'" id="atth_img_id_input_'+ img_id +'" name="ServiceForm[atta_id][]" value="'+img_id+'">';
        }
        f.append(html);
    }
    
    //将图片ID从图片ID容器中删除，根据图片的ID
    function removeImgNodeById(img_id, type)
    {
        if(type == 'head'){
            $('#head_img_id_input_' + img_id).remove();
        }else{
            $('#atth_img_id_input_' + img_id).remove();
        }
    }
    //将图片ID从图片ID容器中删除，根据图片预览的容器id
    function removeImgNodeByPid(previewId, type)
    {
        if(type == 'head'){
            $('input[data-head-pid=previewId]').remove();   
        }else{
            $('input[data-atth-pid=previewId]').remove();   
        }
        
    }
    //移除所有的图片容器id
    function removeAllImgNode(type)
    {
        if(type == 'head'){
           $('input[data-head-img-node="1"]').remove(); 
        }else{
           $('input[data-atth-img-node="1"]').remove(); 
        }
        
    }
    
    function getAllImgNodeCount(type)
    {
        if(type == 'head'){
            return $('input[data-head-img-node="1"]').length;
        }else{
            return $('input[data-atth-img-node="1"]').length;
        }
    }
})
JS
);
?>
