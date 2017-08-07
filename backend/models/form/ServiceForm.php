<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/15 - 上午11:26
 *
 */

namespace backend\models\form;

use backend\models\Adminuser;
use backend\models\Service;
use backend\models\ServiceImg;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

class ServiceForm  extends Service
{
    public $username;
    public $password;
    public $cover;

    public $head;
    public $attachment;
    public $saleman_id;

    public function rules()
    {
        return [
            [['name', 'principal', 'contact_phone', 'open_at', 'close_at'], 'required'],
            [['level', 'status', 'created_at', 'updated_at', 'deleted_at', 'level', 'pid'], 'integer'],
            [['name', 'principal', 'contact_phone', 'introduction', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'string', 'max' => 256],
            [['pid', 'username', 'password', 'name', 'status', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'required', 'on' => 'create'],
            [['open_at', 'close_at', 'introduction'], 'string'],
            [['username', 'password'], 'string', 'min'=> 6, 'max' => 16],
            [['username'], 'unique', 'targetClass' => '\backend\models\Adminuser', 'message' => '用户名已存在', 'on' => ['create']],
            [['pid', 'name', 'status', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'required', 'on' => 'created_service'],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng', 'username', 'password', 'open_at', 'close_at', 'level'],
            'created_service' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng', 'username', 'password', 'open_at', 'close_at', 'level'],
            'update' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'username' => '登录账号',
            'password' => '登录密码',
            'head' => '展示头图',
            'cover' => '服务商附件',
        ]);
    }
    /**
     * 添加服务商
     * @param $form
     * @return bool|mixed
     */
    public function addService()
    {

        //添加一个管理员用户
        return Yii::$app->db->transaction(function()
        {
            $adminuserModel = new Adminuser();
            if(!$adminuserModel->addServiceUser($this)){
                $this->addErrors($adminuserModel->getFirstErrors());
                throw new Exception("添加会员信息失败");
            }
            $this->scenario = 'created_service';
            $this->created_at = time();
            $this->updated_at = time();
            $this->status = 1;
            $this->open_at = "9:30";
            $this->close_at = "18:30";
            if(!$this->save()){
                throw new Exception("添加会员信息失败");
            }

            //TODO::添加一个服务商的角色并绑定账号
            return $this;
        });
    }

    /**
     * 更新服务商
     * @return bool|mixed
     */
    public function updateService()
    {

        //编辑用户的信息
        return Yii::$app->db->transaction(function()
        {
            $adminuser = new Adminuser();
            if(!$adminuser->updateServiceUser($this)){
                throw new Exception("更新服务商信息失败");
            }
            //处理图片变更, 对比新旧，删除旧的部分

            if(!$this->save()){
                throw new Exception("更新服务商信息失败");
            }
            return $this;
        });
    }

    public static function getOne($id)
    {
        $model = ServiceForm::findOne($id);
        $model->username = 'sssxxxx';
        return $model;
    }

    public function saveImg($data, $type = 'head')
    {
        $model = new ServiceImg();
        $model->img_path = $data['files'][0]['url'];
        $model->thumb = $data['files'][0]['thumbnailUrl'];
        $model->type = $type == 'head' ? 1 : 0;
        $model->status = 0;
        $model->size = $data['files'][0]['size'];
        $model->img = $data['files'][0]['name'];
        if(!$model->save()){
            return null;
        }
        return $model;
    }
}