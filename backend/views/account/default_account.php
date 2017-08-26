<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午1:54
 *
 */


use common\models\ServiceTag;
use yii\helpers\Url;

$this->title = '账号信息';

/* @var $model backend\models\Adminuser */

?>

<div class="info">
    <div class="row">
        <?php if(pd\admin\components\Helper::checkRoute('/account/modify-password')) : ?>
        <div class="col-md-6">
            <a href="<?= Url::to(['/account/modify-password']) ?>" class="btn btn-success" data-toggle="modal" data-target="#_pd_modal" data-backdrop="static" >修改密码</a>
        </div>
        <?php endif; ?>
    </div>
    <p></p>
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">账户信息</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td  width="30%">登录账号</td>
                    <td><?= $model->username ?></td>
                </tr>
                <tr>
                    <td  width="30%">使用者姓名</td>
                    <td><?= $model->name ?></td>
                </tr>
                <tr>
                    <td>角色</td>
                    <td><?= $role ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->

</div>
