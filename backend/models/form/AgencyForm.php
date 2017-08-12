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

    public function rules()
    {
        return [
            [['level', 'status', 'created_at', 'updated_at', 'deleted_at', 'level', 'pid'], 'integer'],
            [['sid', 'username', 'password', 'name',  'principal', 'principal_phone'], 'required', 'on' => 'create'],
            [['sid', 'username', 'password', 'name',  'principal', 'principal_phone'], 'required', 'on' => 'update'],
            ['imgs', 'validateEmptyImg', 'on'=> ['create', 'update']],
            [['imgs'], 'string'],
            [['username', 'password'], 'string', 'min'=> 6, 'max' => 16],
            [['username'], 'match', 'pattern' => PregRule::USERNAME],
            [['username'], 'unique', 'targetClass' => '\backend\models\Adminuser', 'message' => '用户名已存在', 'on' => ['create']],
            [['sid', 'username', 'password', 'name', 'status', 'principal', 'principal_phone'], 'required', 'on' => 'created_service'],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['sid', 'username', 'password', 'name', 'status', 'principal', 'principal_phone', 'imgs'],
            'created_service' => ['pid', 'username', 'password', 'name', 'status', 'principal', 'principal_phone'],
            'update' => ['sid', 'name', 'status', 'principal', 'principal_phone', 'imgs'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'username' => '登录账号',
            'password' => '登录密码',
            'head' => '展示头图',
            'attachment' => '服务商附件',
        ]);
    }
    /**
     * 添加服务商
     * @param $form
     * @return bool|mixed
     */
    public function addAgency()
    {
        if(!$this->validate()){
            return false;
        }

        $ids = explode(',', trim($this->imgs,','));
        if(count($ids) == 0){
            $this->addError('attachment', '请上传附件');
            return false;
        }
        return Yii::$app->db->transaction(function() use($ids)
        {
            //添加一个管理员用户
            $adminuserModel = new Adminuser();
            if(!$adminuserModel->addServiceUser($this, 3)){
                $this->addErrors($adminuserModel->getFirstErrors());
                throw new Exception("添加账号失败");
            }
            $this->owner_username = $this->username;
            $this->owner_id = $adminuserModel->id;
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
            $models =  ServiceImg::find()->where(['id'=>$ids])->all();
            foreach ($models as $model){
                $model->service_id = $this->id;
                $model->status = 1;
                $model->save();
            }
            //TODO::添加一个服务商的角色并绑定账号


            //关联角色和账户
            $items[] = Yii::$app->params['agency_role_name'];
            $id = $this->owner_id;
            $assign = new Assignment($id);
            if(!$assign->assign($items)){
                throw new Exception("分配角色失败");
            }
            \pd\admin\components\Helper::invalidate();

            if(!ServiceUser::add($id, $this->id)){
                throw new Exception("记录分配关系失败");
            }

            return $this;
        });
    }

    /**
     * 更新服务商
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