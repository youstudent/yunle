<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/26 - 下午5:51
 *
 */

namespace backend\models\form;


use backend\models\Banner;
use Yii;
use yii\base\Exception;

class BannerForm extends Banner
{
    public function addBanner($form)
    {
        if(!$this->load($form)){
            return false;
        }

        if(!$this->validate()){
            return false;
        }
        $bannerModel = &$this;
        return Yii::$app->db->transaction(function() use($bannerModel){
            $bannerModel->created_at = time();
            $bannerModel->updated_at = time();
            if(!$bannerModel->save()){
                throw new Exception('error');
            }
            return $bannerModel;
        });
    }
}