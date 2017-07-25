<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\helpers\Url;

/* @var $this yii\web\view */
/* @var $model backend\models\form\MemberForm */

$this->title = '添加业务员';
$this->params['breadcrumbs'][] = ['label' => '会员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="member-create">
    <h1>添加业务员</h1>

    <div class="member-form">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                               data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                               data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">表单</h4>
                    </div>
                    <div class="panel-body panel-form">
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" name="UserForm" id="UserForm" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="UserFormUsername"><?= $model->getAttributeLabel('username') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="UserFormUsername" name="UserForm[username]" value="<?= $model->username ?>" placeholder="用户名" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="service">选择服务商 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control"  id="MemberService" name="UserForm[pid]" value="<?= $model->pid ?>" placeholder="服务商" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="UserFormPhone"><?= $model->getAttributeLabel('phone') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="UserFormPhone" name="UserForm[phone]" value="<?= $model->phone ?>" placeholder="手机号" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="UserFormPassword"><?= $model->getAttributeLabel('password') ?> * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="UserFormPassword" name="UserForm[password]" value="<?= $model->password ?>" placeholder="登录密码" data-parsley-required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="status">用户类型 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="UserForm[status]" id="UserFormStatus">
                                        <option value="1" <?= $model->status == 1 ? 'selected' : '' ?>>正常</option>
                                        <option value="0" <?= $model->status == 0 && strlen($model->status) == 1 ? 'selected' : '' ?>>冻结</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4"></label>
                                <div class="col-md-6 col-sm-6">
                                    <a class="btn btn-primary ajax-post" data-toggle="modal"
                                       data-form-id="UserForm" role="button">
                                        提交</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->

</div>


