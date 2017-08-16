<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\bootstrap\Html;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $model backend\models\form\MemberForm */

?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">更新保险公司</h4>
</div>
<div class="modal-body">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id'                   => 'Identification',
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
        "options" => ["enctype" => "multipart/form-data"],
        'enableAjaxValidation' => false,
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

    <?= $form->field($model, 'img[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        'pluginOptions' => [
            'uploadAsync' => true,
            // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
            'showUpload' => true,
            'uploadUrl' => Url::toRoute(['/identity/async-image']),
            // 异步上传需要携带的其他参数
            'uploadExtraData' => [
                'ident_id' => $model->id,
            ],
        ],
    ]); ?>

    <?php \yii\bootstrap\ActiveForm::end() ?>

</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-sm btn-success  btn-submit" data-toggle="modal"
       data-form-id="Identification">认证</a>
</div>

<script>
    $(function () {
        $('.btn-submit').on('click', function () {
            var f = $('#Identification');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认认证",
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
                                swal("认证失败", "", "error");
                            }
                        });
                    });
                return false;

            });
            f.submit();
        });
    })
</script>

