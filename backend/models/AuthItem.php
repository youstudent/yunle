<?php

namespace backend\models;

use common\components\Helper;
use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "{{%auth_item}}".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property resource $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 * @property AuthItem[] $children
 * @property AuthItem[] $parents
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique', 'on'=> ['create', 'update']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '角色名',
            'description' => '描述',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['name',  'description'],
            'update' => ['name',  'description'],
        ];
    }

    public function addRole()
    {
        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->type =1;
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }

    public function updateRole()
    {
        if(!$this->validate()){
            return false;
        }

        return Yii::$app->db->transaction(function(){
            $this->type =1;
            $this->created_at = time();
            $this->updated_at = time();
            if(!$this->save()){
                throw new Exception('error');
            }
            return $this;
        });
    }
    public static function roleList($type, $service_id)
    {
        //拼接查询条件
        $name_prefix = Helper::getRolePrefix($type, $service_id);


        $values = AuthItem::find()->where(['type'=>1])->andWhere(['LIKE', 'name', $name_prefix])->select('name')->asArray()->all();
        $items = [];
        foreach($values as $val){
            $val =  trim($val['name'], $name_prefix);
            $items[$val] = $val;
        }
        return $items;
    }

    //初始化Menu到Menu数据库
    public function initMenu()
    {

        $origin = Yii::$app->params['menu'];
        return $this->insertMenu($origin);
    }

    protected function insertMenu($data, $parent = '')
    {
        foreach($data as $val){

            $model = new Menu();
            $model->name = $val['text'];
            $model->route = $val['url'];
            $model->parent = $parent;
            $model->order = 1;
            $model->save();

            if($val['url'] != 'javascript:void(0);'){
            //添加对应的路由
                $item = new AuthItem();
                $item->name = $val['url'];
                $item->type = 2;
                $item->created_at = time();
                $item->updated_at = time();
                $item->save(false);
            }

            if(isset($val['children']) && count($val['children'])){
                $this->insertMenu($val['children'], $model->id);
            }
        }
        return true;
    }

    public function initAppMenu()
    {
        $origin = Yii::$app->params['app_menu'][0]['app'];


        return $this->insertAppMenu($origin);
    }

    public function insertAppMenu($data, $parent = '')
    {
        foreach($data as $val){

            $model = new AppMenu();
            $model->name = $val['title'];
            $model->key = $val['key'];
            $model->parent = $parent;
            $model->save();

            //添加对应的路由
            $item = new AuthItem();
            $item->name = $val['key'];
            $item->type = 2;
            $item->created_at = time();
            $item->updated_at = time();
            $item->save(false);

            if(isset($val['sub']) && count($val['sub'])){
                $this->insertAppMenu($val['sub'], $model->id);
            }
        }
        return true;
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getAuthAssignments()
//    {
//        return $this->hasMany(AuthAssignment::className(), ['item_name' => 'name']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getRuleName()
//    {
//        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getAuthItemChildren()
//    {
//        return $this->hasMany(AuthItemChild::className(), ['parent' => 'name']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getAuthItemChildren0()
//    {
//        return $this->hasMany(AuthItemChild::className(), ['child' => 'name']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getChildren()
//    {
//        return $this->hasMany(AuthItem::className(), ['name' => 'child'])->viaTable('{{%auth_item_child}}', ['parent' => 'name']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getParents()
//    {
//        return $this->hasMany(AuthItem::className(), ['name' => 'parent'])->viaTable('{{%auth_item_child}}', ['child' => 'name']);
//    }
}