<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use backend\models\Service;
use backend\models\ServiceUser;
use backend\models\User;
use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $model backend\models\form\MemberForm */

?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">变更业务员</h4>
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
        'enableAjaxValidation' => false,
        'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update' , 'id'=>$model->id]),
    ]) ?>
    <?php
    $service_id = \common\components\Helper::getLoginMemberServiceId();
    ?>
    <?php if($service_id) : ?>
        <?php $model->service = $service_id ?>
    <?php else: ?>
       <?php $model->service = User::findOne(['id'=> $model->pid])->pid; ?>

        <?= $form->field($model, 'service')->dropDownList(
            Service::find()->select('name,id')->indexBy('id')->column()
        ) ?>



    <?php endif; ?>

    <?= $form->field($model, 'pid')->dropDownList(
            User::find()->where(['pid'=>$model->service])->select('name,id')->indexBy('id')->column()
    ) ?>


    <?php \yii\bootstrap\ActiveForm::end() ?>

</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-sm btn-success  btn-submit" data-toggle="modal"
       data-form-id="MemberForm">变更</a>
</div>

<script>
    $(function (){
        $('#member-service').on('change', function(){
            <?php if($service_id) : ?>
            var service_id = <?= $service_id ?>;
            <? else: ?>
            var service_id = $(this).find('option:selected').val();
            if(!service_id){
                return false;
            }

            <? endif; ?>
            var user_salesman_id = <?= $model->pid ?>;
            if(!user_salesman_id){return false;}
            var url = "<?= Url::to(['salesman/drop-down-list']); ?>?user_salesman_id=" + user_salesman_id + "&service_id=" + service_id;
            $.get(url, function(rep){
                $('#member-pid').html(rep);
            });
        });
        $('.btn-submit').on('click', function () {
            var f = $('#MemberForm');
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
        function getSalesman(that) {
            var sid = that.val();
            if (!sid) {
                return false;
            }
            that.attr('data-service-id', sid);

        }
    })
</script>

