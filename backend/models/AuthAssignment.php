<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/25 - 上午11:13
 *
 */

namespace backend\models;


class AuthAssignment extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }
}