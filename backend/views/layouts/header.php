<?php
use backend\models\Service;
use common\components\Helper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

$api = Url::to(['account/service-status']);
pd\coloradmin\web\plugins\SwitcheryAsset::register($this);
$this->registerJs(<<<JS
var green = "#00acac", red = "#ff5b57", blue = "#348fe2", purple = "#727cb6", orange = "#f59c1a", black = "#2d353c",
    renderSwitcher = function () {
        0 !== $("[data-render=switchery]").length && $("[data-render=switchery]").each(function () {
            var t = green;
            if ($(this).attr("data-theme"))switch ($(this).attr("data-theme")) {
                case"red":
                    t = red;
                    break;
                case"blue":
                    t = blue;
                    break;
                case"purple":
                    t = purple;
                    break;
                case"orange":
                    t = orange;
                    break;
                case"black":
                    t = black
            }
            var a = {};
            a.color = t, a.secondaryColor = $(this).attr("data-secondary-color") ? $(this).attr("data-secondary-color") : "#dfdfdf", a.className = $(this).attr("data-classname") ? $(this).attr("data-classname") : "switchery", a.disabled = $(this).attr("data-disabled") ? !0 : !1, a.disabledOpacity = $(this).attr("data-disabled-opacity") ? parseFloat($(this).attr("data-disabled-opacity")) : .5, a.speed = $(this).attr("data-speed") ? $(this).attr("data-speed") : "0.5s";
            new Switchery(this, a)
        })
    }, checkSwitcherState = function () {
        $('[data-click="check-switchery-state"]').live("click", function () {
            alert($('[data-id="switchery-state"]').prop("checked"))
        }), $('[data-change="check-switchery-state-text"]').live("change", function () {
            if($(this).prop("checked")){
                $.get('{$api}'+'?opt=1');
                $('[data-id="switchery-state-text"]').attr('class', 'btn btn-xs btn-primary disabled m-l-5');
                $('[data-id="switchery-state-text"]').text('营业中') 
            }else{
                $.get('{$api}'+'?opt=0');
                $('[data-id="switchery-state-text"]').attr('class', 'btn btn-xs btn-danger disabled m-l-5');
                $('[data-id="switchery-state-text"]').text('已停业');
            }
        })
    }, FormSliderSwitcher = function () {
        "use strict";
        return {
            init: function () {
                renderSwitcher(), checkSwitcherState()
            }
        }
    }();
       FormSliderSwitcher.init();
JS
);
?>

<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span>
                <?php
                $group = Helper::getLoginMemberRoleGroup();
                switch($group){
                    case 1:
                        echo '云乐享车-后台管理';
                        break;
                    case 2:
                        echo '云乐享车-服务平台';
                        break;
                    case 3:
                        echo '云乐享车-代理平台';
                        break;
                }

                ?>
            </a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <?php if(pd\admin\components\Helper::checkRoute('/account/service-status')) : ?>
                <form class="navbar-form full-width">
                    <div class="form-group">
                        <?php
                        $service_id = Helper::getLoginMemberServiceId();
                        $state = Service::findOne($service_id)->state;
                        ?>
                        <?php if($state == 1) : ?>
                            <input type="checkbox" data-render="switchery" data-theme="blue"  data-change="check-switchery-state-text" checked />
                            <a href="#" class="btn btn-xs btn-primary disabled m-l-5" data-id="switchery-state-text">营业中</a>
                        <?php else: ?>
                            <input type="checkbox" data-render="switchery" data-theme="blue"  data-change="check-switchery-state-text"  />
                            <a href="#" class="btn btn-xs btn-danger disabled m-l-5" data-id="switchery-state-text">已停业</a>
                        <?php endif; ?>

                    </div>
                </form>
                <?php endif; ?>
            </li>
<!--            <li class="dropdown">-->
<!--                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">-->
<!--                    <i class="fa fa-bell-o"></i>-->
<!--                    <span class="label">5</span>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu media-list pull-right animated fadeInDown">-->
<!--                    <li class="dropdown-header"> 通知消息 (5)</li>-->
<!--                    <li class="media">-->
<!--                        <a href="javascript:;">-->
<!--                            <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="media-heading">Server Error Reports</h6>-->
<!--                                <div class="text-muted f-s-11">3 minutes ago</div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="media">-->
<!--                        <a href="javascript:;">-->
<!--                            <div class="media-left"><img src="--><?//= $directoryAsset ?><!--/img/user-1.jpg"-->
<!--                                                         class="media-object" alt=""/></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="media-heading">John Smith</h6>-->
<!--                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>-->
<!--                                <div class="text-muted f-s-11">25 minutes ago</div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="media">-->
<!--                        <a href="javascript:;">-->
<!--                            <div class="media-left"><img src="--><?//= $directoryAsset ?><!--/img/user-2.jpg"-->
<!--                                                         class="media-object" alt=""/></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="media-heading">Olivia</h6>-->
<!--                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>-->
<!--                                <div class="text-muted f-s-11">35 minutes ago</div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="media">-->
<!--                        <a href="javascript:;">-->
<!--                            <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="media-heading"> New User Registered</h6>-->
<!--                                <div class="text-muted f-s-11">1 hour ago</div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="media">-->
<!--                        <a href="javascript:;">-->
<!--                            <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="media-heading"> New Email From John</h6>-->
<!--                                <div class="text-muted f-s-11">2 hour ago</div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="dropdown-footer text-center">-->
<!--                        <a href="javascript:;">View more</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= $directoryAsset ?>/img/user-3.jpg" alt=""/>
                    <span class="hidden-xs"><?= Yii::$app->user->getIdentity() ? Yii::$app->user->getIdentity()->username : '默认管理员' ?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li><a href="<?= Url::to(['account/index']) ?>">我的信息</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= Url::to(['/admin/user/logout']) ?>">注销</a></li>
                </ul>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end #header -->
