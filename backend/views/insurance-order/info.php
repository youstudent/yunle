<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $model backend\models\InsuranceOrder */

?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">保单详情</h4>
</div>
<div class="modal-body">

    <table id="data-table-title" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>投保人</th>
            <th>身份证号</th>
        </tr>
        <tbody>
        <tr>
            <td><?= $model->user ?></td>
            <td><?= $model->licence ?></td>
        </tr>
        </tbody>
    </table>
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>险种</th>
            <th>要素</th>
            <th>免赔</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($dataProvider->getModels() as $index => $model): ?>
            <tr class="">
                <td><?= $model->insurance ?></td>
                <td><?= $model->element ?></td>
                <td><?= $model->deduction ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <?= LinkPager::widget([
        'pagination'=>$dataProvider->getPagination(),
        'firstPageLabel'=> '首页',
        'lastPageLabel'=> '末页',
        'nextPageLabel'=> '前一页',
        'prevPageLabel'=> '后一页',
        'hideOnSinglePage' => true,
        'options' => [
            'class' => 'pagination pull-right'
        ]
    ]) ?>
</div>


