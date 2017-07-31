<?php

namespace api\controllers;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use Yii;
use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller
{
    public $layout = false;
    public $enableCsrfValidation = false;


    /**
     * @inheritdoc
     */
    public function jsonReturn($code, $message, $data = [], $time = '',$title='')
    {
//        $headers = Yii::$app->response->headers;
//        $headers->add("Access-Control-Allow-Origin", '*');
//        $headers->add("Access-Control-Allow-Headers", 'x-requested-with,content-type');
        Yii::$app->response->format = Response::FORMAT_JSON;
        $time = $time ? $time : time();

        return [
            'code' => $code,
            'timestamp' => $time,
            'message' => $message,
            'data' => $data,
            'token' => Yii::$app->session->getId()
        ];
    }

    public function getForm($json_data)
    {

        $form = json_decode($json_data,true);
        if(empty($form['token'])){
            return $this->jsonReturn(4000, '未登录');
        }
        Yii::$app->session->setId($form['token']);

        return $form;
    }

    public function getMemberInfo()
    {
        $member = Yii::$app->session->get('mem');
        if(empty($member)){
            return $this->jsonReturn(4001, '登录失效');
        }
        return $member;
    }

}
