<?php
/**
 * User: xiaoqiang
 * Date: 2017/8/9 - 上午11:30
 *
 */
use yii\helpers\Url;

/* @var $this yii\web\view */
/* @var $model backend\models\form\InsuranceOrderForm */

?>

<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">保险添加订单</h4>
</div>
<div class="modal-body">
    <div class="panel-body panel-form">
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
            ],]) ?>

        <?= $form->field($model, 'car')->dropDownList(
            \backend\models\Car::find()->where(['member_id'=>$model->member_id])->select('license_number')->indexBy('id')->column()
        ) ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'user')->textInput() ?>
        <?= $form->field($model, 'member_id', ['template'=> "{input}"])->textInput()->hiddenInput() ?>

        <?= $form->field($model, 'sex')->textInput() ?>

        <?= $form->field($model, 'nation')->textInput() ?>

        <?= $form->field($model, 'licence')->textInput() ?>

        <?= $form->field($model, 'company')->dropDownList(
            \common\models\InsuranceCompany::find()->select('name,id')->indexBy('id')->column()
        ) ?>

        <div style=" width: 80%; margin: 0 auto;">
        <h3 style="border-bottom: solid 1px #ccc; text-align: center;padding: 5px 0;">险种</h3>
            <?php foreach (\backend\models\Insurance::find()->select('id,title,deduction')->all() as $v) {?>
                <div style="display: flex; justify-content: space-between;padding: 5px 60px;">
                    <h4><?= $v->title ?></h4>
                    <input id="insuranceorderform-insurance" name="InsuranceOrderForm[insurance][<?= $v->id ?>][id]" type="checkbox" class="funCheckBox" data-InsuranceId="<?= $v->id ?>" value="<?= $v->id ?>">
                </div>
                <div id="<?= $v->id ?>" class="hidden" style="display: flex; justify-content: space-around;padding:0 60px;border-bottom: solid 1px #cccccc;">
                    <?php if ($v->deduction ==1 ) {?>
                    <div style="flex:1">
                        不计免赔<input name="InsuranceOrderForm[insurance][<?= $v->id ?>][deduction]" type="checkbox" class="funCheckBox" data-ele="<?= $v->deduction ?>" value="<?= $v->deduction ?>">
                    </div>
                    <?php }?>
                    <div style="flex:2">
                        <select name="InsuranceOrderForm[insurance][<?= $v->id ?>][element]" class="form-control" id="insuranceorderform-element">
                            <option value=""></option>
                            <?php foreach (\common\models\element::find()->where(['insurance_id'=>$v->id])->select('name,id')->all() as $vv) {?>
                                <option value="<?= $vv->id ?>"><?= $vv->name ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            <?php }?>
        </div>

        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">关闭</a>
    <a href="javascript:;" class="btn btn-sm btn-success btn-submit" data-form-id="InsuranceOrderForm" id="addTheInsurance">添加</a>
</div>
<script>
    $(function (){
        $('.funCheckBox').on('click',function(){
            var theId = $(this).attr('data-InsuranceId');
            if($('#'+theId).hasClass('hidden')){
                $('#'+theId).removeClass('hidden');
            }else{
                $('#'+theId).addClass('hidden');
            }
        });
//        $(function(start, end, label){
//            $('input[name="Identification[start_at]"]').val(start.format('YYYY.MM.DD'));
//            $('input[name="Identification[end_at]"]').val(end.format('YYYY.MM.DD'));
//        });

        $('.btn-submit').on('click', function () {
            var f = $('#InsuranceOrderForm');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认保单信息",
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
        function getSalesman(that) {
            var sid = that.val();
            if (!sid) {
                return false;
            }
            that.attr('data-service-id', sid);

        }
    })

</script>
