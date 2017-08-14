<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%service_user}}".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property integer $service_id
 * @property integer $type
 */
class ServiceUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'service_id', 'type'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => '关联adminuser表id',
            'service_id' => '关联服务商的id',
            'type' => '账户的性质，1是服务商的主拥有者',
        ];
    }

    public static function add($service_id, $admin_id, $type = 0)
    {
        $model = new ServiceUser();
        $model->admin_id =$admin_id;
        $model->service_id = $service_id;
        $model->type = $type;
        return $model->save() ? true : false;
    }
}
