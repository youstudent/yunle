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

    }

    //获得订单号
    public static function getOrder($order_id)
    {
        if ($order_id == 0) {
            return '订单不存在';
        }
        $model = Order::findOne(['id'=>$order_id]);
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

    //获得订单类型名称
    public static function getType($type)
    {
        if($type == 0){
            return '订单类型未选择';
        }
        switch ($type) {
            case 1:
                $type = '救援';
                break;
            case 2:
                $type = '审车';
                break;
            case 3:
                $type = '维修';
                break;
            case 4:
                $type = '保养';
                break;
        }
        return $type;
    }

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
}