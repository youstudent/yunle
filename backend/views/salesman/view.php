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

$this->title = '业务员详情';
$this->params['breadcrumbs'][] = $this->title;
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);

?>
<div class="service-create">

    <h1>业务员详情</h1>

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
                        <tr>
                            <td><?= $model->getAttributeLabel('username') ?></td>
                            <td><?= $model->username ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('name') ?></td>
                            <td><?= $model->name ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('pid') ?></td>
                            <td><?= $model->pid && backend\models\Service::findOne($model->pid) ? backend\models\Service::findOne($model->pid)->name : '未设置'   ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('phone') ?></td>
                            <td><?= $model->phone ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('system_switch') ?></td>
                            <td><?= $model->system_switch == 1 ? '<span class="badge badge-info">开启</span>' : '<span class="badge badge-danger">关闭</span>' ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('check_switch') ?></td>
                            <td><?= $model->check_switch == 1 ? '<span class="badge badge-info">开启</span>' : '<span class="badge badge-danger">关闭</span>' ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('status') ?></td>
                            <td><?= $model->status == 1 ? '<span class="badge badge-info">正常</span>' : '<span class="badge badge-danger">冻结</span>' ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('created_at') ?></td>
                            <td><?= \pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>

