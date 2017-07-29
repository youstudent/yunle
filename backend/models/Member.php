<?php

namespace backend\models;

use common\models\Identification;
use common\models\MemberImg;
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
class Member extends \yii\db\ActiveRecord
{
    //冻结
    const STATUS_INACTIVE = 0;
    //正常
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'type', 'last_login_at', 'created_at', 'updated_at'], 'integer'],
            [['phone', 'last_login_ip'], 'string', 'max' => 50],
            [['email', 'access_token'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => '电话',
            'pid' => '推荐人',
            'email' => '邮箱',
            'status' => '状态',
            'type' => '用户类型',
            'last_login_at' => '最后登录时间',
            'last_login_ip' => 'Last Login Ip',
            'access_token' => 'Access Token',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * 获取销售人员信息
     * @return $this
     */
    protected function getSalesmanName()
    {
        return $this->hasOne(User::className(), ['id'=> 'pid'])->alias('u');
    }

    public  function softDelete($id)
    {
        $this->deleted_at = time();
        return $this->save();
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this->save();
    }

    protected function getMemberImg()
    {
        return $this->hasOne(MemberImg::className(), ['member_id'=> 'id']);
    }

    protected function getMemberInfo()
    {
        return $this->hasOne(Identification::className(), ['member_id'=> 'id'])->alias('md');
    }

}
