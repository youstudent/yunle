<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/25 - 上午10:30
 *
 */

namespace backend\models;


class AuthItemChild extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }
}