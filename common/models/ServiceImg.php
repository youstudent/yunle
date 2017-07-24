<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_service_img".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $img
 * @property string $thumb
 * @property string $img_path
 * @property double $size
 * @property string $status
 * @property integer $type
 */
class ServiceImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'type'], 'integer'],
            [['size'], 'number'],
            [['img', 'thumb', 'img_path'], 'string', 'max' => 256],
            [['status'], 'string', 'max' => 255],
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
            'img' => 'Img',
            'thumb' => 'Thumb',
            'size' => 'Size',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }
}
