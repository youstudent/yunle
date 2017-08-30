<?php
/**
 * User: xiaoqiang-angke
 * Date: 2017/8/29 - 下午7:31
 *
 */
use backend\models\Service;
use yii\bootstrap\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
/* @var $model backend\models\form\MemberForm */

pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">变更状态</h4>
</div>
<div class="modal-body">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id'                   => 'Order',
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

    <div class="form-group field-order-type">
        <label class="control-label control-label col-md-4 col-sm-4" for="order-type">订单类型</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" id="order-type" class="form-control" name="" value="<?= $model->type_label ?>" readonly aria-invalid="false">

            <div class="help-block help-block-error "></div>
        </div>
    </div>

    <?php
    $data = \common\models\Helper::getStatusList()[$model->type];
    $items = [];
    foreach($data['act'] as $v){
        $items[$v['actId']] = $v['actName'];

    }


    ?>
    <?= $form->field($model, 'status_id')->dropDownList($items)->label($data['typeName']) ?>

    <div style="display:none " class="dis">
        <?= $form->field($model,'cost')->textInput()->label('评估价格')?>
    </div>

    <?= $form->field($model, 'info')->textArea(['rows' => '6', 'placeholder'=>'备注信息'])->label('备注') ?>

    <?=$form->field($model, 'img')->widget(FileInput::classname(), [
        'language' => 'zh',
        'options' => [
            'accept' => 'image/*',
            'multiple'=> true

        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'act']),
            'maxFileSize'=>2048,
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => true,
        ]
    ])->label('动态详情附件') ?>



    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4"></label>
        <div class="col-md-6 col-sm-6">
            <button type="button" class="btn btn-primary btn-submit">变更</button>
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end() ?>



</div>

<?php

$formId = $model->formName();
$this->registerJs(<<<JS
$(function () {
    var f = $('#{$formId}');
    $('.btn-submit').on('click', function () {      
       
        f.on('beforeSubmit', function (e) {
            var img_count = getAllImgNodeCount();
            if(img_count > 6){
                swal("最多可上传6张附件");
                return false;
            }
            swal({
                    title: "确认添加",
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
                                   window.location.href = res.url;
                                });
                                setTimeout(function () {
                                   window.location.href = res.url;
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
      //处理上传图片
    $('.field-order-img').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key);
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode();
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode();
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id);
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId);
    });
    
    //将图片id存入图容器
    function appendImgNode(img_id, previewId)
    {
        var html = '<input type="hidden" data-img-node="1" data-pid="'+ previewId +'" id="img_id_input_'+ img_id +'" name="Order[img_id][]" value="'+img_id+'">';
        f.append(html);
    }
    
    //将图片ID从图片ID容器中删除，根据图片的ID
    function removeImgNodeById(img_id)
    {
        $('#img_id_input_' + img_id).remove();
    }
    //将图片ID从图片ID容器中删除，根据图片预览的容器id
    function removeImgNodeByPid(previewId)
    {
        $('input[data-pid=previewId]').remove();
    }
    //移除所有的图片容器id
    function removeAllImgNode()
    {
        $('input[data-img-node="1"]').remove();
    }
    
    function getAllImgNodeCount()
    {
        return $('input[data-img-node="1"]').length;
    }
    $("#order-status_id").change(function(){
     var thisVal = $(this).val();
     var tempText = $('#order-status_id').find('option[value='+ thisVal +']');
     if(thisVal==6){
        $(".dis").attr("style","");
     }else{
        $(".dis").attr("style","display: none");
      
     }
     })
})

JS
);
?>

