<?php
/* @var $model backend\models\InsuranceDetail  */
use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use dosamigos\fileupload\FileUploadUI;
?>
<div class="modal-body">
<div class="row">
    <form class="form-horizontal" action="<?= Url::to(['check-success?id='.$model->order_id]) ?>" method="POST">
        <!-- begin col-12 -->
        <input type="hidden" name="order_id" value="<?=$model->order_id?>" />
        <div class="form-group field-insurancedetail-cover">
            <label class="control-label control-label col-md-4 col-sm-4" for="insurancedetail-cover">报价单</label>
            <div class="col-md-6 col-sm-6">
                <?= FileUploadUI::widget([
                    'model' => $model,
                    'attribute' => 'attachment',
                    'url' => ['media/image-upload', 'model'=> 'actImg', 'type'=> 'img'],
                    'gallery' => true,
                    'fieldOptions' => [
                        'accept' => 'image/*'
                    ],
                    'clientOptions' => [
                        'maxFileSize' => 2000000
                    ],
                    // ...
                    'clientEvents' => [
                        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                    ],
                ]); ?>

                <div class="help-block help-block-error "></div>
            </div>
        </div>
        <a href="<?= Url::to(['index']) ?>" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
        <button type="submit" class="btn btn-sm btn-success">确认</button>
    </form>
</div>
</div>
