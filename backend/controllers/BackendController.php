<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/28 - 下午4:36
 *
 */

namespace backend\controllers;


use Yii;
use yii\web\Controller;

class BackendController extends Controller
{
    //1是平台组。2 第三方
    public $role_type = 2;


    public function init()
    {
        parent::init();

        //获取当前角色
        $manager = Yii::$app->getAuthManager();
        $roles = $manager->getRolesByUser(Yii::$app->user->identity->id);
        foreach($roles as $role){
            if(in_array($role, ['管理员'])){
                $this->role_type = 1;
            }
            if(in_array($role, ['服务商', '代理商'])){
                $this->role_type = 2;
            }
        }

    }
    /**
     * pjax方式渲染模板
     * @param string $view
     * @param array $params
     * @return string
     */
    public function renderPjax($view, $params = [])
    {
        if (array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']) {
            return $this->renderAjax($view, $params);
        } else {
            return $this->render($view, $params);
        }
    }

}