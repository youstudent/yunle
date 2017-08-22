<?php

use backend\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '车辆审核列表';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="adminuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-6">
        </div>
    </div>
    <p></p>

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">表格</h4>
        </div>
        <?= \pd\coloradmin\widgets\Alert::widget() ?>
        <div class="panel-body">
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>发起人</th>
                    <th>发起人联系方式</th>
                    <th>状态</th>
                    <th>申请时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <?php if (!empty(\common\models\Identification::findOne(['member_id'=>$model->member_id,'status'=>1]))) {?>
                            <td><?= \common\models\Identification::findOne(['member_id'=>$model->member_id])->name ?></td>
                        <?php } else {?>
                            <td><?= Member::findOne(['id'=>$model->member_id])->phone ?></td>
                        <?php } ?>
                        <td><?= Member::findOne(['id'=>$model->member_id])->phone ?></td>
                        <td><?= $model->status ? '已审核': '未审核'; ?></td>
                        <td><?= date('Y-m-d H:i', $model->updated_at) ?></td>

                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['car-detail', 'id'=> $model->id]) ?>" data-toggle="modal" data-backdrop="static" data-target="#_pd_modal"><span class="btn btn-info m-r-1 m-b-5 btn-xs">车辆详情</span></a>
                                <a href="javascript:;" data-confirm="确认通过该审核？" data-url="<?= Url::to(['car-pass','id' => $model->id]) ?>"><span class="btn btn-danger m-r-1 m-b-5 btn-xs">通过</span></a>
                                <a href="<?= Url::to(['car-out', 'id'=> $model->id]) ?>" data-toggle="modal" data-backdrop="static" data-target="#_pd_modal"><span class="btn btn-info m-r-1 m-b-5 btn-xs">不通过</span></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
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
    </div>
    <!-- end panel -->
</div>

