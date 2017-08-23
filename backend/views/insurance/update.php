<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $model backend\models\form\MemberForm */

?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">编辑险种</h4>
</div>
<div class="modal-body">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id'                   => 'InsuranceForm',
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

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([1 => '交强险', 2 => '商业险']) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'deduction')->dropDownList(['计免赔', '不计免赔']) ?>

    <hr>

    <div class="form-group field-element-action">
        <a class="btn btn-sm btn-success pull-right" id="add-element" style="margin-left: 40px;" >添加要素</a>
    </div>

    <?php if($model->elements) : ?>
        <?php $i= 1 ?>
        <?php foreach($model->elements as $element): ?>

        <div class="form-group field-insurance-element">
            <label class="control-label control-label col-md-4 col-sm-4" for="insurance-element-<?= $i ?>">要素</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" id="insurance-element-<?= $i ?>" class="form-control" name="Insurance[element][]" value="<?= $element->name ?>">
            </div>
            <?php if($i > 1) : ?>
                <a class="btn btn-warning btn-icon btn-circle delete-element"><i class="fa fa-minus"></i></a>
            <?php endif; ?>
        </div>
            <?php $i++; ?>
        <?php endforeach; ?>

    <?php endif; ?>


    <?php \yii\bootstrap\ActiveForm::end() ?>

</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-sm btn-success  btn-submit" data-toggle="modal"
       data-form-id="InsuranceForm">保存</a>
</div>

<script>
    $(function () {
        $('#InsuranceForm').on('click', '.delete-element', function(){
            $(this).parent().remove();
        });

        $('#add-element').on('click', function(){
            var html = '<div class="form-group field-insurance-element">' +
                '<label class="control-label control-label col-md-4 col-sm-4" for="insurance-element">要素</label>' +
                '<div class="col-md-6 col-sm-6">'  +
                '<input type="text"  class="form-control" name="Insurance[element][]">' +
                '</div><a class="btn btn-warning btn-icon btn-circle  delete-element"><i class="fa fa-minus"></i></a></div>';
            $('#InsuranceForm').append(html);
        });
        $('.btn-submit').on('click', function () {
            var f = $('#InsuranceForm');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认保存",
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

