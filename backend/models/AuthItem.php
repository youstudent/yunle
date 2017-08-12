<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/12 - 下午2:41
 *
 */

namespace backend\models;


use common\components\Helper;
use pd\admin\models\AuthItem as BaseAuthItem;
use yii\helpers\ArrayHelper;

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
        return ArrayHelper::merge(Parent::rules(),[
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

}