<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?= $directoryAsset ?>/img/user-13.jpg" alt=""/></a>
                </div>
                <div class="info">
                    Sean Ngu
                    <small>Front end developer</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->

        <!-- begin sidebar nav -->
        <?php
        //$menu = \mdm\admin\components\MenuHelper::getAssignedMenu(0);
        ?>
        <?= pd\coloradmin\widgets\Menu::widget(
            [
                'options' => ['class' => 'nav'],
                'items'   => [
                    ['label' => '菜单', 'options' => ['class' => 'nav-header']],
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
                        'label'   => '设置',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '系统', 'url' => ['/system/index']],
                            ['label' => '保险商', 'url' => ['/insurance-company/index']],
                            ['label' => '险种', 'url' => ['/insurance/index']],
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
            ]
        ) ?>
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