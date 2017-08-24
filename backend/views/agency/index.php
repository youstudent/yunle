<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\Adminuser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理商管理';
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
  $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm') + ' - ' + picker.endDate.format('YYYY-MM-DD HH:mm'));
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
            <a href="<?= Url::to(['create']) ?>" class="btn btn-success">添加代理商</a>
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
            <!-- begin alert-widget -->
            <?= \pd\coloradmin\widgets\Alert::widget() ?>
            <!-- end alert-widget -->
            <?php $form = \yii\bootstrap\ActiveForm::begin([
                'id'                   => $searchModel->formName(),
                'method' => 'get',
                'layout'               => 'inline',
                'fieldConfig'          => [
                    'template'             => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label'   => 'control-label col-md-4 col-sm-4',
                        'offset'  => '',
                        'wrapper' => 'col-md-6 col-sm-6',
                        'error'   => '',
                        'hint'    => '',
                    ],
                ],
            ]) ?>

            <div class="form-group m-r-10">
                <input type="text" class="form-control" name="ServiceSearch[created_at]" id="daterangepicker" value="<?= $searchModel->created_at ?>" placeholder="创建时间">
            </div>


            <?= $form->field($searchModel, 'name')->textInput(['placeholder'=> '代理商名称']); ?>

            <?= $form->field($searchModel, 'principal')->textInput(['placeholder'=> '负责人姓名']); ?>

            <?= $form->field($searchModel, 'principal_phone')->textInput(['placeholder'=> '负责人联系电话']); ?>

            <?php if(\mdm\admin\components\Helper::checkRoute('/abs-route/get-customer-manager')) : ?>
                <?= $form->field($searchModel, 'sid')->dropDownList(
                    \backend\models\Adminuser::getCustomerManager(),
                    ['prompt'=> '选择客户经理']
                ); ?>
            <?php endif; ?>


            <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>
                            <button type="button" class="btn btn-sm btn-info m-r-5" onclick="">重置</button>

            <?php yii\bootstrap\ActiveForm::end() ?>

            <p></p>
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>代理商名称</th>
                    <th>负责人</th>
                    <th>负责人电话</th>
                    <th>客户经理</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->name ?></td>
                        <td><?= $model->principal ?></td>
                        <td><?= $model->principal_phone ?></td>
                        <td><?= $model->sid && backend\models\Adminuser::findOne($model->sid) ? backend\models\Adminuser::findOne($model->sid)->name : '未设置' ?></td>
                        <td><?= $model->status == 1 ? '<span class="badge badge-info">正常</span>' : '<span class="badge badge-danger">冻结</span>' ?></td>
                        <td><?= \pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['view', 'id'=>$model->id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs">更多</span></a>
<!--                                <a href="--><?//= Url::to(['order/index', 'OrderSearch[order_service]'=> $model->name]) ?><!--"><span class="btn btn-info m-r-1 m-b-5 btn-xs">订单</span></a>-->
<!--                                <a href="--><?//= Url::to(['insurance-order/index','OrderSearch[order_service]'=> $model->name]) ?><!--"><span class="btn btn-info m-r-1 m-b-5 btn-xs">保险</span></a>-->
                                <a href="<?= Url::to(['update', 'id'=> $model->id]) ?>"><span class="btn btn-warning m-r-1 m-b-5 btn-xs">编辑</span></a>
                                <a href="<?= Url::to(['salesman/index', 'id'=> $model->id]) ?>"><span class="btn btn-warning m-r-1 m-b-5 btn-xs">业务员</span></a>
<!--                                <a href="--><?//= Url::to(['service/delete', 'id' => $model->id]) ?><!--" data-confirm="确认删除此数据?" data-method="post" ><span class="btn btn-danger m-r-1 m-b-5 btn-xs">删除</span></a>-->
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
