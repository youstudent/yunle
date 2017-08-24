<?php
/**
 * Created by PhpStorm.
 * User: harlen-mac
 * Date: 2017/8/13
 * Time: 下午4:14
 */

namespace backend\models\searchs;

use yii\data\ArrayDataProvider;
use common\components\Helper;
use pd\admin\models\searchs\AuthItem;
use Yii;

class BackendAuthItemSearch extends AuthItem
{
    /**
     * Search authitem
     * @param array $params
     * @return \yii\data\ActiveDataProvider|\yii\data\ArrayDataProvider
     */
    public function search($params)
    {
        $authManager = Yii::$app->getAuthManager();
        if ($this->type == 1) {
            $items = $authManager->getRoles();
            foreach($items as $key => $val){
                if(strpos($val->name, '_') !== false){
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