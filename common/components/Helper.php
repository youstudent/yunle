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

    /**
     * 生成一个消息推送构造器
     * @param $app_id
     * @return bool|\JPush\PushPayload
     */
    public static function  createjPush($app_id= 'member')
    {
        $setting = Helper::getSystemSetting();
        $app_key = ArrayHelper::getValue($setting, $app_id == 'member' ? 'jpush_member_appkey' : 'jpush_service_appkey', '');
        $master_secret = ArrayHelper::getValue($setting, $app_id == 'member' ? 'jpush_member_master_secret' : 'jpush_service_master_secret', '');

        if(empty($app_key) || empty($master_secret)){
            return false;
        }
        $log_path = \Yii::getAlias('@common') . '\runtime\log\jpush.log';
        //init
        $client = new \JPush\Client($app_key, $master_secret, $log_path);


        return $client->push();
//        $pusher->setPlatform('all');
//        $pusher->addAllAudience();
//        $pusher->setNotificationAlert('Hello, JPush');
//        try {
//            $pusher->send();
//        } catch (\JPush\Exceptions\JPushException $e) {
//            // try something else here
//            print $e;
//        }

    }

}