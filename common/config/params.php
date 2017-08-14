<?php
return [
    'adminEmail'                    => 'admin@example.com',
    'supportEmail'                  => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'img_domain' => 'https://img.ylxc27580.com',

    'menu' => [
        ['text'=> '首页', 'url' => '/site/index', 'state'=> ['opened'=> true, 'selected'=>true ], 'x'=> true ,'children' => [
        ],],
        ['text'=> '账号信息', 'url' => '/account/index', 'state'=> ['opened'=> true, 'selected'=>true ], 'x'=> true ,'children' => [
        ],],
        ['text'=> '用户管理', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '服务商', 'url' => '/service/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '代理商', 'url' => '/agency/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '业务员', 'url' => '/salesman/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '会员', 'url' => '/member/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '业务', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '订单池', 'url' => '/order/wall', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '订单列表', 'url' => '/order/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '保险订单', 'url' => '/insurance-order/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '审核', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '行驶证', 'url' => '/a/a', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '服务商', 'url' => '/b/b', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '内容', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '广告', 'url' => '/banner/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '栏目', 'url' => '/column/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '文章', 'url' => '/article/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '档案', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '驾照', 'url' => '/driver/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '身份证', 'url' => '/identity/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '行驶证', 'url' => '/car/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '保单', 'url' => '/insurance-order/bao-index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '设置', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '系统', 'url' => '/system/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '保险商', 'url' => '/insurance-company/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '险种', 'url' => '/insurance/index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '我的信息', 'url' => '/account/profile', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '权限', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '角色', 'url' => '/rbac/role-index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '员工', 'url' => '/rbac/account-index', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
        ['text'=> '权限管理', 'url' => 'javascript:void(0);', 'state'=> ['opened'=> true, 'selected'=>true], 'children' => [
            ['text'=> '路由管理', 'url' => '/admin/route', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '权限管理', 'url' => '/admin/permission', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '角色管理', 'url' => '/admin/menu', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '权限分配', 'url' => '/admin/role', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '用户管理', 'url' => '/admin/assignment', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
            ['text'=> '用户管理', 'url' => '/admin/user', 'state'=> ['opened'=> true], 'selected'=>true, 'children' => [
            ],],
        ],],
    ],

    'app_menu' => [
        ['app' => [
            ['title' => '首页', 'key' => 'home', 'len' => '2', 'show' => 1, 'sub' => [
                ['title' => '待处理订单', 'key' => 'wait_order', 'len' => '4', 'show' => 1, 'sub' => [
                    ['title' => '救援订单', 'key' => 'rescue_order', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '维修订单', 'key' => 'fix_order', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '保养订单', 'key' => 'upkeep_order', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '审车订单', 'key' => 'review_order', 'len' => '0', 'show' => 1, 'sub' => []],
                ]],
                ['title' => '我的会员', 'key' => 'my_member', 'len' => '2', 'show' => 1, 'sub' => [
                    ['title' => '', 'key' => 'dashboard', 'len' => '2', 'show' => 1, 'sub' => [
                        ['title' => '', 'key' => 'total_member', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '', 'key' => 'add_member', 'len' => '0', 'show' => 1, 'sub' => []],
                    ]],
                    ['title' => '快速入口', 'key' => 'quick', 'len' => '0', 'show' => 1, 'sub' => [
                        ['title' => '保险', 'key' => 'member_insurance_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '救援', 'key' => 'member_rescue_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '维修', 'key' => 'member_fix_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '保养', 'key' => 'member_upkeep_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '审车', 'key' => 'member_review_order', 'len' => '0', 'show' => 1, 'sub' => []],
                    ]],
                ]],
            ]],
            ['title' => '工作', 'key' => 'work', 'len' => '4', 'show' => 1, 'sub' => [
                ['title' => '我的客户', 'key' => 'work_my_member', 'len' => '0', 'show' => 1, 'sub' => []],
                ['title' => '客户订单', 'key' => 'member_order', 'len' => '0', 'show' => 1, 'sub' => []],
                ['title' => '保单管理', 'key' => 'insurance_order_handle', 'len' => '0', 'show' => 1, 'sub' => []],
                ['title' => '订单处理', 'key' => 'order_handle', 'len' => '0', 'show' => 1, 'sub' => []],
            ]],
            ['title' => '我的', 'key' => 'my', 'len' => '2', 'show' => 1, 'sub' => [
                ['title' => '我的组织', 'key' => 'my_group', 'len' => '0', 'show' => 1, 'sub' => [
                    ['title' => '', 'key' => 'service_info', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '', 'key' => 'service_operating_status', 'len' => '0', 'show' => 1, 'sub' => []],
                ]],
                ['title' => '个人中心', 'key' => 'other', 'len' => '4', 'show' => 1, 'sub' => [
                    ['title' => '我的邀请码', 'key' => 'my_share_code', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '消息通知', 'key' => 'notice', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '联系我们', 'key' => 'contact_us', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '设置', 'key' => 'setting', 'len' => '0', 'show' => 1, 'sub' => []],
                ]],
            ]],
        ]],
    ],


];
