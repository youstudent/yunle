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
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use Flc\Alidayu\Requests\IRequest;

/**
 * This is the model class for table "cdc_message_code".
 *
 * @property string $id
 * @property string $phone
 * @property integer $code
 * @property integer $status
 * @property integer $created_at
 */
class MessageCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message_code}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'code', 'created_at'], 'required'],
            [['code', 'status', 'created_at'], 'integer'],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => '手机号',
            'code' => '验证码',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    /*
     *  短信验证码请求
     */
    public function sms($phone)
    {

        // 配置信息
        $config = [
            'app_key'    => '*****',
            'app_secret' => '************',
            // 'sandbox'    => true,  // 是否为沙箱环境，默认false
        ];

        // 生成验证码
        $code = rand(1000, 9999);

        // 调用
        $client = new Client(new App($config));
        $req    = new AlibabaAliqinFcSmsNumSend;

        $req->setRecNum($phone)
            ->setSmsParam([
                'number' => $code
            ])
            ->setSmsFreeSignName('[云乐享车]')
            ->setSmsTemplateCode('SMS_15105357');

        $resp = $client->execute($req);

        // 存入数据
        $model = new MessageCode();
        $model->phone = $phone;
        $model->code = $code;

        // 返回结果

        if ($model->save(false)) {

            return $resp->result->model;
        }

    }

}