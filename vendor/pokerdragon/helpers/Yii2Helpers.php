<?php

namespace pd\helpers;
use yii\data\ActiveDataProvider;
use yii\data\BaseDataProvider;

/**
 * User: harlen-angkemac
 * Date: 2017/7/10 - 下午8:56
 *
 */
class Yii2Helpers
{
    public static function dateFormat($timestamp, $format = "Y-m-d H:i", $default = null)
    {
        if (empty($timestamp)) {
            return $default;
        }
        return date($format, $timestamp);
    }

    public static function equal()
    {

    }

    public static function compare()
    {

    }

    /**
     * @inheritdoc
     */
    public static function serialColumn(BaseDataProvider $dataProvider, $index)
    {
        $pagination = $dataProvider->getPagination();
        if ($pagination !== false) {
            return $pagination->getOffset() + $index + 1;
        } else {
            return $index + 1;
        }
    }
}