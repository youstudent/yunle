<?php

namespace backend\models;

use common\components\Helper;
use Yii;

/**
 * This is the model class for table "{{%auth_assignment}}".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 * @property integer $type
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    public $username;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at', 'type', 'user_id'], 'integer'],
            [['item_name'], 'string', 'max' => 64],
           // [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'type' => '平台。 1 平台 2 app',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    public function getAdminUser()
    {
        return $this->hasOne(Adminuser::className(), ['id'=> 'user_id']);
    }

    public function getServiceUser()
    {
        return $this->hasOne(User::className(), ['id'=> 'user_id']);
    }

    public static function assignRole($user_id, $type)
    {
        $model = AuthAssignment::findOne(['user_id'=>$user_id, 'type'=>$type]);
        if(!$model){
            $model = new AuthAssignment();
            $model->username = $type == 1 ? AdminUser::findOne($user_id)->username : User::findOne($user_id)->username;
        }else{
            $model->username = $type == 1 ? $model->adminUser->username : $model->ServiceUser->username;
        }

        return $model;
    }

    public  function modifyRole($type)
    {
        $this->user_id = AdminUser::findOne(['username'=>$this->username])->id;
        $this->item_name = Helper::getRolePrefix() . $this->item_name;
        $this->created_at = time();
        if(!$this->save()){
            return false;
        }
        return $this;
    }
}
