<?php
/* @var $member backend\models\form\MemberInfoForm */
/* @var $identification common\models\Identification */
?>

<!-- #modal-dialog -->

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">更新会员资料</h4>
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
        'validationUrl'        => $member->isNewRecord ? \yii\helpers\Url::toRoute(['validate-form', 'scenario' => 'create']) : \yii\helpers\Url::toRoute(['validate-form','scenario' => 'update', 'id'=> $member->id]),
    ]) ?>
    <?= $form->field($member, 'phone')->textInput() ?>

    <?= $form->field($member, 'service')->dropDownList(\backend\models\Service::find()
        ->where(['status' => 1])
        ->select('name,id')->
        indexBy('id')->
        column(), [
        'prompt'   => '请选择',
        'onChange' => 'pd_selectSid()']) ?>


    <?= $form->field($member, 'pid')->dropDownList([]) ?>


    <?= $form->field($member, 'status')->dropDownList([
        0 => '冻结',
        1 => '正常'
    ]) ?>

    <?= $form->field($member, 'type')->dropDownList([
        '1' => '个人用户',
        '2' => '组织用户'
    ], ['prompt'=>'请选择']) ?>

    <?= $form->field($identification, 'status')->dropDownList([
            0 => '未认证',
            1 => '已认证'
    ]) ?>

    <?= $form->field($identification, 'birthday')->textInput() ?>

    <?= $form->field($identification, 'name')->textInput() ?>

    <?= $form->field($identification, 'birthday')->textInput() ?>

    <?= $form->field($identification, 'id_start_end_time')->textInput() ?>

    <?= $form->field($identification, 'start_at',['options'=> ['style'=> ['display'=> 'none']]])->textInput(['options'=> 'readonly']) ?>

    <?= $form->field($identification, 'end_at',['options'=> ['style'=> ['display'=> 'none']]])->textInput() ?>

    <?= $form->field($identification, 'nation')->textInput() ?>

    <?= $form->field($identification, 'sex')->dropDownList(['男', '女']) ?>


    <?= $form->field($identification, 'licence')->textInput() ?>


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
        pd_init_selected = function(){
            var pid =$('select[name="MemberForm[service]"]').val();
            if(!pid){
                return false;
            }
            var sid = <?= !$member->isNewRecord ? $member->pid : 0 ?>;
            if(!pid){return false;}
            var url = "<?= \yii\helpers\Url::to(['salesman/drop-down-list']); ?>?pid=" + pid + "&sid=" + sid;
            $.get(url, function(rep){
                $('#memberform-pid').html(rep);
                $('.field-memberform-pid').show();
            });
        }
        pd_init_selected()

        pd_selectSid = function(){
            $('.field-memberform-pid').hide();
            window.pd_init_selected();
        }
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
