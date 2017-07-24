<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%service_img}}".
 *
 * @property integer $id
 * @property integer $service_id
 * @property string $img
 * @property string $thumb
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
            [['img', 'thumb'], 'string', 'max' => 256],
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
            'service_id' => '服务商id',
            'img' => '图片名称',
            'thumb' => '缩略图名称',
            'size' => '文件大小',
            'status' => '是否被绑定了',
            'type' => '1.封面图',
        ];
    }
}
