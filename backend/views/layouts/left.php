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
        if(Yii::$app->user->getIdentity() && Yii::$app->user->getIdentity()->id > 1){
            $menu = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->getIdentity()->id);
        }else{
            $menu =
                [
                    ['label' => '', 'options' => ['class' => 'nav-header']],
                    ['label' => '首页', 'url' => '/site'],
                    ['label' => '账号信息', 'url' => '/account/index'],
                    [
                        'label'   => '用户管理',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '服务商', 'url' => ['/service/index']],
                            ['label' => '代理商', 'url' => ['/agency/index']],
                            ['label' => '业务员', 'url' => ['/salesman/index']],
                            ['label' => '会员', 'url' => ['/member/index']],
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
                            ['label' => '车辆', 'url' => ['/car/index']],
                            ['label' => '保单', 'url' => ['/insurance-order/indexc']],
                        ],
                    ],
                    [
                        'label'   => '设置',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '系统', 'url' => ['/system/index']],
                            ['label' => '通知列表', 'url' => ['/notice/index']],
                            ['label' => '保险商', 'url' => ['/insurance-company/index']],
                            ['label' => '险种', 'url' => ['/insurance/index']],
                            ['label' => '我的信息', 'url' => ['/account/profile']],
                        ],
                    ],
                    [
                        'label'   => '权限',
                        'url'     => 'javascript:;',
                        'options' => ['class' => 'has-sub'],
                        'items'   => [
                            ['label' => '角色', 'url' => ['/rbac/role-index']],
                            ['label' => '员工', 'url' => ['/rbac/account-index']],
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
                ];
        }
        ?>
        <?= pd\coloradmin\widgets\Menu::widget([
                'options'=> ['class' => 'nav',],
                'items'=>$menu,
        ]) ?>

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