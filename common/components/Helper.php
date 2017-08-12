<?php
namespace common\components;
use backend\models\Member;
use backend\models\ServiceUser;
use backend\models\User;
use common\models\Service;
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
     * 给会员端指定用户发送消息或通知
     * @param $member_id
     * @param $message
     * @param string $type
     * @param null $title
     * @param null $content_type
     * @param null $extras
     * @return bool
     */
    public static function pushMemberMessage($member_id, $message, $type = 'alert',  $title=null, $content_type=null, $extras = null)
    {
        try{
            $member = Member::findOne($member_id);
            $client = Helper::createjPush('member');
            $pusher = $client->push();
            $pusher->setPlatform('all');
            $pusher->addAlias(strval($member->phone));
            if($type == 'alert'){
                $pusher->setNotificationAlert($message);
            }else{
                $pusher->setMessage($message, $title, $content_type, $extras);
            }
            $res = $pusher->send();
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            // try something here

            return false;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            // try something here

            return false;
        }
        return true;
    }

    /**
     * 给会员端所有用户发送消息或通知
     * @param $message
     * @param string $type
     * @param null $title
     * @param null $content_type
     * @param null $extras
     * @return bool
     */
    public static function pushAllMemberMessage($message, $type = 'alert',  $title=null, $content_type=null, $extras = null)
    {
        try{
            $client = Helper::createjPush('member');
            $pusher = $client->push();
            $pusher->setPlatform('all');
            $pusher->addAllAudience();
            if($type == 'alert'){
                $pusher->setNotificationAlert($message);
            }else{
                $pusher->setMessage($message, $title, $content_type, $extras);
            }
            $res = $pusher->send();
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            // try something here

            return false;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            // try something here

            return false;
        }
        return true;
    }


    /**
     * 给指定服务端用户发送消息或通知
     * @param $member_id
     * @param $message
     * @param string $type
     * @param null $title
     * @param null $content_type
     * @param null $extras
     * @return bool
     */
    public static function pushServiceMessage($member_id, $message, $type = 'alert',  $title=null, $content_type=null, $extras = null)
    {
        try{
            $member = User::findOne($member_id);
            $client = Helper::createjPush('service');
            $pusher = $client->push();
            $pusher->setPlatform('all');
            $pusher->addAlias(strval($member->username));
            if($type == 'alert'){
                $pusher->setNotificationAlert($message);
            }else{
                $pusher->setMessage($message, $title, $content_type, $extras);
            }
            $res = $pusher->send();
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            // try something here

            return false;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            // try something here

            return false;
        }
        return true;
    }

    /**
     * 给所有服务端发啊消息
     * @param $message
     * @param string $type
     * @param null $title
     * @param null $content_type
     * @param null $extras
     * @return bool
     */
    public static function pushAllServiceMessage($message, $type = 'alert', $title=null, $content_type=null, $extras = null)
    {
        try{
            $client = Helper::createjPush('service');
            $pusher = $client->push();
            $pusher->setPlatform('all');
            $pusher->addAllAudience();
            if($type == 'alert'){
                $pusher->setNotificationAlert($message);
            }else{
                $pusher->setMessage($message, $title, $content_type, $extras);
            }
            $res = $pusher->send();
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            // try something here
            echo '错误信息:' .print_r($e);
            return false;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            // try something here
            echo '错误信息:' .print_r($e);
            return false;
        }
        return true;
    }


    /**
     * 获取服务商的角色前缀
     * @param $service_id
     * @param $service_name
     * @return string
     */
    public static function getRolePrefix($service_id, $service_name = null)
    {
        return '_'.$service_id . '_';
    }

    public static function byCustomerManagerIdGetServiceIds($id)
    {
        $ids = Service::find()->where(['sid'=>$id])->select('id')->column();
        return $ids;
    }

    public static function byCustomerManagerIdGetServiceMemberIds($id)
    {
        $service_ids = Service::find()->where(['sid'=>$id])->select('id')->column();
        $salesman_ids = User::find()->where(['pid'=>$service_ids])->select('id')->column();
        $member_ids = Member::find()->where(['pid'=>$salesman_ids])->select('id')->column();
        return $member_ids;
    }

    public static function byAdminIdGetServiceId($id)
    {
        return ServiceUser::find()->where(['admin_id'=>$id])->select('service_id')->scalar();
    }

        /**
     * 用service的登录账号Id获取他的服务商id
     * @param $id
     * @param $is_login_id
     * @return array
     */
    public static function byServiceLoginIdGetMemberIds($id, $is_login_id = true)
    {
        if($is_login_id){
            $id = Service::find()->where(['owner_id'=> $id])->select('id')->scalar();
        }
        $member_ids = Member::find()->where(['pid'=>$id])->select('id')->column();
        return $member_ids;
    }

    public static function getLoginMemberRoleGroup()
    {
        $id = Yii::$app->user->identity->id;
        $manager = Yii::$app->authManager;
        $roles = $manager->getRolesByUser($id);
        foreach($roles as $k => $role){
            if(in_array($k, ['管理员'])){
                return 1;
            }
            if(in_array($k, ['服务商', '代理商'])){
                return 2;
            }
        }
        return 2;
    }

    public static function byIdGetRoleAllRoleName($id, $reserved = false, $divided = "|")
    {
        $manager = Yii::$app->authManager;
        $roles = $manager->getRolesByUser($id);
        $outRole = '';
        foreach($roles as $k => $role){
            $outRole = $k . $divided . $outRole;
        }
        return rtrim($outRole, '|');
    }

    /**
     * 获取所有角色
     * @param null $service_id
     * @return \yii\rbac\Role[]
     */
    public static function getAllRoleName($service_id = null)
    {
        $manager = Yii::$app->authManager;
        $roles = $manager->getRoles();
        $out_role = [];
        //开始过滤
        if($service_id){
            $role_prefix = static::getRolePrefix($service_id);
            foreach($roles as $k => $name){
                if(strpos($k, $role_prefix) === 0){
                    $out_role[$k] = $k;
                }
            }
        }else{
            foreach($roles as $k => $name){
                if(strpos($k, '_') === false && !in_array($k, ['代理商', '服务商'])){
                    $out_role[$k] = $k;
                }
            }
        }

        return $out_role;

    }

    /**
     * 获取登录用户自己的或者自己所属的营业信息
     * @return null
     */
    public static function userService()
    {
        if(!Yii::$app->user->identity){
            return null;
        }
        $id = Yii::$app->user->identity->id;



        $model = Service::findOne($id);

        return [$model->id => $model->name];
    }



}