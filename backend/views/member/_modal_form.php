<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 上午10:08
 *
 */
use yii\helpers\Url;

/* var $model backend\models\form\MemberForm */

?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">编辑会员信息</h4>
        </div>
        <form class="form-horizontal form-bordered" data-parsley-validate="true"
              action="<?= Url::to(['member/update', 'id' => $model->id]) ?>" name="MemberForm" id="MemberForm-<?= $model->id ?>"
              method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4"
                           for="MemberPhone"><?= $model->getAttributeLabel('phone') ?> * :</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" id="MemberPhone" name="MemberForm[phone]"
                               value="<?= $model->phone ?>" placeholder="手机号" data-parsley-required="true"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="type">用户类型 * :</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="MemberForm[type]" id="MemberType">
                            <option value="1" selected>个人</option>
                            <option value="2" <?= $model->type == 2 ? 'selected' : '' ?>>组织</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="service">选择服务商 * :</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" id="MemberService" name="MemberForm[service]" value="1"
                               placeholder="服务商"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="salesman">选择业务员 * :</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" id="MemberSalesman" name="MemberForm[salesman]" value="1"
                               placeholder="业务员"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="status">用户类型 * :</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="MemberForm[status]" id="MemberStatus">
                            <option value="1" <?= $model->status == 1 ? 'selected' : '' ?>>正常</option>
                            <option value="0" <?= $model->status == 0 && strlen($model->status) == 1 ? 'selected' : '' ?>>
                                冻结
                            </option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
                <a href="javascript:;" class="btn btn-sm btn-success ajax-post" data-dismiss="modal" data-form-id="MemberForm-<?= $model->id ?>">更新</a>
            </div>
        </form>
    </div>
</div>
