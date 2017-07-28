<?php
namespace common\components\event;
use common\components\Helper;
use Yii;

/**
 * User: harlen-angkemac
 * Date: 2017/7/28 - 上午9:44
 *
 */
class CacheEvent extends \yii\base\Component
{
    public function reloadSettingCache($event)
    {
       Helper::getServiceSetting(0, true);
    }
}