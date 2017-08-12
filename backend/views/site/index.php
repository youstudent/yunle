<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/25 - 下午5:41
 *
 */
?>
    <!-- begin page-header -->
    <h1 class="page-header">面板 <small>统计信息...</small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-4">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>待审车订单</h4>
                    <p><?= $model['orderCount']['afterCheckCar']?></p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">查看详情 <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-4">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                <div class="stats-info">
                    <h4>待核保订单</h4>
                    <p><?= $model['orderCount']['afterSuccess']?></p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">查看详情 <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-4">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>核保成功订单</h4>
                    <p><?= $model['orderCount']['success']?></p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">查看详情 <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-4">
            <div class="widget widget-stats bg-black">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>待审核订单</h4>
                    <p><?= $model['orderCount']['afterStatusChange']?></p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">查看详情 <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-8">
            <div class="widget widget-stats bg-black">
                <p>公告1</p>
                <p>公告2</p>
                <p>公告3</p>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">


        <!-- end col-3 -->
        <div class="col-md-3 col-sm-6">

        </div>
        <div class="col-md-12 col-sm-6">
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">用户增长</h4>
                </div>
                <div class="panel-body">
                    <div id="memebrAdd" style="height: 250px;"></div>
                </div>
            </div>
            <div class="panel panel-inverse" data-sortable-id="index-2">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">订单增长</h4>
                </div>
                <div class="panel-body">
                    <div id="orderAdd" style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>
<?php
\pd\coloradmin\web\plugins\MorrisAsset::register($this);
$opts =0;
$this->registerJs("var aaa = {$opts};");

$this->registerJs(<<<JS
var memberAdd = Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'memebrAdd',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { days: '6天前', a: 20 , b:10, c:15 },
    { days: '5天前', a: 10 , b:20, c:5 },
    { days: '4天前', a: 5 , b:10, c:25 },
    { days: '3天前', a: 10 , b:20, c:5 },
    { days: '2天前', a: 20 , b:10, c:15 },
    { days: '1天前', a: 20 , b:10, c:15 },
    { days: '今天', a: 20 , b:10, c:15 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'days',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['a', 'b', 'c'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['会员', '服务商', '代理商']
});
var orderrAdd = new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'orderAdd',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2017', a: 20 , b:10, c:15, d:18, e:30},
    { year: '2018', a: 10 , b:20, c:5, d:25, e:18},
    { year: '2019', a: 5 , b:10, c:25, d:18, e:15},
    { year: '2020', a: 10 , b:20, c:5, d:25, e:18},
    { year: '2021', a: 20 , b:10, c:15, d:18, e:5}
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['a', 'b', 'c', 'd', 'e'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['救援', '维修', '保养', '审车', '保险']
});
JS
);