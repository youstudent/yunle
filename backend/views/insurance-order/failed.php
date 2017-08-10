<?php
/* @var $model backend\models\InsuranceDetail  */
use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<div class="modal-body">
    <div class="row">
        <form class="form-horizontal" action="<?= Url::to(['check-failed?id='.$model->order_id]) ?>" method="POST">
            <!-- begin col-12 -->
            <input type="hidden" name="order_id" value="<?=$model->order_id?>" />
            <textarea name="info" cols="70" rows="4">
                请输入核保失败原因
            </textarea>
            <a href="<?= Url::to(['index']) ?>" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
            <button type="submit" class="btn btn-sm btn-success">确认</button>
        </form>
    </div>
</div>
