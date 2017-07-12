<?php

namespace common\models;

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

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class Upload extends Model
{
    public $img_path;

    public $db_save_path;

    /**
     * 初始化上传
     * @param $params
     */
    public function upload($params)
    {
        $type = $params['type'];
        switch ($type) {
            case 'car':
                return $this->uploadCarImgs($params);
                break;
        }
    }

    public function uploadCarImgs($params)
    {
        $model = new CarImg();
        $this->img_path = UploadedFile::getInstance($model, 'img_path');
        if (isset($this->img_path)) {
            //获取文件上传的相对路径
            $img_path = $this->getSavePath('car', $this->img_path->name);
            $this->img_path->saveAs(Yii::getAlias('@webroot') . $img_path);
            $model->img_path = '/public'.$this->db_save_path;
            $model->save();
            return $model->id;
        }
        return null;
    }
//    public function uploadGoodsImgs($params)
//    {
//        $model = new GoodsImg();
//        $this->img_path = UploadedFile::getInstance($model, 'img_path');
//        if (isset($this->img_path)) {
//            //获取文件上传的相对路径
//            $img_path = $this->getSavePath('goods', $this->img_path->name);
//            $this->img_path->saveAs(Yii::getAlias('@webroot') . $img_path);
//            $model->img_path = '/public'.$this->db_save_path;
//            $model->save();
//            return $model->id;
//        }
//        return null;
//    }
//
//    public function uploadFruiterImgs($params)
//    {
//        $model = new FruiterImg();
//        $this->img_path = UploadedFile::getInstance($model, 'img_path');
//        if (isset($this->img_path)) {
//            //获取文件上传的相对路径
//            $img_path = $this->getSavePath('fruiter', $this->img_path->name);
//            $model->fruiter_id = $params['fruiter_id'];
//            $this->img_path->saveAs(Yii::getAlias('@webroot') . $img_path);
//            $model->img_path = '/public'.$this->db_save_path;
//            $model->save();
//            return $model->id;
//        }
//        return null;
//    }

    public function uploadBannerImgs($params)
    {

    }

    public function getSavePath($type, $filename)
    {
        $save_path = '';
        switch ($type) {
            case 'car':
                $this->db_save_path = '/upload/car_imgs/' . date('Y-m-d') . '/' . sha1($filename . time()) . '.' . $this->getFileExtension($filename);
                $save_path = '/public' . $this->db_save_path;
                break;
        }
        if (!empty($save_path)) {
            $save_dir = dirname(Yii::getAlias('@webroot') . $save_path);
            if (!is_dir($save_dir)) {
//                mkdir($save_dir, 0755);
                FileHelper::createDirectory($save_dir, $mode = 0775, $recursive = true);
            }
        }
        return $save_path;
    }

    protected function getFileExtension($filename)
    {
        return strtolower(pathinfo($filename)['extension']);
    }

}