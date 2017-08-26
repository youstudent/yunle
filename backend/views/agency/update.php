<?php

use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\ServiceForm */
/* @var $form yii\widgets\ActiveForm */
$this->title = '更新代理商';
$this->params['breadcrumbs'][] = $this->title;

pd\coloradmin\web\plugins\ParsleyAsset::register($this);
pd\coloradmin\web\plugins\WizardAsset::register($this);
pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
?>

<div class="service-create">

    <h1>更新代理商</h1>

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
                            'options' => ['class' => 'form-horizontal form-bordered'],
                            'enableAjaxValidation' => true,
                            'validationUrl'        => $model->isNewRecord ? Url::toRoute(['validate-form', 'scenario' => 'create']) : Url::toRoute(['validate-form', 'scenario' => 'update']),
                        ]) ?>
                        
                        <?= $form->field($model, 'owner_username')->textInput() ?>
                        <?= $form->field($model, 'name')->textInput() ?>
                        <?= $form->field($model, 'principal')->textInput() ?>
                        <?= $form->field($model, 'principal_phone')->textInput() ?>
                        <?php
                        $atths = \backend\models\ServiceImg::find()->where(['service_id'=>$model->id, 'status'=> 1, 'type'=> 0])->all();
                        $config = [];
                        $preview = [];
                        $input = '';
                        foreach($atths as $atth){
                        $data = [
                            'size' => $atth->size,
                            'url'  => Url::to(['media/image-delete', 'model'=> 'agency', 'id' => $atth->id]),
                            'key'  => $atth->id
                        ];
                            $config[] = $data;
                            $preview[] = Yii::$app->params['img_domain'] . $atth->img_path;
                        $input .= '<input type="hidden"  data-atth-img-node="1" id="atth_img_id_input_'.$atth->id.'" name="AgencyForm[atth_id][]" value="'.$atth->id.'">';
                        }
                        ?>
                        <?= $form->field($model, 'attachment')->widget(\kartik\file\FileInput::classname(), [
                            'language'      => 'zh',
                            'options'       => [
                                'accept'   => 'image/*',
                                'multiple' => true,
        
                            ],
                            'pluginOptions' => [
                                'initialPreview' => $preview,
                                'initialPreviewConfig' => $config,
                                'initialPreviewAsData' => true,
                                'overwriteInitial'=> false,
                                'removeFromPreviewOnError' => true,
                                'autoReplace'              => true,
                                'uploadUrl'                => Url::to(['/media/image-upload', 'model' => 'agency']),
                                'maxFileSize'              => 2048,
                                'showPreview'              => true,
                                'showCaption'              => true,
                                'showRemove'               => true,
                                'showUpload'               => true,
                                'maxFileCount'             => 12,
                            ],
                        ]) ?>
                        
                        <?php echo $input; ?>
                        <!--是客户经理，客户经理就是自己，否则可以查看所有的人-->
                        <!--                        --><?php //$model->status=1; ?>
                        <!--                        --><?//= $form->field($model, 'status')->dropDownList(['禁用', '启用']) ?>

                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <div class="col-md-6 col-sm-6">
                                <button type="button" class="btn btn-primary btn-submit">更新</button>
                            </div>
                        </div>

                        <?php \yii\bootstrap\ActiveForm::end() ?>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
    </div>
    <!-- mask and bigImg to show -->
    <div class="hidden ak-mask ak_img_mask">
        <div class="ak-mask-son ak-boxSad">
            <img class="ak_mask_img" src="" alt="">
        </div>
    </div>
    <!-- mask and bigImg to show __  end -->

    <!-- mask and del to show -->
    <div class="hidden ak-mask ak_del_mask">
        <div class="ak-del-son ak-boxSad">
            <div class="ak-flex" style="justify-content:space-between">
                <h3>提示</h3>
                <h3 class="close_del_mask" style="color:red; cursor: pointer;">x</h3>
            </div>
            <p style="font-size:18px; text-align:center; margin-top:5vh;color:#222;">您确定要删除该图片吗？</p>
            <div class="ak-flex" style="justify-content:space-around;margin-top:6.5vh;">

                <a class="btn btn-warning cancel" data-something="id or other">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>确认</span>
                </a>

                <a class="btn btn-primary start" data-something="id or other">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>取消</span>
                </a>
            </div>
        </div>
    </div>
        <!-- end row -->
   
</div>
<?php

$formId = $model->formName();
/*$this->registerJs(<<<JS
$(function () {
    var img_input = $('input[name="AgencyForm[imgs]"]');
    
    $('body').on('fileuploaddone', function(e, data){
        var img_id = data.result.files[0].img_id;
       
        //将上传完成的数据添加到表单中
        var ids =  img_input.val();
        img_input.val(ids+','+img_id)
    })
    $('.btn-submit').on('click', function () {
        var f = $('#{$formId}');
        f.on('beforeSubmit', function (e) {
            if(img_input.val() == ''){
                swal("请先上传附件");
                return false;
            }
            swal({
                    title: "确认更新",
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
*/
$this->registerJs(<<<JS
$(function () {
    var f = $('#{$formId}');
    $('.btn-submit').on('click', function () {
        
        var atth_count = getAllImgNodeCount('atth');
       // console.log(atth_count);
        //var head_count = getAllImgNodeCount('head');
      // if(head_count != 1){
               // swal("必须且只能上传一个头图");
                // false;
       // }
       if(atth_count <0 || atth_count > 12){
                swal("请上传1到12个附件");
                return false;
        }
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
    $('.field-agencyform-attachment').
    on('filedeleted', function(event, key, jqXHR, data){
       removeImgNodeById(key, 'attachment');
    }).
    on('filecleared', function(event){
       //点击右上角的x触发
       removeAllImgNode('attachment');
    }).
    on('filereset', function(event){
        //恢复初始化的时候触发
       removeAllImgNode('attachment');
    }).
    on('filesuccessremove', function(event, id) {
       removeImgNodeByPid(id, 'attachment');
    }).
    on('fileuploaded', function(event, data, previewId, index) {
        var img_id = data.response.files[0].img_id;
        appendImgNode(img_id, previewId, 'attachment');
    });
    //将图片id存入图容器
    function appendImgNode(img_id, previewId, type)
    {
        
        var html = '<input type="hidden" data-atth-img-node="1" data-pid="'+ previewId +'" id="atth_img_id_input_'+ img_id +'" name="AgencyForm[atth_id][]" value="'+img_id+'">';
       
        f.append(html);
    }
    
    //将图片ID从图片ID容器中删除，根据图片的ID
    function removeImgNodeById(img_id, type)
    {
        //console.log(111);
        //if(type == 'head'){
           // $('#head_img_id_input_' + img_id).remove();
       // }else{
            $('#atth_img_id_input_' + img_id).remove();
       // }
    }
    //将图片ID从图片ID容器中删除，根据图片预览的容器id
    function removeImgNodeByPid(previewId, type)
    {
       // console.log(111);
       
        $('input[data-atth-pid=previewId]').remove();
       
        
    }
    //移除所有的图片容器id
    function removeAllImgNode(type)
    {
      //  console.log(111);
      
       $('input[data-atth-img-node="1"]').remove();
    
        
    }
    
    function getAllImgNodeCount(type)
    {
      //  console.log(111);
      
            return $('input[data-atth-img-node="1"]').length;
      
    }
})
JS
);
?>
