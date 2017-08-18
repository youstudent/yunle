<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\helpers\Url;

/* @var $this yii\web\view */
/* @var $model backend\models\form\OrderForm */



?>

<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">添加订单</h4>
</div>
<div class="modal-body">
    <div class="panel-body panel-form">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id'                   => 'OrderForm',
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
            'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
        ]) ?>

        <?= $form->field($model, 'type')->dropDownList([
                1 => '救援',
                2 => '维修',
                3 => '保养',
                4 => '线上审车',
                5 => '线下审车',
        ]) ?>

        <?= $form->field($model, 'pick')->dropDownList([
            0 => '不需要',
            1 => '需要'
        ]) ?>

        <?= $form->field($model, 'pick_at')->textInput() ?>

        <?= $form->field($model, 'pick_addr')->textInput() ?>


        <?= $form->field($model, 'user')->textInput() ?>

        <?= $form->field($model, 'member_id', ['template'=> "{input}"])->textInput()->hiddenInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'car')->dropDownList(
                \backend\models\Car::find()->where(['member_id'=>$model->member_id])->select('license_number')->indexBy('id')->column()
        ) ?>


        <?= $form->field($model, 'distributing')->dropDownList([
                0 => '自动',
                1 => '手动'
        ]) ?>

        <?= $form->field($model, 'service')->dropDownList(
                \backend\models\Service::find()->where(['status'=>1])->select('name,id')->indexBy('id')->column()
        ) ?>

        <?= $form->field($model, 'cost')->textInput() ?>


        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">关闭</a>
    <a href="javascript:;" class="btn btn-sm btn-success btn-submit" data-form-id="OrderForm">添加</a>
</div>
<script>
    $(function (){
        $('input[name="OrderForm[pick_at]"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            showDropdowns: true,
            locale:{
                "separator": "-",
                "format": "YYYY-MM-DD",
                "daysOfWeek": [
                    "日",
                    "一",
                    "二",
                    "三",
                    "四",
                    "五",
                    "六"
                ],
                "monthNames": [
                    "一月",
                    "二月",
                    "三月",
                    "四月",
                    "五月",
                    "六月",
                    "七月",
                    "八月",
                    "九月",
                    "十月",
                    "十一月",
                    "十二月"
                ],
            }
        },function(start, end, label){
            $('input[name="Identification[start_at]"]').val(start.format('YYYY.MM.DD'));
            $('input[name="Identification[end_at]"]').val(end.format('YYYY.MM.DD'));
        });

        $('.btn-submit').on('click', function () {
            var f = $('#OrderForm');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认添加此订单?",
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
