<?php

use common\components\Helper;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\ServiceForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = '添加认证信息';
$this->params['breadcrumbs'][] = $this->title;

pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
?>

    <div class="service-create">

        <h1>添加认证信息</h1>

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
                                'options' => ['class' => 'form-horizontal form-bordered', 'enctype' => 'multipart/form-data'],
                                'enableAjaxValidation' => true,
                                'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
                            ]) ?>

                            <?php if (\common\models\Helper::getMemberType($model->member_id) == 1) {?>

                                <?= $form->field($model, 'name')->textInput()->label('姓名') ?>

                                <?= $form->field($model, 'nation')->textInput() ?>

                                <?= $form->field($model, 'sex')->textInput() ?>

                                <?= $form->field($model, 'birthday')->textInput() ?>

                                <?= $form->field($model, 'licence')->textInput()->label('身份证号') ?>

                                <?= $form->field($model, 'start_at')->textInput() ?>

                                <?= $form->field($model, 'end_at')->textInput() ?>

                            <?php } else {?>

                                <?= $form->field($model, 'name')->textInput()->label('组织机构名称') ?>

                                <?= $form->field($model, 'licence')->textInput()->label('组织机构代码') ?>

                            <?php }?>

<!--                            --><?//= $form->field($model, 'status')->dropDownList(['未认证', '已认证']) ?>

                            <?=$form->field($model, 'img')->widget(FileInput::classname(), [
                                'language' => 'zh',
                                'options' => [
                                    'accept' => 'image/*',
                                    'multiple'=>true

                                ],
                                'pluginOptions' => [
                                    'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'identification']),
                                    'maxFileSize'=>2800,
                                    'showPreview' => true,
                                    'showCaption' => true,
                                    'showRemove' => true,
                                    'showUpload' => true,
                                    'maxFileCount' => 2,
                                    'minFileCount' => 1,
                                ]
                            ]) ?>

                            <?= $form->field($model, 'imgs', ['template'=> "{input}"])->hiddenInput() ?>



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
    var img_input = $('input[name="Identification[imgs]"]');
    $('.field-identification-img').on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        var ids =  img_input.val();
        img_input.val(ids+','+img_id)
    });
   
    $('.btn-submit').on('click', function () {
        var f = $('#{$formId}');
        f.on('beforeSubmit', function (e) {
            if(img_input.val() == ''){
                swal("请先上传身份证明照片");
                return false;
            }
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
})
JS
);
?>