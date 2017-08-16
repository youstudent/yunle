<?php
return [
    'adminEmail' => 'admin@example.com',
    'pd.admin.configs' => [
        'defaultUserStatus' => 0, // 0 = inactive, 10 = active
        'userTable' => '{{%adminuser}}',
    ],

    'agency_role_name' => '代理商',
    'service_role_name' => '服务商',

    //抽象路由，其实是不存在滴，用来辅助判断权限
    'abs_route' => [
        '/abs-route/get-customer-manager',  //判断用户有没有获取客户经理权限
        '/abs-route/get-all-service',  //判断用户有没有获取全部服务商权限
        '/abs-route/get-all-agency',  //判断用户有没有获取全部代理商权限
        '/abs-route/get-all-salesman',  //判断用户有没有获取全部业务员权限
        '/abs-route/get-all-member',  //判断用户有没有获取全部会员权限

        //统计中心
        '/abs-route/panel-get-wait-check-car-order',
        '/abs-route/panel-get-wait-check-insurance-order',
        '/abs-route/panel-get-wait-check-insurance-order-success',
        '/abs-route/panel-get-wait-check-order',
        '/abs-route/panel-get-notice',
    ]
];
