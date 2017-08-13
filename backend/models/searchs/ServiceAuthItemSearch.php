<?php
/**
 * Created by PhpStorm.
 * User: harlen-mac
 * Date: 2017/8/13
 * Time: 下午4:15
 */

namespace backend\models\searchs;

use common\components\Helper;
use pd\admin\models\searchs\AuthItem;
use Yii;
use yii\data\ArrayDataProvider;

class ServiceAuthItemSearch extends AuthItem
{
    public function search($params)
    {
        $authManager = Yii::$app->getAuthManager();
        if ($this->type == 1) {
            $items = $authManager->getRoles();
            $role_prefix = Helper::getRolePrefix();
            foreach($items as $key => $val){
                if(strpos($val->name, $role_prefix) === 0){
                    $items[$key]->name = ltrim($val->name, $role_prefix);
                }else{
                    unset($items[$key]);
                }
            }

        } else {
            $items = array_filter($authManager->getPermissions(), function($item) {
                return $this->type == 2 xor strncmp($item->name, '/', 1) === 0;
            });
        }
        $this->load($params);
        if ($this->validate()) {
            $search = strtolower(trim($this->name));
            $desc = strtolower(trim($this->description));
            $ruleName = $this->ruleName;
            foreach ($items as $name => $item) {
                $f = (empty($search) || strpos(strtolower($item->name), $search) !== false) &&
                    (empty($desc) || strpos(strtolower($item->description), $desc) !== false) &&
                    (empty($ruleName) || $item->ruleName == $ruleName);
                if (!$f) {
                    unset($items[$name]);
                }
            }
        }

        return new ArrayDataProvider([
            'allModels' => $items,
        ]);
    }

}