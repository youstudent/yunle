<?php
namespace common\models;

use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Core\Config;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

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
    public function sms(String $phone)
    {
        if(!$this->checkCode($phone, 0)){
            return false;
        }
        // 生成验证码
        $code = rand(1000, 9999);
        // 存入数据
        $model = new MessageCode();
        $model->phone = $phone;
        $model->code = $code;
        $model->status = 0;
        $model->created_at = time();
        // 返回结果
        if (!$model->save()){
           return false;
        }
        if(!$this->sendSms($phone, $code, $model->id)){
            //发送失败，标记验证码状态
            $model->status = -1;
            $model->save();
            return false;
        }
        return true;
    }

    protected function sendSms(String $phone, int $code, int $out_id)
    {
        $setting = \common\components\Helper::getSystemSetting();
        $accessKeyId = ArrayHelper::getValue($setting, 'ali_sms_access_key_id', '');
        $accessKeySecret = ArrayHelper::getValue($setting, 'ali_sms_access_key_secret', '');
        $templateSign = ArrayHelper::getValue($setting, 'ali_sms_template_sign', '');
        $templateCode = ArrayHelper::getValue($setting, 'ali_sms_template_code', '');
        if(empty($accessKeyId) || empty($accessKeySecret) || empty($templateCode) || empty($templateSign)){
            \Yii::error("缺少必要短信参数");
            return false;
        }
        Config::load();
        // 短信API产品名
        $product = "Dysmsapi";
        // 短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        // 暂时不支持多Region
        $region = "cn-hangzhou";
        // 服务结点
        $endPointName = "cn-hangzhou";
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        // 增加服务结点
        DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

        $acsClient = new DefaultAcsClient($profile);
        // 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();
        // 必填，设置雉短信接收号码
        $request->setPhoneNumbers($phone);
        // 必填，设置签名名称
        $request->setSignName($templateSign);
        // 必填，设置模板CODE
        $request->setTemplateCode($templateCode);
        $request->setTemplateParam(json_encode(['number'=> $code]));

        $request->setOutId($out_id);
        // 发起访问请求
        try{
            $acsResponse = $acsClient->getAcsResponse($request);
            if(!$acsResponse || $acsResponse->Code !== 'OK'){
                return false;
            }
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * 判断用户规定间隔时间内是否已经获取过一次验证码。未获取返回 ture 获取了 返回true
     * @param String $phone
     * @param Int $seconds
     * @return bool
     */
    protected function checkCode(String $phone, Int $seconds)
    {
        return !MessageCode::find()->andWhere(['>=', 'created_at', time()- $seconds])->andWhere(['phone'=>$phone])->andWhere(['!=', 'status', -1])->one();
    }

}