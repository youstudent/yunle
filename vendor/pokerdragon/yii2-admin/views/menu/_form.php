<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pd\admin\models\Menu;
use yii\helpers\Json;
use pd\coloradmin\web\plugins\JqueryUiAsset;

/* @var $this yii\web\View */
/* @var $model pd\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
JqueryUiAsset::register($this);
$opts = Json::htmlEncode([
    'menus'  => Menu::getMenuSource(),
    'routes' => Menu::getSavedRoutes(),
]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>
<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                        class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">表单</h4>
    </div>
    <div class="menu-form">
        <?php $form = ActiveForm::begin([
            'options'     => ['class' => 'form-horizontal form-bordered'],
            'fieldConfig' => [
                'template'     => "{label}\n<div class='col-md-6 col-sm-6'>{input}</div>\n{hint}\n{error}",
                'labelOptions' => ['class' => 'control-label col-md-4 col-sm-4'],
            ],
        ]); ?>
        <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
        <div class="row">
                <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

                <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>

                <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>

                <?= $form->field($model, 'order')->input('number') ?>

                <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4 col-sm-4"></label>
            <div class="col-md-6 col-sm-6">
                <?=
                Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
                    ? 'btn btn-success' : 'btn btn-primary'])
                ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
