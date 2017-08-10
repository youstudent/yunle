<?php

use pd\admin\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel pd\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="assigment-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    </p>
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                            class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">表格</h4>
        </div>
        <?= \pd\coloradmin\widgets\Alert::widget() ?>
        <div class="panel-body">
            <table id="data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>用户名</th>
                    <th>email</th>
                    <th>用户状态</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                    <tr class="">
                        <td><?= \pd\helpers\Yii2Helpers::serialColumn($dataProvider, $index) ?></td>
                        <td><?= $model->username ?></td>
                        <td><?= $model->email ?></td>
                        <td>
                            <?php
                            echo $model->status == User::STATUS_ACTIVE ? '<span class="badge badge-success radius">正常</span>' : '<span class="badge badge-warning radius">冻结</span>';
                            ?>
                        </td>
                        <td><?= \pd\helpers\Yii2Helpers::dateFormat($model->created_at) ?></td>
                        <td><?= \pd\helpers\Yii2Helpers::dateFormat($model->updated_at) ?></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="<?= Url::to(['assignment/view', 'id' => $model->id]) ?>"><span
                                            class="btn btn-info m-r-1 m-b-5 btn-xs">详情</span></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?= LinkPager::widget([
                'pagination'       => $dataProvider->getPagination(),
                'firstPageLabel'   => '首页',
                'lastPageLabel'    => '末页',
                'nextPageLabel'    => '前一页',
                'prevPageLabel'    => '后一页',
                'hideOnSinglePage' => false,
                'options'          => [
                    'class' => 'pagination pull-right',
                ],
            ]) ?>
        </div>
    </div>
    <!-- end panel -->

</div>

