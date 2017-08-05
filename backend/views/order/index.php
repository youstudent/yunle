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

$this->title = '订单列表';
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
            <?= Html::a('添加订单', ['create'], ['class' => 'btn btn-success']) ?>
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
                    <input type="text" class="form-control" name="OrderSearch[order_service]" id="service" value="<?= $searchModel->order_service ?>" placeholder="服务商">
                </div>
                <div class="form-group m-r-10">
                    <select class="form-control" name="OrderSearch[order_type]" id="OrderSearchType">
                        <option value="" selected>全部</option>
                        <option value="1" <?= $searchModel->order_type == 1 ? 'selected' : '' ?>>救援</option>
                        <option value="2" <?= $searchModel->order_type == 2 ? 'selected' : '' ?>>维修</option>
                        <option value="3" <?= $searchModel->order_type == 3 ? 'selected' : '' ?>>保养</option>
                        <option value="4" <?= $searchModel->order_type == 4 ? 'selected' : '' ?>>上线审车</option>
                        <option value="5" <?= $searchModel->order_type == 5 ? 'selected' : '' ?>>不上线审车</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>
                <button type="reset" class="btn btn-sm btn-info m-r-5" onclick="">重置</button>
            </form>

            <p></p>
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>订单号</th>
                    <th>订单类型</th>
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>车牌号</th>
                    <th>接车</th>
                    <th>价格</th>
                    <th>服务商</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->order->order_sn ?></td>
                        <td>
                            <?php switch ($model->order->type):?><?php case 1: ?>
                                    救援
                                <?php break;?><?php case 2: ?>
                                    维修
                                <?php break;?><?php case 3: ?>
                                    保养
                                <?php break;?><?php case 4: ?>
                                    上线审车
                                <?php break;?><?php case 5: ?>
                                    不上线审车
                                <?php break;?><?php default: ?>
                            <?php endswitch ?>
                        </td>
                        <td><?= $model->order->user ?></td>
                        <td><?= $model->order->phone ?></td>
                        <td><?= $model->order->car ?></td>
                        <td><?php if($model->order->pick == 1): ?>
                                <span>接车地点 <small><?= $model->order->pick_addr ?></small></span>
                                <span>接车时间 <small><?= $model->order->pick_at ?></small></span>
                            <?php  else: ?>
                                <span>不接车</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $model->order->cost ?></td>
                        <td><?= $model->order->service ?></td>
                        <td><?= $model->action ?></td>
                        <td><?= pd\helpers\Yii2Helpers::dateFormat($model->order->created_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="javascript:;" data-url="<?= Url::to(['log-modal', 'id'=> $model->id]) ?>" onclick="pokerDragon.modalAjax($(this))"><span class="btn btn-warning m-r-1 m-b-5 btn-xs">变更状态</span></a>
                                <a href="<?= Url::to(['log', 'id'=> $model->order_id]) ?>" data-toggle="modal" data-target="#_pd_modal"><span class="btn btn-info m-r-1 m-b-5 btn-xs">流程日志</span></a>
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

