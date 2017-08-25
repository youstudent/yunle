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
        //权限分离
        '/abs-route/customer-manager', //客户经理


        //统计中心
        '/abs-route/panel-get-wait-check-car-order',
        '/abs-route/panel-get-wait-check-insurance-order',
        '/abs-route/panel-get-wait-check-insurance-order-success',
        '/abs-route/panel-get-wait-check-order',
        '/abs-route/panel-get-notice',




    ]
];
