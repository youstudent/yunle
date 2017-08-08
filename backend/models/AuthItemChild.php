<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%auth_item_child}}".
 *
 * @property string $parent
 * @property string $child
 *
 * @property AuthItem $parent0
 * @property AuthItem $child0
 */
class AuthItemChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['child' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'child']);
    }

    /**
     * 获取app端菜单
     * @param $name
     * @return array
     */
    public static function getAuthMenu($name)
    {
        $menus = AppMenu::find()->asArray()->select('name as text,id,parent as pid,key')->indexBy('id')->all();

        $own = AuthItemChild::find()->where(['parent'=>$name])->select('child')->column();
        foreach($menus as &$menu){
            $menu['state']['opened'] = true;
            if(in_array($menu['key'], $own)){
                $menu['state']['selected'] = true;
            }
        }

        $tree = [];
        foreach ($menus as $menu){
            if(isset($menus[$menu['pid']])){
                $menus[$menu['pid']]['children'][] = &$menus[$menu['id']];
            }else{
                //null会报错，这里就去掉了Null的
               // unset($menus[$menu['id']]['pid']);
                $tree[] = &$menus[$menu['id']];
            }
        }

        return $tree;
    }

    public function updatMenuAssign()
    {
        return Yii::$app->db->transaction(function(){
            $post = Yii::$app->request->post();
            $name = $post['name'];
            $keys = AppMenu::find()->where(['id' => $post['id']])->select('key as child')->asArray()->all();
            //清理所有的数据
            Yii::$app->db->createCommand("DELETE * FROM {{%auth_item_child}} WHERE name = :name", ['name'=>$name])->execute();
            //插入数据

            foreach($keys as &$key){
                $key['name'] = $name;
            }

            Yii::$app->db->batchInsert("{{%auth_item_child}}", ['name', 'child'], $keys);

            return true;
        });

    }
}
