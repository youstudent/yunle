<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/11 - 上午11:54
 *
 */

namespace backend\controllers;


class RedactorController extends BackendController
{
    public function actionUploadImgJson()
    {
        print_r($_FILES);
    }

    public function actionUploadImg()
    {
        print_r($_FILES);

    }

    public function actionUploadFile()
    {
        print_r($_FILES);

    }
}