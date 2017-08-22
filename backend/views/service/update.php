<?php

use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
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
<style media="screen">
/*      元素变成弹性盒            */

.ak-flex {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
}
/*     实体的阴影          */
.ak-boxSad {
    box-shadow: 1px 1px 20px #000;
}
/*              弹性盒纵向排列              */

.ak-flex-columnC {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    justify-content: space-around;
    -webkit-box-align: center;
    align-items: center;
    -webkit-flex-direction: column;
    flex-direction: column;
}
.base-imgBox{
    width: 300px;
    height: 200px;
    background-position: center;
    background-size: cover;
    /*background-size: contain; 图片拉伸以适应图片*/
    background-repeat: no-repeat;
}
.flex-sum-mR{
    margin-right: 5%;
}
.ak-mask{
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0
}
.ak-mask-son{
    width: 80%;
    height: auto;
    margin: 50px auto;
    background-color: #fff;
}

.ak-del-son{
    width: 40%;
    min-height: 30vh;
    margin: 25vh auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 0.5rem 0.75rem 0;
}
.ak-mask-son img{
    width: 100%;
}
</style>
<div class="service-create">

    <h1>更新服务商</h1>

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
                            'options' => ['class' => 'form-horizontal form-bordered'],
                            'enableAjaxValidation' => true,
                            'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
                        ]) ?>


                        <?= $form->field($model, 'owner_username')->textInput() ?>

                        <?= $form->field($model, 'name')->textInput() ?>

                        <?= $form->field($model, 'principal')->textInput() ?>

                        <?= $form->field($model, 'contact_phone')->textInput() ?>

                        <div class="form-group field-serviceform-heads">
                            <label class="control-label control-label col-md-4 col-sm-4" for="serviceform-heads">展示头像</label>
                            <div class="col-md-6 col-sm-6">
                                <?php if($model->serviceImg) : ?>
                                    <?php foreach($model->serviceImg as $img) : ?>
                                        <?php if($img->type == 1): ?>
                                            <div class="ak-flex" style="justify-content: flex-start;">
                                                <div class="base-imgBox flex-sum-mR showTheBigPic"
                                                 style="background-image:url(<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>)"
                                                 data-src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>">

                                                </div>
                                                <div class="">
                                                    <a class="btn btn-danger delete showTheDel" data-something="id or other">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                        <span>删除</span>
                                                    </a>
                                                </div>
                                            </div>
                                        <!-- <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt=""> -->
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group field-serviceform-head">
                            <label class="control-label control-label col-md-4 col-sm-4" for="serviceform-head"></label>
                            <div class="col-md-6 col-sm-6">
                                <?= FileUploadUI::widget([
                                    'model' => $model,
                                    'attribute' => 'head',
                                    'url' => ['media/image-upload', 'model' => 'service', 'type'=> 'head'],
                                    'gallery' => true,
                                    'fieldOptions' => [
                                        'accept' => 'image/*'
                                    ],
                                    'clientOptions' => [
                                        'maxFileSize' => 2000000
                                    ],
                                    'clientEvents' => [
                                        'fileuploaddone' => 'function(e, data, options) {
                                            var img_input = $(\'input[name="ServiceForm[heads]"]\');
                                             var img_id = data.result.files[0].img_id;
                                            //将上传完成的数据添加到表单中
                                             var ids =  img_input.val();
                                             var ids = ids + "," + img_id;
                                             img_input.val(ids);
                                        }',
                                        'fileuploadfail' => 'function(e, data) {

                                        }',

                                    ],
                                ]); ?>

                                <div class="help-block help-block-error "></div>
                            </div>
                        </div>

                        <?= $form->field($model, 'heads', ['template'=> "{input}"])->hiddenInput() ?>

                        <div class="form-group field-serviceform-attachments">
                            <label class="control-label control-label col-md-4 col-sm-4" for="serviceform-attachments">服务商附件</label>
                            <div class="col-md-6 col-sm-6">
                                <?php if($model->serviceImg) : ?>
                                    <?php foreach($model->serviceImg as $img) : ?>
                                        <?php if($img->type == 0): ?>
                                            <div class="ak-flex" style="justify-content: flex-start; margin-bottom:10px;">
                                                <div class="base-imgBox flex-sum-mR showTheBigPic"
                                                 style="background-image:url(<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>)"
                                                 data-src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>">

                                                </div>
                                                <div class="">
                                                    <a class="btn btn-danger delete showTheDel" data-something="id or other">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                        <span>删除</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt=""> -->
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group field-serviceform-attachment">
                            <label class="control-label control-label col-md-4 col-sm-4" for="serviceform-attachment"></label>
                            <div class="col-md-6 col-sm-6">
                                <?= FileUploadUI::widget([
                                    'model' => $model,
                                    'attribute' => 'attachment',
                                    'url' => ['media/image-upload', 'model'=> 'service', 'type'=> 'img'],
                                    'gallery' => true,
                                    'fieldOptions' => [
                                        'accept' => 'image/*'
                                    ],
                                    'clientOptions' => [
                                        'maxFileSize' => 2000000
                                    ],
                                    // ...
                                    'clientEvents' => [
                                        'fileuploaddone' => 'function(e, data) {
                                         var img_input = $(\'input[name="ServiceForm[attachments]"]\');
                                             var img_id = data.result.files[0].img_id;
                                            //将上传完成的数据添加到表单中
                                             var ids =  img_input.val();
                                             var ids = ids + "," + img_id;
                                             img_input.val(ids);

                            }',
                                        'fileuploadfail' => 'function(e, data) {

                            }',
                                    ],
                                ]); ?>

                                <div class="help-block help-block-error "></div>
                            </div>
                        </div>

                        <?= $form->field($model, 'attachments', ['template'=> "{input}"])->hiddenInput() ?>

                        <?= $form->field($model, 'introduction')->widget(\yii\redactor\widgets\Redactor::className(), [
                            'clientOptions' => [
                                'imageManagerJson' => ['/redactor/upload/image-json'],
                                'imageUpload' => ['/redactor/upload/image'],
                                'fileUpload' => ['/redactor/upload/file'],
                                'lang' => 'zh_cn',
                                'minHeight' => 300,
                                'plugins' => ['clips', 'fontcolor','imagemanager']
                            ]
                        ]) ?>

                        <?= $form->field($model, 'address')->textInput( ['placeholder'=>$model->address]) ?>

                        <div class="form-group field-serviceform-map">
                            <label class="control-label control-label col-md-4 col-sm-4" for="serviceform-map"></label>
                            <div class="col-md-6 col-sm-6">
                                <div id="Bmap" style="width:700px;height: 700px;"></div>
                            </div>
                        </div>

                        <?= $form->field($model, 'lat')->textInput() ?>

                        <?= $form->field($model, 'lng')->textInput() ?>

                        <!--                        --><?php //$model->open_at= '8:30' ?>
                        <!--                        --><?//= $form->field($model, 'open_at')->textInput() ?>
                        <!---->
                        <!--                        --><?php //$model->close_at= '23:30' ?>
                        <!--                        --><?//= $form->field($model, 'close_at')->textInput() ?>

                        <?php $model->level=1 ?>
                        <?= $form->field($model, 'level')->dropDownList([
                            1=> '一星',
                            2=> '二星',
                            3=> '三星',
                            4=> '四星',
                            5=> '五星',
                        ]) ?>

                        <?php if(\mdm\admin\components\Helper::checkRoute('/account/get-customer-manager')) : ?>
                            <?= $form->field($model, 'sid')->dropDownList(
                                \backend\models\Adminuser::getCustomerManager()
                            ) ?>
                        <?php else: ?>
                            <?= $form->field($model, 'sid')->dropDownList(
                                [Yii::$app->user->identity->id => Yii::$app->user->identity->username]
                            ) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'tags')->checkboxList(
                            \common\models\Tag::find()->select('name,id')->indexBy('id')->column()
                        ) ?>

                        <!--                        --><?php //$model->status=1; ?>
                        <!--                        --><?//= $form->field($model, 'status')->dropDownList(['禁用', '启用']) ?>

                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <div class="col-md-6 col-sm-6">
                                <button type="button" class="btn btn-primary btn-submit">更新</button>
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
    <!-- mask and bigImg to show -->
    <div class="hidden ak-mask ak_img_mask">
        <div class="ak-mask-son ak-boxSad">
            <img class="ak_mask_img" src="" alt="">
        </div>
    </div>
    <!-- mask and bigImg to show __  end -->

    <!-- mask and del to show -->
    <div class="hidden ak-mask ak_del_mask">
        <div class="ak-del-son ak-boxSad">
            <div class="ak-flex" style="justify-content:space-between">
                <h3>提示</h3>
                <h3 class="close_del_mask" style="color:red; cursor: pointer;">x</h3>
            </div>
            <p style="font-size:18px; text-align:center; margin-top:5vh;color:#222;">您确定要删除该图片吗？</p>
            <div class="ak-flex" style="justify-content:space-around;margin-top:6.5vh;">

                    <a class="btn btn-warning cancel" data-something="id or other">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>确认</span>
                    </a>

                        <a class="btn btn-primary start" data-something="id or other">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>取消</span>
                        </a>
            </div>
        </div>
    </div>
    <!-- mask and del to show __  end -->
</div>
<?php

$formId = $model->formName();
$this->registerJs(<<<JS
$(function () {
    $('.btn-submit').on('click', function () {
       if($('input[name="ServiceForm[heads]"]').val() == ''){
                swal("请上传头像");
                return false;
        }
       if($('input[name="ServiceForm[attachments]"]').val() == ''){
                swal("请至少上传一张附件");
                return false;
        }
        var f = $('#{$formId}');
        f.on('beforeSubmit', function (e) {
            swal({
                    title: "确认更新",
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
})
$('.showTheBigPic').on('click', function(){
    var imgUrl = $(this).attr('data-src')
    $('.ak_img_mask').removeClass('hidden');
    $('.ak_mask_img').attr('src', imgUrl)
})
$('.ak_img_mask').on('click', function(){
    $(this).addClass('hidden')
})


$('.showTheDel').on('click', function(){
    var imgUrl = $(this).attr('data-something')
    $('.ak_del_mask').removeClass('hidden');
})
$('.close_del_mask').on('click', function(){
    $('.ak_del_mask').addClass('hidden')
})
JS
);
?>
