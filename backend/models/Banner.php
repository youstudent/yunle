<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $describe
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    public $column_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['describe'], 'string'],
            [['status', 'created_at', 'updated_at', 'action_type', 'action_value'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '广告标题',
            'describe' => '广告描述',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'action_type' => '跳转类型',
            'action_value' => '选择文章',
            'column_id' => '文章栏目',
            'article_id' => '关联文章',
        ];
    }

    public function getPicImg()
    {
        $arr[] = '<img class="file-preview-image kv-preview-data" style="width:auto;height:160px;" data-id="'. $this->pic->id .'" src="'.Yii::$app->params['img_domain']. $this->pic->thumb.'" />';
        //return $arr;
        return [Yii::$app->params['img_domain']. $this->pic->thumb];
    }

    public function getPic()
    {
        return $this->hasOne(BannerImg::className(), ['banner_id' => 'id'])->where(['status'=>1]);
    }
}
