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

$this->title = '代理商管理';
$this->params['breadcrumbs'][] = $this->title;
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);

?>
<div class="service-create">

    <h1>代理商商详情</h1>
    <div class="row">
        <?php if(pd\admin\components\Helper::checkRoute('/account/modify-password')) : ?>
            <div class="col-md-6">
                <a href="<?= Url::to(['/account/modify-password']) ?>" class="btn btn-success" data-toggle="modal" data-target="#_pd_modal" data-backdrop="static" >修改密码</a>
            </div>
        <?php endif; ?>
    </div>
    <p></p>
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
                            <td><?= $model->getAttributeLabel('owner_username') ?></td>
                            <td><?= $model->owner_username ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('name') ?></td>
                            <td><?= $model->name ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('principal') ?></td>
                            <td><?= $model->principal ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('principal_phone') ?></td>
                            <td><?= $model->contact_phone ?></td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td>代理商附件</td>
                            <td>
                                <?php if($model->serviceImg) : ?>
                                    <?php foreach($model->serviceImg as $img) : ?>
                                        <?php if($img->type == 0): ?>
                                            <div href="" class="thumbnail">
                                                <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><span class="text-muted"></span></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('sid') ?></td>
                            <td><?= Adminuser::findOne([$model->sid])->name ?></td>
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

