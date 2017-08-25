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

$this->title = '会员详情';
$this->params['breadcrumbs'][] = $this->title;
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);

?>
<div class="service-create">

    <h1>会员详情</h1>

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
                            <td><?= $model->getAttributeLabel('phone') ?></td>
                            <td><?= $model->phone ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('type') ?></td>
                            <td>
                                <?php if($model->type == 0){
                                    echo '未选择';
                                }elseif($model->type == 1){
                                    echo '个人用户';
                                }else{
                                    echo '组织用户';
                                }
                                ?>
                            </td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('type') ?></td>
                            <td><?= $model->type ?></td>
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

