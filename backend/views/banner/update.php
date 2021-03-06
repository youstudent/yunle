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
                    ],
                    'options' => ['class' => 'form-horizontal form-bordered', 'enctype' => 'multipart/form-data'],
                    'enableAjaxValidation' => true,
                    'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
                ]) ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'describe')->textInput() ?>

                <?= $form->field($model, 'action_type')->dropDownList(['仅展示', '跳转到文章'])->label('广告类型') ?>

                <!--跳转-->
                <?php if($model->action_type == 1) : ?>
                    <?php
                    //获取以前的栏目id
                    $model->column_id = \backend\models\Article::findOne(['id'=>$model->action_value])->column_id;


                    //根据对应的id，获取已经有的图片数据
                    $m  = \backend\models\BannerImg::findOne(['banner_id'=>$model->id, 'status'=> 1]);

                    //找到对应的图片数据，这里只有一张，就这样的处理了
                    $config['size'] = $m->size;
                    $config['url'] = Url::to(['media/image-delete', 'model'=> 'banner', 'id' => $m->id]);
                    $config['key'] = $m->id;

                    $preview = Yii::$app->params['img_domain'] . $m->img_path;
                    ?>

                    <?= $form->field($model, 'column_id')->dropDownList(\backend\models\Column::find()->indexBy('id')->select('name,id')->column(), [
                        'prompt'   => '请选择',
                        'onChange' => 'pd_selectSid($(this))']) ?>

                    <?= $form->field($model, 'action_value')->dropDownList(
                        \backend\models\Article::find()->where(['column_id'=> $model->column_id])->indexBy('id')->select('title,id')->column()
                    ) ?>


                    <?php
                    //根据对应的id，获取已经有的图片数据
                    $ms  = \backend\models\BannerImg::find()->where(['banner_id'=>$model->id, 'status'=> 1])->all();
                    $config = [];
                    $preview = [];
                    $input = '';
                    foreach($ms as $m){
                        $data = [
                            'size' => $m->size,
                            'url'  => Url::to(['media/image-delete', 'model'=> 'banner', 'id' => $m->id]),
                            'key'  => $m->id
                        ];
                        $config[] = $data;
                        $preview[] = Yii::$app->params['img_domain'] . $m->img_path;
                        $input .= '<input type="hidden"  data-img-node="1" id="img_id_input_'.$m->id.'" name="BannerForm[img_id][]" value="'.$m->id.'">';
                    }

                    ?>
                    <?=$form->field($model, 'img')->widget(FileInput::classname(), [
                        'language' => 'zh',
                        'options' => [
                            'accept' => 'image/*',
                            'multiple'=>true

                        ],
                        'pluginOptions' => [
                            'initialPreview' => $preview,
                            'initialPreviewConfig' =>$config,
                            'overwriteInitial' => false,//不允许覆盖
                            'initialPreviewAsData' => true,
                            'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'banner']),
                            'maxFileSize'=>2048,
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => true,
                        ]
                    ]) ?>

                    <?php echo $input ?>

                    <input type="hidden" data-img-node="1" id="img_id_input_<?= $m->id ?>" name="BannerForm[img_id][]" value="<?= $m->id ?>">

                <!--纯展示-->
                <?php else: ?>

                    <?= $form->field($model, 'column_id')->dropDownList(\backend\models\Column::find()->indexBy('id')->select('name,id')->column(), [
                        'prompt'   => '请选择',
                        'onChange' => 'pd_selectSid($(this))']) ?>

                    <?= $form->field($model, 'action_value')->dropDownList([]) ?>

                    <?php
                    //根据对应的id，获取已经有的图片数据
                    $ms  = \backend\models\BannerImg::find()->where(['banner_id'=>$model->id, 'status'=> 1])->all();
                    $config = [];
                    $preview = [];
                    $input = '';
                    foreach($ms as $m){
                        $data = [
                            'size' => $m->size,
                            'url'  => Url::to(['media/image-delete', 'model'=> 'banner', 'id' => $m->id]),
                            'key'  => $m->id
                        ];
                        $config[] = $data;
                        $preview[] = Yii::$app->params['img_domain'] . $m->img_path;
                        $input .= '<input type="hidden"  data-img-node="1" id="img_id_input_'.$m->id.'" name="BannerForm[img_id][]" value="'.$m->id.'">';
                    }

                    ?>
                    <?=$form->field($model, 'img')->widget(FileInput::classname(), [
                        'language' => 'zh',
                        'options' => [
                            'accept' => 'image/*',
                            'multiple'=>false

                        ],
                        'pluginOptions' => [
                            'initialPreview' => $preview,
                            'initialPreviewConfig' =>$config,
                            'overwriteInitial' => false,//不允许覆盖
                            'initialPreviewAsData' => true,
                            'uploadUrl' => Url::to(['/media/image-upload', 'model' => 'banner']),
                            'maxFileSize'=>2048,
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => true,
                            'maxFileCount' => 1,
                            'minFileCount' => 1,
                        ]
                    ]) ?>

                    <?php echo $input ?>

                <?php endif; ?>

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
$article_id = $model->action_value ? $model->action_value : 0;
$url = Url::to(['article/drop-down-list']);
$formId = $model->formName();
$this->registerJs(<<<JS

$(function () {
    var action_type = $('#bannerform-action_type');
    if(action_type.val() == 1){
         show_el(); 
    }else{
        hidden_el() 
    }
    action_type.on('change', function(){
        var v = $(this).val();
        console.log(v);
        if(v == 1){
            show_el(); 
        }else{
           hidden_el() 
        }
    });
    function hidden_el(){
         $('.field-bannerform-column_id').hide();
            $('.field-bannerform-action_value').hide();
    }
    function show_el(){
        $('.field-bannerform-column_id').show();
            $('.field-bannerform-action_value').show();
    }
     pd_selectSid = function(that){
            var column_id = that.val();
            if(!column_id){
                return false;
            }
            var url = "{$url}?column_id=" + column_id + "&article_id=" + {$article_id};
            $.get(url, function(rep){
                $('#bannerform-action_value').html(rep);
            });
    }
        
    var f = $('#{$formId}');
    $('.btn-submit').on('click', function () {
        
        f.on('beforeSubmit', function (e) {
            var img_count = getAllImgNodeCount();
           
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
})

JS
);
?>
