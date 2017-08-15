<?php

namespace common\models;

/*
     *
      ******       ******
    **********   **********
  ************* *************
 *****************************
 *****************************
 *****************************
  ***************************
    ***********************
      ******拒绝扯淡*******
        ****加强撕逼*****
          *****加*****
            ***油***
              ***
               *
     */

use Yii;

/**
 * This is the model class for table "cdc_invitation_code".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $code
 * @property integer $status
 * @property integer $created_at
 */
class InvitationCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%invitation_code}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at', 'code'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'code' => 'Code',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * 生成销售员的邀请码
     * @param $user_id
     * @return bool
     */
    public static function genCode($user_id)
    {
        $model = new InvitationCode();
        $model->user_id = $user_id;
        $model->status =1;
        $model->code = $user_id;
        while(strlen($model->code) < 6){
            $model->code .= strval(time())[9] > 5 ? 6 : 8;
        }
        $ret = $model->save();
        return $ret ? true : false;
    }
}
