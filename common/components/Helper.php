<?php
namespace common\components;
use backend\models\Adminuser;
use backend\models\AppMenu;
use backend\models\AppMenuWithout;
use backend\models\AppRole;
use backend\models\AppRoleAssign;
use backend\models\AuthAssignment;
use backend\models\AuthItemChild;
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
        $log_path = Yii::getAlias('@common') . '\runtime\log\jpush'. date('Y-m-d') . '.log';
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
    public static function getRolePrefix($service_id = null)
    {
        if(!$service_id){
            $service_id = static::byAdminIdGetServiceId(Yii::$app->user->identity->id);
        }
        return '_'.$service_id . '_';
    }

    public static function byCustomerManagerIdGetServiceIds($id)
    {
        $ids = Service::find()->where(['sid'=>$id])->select('id')->column();
        return $ids;
    }

    public static function byServiceIdGetServiceMemberIds($id)
    {
        $salesman_ids = User::find()->where(['pid'=>$id])->select('id')->column();
        $member_ids = Member::find()->where(['pid'=>$salesman_ids])->select('id')->column();
        return $member_ids;
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
    public static function byAdminIdGetAllServiceAdminId($id)
    {
        $service_id = static::byAdminIdGetServiceId($id);
        return ServiceUser::find()->where(['service_id'=>$service_id])->select('admin_id')->column();
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
            if(in_array($k, ['服务商'])){
                return 2;
            }
            if(in_array($k, ['代理商'])){
                return 3;
            }
        }
        return 3;
    }

    public static function getAdminRoleGroup($admin_id)
    {
        $manager = Yii::$app->authManager;
        $roles = $manager->getRolesByUser($admin_id);
        foreach($roles as $k => $role){
            if(in_array($k, ['管理员'])){
                return 1;
            }
            if(in_array($k, ['服务商'])){
                return 2;
            }
            if(in_array($k, ['代理商'])){
                return 3;
            }
        }
        return 3;
    }

    public static function bindService($admin_id, $service_id = null, $type = 0)
    {
        if(!$service_id){
            //获取当前登录用户的service_id
            $service_id = static::byAdminIdGetServiceId(Yii::$app->user->identity->id);
        }
        ServiceUser::add($service_id, $admin_id, $type);
    }
    public static function byIdGetRoleAllRoleName($id, $reserved = false, $divided = "|")
    {
        $manager = Yii::$app->authManager;
        $roles = $manager->getRolesByUser($id);
        $outRole = '';
        foreach($roles as $k => $role){
            if($reserved){
                $role_prefix = static::getRolePrefix();
                if(strpos($role->name, $role_prefix) === 0){
                    $role->name = ltrim($role->name, $role_prefix);
                }
            }
            $outRole = $role->name . $divided . $outRole;

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
                    $k = ltrim($k, Helper::getRolePrefix($service_id));
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


    public static function createDefaultRole($service_id)
    {
        $model = new AppRole();
        $model->name = '默认角色组';
        $model->description = '添加时系统生成的，将作为默认的角色组';
        $model->service_id = $service_id;
        return $model->save();
    }
    public static function bindAppUserDefaultRole($user_id, $service_id)
    {
        //获取服务商默认的角色组
        $role_id = AppRole::findOne(['service_id'=>$service_id])->id;
        $model = new AppRoleAssign();
        $model->user_id = $user_id;
        $model->role_id = $role_id;
        return $model->save();
    }

    public static function unBindAppUserRole($user_id)
    {
        //获取服务商默认的角色组
        AppRoleAssign::deleteAll(['user_id'=>$user_id]);
        return true;
    }

    public static function bindAppUserRole($user_id, $role_id)
    {
        $model = new AppRoleAssign();
        $model->user_id = $user_id;
        $model->role_id = $role_id;
        return $model->save();
    }

    /**
     * 获取用户所有的菜单
     */
    public static function getAppUserMenu($user_Id)
    {
        $user = User::findOne($user_Id);
        $menus = AppMenu::find()->select('id,name,key,"1" as `show`')->indexBy('id')->asArray()->all();
        $role_id = AppRoleAssign::findOne(['user_id'=>$user_Id])->role_id;
        $out_menu = AppMenuWithout::find()->where(['service_id'=>$user->pid, 'role_id'=>$role_id])->select('id')->column();
        foreach($menus as $key => $menu){
            if(in_array($menu['id'], $out_menu)){
                unset($menus[$key]);
            }
        }
        return array_merge($menus);
    }

    public static function getLoginMemberServiceId()
    {
        $user_id = Yii::$app->user->identity->id;
        return static::byAdminIdGetServiceId($user_id);
    }

    public static function getCustomerManager()
    {
        $permission = '用户管理-服务商-所属服务商列表';
        $roles = AuthItemChild::find()->where(['child'=>$permission])->select('parent')->column();
        //获取对应角色的user_Id;
        $ids = AuthAssignment::find()->where(['item_name'=> $roles])->select('user_id')->column();
        $data = Adminuser::find()->where(['id'=>$ids])->indexBy('id')->select('name,id')->column();
        return $data;
    }
}