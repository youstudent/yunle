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
use kartik\file\FileInput;
use kartik\datetime\DateTimePicker;
?>

<!-- begin page-header -->
<h1 class="page-header">Tabs & Accordions <small>header small text goes here...</small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <form class="form-horizontal" action="<?= Url::to(['update']) ?>" method="POST" enctype="multipart/form-data">
        <!-- begin col-12 -->
        <input type="hidden" name="order_id" value="<?=$model->order_id?>" />
        <table id="data-table-title" class="table">
            <caption><h3>保单付款</h3></caption>
            <tr>
                <td><b>交强险</b></td>
            </tr>
            <tr>
                <td></td>
                <td><b>流水号</b></td>
                <td>
                    <input name= "c_sn" class="form-control input-lg" type="text" value="<?= $model->compensatory->serial_number ?>" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>保单号</b></td>
                <td>
                    <input name= "c_wn" class="form-control input-lg" type="text" value="<?= $model->compensatory->warranty_number ?>" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>价格</b></td>
                <td>
                    <input name= "c_cost" class="form-control input-lg" type="text" value="<?= $model->compensatory->cost ?>" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>车船税</b></td>
                <td>
                    <input name= "c_tt" class="form-control input-lg" type="text" value="<?= $model->compensatory->travel_tax ?>" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>生效时间</b></td>
                <td>
                    <?php echo DateTimePicker::widget([
                        'name' => 'c_st',
                        'options' => ['placeholder' => date('Y-m-d H:i',time())],
                        //注意，该方法更新的时候你需要指定value值
//                        'value' => time(),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd HH:ii',
                            'todayHighlight' => true
                        ]
                    ]);?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>失效时间</b></td>
                <td>
                    <?php echo DateTimePicker::widget([
                        'name' => 'c_et',
                        'options' => ['placeholder' => date('Y-m-d H:i',time()+3600*24*365)],
                        //注意，该方法更新的时候你需要指定value值
//                        'value' => ,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd HH:ii',
                            'todayHighlight' => true
                        ]
                    ]);?>

                </td>
            </tr>
            <tr>
                <td><b>商业险</b></td>
            </tr>
            <tr>
                <td></td>
                <td><b>流水号</b></td>
                <td>
                    <input name= "b_sn" class="form-control input-lg" type="text" value="<?= $model->business->serial_number ?>" />
                <td>
            </tr>
            <tr>
                <td></td>
                <td><b>保单号</b></td>
                <td>
                    <input name= "b_wn" class="form-control input-lg" type="text" value="<?= $model->business->warranty_number ?>" />
                <td>
            </tr>
            <tr>
                <td></td>
                <td><b>价格</b></td>
                <td>
                    <input name= "b_cost" class="form-control input-lg" type="text" value="<?= $model->business->cost ?>" />
                <td>
            </tr>
            <tr>
                <td></td>
                <td><b>生效时间</b></td>
                <td>
                    <?php echo DateTimePicker::widget([
                        'name' => 'b_st',
                        'options' => ['placeholder' => date('Y-m-d H:i',time())],
                        //注意，该方法更新的时候你需要指定value值
//                        'value' => time(),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd HH:ii',
                            'todayHighlight' => true
                        ]
                    ]);?>
                <td>
            </tr>
            <tr>
                <td></td>
                <td><b>失效时间</b></td>
                <td>
                    <?php echo DateTimePicker::widget([
                        'name' => 'b_et',
                        'options' => ['placeholder' => date('Y-m-d H:i',time()+3600*24*365)],
                        //注意，该方法更新的时候你需要指定value值
//                        'value' => time(),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd HH:ii',
                            'todayHighlight' => true
                        ]
                    ]);?>
                <td>
            </tr>
            <tr>
                <td><b>保单图片</b></td>
                <td>
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
                </td>
            </tr>
        </table>
        <a href="<?= Url::to(['detail?id='.$model->order_id]) ?>" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>
        <button type="submit" class="btn btn-sm btn-success">确认付款</button>
        <!-- end col-6 -->
    </form>
</div>
<!-- end row -->
