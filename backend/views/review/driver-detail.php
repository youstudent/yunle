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
    <h4 class="modal-title">驾驶证详情</h4>
</div>
<div class="modal-body">
    <table id="data-table" class="table table-striped table-bordered">
        <tr>
            <th>姓名</th>
            <td><?= $model->name ?></td>
        </tr>
        <tr>
            <th>性别</th>
            <td><?= $model->sex ?></td>
        </tr>
        <tr>
            <th>国籍</th>
            <td><?= $model->nationality ?></td>
        </tr>
        <tr>
            <th>证件号</th>
            <td><?= $model->papers ?></td>
        </tr>
        <tr>
            <th>出生日期</th>
            <td><?= $model->birthday ?></td>
        </tr>
        <tr>
            <th>领证日期</th>
            <td><?= $model->certificate_at ?></td>
        </tr>
        <tr>
            <th>准驾车型</th>
            <td><?= $model->permit ?></td>
        </tr>
        <tr>
            <th>生效时间</th>
            <td><?= $model->start_at ?></td>
        </tr>
        <tr>
            <th>失效时间</th>
            <td><?= $model->end_at ?></td>
        </tr>
        <tr>
            <th>车辆图片</th>
            <td>
                <?php foreach (\common\models\DrivingImg::findAll(['driver_id'=>$model->id]) as $v) {?>
                    <img src="<?= $v->img_path ?>" alt="" width="100px" />
                <?php } ?>
            </td>
        </tr>
    </table>
</div>


