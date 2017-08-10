<?php
namespace common\components;
use backend\models\Adminuser;
use backend\models\AuthAssignment;
use backend\models\AuthItem;
use backend\models\Member;
use backend\models\User;
use common\models\Service;
use common\models\Setting;
use Yii;
use yii\base\Exception;
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

    public static function pushMemberMessage($member_id, $message)
    {
        $member = Member::findOne($member_id);


        $client = Helper::createjPush('member');
        $pusher = $client->push();
        $pusher->setPlatform('all');
        $pusher->addAlias($member->phone);
        $pusher->setNotificationAlert($message);
        try{
            $res = $pusher->send();
        }catch (\JPush\Exceptions\JPushException $e) {
            //TODO 记录个日志
        }
        return $res;
    }

    public static function pushServiceMessage($member_id, $message)
    {
        $member = Adminuser::findOne($member_id);


        $client = Helper::createjPush('member');
        $pusher = $client->push();
        $pusher->setPlatform('all');
        $pusher->addAlias($member->username);
        $pusher->setNotificationAlert($message);
        try{
            $res = $pusher->send();
        }catch (\JPush\Exceptions\JPushException $e) {
            //TODO 记录个日志
        }
        return $res;
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


    /**
     * 根据平台id创建角色
     * @param $platform_id
     * @param $name
     * @param string $platform
     * @return bool|string
     * @throws Exception
     */
    public static function createRole($platform_id, $name , $platform = 'platform')
    {
        if(!in_array($platform, ['platform', 'app'])){
            return false;
        }
        $role_name = $platform_id . '_' . $platform . '_' . $name;
        if(AuthItem::findOne(['name'=>$role_name, 'type'=>1])){
            throw new Exception('角色重复，创建失败');
        }
        $model = new AuthItem();
        $model->scenario = 'create';
        $model->description = '添加代理商自动生成的角色';
        $model->name = $role_name;
        $model->type = 1;
        $model->save();
        return $role_name;
    }

    public static function bindRole($user_id, $role_name)
    {
        $model = new AuthAssignment();
        $model->user_id = $user_id;
        $model->item_name = $role_name;
        $model->created_at = time();
        $model->save();
        return true;
    }

    /**
     * 获取指定角色的所有账户数据
     * @param $role_name
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRoleUser($role_name)
    {
        list($platform_id, $platform, $name) = explode('_', $role_name);

        $query = AuthAssignment::find()->alias('a')->where(['item_name'=> $role_name])->select('u.username,u.id');



        //$query->joinWith('adminUser')->

        if($platform == 'platform'){
            $query->innerJoin(Adminuser::tableName() . ' u', 'u.id = a.user_id');
        }else{
            $query->innerJoin(User::tableName() . ' u', 'u.id = a.user_id');
        }

        $data = $query->indexBy('id')->column();

       return $data ? $data : [];
    }

    /**
     * 判断用户是不是指定角色
     * @param $id
     * @param $role_name
     * @param int $platform
     * @param int $is_app
     * @return bool
     */
    public static function isRole($id, $role_name, $platform = 1, $is_app = 0)
    {
        //$full_role_name = $platform ? $platform : $id . $is_app ? '_app_' : '_platform_' . $role_name;
        //我也不知道为什么要这么写。但是上面那么些就是要出错
        $full_role_name = $platform ? $platform : $id;
        $full_role_name .= $is_app ? '_app_' : '_platform_' . $role_name;

        $one = AuthAssignment::findOne(['item_name'=>$full_role_name, 'user_id'=>$id]);

        return $one ? true : false;
    }


    public static function loginIsRole($role_name, $platform = 1, $is_app = 0)
    {
       if(!Yii::$app->user->identity){
           return null;
       }
       $id = Yii::$app->user->identity->id;

       return Helper::isRole($id, $role_name, $platform, $is_app);

    }

    public static function isAdmin()
    {
        return Helper::loginIsRole('管理员') or Helper::loginIsRole('超级管理员');
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