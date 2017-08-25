<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%app_role_assign}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 */
class AppRoleAssign extends \yii\db\ActiveRecord
{
    public $username;
    public $name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%app_role_assign}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'required'],
            [['user_id', 'role_id'], 'integer'],
            [['user_id', 'role_id'], 'unique', 'targetAttribute' => ['user_id', 'role_id'], 'message' => 'The combination of User ID and Role ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户',
            'role_id' => '角色id',
            'username' => '用户名',
            'name' => '名字'
        ];
    }

    public static function getOne($id)
    {
        $user = User::findOne($id);
        $model = AppRoleAssign::findOne(['user_id'=>$id]);
        if(!isset($model)){
            $model = new AppRoleAssign();
        }
        $model->username = $user->username;
        $model->name = $user->name;

        return $model;
    }

    public static function dropDownListHtml($service_id, $user_id)
    {
        $data = AppRole::find()->where(['service_id'=>$service_id])->select('name,id')->indexBy('id')->column();
        $assigned_id = 0;
        if($user_id){
            $assigned_id =AppRoleAssign::findOne(['service_id'=>$service_id, 'user_id'=>$user_id]);
        }

        $html = '';
        if($data){
            foreach($data as $k => $v){
                if($assigned_id !=0 && $k === intval($assigned_id)){
                    $html .= "<option value=".$k ." selected>".$v."</options>";
                }else{
                    $html .= "<option value=".$k .">".$v."</options>";
                }

            }
        }else{
            $html = '<option value="">当前服务商，无角色</option>';
        }
        return $html;
    }
}
