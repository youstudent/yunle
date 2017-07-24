<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/20 - 上午10:26
 *
 */

namespace backend\controllers;


use stdClass;
use Yii;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {

        $menu = Yii::$app->params['menu'];


        return $this->render('index', [
            'menu' => json_encode($menu, JSON_UNESCAPED_UNICODE)
        ]);
    }


    protected function parseMenu($menus, $level= 1)
    {
        foreach($menus as $key => $val){
            if(is_array($val) && count($val) > 0){
                $this->parseMenu($menus[$key], $level++);
            }
            if($key == 'title'){
                $td = '<td>' . $val .'</td>';
            }
        }
    }

    protected function renderRow($val, $level)
    {

    }

    protected function renderChidlNum($menus)
    {

    }

}