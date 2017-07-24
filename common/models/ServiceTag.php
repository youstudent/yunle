<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_service_tag".
 *
 * @property string $id
 * @property integer $tag_id
 * @property integer $service_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ServiceTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_service_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'service_id'], 'required'],
            [['tag_id', 'service_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'service_id' => 'Service ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
