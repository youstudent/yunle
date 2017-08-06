<?php
/**
 * User: harlen-angkemac
 * Date: 2017/8/2 - 上午11:12
 *
 */

namespace pd\helpers;


class PregRule
{
    /* 用户名 */
    const USERNAME = "/[A-Za-z0-9_]+/";
    /* 手机号 */
    const PHONE = "/\b0?(13|14|15|18)[0-9]{9}$/";
    /* 邮箱 */
    const EMAIL = "/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/";
    /* 邮编 */
    const ZIP_CODE = "/\d{6}/";
    /* URL */
    const URL = "/^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/";
    /* 身份证号 */
    const ID_CARD = "/\d{17}[\d|x]|\d{15}/";
}