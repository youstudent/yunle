<?php
/**
 * User: harlen-angkemac
 * Date: 2017/7/15 - 上午11:26
 *
 */

namespace backend\models\form;

use backend\models\Adminuser;
use backend\models\Agency;
use backend\models\ServiceImg;
use backend\models\ServiceUser;
use common\components\Helper;
use pd\admin\models\Assignment;
use pd\helpers\PregRule;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

class AgencyForm  extends Agency
{
    public $username;
    public $password;

    public $attachment;
    public $imgs;

    public $saleman_id;
    public $imgs_id;
    public $atth_id;

    public function rules()
    {
        return [
            [['level', 'status', 'created_at', 'updated_at', 'deleted_at', 'level', 'pid'], 'integer'],
            [['sid', 'username', 'password', 'name',  'principal', 'principal_phone'], 'required', 'on' => 'create'],
            [['sid', 'username', 'password', 'name',  'principal', 'principal_phone'], 'required', 'on' => 'update'],
            ['imgs', 'validateEmptyImg', 'on'=> ['create', 'update']],
            [['imgs'], 'string'],
            [['principal_phone'],'match','pattern'=>'/^((13[0-9])|(15[^4])|(18[0,2,3,5-9])|(17[0-8])|(147))\\d{8}$/'],
            //[['principal_phone'], 'string'],
            [['username', 'password'], 'string', 'min'=> 6, 'max' => 16],
            [['username'], 'match', 'pattern' => PregRule::USERNAME],
            [['username'], 'unique', 'targetClass' => '\backend\models\Adminuser', 'message' => '用户名已存在', 'on' => ['create']],
            [['sid', 'username', 'password', 'name', 'status', 'principal', 'principal_phone'], 'required', 'on' => 'created_service'],
            [['saleman_id','atth_id'],'safe']
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['sid', 'username', 'password', 'name', 'status', 'principal', 'principal_phone', 'imgs'],
            'created_service' => ['pid', 'username', 'password', 'name', 'status', 'principal', 'principal_phone'],
            'update' => ['sid', 'name', 'status', 'principal', 'principal_phone', 'imgs', 'atth_id'],
        ];
    }

    public function attributeHints()
    {
        return [
            'username' => '登录账号将作为代理商使用服务平台的登录账号,代理商的账号不能直接在服务端APP直接使用',
            'password' => '最少6位，最长16位',
            'name' => '代理商名称',
            'principal' => '负责人名称',
            'principal_phone' => '负责人名称的联系电话',
            'attachments' => '代理商附件，最多传11张，将展示在APP代理商详情',
            'sid' => '平台的客户经理',
            'imgs' => '代理商附件，<span style="color:red;">最多传12张,大小不超过2mb,按住CTRL上传多图</span>，将展示在APP代理商详情',
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'username' => '登录账号',
            'password' => '登录密码',
            'head' => '展示头图',
            'attachment' => '服务商附件',
            'imgs' => '代理商图片',
        ]);
    }
    /**
     * 添加服务商
     * @param $form
     * @return bool|mixed
     */
    public function addAgency($data)
    {
        if(!$this->validate()){
            return false;
        }
        $ids = explode(',', trim($this->imgs,','));
        if(empty($data)){
            $this->addError('username', '请上传附件');
            return false;
        }
        return Yii::$app->db->transaction(function() use($data)
        {
            //添加一个管理员用户
            $adminuserModel = new Adminuser();
            if(!$adminuserModel->addServiceUser($this, 3)){
                $this->addErrors($adminuserModel->getFirstErrors());
                throw new Exception("添加账号失败");
            }
            $admin_id = $adminuserModel->id;

            $this->owner_username = $this->username;
            $this->owner_id = $admin_id;
            $this->type = 2;
            $this->scenario = 'created_service';
            $this->created_at = time();
            $this->updated_at = time();
            $this->status = 1;
            $this->open_at = "9:30";
            $this->close_at = "18:30";
            if(!$this->save()){
                throw new Exception("添加代理商失败");
            }

            //设置图片绑定
            $models =  ServiceImg::find()->where(['id'=>$data])->all();
            foreach ($models as $model){
                $model->service_id = $this->id;
                $model->status = 1;
                $model->save();
            }
            //TODO::添加一个服务商的角色并绑定账号


            //关联角色和账户
            $items[] = Yii::$app->params['agency_role_name'];
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
     * 更新代理商
     * @return bool|mixed
     */
    public function updateAgency()
    {

        //编辑用户的信息
        return Yii::$app->db->transaction(function()
        {
            if(!$this->save()){
                throw new Exception("更新代理商信息失败");
            }
    
            $old_atta = ServiceImg::find()->where(['service_id'=>$this->id, 'status'=> 1, 'type'=>0])->select('id')->column();
            $reduces_atta = array_diff($old_atta, $this->atth_id);
            foreach($reduces_atta as $r){
                $model = ServiceImg::findOne($r);
                $model->status = 0;
                if(!$model->save()){
                    throw new Exception('解除图片绑定失败');
                }
            }
            $incsrease_atta = array_diff($this->atth_id, $old_atta);
            foreach($incsrease_atta as $i){
                $model = ServiceImg::findOne($i);
                $model->status = 1;
                $model->service_id = $this->id;
                if(!$model->save()){
                    throw new Exception('增加图片绑定失败');
                }
            }
            return $this;
        });
    }

    public static function getOne($id)
    {
        $model = AgencyForm::findOne($id);

        $imgs = ServiceImg::find()->where(['service_id'=>$id, 'type'=> 0])->select('id')->column();
        $model->imgs = implode(",",$imgs);


        return $model;

    }

    public function validateEmptyImg($attribute, $params)
    {
        //TODO::不知道为啥没生效
        if(!$this->hasErrors()){
            if($this->imgs == ''){
                $this->addError('attachment', '请上传附件');
            }
        }
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