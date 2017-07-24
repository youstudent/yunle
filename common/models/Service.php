<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cdc_service".
 *
 * @property integer $id
 * @property string $name
 * @property string $principal
 * @property string $contact_phone
 * @property string $introduction
 * @property string $address
 * @property string $lat
 * @property string $lng
 * @property integer $level
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdc_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'principal', 'contact_phone'], 'required'],
            [['level', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'principal', 'contact_phone', 'introduction', 'address', 'lat', 'lng'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'principal' => 'Principal',
            'contact_phone' => 'Contact Phone',
            'introduction' => 'Introduction',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'level' => 'Level',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
