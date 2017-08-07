<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">

        </ul>
        <!-- end sidebar user -->

        <!-- begin sidebar nav -->
        <?php
        //$menu = \mdm\admin\components\MenuHelper::getAssignedMenu(0);
        $menu =
            [
                'options' => ['class' => 'nav'],
                'items'   => [
                    ['label' => '', 'options' => ['class' => 'nav-header']],
                    ['label' => '面板', 'url' => '/panel'],
                    [
                        'label'   => '组织',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '会员', 'url' => ['/member/index']],
                            ['label' => '业务员', 'url' => ['/salesman/index']],
                            ['label' => '服务商', 'url' => ['/service/index']],
                        ],
                    ],
                    [
                        'label'   => '业务',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '订单池', 'url' => ['/order/wall']],
                            ['label' => '订单列表', 'url' => ['/order/index']],
                            ['label' => '保险订单', 'url' => ['/insurance-order/index']],
                        ],
                    ],
                    [
                        'label'   => '审核',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '身份证', 'url' => ['/a/wall']],
                            ['label' => '行驶证', 'url' => ['/b/index']],
                            ['label' => '服务商', 'url' => ['/c-order/index']],
                        ],
                    ],
                    [
                        'label'   => '内容',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '广告', 'url' => ['/banner/index']],
                            ['label' => '栏目', 'url' => ['/column/index']],
                            ['label' => '文章', 'url' => ['/article/index']],
                        ],
                    ],
                    [
                        'label'   => '档案',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '驾照', 'url' => ['/driver/index']],
                            ['label' => '身份证', 'url' => ['/identity/index']],
                            ['label' => '行驶证', 'url' => ['/car/index']],
                            ['label' => '保单', 'url' => ['/warranty/index']],
                        ],
                    ],
                    [
                        'label'   => '设置',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '系统', 'url' => ['/system/index']],
                            ['label' => '保险商', 'url' => ['/insurance-company/index']],
                            ['label' => '险种', 'url' => ['/insurance/index']],
                            ['label' => '我的信息', 'url' => ['/service/profile']],
                        ],
                    ],
                    [
                        'label'   => '权限',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '角色', 'url' => ['/system/index']],
                            ['label' => '员工', 'url' => ['/abc/index']],
                            ['label' => '账号', 'url' => ['/insurance-company/index']],
                        ],
                    ],
                    [
                        'label'   => '权限管理',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '路由管理', 'url' => ['/admin/route']],
                            ['label' => '权限管理', 'url' => ['/admin/permission']],
                            ['label' => '菜单管理', 'url' => ['/admin/menu']],
                            ['label' => '角色管理', 'url' => ['/admin/role']],
                            ['label' => '权限分配', 'url' => ['/admin/assignment']],
                            ['label' => '用户管理', 'url' => ['/admin/user']],
                        ],
                    ],
                ],
            ];
        ?>
        <?= pd\coloradmin\widgets\Menu::widget($menu) ?>

        <!-- begin sidebar minify button -->
        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="fa fa-angle-double-left"></i></a></li>
        <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->