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
    /**
     * 获取系统设置
     * @param bool $reload_cache
     * @return array|mixed
     */
    public static function getSystemSetting($reload_cache = false)
    {
        return Helper::getServiceSetting(0, $reload_cache);
    }

    /**
     * 获取服务商的设置
     * @param $service_id
     * @param $reload_cache
     * @return array|mixed
     */
    public static function getServiceSetting($service_id, $reload_cache)
    {
        if($reload_cache || !Helper::getCacheServiceSetting($service_id)){
            $setting = Setting::find()->where(['service_id'=>$service_id])->indexBy('name')->select('value,name')->column();
            Yii::$app->cache->set('service_setting_'. $service_id, $setting);
            return $setting;
        }
        return Helper::getCacheServiceSetting($service_id);

    }

    /**
     * 从缓存获取服务商的设置
     * @param $service_id
     * @return mixed
     */
    public static function getCacheServiceSetting($service_id)
    {
        return Yii::$app->cache->get('service_setting_'. $service_id);
    }

    /**
     * 生成一个消息推送构造器
     * @param string $app_id
     * @return bool|\JPush\Client
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


        return $client;

    }

    /**
     * 获取角色前缀
     * @param $type
     * @param $pid
     * @return string
     */
    public static function getRolePrefix($type =null, $pid = null)
    {
        $session = Yii::$app->session->get('LOGIN_MEMBER');
        $type = $type ? $type : $session['platform_type'];

        $pid = $pid ? $pid : $session['platform_id'];
        return $name_prefix = $type == 1 ? $pid . '_platform_' : $pid . '_app_';
    }
}