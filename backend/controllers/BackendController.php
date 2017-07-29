<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/28 - 下午4:36
 *
 */

namespace backend\controllers;


use yii\web\Controller;

class BackendController extends Controller
{
    /**
     * pjax方式渲染模板
     * @param string $view
     * @param array $params
     * @return string
     */
    public function renderPjax($view, $params = [])
    {
        if (array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']) {
            return $this->renderPartial($view, $params);
        } else {
            return $this->render($view, $params);
        }
    }
}