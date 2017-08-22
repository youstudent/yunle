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

$this->title = '保单列表';
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
        <?= \pd\coloradmin\widgets\Alert::widget() ?>
        <div class="panel-body">
            <form class="form-inline"  action="" method="GET">
                <div class="form-group m-r-15">
                    <input type="text" class="form-control" style="min-width: 103%;margin-right: 70px;" name="OrderSearch[order_created_at]" id="daterangepicker" value="<?= $searchModel->order_created_at ?>" placeholder="创建时间">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="OrderSearch[order_user]" id="user" value="<?= $searchModel->order_user ?>" placeholder="联系人">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="OrderSearch[order_phone]" id="phone" value="<?= $searchModel->order_phone ?>" placeholder="联系电话">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="OrderSearch[order_car]" id="phone" value="<?= $searchModel->order_car ?>" placeholder="车牌号">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="OrderSearch[order_company]" id="company" value="<?= $searchModel->order_company ?>" placeholder="承保公司">
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>
                <button type="reset" class="btn btn-sm btn-info m-r-5" onclick="">重置</button>
            </form>

            <p></p>
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>订单号</th>
                    <th>投保人</th>
                    <th>性别</th>
                    <th>民族</th>
                    <th>身份证号</th>
                    <th>联系电话</th>
                    <th>车牌号</th>
                    <th>承保公司</th>
                    <th>价格</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->insuranceOrder->order_sn ?></td>
                        <td><?= $model->insuranceOrder->user ?></td>
                        <td><?= $model->insuranceOrder->sex ?></td>
                        <td><?= $model->insuranceOrder->nation ?></td>
                        <td><?= $model->insuranceOrder->licence ?></td>
                        <td><?= $model->insuranceOrder->phone ?></td>
                        <td><?= $model->insuranceOrder->car ?></td>
                        <td><?= $model->insuranceOrder->company ?></td>
                        <td><?= $model->insuranceOrder->cost ?></td>
                        <td>未起保</td>
                        <td><?= pd\helpers\Yii2Helpers::dateFormat($model->insuranceOrder->created_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['detail', 'id'=> $model->order_id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs">保单详情</span></a>
                                <a href="<?= Url::to(['edit', 'id'=> $model->order_id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs">修改</span></a>
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

<?php


?>

