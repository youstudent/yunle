<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/15 - 上午11:26
 *
 */

namespace backend\models\form;

use backend\models\Adminuser;
use backend\models\BannerImg;
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

    public $head_id;
    public $atta_id;

    public $saleman_id;
    public $tags;


    public function rules()
    {
        return [
            [['name', 'principal', 'contact_phone', 'open_at', 'close_at', 'tags'], 'required'],
            [['level', 'status', 'created_at', 'updated_at', 'deleted_at', 'level', 'sid'], 'integer'],
            [['name', 'principal', 'contact_phone', 'introduction', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'string', 'max' => 256],
            [['sid', 'username', 'password', 'name', 'status', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'required', 'on' => 'create'],
            [['open_at', 'close_at', 'introduction'], 'string'],
            [['username', 'password'], 'string', 'min'=> 6, 'max' => 16],
            [['username'], 'unique', 'targetClass' => '\backend\models\Adminuser', 'message' => '用户名已存在', 'on' => ['create']],
            [['sid', 'name', 'status', 'address', 'lat', 'lng', 'open_at', 'close_at'], 'required', 'on' => 'created_service'],
            [['head_id', 'atta_id', 'tags'], 'safe']
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name', 'principal', 'contact_phone', 'level',  'introduction', 'address', 'lat', 'lng', 'username', 'password',  'level', 'sid', 'head_id', 'atta_id', 'tags'],
            'created_service' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng', 'username', 'password', 'open_at', 'close_at', 'level', 'sid'],
            'update' => ['name', 'principal', 'contact_phone', 'level', 'status', 'introduction', 'address', 'lat', 'lng', 'sid', 'head_id', 'atta_id', 'tags'],
        ];
    }

    public function attributeHints()
    {
        return [
            'username' => '登录账号将作为服务商使用<span style="color:red;">服务平台</span>的登录账号,服务商的账号不能直接在<span style="color:red;">服务端APP</span>直接使用',
            'password' => '最少6位，最长16位',
            'name' => '服务商名称',
            'principal' => '负责人名称',
            'contact_phone' => '客户的联系电话',
            'level' => '展示在客户端的服务商星级',
            'address' => '展示在客户端的服务商详细地址',
            'lat' => '服务商地址纬度,不建议直接填写',
            'lng' => '服务商地址经度,不建议直接填写',
            'head' => '服务商头图,有且只能有<span style="color:red;">一</span>张,请务必点击<span style="color:red;">上传</span>',
            'attachment' => '服务商附件，<span style="color:red;">最多传12张,大小不超过2mb,按住CTRL上传多图</span>，将展示在APP服务商详情',
            'sid' => '平台的客户经理',
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'username' => '登录账号',
            'password' => '登录密码',
            'head' => '展示头图',
            'attachment' => '服务商附件',
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

        if(count($this->head_id) != 1){
            $this->addError('head', '必须上传一张头像');
            return false;
        }

        if(count($this->atta_id) < 1 || count($this->atta_id) > 12){
            $this->addError('attachment', '附件只能上传1到12张');
            return false;
        }

        //添加一个管理员用户
        return Yii::$app->db->transaction(function()
        {
            $adminuserModel = new Adminuser();
            if(!$adminuserModel->addServiceUser($this, 2)){
                $this->addErrors($adminuserModel->getFirstErrors());
                throw new Exception("添加会员信息失败");
            }
            $admin_id = $adminuserModel->id;

            $this->owner_username = $this->username;
            $this->owner_id = $admin_id;
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
            $service_id = $this->id;
            //设置图片绑定
            foreach($this->head_id as $h){
                $m = ServiceImg::findOne($h);
                $m->service_id = $service_id;
                $m->status = 1;
                if(!$m->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }

            foreach($this->atta_id as $a){
                $m = ServiceImg::findOne($a);
                $m->service_id = $service_id;
                $m->status = 1;
                if(!$m->save()){
                    throw new Exception("绑定图片信息失败");
                }
            }
            if($this->tags){
                foreach($this->tags as $tag){
                    $model = new ServiceTag();
                    $model->service_id = $service_id;
                    $model->tag_id = $tag;
                    $model->created_at = time();
                    if(!$m->save()){
                        throw new Exception("绑定服务范畴失败");
                    }
                }
            }

            //关联角色和账户
            $items[] = Yii::$app->params['service_role_name'];

            $assign = new Assignment($admin_id);
            if(!$assign->assign($items)){
                throw new Exception("分配角色失败");
            }
            \pd\admin\components\Helper::invalidate();

            if(!ServiceUser::add($this->id, $admin_id, 1)){
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
            if(!$this->save()){
                throw new Exception("更新服务商信息失败");
            }

            //变更图片的绑定
            $old_head = ServiceImg::find()->where(['service_id'=>$this->id, 'status'=> 1, 'type'=>1])->select('id')->column();
            $reduces_head = array_diff($old_head, $this->head_id);
            foreach($reduces_head as $r){
                $model = ServiceImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $incsrease_head = array_diff($this->head_id, $old_head);
            foreach($incsrease_head as $i){
                $model = ServiceImg::findOne($i);
                $model->status = 1;
                $model->service_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }

            $old_atta = ServiceImg::find()->where(['service_id'=>$this->id, 'status'=> 1, 'type'=>0])->select('id')->column();
            $reduces_atta = array_diff($old_atta, $this->atta_id);
            foreach($reduces_atta as $r){
                $model = ServiceImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }

            $incsrease_atta = array_diff($this->atta_id, $old_atta);
            foreach($incsrease_atta as $i){
                $model = ServiceImg::findOne($i);
                $model->status = 1;
                $model->service_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }

            //获取以前的tags
            ServiceTag::deleteAll(['service_id'=>$this]);
            //清楚所有以前的tag，并重新设置
            foreach($this->tags as $tag){
                $model = new ServiceTag();
                $model->service_id = $this->id;
                $model->tag_id = $tag;
                $model->created_at = time();
                $model->save(false);
            }

            return $this;
        });
    }

    public static function getOne($id)
    {
        $model = ServiceForm::findOne($id);

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

    public  function getPic()
    {
        return $this->hasMany(ServiceImg::className(), ['service_id'=> 'id'])->where(['status'=> 1]);
    }

    public function getPicImg()
    {
        $arr = [];
        foreach($this->pic as $i){
            $arr[] = '<img src="'.Yii::$app->params['img_domain']. $i->thumb.'" />';
        }
        return $arr;
    }
}