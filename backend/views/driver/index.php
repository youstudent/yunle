<?php

use backend\models\Member;
use backend\models\DrivingLicense;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '驾照列表';
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
        <?php if (Yii::$app->request->get('member_id')) {?>
            <?php if (Member::findOne(Yii::$app->request->get('member_id'))->type == 2) {?>
            <div class="col-md-6">
                <?= Html::a('添加', ['create', 'member_id'=> Yii::$app->request->get('member_id')], ['class' => 'btn btn-success']) ?>
            </div>
            <?php } elseif (Member::findOne(Yii::$app->request->get('member_id'))->type ==1 && DrivingLicense::find()->where(['member_id'=>Yii::$app->request->get('member_id')])->count() < 1) {?>
            <div class="col-md-6">
                <?= Html::a('添加', ['create', 'member_id'=> Yii::$app->request->get('member_id')], ['class' => 'btn btn-success']) ?>
            </div>
            <?} else {?>
            <div class="col-md-6">

            </div>
            <?php }?>
        <?} else {?>
        <div class="col-md-6">

        </div>
        <?php }?>
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
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>名字</th>
                    <th>性别</th>
                    <th>国籍</th>
                    <th>证件号</th>
                    <th>出生日期</th>
                    <th>领证日期</th>
                    <th>准驾车型</th>
                    <th>生效时间</th>
                    <th>失效时间</th>
                    <th>审核状态</th>
                    <th>上传时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->name ?></td>
                        <td><?= $model->sex ?></td>

                        <td><?= $model->nationality ?></td>
                        <td><?= $model->papers ?></td>
                        <td><?= $model->birthday ?></td>
                        <td><?= $model->certificate_at ?></td>
                        <td><?= $model->permit ?></td>
                        <td><?= $model->start_at ?></td>
                        <td><?= $model->end_at ?></td>
                        <td><?= $model->status ?></td>
                        <td><?= pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['update', 'id'=> $model->id]) ?>"><span class="btn btn-info m-r-1 m-b-5 btn-xs"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-edit"></use></svg> 编辑</span></a>
                                <a href="<?= Url::to(['delete', 'id'=> $model->id]) ?>" data-confirm="确认删除该驾照吗!" data-method="post" data-pjax="0">
                                    <span class="btn btn-danger m-r-1 m-b-5 btn-xs"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-close"></use></svg> 删除</span></a>
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

