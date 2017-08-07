<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%admin_service}}".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $admin_id
 */
class AdminService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_service}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'service_id', 'admin_id'], 'required'],
            [['id', 'service_id', 'admin_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => '服务商id',
            'admin_id' => '平台用户Id',
        ];
    }
}
