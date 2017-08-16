<?php

use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\ServiceForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = '添加车辆';
$this->params['breadcrumbs'][] = $this->title;

pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
?>

    <div class="service-create">

        <h1>添加车辆</h1>

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



                            <div class="form-group field-carform-cat_img">
                                <label class="control-label control-label col-md-4 col-sm-4" for="carform-cat_img">行驶证图片</label>
                                <div class="col-md-6 col-sm-6">
                                    <?= FileUploadUI::widget([
                                        'model' => $model,
                                        'attribute' => 'car_img',
                                        'url' => ['media/image-upload', 'model'=> 'agency'],
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
                                        console.log(1);
                                        console.log(data);
//                                console.log(e);
//                                console.log(data);
                            }',
                                            'fileuploadfail' => 'function(e, data) {
//                                console.log(e);
//                                console.log(data);
                            }',
                                        ],
                                    ]); ?>

                                    <div class="help-block help-block-error "></div>
                                </div>
                            </div>

                            <?= $form->field($model, 'cat_imgs', ['template'=> "{input}"])->hiddenInput() ?>



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
    var img_input = $('input[name="AgencyForm[imgs]"]');
    
    $('body').on('fileuploaddone', function(e, data){
        var img_id = data.result.files[0].img_id;
       
        //将上传完成的数据添加到表单中
        var ids =  img_input.val();
        img_input.val(ids+','+img_id)
    })
    $('.btn-submit').on('click', function () {
        var f = $('#{$formId}');
        f.on('beforeSubmit', function (e) {
            if(img_input.val() == ''){
                swal("请先上传附件");
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