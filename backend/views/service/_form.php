<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */
/* @var $form yii\widgets\ActiveForm */

pd\coloradmin\web\plugins\ParsleyAsset::register($this);
pd\coloradmin\web\plugins\WizardAsset::register($this);
pd\coloradmin\web\plugins\JqueryFileUploadAsset::register($this);
$this->registerJs($this->render('_script.js'), \yii\web\View::POS_HEAD);
$this->registerJs('
//FormWizardValidation.init();
', \yii\web\View::POS_READY);
?>

<div class="adminuser-form">

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">表单</h4>
                </div>
                <div class="panel-body">
                    <form action="<?= Url::to(['service/create']) ?>">
                        <p><a class="btn btn-success btn-lg ajax-post" href="javascript:;" role="button"  data-ajax="1" data-url="<?= Url::to(['service/create']) ?>"  data-method="post">
                    </form>
<!--                    <form action="--><?//= Url::to(['service/create']) ?><!--" method="POST" data-parsley-validate="true" name="form-wizard" enctype="multipart/form-data">-->
<!---->
<!--                        <div id="wizard">-->
<!--                            <ol>-->
<!--                                <li>-->
<!--                                    基本信息-->
<!--                                    <small>在这里填写一些账号信息.</small>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    高级信息-->
<!--                                    <small></small>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    扩展信息-->
<!--                                    <small></small>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    后续-->
<!--                                    <small>.</small>-->
<!--                                </li>-->
<!--                            </ol>-->
<!--                            <!-- begin wizard step-1 -->-->
<!--                            <div class="wizard-step-1">-->
<!--                                <fieldset>-->
<!--                                    <legend class="pull-left width-full">账户信息</legend>-->
<!---->
<!--                                        <!-- begin col-4 -->-->
<!--                                        <div class="col-md-4">-->
<!--                                            <div class="form-group block1">-->
<!--                                                <label>用户名</label>-->
<!--                                                <input type="text" name="username" placeholder="用户名.格式为6-16位字母或者数字" class="form-control" data-parsley-group="wizard-step-1" data-parsley-required data-parsley-pattern="[A-Za-z0-9_\-\u4e00-\u9fa5]{6,16}" />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-4 -->-->
<!--                                        <!-- begin col-4 -->-->
<!--                                        <div class="col-md-4">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>密码</label>-->
<!--                                                <input type="text" name="password" placeholder="密码.格式为6-16位字母或者数字" class="form-control" data-parsley-group="wizard-step-1" data-parsley-required data-parsley-pattern="[A-Za-z0-9_\-\u4e00-\u9fa5]{6,16}" />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-4 -->-->
<!--                                        <!-- begin col-4 -->-->
<!--                                        <div class="col-md-4">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>重复输入密码</label>-->
<!--                                                <input type="text" name="re_password" placeholder="重复输入密码" class="form-control" data-parsley-group="wizard-step-1" data-parsley-required  data-parsley-re-password="password" />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    <!-- end row -->-->
<!--                                </fieldset>-->
<!--                            </div>-->
<!--                            <!-- end wizard step-1 -->-->
<!--                            <!-- begin wizard step-2 -->-->
<!--                            <div class="wizard-step-2">-->
<!--                                <fieldset>-->
<!--                                    <legend class="pull-left width-full">高级信息</legend>-->
<!--                                    <!-- begin row -->-->
<!--                                    <div class="row">-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>服务商名字</label>-->
<!--                                                <input type="text" name="name" placeholder="" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>负责人名称</label>-->
<!--                                                <input type="text" name="principal" placeholder="" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>客服电话</label>-->
<!--                                                <input type="text" name="contact_phone" placeholder="" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>服务商头像</label>-->
<!--                                                <input type="text" id="fileupload" name="file" placeholder="" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>服务商附件</label>-->
<!--                                                <input type="text" name="file" placeholder="someone@example.com" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>简介</label>-->
<!--                                                <input type="text" name="introduction" placeholder="someone@example.com" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                        <!-- begin col-6 -->-->
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>位置</label>-->
<!--                                                <input type="text" name="address" placeholder="someone@example.com" class="form-control" data-parsley-group="wizard-step-2" required />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                    </div>-->
<!--                                    <!-- end row -->-->
<!--                                </fieldset>-->
<!--                            </div>-->
<!--                            <!-- end wizard step-2 -->-->
<!--                            <!-- begin wizard step-3 -->-->
<!--                            <div class="wizard-step-3">-->
<!--                                <fieldset>-->
<!--                                    <legend class="pull-left width-full">Login</legend>-->
<!--                                    <!-- begin row -->-->
<!--                                    <div class="row">-->
<!--                                        <!-- begin col-4 -->-->
<!--                                        <div class="col-md-4">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>服务范畴</label>-->
<!--                                                <div class="controls">-->
<!--                                                    <input type="text" name="username" placeholder="johnsmithy" class="form-control" data-parsley-group="wizard-step-3" required />-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-4 -->-->
<!--                                        <!-- begin col-4 -->-->
<!--                                        <div class="col-md-4">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>客户经理</label>-->
<!--                                                <div class="controls">-->
<!--                                                    <input type="text" name="password" placeholder="Your password" class="form-control" data-parsley-group="wizard-step-3" required />-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-4 -->-->
<!--                                        <!-- begin col-4 -->-->
<!--                                        <div class="col-md-4">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>评分星级</label>-->
<!--                                                <div class="controls">-->
<!--                                                    <input type="text" name="password2" placeholder="Confirmed password" class="form-control" />-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- end col-6 -->-->
<!--                                    </div>-->
<!--                                    <!-- end row -->-->
<!--                                </fieldset>-->
<!--                            </div>-->
<!--                            <!-- end wizard step-3 -->-->
<!--                            <!-- begin wizard step-4 -->-->
<!--                            <div>-->
<!--                                <div class="jumbotron m-b-0 text-center">-->
<!--                                    <h1>服务商成功</h1>-->
<!--                                    <p> 一些提示信息 </p>-->
<!--                                    <p><a class="btn btn-success btn-lg" role="button"  data-pd-ajax="1" data-url="" data-method="post">-->
<!--                                        提交</a></p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!-- end wizard step-4 -->-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->

</div>
