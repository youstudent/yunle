<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pd\admin\components\RouteRule;
use pd\admin\AutocompleteAsset;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model pd\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context pd\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$rules = Yii::$app->getAuthManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source,
    });
JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>
<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">表单</h4>
    </div>

    <div class="auth-item-form">
        <?php $form = ActiveForm::begin([
                'id' => 'item-form',
                'options' => ['class'=> 'form-horizontal form-bordered'],
                'fieldConfig' => [
                        'template' =>  "{label}\n<div class='col-md-6 col-sm-6'>{input}</div>\n{hint}\n{error}",
                        'labelOptions' => ['class' => 'control-label col-md-4 col-sm-4'],
                ]
        ]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

            <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <label class="control-label col-md-4 col-sm-4"></label>
            <div class="col-md-6 col-sm-6">
            <?php
            echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'name' => 'submit-button'])
            ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<!-- end panel -->
