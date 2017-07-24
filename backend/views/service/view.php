<?php

use pd\coloradmin\web\plugins\EditableAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = '服务商详情';
$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

EditableAsset::register($this);
$this->registerJs($this->render('_view.js'));
?>
<div class="service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Form Editable</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="service-view" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>字段名</th>
                        <th>值</th>
                        <th>描述</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $model->getAttributeLabel('name') ?></td>
                        <td><a href="#" id="name" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username" data-url="<?= Url::to(['service/update-field', 'id'=>$model->id, 'field'=>'name']) ?>"><?= $model->name ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('principal') ?></td>
                        <td><a href="#" id="principal" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->principal ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('contact_phone') ?></td>
                        <td><a href="#" id="contact_phone" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->contact_phone ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('introduction') ?></td>
                        <td><a href="#" id="introduction" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->introduction ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('address') ?></td>
                        <td><a href="#" id="address" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->address ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('lat') ?></td>
                        <td><a href="#" id="lat" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->lat ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('lon') ?></td>
                        <td><a href="#" id="name" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->lon ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('level') ?></td>
                        <td><a href="#" id="level" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->level ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('status') ?></td>
                        <td><a href="#" id="status" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->status ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('created_at') ?></td>
                        <td><a href="#" id="created_at" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->created_at ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    <tr>
                        <td><?= $model->getAttributeLabel('updated_at') ?></td>
                        <td><a href="#" id="updated_at" data-type="text" data-pk="<?= $model->id ?>" data-title="Enter Username"><?= $model->updated_at ?> </a></td>
                        <td><span class="text-muted">Simple text field </span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end panel -->

</div>
