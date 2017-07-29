<?php
namespace common\components;
use common\models\Setting;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * User: harlen-angkemac
 * Date: 2017/7/22 - 下午5:22
 *
 */
class Helper
{
    public static function getSystemSetting($reload_cache = false)
    {
        return Helper::getServiceSetting(0, $reload_cache);
    }

    public static function getServiceSetting($service_id, $reload_cache)
    {
        if($reload_cache || !Helper::getCacheServiceSetting($service_id)){
            $setting = Setting::find()->where(['service_id'=>$service_id])->indexBy('name')->select('value,name')->column();
            Yii::$app->cache->set('service_setting_'. $service_id, $setting);
            return $setting;
        }
        return Helper::getCacheServiceSetting($service_id);

    }

    public static function getCacheServiceSetting($service_id)
    {
        return Yii::$app->cache->get('service_setting_'. $service_id);
    }

}