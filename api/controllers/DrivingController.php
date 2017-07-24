<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 11:08
 */

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
      ********龙龙********
        *******我*******
          *****爱*****
            ***你***
              ***
               *
     */

use common\models\DrivingLicense;
use Yii;

class DrivingController extends ApiController
{
    //驾驶证列表
    public function actionList()
    {
        $model = new DrivingLicense();
        $data = $model->getDriver(Yii::$app->request->post());
        if ($data['license'] != null) {
            return $this->jsonReturn(1, 'success', $data);
        }

        return $this->jsonReturn(0, $model->getFirstError('message'), $data);
    }


    //驾驶证添加
    public function actionAdd()
    {
        $model = new DrivingLicense();
        if ($model->addDriver(Yii::$app->request->post())) {
            return $this->jsonReturn(1, 'success');
        }
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //驾驶证删除
    public function actionDel()
    {
        $model = new DrivingLicense();
        if ($model->delDriver(Yii::$app->request->post())) {
            return $this->jsonReturn(1, '删除成功');
        }

        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

    //驾驶证修改
    public function actionUpdate()
    {
        $model = new DrivingLicense();
        if ($model->updateDriver(Yii::$app->request->post())) {
            return $this->jsonReturn(1, 'success');
        }
        //如果返回false 返回错误信息
        return $this->jsonReturn(0, $model->getFirstError('message'));
    }

}