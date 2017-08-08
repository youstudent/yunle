<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 下午7:22
 *
 */
use yii\helpers\Url;

$this->title = '更改角色';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">更改角色</h4>
</div>
<div class="modal-body">
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
        'enableAjaxValidation' => false,
        'validationUrl'        => $model->isNewRecord ? Url::toRoute(['account-validate-form', 'scenario' => 'create']) : Url::toRoute(['account-validate-form', 'scenario' => 'update', 'id'=> $model->id]),
    ]) ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'item_name')->dropDownList(
        \backend\models\AuthItem::roleList(1,1)
    ) ?>


    <?php \yii\bootstrap\ActiveForm::end() ?>

</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-sm btn-success  btn-submit" data-toggle="modal"
       data-form-id="<?= $model->formName() ?>">保存</a>
</div>

<script>
    $(function (){
        $('.btn-submit').on('click', function () {
            var f = $('#AuthAssignment');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认操作",
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