<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午8:38
 *
 */
$this->title = '编辑会员信息';
$this->params['breadcrumbs'][] = ['label'=> '会员管理', 'url'=> ''];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="member-update">
    <h1>添加新会员</h1>

    <?= $this->render('_form', [
        'model'=> $model,
    ]) ?>
</div>
