<?php
/* @var $member backend\models\form\MemberInfoForm */
/* @var $identification common\models\Identification */
?>

<!-- #modal-dialog -->

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">更新系统通知</h4>
</div>
<div class="modal-body">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id'                   => 'MemberForm',
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
        'validationUrl'        => $model->isNewRecord ? \yii\helpers\Url::toRoute(['validate-form', 'scenario' => 'create']) : \yii\helpers\Url::toRoute(['validate-form','scenario' => 'update', 'id'=> $model->id]),
    ]) ?>
    <?= $form->field($model, 'content')->textarea()->label("内&nbsp;&nbsp;容") ?>
    <?= $form->field($model, 'notice_people',['inline'=>true])->checkboxList(\backend\models\form\SystemNoticeForm::$option) ?>
    <?= $form->field($model, 'send_out_people')?>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-sm btn-success  btn-submit" data-toggle="modal">更新</a>
</div>
<?php
\pd\coloradmin\web\plugins\DaterangePickerAsset::register($this);
?>
<script>
    $(function (){
        $('input[name="Identification[birthday]"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale:{
                    "format": "YYYY年M月DD日",
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
            });
        $('input[name="Identification[id_start_end_time]"]').daterangepicker({
            showDropdowns: true,
            locale:{
                "separator": "-",
                "format": "YYYY.M.DD",
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
            var f = $('#MemberForm');
            f.on('beforeSubmit', function (e) {
                swal({
                        title: "确认更新会员信息",
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
            $('#MemberForm').submit();
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
