<?php

use backend\models\Adminuser;
use common\components\Helper;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $adminUserModel backend\models\Adminuser */
/* @var $model backend\models\form\ServiceForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = '实名认证详情';
$this->params['breadcrumbs'][] = $this->title;
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);

?>
<div class="service-create">

    <h1>实名认证详情</h1>

    <div class="adminuser-form">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">详情</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="user" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($model->name):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('name') ?></td>
                            <td><?= $model->name ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <?php if ($model->sex):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('sex') ?></td>
                            <td><?= $model->sex ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <?php if ($model->nation):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('nation') ?></td>
                            <td><?= $model->nation ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <?php if ($model->birthday):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('birthday') ?></td>
                            <td><?= $model->birthday ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <?php if ($model->licence):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('licence') ?></td>
                            <td><?= $model->licence ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <?php if ($model->start_at):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('start_at') ?></td>
                            <td><?= $model->start_at ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <?php if ($model->end_at):?>
                        <tr>
                            <td><?= $model->getAttributeLabel('end_at') ?></td>
                            <td><?= $model->end_at ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        <tr>
                            <td><?= $model->getAttributeLabel('status') ?></td>
                            <td><?= $model->status == 1 ? '已认证' : '未认证' ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php if ($model->pic):?>
                        <tr>
                            <td>附件</td>
                            <td>
                                <?php foreach($model->pic as $img) : ?>
                                    <img src="<?= Yii::$app->params['img_domain']. $img->thumb ?>">
                                <?php endforeach; ?>
                            </td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>

