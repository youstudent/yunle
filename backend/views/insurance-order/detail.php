<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/5 - 下午2:31
 *
 */

/* @var $model backend\models\InsuranceDetail  */

?>

<!-- begin page-header -->
<h1 class="page-header">Tabs & Accordions <small>header small text goes here...</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#order-info" data-toggle="tab">订单信息</a></li>
            <li class=""><a href="#car-info" data-toggle="tab">车辆信息</a></li>
            <li class=""><a href="#insurance-info" data-toggle="tab">保险信息</a></li>
            <li class=""><a href="#pay-info" data-toggle="tab">付款信息</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="order-info">
                <table id="data-table-title" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>订单号</th>
                        <th>车辆</th>
                        <th>联系电话</th>
                        <th>下单时间</th>
                        <th>核保时间</th>
                        <th>核保结果</th>
                        <th>已付款</th>
                        <th>价格</th>
                        <th>完成时间</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td><?= $model->insurance->order_sn ?></td>
                        <td><?= $model->insurance->car ?></td>
                        <td><?= $model->insurance->phone ?></td>
                        <td><?= $model->insurance->created_at ?></td>
                        <td><?= $model->insurance->check_at?$model->insurance->check_at:'未审核'; ?></td>
                        <td><?= $model->insurance->check_action?$model->insurance->check_action:'未审核'; ?></td>
                        <td><?= $model->insurance->payment_action?$model->insurance->payment_action:'未付款'; ?></td>
                        <td><?= $model->insurance->cost ?></td>
                        <td><?= $model->insurance->updated_at?$model->insurance->updated_at:'未完成'; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="car-info">
                <table id="data-table-title" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>车牌号</th>
                        <th>车辆类型</th>
                        <th>所有人</th>
                        <th>使用性质</th>
                        <th>品牌型号</th>
                        <th>车辆识别代号</th>
                        <th>发动机号</th>
                        <th>荷载人数</th>
                        <th>注册日期</th>
                        <th>发证日期</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td><?= $model->car->license_number ?></td>
                        <td><?= $model->car->type ?></td>
                        <td><?= $model->car->owner ?></td>
                        <td><?= $model->car->nature ?></td>
                        <td><?= $model->car->brand_num ?></td>
                        <td><?= $model->car->discern_num ?></td>
                        <td><?= $model->car->motor_num ?></td>
                        <td><?= $model->car->load_num ?></td>
                        <td><?= $model->car->sign_at ?></td>
                        <td><?= $model->car->certificate_at ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="insurance-info">
<!--                <table id="data-table-title" class="table table-striped table-bordered">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>公司名称</th>-->
<!--                        <th>组织机构代码</th>-->
<!--                        <th>承保公司</th>-->
<!--                    </tr>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <td>--><?//= $model->insurance->user ?><!--</td>-->
<!--                        <td>--><?//= $model->insurance->licence ?><!--</td>-->
<!--                        <td>--><?//= $model->insurance->company ?><!--</td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
                <table id="data-table-title" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>投保人</th>
                        <th>性别</th>
                        <th>民族</th>
                        <th>身份证号</th>
                        <th>承保公司</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td><?= $model->insurance->user ?></td>
                        <td><?= $model->insurance->sex ?></td>
                        <td><?= $model->insurance->nation ?></td>
                        <td><?= $model->insurance->licence ?></td>
                        <td><?= $model->insurance->company ?></td>
                    </tr>
                    </tbody>
                </table>
<!--                <table id="data-table-title" class="table table-striped table-bordered">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>保险名称</th>-->
<!--                        <th>要素</th>-->
<!--                        <th>啊啊</th>-->
<!--                    </tr>-->
<!--                    <tbody>-->
<!--                    --><?// foreach ($model->element as $v) {?>
<!--                    <tr>-->
<!--                        <td>--><?//= $v->insurance ?><!--</td>-->
<!--                        <td>--><?//= $v->element ?><!--</td>-->
<!--                        <td>--><?//= $v->dedution ?><!--</td>-->
<!--                    </tr>-->
<!--                    --><?// } ?>
<!--                    </tbody>-->
<!--                </table>-->
            </div>
            <div class="tab-pane fade" id="pay-info">
                <table id="data-table-title" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>保险名称</th>
                        <th>流水号</th>
                        <th>保单号</th>
                        <th>价格</th>
                        <th>车船税</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>较强想</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                    </tr>
                    <tr>
                        <td>较强想</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->
