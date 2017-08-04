<?php
return [
    'adminEmail'                    => 'admin@example.com',
    'supportEmail'                  => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,

    'menu' => [
        ['id' => '/admin/route/index', 'text' => '后台管理', 'url' => '/', 'state' => ['opened' => true], 'children' => [
            ['id' => '/admin/route/', 'text' => '服务商', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                        ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                        ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                    ]],
                    ['text' => '更换业务员', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '重置密码', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '封停', 'url' => '/', 'state' => ['opened' => true]],
                ]],
            ]],
            ['text' => '代理商', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                        ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                        ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                    ]],
                    ['text' => '更换业务员', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '重置密码', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '封停', 'url' => '/', 'state' => ['opened' => true]],

                ]],
            ]],
            ['text' => '业务员', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加业务员', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '业务员列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                        ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                        ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                    ]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '重置密码', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '封停', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '添加会员', 'url' => '/', 'state' => ['opened' => true]],
                ]],
            ]],
            ['text' => '会员', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加会员', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '业务员列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                        ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                        ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                    ]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '重置密码', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '封停', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '添加会员', 'url' => '/', 'state' => ['opened' => true]],
                ]],
                ['text' => '车辆列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                        ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                        ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                    ]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '封停', 'url' => '/', 'state' => ['opened' => true]],
                ]],
                ['text' => '驾驶证列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                        ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                        ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                    ]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '封停', 'url' => '/', 'state' => ['opened' => true]],
                ]],
            ]],
            ['text' => '订单', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '订单列表', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '创建订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],

                ]],
                ['text' => '变更状态', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '接单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '拒绝', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '保险', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '保险订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '创建订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '详情', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],

                ]],
                ['text' => '变更状态', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '接单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '拒绝', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '保单管理', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                ]],
                ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],

            ]],
            ['text' => '信息审核', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                ]],
                ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],

            ]],
            ['text' => '广告', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                ]],
                ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],

            ]],
            ['text' => '新闻资讯', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '列表', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '详情', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '查看', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                ]],
                ['text' => '删除', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '栏目', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '新增', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '更新', 'url' => '/', 'state' => ['opened' => true]],
                ]],
            ]],
            ['text' => '保险管理', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '险种列表', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '添加险种', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '更新险种', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '统计', 'url' => '/', 'state' => ['opened' => true]],
            ['text' => '系统日志', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '通知消息', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '操作日志', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '订单日志', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '系统设置', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '基础设置', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '通知设置', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => 'key设置', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '非菜单', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '更改密码', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '营业开关', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '角色管理', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '添加角色', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '编辑角色', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '分配权限', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '分配角色', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '添加业务账号', 'url' => '/', 'state' => ['opened' => true]],
            ]],
        ]],
        ['text' => '服务商后台', 'url' => '/', 'state' => ['opened' => true]],
        ['text' => '代理商后台', 'url' => '/', 'state' => ['opened' => true]],

        ['text' => '服务端', 'url' => '/', 'state' => ['opened' => true], 'children' => [
            ['text' => '客户管理', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '查看列表', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                    ['text' => '创建订单', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '取消订单', 'url' => '/', 'state' => ['opened' => true]],
                    ['text' => '订单状态变更', 'url' => '/', 'state' => ['opened' => true]],
                ]],
            ]],
            ['text' => '客户订单', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '创建订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '取消订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '订单状态变更', 'url' => '/', 'state' => ['opened' => true]],

            ]],
            ['text' => '保单管理', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '创建订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '取消订单', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '续保', 'url' => '/', 'state' => ['opened' => true]],

            ]],
            ['text' => '系统设置', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '通知开关', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '推送开关', 'url' => '/', 'state' => ['opened' => true]],
            ]],
            ['text' => '个人中心', 'url' => '/', 'state' => ['opened' => true], 'children' => [
                ['text' => '更改资料', 'url' => '/', 'state' => ['opened' => true]],
                ['text' => '修改密码', 'url' => '/', 'state' => ['opened' => true]],

            ]],
            ['text' => '统计中心', 'url' => '/', 'state' => ['opened' => true]],
        ]],
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
                    ['title' => '', 'key' => 'quick', 'len' => '0', 'show' => 1, 'sub' => [
                        ['title' => '保险', 'key' => 'member_insurance_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '救援', 'key' => 'member_rescue_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '维修', 'key' => 'member_fix_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '保养', 'key' => 'member_upkeep_order', 'len' => '0', 'show' => 1, 'sub' => []],
                        ['title' => '审车', 'key' => 'member_review_order', 'len' => '0', 'show' => 1, 'sub' => []],
                    ]],
                ]],
            ]],
            ['title' => '工作', 'key' => 'home', 'len' => '4', 'show' => 1, 'sub' => [
                ['title' => '我的客户', 'key' => 'my_member', 'len' => '0', 'show' => 1, 'sub' => []],
                ['title' => '客户订单', 'key' => 'member_order', 'len' => '0', 'show' => 1, 'sub' => []],
                ['title' => '保单管理', 'key' => 'insurance_order_handle', 'len' => '0', 'show' => 1, 'sub' => []],
                ['title' => '订单处理', 'key' => 'order_handle', 'len' => '0', 'show' => 1, 'sub' => []],
            ]],
            ['title' => '我的', 'key' => 'my', 'len' => '2', 'show' => 1, 'sub' => [
                ['title' => '我的组织', 'key' => 'my_group', 'len' => '0', 'show' => 1, 'sub' => [
                    ['title' => '', 'key' => 'service_info', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '', 'key' => 'service_operating_status', 'len' => '0', 'show' => 1, 'sub' => []],
                ]],
                ['title' => '', 'key' => 'other', 'len' => '4', 'show' => 1, 'sub' => [
                    ['title' => '我的邀请码', 'key' => 'my_share_code', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '消息通知', 'key' => 'notice', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '联系我们', 'key' => 'contact_us', 'len' => '0', 'show' => 1, 'sub' => []],
                    ['title' => '设置', 'key' => 'setting', 'len' => '0', 'show' => 1, 'sub' => []],
                ]],
            ]],
        ]],
    ],


];
