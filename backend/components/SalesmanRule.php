<?php
namespace backend\components;

use Yii;
use yii\rbac\Rule;

/**
 * User: harlen-angkemac
 * Date: 2017/8/12 - 上午10:12
 *
 */
class SalesmanRule extends Rule
{
    public function execute($user, $item, $params)
    {
        return true;
    }
}