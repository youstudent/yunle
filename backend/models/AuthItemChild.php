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

    public static function getAuthMenu($name)
    {
        $role = $name;
        list($id, $platform, $role) = explode('_', $role);
        switch ($platform){
            case 'app':
                return AuthItemChild::getAppAuthMenu($name);
                break;
            case 'platform':
                return AuthItemChild::getPlatformAuthMenu($name);
                break;
            case 'service':
                return AuthItemChild::getServiceAuthMenu($name);
                break;
        }
    }
    public  function updatMenuAssign()
    {
        $post = Yii::$app->request->post();
        $role = $post['name'];
        list($id, $platform, $role) = explode('_', $role);

        switch ($platform){
            case 'app':
                return $this->updateAppMenuAssign();
                break;
            case 'platform':
                return $this->updatePlatformMenuAssign();
                break;
            case 'service':
               // return AuthItemChild::getServiceAuthMenu($name);
                break;
        }
    }
    /**
     * 获取app端菜单
     * @param $name
     * @return array
     */
    public static function getAppAuthMenu($name)
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

    public function updateAppMenuAssign()
    {
        return Yii::$app->db->transaction(function(){
            $post = Yii::$app->request->post();
            $name = $post['name'];
            $keys = AppMenu::find()->where(['id' => $post['id']])->select('key as child')->asArray()->all();
            //清理所有的数据
           Yii::$app->db->createCommand("DELETE FROM {{%auth_item_child}} WHERE parent = :parent", ['parent'=>$name])->execute();
            //插入数据

            foreach($keys as &$key){
                $key['parent'] = $name;
            }

            Yii::$app->db->createCommand()->batchInsert("{{%auth_item_child}}", ['child', 'parent'], $keys)->execute();

            return true;
        });

    }

    public static function getPlatformAuthMenu($name)
    {
        $menus = Menu::find()->asArray()->select('name as text,id,parent as pid,route as key')->indexBy('id')->all();
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

    public function updatePlatformMenuAssign()
    {
        return Yii::$app->db->transaction(function(){
            $post = Yii::$app->request->post();
            $name = $post['name'];
            $keys = Menu::find()->where(['id' => $post['id']])->select('route as child')->asArray()->all();
            //清理所有的数据
            Yii::$app->db->createCommand("DELETE FROM {{%auth_item_child}} WHERE parent = :parent", ['parent'=>$name])->execute();
            //插入数据

            foreach($keys as &$key){
                $key['parent'] = $name;
            }

            Yii::$app->db->createCommand()->batchInsert("{{%auth_item_child}}", ['child', 'parent'], $keys)->execute();

            return true;
        });

    }
}
