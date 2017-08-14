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
}
