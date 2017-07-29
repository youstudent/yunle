<?php
/* @var $model backend\models\form\MemberInfoForm */
?>
<div class="modal fade" id="ajax-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">修改实名信息</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-11">
                        <?php $form = \yii\bootstrap\ActiveForm::begin([
                            'id' => 'MemberInfoEdit',
                            'action'      => \yii\helpers\Url::to(['member/info', 'id' => $model->id]),
                            'options'     => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template'     => "{label}\n<div class=\"col-md-9\">\n{input}\n</div>\n",
                                'labelOptions' => ['class' => 'col-md-3 control-label'],
                            ],
                        ]) ?>
                        <?= $form->field($model, 'phone')->textInput() ?>

                        <?= $form->field($model, 'pid')->textInput() ?>

                        <?= $form->field($model, 'status')->dropDownList([
                                0 => '冻结',
                                1 => '正常'
                        ]) ?>

                        <?= $form->field($model, 'type')->dropDownList([
                                '1' => '个人用户',
                                '2' => '组织用户'
                        ], ['prompt'=>'请选择']) ?>

                        <?= $form->field($model->memberInfo, 'nation')->textInput() ?>

                        <?= $form->field($model->memberInfo, 'sex')->textInput() ?>

                        <?= $form->field($model->memberInfo, 'birthday')->textInput() ?>

                        <?= $form->field($model->memberInfo, 'licence')->textInput() ?>

                        <?= $form->field($model->memberInfo, 'start_at')->textInput() ?>

                        <?= $form->field($model->memberInfo, 'end_at')->textInput() ?>

                        <?php \yii\bootstrap\ActiveForm::end() ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
                <a href="javascript:;" class="btn btn-sm btn-danger ajax-modal-post" data-form-id="MemberInfoEdit"">保存</a>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#ajax-modal").modal();
            $(".ajax-modal-post").on('click', function(){
                var data, ajaxCallUrl, postUrl, target;
                var that = $(this);
                target = that.data('form-id');
                var d = $('#'+target);

                postUrl = $(this).attr('post-url');

                //按钮上的url优先
                ajaxCallUrl = postUrl ? postUrl : d.attr('action');

                $.ajax({
                    url: ajaxCallUrl,
                    type: 'post',
                    dataType: 'json',
                    data: d.serialize(),
                    success: function(json) {
                        if(json.code == 1) {
                            //禁用button
                            that.attr("disabled", true);
                            pokerDragon.alertSuccess(json.message, json.url);
                            pokerDragon.gitterMsg('操作成功', json.message);
                        } else if(json.code == 0) {
                            pokerDragon.alertDanger(json.message);
                            pokerDragon.gitterMsg('操作失败', json.message);
                        }
                        // setTimeout(function() {
                        //     $('.close').click();
                        // }, 3e3);
                    },
                    error: function(xhr) { //上传失败
                        pokerDragon.alertDanger('网络错误,请稍后重试');
                    }
                });
            });
        })
    </script>
</div>
