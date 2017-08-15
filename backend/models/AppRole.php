<?php

namespace backend\models;

use common\components\Helper;
use Yii;

/**
 * This is the model class for table "{{%app_role}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $service_id
 */
class AppRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%app_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'service_id'], 'required'],
            [['id', 'service_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['service_id'], 'notAdmin']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '角色名',
            'description' => '描述',
            'service_id' => 'Service ID',
        ];
    }

    public function notAdmin($attributes, $params)
    {
        if(!$this->hasErrors()){
            $group = Helper::getAdminRoleGroup($this->service_id);
            if($group == 1){
                $this->addError('username', '这里提示你错误其实你告诉你,也许你不该在这里添加角色');
            }
        }
    }


}
