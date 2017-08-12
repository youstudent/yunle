<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 19:33
 */

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

namespace common\models;


use backend\models\Adminuser;
use Yii;

class Helper
{
    /**
     * 订单中心字段转换
     * @param facilitator_id
     * @param $car_id
     * @param $user_id
     * @param oder_id
     * @param $type 1:救援 2:审车 3:维修 4:保养
     * @param $distributing
     * @param $pick
     */

    //获得服务商名称和简介
    public static function getFacilitator($facilitator_id)
    {
        $name = Service::findOne(['id' => $facilitator_id])->name;
        return $name;
    }

    //获得订单号
    public static function getOrder($order_id)
    {
        if ($order_id == 0) {
            return '订单不存在';
        }
        $model = InsuranceOrder::findOne(['id' => $order_id]);
        return $model->order_sn;
    }

    //获得车牌号
    public static function getLicence($car_id)
    {
        if ($car_id == 0) {
            return '车车不存在';
        }
        $model = Car::findOne(['id' => $car_id]);
        return $model->license_number;
    }

    //获得电话号
    public static function getPhone($member_id)
    {
        if ($member_id == 0) {
            return '用户不存在';
        }
        $model = Member::findOne(['id' => $member_id]);
        return $model->phone;
    }

    //获得姓名
    public static function getName($member_id)
    {
        if ($member_id == 0) {
            return '用户不存在';
        }
        $model = Identification::findOne(['member_id' => $member_id]);
        return $model->name;
    }

    //获取身份证
    public static function getLicense($member_id)
    {
        if ($member_id == 0) {
            return '用户不存在';
        }
        $model = Identification::findOne(['member_id' => $member_id]);
        return $model->licence;
    }

