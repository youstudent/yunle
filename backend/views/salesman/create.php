<?php

use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\ServiceForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = '添加业务员';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="salesman-create">

    <h1>添加业务员</h1>

    <div class="adminuser-form">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i class="fa fa-repeat"></i></a>
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
                            'options'              => ['class' => 'form-horizontal form-bordered'],
                            'enableAjaxValidation' => true,
                            'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
                        ]) ?>
                        <?= $form->field($model, 'username')->textInput() ?>

                        <?= $form->field($model, 'password')->textInput() ?>

                        <?= $form->field($model, 'name')->textInput() ?>

                        <?= $form->field($model, 'phone')->textInput() ?>

                        <?= $form->field($model, 'licence')->textInput() ?>

                        <?= $form->field($model, 'head')->widget(FileInput::classname(), [
                            'language'      => 'zh',
                            'options'       => [
                                'accept'   => 'image/*',
                                'multiple' => false,

                            ],
                            'pluginOptions' => [
                                'overwriteInitial'         => false,//不允许覆盖
                                'initialPreviewAsData'     => true,
                                'removeFromPreviewOnError' => true,
                                'autoReplace'              => true,
                                'uploadUrl'                => Url::to(['/media/image-upload', 'model' => 'salesman', 'type' => 'head']),
                                'maxFileSize'              => 2800,
                                'showPreview'              => true,
                                'showCaption'              => true,
                                'showRemove'               => true,
                                'showUpload'               => true,
                                'maxFileCount'             => 1,
                                //'minFileCount' => 1,
                            ],
                        ]) ?>

                        <?= $form->field($model, 'attachment')->widget(FileInput::classname(), [
                            'language'      => 'zh',
                            'options'       => [
                                'accept'   => 'image/*',
                                'multiple' => true,

                            ],
                            'pluginOptions' => [
                                'overwriteInitial'         => false,//不允许覆盖
                                'initialPreviewAsData'     => true,
                                'removeFromPreviewOnError' => true,
                                'autoReplace'              => true,
                                'uploadUrl'                => Url::to(['/media/image-upload', 'model' => 'salesman', 'type' => 'img']),
                                'maxFileSize'              => 2048,
                                'showPreview'              => true,
                                'showCaption'              => true,
                                'showRemove'               => true,
                                'showUpload'               => true,
                                'maxFileCount'             => 12,
                            ],
                        ]) ?>


                        <?php if(Helper::getLoginMemberRoleGroup() == 1) : ?>
                            <?php $colunm = \backend\models\Service::find()->indexBy('id')->select('name,id')->column() ?>
                        <?php else: ?>
                            <?php $service_id = Helper::getLoginMemberServiceId(); ?>
                            <?php $colunm = \backend\models\Service::find()->indexBy('id')->where(['id'=>$service_id])->select('name,id')->column() ?>
                        <?php endif; ?>

                        <?php
                        $service_id = Helper::getLoginMemberServiceId();
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
                        }
                        ?>
                        <?php if($service_id) : ?>
                            <?= $form->field($model, 'pid', ['template'=> '{input}'])->hiddenInput(['value'=>$service_id]) ?>
                            <?php
                            $role_colums = \backend\models\AppRole::find()->where(['service_id'=>$service_id])->indexBy('id')->select('name,id')->column();
                            ?>
                        <?php else: ?>
                            <?php
                            $role_colums = [];
                            ?>
                            <?= $form->field($model, 'pid')->dropDownList($colunm) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'role_id')->dropDownList($role_colums) ?>

                        <?php $model->level = 1 ?>
                        <?= $form->field($model, 'level')->dropDownList([
                            1 => '一星',
                            2 => '二星',
                            3 => '三星',
                            4 => '四星',
                            5 => '五星',
                        ]) ?>

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
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
<?php

$formId = $model->formName();
$url = Url::to(['service/role-list']);
$this->registerJs(<<<JS
$(function () {
    $('#userform-pid').on('change', function(){
        var service_id = $(this).val();
        var url = "{$url}?service_id=" + service_id + '&salesman_id=';
        $.get(url, function(rep){
            $('#userform-role_id').html(rep);
        });
    });
    var f = $('#{$formId}');
    $('.btn-submit').on('click', function () {
        var atth_count = getAllImgNodeCount('atth');
        var head_count = getAllImgNodeCount('head');
       if(head_count != 1){
                swal("必须且只能上传一个头图");
                return false;
        }
       if(atth_count <0 || atth_count > 12){
                swal("请上传1到12个附件");
                return false;
        }
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
    
        //处理上传图片
    $('.field-userform-head').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key, 'head');
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode('head');
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode('head');
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id, 'head');
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId, 'head');
    });
    
            //处理上传图片
    $('.field-userform-attachment').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key, 'atta');
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode('atta');
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode('atta');
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id, 'atta');
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId, 'atta');
    });
    
    //将图片id存入图容器
    function appendImgNode(img_id, previewId, type)
    {   
        if(type == 'head'){
            var html = '<input type="hidden" data-head-img-node="1" data-pid="'+ previewId +'" id="head_img_id_input_'+ img_id +'" name="UserForm[head_id][]" value="'+img_id+'">';
        }else{
            var html = '<input type="hidden" data-atth-img-node="1" data-pid="'+ previewId +'" id="atth_img_id_input_'+ img_id +'" name="UserForm[atta_id][]" value="'+img_id+'">';
        }
        f.append(html);
    }
    
    //将图片ID从图片ID容器中删除，根据图片的ID
    function removeImgNodeById(img_id, type)
    {
        if(type == 'head'){
            $('#head_img_id_input_' + img_id).remove();
        }else{
            $('#atth_img_id_input_' + img_id).remove();
        }
    }
    //将图片ID从图片ID容器中删除，根据图片预览的容器id
    function removeImgNodeByPid(previewId, type)
    {
        if(type == 'head'){
            $('input[data-head-pid=previewId]').remove();   
        }else{
            $('input[data-atth-pid=previewId]').remove();   
        }
        
    }
    //移除所有的图片容器id
    function removeAllImgNode(type)
    {
        if(type == 'head'){
           $('input[data-head-img-node="1"]').remove(); 
        }else{
           $('input[data-atth-img-node="1"]').remove(); 
        }
        
    }
    
    function getAllImgNodeCount(type)
    {
        if(type == 'head'){
            return $('input[data-head-img-node="1"]').length;
        }else{
            return $('input[data-atth-img-node="1"]').length;
        }
    }
})
JS
);
?>
