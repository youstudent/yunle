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
use backend\models\ServiceUser;
use common\components\Helper;
use common\models\ServiceTag;
use pd\admin\models\Assignment;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

class ServiceForm  extends Service
{
    public $username;
    public $password;

    public $head;
    public $attachment;

    public $heads;
    public $attachments;

    public $saleman_id;
    public $tags;


    public function rules()
    {
        return [
            [['name', 'principal', 'contact_phone', 'open_at', 'close_at'], 'required'],
            [['level', 'status', 'created_at', 'updated_at', 'deleted_at', 'level', 'sid'], 'integer'],
            [['name', 'principal', 'contact_phone', 'introduction', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'string', 'max' => 256],
            [['sid', 'username', 'password', 'name', 'status', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'required', 'on' => 'create'],
            [['open_at', 'close_at', 'introduction', 'heads', 'attachments'], 'string'],
            [['username', 'password'], 'string', 'min'=> 6, 'max' => 16],
            [['username'], 'unique', 'targetClass' => '\backend\models\Adminuser', 'message' => '用户名已存在', 'on' => ['create']],
            [['sid', 'name', 'status', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'required', 'on' => 'created_service'],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'principal', 'contact_phone', 'level',  'introduction', 'address', 'lat', 'lng', 'username', 'password',  'level', 'sid', 'heads', 'attachments'],
            'created_service' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng', 'username', 'password', 'open_at', 'close_at', 'level', 'sid'],
            'update' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng', 'sid', 'heads', 'attachments'],
        ];
    }

    public function attributeHints()
    {
        return [
            'username' => '登录账号将作为服务商使用服务平台的登录账号,服务商的账号不能直接在服务端APP直接使用',
            'password' => '最少6位，最长16位',
            'name' => '服务商名称',
            'principal' => '负责人名称',
            'contact_phone' => '客户的联系电话',
            'level' => '展示在客户端的服务商星级',
            'address' => '展示在客户端的服务商详细地址',
            'lat' => '服务商地址纬度,不建议直接填写',
            'lng' => '服务商地址经度,不建议直接填写',
            'heads' => '服务商头像',
            'attachments' => '服务商附件，最多传11张，将展示在APP服务商详情',
            'sid' => '平台的客户经理',
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'username' => '登录账号',
            'password' => '登录密码',
            'head' => '展示头图',
            'cover' => '服务商附件',
            'tags' => '服务范畴',
        ]);
    }
    /**
     * 添加服务商
     * @param $form
     * @return bool|mixed
     */
    public function addService()
    {
        if(!$this->validate()){
            return false;
        }

        $attachment_ids = explode(',', trim($this->attachments,','));
        if(count($attachment_ids) == 0){
            $this->addError('attachment', '请上传附件');
            return false;
        }
        $head_ids = explode(',', trim($this->heads,','));
        if(count($head_ids) == 0){
            $this->addError('head', '请上传头像');
            return false;
        }

        //添加一个管理员用户
        return Yii::$app->db->transaction(function() use($attachment_ids, $head_ids)
        {
            $adminuserModel = new Adminuser();
            if(!$adminuserModel->addServiceUser($this, 2)){
                $this->addErrors($adminuserModel->getFirstErrors());
                throw new Exception("添加会员信息失败");
            }

            $this->owner_username = $this->username;
            $this->owner_id = $adminuserModel->id;
            $this->type=1;
            $this->pid = $this->sid;
            $this->scenario = 'created_service';
            $this->created_at = time();
            $this->updated_at = time();
            $this->status = 1;
            $this->open_at = "9:30";
            $this->close_at = "18:30";
            if(!$this->save()){
                throw new Exception("添加会员信息失败");
            }

            //设置图片绑定
            $models =  ServiceImg::find()->where(['id'=>$attachment_ids])->all();
            foreach ($models as $model){
                $model->service_id = $this->id;
                $model->status = 1;
                $model->type =0;
                if(!$model->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }
            $models =  ServiceImg::find()->where(['id'=>$head_ids])->all();
            foreach ($models as $model){
                $model->service_id = $this->id;
                $model->status = 1;
                $model->type =1;
                if(!$model->save()){
                    throw new Exception("绑定附件信息失败");
                }
            }

            $this->tags = Yii::$app->request->post('ServiceForm')['tags'];
            foreach($this->tags as $tag){
                $model = new ServiceTag();
                $model->service_id = $this->id;
                $model->tag_id = $tag;
                $model->created_at = time();
                $model->save(false);
            }

            //关联角色和账户
            $items[] = Yii::$app->params['service_role_name'];
            $id = $this->owner_id;
            $assign = new Assignment($id);
            if(!$assign->assign($items)){
                throw new Exception("分配角色失败");
            }
            \pd\admin\components\Helper::invalidate();

            if(!ServiceUser::add($id, $this->id)){
                throw new Exception("记录分配关系失败");
            }

             if(!Helper::createDefaultRole($this->id)){
                 throw new Exception("分配默认角色组失败");
             }

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

        $imgs = ServiceImg::find()->where(['service_id'=>$id, 'type'=> 1])->select('id')->column();
        $model->heads = implode(",",$imgs);

        $imgs = ServiceImg::find()->where(['service_id'=>$id, 'type'=> 0])->select('id')->column();
        $model->attachments = implode(",",$imgs);


        $tags = ServiceTag::find()->where(['service_id'=>$id])->select('tag_id')->column();
        $model->tags = $tags;

        return $model;
    }

    /**
     * 上传土图片要用到的
     * @param $data
     * @param string $type
     * @return ServiceImg|null
     */
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