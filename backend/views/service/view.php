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

$this->title = '服务商详情';
$this->params['breadcrumbs'][] = $this->title;
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);

?>
<div class="service-create">

    <h1>服务商详情</h1>

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
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $model->getAttributeLabel('owner_username') ?></td>
                            <td><?= $model->owner_username ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('name') ?></td>
                            <td><?= $model->name ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('principal') ?></td>
                            <td><?= $model->principal ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('contact_phone') ?></td>
                            <td><?= $model->contact_phone ?></td>
                        </tr>
                        <tr>
                            <td>展示头像</td>
                            <td>
                                <?php if($model->serviceImg) : ?>
                                    <?php foreach($model->serviceImg as $img) : ?>
                                        <?php if($img->type == 1): ?>
                                            <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>服务商附件</td>
                            <td>
                                <?php if($model->serviceImg) : ?>
                                    <?php foreach($model->serviceImg as $img) : ?>
                                        <?php if($img->type == 0): ?>
                                            <img src="<?php echo Yii::$app->params['img_domain']. $img->thumb; ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('address') ?></td>
                            <td><?= $model->address ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('lat') ?></td>
                            <td><?= $model->lat ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('lng') ?></td>
                            <td><?= $model->lng ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('level') ?></td>
                            <td> <?= $model->level ?> 星</td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('sid') ?></td>
                            <td><?= Adminuser::findOne([$model->sid])->name ?></td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('introduction') ?></td>
                            <td>
                               <?php echo $model->introduction; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $model->getAttributeLabel('tags') ?></td>
                            <td>
                                <?php foreach (\common\models\ServiceTag::findAll(['service_id'=>$model->id]) as $v) {?>
                                    <span><?= \common\models\Tag::findOne($v->tag_id)->name ?></span> |
                                <?php }?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
</div>

