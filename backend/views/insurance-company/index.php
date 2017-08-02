<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\Adminuser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '保险商管理';
$this->params['breadcrumbs'][] = $this->title;

\pd\coloradmin\web\plugins\DaterangePickerAsset::register($this);

$this->registerJs(<<<JS
$('#demo').daterangepicker({
    "showDropdowns": true,
    "timePicker": true,
    "ranges": {
        "今天": [
            "2017-07-19T02:31:43.705Z",
            "2017-07-19T02:31:43.705Z"
        ],
        "昨天": [
            "2017-07-18T02:31:43.705Z",
            "2017-07-18T02:31:43.705Z"
        ],
        "本周": [
            "2017-07-13T02:31:43.705Z",
            "2017-07-19T02:31:43.705Z"
        ],
        "上周": [
            "2017-06-20T02:31:43.705Z",
            "2017-07-19T02:31:43.705Z"
        ],
        "本月": [
            "2017-06-30T16:00:00.000Z",
            "2017-07-31T15:59:59.999Z"
        ],
        "上月": [
            "2017-05-31T16:00:00.000Z",
            "2017-06-30T15:59:59.999Z"
        ]
    },
    "locale": {
        "format": "YYYY-MM-DD HH:mm",
        "separator": " - ",
        "applyLabel": "确定",
        "cancelLabel": "取消",
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
}, function(start, end, label) {
    console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});

JS
);
?>
<div class="adminuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= Url::to(['create']) ?>" class="btn btn-success" data-toggle="modal" data-target="#_form-modal" data-backdrop="static" >新增</a>
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
           <!-- <form class="form-inline"  action="" method="GET">
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="ServiceSearch[created_at]" id="demo" value="<?/*= $searchModel->created_at */?>" placeholder="创建时间">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="ServiceSearch[name]" id="exampleInputPassword2" value="<?/*= $searchModel->name */?>" placeholder="服务商">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="ServiceSearch[principal]" id="exampleInputPassword2" value="<?/*= $searchModel->principal */?>" placeholder="负责人">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" name="ServiceSearch[principal]" id="exampleInputPassword2" value="<?/*= $searchModel->principal */?>" placeholder="客户经理">
                </div>
                <div class="form-group m-r-10">
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="状态">
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>
                <button type="button" class="btn btn-sm btn-info m-r-5" onclick="">重置</button>
            </form>-->

            <p></p>
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">保险商名称</th>
                    <th class="text-center">简介</th>
                    <th class="text-center">创建时间</th>
                    <th class="text-center">修改时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data->getModels()  as $index => $model): ?>
                    <tr class="">
                        <td class="text-center"><?= \pd\helpers\Yii2Helpers::serialColumn($data, $index) ?></td>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $model->brief?></td>
                        <td class="text-center"><?= \pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                        <td class="text-center"><?= \pd\helpers\Yii2Helpers::dateFormat($model->updated_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['insurance-company/update', 'id'=> $model->id]) ?>" data-toggle="modal" data-target="#_form-modal" data-backdrop="static"><span class="btn btn-warning m-r-1 m-b-5 btn-xs">编辑</span></a>
                                <a href="javasrcitp:;" data-confirm="确认删除此会员？" data-url="<?= Url::to(['insurance-company/delete', 'id' => $model->id]) ?>"  data-method="post" ><span class="btn btn-danger m-r-1 m-b-5 btn-xs">删除</span></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?= LinkPager::widget([
                'pagination'=>$data->getPagination(),
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
