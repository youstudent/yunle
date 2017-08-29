<?php

use backend\models\Member;
use pd\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '业务员管理';
$this->params['breadcrumbs'][] = $this->title;

\pd\coloradmin\web\plugins\DaterangePickerAsset::register($this);

$this->registerJs(<<<JS
$('#daterangepicker').daterangepicker({
    "showDropdowns": true,
    "timePicker": true,
    "ranges": {
           '今日': [moment().startOf('day'), moment()],
            '昨日': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
            '最近7日': [moment().subtract(6, 'days'), moment()],
            '最近30日': [moment().subtract(29, 'days'), moment()],
            '本月': [moment().startOf("month"),moment().endOf("month")],
            '上个月': [moment().subtract(1,"month").startOf("month"),moment().subtract(1,"month").endOf("month")]
    },
    "autoUpdateInput": false,
    "locale": {
        "format": "YYYY-MM-DD HH:mm",
        "separator": " - ",
        "applyLabel": "确定",
        "cancelLabel": "清空",
        "fromLabel": "从",
        "toLabel": "到",
        "customRangeLabel": "自定义",
        "weekLabel": "周",
        "daysOfWeek": [
            "日",
            "一",
            "二",
            "三",
            "四",
            "五",
            "六"
        ],
        "monthNames": [
            "一月",
            "二月",
            "三月",
            "四月",
            "五月",
            "六月",
            "七月",
            "八月",
            "九月",
            "十月",
            "十一月",
            "十二月"
        ],
        "firstDay": 1
    },
    "linkedCalendars": false,
    "alwaysShowCalendars": true,
    "startDate": "2017-07-19",
});
$("#daterangepicker").on('apply.daterangepicker', function(ev, picker) {
  $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm') + ' + ' + picker.endDate.format('YYYY-MM-DD HH:mm'));
});
$("#daterangepicker").on('cancel.daterangepicker', function(ev, picker) {
  $(this).val('');
});
JS
);
?>
<div class="adminuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= Url::to(['create']) ?>" class="btn btn-success">添加业务员</a>
        </div>
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
            <h4 class="panel-title">表格</h4>
        </div>
        <div class="panel-body">
            <?= \pd\coloradmin\widgets\Alert::widget() ?>

            <form class="form-inline"  action="" method="GET">
                <div class="form-group m-r-15">
                    <input type="text" class="form-control" style="min-width: 103%;margin-right: 70px;" name="UserSearch[created_at]" id="daterangepicker" value="<?= $searchModel->created_at ?>" placeholder="创建时间">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="UserSearch[service_name]" id="service_name" value="<?= $searchModel->service_name ?>" placeholder="服务商名称">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="UserSearch[phone]" id="phone" value="<?= $searchModel->phone ?>" placeholder="手机号">
                </div>
                <div class="form-group m-r-10">
                    <select class="form-control" name="UserSearch[status]" id="MemberSearchStatus">
                        <option value="" selected>全部</option>
                        <option value="<?= Member::STATUS_ACTIVE ?>" <?= $searchModel->status == Member::STATUS_ACTIVE ? 'selected' : '' ?>>正常</option>
                        <option value="<?= Member::STATUS_INACTIVE ?>" <?= $searchModel->status == Member::STATUS_INACTIVE && strlen($searchModel->status) ? 'selected' : '' ?>>冻结</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>
                <button type="button" class="btn btn-sm btn-info m-r-5" onclick="">重置</button>
            </form>

            <p></p>
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>用户名</th>
                    <th>联系电话</th>
                    <th>状态</th>
                    <th>推荐码</th>
                    <th>服务商/代理商</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->username ?></td>
                        <td><?= $model->phone ?></td>
                        <td><?= $model->status == 1 ? '<span class="badge badge-info">正常</span>' : '<span class="badge badge-danger">冻结</span>' ?></td>
                        <td><?= $model->code ? $model->code->code : '<span class="badge badge-warning">'. '未设置'. '</span>' ?></span></td>
                        <td><?= $model->service ? $model->service->name : '<span class="badge badge-warning">'. '未设置'. '</span>' ?></span></td>
                        <td><?= \pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['salesman/view', 'id'=> $model->id]) ?>"><span class="btn btn-warning m-r-1 m-b-5 btn-xs"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-form"></svg> 信息</span></a>
                                <a href="<?= Url::to(['update', 'id'=> $model->id]) ?>"><span class="btn btn-warning m-r-1 m-b-5 btn-xs"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-edit"></svg> 编辑</span></a>
                                <a href="<?= Url::to(['member/index', 'MemberSearch[salesman_name]'=> $model->name ]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-31haoyou"></svg> 客户列表</span></a>
                                <a href="<?= Url::to(['order/index', 'id'=> $model->id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs">订单</span></a>
                                <a href="<?= Url::to(['insurance/index', 'id'=> $model->id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs">保险</span></a>
                                <?php if ($model->status == 1) { ?>
                                    <a href="<?= Url::to(['salesman/set-status', 'id' => $model->id, 'opt'=> 0]) ?>" title="冻结" aria-label="冻结" data-pjax="0" data-confirm="您确定要冻结此业务员吗？" data-method="post"><span
                                                class="btn btn-danger m-r-1 m-b-5 btn-xs">冻结</span></a>
                                <?php } else { ?>
                                    <a href="<?= Url::to(['salesman/set-status', 'id' => $model->id, 'opt'=> 1]) ?>" title="激活" aria-label="激活" data-pjax="0" data-confirm="您确定要激活此业务员吗？" data-method="post"><span
                                                class="btn btn-primary m-r-1 m-b-5 btn-xs">激活</span></a>
                                <?php } ?>
                                <a href="<?= Url::to(['delete', 'id'=> $model->id]) ?>" data-confirm="确认删除此业务员吗!" data-method="post" data-pjax="0">
                                    <span class="btn btn-danger m-r-1 m-b-5 btn-xs">删除</span></a>
                                <?php if(Helper::checkRoute("organization/account-app-modify-role")): ?>
                                    <a href="<?= Url::to(['organization/account-app-modify-role', 'id'=>$model->id]) ?>" data-toggle="modal" data-target="#_pd_modal" data-backdrop="static"><span class="btn btn-warning m-r-1 m-b-5 btn-xs">更改角色</span></a>
                                <?php endif; ?>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?= LinkPager::widget([
                'pagination'=>$dataProvider->getPagination(),
                'firstPageLabel'=> '首页',
                'lastPageLabel'=> '末页',
                'nextPageLabel'=> '前一页',
                'prevPageLabel'=> '后一页',
                'hideOnSinglePage' => false,
                'options' => [
                    'class' => 'pagination pull-right'
                ]
            ]) ?>
        </div>
    </div>
    <!-- end panel -->
</div>

