<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/12 - 下午4:27
 *
 */

namespace backend\models\form;


use backend\models\Adminuser;
use pd\admin\models\Assignment;
use Yii;
use yii\base\Model;

class Role extends Model
{
    public $user_id;
    public $username;
    public $name;
    public $old_item_name;
    public $item_name;
    public $able_item_name = [];

    public function rules()
    {
        return [
            [['user_id', 'username', 'old_item_name', 'item_name'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'name' => '姓名',
            'item_name' => '角色',
        ];
    }

    public function __construct($id, array $config = [])
    {
        parent::__construct($config);

        $user = Adminuser::findOne($id);
        $manager = Yii::$app->getAuthManager();
        $roles = $manager->getRolesByUser($id);
        if($roles){
            $this->item_name = $this->old_item_name  = current($roles)->name;
        }
        $this->user_id = $id;
        $this->username = $user->username;
        $this->name = $user->name;

    }


    public function modifyRole()
    {
        $model = new Assignment($this->user_id);
        if($this->old_item_name){
            $model->revoke([$this->old_item_name]);
        }
        $model->assign([$this->item_name]);
        return true;
    }
}