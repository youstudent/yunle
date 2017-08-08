<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%app_menu}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $key
 *
 * @property AppMenu $parent0
 * @property AppMenu[] $appMenus
 */
class AppMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%app_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'key'], 'required'],
            [['parent'], 'integer'],
            [['name', 'key'], 'string', 'max' => 128],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => AppMenu::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'parent' => 'Parent',
            'key' => 'Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(AppMenu::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppMenus()
    {
        return $this->hasMany(AppMenu::className(), ['parent' => 'id']);
    }
}
