<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/24 - 下午4:15
 *
 */

$this->title = '添加新会员';
$this->params['breadcrumbs'][] = ['label' => '会员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="member-create">
    <h1>添加新会员</h1>

    <?= $this->render('_form', [
        'model'=> $model,
]   ) ?>
</div>


