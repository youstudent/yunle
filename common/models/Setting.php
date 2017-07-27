<?php

namespace common\models;

use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $desc
 * @property integer $service_id
 * @property string $category
 * @property integer $sort
 */
class Setting extends \yii\db\ActiveRecord
{
    const EVENT_RELOAD_SETTING_CACHE = 'reloadSettingCache';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['service_id'], 'integer'],
            [['name', 'category'], 'string', 'max' => 256],
            [['value'], 'string', 'max' => 2446],
            [['desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '设置名',
            'value' => '设置项值',
            'desc' => '说明',
            'service_id' => '0代表系统配置。 1以上代表服务商配置',
            'category' => '设置分类',
        ];
    }

    public function saveSetting($form)
    {
        if(!$form){
            return null;
        }
        return Yii::$app->db->transaction(function() use($form){
            $reload_cache = false;
            //清空所有数据
            $models = Setting::find()->where(['service_id'=>0])->all();
            foreach($models as $model){
                if(isset($form[$model->name])){
                    $model->value = $form[$model->name];
                    if(!$model->save()){
                        throw new Exception('数据保存错误');
                    }
                    $reload_cache = true;
                }
            }
            //重新读取系统配置
            if($reload_cache) $this->trigger(self::EVENT_RELOAD_SETTING_CACHE);
            return true;
        });
    }



    public function getSetting()
    {
        return Setting::find()->where(['service_id'=>0])->indexBy('name')->select('value,name')->asArray()->all();
    }

}
