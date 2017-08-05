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
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
            <div class="stats-title">新增会员</div>
            <div class="stats-number">129</div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
            <div class="stats-desc">超过昨天 (70.1%)</div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
            <div class="stats-title">新增订单</div>
            <div class="stats-number">29</div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 40.5%;"></div>
            </div>
            <div class="stats-desc">超过昨天 (40.5%)</div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
            <div class="stats-title">新增报单</div>
            <div class="stats-number">21 单</div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 76.3%;"></div>
            </div>
            <div class="stats-desc">超过昨天 (76.3%)</div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-black">
            <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
            <div class="stats-title">新增服务商</div>
            <div class="stats-number">5 家</div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 54.9%;"></div>
            </div>
            <div class="stats-desc">超过昨天 (54.9%)</div>
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-inverse" data-sortable-id="index-8">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">待办清单</h4>
            </div>
            <div class="panel-body p-0">
                <ul class="todolist">
                    <li class="active">
                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                            <div class="todolist-title">有5条驾驶认证需要审核.</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                            <div class="todolist-title">有4家服务商资料变更需要审核.</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                            <div class="todolist-title">有 192 个保单信息需要审核.</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                            <div class="todolist-title">182条新订单等待处理.</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-black">
            <p>公告1</p>
            <p>公告2</p>
            <p>公告3</p>
        </div>
    </div>
    <!-- end col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-inverse" data-sortable-id="index-7">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">人员组织分布</h4>
            </div>
            <div class="panel-body">
                <div id="donut-chart" class="height-sm"></div>
            </div>
        </div>
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
                <h4 class="panel-title">订单 (最近7天)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 116px; text-align: center;">May&nbsp;15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 279px; text-align: center;">May&nbsp;19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 442px; text-align: center;">May&nbsp;22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 606px; text-align: center;">May&nbsp;25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 769px; text-align: center;">May&nbsp;28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 932px; text-align: center;">May&nbsp;31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 269px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 242px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 215px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 161px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 81px; left: 1px; text-align: right;">140</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 1px; text-align: right;">160</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 27px; left: 1px; text-align: right;">180</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">200</div></div></div><canvas class="flot-overlay" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 93px; height: 48px; top: 19px; right: 30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:19px;right:30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #00acac;overflow:hidden"></div></div></td><td class="legendLabel">Visitors</td></tr></tbody></table></div></div>
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
                <h4 class="panel-title">保险订单 (最近7天)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 116px; text-align: center;">May&nbsp;15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 279px; text-align: center;">May&nbsp;19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 442px; text-align: center;">May&nbsp;22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 606px; text-align: center;">May&nbsp;25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 769px; text-align: center;">May&nbsp;28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 932px; text-align: center;">May&nbsp;31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 269px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 242px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 215px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 161px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 81px; left: 1px; text-align: right;">140</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 1px; text-align: right;">160</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 27px; left: 1px; text-align: right;">180</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">200</div></div></div><canvas class="flot-overlay" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 93px; height: 48px; top: 19px; right: 30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:19px;right:30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #00acac;overflow:hidden"></div></div></td><td class="legendLabel">Visitors</td></tr></tbody></table></div></div>
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
                <h4 class="panel-title">会员 (最近7天)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 116px; text-align: center;">May&nbsp;15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 279px; text-align: center;">May&nbsp;19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 442px; text-align: center;">May&nbsp;22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 606px; text-align: center;">May&nbsp;25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 769px; text-align: center;">May&nbsp;28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 932px; text-align: center;">May&nbsp;31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 269px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 242px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 215px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 161px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 81px; left: 1px; text-align: right;">140</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 1px; text-align: right;">160</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 27px; left: 1px; text-align: right;">180</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">200</div></div></div><canvas class="flot-overlay" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 93px; height: 48px; top: 19px; right: 30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:19px;right:30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #00acac;overflow:hidden"></div></div></td><td class="legendLabel">Visitors</td></tr></tbody></table></div></div>
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
                <h4 class="panel-title">业务员 (最近7天)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 116px; text-align: center;">May&nbsp;15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 279px; text-align: center;">May&nbsp;19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 442px; text-align: center;">May&nbsp;22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 606px; text-align: center;">May&nbsp;25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 769px; text-align: center;">May&nbsp;28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 932px; text-align: center;">May&nbsp;31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 269px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 242px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 215px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 161px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 81px; left: 1px; text-align: right;">140</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 1px; text-align: right;">160</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 27px; left: 1px; text-align: right;">180</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">200</div></div></div><canvas class="flot-overlay" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 93px; height: 48px; top: 19px; right: 30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:19px;right:30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #00acac;overflow:hidden"></div></div></td><td class="legendLabel">Visitors</td></tr></tbody></table></div></div>
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
                <h4 class="panel-title">服务商 (最近7天)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 116px; text-align: center;">May&nbsp;15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 279px; text-align: center;">May&nbsp;19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 442px; text-align: center;">May&nbsp;22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 606px; text-align: center;">May&nbsp;25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 769px; text-align: center;">May&nbsp;28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 84px; top: 282px; left: 932px; text-align: center;">May&nbsp;31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 269px; left: 15px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 242px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 215px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 161px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 81px; left: 1px; text-align: right;">140</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 1px; text-align: right;">160</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 27px; left: 1px; text-align: right;">180</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">200</div></div></div><canvas class="flot-overlay" width="1081" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1081px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 93px; height: 48px; top: 19px; right: 30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:19px;right:30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #00acac;overflow:hidden"></div></div></td><td class="legendLabel">Visitors</td></tr></tbody></table></div></div>
            </div>
        </div>
    </div>
</div>
<?php
\pd\coloradmin\web\plugins\JqueryFlotAsset::register($this);
$this->registerJs(<<<JS
var blue = "#348fe2", blueLight = "#5da5e8", blueDark = "#1993E4", aqua = "#49b6d6", aquaLight = "#6dc5de",
    aquaDark = "#3a92ab", green = "#00acac", greenLight = "#33bdbd", greenDark = "#008a8a", orange = "#f59c1a",
    orangeLight = "#f7b048", orangeDark = "#c47d15", dark = "#2d353c", grey = "#b6c2c9", purple = "#727cb6",
    purpleLight = "#8e96c5", purpleDark = "#5b6392", red = "#ff5b57";
    if ($("#donut-chart").length !== 0) {
        var e = [{label: "会员", data: 35, color: purpleDark}, {
            label: "业务员",
            data: 30,
            color: purple
        }, {label: "服务商", data: 15, color: purpleLight}, {label: "代理商", data: 10, color: blue}, {
            label: "操作员",
            data: 5,
            color: blueDark
        }];
        $.plot("#donut-chart", e, {
            series: {pie: {innerRadius: .5, show: true, label: {show: true}}},
            legend: {show: true}
        })
    }
JS
);