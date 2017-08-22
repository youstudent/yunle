<?php
/* @var $model backend\models\InsuranceDetail  */
use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="modal-body">
    <div class="panel-body panel-form">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id'                   => 'Driver',
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
            'enableAjaxValidation' => true
        ]) ?>

        <div style="display:none">
            <?= $form->field($model,'id')->hiddenInput()?>
        </div>



        <?= $form->field($model, 'info')->textarea() ?>

        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">关闭</a>
    <a href="javascript:;" class="btn btn-sm btn-success btn-submit" data-form-id="Driver">确认</a>
</div>
<script>
    $('.btn-submit').on('click', function () {
        var f = $('#Driver');
        f.on('beforeSubmit', function (e) {
            swal({
                    title: "确认审核不通过?",
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
                            console.log(res);
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
            return false;

        });
        f.submit();
    });
</script>
