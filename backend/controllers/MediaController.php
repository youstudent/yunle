<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/7 - 下午9:05
 *
 */

namespace backend\controllers;


use backend\models\form\AgencyForm;
use backend\models\form\ServiceForm;
use backend\models\Service;
use backend\models\ServiceImg;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\UploadedFile;

class MediaController extends BackendController
{

    public function actionImageUpload($model = null, $type = null)
    {
        switch($model){
            case 'service':
                $model = new ServiceForm();
                $directory = Yii::getAlias('@common/static/upload/service') . DIRECTORY_SEPARATOR;
                $sub_dir = 'service';
                $attribute = $type == 'head' ? 'head' : 'attachment';
                break;
            case 'agency':
                $model = new AgencyForm();
                $directory = Yii::getAlias('@common/static/upload/agency') . DIRECTORY_SEPARATOR;
                $sub_dir = 'agency';
                $attribute = 'attachment';
                break;
        }
        $imageFile = UploadedFile::getInstance($model, $attribute);
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '/upload/'. $sub_dir . DIRECTORY_SEPARATOR . $fileName;
                $return = [
                    'files' => [
                        [
                            'name' => $fileName,
                            'size' => $imageFile->size,
                            'url' =>  $path,
                            'thumbnailUrl' =>  $path,
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
}