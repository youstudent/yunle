<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\helpers\Url;

/* @var $this yii\web\view */
/* @var $model backend\models\form\UserForm */
?>

<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">添加业务员</h4>
</div>
<div class="modal-body">
    <div class="panel-body panel-form">
        <?php  $form =  \yii\bootstrap\ActiveForm::begin([
            'id'                   => 'UserForm',
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

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'pid')->dropDownList( \backend\models\Service::find()->indexBy('id')->select('name,id')->column(), ['prompt'=> '请选择服务商'])->label('服务商商') ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'password')->textInput() ?>

        <?= $form->field($model, 'status')->dropDownList(['冻结', '正常'], ['prompt' => '请选择状态'])->label('状态') ?>

        <?php  \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">关闭</a>
    <a href="javascript:;" class="btn btn-sm btn-success">添加</a>
</div>

