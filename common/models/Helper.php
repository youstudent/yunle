<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 19:33
 */

namespace common\models;


class Helper{
    /**
     * 订单中心字段转换
     * @param facilitator_id
     * @param $car_id
     * @param $user_id
     * @param oder_id
     * @param $type   1:救援 2:审车 3:维修 4:保养
     * @param $distributing
     * @param $pick
     */

    //获得服务商名称和简介
    public static function getFacilitator($facilitator_id)
    {
        $name = Service::findOne(['id'=>$facilitator_id])->name;
        return $name;
    }

    //获得订单号
    public static function getOrder($order_id)
    {
        if ($order_id == 0) {
            return '订单不存在';
        }
        $model = InsuranceOrder::findOne(['id'=>$order_id]);
        return $model->order;
    }

    //获得车牌号
    public static function getLicence($car_id)
    {
        if ($car_id == 0) {
            return '车车不存在';
        }
        $model = Car::findOne(['id'=>$car_id]);
        return $model->license_number;
    }

    //获得电话号
    public static function getPhone($member_id)
    {
        if ($member_id == 0) {
            return '用户不存在';
        }
        $model = Member::findOne(['id'=>$member_id]);
        return $model->phone;
    }

    //获得姓名
    public static function getName($member_id)
    {
        if ($member_id == 0) {
            return '用户不存在';
        }
        $model = Identification::findOne(['member_id'=>$member_id]);
        return $model->name;
    }

    //获取身份证
    public static function getLicense($member_id)
    {
        if ($member_id == 0) {
            return '用户不存在';
        }
        $model = Identification::findOne(['member_id'=>$member_id]);
        return $model->licence;
    }

    //获得订单类型名称
    public static function getType($type)
    {
        switch ($type) {
            case 0:
                $type = '订单类型未选择';
                break;
            case 1:
                $type = '救援';
                break;
            case 2:
                $type = '维修';
                break;
            case 3:
                $type = '保养';
                break;
            case 4:
                $type = '上线审车';
                break;
            case 5:
                $type = '不上线审车';
                break;
            case 6;
                $type = '保险';
                break;
        }
        return $type;
    }

    //获得订单动态详情状态
    public static function getAction($order_id, $type)
    {
        $model = ActDetail::find()->where(['order_id'=>$order_id])
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
        if (!isset($model) || empty($model)) {
            return '逗我呢,详情呢???';
        }
//        $status = self::getStatus($model['status'],$type);

        return $model['status'];
    }
    //获得保险订单动态详情状态
    public static function getInsAction($order_id, $type)
    {
        $model = ActInsurance::find()->where(['order_id'=>$order_id])
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
        if (!isset($model) || empty($model)) {
            return '逗我呢,详情呢???';
        }
//        $status = self::getStatus($model['status'],$type);

        return $model['status'];
    }
//TODO:状态详情对应
//    public static function getStatus($status,$type)
//    {
//        if ($type == 1 || $type ==2) {
//            switch ($status) {
//                case 1:
//            }
//        }
//    }

    //获得接车字段名称
    public static function getPick($pick)
    {
        if ($pick == 0) {
            return '不需要接车';
        } else {
            return '需要接车';
        }
    }

    //获得派单方式名称
    public static function getDistributing($distributing)
    {

        if ($distributing == 0) {
            return '自动派单';
        } else {
            return '手动派单';
        }
    }

    //是否默认
    public static function getStick($stick)
    {
        if ($stick == 1) {
            return '默认';
        } else {
            return '';
        }
    }

    /*
     * 动态详情
     */
    //获取操作人姓名
    public static function getUser($user_id)
    {
        switch ($user_id) {
            case 1:
                $user_id = '系统';
        }
        return $user_id;
    }

    //获取type拼接状态
    public static function getStatus($status)
    {
        switch ($status) {
            case 1:
                $status = '待派单';
                break;
            case 2:
                $status = '订单已分派给服务商:'.$status.',待接单';
                break;
            case 99:
                $status = '已完成';
                break;
            case 100:
                $status = '已取消';
                break;
        }
        return $status;
    }

    /*
     * 保险
     */
    //获取险种要素名
    public static function getElement($element)
    {
        $model = Element::findOne(['id'=>$element]);
        return $model->name;
    }

    //是否免赔
    public static function getDeduction($deduction)
    {
        if ($deduction == 1) {
            $status = '不计免赔';
        } else {
            $status = 0;
        }
        return $status;
    }

    //获取险种名
    public static function getInsuranceName($insurance_id)
    {
        $name = Insurance::findOne(['id'=>$insurance_id])->title;

        return $name;
    }

    //获取保险公司名
    public static function getInsuranceCompany($company_id)
    {
        $company = InsuranceCompany::findOne(['id'=>$company_id])->name;
        return $company;

    }
    //保险动态详情
    public static function getInsuranceStatus($status, $info = null)
    {
        switch ($status) {
            case 1:
                $status = '订单创建成功,等待审核';
                break;
            case 2:
                $status = '核保成功,等待是否购买';
                break;
            case 3:
                $status = '核保失败,原因为: '.$info;
                break;
            case 4:
                $status = '确认购买';
                break;
            case 5:
                $status = '已付款';
                break;
            case 99:
                $status = '订单处理完成';
                break;
            case 100:
                $status = '取消订单';
                break;
        }
        return $status;
    }
    /*
     * 服务商
     * lat1 lng1 用户经纬度
     * lat2 lng2 服务商经纬度
     */
    //获取距离
    public static function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000; //approximate radius of earth in meters
        $lat1 = ($lat1 * pi() ) / 180;
        $lng1 = ($lng1 * pi() ) / 180;
        $lat2 = ($lat2 * pi() ) / 180;
        $lng2 = ($lng2 * pi() ) / 180;
        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;
        $distance = round($calculatedDistance);
        return $distance;
    }
    //获取营业状态
    public static function getOpen($at1 = '', $at2 ='')
    {
        //获取当天的年份
        $y = date("Y");
        //获取当天的月份
        $m = date("m");
        //获取当天的号数
        $d = date("d");
        $at = time() + 8*3600;
        $at1 = mktime(10,0,0,$m,$d,$y);
//        echo $at;die;
        $at2 = mktime(21,10,0,$m,$d,$y);
//        echo $at2;die;
        if ($at >= $at1 && $at <= $at2) {
            $status = 1;
        } else {
            $status = 0;
        }
        return $status;
    }
    //获取营业状态名
    public static function getClose($status)
    {
        if ($status == 1) {
            $status = '营业中';
        } else {
            $status = '停业中';
        }
        return $status;
    }
    //获取服务商标签
    public static function getServiceTag($service_id)
    {
        $tagIds = ServiceTag::find()->select('tag_id')
            ->where(['service_id'=>$service_id])
            ->asArray()
            ->all();;
        $tag = [];
        foreach ($tagIds as &$v) {
            $tag[] = self::getTags($v['tag_id']);
        }
        return $tag;
    }
    public static function getTags($id)
    {
        $tag = Tag::findOne(['id'=>$id])->name;
        return $tag;
    }

}