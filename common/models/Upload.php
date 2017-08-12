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
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
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

    public function setImageInformation($image, $id, $type){
        foreach($image as $v){
            Header( "Content-type: image/jpeg");

            preg_match('/^(data:\s*image\/(\w+);base64,)/', $v, $result);
            $extension = $result[2];

            $file = base64_decode(str_replace($result[1], '', $v));
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            $img_path = $this->getSavePath($type, $chars, $extension);
            file_put_contents(Yii::getAlias('@common').$img_path, $file);

//            $path_Str = Yii::getAlias('@common');
//            $str = str_replace('\\','/',$path_Str);

            switch ($type) {
                case 'car':
                    $model = new CarImg();
                    $model->car_id = $id;
                    $model->img_path = $img_path;
                    $model->created_at = time();
                    if (!$model->save(false)) {
                        return false;
                    }
                    break;
                case  'driver':
                    $model = new DrivingImg();
                    $model->driver_id = $id;
                    $model->img_path = $img_path;
                    $model->created_at = time();
                    if (!$model->save(false)) {
                        return false;
                    }
                    break;
                case  'identification':
                    $model = new IdentificationImg();
                    $model->ident_id = $id;
                    $model->img_path = $img_path;
                    $model->created_at = time();
                    if (!$model->save(false)) {
                        return false;
                    }
                    break;
                case 'photo':
                    $model = MemberImg::findOne(['member_id'=>$id]);
                    if (!isset($model) || empty($model)) {
                        $model = new MemberImg();
                        $model->member_id = $id;
                    }

                    $model->img_path = $img_path;
                    $model->updated_at = time();
                    if (!$model->save(false)) {
                        return false;
                    }
                    break;
                case 'portrait':
                    $model = UserImg::findOne(['user_id'=>$id]);
                    if (!isset($model) || empty($model)) {
                        $model = new UserImg();
                        $model->User_id = $id;
                    }

                    $model->img_path = $img_path;
                    $model->updated_at = time();
                    if (!$model->save(false)) {
                        return false;
                    }
                    break;
                case  'act':
                    $model = new ActImg();
                    $model->act_id = $id;
                    $model->img_path = $img_path;
                    $model->created_at = time();
                    if (!$model->save(false)) {
                        return false;
                    }
                    break;
            }

        }
        return true;
    }

    public function getSavePath($type, $chars ,$extension)
    {
        $save_path = '';
        $this->db_save_path = '/upload/'. $type .'_imgs/' . date('Y-m-d') . '/' . sha1($chars[ mt_rand(0, strlen($chars) - 1) ] . time()) . '.' . $extension;
        $save_path = '/public' . $this->db_save_path;

        if (!empty($save_path)) {
            $save_dir = dirname(Yii::getAlias('@common') . $save_path);
            if (!is_dir($save_dir)) {
//                mkdir($save_dir, 0755);
                FileHelper::createDirectory($save_dir, $mode = 0775, $recursive = true);
            }
        }
        return $save_path;
    }

//    protected function getFileExtension($filename)
//    {
//        return strtolower(pathinfo($filename)['extension']);
//    }

}