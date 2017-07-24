<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = '服务商-添加';
$this->params['breadcrumbs'][] = ['label' => '服务商', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-create">

    <h1>添加服务商</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
