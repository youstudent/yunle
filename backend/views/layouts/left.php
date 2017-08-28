<?php
use common\components\Helper;

$callback = function($menu){

    $data = json_decode($menu['data'], true);
    $items = $menu['children'];
    $return = [
        'label' => $menu['name'],
        'url' => [$menu['route']],
    ];
    //处理我们的配置
    if ($data) {
        //visible
        isset($data['visible']) && $return['visible'] = $data['visible'];
        //icon
        isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];

        isset($data['template']) && $data['template'] && $return['template'] = $data['template'];

        //$return['options'] = $data;
    }
    //没配置图标的显示默认图标
    //(!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o';
    $items && $return['items'] = $items;
    return $return;
};
$menu = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->getIdentity()->id, null, $callback, true);

?>
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
<!--            <li class="nav-profile">-->
<!---->
<!--            </li>-->
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <?php
        $menu = pd\coloradmin\widgets\Menu::widget([
            'options'=> [
                'class' => 'nav',
            ],
            'items'=>$menu,
            'defaultIconHtml'=> '<i class="fa fa-circle-o"></i>',
            'submenuTemplate' => "\n<ul class='sub-menu' {show}>\n{items}\n</ul>\n",
            'activateParents' => true,
            'linkTemplate' => '<a href="{url}">{label}</a>',
        ]);

        $menu = rtrim($menu, "</ul>");
        $menu .= '<!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
            class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>';
        echo $menu;

        ?>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->