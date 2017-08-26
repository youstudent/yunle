<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use pd\admin\components\Helper;
use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $model backend\models\form\MemberForm */

?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">添加会员</h4>
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
        'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update' , 'id'=>$model->id]),
    ]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([1 => '个人', 2 => '组织'], ['prompt' => '请选择']) ?>

    <?php
    $service_id = \common\components\Helper::getLoginMemberServiceId();
    if(!$service_id){
        //A.如果不是服务商或者代理商，还有两种情况
        if(pd\admin\components\Helper::checkRoute('/abs-route/customer-manager')){
            //只能看到自己的服务商
            $id = \Yii::$app->user->identity->id;
            $ids = \common\components\Helper::byCustomerManagerIdGetServiceIds($id);
            $colunm = \backend\models\Service::find()->indexBy('id')->where(['id'=>$ids])->select('name,id')->column();
        }else{
            //可以看到所有的服务商
            $colunm = \backend\models\Service::find()->indexBy('id')->select('name,id')->column();
        }

    }else{
        //直接是服务商的情况

    }
    ?>
<!--    是服务商的-->
    <?php if($service_id) : ?>
        <?= $form->field($model, 'pid')->dropDownList(
            \backend\models\User::find()->indexBy('id')->select('name,id')->where(['pid'=>$service_id])->column()
        ) ?>
    <?php else: ?>
        <?= $form->field($model, 'service')->dropDownList($colunm, [
            'prompt'   => '请选择']) ?>

        <?= $form->field($model, 'pid')->dropDownList([]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->dropDownList([0 => '冻结', 1 => '正常'], ['prompt' => '请选择']) ?>

    <?php \yii\bootstrap\ActiveForm::end() ?>

</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-sm btn-success  btn-submit" data-toggle="modal"
       data-form-id="MemberForm">添加</a>
</div>

<script>
    $(function (){
        $('#memberform-service').on('change', function(){
           var service_id = $(this).val();
            var url =  "<?= Url::to(['salesman/drop-down-list']); ?>?service_id=" + service_id;
                $.get(url, function(rep){
                    $('#memberform-pid').html(rep);
                });
        });

        $('.btn-submit').on('click', function () {
            var f = $('#MemberForm');
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
        function getSalesman(that) {
            var sid = that.val();
            if (!sid) {
                return false;
            }
            that.attr('data-service-id', sid);

        }
    })
</script>

