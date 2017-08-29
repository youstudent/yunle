<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $model backend\models\ActDetail */

?>
<!-- #modal-dialog -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">订单操作日志</h4>
</div>
<div class="modal-body">
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>操作时间</th>
            <th>操作人</th>
            <th>状态</th>
            <th>说明</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($dataProvider->getModels() as $index => $model): ?>
            <tr class="">
                <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                <td><?= \pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                <td><?= $model->user ?></td>
                <td><?= \common\models\Helper::getInsuranceStatus($model->status)?></td>
                <td><?= $model->info ?></td>
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
        'hideOnSinglePage' => false,
        'options' => [
            'class' => 'pagination pull-right'
        ]
    ]) ?>
</div>


