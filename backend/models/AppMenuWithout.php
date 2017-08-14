<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cdc_app_menu_without".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $role_id
 * @property integer $menu_id
 */
class AppMenuWithout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_app_menu_without';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'role_id', 'menu_id'], 'required'],
            [['service_id', 'role_id', 'menu_id'], 'integer'],
            [['service_id', 'role_id', 'menu_id'], 'unique', 'targetAttribute' => ['service_id', 'role_id', 'menu_id'], 'message' => '已经取消授权了'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'role_id' => 'Role ID',
            'menu_id' => 'Menu ID',
        ];
    }
}
