<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午9:05
 *
 */

namespace backend\controllers;


use backend\models\DrivingLicense;
use backend\models\form\AgencyForm;
use backend\models\form\ServiceForm;
use backend\models\Service;
use backend\models\ServiceImg;
use Imagine\Image\ImageInterface;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\imagine\Image;
use yii\web\UploadedFile;

class MediaController extends BackendController
{

    public function actionImageUpload($model = null, $type = null)
    {
        $thumb_width = null;
        $thumb_height = null;
        $attribute = null;
        $sub_dir = 'default';
        $directory = Yii::getAlias('@common/static/upload/default') . DIRECTORY_SEPARATOR;
        switch($model){
            case 'service':
                $model = new ServiceForm();
                $directory = Yii::getAlias('@common/static/upload/service') . DIRECTORY_SEPARATOR;
                $sub_dir = 'service';
                $attribute = $type == 'head' ? 'head' : 'attachment';
                if($attribute == 'head'){
                    $thumb_width = $thumb_height = 60;
                }else{
                    $thumb_width = 640;
                    $thumb_height = 640;
                }
                break;
            case 'agency':
                $model = new AgencyForm();
                $directory = Yii::getAlias('@common/static/upload/agency') . DIRECTORY_SEPARATOR;
                $sub_dir = 'agency';
                $attribute = 'attachment';
                $thumb_width = $thumb_height = 60;
                break;
            case 'driver':
                $model = new DrivingLicense();
                $directory = Yii::getAlias('@common/static/upload/driver') . DIRECTORY_SEPARATOR;
                $sub_dir = 'driver';
                $attribute = 'img';
                break;
        }

        $imageFile = UploadedFile::getInstance($model, $attribute);
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }
        if ($imageFile) {
            //$uid = uniqid(time(), true);
            $uid = mt_rand(1000000, 9999999) . date('Y-m-d-H-i-s');
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            $thumbPath = $directory .'thumb'. $thumb_width .'x'.$thumb_height. 'angkeYPXL' .$fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '/upload/'. $sub_dir . DIRECTORY_SEPARATOR . $fileName;
                $thumb_path = '/upload/'. $sub_dir . DIRECTORY_SEPARATOR .'thumb'. $thumb_width .'x'.$thumb_height. 'angkeYPXL' .$fileName;
                //处理缩略图
                $this->saveThumbPath($filePath, $thumbPath, $thumb_width, $thumb_height);
                $return = [
                    'files' => [
                        [
                            'name' => $fileName,
                            'size' => $imageFile->size,
                            'url' =>  $path,
                            'thumbnailUrl' =>  $thumb_path,
                            'deleteUrl' => 'image-delete?name=' . $fileName,
                            'deleteType' => 'POST',
                        ],
                    ],
                ];
                //保存图片到数据库
                $imgModel = $model->saveImg($return, $type);

                $img_domain = Yii::$app->params['img_domain'];
                $return['files'][0]['url'] = $img_domain. $return['files'][0]['url'];
                $return['files'][0]['thumbnailUrl'] = $img_domain. $return['files'][0]['thumbnailUrl'];
                if($imgModel->id){
                    $return['files'][0]['img_id'] = $imgModel->id;
                }
                return Json::encode($return);
            }
        }

        return Json::encode(['data'=>[], 'code'=>0]);
    }

    public function actionImageDelete($name)
    {
        $directory = Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file) {
            $fileName = basename($file);
            $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
            $output['files'][] = [
                'name' => $fileName,
                'size' => filesize($file),
                'url' => $path,
                'thumbnailUrl' => $path,
                'deleteUrl' => 'image-delete?name=' . $fileName,
                'deleteType' => 'POST',
            ];
        }
        return Json::encode($output);
    }

    protected function saveThumbPath($img, $save_path, $thumb_width = null, $thumb_height = null)
    {
        $thumb = Image::thumbnail($img, $thumb_width, $thumb_height, ImageInterface::THUMBNAIL_INSET);
        $thumb->save($save_path);
    }
}