<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/16 - 下午5:28
 *
 */

?>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>用户名</th>
        <th>联系电话</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($dataProvider->getModels() as $model) : ?>
    <tr>
        <td><?= $model->id ?></td>
        <td><?= $model->username ?></td>
        <td><?= $model->email ?></td>

    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
