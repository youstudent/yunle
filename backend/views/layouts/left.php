<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?= $directoryAsset ?>/img/user-13.jpg" alt="" /></a>
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
                'items' => [
                    ['label' => 'Navigation', 'options' => ['class' => 'nav-header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'url' => 'javascript:;',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ],
                    ],
                ],
            ]
        ) ?>
<!--        <ul class="nav">-->
<!--            <li class="nav-header">Navigation</li>-->
<!--            <li class="has-sub">-->
<!--                <a href="javascript:;">-->
<!--                    <b class="caret pull-right"></b>-->
<!--                    <i class="fa fa-laptop"></i>-->
<!--                    <span>Dashboard</span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li><a href="index.html">Dashboard v1</a></li>-->
<!--                    <li><a href="index_v2.html">Dashboard v2</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="has-sub">-->
<!--                <a href="javascript:;">-->
<!--                    <b class="caret pull-right"></b>-->
<!--                    <i class="fa fa-align-left"></i>-->
<!--                    <span>Menu Level</span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li class="has-sub">-->
<!--                        <a href="javascript:;">-->
<!--                            <b class="caret pull-right"></b>-->
<!--                            Menu 1.1-->
<!--                        </a>-->
<!--                        <ul class="sub-menu">-->
<!--                            <li class="has-sub">-->
<!--                                <a href="javascript:;">-->
<!--                                    <b class="caret pull-right"></b>-->
<!--                                    Menu 2.1-->
<!--                                </a>-->
<!--                                <ul class="sub-menu">-->
<!--                                    <li><a href="javascript:;">Menu 3.1</a></li>-->
<!--                                    <li><a href="javascript:;">Menu 3.2</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="javascript:;">Menu 2.2</a></li>-->
<!--                            <li><a href="javascript:;">Menu 2.3</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="javascript:;">Menu 1.2</a></li>-->
<!--                    <li><a href="javascript:;">Menu 1.3</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->