    public static function getStatusList()
    {
        //不同保单对应的动态字段值
        $status = [
            [
                'typeId' => 0,
                'typeName' => '全部',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ]
                ]
            ],
            [
                'typeId' => 1,
                'typeName' => '救援',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ], [
                        'actId' => 99,
                        'actName' => '已完成'
                    ], [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 2,
                'typeName' => '维修',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 3,
                'typeName' => '保养',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 4,
                'typeName' => '上线审车',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已出发'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '返修中'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 5,
                'typeName' => '不上线审车',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待邮寄'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 98,
                        'actName' => '未通过'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 6,
                'typeName' => '保险',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待核保'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '等待确认'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '等待付款'
                    ],
                    [
                        'actId' => 97,
                        'actName' => '核保成功'
                    ],
                    [
                        'actId' => 98,
                        'actName' => '核保失败'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ]
        ];

        return $status;
    }
    //处理订单的四大类
    public static function getStatusLists()
    {
        //不同保单对应的动态字段值
        $status = [
            [
                'typeId' => 0,
                'typeName' => '全部',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ]
                ]
            ],
            [
                'typeId' => 1,
                'typeName' => '救援',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ], [
                        'actId' => 99,
                        'actName' => '已完成'
                    ], [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 2,
                'typeName' => '维修',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 3,
                'typeName' => '保养',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'typeId' => 4,
                'typeName' => '上线审车',
                'act' => [
                    [
                        'actId' => 0,
                        'actName' => '全部'
                    ],
                    [
                        'actId' => 1,
                        'actName' => '待接单'
                    ],
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已出发'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '返修中'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
        ];

        return $status;
    }
    //处理订单的两个菜单
    public static function getUpdateLists()
    {
        //不同保单对应的动态字段值
        $status = [
            [
                'listId' => 1,
                'typeName' => '非审车',
                'act' => [
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '接车中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '正在返回'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已接车'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '已评估'
                    ],
                    [
                        'actId' => 7,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 8,
                        'actName' => '待交车'
                    ], [
                        'actId' => 99,
                        'actName' => '已完成'
                    ], [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
            [
                'listId' => 2,
                'typeName' => '审车',
                'act' => [
                    [
                        'actId' => 2,
                        'actName' => '已接单'
                    ],
                    [
                        'actId' => 3,
                        'actName' => '处理中'
                    ],
                    [
                        'actId' => 4,
                        'actName' => '待交车'
                    ],
                    [
                        'actId' => 5,
                        'actName' => '已出发'
                    ],
                    [
                        'actId' => 6,
                        'actName' => '返修中'
                    ],
                    [
                        'actId' => 99,
                        'actName' => '已完成'
                    ],
                    [
                        'actId' => 100,
                        'actName' => '已取消'
                    ]
                ]
            ],
        ];

        return $status;
    }

    //获得订单类型名称
    public static function getType($type)
    {
        switch ($type) {
            case 0:
                $type = '订单类型未选择';
                break;
            case 1:
                $type = '汽车救援';
                break;
            case 2:
                $type = '汽车维修';
                break;
            case 3:
                $type = '汽车保养';
                break;
            case 4:
                $type = '汽车审车(上线)';
                break;
            case 5:
                $type = '汽车审车(不上线)';
                break;
            case 6;
                $type = '汽车保险';
                break;
        }
        return $type;
    }

    //获得订单动态详情状态
    public static function getAction($order_id)
    {
        $model = ActDetail::find()->where(['order_id' => $order_id])
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
        if (!isset($model) || empty($model)) {
            return '逗我呢,详情呢???';
        }
//        $status = self::getStatus($model['status'],$type);

        return $model['status'];
    }

    //获得保险订单动态详情状态
    public static function getInsAction($order_id)
    {
        $model = ActInsurance::find()->where(['order_id' => $order_id])
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
    public static function getStatus($status, $type)
    {
        if ($type == 1 || $type == 2 || $type == 3) {
            switch ($status) {
                case 1:
                    $status = '待接单';
                    break;
                case 2:
                    $status = '已接单';
                    break;
                case 3:
                    $status = '接车中';
                    break;
                case 4:
                    $status = '正在返回';
                    break;
                case 5:
                    $status = '已接车';
                    break;
                case 6:
                    $status = '已评估';
                    break;
                case 7:
                    $status = '处理中';
                    break;
                case 8:
                    $status = '待交车';
                    break;
                case 99:
                    $status = '已完成';
                    break;
                case 100:
                    $status = '已取消';
                    break;
            }
        } elseif ($type == 4) {
            switch ($status) {
                case 1:
                    $status = '待接单';
                    break;
                case 2:
                    $status = '已接单';
                    break;
                case 3:
                    $status = '处理中';
                    break;
                case 4:
                    $status = '待交车';
                    break;
                case 5:
                    $status = '已出发';
                    break;
                case 6:
                    $status = '返修中';
                    break;
                case 99:
                    $status = '已完成';
                    break;
                case 100:
                    $status = '已取消';
                    break;
            }
        } else {
            switch ($status) {
                case 1:
                    $status = '待寄出';
                    break;
                case 2:
                    $status = '处理中';
                    break;
                case 98:
                    $status = '未通过';
                    break;
                case 99:
                    $status = '已完成';
                    break;
                case 100:
                    $status = '已取消';
                    break;
            }
        }

        return $status;
    }

    /*
     * 保险
     */
    //获取险种要素名
    public static function getElement($element)
    {
        $model = Element::findOne(['id' => $element]);
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
        $name = Insurance::findOne(['id' => $insurance_id])->title;

        return $name;
    }

    //获取保险公司名
    public static function getInsuranceCompany($company_id)
    {
        $company = InsuranceCompany::findOne(['id' => $company_id])->name;
        return $company;

    }

    //保险动态详情
    public static function getInsuranceStatus($status, $info = null)
    {
        switch ($status) {
            case 1:
                $status = '待核保';
                break;
            case 2:
                $status = '待确认';
                break;
            case 3:
                $status = '确认购买';
                break;
            case 4:
                $status = '已付款';
                break;
            case 97:
                $status = '核保成功';
                break;
            case 98:
                $status = '核保失败';
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
     * 服务商
     * lat1 lng1 用户经纬度
     * lat2 lng2 服务商经纬度
     */
    //获取距离
    public static function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000; //approximate radius of earth in meters
        $lat1 = ($lat1 * pi()) / 180;
        $lng1 = ($lng1 * pi()) / 180;
        $lat2 = ($lat2 * pi()) / 180;
        $lng2 = ($lng2 * pi()) / 180;
        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo / 1000;
        $distance = round($calculatedDistance, 1);
        return $distance;
    }

    //获取营业状态
    public static function getOpen($at1 = '', $at2 = '')
    {
        //获取当天的年份
        $y = date("Y");
        //获取当天的月份
        $m = date("m");
        //获取当天的号数
        $d = date("d");
        $at = time() + 8 * 3600;
        $at1 = mktime(00, 01, 0, $m, $d, $y);
//        echo $at;die;
        $at2 = mktime(23, 59, 0, $m, $d, $y);
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
            ->where(['service_id' => $service_id])
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
        $tag = Tag::findOne(['id' => $id])->name;
        return $tag;
    }

    public static function getTime($time)
    {
        if ($time) {
            return date('Y年m月d日 H:i', $time);
        } else {
            return '暂未设置';
        }

    }

    /*
     * 获取平台首页的统计信息
     */
    public static function getStat()
    {
        //登录信息
        $id = $_SESSION['LOGIN_MEMBER']['id'];
        $admin = Adminuser::findOne($id);
        //总计数
        if ($admin->mark == 1) {
            $a = Order::find()->select('type, status')
                ->leftJoin(ActDetail::tableName(), '{{%act_detail}}.order_id = {{%order}}.id')
                ->where(['type' => 5])
                ->andWhere(['<', 'status', 98])
                ->count();
            $b = ActInsurance::find()->select('id,status')
                ->where(['status'=>1])
                ->count();
            $c = ActInsurance::find()->select('id,status')
                ->where(['status'=>97])
                ->count();
            $d = Car::find()->select('id, status')->where(['status'=>0])->count() +
                 DrivingLicense::find()->select('id, status')->where(['status'=>0])->count();
        } else {
            //TODO:服务商和代理商
            $a = Order::find()->select('type, status')
                ->leftJoin(ActDetail::tableName(), '{{%act_detail}}.order_id = {{%order}}.id')
                ->where(['type' => 5])
                ->andWhere(['<', 'status', 98])
                ->count();
            $b = ActInsurance::find()->select('id,status')
                ->where(['status'=>1])
                ->count();
            $c = ActInsurance::find()->select('id,status')
                ->where(['status'=>97])
                ->count();
            $d = Car::find()->select('id, status')->where(['status'=>0])->count() +
                DrivingLicense::find()->select('id, status')->where(['status'=>0])->count();
        }

        $orderCount = [
            'afterCheckCar' => $a,
            'afterSuccess' => $b,
            'success' => $c,
            'afterStatusChange' => $d,
        ];

        //用户增长
        $nowTime = time();
        $nowDay = date('d');
        $nowMonth = date('m');
        $nowYear = date('Y');

        $todayTime = strtotime($nowYear.'-'.$nowMonth.'-'.$nowDay.' '.'00:00:00');
        // 7天
        $start_at1 = $todayTime - 6*24*3600;
        $start_at2 = $todayTime - 5*24*3600;
        $start_at3 = $todayTime - 4*24*3600;
        $start_at4 = $todayTime - 3*24*3600;
        $start_at5 = $todayTime - 2*24*3600;
        $start_at6 = $todayTime - 1*24*3600;
        $memberCount1 = Member::find()->where(['between', 'created_at', $start_at1, $start_at2])->count();
        $memberCount2 = Member::find()->where(['between', 'created_at', $start_at2, $start_at3])->count();
        $memberCount3 = Member::find()->where(['between', 'created_at', $start_at3, $start_at4])->count();
        $memberCount4 = Member::find()->where(['between', 'created_at', $start_at4, $start_at5])->count();
        $memberCount5 = Member::find()->where(['between', 'created_at', $start_at5, $start_at6])->count();
        $memberCount6 = Member::find()->where(['between', 'created_at', $start_at6, $todayTime])->count();
        $memberCount7 = Member::find()->where(['between', 'created_at', $todayTime, $nowTime])->count();
        $memberSeven = [$memberCount1,$memberCount2,$memberCount3,$memberCount4,$memberCount5,$memberCount6,$memberCount7];

        $serviceCount1 = Adminuser::find()->where(['between', 'created_at', $start_at1, $start_at2])->andWhere(['mark'=>2])->count();
        $serviceCount2 = Adminuser::find()->where(['between', 'created_at', $start_at2, $start_at3])->andWhere(['mark'=>2])->count();
        $serviceCount3 = Adminuser::find()->where(['between', 'created_at', $start_at3, $start_at4])->andWhere(['mark'=>2])->count();
        $serviceCount4 = Adminuser::find()->where(['between', 'created_at', $start_at4, $start_at5])->andWhere(['mark'=>2])->count();
        $serviceCount5 = Adminuser::find()->where(['between', 'created_at', $start_at5, $start_at6])->andWhere(['mark'=>2])->count();
        $serviceCount6 = Adminuser::find()->where(['between', 'created_at', $start_at6, $todayTime])->andWhere(['mark'=>2])->count();
        $serviceCount7 = Adminuser::find()->where(['between', 'created_at', $todayTime, $nowTime])->andWhere(['mark'=>2])->count();
        $serviceSeven = [$serviceCount1,$serviceCount2,$serviceCount3,$serviceCount4,$serviceCount5,$serviceCount6,$serviceCount7];

        $agencyCount1 = Adminuser::find()->where(['between', 'created_at', $start_at1, $start_at2])->andWhere(['mark'=>3])->count();
        $agencyCount2 = Adminuser::find()->where(['between', 'created_at', $start_at2, $start_at3])->andWhere(['mark'=>3])->count();
        $agencyCount3 = Adminuser::find()->where(['between', 'created_at', $start_at3, $start_at4])->andWhere(['mark'=>3])->count();
        $agencyCount4 = Adminuser::find()->where(['between', 'created_at', $start_at4, $start_at5])->andWhere(['mark'=>3])->count();
        $agencyCount5 = Adminuser::find()->where(['between', 'created_at', $start_at5, $start_at6])->andWhere(['mark'=>3])->count();
        $agencyCount6 = Adminuser::find()->where(['between', 'created_at', $start_at6, $todayTime])->andWhere(['mark'=>3])->count();
        $agencyCount7 = Adminuser::find()->where(['between', 'created_at', $todayTime, $nowTime])->andWhere(['mark'=>3])->count();
        $agencySeven = [$agencyCount1,$agencyCount2,$agencyCount3,$agencyCount4,$agencyCount5,$agencyCount6,$agencyCount7];

        $seven = ['memberSeven'=>$memberSeven, 'serviceSeven'=>$serviceSeven, 'agencySeven'=>$agencySeven];

        //一个月
        $start_at1 = time() - 28*24*3600;
        $start_at2 = time() - 21*24*3600;
        $start_at3 = time() - 14*24*3600;
        $start_at4 = time() - 7*24*3600;
        $memberCount1 = Member::find()->where(['between', 'created_at', $start_at1, $start_at2])->count();
        $memberCount2 = Member::find()->where(['between', 'created_at', $start_at2, $start_at3])->count();
        $memberCount3 = Member::find()->where(['between', 'created_at', $start_at3, $start_at4])->count();
        $memberCount4 = Member::find()->where(['between', 'created_at', $start_at4, $nowTime])->count();
        $memberMonth = [$memberCount1,$memberCount2,$memberCount3,$memberCount4];

        $serviceCount1 = Adminuser::find()->where(['between', 'created_at', $start_at1, $start_at2])->andWhere(['mark'=>2])->count();
        $serviceCount2 = Adminuser::find()->where(['between', 'created_at', $start_at2, $start_at3])->andWhere(['mark'=>2])->count();
        $serviceCount3 = Adminuser::find()->where(['between', 'created_at', $start_at3, $start_at4])->andWhere(['mark'=>2])->count();
        $serviceCount4 = Adminuser::find()->where(['between', 'created_at', $start_at4, $nowTime])->andWhere(['mark'=>2])->count();
        $serviceMonth = [$serviceCount1,$serviceCount2,$serviceCount3,$serviceCount4];

        $agencyCount1 = Adminuser::find()->where(['between', 'created_at', $start_at1, $start_at2])->andWhere(['mark'=>3])->count();
        $agencyCount2 = Adminuser::find()->where(['between', 'created_at', $start_at2, $start_at3])->andWhere(['mark'=>3])->count();
        $agencyCount3 = Adminuser::find()->where(['between', 'created_at', $start_at3, $start_at4])->andWhere(['mark'=>3])->count();
        $agencyCount4 = Adminuser::find()->where(['between', 'created_at', $start_at4, $nowTime])->andWhere(['mark'=>3])->count();
        $agencyMonth = [$agencyCount1,$agencyCount2,$agencyCount3,$agencyCount4];

        $oneMonth = ['memberMonth'=>$memberMonth, 'serviceMonth'=>$serviceMonth, 'agencyMonth'=>$agencyMonth];

        //三个月
        $start_at1 = time() - 90*24*3600;
        $start_at2 = time() - 60*24*3600;
        $start_at3 = time() - 30*24*3600;
        $memberCount1 = Member::find()->where(['between', 'created_at', $start_at1, $start_at2])->count();
        $memberCount2 = Member::find()->where(['between', 'created_at', $start_at2, $start_at3])->count();
        $memberCount3 = Member::find()->where(['between', 'created_at', $start_at3, $nowTime])->count();
        $memberThree = [$memberCount1,$memberCount2,$memberCount3];

        $serviceCount1 = Adminuser::find()->where(['between', 'created_at', $start_at1, $start_at2])->andWhere(['mark'=>2])->count();
        $serviceCount2 = Adminuser::find()->where(['between', 'created_at', $start_at2, $start_at3])->andWhere(['mark'=>2])->count();
        $serviceCount3 = Adminuser::find()->where(['between', 'created_at', $start_at3, $nowTime])->andWhere(['mark'=>2])->count();
        $serviceThree = [$serviceCount1,$serviceCount2,$serviceCount3];

        $agencyCount1 = Adminuser::find()->where(['between', 'created_at', $start_at1, $start_at2])->andWhere(['mark'=>3])->count();
        $agencyCount2 = Adminuser::find()->where(['between', 'created_at', $start_at2, $start_at3])->andWhere(['mark'=>3])->count();
        $agencyCount3 = Adminuser::find()->where(['between', 'created_at', $start_at3, $nowTime])->andWhere(['mark'=>3])->count();
        $agencyThree = [$agencyCount1,$agencyCount2,$agencyCount3];

        $threeMonth = ['memberThree'=>$memberThree, 'serviceThree'=>$serviceThree, 'agencyThree'=>$agencyThree];

        $people = ['seven' => $seven, 'oneMonth' => $oneMonth, 'threeMonth' => $threeMonth];

        $all = [
            'people' => $people,
            'orderCount' => $orderCount,
        ];
        return $all;
    }
}