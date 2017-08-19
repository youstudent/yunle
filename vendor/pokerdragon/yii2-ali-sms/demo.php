<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 15:58
 */

use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Core\Config;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;
use yii\helpers\ArrayHelper;

$phone = "13812345678";
$out_id = "12354";
$code = "12345";

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