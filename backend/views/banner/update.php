<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/3 - 下午7:22
 *
 */
use kartik\widgets\FileInput;
use yii\helpers\Url;

$this->title = '广告更新';
$this->params['breadcrumbs'][] = $this->title;

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

                <!--                --><? //= $form->field($model, 'action_type')->dropDownList(['内链', '外链']) ?>
                <?php
                $model->column_id = \backend\models\Article::findOne(['id'=>$model->action_value]) ? \backend\models\Article::findOne(['id'=>$model->action_value])->column_id : 0;
                ?>
                <?= $form->field($model, 'column_id')->dropDownList(\backend\models\Column::find()->indexBy('id')->select('name,id')->column(), [
                    'prompt'   => '请选择',
                    'onChange' => 'pd_selectSid($(this))']) ?>

                <?= $form->field($model, 'action_value')->dropDownList(
                    \backend\models\Article::find()->where(['column_id'=> $model->column_id])->indexBy('id')->select('title,id')->column()
                ) ?>

                <?php
                //根据对应的id，获取已经有的图片数据
                $m  = \backend\models\BannerImg::findOne(['banner_id'=>$model->id, 'status'=> 1]);

                //找到对应的图片数据，这里只有一张，就这样的处理了
                $config['size'] = $m->size;
                $config['url'] = Url::to(['media/image-delete', 'model'=> 'banner', 'id' => $m->id]);
                $config['key'] = $m->id;

                $preview = Yii::$app->params['img_domain'] . $m->img_path;
                ?>

                <input type="hidden" id="img_id_input_<?= $m->id ?>" name="BannerForm[img_id][]" value="<?= $m->id ?>">

                <?=$form->field($model, 'img')->widget(FileInput::classname(), [
                    'language' => 'zh',
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>true

                    ],
                    'pluginOptions' => [
                        'initialPreview' => [
                            $preview
                        ],
                        'initialPreviewConfig' => [
                            $config
                        ],
                        'initialPreviewAsData' => true,
                        'removeFromPreviewOnError' => true,
                        'autoReplace' => true,
                        'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'banner']),
                        'maxFileSize'=> 2800,
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => true,
                        'maxFileCount' => 4,
                        'minFileCount' => 1,
                    ]
                ]) ?>



                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4"></label>
                    <div class="col-md-6 col-sm-6">
                        <button type="button" class="btn btn-primary btn-submit">保存</button>
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
        $('.field-bannerform-action_value').hide();
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
    var img_input = $('input[name="BannerForm[img_id]"]');
    $('.field-bannerform-img').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNode(key);
        //监听删除的图片，并放入删除的标记中
       alert('删除' + key);
       $('input[name="BannerForm[delete_img_id]').val(key);
    }).
    on('filesuccessremove', function(event, id) {
        alert(2);
        //如果移除了文件，就在这里将文件id放入delete_id 标记里，这里单图片就简单处理了
          console.log(id);
         img_input.val(''); 
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        //文件上传成功了，将上传成功的文件，放入待上传的id中
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id);
    });
    
    //将上传完成的图片id追加到中
    function appendImgNode(img_id)
    {
        var html = '<input type="hidden" id="img_id_input_'+ img_id +'" name="BannerForm[img_id][]" value="'+img_id+'>';
        $('#BannerForm').append(html);
    }
    
    //将删除的图片id追加到form中
    function removeImgNode(img_id)
    {
        $('#img_id_input_' + img_id).remove();
    }

    $('.btn-submit').on('click', function () {
        if(img_input.val() == ''){
            swal('请先上传图片');
            return false;
        }
        var f = $('#BannerForm');
        f.on('beforeSubmit', function (e) {
            swal({
                    title: "确认修改",
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
                                    //window.location.href = res.url;
                                });
                                setTimeout(function () {
                                    //window.location.href = res.url;
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
