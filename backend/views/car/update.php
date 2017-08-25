<?php

use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\CarForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = '更改车辆';
$this->params['breadcrumbs'][] = $this->title;

pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
?>

    <div class="car-update">

        <h1>修改车辆</h1>

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


                            <?= $form->field($model, 'license_number')->textInput() ?>

                            <?= $form->field($model, 'type')->textInput() ?>

                            <?= $form->field($model, 'owner')->textInput() ?>

                            <?= $form->field($model, 'nature')->textInput() ?>

                            <?= $form->field($model, 'brand_num')->textInput() ?>

                            <?= $form->field($model, 'discern_num')->textInput() ?>

                            <?= $form->field($model, 'motor_num')->textInput() ?>

                            <?= $form->field($model, 'load_num')->textInput() ?>

                            <?= $form->field($model, 'sign_at')->textInput() ?>

                            <?= $form->field($model, 'certificate_at')->textInput() ?>


                            <?php
                            //获取对应的图片数据
                            $car_imgs  = \common\models\CarImg::find()->where(['car_id'=>$model->id, 'status'=> 1])->all();
                            $car_img_config = [];
                            $car_img_preview = [];
                            $input = '';
                            foreach($car_imgs as $car_img){
                                $config = [
                                    'size' => $car_img->size,
                                    'url'  => Url::to(['media/image-delete', 'model'=> 'car', 'id' => $car_img->id]),
                                    'key'  => $car_img->id
                                ];
                                $car_img_config[] = $config;
                                $car_img_preview[] = Yii::$app->params['img_domain'] . $car_img->img_path;
                                $input .= '<input type="hidden"  data-car_img-node="1" id="car_img_id_input_'.$car_img->id.'" name="CarForm[car_img_id][]" value="'.$car_img->id.'">';
                            }
                            ?>
                            <?=$form->field($model, 'car_img')->widget(FileInput::classname(), [
                                'language' => 'zh',
                                'options' => [
                                    'accept' => 'image/*',
                                    'multiple'=>true

                                ],
                                'pluginOptions' => [
                                    'initialPreview' => $car_img_preview,
                                    'initialPreviewConfig' =>$car_img_config,
                                    'initialPreviewAsData' => true,
                                    'overwriteInitial'=> false,
                                    'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'car']),
                                    'maxFileSize'=>2048,
                                    'showPreview' => true,
                                    'showCaption' => true,
                                    'showRemove' => true,
                                    'showUpload' => true,
                                    'maxFileCount' => 2,
                                    'minFileCount' => 1,
                                ]
                            ]) ?>

                            <?php echo $input ?>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4"></label>
                                <div class="col-md-6 col-sm-6">
                                    <button type="button" class="btn btn-primary btn-submit">修改</button>
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
        var car_count = getAllImgNodeCount();
       if(car_count < 1){
                swal("最少上传一张行驶证图片");
                return false;
        }
        f.on('beforeSubmit', function (e) {
            swal({
                    title: "确认修改",
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
    $('.field-carform-car_img').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key, 'car_img');
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode('car_img');
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode('car_img');
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id, 'car_img');
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId, 'car_img');
    });
      
    //将图片id存入图容器
    function appendImgNode(img_id, previewId, type)
    {    
        var html = '<input type="hidden" data-car_img-node="1" data-pid="'+ previewId +'" id="car_img_id_input_'+ img_id +'" name="CarForm[car_img_id][]" value="'+img_id+'">';
        
        f.append(html);
    }
    
    //将图片ID从图片ID容器中删除，根据图片的ID
    function removeImgNodeById(img_id, type)
    {      
        $('#car_img_id_input_' + img_id).remove();        
    }
    //将图片ID从图片ID容器中删除，根据图片预览的容器id
    function removeImgNodeByPid(previewId, type)
    {
        $('input[data-car_img-pid=previewId]').remove();                
    }
    //移除所有的图片容器id
    function removeAllImgNode(type)
    {  
        $('input[data-car_img-node="1"]').remove();     
    }
    
    function getAllImgNodeCount(type)
    {
        return $('input[data-car_img-node="1"]').length;  
    }
})
JS
);
?>