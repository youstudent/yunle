<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午1:54
 *
 */


use common\models\ServiceTag;

$this->title = '账号信息';

/* @var $model backend\models\Service */

?>


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
                <td  width="30%">主账号</td>
                <td><?= $model->account->username ?></td>
            </tr>

            <tr>
                <td>名称</td>
                <td><?= $model->name ?></td>

            </tr>
            <tr>
                <td>负责人</td>
                <td><?= $model->principal ?></td>
            </tr>
            <tr>
                <td>联系方式</td>
                <td><?= $model->principal_phone ?></td>
            </tr>
            <tr>
                <td>客服电话</td>
                <td><?= $model->contact_phone ?></td>
            </tr>
            <tr>
                <td>展示头像</td>
                <td><?= $model->name ?></td>
            </tr>
            <tr>
                <td>服务商附件</td>
                <td><?= $model->name ?>o</td>
            </tr>
            <tr>
                <td>位置</td>
                <td><?= $model->address ?></td>
            </tr>
            <tr>
                <td>服务范畴</td>
                <td><?php
                    $tags = ServiceTag::getTag($model->id);
                    if($tags){
                        echo implode($tags, "|");
                    }
                    ?></td>
            </tr>
            <tr>
                <td>客户经理</td>
                <td><?= $model->platform->name ?></td>
            </tr>            <tr>
                <td>评分星级</td>
                <td><?= $model->level ?> 星</td>
            </tr>
            </tbody>
        </table>
        <div>
            <dl>
                <dt>简介</dt>
                <dd><?=  $model->introduction ?></dd>
            </dl>
        </div>
    </div>
</div>
<!-- end panel -->