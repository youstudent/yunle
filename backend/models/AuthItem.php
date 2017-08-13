<?php
namespace backend\models;

use common\components\Helper;
use pd\admin\models\AuthItem as BaseAuthItem;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class AuthItem extends BaseAuthItem
{
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'        => '名称',
            'type'        => '类型',
            'description' => '描述',
            'ruleName'    => '路由',
            'data'        => '数据',
        ];
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            [['name'], 'reserved', 'when'=> function(){
                return $this->isNewRecord || ($this->_item->name != $this->name);
            }]
        ]);
    }

    public function reserved()
    {
        if(strpos($this->name, '_') !== false){
            $this->addError('name', '不能在角色名字中使用系统保留字: "_"');
        }
    }


    /**
     * 添加一个角色
     * @param bool $validate
     * @return bool
     */
    public function save()
    {
        if ($this->validate()) {
            $manager = Yii::$app->authManager;
            if ($this->_item === null) {
                if ($this->type == 1) {
                    $group = Helper::getLoginMemberRoleGroup();
                    if(in_array($group, [2,3])){
                        $this->name = Helper::getRolePrefix() . $this->name;
                    }
                    $this->_item = $manager->createRole($this->name);
                } else {
                    $this->_item = $manager->createPermission($this->name);
                }
                $isNew = true;
            } else {
                $isNew = false;
                $oldName = $this->_item->name;
            }
            $this->_item->name = $this->name;
            $this->_item->description = $this->description;
            $this->_item->ruleName = $this->ruleName;
            $this->_item->data = $this->data === null || $this->data === '' ? null : Json::decode($this->data);
            if ($isNew) {
                $manager->add($this->_item);
            } else {
                $group = Helper::getLoginMemberRoleGroup();
                if(in_array($group, [2,3])){
                    $this->_item->name = Helper::getRolePrefix() . $this->name;
                }
                $manager->update($oldName, $this->_item);
            }
            \pd\admin\components\Helper::invalidate();
            return true;
        } else {
            return false;
        }
    }

}