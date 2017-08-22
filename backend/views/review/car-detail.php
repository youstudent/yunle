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
    <h4 class="modal-title">车辆详情</h4>
</div>
<div class="modal-body">
    <table id="data-table" class="table table-striped table-bordered">
        <tr>
            <th>车牌号</th>
            <td><?= $model->license_number ?></td>
        </tr>
        <tr>
            <th>车辆类型</th>
            <td><?= $model->type ?></td>
        </tr>
        <tr>
            <th>所有人</th>
            <td><?= $model->owner ?></td>
        </tr>
        <tr>
            <th>使用性质</th>
            <td><?= $model->nature ?></td>
        </tr>
        <tr>
            <th>品牌型号</th>
            <td><?= $model->brand_num ?></td>
        </tr>
        <tr>
            <th>车辆识别代号</th>
            <td><?= $model->discern_num ?></td>
        </tr>
        <tr>
            <th>发动机号</th>
            <td><?= $model->motor_num ?></td>
        </tr>
        <tr>
            <th>荷载人数</th>
            <td><?= $model->load_num ?></td>
        </tr>
        <tr>
            <th>注册日期</th>
            <td><?= $model->sign_at ?></td>
        </tr>
        <tr>
            <th>发证日期</th>
            <td><?= $model->certificate_at ?></td>
        </tr>
        <tr>
            <th>车辆图片</th>
            <td>
                <?php foreach (\common\models\CarImg::findAll(['car_id'=>$model->id]) as $v) {?>
                    <img src="<?= $v->img_path ?>" alt="" width="100px" />
                <?php } ?>
            </td>
        </tr>
    </table>
</div>


