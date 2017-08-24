<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 下午7:22
 *
 */
use kartik\widgets\FileInput;
use yii\helpers\Url;

$this->title = '广告创建';

?>

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                                class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                                class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                       data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                       data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">表单</h4>
            </div>
            <div class="panel-body">
                <?php $form = \yii\bootstrap\ActiveForm::begin([
                    'id'                   => 'BannerForm',
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

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'describe')->textInput() ?>


                <?= $form->field($model, 'column_id')->dropDownList(\backend\models\Column::find()->indexBy('id')->select('name,id')->column(), [
                    'prompt'   => '请选择',
                    'onChange' => 'pd_selectSid($(this))']) ?>

                <?= $form->field($model, 'action_value')->dropDownList([]) ?>

                <?=$form->field($model, 'img')->widget(FileInput::classname(), [
                    'language' => 'zh',
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>false

                    ],
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'banner']),
                        'maxFileSize'=>2800,
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => true,
                        'maxFileCount' => 1,
                        'minFileCount' => 1,
                    ]
                ]) ?>

                <?php $model->status = 1; ?>

                <?= $form->field($model, 'status', ['template'=> "{input}"])->hiddenInput() ?>

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4"></label>
                    <div class="col-md-6 col-sm-6">
                        <button type="button" class="btn btn-primary btn-submit">添加</button>
                    </div>
                </div>

                <?php \yii\bootstrap\ActiveForm::end() ?>

            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->
<?php
$article_id = $model->isNewRecord ? 0 : $model->action_value;
$url = Url::to(['article/drop-down-list']);
$this->registerJs(<<<JS

$(function () {
    pd_selectSid = function(that){
            var column_id = that.val();
            if(!column_id){
                return false;
            }
            var url = "{$url}?column_id=" + column_id + "&article_id=" + {$article_id};
            $.get(url, function(rep){
                $('#bannerform-action_value').html(rep);
                $('.field-bannerform-action_value').show();
            });
        }
        
     //处理上传图片
    $('.field-bannerform-img').
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
        var html = '<input type="hidden" data-img-node="1" data-pid="'+ previewId +'" id="img_id_input_'+ img_id +'" name="BannerForm[img_id][]" value="'+img_id+'">';
        $('#BannerForm').append(html);
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
    
    $('.btn-submit').on('click', function () {
        var img_count = getAllImgNodeCount();
        if(img_count != 1){
            swal('图片数量不合法');
            return false;
        }
        var f = $('#BannerForm');
        f.on('beforeSubmit', function (e) {
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
})

JS
);
?>
