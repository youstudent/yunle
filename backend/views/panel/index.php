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
        <?php if(pd\admin\components\Helper::checkRoute('/abs-route/panel-get-wait-check-car-order')) : ?>
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
        <?php endif;?>
        <?php if(pd\admin\components\Helper::checkRoute('/abs-route/panel-get-wait-check-insurance-order')) : ?>
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
        <?php endif;?>
        <?php if(pd\admin\components\Helper::checkRoute('/abs-route/panel-get-wait-check-insurance-order-success')) : ?>
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
        <?php endif;?>
        <?php if(pd\admin\components\Helper::checkRoute('/abs-route/panel-get-wait-check-order')) : ?>
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
        <?php endif;?>
        <?php if(pd\admin\components\Helper::checkRoute('/abs-route/panel-get-notice')) : ?>
            <!-- begin col-3 -->
            <div class="col-md-8">
                <div class="widget widget-stats bg-black">
                    <p>公告1</p>
                    <p>公告2</p>
                    <p>公告3</p>
                </div>
            </div>
            <!-- end col-3 -->
        <?php endif; ?>
    </div>
    <!-- end row -->
    <div class="row">
        <!-- end col-3 -->
        <div class="col-md-3 col-sm-6">

        </div>
        <div class="col-md-12 col-sm-6">
            <?php if(pd\admin\components\Helper::checkRoute('/panel/user-add')) : ?>
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
            <?php endif; ?>
            <?php if(pd\admin\components\Helper::checkRoute('/panel/order-add')) : ?>
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
            <?php endif; ?>
        </div>
    </div>
<?php
\pd\coloradmin\web\plugins\MorrisAsset::register($this);

$this->registerJs(<<<JS
$(function() {
    $.ajax({
        url: '/site/stat',
        type: 'get',
        dataType: 'json',
        data: {days:7},
        success: function (res) {
            if (res.code == 1) {
                var memberAdd = Morris.Line({
                // ID of the element in which to draw the chart.
                    element: 'memebrAdd',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.   
                    data: [
                        { day:res.data.xTime.one, a:res.data.people.memberSeven.memberCount1, b:res.data.people.serviceSeven.serviceCount1, c:res.data.people.agencySeven.agencyCount1 },
                        { day:res.data.xTime.two, a:res.data.people.memberSeven.memberCount2, b:res.data.people.serviceSeven.serviceCount2, c:res.data.people.agencySeven.agencyCount2 },
                        { day:res.data.xTime.three, a:res.data.people.memberSeven.memberCount3, b:res.data.people.serviceSeven.serviceCount3, c:res.data.people.agencySeven.agencyCount3 },
                        { day:res.data.xTime.four, a:res.data.people.memberSeven.memberCount4, b:res.data.people.serviceSeven.serviceCount4, c:res.data.people.agencySeven.agencyCount4 },
                        { day:res.data.xTime.five, a:res.data.people.memberSeven.memberCount5, b:res.data.people.serviceSeven.serviceCount5, c:res.data.people.agencySeven.agencyCount5 },
                        { day:res.data.xTime.six, a:res.data.people.memberSeven.memberCount6, b:res.data.people.serviceSeven.serviceCount6, c:res.data.people.agencySeven.agencyCount6 },
                        { day:res.data.xTime.seven, a:res.data.people.memberSeven.memberCount7, b:res.data.people.serviceSeven.serviceCount7, c:res.data.people.agencySeven.agencyCount7 }
                    ],
                    // The name of the data record attribute that contains x-values.
                    xkey: 'day',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['a', 'b', 'c'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['会员', '服务商', '代理商']
                });
                var orderAdd = new Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'orderAdd',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: [
                        { year:res.data.xTime.one, a:res.data.order.rescueSeven.rescueCount1, b:res.data.order.maintainSeven.maintainCount1, c:res.data.order.upkeepSeven.upkeepCount1, 
                            d:res.data.order.checkSeven.checkCount1, e:res.data.order.insuranceSeven.insuranceCount1},
                        { year:res.data.xTime.two, a:res.data.order.rescueSeven.rescueCount2, b:res.data.order.maintainSeven.maintainCount2, c:res.data.order.upkeepSeven.upkeepCount2, 
                            d:res.data.order.checkSeven.checkCount2, e:res.data.order.insuranceSeven.insuranceCount2},
                        { year:res.data.xTime.three, a:res.data.order.rescueSeven.rescueCount3, b:res.data.order.maintainSeven.maintainCount3, c:res.data.order.upkeepSeven.upkeepCount3, 
                            d:res.data.order.checkSeven.checkCount3, e:res.data.order.insuranceSeven.insuranceCount3},
                        { year:res.data.xTime.four, a:res.data.order.rescueSeven.rescueCount4, b:res.data.order.maintainSeven.maintainCount4, c:res.data.order.upkeepSeven.upkeepCount4, 
                            d:res.data.order.checkSeven.checkCount4, e:res.data.order.insuranceSeven.insuranceCount4},
                        { year:res.data.xTime.five, a:res.data.order.rescueSeven.rescueCount5, b:res.data.order.maintainSeven.maintainCount5, c:res.data.order.upkeepSeven.upkeepCount5, 
                            d:res.data.order.checkSeven.checkCount5, e:res.data.order.insuranceSeven.insuranceCount5},
                        { year:res.data.xTime.six, a:res.data.order.rescueSeven.rescueCount6, b:res.data.order.maintainSeven.maintainCount6, c:res.data.order.upkeepSeven.upkeepCount6, 
                            d:res.data.order.checkSeven.checkCount6, e:res.data.order.insuranceSeven.insuranceCount6},
                        { year:res.data.xTime.seven, a:res.data.order.rescueSeven.rescueCount7, b:res.data.order.maintainSeven.maintainCount7, c:res.data.order.upkeepSeven.upkeepCount7, 
                            d:res.data.order.checkSeven.checkCount7, e:res.data.order.insuranceSeven.insuranceCount7}
                    ],
                    // The name of the data record attribute that contains x-values.
                    xkey: 'year',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['a', 'b', 'c', 'd', 'e'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['救援', '维修', '保养', '审车', '保险']
                  });
            } else {
                swal(res.message, "", "error");
            }
        },
        error: function (xhr) {
            //swal("网络错误", "", "error");
        }
    });
})
JS
);
