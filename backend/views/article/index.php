<?php

use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
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
            <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
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
                    <input type="text" class="form-control" style="min-width: 103%;margin-right: 70px;" name="ArticleSearch[created_at]" id="daterangepicker" value="<?= $searchModel->created_at ?>" placeholder="创建时间">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="ArticleSearch[author]" id="author" value="<?= $searchModel->author ?>" placeholder="作者">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="ArticleSearch[title]" id="title" value="<?= $searchModel->title ?>" placeholder="标题">
                </div>
                <div class="form-group m-r-10">
                    <select class="form-control" name="ArticleSearch[status]" id="ArticleSearchStatus" style="min-width: 105%;">
                        <option value="" selected>全部</option>
                        <option value="1" <?= $searchModel->status == 1 && strlen($searchModel->status) ? 'selected' : '' ?>>正常</option>
                        <option value="0" <?= $searchModel->status == 0 && strlen($searchModel->status) ? 'selected' : '' ?>>禁用</option>
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
                    <th>标题</th>
                    <th>作者</th>
                    <th>栏目</th>
                    <th>浏览量</th>
                    <th>创建时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->title ?></td>
                        <td><?= $model->author ?></td>

                        <td><?= $model->column ? $model->column->name : '<span class="badge badge-warning">'. '未选择栏目'. '</span>' ?></span></td>
                        <td><?= $model->views ?></td>
                        <td><?= pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                        <td>
                            <?php switch ($model->status):?><?php case 1: ?>
                                <span class="badge badge-primary">显示</span>
                                <?php break;?><?php case 0: ?>
                                <span class="badge badge-danger">隐藏</span>
                                <?php break;?><?php default: ?>
                            <?php endswitch ?>
                        </td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['update', 'id'=> $model->id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs">编辑</span></a>
                                <a href="<?= Url::to(['delete', 'id'=> $model->id]) ?>" data-confirm="确认删除吗" data-method="post" data-pjax="0" ><span class="btn btn-danger m-r-1 m-b-5 btn-xs">删除</span></a>
                                <?php switch ($model->status):?><?php case 0: ?>
                                    <a href="<?= Url::to(['set-status', 'id'=> $model->id, 'opt'=> 1]) ?>" data-confirm="确认显示文章吗" data-method="post" data-pjax="0" ><span class="btn btn-danger m-r-1 m-b-5 btn-xs">显示</span></a>
                                    <?php break;?><?php case 1: ?>
                                    <a href="<?= Url::to(['set-status', 'id'=> $model->id, 'opt'=> 0]) ?>" data-confirm="确认隐藏文章吗" data-method="post" data-pjax="0" ><span class="btn btn-danger m-r-1 m-b-5 btn-xs">隐藏</span></a>
                                    <?php break;?><?php default: ?>
                                <?php endswitch ?>
                            </div>
                        </td>
                    </tr>
                    <!-- #modal-dialog -->
                    <div class="modal fade member-edit-modal" id="member-edit-modal-<?= $model->id ?>">

                    </div>
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

<?php


?>

