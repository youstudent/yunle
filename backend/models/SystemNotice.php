<?php

namespace backend\models;


use Monolog\Handler\IFTTTHandler;
use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property integer $id
 * @property string $phone
 * @property integer $pid
 * @property string $email
 * @property integer $status
 * @property integer $type
 * @property integer $last_login_at
 * @property string $last_login_ip
 * @property string $access_token
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class SystemNotice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_notice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content','notice_people','send_out_people'], 'required'],
            [['created_at'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '内容',
            'notice_people' => '通知人',
            'send_out_people' => '发送人',
        ];
    }
    
    
    public static function getName($data){
        $new_data = json_decode($data,true);
        if (in_array(2,$new_data) && in_array(3,$new_data)){
            return '服务商--代理商';
        }
        if (in_array(2,$new_data)){
            return '服务商';
        }
        if (in_array(3,$new_data)){
            return '代理商';
        }
    }
   
}
