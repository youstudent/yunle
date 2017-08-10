<?php
namespace backend\action;

use yii\web\ErrorAction;
/**
 * User: harlen-angkemac
 * Date: 2017/8/9 - 下午4:00
 *
 */
class BackendErrorAction extends ErrorAction
{
    public $view = '/site/error';
}