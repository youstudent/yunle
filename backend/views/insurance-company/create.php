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
pd\coloradmin\web\plugins\BaiduMapAsset::register($this);
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
                <div class="panel-body">
                    <form action="<?= Url::to(["insurance-company/create"]) ?>" method="POST" data-parsley-validate="true"
                          name="form-wizard" enctype="multipart/form-data" id="service-form">
                        <div id="wizard">
                            <ol>
                            
                            </ol>
                            <!-- begin wizard step-1 -->
                            <div class="wizard-step-1">
                                <fieldset>
                                    <legend class="pull-left width-full">保险公司</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group block1">
                                                <label>保险公司名</label>
                                                <input type="text" name="InsuranceCompany[name]" placeholder="保险公司名"
                                                       class="form-control" data-parsley-group="wizard-step-1"
                                                       data-parsley-required data-parsley-pattern="[A-Za-z0-9_]{6,16}"/>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>简介</label>
                                                <textarea name="InsuranceCompany[brief]" cols="500" rows="4" placeholder="保险公司简介"
                                                class="form-control" data-parsley-group="wizard-step-1"
                                                data-parsley-required data-parsley-pattern="[A-Za-z0-9_]{6,16}"
                                                ></textarea>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <div>

                                <div class="jumbotron m-b-0 text-center">
                                    <h1>添加服务商成功</h1>
                                    <p> 一些提示信息 </p>
                                    <p><a class="btn btn-success ajax-post" data-toggle="modal"
                                          data-form-id="service-form" role="button">
                                            提交</a></p>
                                </div>
                            </div>
                            <!-- end wizard step-4 -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->

    </div>
    <!-- end row -->


</div>
<!-- begin modal -->
<div class="modal fade" id="modal-alert-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">重要提示</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> 确认添加!</h4>
                    <p>确认添加此服务商</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white " data-dismiss="modal">取消</a>
                <a href="javascript:;" class="btn btn-sm btn-danger ajax-post"
                   data-url="<?= Url::to(["insurance-company/create"]) ?>" data-id="modal-alert-confirm"
                   data-dismiss="modal">确认</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-alert-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">操作成功</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> 确认添加!</h4>
                    <p>确认添加此服务商</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary" data-dismiss="modal">确定</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-alert-error">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">操作失败</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> 确认添加!</h4>
                    <p>确认添加此服务商</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-primary" data-dismiss="modal">确定</a>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->



