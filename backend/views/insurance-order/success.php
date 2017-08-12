<?php
/* @var $model backend\models\InsuranceDetail  */
/* A smile is the most charming part of a person forever. */
/* Where there is great love, there are always miracles. */
/* A man can't ride your back unless it is bent. */
/* Everything is always more beautiful reflected in your eyes. */

use yii\helpers\Url;
use kartik\file\FileInput;

?>
<div class="modal-body">
<div class="row">
    <form class="form-horizontal" action="<?= Url::to(['check-success?id='.$model->order_id]) ?>" method="POST" enctype="multipart/form-data">
        <!-- begin col-12 -->
        <input type="hidden" name="order_id" value="<?=$model->order_id?>" />
        <div class="form-group field-insurancedetail-cover">
            <label class="control-label control-label col-md-4 col-sm-4" for="insurancedetail-cover">报价单</label>
            <div class="col-md-6 col-sm-6">
                <?php
                echo FileInput::widget([
                    'model' => $model,
                    'attribute' => 'img[]',
                    'options' => ['multiple' => true],
                    'pluginOptions' => [
                        // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
                        'showUpload' => false,
                    ],
                ]);
                ?>
            </div>
        </div>
        <a href="<?= Url::to(['index']) ?>" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
        <button type="submit" class="btn btn-sm btn-success">确认</button>
    </form>
</div>
</div>
