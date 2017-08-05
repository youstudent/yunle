<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\helpers\Url;

/* @var $this yii\web\view */
/* @var $model backend\models\form\UserForm */
?>

<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">添加业务员</h4>
</div>
<div class="modal-body">
    <div class="panel-body panel-form">
        <?php  $form =  \yii\bootstrap\ActiveForm::begin([
            'id'                   => 'UserForm',
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
            'enableAjaxValidation' => true,
            'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update', 'id' => $model->id]),
        ]) ?>

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'pid')->dropDownList( \backend\models\Service::find()->indexBy('id')->select('name,id')->column(), ['prompt'=> '请选择服务商'])->label('服务商商') ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'password')->textInput() ?>

        <?php $model->system_switch = 1; $model->check_switch = 1;$model->status=1; ?>
        <?= $form->field($model, 'status')->dropDownList(['冻结', '正常'])->label('用户状态') ?>

        <?= $form->field($model, 'system_switch')->dropDownList(['不接收', '接收'])->label('系统通知') ?>

        <?= $form->field($model, 'check_switch')->dropDownList(['不接收', '接收'])->label('审核通知') ?>


        <?php  \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">关闭</a>
    <a href="javascript:;" class="btn btn-sm btn-success btn-submit" data-form-id="UserForm">添加</a>
</div>
<script>
    $(function (){
        $('.btn-submit').on('click', function () {
            var f = $('#UserForm');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认添加会员",
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
                                swal("网络错误", "", "error");
                            }
                        });
                    });
                return false;

            });
            f.submit();
        });
    })

</script>
