<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/5 - 下午2:31
 *
 */

/* @var $model backend\models\InsuranceDetail  */
use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>

<!-- begin page-header -->
<h1 class="page-header">Tabs & Accordions <small>header small text goes here...</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <table id="data-table-title" class="table   ">
        <caption><h3>保单详情</h3></caption>
        <tr>
            <td><b>投保车辆</b></td>
            <td><?= $model->insurance->car ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>投保人</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>姓名</b></td>
            <td><?= $model->insurance->user ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>性别</b></td>
            <td><?= $model->insurance->sex ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>民族</b></td>
            <td><?= $model->insurance->nation ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>身份证号</b></td>
            <td><?= $model->insurance->licence ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>交强险</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>流水号</b></td>
            <td><?= $model->compensatory->serial_number ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>保单号</b></td>
            <td><?= $model->compensatory->warranty_number ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>价格</b></td>
            <td><?= $model->compensatory->cost ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>车船税</b></td>
            <td><?= $model->compensatory->travel_tax ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>生效时间</b></td>
            <td><?= \common\models\Helper::getTime($model->compensatory->start_at) ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>失效时间</b></td>
            <td><?= \common\models\Helper::getTime($model->compensatory->end_at) ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>商业险</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>流水号</b></td>
            <td><?= $model->business->serial_number ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>保单号</b></td>
            <td><?= $model->business->warranty_number ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>险种</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($model->element as $v) {?>
            <tr>
                <td></td>
                <td></td>
                <td><?= $v->insurance ?></td>
                <td><?= $v->element ?></td>
                <td><?= $v->deduction?$v->deduction:''; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td><b>价格</b></td>
            <td><?= $model->business->cost ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>生效时间</b></td>
            <td><?= \common\models\Helper::getTime($model->business->start_at) ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><b>失效时间</b></td>
            <td><?= \common\models\Helper::getTime($model->business->end_at) ?></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <!-- end col-6 -->
</div>
<a href="<?= Url::to(['index']) ?>" class="btn btn-sm btn-white" data-dismiss="modal">返回</a>
<!-- end row -->
