<?php

use backend\models\Adminuser;
use backend\models\AppRole;
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
                            <td><?= $model->getAttributeLabel('name') ?></td>
                            <td><?= $model->name ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('phone') ?></td>
                            <td><?= $model->phone ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('licence') ?></td>
                            <td><?= $model->licence ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td>头像</td>
                            <td>
                                <?php if($model->userImg) : ?>
                                    <?php foreach($model->userImg as $img) : ?>
                                        <?php if($img->type == 1): ?>
                                            <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td>附件</td>
                            <td>
                                <?php if($model->userImg) : ?>
                                    <?php foreach($model->userImg as $img) : ?>
                                        <?php if($img->type == 0): ?>
                                            <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('pid') ?></td>
                            <td><?= $model->pid && backend\models\Service::findOne($model->pid) ? backend\models\Service::findOne($model->pid)->name : '未设置'   ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <?php $role_id = \backend\models\AppRoleAssign::findOne(['user_id'=>$model->id]);
                            if($role_id){
                                $role = AppRole::findOne(['service_id'=>$model->pid, 'id'=>$role_id]);
                            }
                        ?>
                        <tr>
                            <td><?= $model->getAttributeLabel('role_id') ?></td>
                            <td><?= $role ? $role->name : '未设置'   ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>

                        <tr>
                            <td><?= $model->getAttributeLabel('level') ?></td>
                            <td><?= $model->level ?> 星</td>
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

