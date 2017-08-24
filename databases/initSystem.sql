/*
 Navicat Premium Data Transfer

 Source Server         : 云乐享车线上
 Source Server Type    : MySQL
 Source Server Version : 50554
 Source Host           : 119.23.15.134
 Source Database       : cloud_car

 Target Server Type    : MySQL
 Target Server Version : 50554
 File Encoding         : utf-8

 Date: 08/24/2017 16:57:02 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cdc_act_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_act_detail`;
CREATE TABLE `cdc_act_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '操作人id',
  `user` varchar(50) DEFAULT '' COMMENT '操作人名',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '状态\r\n维修和保养和救援\r\n1.待接单 2.已接单 3.接车中 4.正在返回 5.已接车 6.已评估 7.处理中 8.待交车 99.已完成 100.已取消\r\n上线审车\r\n1.待接单 2.已接单 3.处理中 4.待交车 5.已出发 6.返修中 99.已完成 100.已取消\r\n不上线审车\r\n1.待邮寄 2.处理中 98.未通过 99.已完成 100.已取消',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  `port` tinyint(4) DEFAULT '1' COMMENT '端口 1客户端 2服务端 3平台端',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

-- ----------------------------
--  Table structure for `cdc_act_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_act_img`;
CREATE TABLE `cdc_act_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `act_id` int(10) NOT NULL COMMENT ' 流转id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='动态节点图片表';

-- ----------------------------
--  Table structure for `cdc_act_insurance`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_act_insurance`;
CREATE TABLE `cdc_act_insurance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '操作人id',
  `user` varchar(50) DEFAULT '' COMMENT '操作人名',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '状态\r\n1.待审核 2.等待确认 3.等待付款  97.核保成功 98.核保失败 99.已完成 100.已取消',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  `port` tinyint(4) DEFAULT '1' COMMENT '端口 1客户端 2服务端 3平台端',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险订单动态详情表';

-- ----------------------------
--  Table structure for `cdc_adminuser`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_adminuser`;
CREATE TABLE `cdc_adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '名称',
  `mark` tinyint(1) DEFAULT '1' COMMENT '1。管理员。 2服务商 3代理商',
  `master` tinyint(1) DEFAULT '0' COMMENT '服务商或者代理商主账号。 1代表是主账号',
  `password_reset_token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='平台账号表';

-- ----------------------------
--  Records of `cdc_adminuser`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_adminuser` VALUES ('1', 'ypxl', '', '$2y$13$WAcqrza3bZ3Fvgl3S8tEUuVRbUrPdbil.XPAF2QFUh07qVNen/ByK', '', '10', '0', '0', '管理员1号', '1', '1', null);
COMMIT;

-- ----------------------------
--  Table structure for `cdc_adminuser_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_adminuser_img`;
CREATE TABLE `cdc_adminuser_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `adminuser_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台用户图片表';

-- ----------------------------
--  Table structure for `cdc_adminuser_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_adminuser_tag`;
CREATE TABLE `cdc_adminuser_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `tag_id` int(10) NOT NULL COMMENT 'tag_id',
  `adminuser_id` int(10) NOT NULL COMMENT 'user_id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台用户标签表';

-- ----------------------------
--  Table structure for `cdc_app_menu`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_app_menu`;
CREATE TABLE `cdc_app_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `key` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_app_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_menu` VALUES ('1', '首页', null, 'home'), ('2', '待处理订单', '1', 'wait_order'), ('3', '救援订单', '2', 'rescue_order'), ('4', '维修订单', '2', 'fix_order'), ('5', '保养订单', '2', 'upkeep_order'), ('6', '审车订单', '2', 'review_order'), ('7', '我的会员', '1', 'my_member'), ('8', '快速入口', '7', 'quick'), ('9', '保险', '8', 'member_insurance_order'), ('10', '救援', '8', 'member_rescue_order'), ('11', '维修', '8', 'member_fix_order'), ('12', '保养', '8', 'member_upkeep_order'), ('13', '审车', '8', 'member_review_order'), ('14', '工作', null, 'work'), ('15', '我的客户', '14', 'work_my_member'), ('16', '客户订单', '14', 'member_order'), ('17', '保单管理', '14', 'insurance_order_handle'), ('18', '订单处理', '14', 'order_handle'), ('19', '我的', null, 'my'), ('20', '我的组织', '19', 'my_group'), ('21', '个人中心', '19', 'other'), ('22', '我的邀请码', '21', 'my_share_code'), ('23', '消息通知', '21', 'notice'), ('24', '联系我们', '21', 'contact_us'), ('25', '设置', '21', 'setting'), ('26', '营业状态开关', '19', 'my_group_switch');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_app_menu_without`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_app_menu_without`;
CREATE TABLE `cdc_app_menu_without` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL COMMENT '服务商id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `menu_id` int(11) NOT NULL COMMENT '无权限的菜单id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_name_menu` (`service_id`,`role_id`,`menu_id`) USING BTREE COMMENT ' 同一角色只能取消授权一次'
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_app_menu_without`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_menu_without` VALUES ('31', '2', '1', '10'), ('20', '2', '1', '12'), ('33', '2', '1', '13');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_app_role`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_app_role`;
CREATE TABLE `cdc_app_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT ' 角色名字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `service_id` int(11) NOT NULL COMMENT '服务商Id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `cdc_app_role_assign`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_app_role_assign`;
CREATE TABLE `cdc_app_role_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'user_id',
  `role_id` int(11) NOT NULL COMMENT 'role id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_role` (`user_id`,`role_id`) USING BTREE COMMENT '角色一对一'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `cdc_article`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_article`;
CREATE TABLE `cdc_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '文章题目',
  `author` varchar(50) NOT NULL DEFAULT '' COMMENT '文章作者',
  `content` text NOT NULL COMMENT '文章内容',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '文章状态 1 正常  0 禁用',
  `column_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属栏目id',
  `views` int(10) DEFAULT '100000' COMMENT '浏览量',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cdc_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_auth_assignment`;
CREATE TABLE `cdc_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `cdc_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `cdc_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `cdc_auth_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_assignment` VALUES ('管理员', '1', '1503564992');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_auth_item`;
CREATE TABLE `cdc_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `cdc_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `cdc_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `cdc_auth_item`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_item` VALUES ('/*', '2', null, null, null, '1502791471', '1502791471'), ('/abs-route/panel-get-notice', '2', null, null, null, '1502854830', '1502854830'), ('/abs-route/panel-get-wait-check-car-order', '2', null, null, null, '1502854779', '1502854779'), ('/abs-route/panel-get-wait-check-insurance-order', '2', null, null, null, '1502854785', '1502854785'), ('/abs-route/panel-get-wait-check-insurance-order-success', '2', null, null, null, '1502854791', '1502854791'), ('/abs-route/panel-get-wait-check-order', '2', null, null, null, '1502854796', '1502854796'), ('/account/*', '2', null, null, null, '1502791471', '1502791471'), ('/account/index', '2', null, null, null, '1502791471', '1502791471'), ('/account/modify-password', '2', null, null, null, '1502855348', '1502855348'), ('/admin/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/revoke', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/default/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/default/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/remove', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/remove', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/refresh', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/remove', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/activate', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/change-password', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/login', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/logout', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/request-password-reset', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/reset-password', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/signup', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/view', '2', null, null, null, '1502791484', '1502791484'), ('/agency/*', '2', null, null, null, '1502791471', '1502791471'), ('/agency/create', '2', null, null, null, '1502791471', '1502791471'), ('/agency/delete', '2', null, null, null, '1502791471', '1502791471'), ('/agency/index', '2', null, null, null, '1502791471', '1502791471'), ('/agency/profile', '2', null, null, null, '1502791471', '1502791471'), ('/agency/update', '2', null, null, null, '1502791471', '1502791471'), ('/agency/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/agency/view', '2', null, null, null, '1502791471', '1502791471'), ('/article/*', '2', null, null, null, '1502791471', '1502791471'), ('/article/create', '2', null, null, null, '1502791471', '1502791471'), ('/article/delete', '2', null, null, null, '1502791471', '1502791471'), ('/article/drop-down-list', '2', null, null, null, '1503402815', '1503402815'), ('/article/index', '2', null, null, null, '1502791471', '1502791471'), ('/article/set-status', '2', null, null, null, '1503454913', '1503454913'), ('/article/update', '2', null, null, null, '1502791471', '1502791471'), ('/article/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/*', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/account-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/assign', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/index', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/revoke', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/view', '2', null, null, null, '1502791471', '1502791471'), ('/backend/*', '2', null, null, null, '1502791471', '1502791471'), ('/banner/*', '2', null, null, null, '1502791471', '1502791471'), ('/banner/create', '2', null, null, null, '1502791471', '1502791471'), ('/banner/delete', '2', null, null, null, '1502791471', '1502791471'), ('/banner/index', '2', null, null, null, '1502791471', '1502791471'), ('/banner/update', '2', null, null, null, '1502791471', '1502791471'), ('/banner/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/car/*', '2', null, null, null, '1502791471', '1502791471'), ('/car/create', '2', null, null, null, '1502791471', '1502791471'), ('/car/delete', '2', null, null, null, '1502791471', '1502791471'), ('/car/index', '2', null, null, null, '1502791471', '1502791471'), ('/car/update', '2', null, null, null, '1502791471', '1502791471'), ('/car/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/column/*', '2', null, null, null, '1502791471', '1502791471'), ('/column/create', '2', null, null, null, '1502791471', '1502791471'), ('/column/delete', '2', null, null, null, '1502791471', '1502791471'), ('/column/index', '2', null, null, null, '1502791471', '1502791471'), ('/column/update', '2', null, null, null, '1502791471', '1502791471'), ('/column/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/driver/*', '2', null, null, null, '1502791471', '1502791471'), ('/driver/create', '2', null, null, null, '1502791471', '1502791471'), ('/driver/delete', '2', null, null, null, '1502791471', '1502791471'), ('/driver/index', '2', null, null, null, '1502791471', '1502791471'), ('/driver/update', '2', null, null, null, '1502791471', '1502791471'), ('/driver/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/identity/*', '2', null, null, null, '1502791471', '1502791471'), ('/identity/create', '2', null, null, null, '1502791471', '1502791471'), ('/identity/delete', '2', null, null, null, '1502791471', '1502791471'), ('/identity/index', '2', null, null, null, '1502791471', '1502791471'), ('/identity/update', '2', null, null, null, '1502791471', '1502791471'), ('/identity/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/identity/view', '2', null, null, null, '1502938375', '1502938375'), ('/insurance-company/*', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/create', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/delete', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/index', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/update', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/*', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/archives', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/cancel', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/change', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/check-failed', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/check-success', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/cost', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/create', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/detail', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/index', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/info', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/insurance', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/log', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/update', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/*', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/create', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/delete', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/index', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/insurance-order', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/set-status', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/update', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/media/*', '2', null, null, null, '1502791471', '1502791471'), ('/media/image-delete', '2', null, null, null, '1502791471', '1502791471'), ('/media/image-upload', '2', null, null, null, '1502791471', '1502791471'), ('/member/*', '2', null, null, null, '1502791471', '1502791471'), ('/member/create', '2', null, null, null, '1502791471', '1502791471'), ('/member/index', '2', null, null, null, '1502791471', '1502791471'), ('/member/info', '2', null, null, null, '1502791471', '1502791471'), ('/member/modify-salesman', '2', null, null, null, '1502791471', '1502791471'), ('/member/real', '2', null, null, null, '1502791471', '1502791471'), ('/member/set-status', '2', null, null, null, '1502791471', '1502791471'), ('/member/soft-delete', '2', null, null, null, '1502791471', '1502791471'), ('/member/test', '2', null, null, null, '1502791471', '1502791471'), ('/member/update', '2', null, null, null, '1502791471', '1502791471'), ('/member/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/member/view', '2', null, null, null, '1502791471', '1502791471'), ('/message/*', '2', null, null, null, '1502791471', '1502791471'), ('/message/create', '2', null, null, null, '1502791471', '1502791471'), ('/message/delete', '2', null, null, null, '1502791471', '1502791471'), ('/message/index', '2', null, null, null, '1502791471', '1502791471'), ('/message/view', '2', null, null, null, '1502791471', '1502791471'), ('/notice/*', '2', null, null, null, '1502791471', '1502791471'), ('/notice/index', '2', null, null, null, '1502791471', '1502791471'), ('/order/*', '2', null, null, null, '1502791471', '1502791471'), ('/order/create', '2', null, null, null, '1502791471', '1502791471'), ('/order/index', '2', null, null, null, '1502791471', '1502791471'), ('/order/log', '2', null, null, null, '1502791471', '1502791471'), ('/order/modify-status', '2', null, null, null, '1502791471', '1502791471'), ('/order/update', '2', null, null, null, '1502791471', '1502791471'), ('/order/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/order/wall', '2', null, null, null, '1502791471', '1502791471'), ('/organization/*', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-app-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-create', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-index', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-update', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-assign', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-create', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-index', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-update', '2', null, null, null, '1502791471', '1502791471'), ('/organization/assign-app-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/assign-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/get-app-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/get-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/modify-platform-password', '2', null, null, null, '1502791471', '1502791471'), ('/organization/remove-app-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/remove-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-assign', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-create', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-index', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-update', '2', null, null, null, '1502791471', '1502791471'), ('/organization/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/panel/*', '2', null, null, null, '1502791471', '1502791471'), ('/panel/index', '2', null, null, null, '1502791471', '1502791471'), ('/panel/order-add', '2', null, null, null, '1502854077', '1502854077'), ('/panel/user-add', '2', null, null, null, '1502854075', '1502854075'), ('/panel/wait-check-insurance-order', '2', null, null, null, '1502791471', '1502791471'), ('/panel/wait-check-insurance-order-success', '2', null, null, null, '1502791471', '1502791471'), ('/panel/wait-check-order', '2', null, null, null, '1502791471', '1502791471'), ('/panel/wait-check-state', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/*', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-create', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-index', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-update', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/assign', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/assign-permission', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/get-permission', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/modify-platform-password', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/remove-permission', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-assign', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-create', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-index', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-update', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/redactor/upload-file', '2', null, null, null, '1502791471', '1502791471'), ('/redactor/upload-img', '2', null, null, null, '1502791471', '1502791471'), ('/redactor/upload-img-json', '2', null, null, null, '1502791471', '1502791471'), ('/review/car-detail', '2', null, null, null, '1503300083', '1503300083'), ('/review/car-list', '2', null, null, null, '1503283443', '1503283443'), ('/review/car-out', '2', null, null, null, '1503283468', '1503283468'), ('/review/car-pass', '2', null, null, null, '1503283456', '1503283456'), ('/review/driver-detail', '2', null, null, null, '1503300113', '1503300113'), ('/review/driver-list', '2', null, null, null, '1503283490', '1503283490'), ('/review/driver-out', '2', null, null, null, '1503283506', '1503283506'), ('/review/driver-pass', '2', null, null, null, '1503283498', '1503283498'), ('/salesman/*', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/create', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/drop-down-list', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/index', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/set-status', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/soft-delete', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/update', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/view', '2', null, null, null, '1502791471', '1502791471'), ('/service/*', '2', null, null, null, '1502791471', '1502791471'), ('/service/create', '2', null, null, null, '1502791471', '1502791471'), ('/service/delete', '2', null, null, null, '1502791471', '1502791471'), ('/service/index', '2', null, null, null, '1502791471', '1502791471'), ('/service/profile', '2', null, null, null, '1502791471', '1502791471'), ('/service/set-status', '2', null, null, null, '1503038965', '1503038965'), ('/service/update', '2', null, null, null, '1502791471', '1502791471'), ('/service/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/service/view', '2', null, null, null, '1502791471', '1502791471'), ('/site/*', '2', null, null, null, '1502791471', '1502791471'), ('/site/error', '2', null, null, null, '1502791471', '1502791471'), ('/site/index', '2', null, null, null, '1502791471', '1502791471'), ('/site/init-menu', '2', null, null, null, '1502791471', '1502791471'), ('/site/login', '2', null, null, null, '1502791471', '1502791471'), ('/site/logout', '2', null, null, null, '1502791471', '1502791471'), ('/site/push-all-message', '2', null, null, null, '1502791471', '1502791471'), ('/site/push-all-message1', '2', null, null, null, '1502791471', '1502791471'), ('/site/stat', '2', null, null, null, '1502791471', '1502791471'), ('/site/test', '2', null, null, null, '1502791471', '1502791471'), ('/system/*', '2', null, null, null, '1502791471', '1502791471'), ('/system/index', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/*', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/detail', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/edit', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/index', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/update', '2', null, null, null, '1502791471', '1502791471'), ('业务-保险业务-时间筛选', '2', null, null, null, '1502794515', '1502794515'), ('业务-保险业务-服务商筛选', '2', null, null, null, '1502794569', '1502794569'), ('业务-保险业务-查看订单详情', '2', null, null, null, '1502794603', '1502794603'), ('业务-保险业务-联系人筛选', '2', null, null, null, '1502794532', '1502794532'), ('业务-保险业务-联系电话筛选', '2', null, null, null, '1502794543', '1502794543'), ('业务-保险业务-订单删除', '2', null, null, null, '1502794620', '1502794620'), ('业务-保险业务-订单状态筛选', '2', null, null, null, '1502794582', '1502794582'), ('业务-保险业务-车牌号筛选', '2', null, null, null, '1502794558', '1502794558'), ('业务-订单业务-业务员名筛选', '2', null, null, null, '1502794434', '1502794434'), ('业务-订单业务-时间筛选', '2', null, null, null, '1502794365', '1502794365'), ('业务-订单业务-服务商名筛选', '2', null, null, null, '1502794421', '1502794421'), ('业务-订单业务-查看流程', '2', null, null, null, '1502794338', '1502794338'), ('业务-订单业务-联系人筛选', '2', null, null, null, '1502794384', '1502794384'), ('业务-订单业务-联系电话筛选', '2', null, null, null, '1502794394', '1502794394'), ('业务-订单业务-订单列表', '2', null, null, null, '1502794260', '1502794260'), ('业务-订单业务-订单变更状态', '2', null, null, null, '1502794287', '1502794287'), ('业务-订单业务-车牌号筛选', '2', null, null, null, '1502794407', '1502794407'), ('代理商', '1', null, null, null, '1502847527', '1502847527'), ('内容管理-广告-删除广告', '2', null, null, null, '1502794725', '1502794725'), ('内容管理-广告-广告列表', '2', null, null, null, '1502862999', '1502862999'), ('内容管理-广告-查看广告详情', '2', null, null, null, '1502794716', '1502794716'), ('内容管理-广告-添加广告', '2', null, null, null, '1502794654', '1502794654'), ('内容管理-广告-编辑广告', '2', null, null, null, '1502794705', '1502794705'), ('内容管理-文章-删除文章', '2', null, null, null, '1502794837', '1502794837'), ('内容管理-文章-时间筛选', '2', null, null, null, '1502794873', '1502794873'), ('内容管理-文章-显示/隐藏文章', '2', null, null, null, '1503454945', '1503454945'), ('内容管理-文章-查看文章详情', '2', null, null, null, '1502794854', '1502794854'), ('内容管理-文章-标题筛选', '2', null, null, null, '1502794890', '1502794890'), ('内容管理-文章-添加文章', '2', null, null, null, '1502794821', '1502794821'), ('内容管理-文章-编辑文章', '2', null, null, null, '1502794829', '1502794829'), ('内容管理-栏目-删除栏目', '2', null, null, null, '1502794781', '1502794781'), ('内容管理-栏目-添加栏目', '2', null, null, null, '1502794750', '1502794750'), ('内容管理-栏目-编辑栏目', '2', null, null, null, '1502794765', '1502794765'), ('后台权限', '2', null, null, null, '1502792970', '1502792970'), ('后台权限-员工', '2', null, null, null, '1502792699', '1502792699'), ('后台权限-员工-删除', '2', null, null, null, '1502792834', '1502792834'), ('后台权限-员工-更改角色', '2', null, null, null, '1502792884', '1502792884'), ('后台权限-员工-添加员工', '2', null, null, null, '1502792760', '1502792760'), ('后台权限-员工-编辑', '2', null, null, null, '1502792795', '1502792795'), ('后台权限-角色', '2', null, null, null, '1502792653', '1502792653'), ('后台权限-角色-删除', '2', null, null, null, '1502792615', '1502792615'), ('后台权限-角色-权限', '2', null, null, null, '1502792453', '1502792453'), ('后台权限-角色-添加角色', '2', null, null, null, '1502792358', '1502792358'), ('后台权限-角色-编辑', '2', null, null, null, '1502792526', '1502792526'), ('后台设置', '2', null, null, null, '1502794672', '1502863895'), ('后台设置-保险商', '2', null, null, null, '1502795028', '1502864045'), ('后台设置-保险商-删除', '2', null, null, null, '1502795111', '1502863927'), ('后台设置-保险商-添加保险商', '2', null, null, null, '1502795082', '1502864056'), ('后台设置-保险商-编辑', '2', null, null, null, '1502795132', '1502863944'), ('后台设置-系统', '2', null, null, null, '1502794701', '1502863969'), ('后台设置-系统-基础设置', '2', null, null, null, '1502794825', '1502863986'), ('后台设置-系统-客户端推送设置', '2', null, null, null, '1502794873', '1502864012'), ('后台设置-系统-服务端推送设置', '2', null, null, null, '1502794887', '1502864028'), ('后台设置-系统-短信设置', '2', null, null, null, '1502794841', '1502864079'), ('后台设置-险种', '2', null, null, null, '1502795266', '1502864094'), ('后台设置-险种-删除', '2', null, null, null, '1502795325', '1502864108'), ('后台设置-险种-添加险种', '2', null, null, null, '1502795300', '1502864125'), ('后台设置-险种-编辑', '2', null, null, null, '1502795346', '1502864152'), ('后台设置-险种-编辑要素', '2', null, null, null, '1503281122', '1503281122'), ('后台设置-险种-设置状态', '2', null, null, null, '1502795403', '1502864192'), ('审核', '2', null, null, null, '1503279427', '1503283608'), ('审核-车辆审核', '2', null, null, null, '1503281531', '1503283682'), ('审核-车辆审核-不通过', '2', null, null, null, '1503283978', '1503283978'), ('审核-车辆审核-详情', '2', null, null, null, '1503300210', '1503300210'), ('审核-车辆审核-通过', '2', null, null, null, '1503283780', '1503283780'), ('审核-驾驶证审核', '2', null, null, null, '1503284677', '1503284677'), ('审核-驾驶证审核-不通过', '2', null, null, null, '1503284964', '1503284964'), ('审核-驾驶证审核-详情', '2', null, null, null, '1503300306', '1503300306'), ('审核-驾驶证审核-通过', '2', null, null, null, '1503284794', '1503284794'), ('客户经理', '1', null, null, null, '1502847391', '1502847391'), ('平台设置', '2', null, null, null, '1502793533', '1502952800'), ('平台设置-APP设置', '2', null, null, null, '1502794443', '1502952784'), ('平台设置-APP设置-角色列表', '2', null, null, null, '1502794480', '1502952816'), ('平台设置-APP设置-角色列表-删除', '2', null, null, null, '1502794547', '1502952830'), ('平台设置-APP设置-角色列表-权限', '2', null, null, null, '1502794580', '1502952844'), ('平台设置-APP设置-角色列表-权限-增加授权', '2', null, null, null, '1502949118', '1502952856'), ('平台设置-APP设置-角色列表-权限-移除授权', '2', null, null, null, '1502949183', '1502952875'), ('平台设置-APP设置-角色列表-添加角色', '2', null, null, null, '1502794517', '1502952888'), ('平台设置-APP设置-角色列表-编辑', '2', null, null, null, '1502794558', '1502952903'), ('平台设置-员工列表', '2', null, null, null, '1502793629', '1502953242'), ('平台设置-员工列表-删除', '2', null, null, null, '1502793918', '1502953279'), ('平台设置-员工列表-更改角色', '2', null, null, null, '1502794037', '1502953297'), ('平台设置-员工列表-添加员工', '2', null, null, null, '1502793811', '1502953317'), ('平台设置-员工列表-编辑', '2', null, null, null, '1502793857', '1502953342'), ('平台设置-角色列表', '2', null, null, null, '1502794167', '1502953367'), ('平台设置-角色列表-删除', '2', null, null, null, '1502794410', '1502953390'), ('平台设置-角色列表-权限', '2', null, null, null, '1502794372', '1502953430'), ('平台设置-角色列表-添加角色', '2', null, null, null, '1502794254', '1502953448'), ('平台设置-角色列表-编辑', '2', null, null, null, '1502794324', '1502953467'), ('服务商', '1', null, null, null, '1502847442', '1502847442'), ('档案管理-保单-保单列表', '2', null, null, null, '1502864893', '1502864893'), ('档案管理-保单-删除', '2', null, null, null, '1502795297', '1502795297'), ('档案管理-保单-承包公司筛选', '2', null, null, null, '1502795361', '1502795361'), ('档案管理-保单-时间筛选', '2', null, null, null, '1502795310', '1502795310'), ('档案管理-保单-联系人筛选', '2', null, null, null, '1502795320', '1502795320'), ('档案管理-保单-联系电话筛选', '2', null, null, null, '1502795333', '1502795333'), ('档案管理-保单-车牌号筛选', '2', null, null, null, '1502795347', '1502795347'), ('档案管理-身份证-删除身份证', '2', null, null, null, '1502795116', '1502795116'), ('档案管理-身份证-姓名筛选', '2', null, null, null, '1502795145', '1502795145'), ('档案管理-身份证-性别筛选', '2', null, null, null, '1502795151', '1502795151'), ('档案管理-身份证-时间筛选', '2', null, null, null, '1502795124', '1502795124'), ('档案管理-身份证-查看身份证详情', '2', null, null, null, '1502795100', '1502795100'), ('档案管理-身份证-添加身份证', '2', null, null, null, '1502795080', '1502795080'), ('档案管理-身份证-编辑身份证', '2', null, null, null, '1502795091', '1502795091'), ('档案管理-身份证-证件号筛选', '2', null, null, null, '1502795134', '1502795134'), ('档案管理-车辆-使用性质筛选', '2', null, null, null, '1502795270', '1502795270'), ('档案管理-车辆-删除车辆', '2', null, null, null, '1502795221', '1502795221'), ('档案管理-车辆-姓名筛选', '2', null, null, null, '1502795257', '1502795257'), ('档案管理-车辆-时间筛选', '2', null, null, null, '1502795237', '1502795237'), ('档案管理-车辆-查看车辆详情', '2', null, null, null, '1502795209', '1502795209'), ('档案管理-车辆-添加车辆', '2', null, null, null, '1502795172', '1502795172'), ('档案管理-车辆-编辑车辆', '2', null, null, null, '1502795196', '1502795196'), ('档案管理-车辆-证件号筛选', '2', null, null, null, '1502795250', '1502795250'), ('档案管理-驾照-准架车型筛选', '2', null, null, null, '1502795047', '1502795047'), ('档案管理-驾照-删除驾照', '2', null, null, null, '1502794972', '1502794972'), ('档案管理-驾照-名字筛选', '2', null, null, null, '1502795015', '1502795015'), ('档案管理-驾照-性别筛选', '2', null, null, null, '1502795029', '1502795029'), ('档案管理-驾照-时间筛选', '2', null, null, null, '1502794983', '1502794983'), ('档案管理-驾照-查看驾照详情', '2', null, null, null, '1502794960', '1502794960'), ('档案管理-驾照-添加驾照', '2', null, null, null, '1502794931', '1502794931'), ('档案管理-驾照-编辑驾照', '2', null, null, null, '1502794946', '1502794946'), ('档案管理-驾照-证件号筛选', '2', null, null, null, '1502795002', '1502795002'), ('用户管理', '2', null, null, null, '1502788245', '1502788245'), ('用户管理-业务员', '2', null, null, null, '1502793024', '1502793024'), ('用户管理-业务员-业务员状态筛选', '2', null, null, null, '1502793596', '1502793596'), ('用户管理-业务员-保险按钮', '2', null, null, null, '1502793647', '1502793647'), ('用户管理-业务员-冻结', '2', null, null, null, '1502793668', '1502793668'), ('用户管理-业务员-删除业务员', '2', null, null, null, '1502793221', '1502793221'), ('用户管理-业务员-名字筛选', '2', null, null, null, '1502793531', '1502793531'), ('用户管理-业务员-客户列表按钮', '2', null, null, null, '1502793614', '1502793614'), ('用户管理-业务员-手机号筛选', '2', null, null, null, '1502793562', '1502793562'), ('用户管理-业务员-时间筛选', '2', null, null, null, '1502793508', '1502793508'), ('用户管理-业务员-查看业务员详情', '2', null, null, null, '1502793122', '1502793122'), ('用户管理-业务员-添加业务员', '2', null, null, null, '1502793037', '1502793037'), ('用户管理-业务员-用户名筛选', '2', null, null, null, '1502793546', '1502793546'), ('用户管理-业务员-编辑业务员', '2', null, null, null, '1502793046', '1502793046'), ('用户管理-业务员-解冻', '2', null, null, null, '1502793681', '1502793681'), ('用户管理-业务员-订单按钮', '2', null, null, null, '1502793630', '1502793630'), ('用户管理-代理商', '2', null, null, null, '1502792608', '1502792608'), ('用户管理-代理商-代理商列表', '2', null, null, null, '1502792682', '1502792682'), ('用户管理-代理商-代理商名称筛选', '2', null, null, null, '1502792813', '1502792813'), ('用户管理-代理商-删除代理商', '2', null, null, null, '1502792698', '1502792698'), ('用户管理-代理商-客户经理筛选', '2', null, null, null, '1502792836', '1502792836'), ('用户管理-代理商-时间筛选', '2', null, null, null, '1502792794', '1502792794'), ('用户管理-代理商-查看代理商业务员', '2', null, null, null, '1502792777', '1502792777'), ('用户管理-代理商-查看代理商详情', '2', null, null, null, '1502792661', '1502792661'), ('用户管理-代理商-添加代理商', '2', null, null, null, '1502792631', '1502792631'), ('用户管理-代理商-编辑代理商', '2', null, null, null, '1502792646', '1502792646'), ('用户管理-代理商-负责人姓名筛选', '2', null, null, null, '1502792828', '1502792828'), ('用户管理-会员', '2', null, null, null, '1502793691', '1502793691'), ('用户管理-会员-业务员筛选', '2', null, null, null, '1502793834', '1502793834'), ('用户管理-会员-保险下单', '2', null, null, null, '1502794212', '1502794212'), ('用户管理-会员-保险订单按钮', '2', null, null, null, '1502793940', '1502793940'), ('用户管理-会员-删除会员', '2', null, null, null, '1502793750', '1502793750'), ('用户管理-会员-姓名筛选', '2', null, null, null, '1502793863', '1502793863'), ('用户管理-会员-实名认证', '2', null, null, null, '1502794004', '1502794004'), ('用户管理-会员-手机号筛选', '2', null, null, null, '1502793847', '1502793847'), ('用户管理-会员-时间筛选', '2', null, null, null, '1502793812', '1502793812'), ('用户管理-会员-普通下单', '2', null, null, null, '1502794202', '1502794202'), ('用户管理-会员-查看会员详情', '2', null, null, null, '1502793731', '1502793731'), ('用户管理-会员-添加会员', '2', null, null, null, '1502793702', '1502793702'), ('用户管理-会员-状态筛选', '2', null, null, null, '1502793893', '1502793893'), ('用户管理-会员-用户名筛选', '2', null, null, null, '1502793874', '1502793874'), ('用户管理-会员-用户类型筛选', '2', null, null, null, '1502793904', '1502793904'), ('用户管理-会员-编辑会员', '2', null, null, null, '1502793712', '1502793712'), ('用户管理-会员-订单按钮', '2', null, null, null, '1502793930', '1502793930'), ('用户管理-会员-车辆按钮', '2', null, null, null, '1502793964', '1502793964'), ('用户管理-会员-驾照按钮', '2', null, null, null, '1502793990', '1502793990'), ('用户管理-服务商', '2', null, null, null, '1502788996', '1502788996'), ('用户管理-服务商-客户经理筛选', '2', null, null, null, '1502792423', '1502792423'), ('用户管理-服务商-时间筛选', '2', null, null, null, '1502792110', '1502792110'), ('用户管理-服务商-服务商列表', '2', null, null, null, '1502791721', '1502791721'), ('用户管理-服务商-服务商名称筛选', '2', null, null, null, '1502792189', '1502792189'), ('用户管理-服务商-服务商启停', '2', null, null, null, '1503038942', '1503038942'), ('用户管理-服务商-查看服务商业务员', '2', null, null, null, '1502792048', '1502792048'), ('用户管理-服务商-查看服务商详情', '2', null, null, null, '1502791804', '1502791804'), ('用户管理-服务商-添加服务商', '2', null, null, null, '1502791654', '1502791654'), ('用户管理-服务商-电话筛选', '2', null, null, null, '1502792406', '1502792406'), ('用户管理-服务商-编辑服务商', '2', null, null, null, '1502791769', '1502791769'), ('用户管理-服务商-负责人姓名筛选', '2', null, null, null, '1502792214', '1502792214'), ('管理员', '1', null, null, null, '1502847350', '1502847350'), ('系统设置-我的信息', '2', null, null, null, '1502795503', '1502795503'), ('系统设置-我的信息-密码修改', '2', null, null, null, '1502795571', '1502795571'), ('系统设置-系统-添加设置项', '2', null, null, null, '1502794758', '1502794758'), ('系统设置-通知列表', '2', null, null, null, '1502794942', '1502794942'), ('系统设置-通知列表-新通知', '2', null, null, null, '1502794998', '1502794998'), ('统计信息', '2', null, null, null, '1502793522', '1502793522'), ('统计信息-公告', '2', null, null, null, '1502793331', '1502793331'), ('统计信息-待审核订单', '2', null, null, null, '1502793313', '1502793313'), ('统计信息-待审车订单', '2', null, null, null, '1502793244', '1502793244'), ('统计信息-待核保订单', '2', null, null, null, '1502793260', '1502793260'), ('统计信息-核保成功订单', '2', null, null, null, '1502793278', '1502793278'), ('统计信息-用户增长', '2', null, null, null, '1502793359', '1502793359'), ('统计信息-订单增长', '2', null, null, null, '1502793379', '1502793379'), ('账户信息', '2', null, null, null, '1502855119', '1502855119'), ('账户信息-修改密码', '2', null, null, null, '1502855192', '1502855192');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_auth_item_child`;
CREATE TABLE `cdc_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `cdc_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cdc_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cdc_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cdc_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `cdc_auth_item_child`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_item_child` VALUES ('统计信息-公告', '/abs-route/panel-get-notice'), ('统计信息-待审车订单', '/abs-route/panel-get-wait-check-car-order'), ('统计信息-待核保订单', '/abs-route/panel-get-wait-check-insurance-order'), ('统计信息-核保成功订单', '/abs-route/panel-get-wait-check-insurance-order-success'), ('统计信息-待审核订单', '/abs-route/panel-get-wait-check-order'), ('系统设置-我的信息', '/account/index'), ('账户信息', '/account/index'), ('账户信息-修改密码', '/account/modify-password'), ('管理员', '/admin/*'), ('管理员', '/admin/assignment/*'), ('管理员', '/admin/assignment/assign'), ('管理员', '/admin/assignment/index'), ('管理员', '/admin/assignment/revoke'), ('管理员', '/admin/assignment/view'), ('管理员', '/admin/default/*'), ('管理员', '/admin/default/index'), ('管理员', '/admin/menu/*'), ('管理员', '/admin/menu/create'), ('管理员', '/admin/menu/delete'), ('管理员', '/admin/menu/index'), ('管理员', '/admin/menu/update'), ('管理员', '/admin/menu/view'), ('管理员', '/admin/permission/*'), ('管理员', '/admin/permission/assign'), ('管理员', '/admin/permission/create'), ('管理员', '/admin/permission/delete'), ('管理员', '/admin/permission/index'), ('管理员', '/admin/permission/remove'), ('管理员', '/admin/permission/update'), ('管理员', '/admin/permission/view'), ('管理员', '/admin/role/*'), ('管理员', '/admin/role/assign'), ('管理员', '/admin/role/create'), ('管理员', '/admin/role/delete'), ('统计信息', '/admin/role/delete'), ('管理员', '/admin/role/index'), ('管理员', '/admin/role/remove'), ('管理员', '/admin/role/update'), ('管理员', '/admin/role/view'), ('管理员', '/admin/route/*'), ('管理员', '/admin/route/assign'), ('管理员', '/admin/route/create'), ('管理员', '/admin/route/index'), ('管理员', '/admin/route/refresh'), ('管理员', '/admin/route/remove'), ('管理员', '/admin/rule/*'), ('管理员', '/admin/rule/create'), ('管理员', '/admin/rule/delete'), ('管理员', '/admin/rule/index'), ('管理员', '/admin/rule/update'), ('管理员', '/admin/rule/view'), ('管理员', '/admin/user/*'), ('管理员', '/admin/user/activate'), ('管理员', '/admin/user/change-password'), ('管理员', '/admin/user/delete'), ('管理员', '/admin/user/index'), ('管理员', '/admin/user/login'), ('管理员', '/admin/user/logout'), ('管理员', '/admin/user/request-password-reset'), ('管理员', '/admin/user/reset-password'), ('管理员', '/admin/user/signup'), ('管理员', '/admin/user/view'), ('用户管理-代理商-添加代理商', '/agency/create'), ('用户管理-代理商-删除代理商', '/agency/delete'), ('用户管理-代理商-代理商列表', '/agency/index'), ('用户管理-代理商-编辑代理商', '/agency/update'), ('用户管理-代理商-添加代理商', '/agency/validate-form'), ('用户管理-代理商-编辑代理商', '/agency/validate-form'), ('用户管理-代理商-查看代理商详情', '/agency/view'), ('内容管理-文章-添加文章', '/article/create'), ('内容管理-文章-删除文章', '/article/delete'), ('内容管理-广告-添加广告', '/article/drop-down-list'), ('内容管理-广告-编辑广告', '/article/drop-down-list'), ('内容管理-文章-删除文章', '/article/index'), ('内容管理-文章-编辑文章', '/article/index'), ('内容管理-文章-显示/隐藏文章', '/article/set-status'), ('内容管理-文章-编辑文章', '/article/update'), ('内容管理-文章-添加文章', '/article/validate-form'), ('内容管理-文章-编辑文章', '/article/validate-form'), ('内容管理-广告-添加广告', '/banner/create'), ('内容管理-广告-删除广告', '/banner/delete'), ('内容管理-广告-删除广告', '/banner/index'), ('内容管理-广告-广告列表', '/banner/index'), ('内容管理-广告-查看广告详情', '/banner/index'), ('内容管理-广告-添加广告', '/banner/index'), ('内容管理-广告-编辑广告', '/banner/index'), ('内容管理-广告-编辑广告', '/banner/update'), ('内容管理-广告-添加广告', '/banner/validate-form'), ('内容管理-广告-编辑广告', '/banner/validate-form'), ('档案管理-车辆-添加车辆', '/car/create'), ('档案管理-车辆-添加车辆', '/car/index'), ('档案管理-车辆-编辑车辆', '/car/index'), ('档案管理-车辆-编辑车辆', '/car/update'), ('档案管理-车辆-添加车辆', '/car/validate-form'), ('档案管理-车辆-编辑车辆', '/car/validate-form'), ('内容管理-栏目-添加栏目', '/column/create'), ('内容管理-栏目-删除栏目', '/column/delete'), ('内容管理-栏目-删除栏目', '/column/index'), ('内容管理-栏目-添加栏目', '/column/index'), ('内容管理-栏目-编辑栏目', '/column/index'), ('内容管理-栏目-编辑栏目', '/column/update'), ('内容管理-栏目-编辑栏目', '/column/validate-form'), ('档案管理-驾照-添加驾照', '/driver/create'), ('档案管理-驾照-删除驾照', '/driver/delete'), ('档案管理-驾照-添加驾照', '/driver/index'), ('档案管理-驾照-编辑驾照', '/driver/update'), ('档案管理-驾照-添加驾照', '/driver/validate-form'), ('档案管理-驾照-编辑驾照', '/driver/validate-form'), ('档案管理-身份证-添加身份证', '/identity/create'), ('档案管理-身份证-删除身份证', '/identity/delete'), ('档案管理-身份证-删除身份证', '/identity/index'), ('档案管理-身份证-查看身份证详情', '/identity/index'), ('档案管理-身份证-编辑身份证', '/identity/index'), ('档案管理-身份证-编辑身份证', '/identity/update'), ('档案管理-身份证-添加身份证', '/identity/validate-form'), ('档案管理-身份证-编辑身份证', '/identity/validate-form'), ('档案管理-身份证-查看身份证详情', '/identity/view'), ('后台设置-保险商-添加保险商', '/insurance-company/create'), ('后台设置-保险商-删除', '/insurance-company/delete'), ('后台设置-保险商', '/insurance-company/index'), ('后台设置-保险商-编辑', '/insurance-company/update'), ('后台设置-保险商-添加保险商', '/insurance-company/validate-form'), ('后台设置-保险商-编辑', '/insurance-company/validate-form'), ('业务-保险业务-订单删除', '/insurance-order/index'), ('后台设置-险种-添加险种', '/insurance/create'), ('后台设置-险种-删除', '/insurance/delete'), ('后台设置-险种', '/insurance/index'), ('后台设置-险种-添加险种', '/insurance/index'), ('后台设置-险种-编辑', '/insurance/index'), ('后台设置-险种-设置状态', '/insurance/index'), ('后台设置-险种-设置状态', '/insurance/set-status'), ('后台设置-险种-编辑', '/insurance/update'), ('后台设置-险种-添加险种', '/insurance/validate-form'), ('后台设置-险种-编辑', '/insurance/validate-form'), ('用户管理-服务商-添加服务商', '/media/image-upload'), ('用户管理-服务商-编辑服务商', '/media/image-upload'), ('用户管理-会员-添加会员', '/member/create'), ('用户管理-会员-删除会员', '/member/index'), ('用户管理-会员-实名认证', '/member/index'), ('用户管理-会员-实名认证', '/member/real'), ('用户管理-会员-删除会员', '/member/soft-delete'), ('用户管理-会员-添加会员', '/member/validate-form'), ('系统设置-通知列表', '/notice/index'), ('业务-订单业务-查看流程', '/order/index'), ('业务-订单业务-订单变更状态', '/order/index'), ('业务-订单业务-查看流程', '/order/log'), ('业务-订单业务-订单变更状态', '/order/modify-status'), ('平台设置-员工列表-添加员工', '/organization/account-create'), ('平台设置-员工列表', '/organization/account-index'), ('平台设置-员工列表-更改角色', '/organization/account-modify-role'), ('平台设置-员工列表-编辑', '/organization/account-update'), ('平台设置-APP设置-角色列表-权限', '/organization/app-role-assign'), ('平台设置-APP设置-角色列表-添加角色', '/organization/app-role-create'), ('平台设置-APP设置-角色列表', '/organization/app-role-index'), ('平台设置-APP设置-角色列表-编辑', '/organization/app-role-update'), ('平台设置-APP设置-角色列表-权限-增加授权', '/organization/assign-app-permission'), ('平台设置-APP设置-角色列表-权限', '/organization/get-app-permission'), ('平台设置-APP设置-角色列表-权限-移除授权', '/organization/remove-app-permission'), ('平台设置-角色列表-权限', '/organization/role-assign'), ('平台设置-角色列表-添加角色', '/organization/role-create'), ('平台设置-角色列表', '/organization/role-index'), ('平台设置-角色列表-编辑', '/organization/role-update'), ('平台设置-APP设置-角色列表-添加角色', '/organization/validate-form'), ('平台设置-APP设置-角色列表-编辑', '/organization/validate-form'), ('统计信息', '/panel/index'), ('统计信息-订单增长', '/panel/order-add'), ('统计信息-用户增长', '/panel/user-add'), ('后台权限-员工-添加员工', '/rbac/account-create'), ('后台权限-员工', '/rbac/account-index'), ('后台权限-员工-更改角色', '/rbac/account-modify-role'), ('后台权限-员工-编辑', '/rbac/account-update'), ('后台权限-员工-编辑', '/rbac/account-validate-form'), ('系统设置-我的信息-密码修改', '/rbac/modify-platform-password'), ('后台权限-角色-权限', '/rbac/role-assign'), ('后台权限-角色-添加角色', '/rbac/role-create'), ('后台权限-角色', '/rbac/role-index'), ('后台权限-角色-编辑', '/rbac/role-update'), ('后台权限-角色-编辑', '/rbac/validate-form'), ('审核-车辆审核-详情', '/review/car-detail'), ('审核-车辆审核', '/review/car-list'), ('管理员', '/review/car-list'), ('审核-车辆审核-不通过', '/review/car-out'), ('管理员', '/review/car-out'), ('审核-车辆审核-通过', '/review/car-pass'), ('管理员', '/review/car-pass'), ('审核-驾驶证审核-详情', '/review/driver-detail'), ('审核-驾驶证审核', '/review/driver-list'), ('管理员', '/review/driver-list'), ('审核-驾驶证审核-不通过', '/review/driver-out'), ('管理员', '/review/driver-out'), ('审核-驾驶证审核-通过', '/review/driver-pass'), ('管理员', '/review/driver-pass'), ('用户管理-业务员-添加业务员', '/salesman/create'), ('用户管理-会员-添加会员', '/salesman/drop-down-list'), ('用户管理-业务员-冻结', '/salesman/index'), ('用户管理-服务商-查看服务商业务员', '/salesman/index'), ('用户管理-业务员-冻结', '/salesman/set-status'), ('用户管理-业务员-解冻', '/salesman/set-status'), ('用户管理-业务员-编辑业务员', '/salesman/update'), ('用户管理-业务员-添加业务员', '/salesman/validate-form'), ('用户管理-业务员-编辑业务员', '/salesman/validate-form'), ('用户管理-业务员-查看业务员详情', '/salesman/view'), ('用户管理-服务商-添加服务商', '/service/create'), ('用户管理-服务商', '/service/index'), ('用户管理-服务商-服务商列表', '/service/index'), ('用户管理-服务商-服务商启停', '/service/set-status'), ('用户管理-会员-编辑会员', '/service/update'), ('用户管理-服务商-编辑服务商', '/service/update'), ('用户管理-会员-编辑会员', '/service/validate-form'), ('用户管理-服务商-添加服务商', '/service/validate-form'), ('用户管理-服务商-编辑服务商', '/service/validate-form'), ('用户管理-服务商-查看服务商详情', '/service/view'), ('后台设置-系统', '/system/index'), ('档案管理-保单-保单列表', '/warranty/index'), ('代理商', '业务-保险业务-时间筛选'), ('服务商', '业务-保险业务-时间筛选'), ('管理员', '业务-保险业务-时间筛选'), ('代理商', '业务-保险业务-服务商筛选'), ('服务商', '业务-保险业务-服务商筛选'), ('管理员', '业务-保险业务-服务商筛选'), ('代理商', '业务-保险业务-查看订单详情'), ('服务商', '业务-保险业务-查看订单详情'), ('管理员', '业务-保险业务-查看订单详情'), ('代理商', '业务-保险业务-联系人筛选'), ('服务商', '业务-保险业务-联系人筛选'), ('管理员', '业务-保险业务-联系人筛选'), ('代理商', '业务-保险业务-联系电话筛选'), ('服务商', '业务-保险业务-联系电话筛选'), ('管理员', '业务-保险业务-联系电话筛选'), ('代理商', '业务-保险业务-订单删除'), ('服务商', '业务-保险业务-订单删除'), ('管理员', '业务-保险业务-订单删除'), ('代理商', '业务-保险业务-订单状态筛选'), ('服务商', '业务-保险业务-订单状态筛选'), ('管理员', '业务-保险业务-订单状态筛选'), ('代理商', '业务-保险业务-车牌号筛选'), ('服务商', '业务-保险业务-车牌号筛选'), ('管理员', '业务-保险业务-车牌号筛选'), ('代理商', '业务-订单业务-业务员名筛选'), ('服务商', '业务-订单业务-业务员名筛选'), ('管理员', '业务-订单业务-业务员名筛选'), ('代理商', '业务-订单业务-时间筛选'), ('服务商', '业务-订单业务-时间筛选'), ('管理员', '业务-订单业务-时间筛选'), ('代理商', '业务-订单业务-服务商名筛选'), ('服务商', '业务-订单业务-服务商名筛选'), ('管理员', '业务-订单业务-服务商名筛选'), ('代理商', '业务-订单业务-查看流程'), ('服务商', '业务-订单业务-查看流程'), ('管理员', '业务-订单业务-查看流程'), ('代理商', '业务-订单业务-联系人筛选'), ('服务商', '业务-订单业务-联系人筛选'), ('管理员', '业务-订单业务-联系人筛选'), ('代理商', '业务-订单业务-联系电话筛选'), ('服务商', '业务-订单业务-联系电话筛选'), ('管理员', '业务-订单业务-联系电话筛选'), ('代理商', '业务-订单业务-订单列表'), ('服务商', '业务-订单业务-订单列表'), ('管理员', '业务-订单业务-订单列表'), ('代理商', '业务-订单业务-订单变更状态'), ('服务商', '业务-订单业务-订单变更状态'), ('管理员', '业务-订单业务-订单变更状态'), ('代理商', '业务-订单业务-车牌号筛选'), ('服务商', '业务-订单业务-车牌号筛选'), ('管理员', '业务-订单业务-车牌号筛选'), ('管理员', '内容管理-广告-删除广告'), ('管理员', '内容管理-广告-广告列表'), ('管理员', '内容管理-广告-查看广告详情'), ('管理员', '内容管理-广告-添加广告'), ('管理员', '内容管理-广告-编辑广告'), ('管理员', '内容管理-文章-删除文章'), ('管理员', '内容管理-文章-时间筛选'), ('管理员', '内容管理-文章-显示/隐藏文章'), ('管理员', '内容管理-文章-查看文章详情'), ('管理员', '内容管理-文章-标题筛选'), ('管理员', '内容管理-文章-添加文章'), ('管理员', '内容管理-文章-编辑文章'), ('管理员', '内容管理-栏目-删除栏目'), ('管理员', '内容管理-栏目-添加栏目'), ('管理员', '内容管理-栏目-编辑栏目'), ('管理员', '后台权限'), ('管理员', '后台权限-员工'), ('管理员', '后台权限-员工-删除'), ('管理员', '后台权限-员工-更改角色'), ('管理员', '后台权限-员工-添加员工'), ('管理员', '后台权限-员工-编辑'), ('管理员', '后台权限-角色'), ('管理员', '后台权限-角色-删除'), ('管理员', '后台权限-角色-权限'), ('管理员', '后台权限-角色-添加角色'), ('管理员', '后台权限-角色-编辑'), ('管理员', '后台设置'), ('管理员', '后台设置-保险商'), ('管理员', '后台设置-保险商-删除'), ('管理员', '后台设置-保险商-添加保险商'), ('管理员', '后台设置-保险商-编辑'), ('管理员', '后台设置-系统'), ('管理员', '后台设置-系统-基础设置'), ('管理员', '后台设置-系统-客户端推送设置'), ('管理员', '后台设置-系统-服务端推送设置'), ('管理员', '后台设置-系统-短信设置'), ('管理员', '后台设置-险种'), ('管理员', '后台设置-险种-删除'), ('管理员', '后台设置-险种-添加险种'), ('管理员', '后台设置-险种-编辑'), ('管理员', '后台设置-险种-编辑要素'), ('管理员', '后台设置-险种-设置状态'), ('管理员', '审核'), ('管理员', '审核-车辆审核'), ('管理员', '审核-车辆审核-不通过'), ('管理员', '审核-车辆审核-详情'), ('管理员', '审核-车辆审核-通过'), ('管理员', '审核-驾驶证审核'), ('管理员', '审核-驾驶证审核-不通过'), ('管理员', '审核-驾驶证审核-详情'), ('管理员', '审核-驾驶证审核-通过'), ('代理商', '平台设置'), ('服务商', '平台设置'), ('管理员', '平台设置'), ('代理商', '平台设置-APP设置'), ('服务商', '平台设置-APP设置'), ('管理员', '平台设置-APP设置'), ('代理商', '平台设置-APP设置-角色列表'), ('服务商', '平台设置-APP设置-角色列表'), ('管理员', '平台设置-APP设置-角色列表'), ('代理商', '平台设置-APP设置-角色列表-删除'), ('服务商', '平台设置-APP设置-角色列表-删除'), ('管理员', '平台设置-APP设置-角色列表-删除'), ('代理商', '平台设置-APP设置-角色列表-权限'), ('服务商', '平台设置-APP设置-角色列表-权限'), ('管理员', '平台设置-APP设置-角色列表-权限'), ('代理商', '平台设置-APP设置-角色列表-权限-增加授权'), ('服务商', '平台设置-APP设置-角色列表-权限-增加授权'), ('管理员', '平台设置-APP设置-角色列表-权限-增加授权'), ('代理商', '平台设置-APP设置-角色列表-权限-移除授权'), ('服务商', '平台设置-APP设置-角色列表-权限-移除授权'), ('管理员', '平台设置-APP设置-角色列表-权限-移除授权'), ('代理商', '平台设置-APP设置-角色列表-添加角色'), ('服务商', '平台设置-APP设置-角色列表-添加角色'), ('管理员', '平台设置-APP设置-角色列表-添加角色'), ('代理商', '平台设置-APP设置-角色列表-编辑'), ('服务商', '平台设置-APP设置-角色列表-编辑'), ('管理员', '平台设置-APP设置-角色列表-编辑'), ('代理商', '平台设置-员工列表'), ('服务商', '平台设置-员工列表'), ('管理员', '平台设置-员工列表'), ('代理商', '平台设置-员工列表-删除'), ('服务商', '平台设置-员工列表-删除'), ('管理员', '平台设置-员工列表-删除'), ('代理商', '平台设置-员工列表-更改角色'), ('服务商', '平台设置-员工列表-更改角色'), ('管理员', '平台设置-员工列表-更改角色'), ('代理商', '平台设置-员工列表-添加员工'), ('服务商', '平台设置-员工列表-添加员工'), ('管理员', '平台设置-员工列表-添加员工'), ('代理商', '平台设置-员工列表-编辑'), ('服务商', '平台设置-员工列表-编辑'), ('管理员', '平台设置-员工列表-编辑'), ('代理商', '平台设置-角色列表'), ('服务商', '平台设置-角色列表'), ('管理员', '平台设置-角色列表'), ('代理商', '平台设置-角色列表-删除'), ('服务商', '平台设置-角色列表-删除'), ('管理员', '平台设置-角色列表-删除'), ('代理商', '平台设置-角色列表-权限'), ('服务商', '平台设置-角色列表-权限'), ('管理员', '平台设置-角色列表-权限'), ('代理商', '平台设置-角色列表-添加角色'), ('服务商', '平台设置-角色列表-添加角色'), ('管理员', '平台设置-角色列表-添加角色'), ('代理商', '平台设置-角色列表-编辑'), ('服务商', '平台设置-角色列表-编辑'), ('管理员', '平台设置-角色列表-编辑'), ('代理商', '档案管理-保单-保单列表'), ('服务商', '档案管理-保单-保单列表'), ('管理员', '档案管理-保单-保单列表'), ('管理员', '档案管理-保单-删除'), ('代理商', '档案管理-保单-承包公司筛选'), ('服务商', '档案管理-保单-承包公司筛选'), ('管理员', '档案管理-保单-承包公司筛选'), ('代理商', '档案管理-保单-时间筛选'), ('服务商', '档案管理-保单-时间筛选'), ('管理员', '档案管理-保单-时间筛选'), ('代理商', '档案管理-保单-联系人筛选'), ('服务商', '档案管理-保单-联系人筛选'), ('管理员', '档案管理-保单-联系人筛选'), ('代理商', '档案管理-保单-联系电话筛选'), ('服务商', '档案管理-保单-联系电话筛选'), ('管理员', '档案管理-保单-联系电话筛选'), ('代理商', '档案管理-保单-车牌号筛选'), ('服务商', '档案管理-保单-车牌号筛选'), ('管理员', '档案管理-保单-车牌号筛选'), ('管理员', '档案管理-身份证-删除身份证'), ('代理商', '档案管理-身份证-姓名筛选'), ('服务商', '档案管理-身份证-姓名筛选'), ('管理员', '档案管理-身份证-姓名筛选'), ('代理商', '档案管理-身份证-性别筛选'), ('服务商', '档案管理-身份证-性别筛选'), ('管理员', '档案管理-身份证-性别筛选'), ('代理商', '档案管理-身份证-时间筛选'), ('服务商', '档案管理-身份证-时间筛选'), ('管理员', '档案管理-身份证-时间筛选'), ('代理商', '档案管理-身份证-查看身份证详情'), ('服务商', '档案管理-身份证-查看身份证详情'), ('管理员', '档案管理-身份证-查看身份证详情'), ('代理商', '档案管理-身份证-添加身份证'), ('服务商', '档案管理-身份证-添加身份证'), ('管理员', '档案管理-身份证-添加身份证'), ('管理员', '档案管理-身份证-编辑身份证'), ('代理商', '档案管理-身份证-证件号筛选'), ('服务商', '档案管理-身份证-证件号筛选'), ('管理员', '档案管理-身份证-证件号筛选'), ('代理商', '档案管理-车辆-使用性质筛选'), ('服务商', '档案管理-车辆-使用性质筛选'), ('管理员', '档案管理-车辆-使用性质筛选'), ('代理商', '档案管理-车辆-删除车辆'), ('服务商', '档案管理-车辆-删除车辆'), ('管理员', '档案管理-车辆-删除车辆'), ('代理商', '档案管理-车辆-姓名筛选'), ('服务商', '档案管理-车辆-姓名筛选'), ('管理员', '档案管理-车辆-姓名筛选'), ('代理商', '档案管理-车辆-时间筛选'), ('服务商', '档案管理-车辆-时间筛选'), ('管理员', '档案管理-车辆-时间筛选'), ('代理商', '档案管理-车辆-查看车辆详情'), ('服务商', '档案管理-车辆-查看车辆详情'), ('管理员', '档案管理-车辆-查看车辆详情'), ('代理商', '档案管理-车辆-添加车辆'), ('服务商', '档案管理-车辆-添加车辆'), ('管理员', '档案管理-车辆-添加车辆'), ('管理员', '档案管理-车辆-编辑车辆'), ('代理商', '档案管理-车辆-证件号筛选'), ('服务商', '档案管理-车辆-证件号筛选'), ('管理员', '档案管理-车辆-证件号筛选'), ('代理商', '档案管理-驾照-准架车型筛选'), ('服务商', '档案管理-驾照-准架车型筛选'), ('管理员', '档案管理-驾照-准架车型筛选'), ('代理商', '档案管理-驾照-删除驾照'), ('服务商', '档案管理-驾照-删除驾照'), ('管理员', '档案管理-驾照-删除驾照'), ('代理商', '档案管理-驾照-名字筛选'), ('服务商', '档案管理-驾照-名字筛选'), ('管理员', '档案管理-驾照-名字筛选'), ('代理商', '档案管理-驾照-性别筛选'), ('服务商', '档案管理-驾照-性别筛选'), ('管理员', '档案管理-驾照-性别筛选'), ('代理商', '档案管理-驾照-时间筛选'), ('服务商', '档案管理-驾照-时间筛选'), ('管理员', '档案管理-驾照-时间筛选'), ('代理商', '档案管理-驾照-查看驾照详情'), ('服务商', '档案管理-驾照-查看驾照详情'), ('管理员', '档案管理-驾照-查看驾照详情'), ('代理商', '档案管理-驾照-添加驾照'), ('服务商', '档案管理-驾照-添加驾照'), ('管理员', '档案管理-驾照-添加驾照'), ('管理员', '档案管理-驾照-编辑驾照'), ('代理商', '档案管理-驾照-证件号筛选'), ('服务商', '档案管理-驾照-证件号筛选'), ('管理员', '档案管理-驾照-证件号筛选'), ('代理商', '用户管理'), ('服务商', '用户管理'), ('管理员', '用户管理'), ('代理商', '用户管理-业务员'), ('客户经理', '用户管理-业务员'), ('服务商', '用户管理-业务员'), ('管理员', '用户管理-业务员'), ('代理商', '用户管理-业务员-业务员状态筛选'), ('客户经理', '用户管理-业务员-业务员状态筛选'), ('服务商', '用户管理-业务员-业务员状态筛选'), ('管理员', '用户管理-业务员-业务员状态筛选'), ('代理商', '用户管理-业务员-保险按钮'), ('客户经理', '用户管理-业务员-保险按钮'), ('服务商', '用户管理-业务员-保险按钮'), ('管理员', '用户管理-业务员-保险按钮'), ('代理商', '用户管理-业务员-冻结'), ('客户经理', '用户管理-业务员-冻结'), ('服务商', '用户管理-业务员-冻结'), ('管理员', '用户管理-业务员-冻结'), ('代理商', '用户管理-业务员-删除业务员'), ('客户经理', '用户管理-业务员-删除业务员'), ('服务商', '用户管理-业务员-删除业务员'), ('管理员', '用户管理-业务员-删除业务员'), ('代理商', '用户管理-业务员-名字筛选'), ('客户经理', '用户管理-业务员-名字筛选'), ('服务商', '用户管理-业务员-名字筛选'), ('管理员', '用户管理-业务员-名字筛选'), ('代理商', '用户管理-业务员-客户列表按钮'), ('客户经理', '用户管理-业务员-客户列表按钮'), ('服务商', '用户管理-业务员-客户列表按钮'), ('管理员', '用户管理-业务员-客户列表按钮'), ('代理商', '用户管理-业务员-手机号筛选'), ('客户经理', '用户管理-业务员-手机号筛选'), ('服务商', '用户管理-业务员-手机号筛选'), ('管理员', '用户管理-业务员-手机号筛选'), ('代理商', '用户管理-业务员-时间筛选'), ('客户经理', '用户管理-业务员-时间筛选'), ('服务商', '用户管理-业务员-时间筛选'), ('管理员', '用户管理-业务员-时间筛选'), ('代理商', '用户管理-业务员-查看业务员详情'), ('客户经理', '用户管理-业务员-查看业务员详情'), ('服务商', '用户管理-业务员-查看业务员详情'), ('管理员', '用户管理-业务员-查看业务员详情'), ('代理商', '用户管理-业务员-添加业务员'), ('客户经理', '用户管理-业务员-添加业务员'), ('服务商', '用户管理-业务员-添加业务员'), ('管理员', '用户管理-业务员-添加业务员'), ('代理商', '用户管理-业务员-用户名筛选'), ('客户经理', '用户管理-业务员-用户名筛选'), ('服务商', '用户管理-业务员-用户名筛选'), ('管理员', '用户管理-业务员-用户名筛选'), ('代理商', '用户管理-业务员-编辑业务员'), ('客户经理', '用户管理-业务员-编辑业务员'), ('服务商', '用户管理-业务员-编辑业务员'), ('管理员', '用户管理-业务员-编辑业务员'), ('代理商', '用户管理-业务员-解冻'), ('客户经理', '用户管理-业务员-解冻'), ('服务商', '用户管理-业务员-解冻'), ('管理员', '用户管理-业务员-解冻'), ('代理商', '用户管理-业务员-订单按钮'), ('客户经理', '用户管理-业务员-订单按钮'), ('服务商', '用户管理-业务员-订单按钮'), ('管理员', '用户管理-业务员-订单按钮'), ('客户经理', '用户管理-代理商'), ('管理员', '用户管理-代理商'), ('客户经理', '用户管理-代理商-代理商列表'), ('管理员', '用户管理-代理商-代理商列表'), ('客户经理', '用户管理-代理商-代理商名称筛选'), ('管理员', '用户管理-代理商-代理商名称筛选'), ('客户经理', '用户管理-代理商-删除代理商'), ('管理员', '用户管理-代理商-删除代理商'), ('客户经理', '用户管理-代理商-客户经理筛选'), ('管理员', '用户管理-代理商-客户经理筛选'), ('客户经理', '用户管理-代理商-时间筛选'), ('管理员', '用户管理-代理商-时间筛选'), ('客户经理', '用户管理-代理商-查看代理商业务员'), ('管理员', '用户管理-代理商-查看代理商业务员'), ('客户经理', '用户管理-代理商-查看代理商详情'), ('管理员', '用户管理-代理商-查看代理商详情'), ('客户经理', '用户管理-代理商-添加代理商'), ('管理员', '用户管理-代理商-添加代理商'), ('客户经理', '用户管理-代理商-编辑代理商'), ('管理员', '用户管理-代理商-编辑代理商'), ('客户经理', '用户管理-代理商-负责人姓名筛选'), ('管理员', '用户管理-代理商-负责人姓名筛选'), ('代理商', '用户管理-会员'), ('客户经理', '用户管理-会员'), ('服务商', '用户管理-会员'), ('管理员', '用户管理-会员'), ('代理商', '用户管理-会员-业务员筛选'), ('客户经理', '用户管理-会员-业务员筛选'), ('服务商', '用户管理-会员-业务员筛选'), ('管理员', '用户管理-会员-业务员筛选'), ('代理商', '用户管理-会员-保险下单'), ('客户经理', '用户管理-会员-保险下单'), ('服务商', '用户管理-会员-保险下单'), ('管理员', '用户管理-会员-保险下单'), ('代理商', '用户管理-会员-保险订单按钮'), ('客户经理', '用户管理-会员-保险订单按钮'), ('服务商', '用户管理-会员-保险订单按钮'), ('管理员', '用户管理-会员-保险订单按钮'), ('代理商', '用户管理-会员-删除会员'), ('客户经理', '用户管理-会员-删除会员'), ('服务商', '用户管理-会员-删除会员'), ('管理员', '用户管理-会员-删除会员'), ('代理商', '用户管理-会员-姓名筛选'), ('客户经理', '用户管理-会员-姓名筛选'), ('服务商', '用户管理-会员-姓名筛选'), ('管理员', '用户管理-会员-姓名筛选'), ('代理商', '用户管理-会员-实名认证'), ('客户经理', '用户管理-会员-实名认证'), ('服务商', '用户管理-会员-实名认证'), ('管理员', '用户管理-会员-实名认证'), ('代理商', '用户管理-会员-手机号筛选'), ('客户经理', '用户管理-会员-手机号筛选'), ('服务商', '用户管理-会员-手机号筛选'), ('管理员', '用户管理-会员-手机号筛选'), ('代理商', '用户管理-会员-时间筛选'), ('客户经理', '用户管理-会员-时间筛选'), ('服务商', '用户管理-会员-时间筛选'), ('管理员', '用户管理-会员-时间筛选'), ('代理商', '用户管理-会员-普通下单'), ('客户经理', '用户管理-会员-普通下单'), ('服务商', '用户管理-会员-普通下单'), ('管理员', '用户管理-会员-普通下单'), ('代理商', '用户管理-会员-查看会员详情'), ('客户经理', '用户管理-会员-查看会员详情'), ('服务商', '用户管理-会员-查看会员详情'), ('管理员', '用户管理-会员-查看会员详情'), ('代理商', '用户管理-会员-添加会员'), ('客户经理', '用户管理-会员-添加会员'), ('服务商', '用户管理-会员-添加会员'), ('管理员', '用户管理-会员-添加会员'), ('代理商', '用户管理-会员-状态筛选'), ('客户经理', '用户管理-会员-状态筛选'), ('服务商', '用户管理-会员-状态筛选'), ('管理员', '用户管理-会员-状态筛选'), ('代理商', '用户管理-会员-用户名筛选'), ('客户经理', '用户管理-会员-用户名筛选'), ('服务商', '用户管理-会员-用户名筛选'), ('管理员', '用户管理-会员-用户名筛选'), ('代理商', '用户管理-会员-用户类型筛选'), ('客户经理', '用户管理-会员-用户类型筛选'), ('服务商', '用户管理-会员-用户类型筛选'), ('管理员', '用户管理-会员-用户类型筛选'), ('代理商', '用户管理-会员-编辑会员'), ('客户经理', '用户管理-会员-编辑会员'), ('服务商', '用户管理-会员-编辑会员'), ('管理员', '用户管理-会员-编辑会员'), ('代理商', '用户管理-会员-订单按钮'), ('客户经理', '用户管理-会员-订单按钮'), ('服务商', '用户管理-会员-订单按钮'), ('管理员', '用户管理-会员-订单按钮'), ('代理商', '用户管理-会员-车辆按钮'), ('客户经理', '用户管理-会员-车辆按钮'), ('服务商', '用户管理-会员-车辆按钮'), ('管理员', '用户管理-会员-车辆按钮'), ('代理商', '用户管理-会员-驾照按钮'), ('客户经理', '用户管理-会员-驾照按钮'), ('服务商', '用户管理-会员-驾照按钮'), ('管理员', '用户管理-会员-驾照按钮'), ('客户经理', '用户管理-服务商'), ('管理员', '用户管理-服务商'), ('客户经理', '用户管理-服务商-客户经理筛选'), ('管理员', '用户管理-服务商-客户经理筛选'), ('客户经理', '用户管理-服务商-时间筛选'), ('管理员', '用户管理-服务商-时间筛选'), ('客户经理', '用户管理-服务商-服务商列表'), ('管理员', '用户管理-服务商-服务商列表'), ('客户经理', '用户管理-服务商-服务商名称筛选'), ('管理员', '用户管理-服务商-服务商名称筛选'), ('管理员', '用户管理-服务商-服务商启停'), ('客户经理', '用户管理-服务商-查看服务商业务员'), ('管理员', '用户管理-服务商-查看服务商业务员'), ('客户经理', '用户管理-服务商-查看服务商详情'), ('管理员', '用户管理-服务商-查看服务商详情'), ('客户经理', '用户管理-服务商-添加服务商'), ('管理员', '用户管理-服务商-添加服务商'), ('客户经理', '用户管理-服务商-电话筛选'), ('管理员', '用户管理-服务商-电话筛选'), ('客户经理', '用户管理-服务商-编辑服务商'), ('管理员', '用户管理-服务商-编辑服务商'), ('客户经理', '用户管理-服务商-负责人姓名筛选'), ('管理员', '用户管理-服务商-负责人姓名筛选'), ('管理员', '系统设置-我的信息'), ('管理员', '系统设置-我的信息-密码修改'), ('管理员', '系统设置-系统-添加设置项'), ('管理员', '系统设置-通知列表'), ('管理员', '系统设置-通知列表-新通知'), ('代理商', '统计信息'), ('服务商', '统计信息'), ('管理员', '统计信息'), ('代理商', '统计信息-公告'), ('服务商', '统计信息-公告'), ('管理员', '统计信息-公告'), ('服务商', '统计信息-待审核订单'), ('管理员', '统计信息-待审核订单'), ('服务商', '统计信息-待审车订单'), ('管理员', '统计信息-待审车订单'), ('代理商', '统计信息-待核保订单'), ('服务商', '统计信息-待核保订单'), ('管理员', '统计信息-待核保订单'), ('代理商', '统计信息-核保成功订单'), ('服务商', '统计信息-核保成功订单'), ('管理员', '统计信息-核保成功订单'), ('代理商', '统计信息-用户增长'), ('服务商', '统计信息-用户增长'), ('管理员', '统计信息-用户增长'), ('代理商', '统计信息-订单增长'), ('服务商', '统计信息-订单增长'), ('管理员', '统计信息-订单增长'), ('代理商', '账户信息'), ('管理员', '账户信息'), ('代理商', '账户信息-修改密码'), ('管理员', '账户信息-修改密码');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_auth_rule`;
CREATE TABLE `cdc_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `cdc_banner`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_banner`;
CREATE TABLE `cdc_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT 'banner名字',
  `describe` text COMMENT 'banner描述',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态 1:正常 0:禁用',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  `action_type` tinyint(1) DEFAULT '0' COMMENT '操作类型0 内链，1外链',
  `action_value` varchar(256) DEFAULT '' COMMENT '跳转地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
--  Table structure for `cdc_banner_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_banner_img`;
CREATE TABLE `cdc_banner_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL DEFAULT '0' COMMENT 'bannerID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  `thumb` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='banner图片表';

-- ----------------------------
--  Table structure for `cdc_business_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_business_detail`;
CREATE TABLE `cdc_business_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(100) DEFAULT '' COMMENT '流水号',
  `warranty_number` varchar(100) DEFAULT '' COMMENT '保单号',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `created_at` int(11) DEFAULT '0' COMMENT '生效时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '失效时间',
  `start_at` int(11) DEFAULT '0' COMMENT '生效时间',
  `end_at` int(11) DEFAULT '0' COMMENT '失效时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商业险详情';

-- ----------------------------
--  Table structure for `cdc_car`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_car`;
CREATE TABLE `cdc_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `member_id` int(10) DEFAULT NULL COMMENT '所属人id',
  `license_number` varchar(50) NOT NULL DEFAULT '' COMMENT '车牌号',
  `type` varchar(50) DEFAULT '' COMMENT '车辆类型',
  `owner` varchar(255) DEFAULT '' COMMENT '车辆所有人',
  `nature` varchar(50) DEFAULT '' COMMENT '使用性质',
  `brand_num` varchar(50) DEFAULT '' COMMENT '品牌型号',
  `discern_num` varchar(50) DEFAULT '' COMMENT '识别代号',
  `motor_num` varchar(50) DEFAULT '' COMMENT '发动机编号',
  `load_num` tinyint(6) DEFAULT '0' COMMENT '荷载人数',
  `sign_at` varchar(50) DEFAULT '' COMMENT '注册日期',
  `certificate_at` varchar(50) DEFAULT '' COMMENT '发证日期',
  `stick` tinyint(1) DEFAULT '0' COMMENT '车辆默认 0:不 1:默认',
  `status` tinyint(4) DEFAULT '1' COMMENT '1:正常 0:待审核',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
--  Table structure for `cdc_car_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_car_img`;
CREATE TABLE `cdc_car_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL DEFAULT '0' COMMENT '车车ID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
--  Table structure for `cdc_column`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_column`;
CREATE TABLE `cdc_column` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '栏目名',
  `description` varchar(255) DEFAULT '' COMMENT '栏目描述',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Table structure for `cdc_compensatory_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_compensatory_detail`;
CREATE TABLE `cdc_compensatory_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(100) DEFAULT '' COMMENT '流水号',
  `warranty_number` varchar(100) DEFAULT '' COMMENT '保单号',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `travel_tax` decimal(10,2) DEFAULT '0.00' COMMENT '车船税',
  `created_at` int(11) DEFAULT '0' COMMENT '生效时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '失效时间',
  `start_at` int(11) DEFAULT '0' COMMENT '生效时间',
  `end_at` int(11) DEFAULT '0' COMMENT '失效时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交强险详情';

-- ----------------------------
--  Table structure for `cdc_driving_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_driving_img`;
CREATE TABLE `cdc_driving_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL DEFAULT '0' COMMENT '驾驶证ID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  `thumb` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `img` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='驾驶证照片表';

-- ----------------------------
--  Table structure for `cdc_driving_license`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_driving_license`;
CREATE TABLE `cdc_driving_license` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) DEFAULT NULL COMMENT '用户id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` varchar(50) DEFAULT '' COMMENT '性别',
  `nationality` varchar(50) DEFAULT '' COMMENT '国籍',
  `papers` varchar(50) NOT NULL DEFAULT '' COMMENT '证件号',
  `birthday` varchar(50) DEFAULT '' COMMENT '出生日期',
  `certificate_at` varchar(50) DEFAULT '' COMMENT '领证日期',
  `permit` varchar(50) NOT NULL DEFAULT '' COMMENT '准驾车型',
  `start_at` varchar(50) DEFAULT '' COMMENT '生效时间',
  `end_at` varchar(50) DEFAULT '' COMMENT '失效时间',
  `status` tinyint(4) DEFAULT '1' COMMENT '1:正常 0:待审核',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
--  Table structure for `cdc_element`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_element`;
CREATE TABLE `cdc_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance_id` int(10) DEFAULT '0' COMMENT '险种id',
  `name` varchar(50) DEFAULT '' COMMENT '险种要素',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='险种要素表';

-- ----------------------------
--  Table structure for `cdc_identification`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_identification`;
CREATE TABLE `cdc_identification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `member_id` int(10) NOT NULL COMMENT '所属用户id',
  `name` varchar(50) DEFAULT '' COMMENT '公司名称或姓名',
  `nation` varchar(50) DEFAULT '' COMMENT '名族',
  `sex` varchar(50) DEFAULT '' COMMENT '性别',
  `birthday` varchar(50) DEFAULT '' COMMENT '出生年月',
  `licence` varchar(255) DEFAULT '' COMMENT '组织机构代码或身份证号',
  `start_at` varchar(50) DEFAULT '' COMMENT '身份证生效时间',
  `end_at` varchar(50) DEFAULT '' COMMENT '身份证失效时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '是否认证 0:没有 1:已认证',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
--  Table structure for `cdc_identification_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_identification_img`;
CREATE TABLE `cdc_identification_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ident_id` int(10) DEFAULT '0' COMMENT '认证详情id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  `thumb` varchar(256) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='认证图片表';

-- ----------------------------
--  Table structure for `cdc_insurance`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance`;
CREATE TABLE `cdc_insurance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title` varchar(50) DEFAULT '' COMMENT '险种名',
  `type` tinyint(4) DEFAULT '1' COMMENT '类型 1:交强险 2:商业险',
  `cost` int(10) unsigned DEFAULT NULL COMMENT '价格',
  `deduction` int(5) DEFAULT '1' COMMENT '是否免赔 1:不计免赔 0:无',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '1' COMMENT '是否有不计免赔 1:不计免赔 0:无',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
--  Table structure for `cdc_insurance_actimg`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_actimg`;
CREATE TABLE `cdc_insurance_actimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `act_id` int(10) NOT NULL COMMENT ' 流转id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险订单动态图标';

-- ----------------------------
--  Table structure for `cdc_insurance_company`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_company`;
CREATE TABLE `cdc_insurance_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '保险公司名',
  `brief` varchar(255) DEFAULT '' COMMENT '简介',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '1正常 0冻结',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险公司表';

-- ----------------------------
--  Table structure for `cdc_insurance_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_detail`;
CREATE TABLE `cdc_insurance_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `car_id` int(10) NOT NULL DEFAULT '0' COMMENT '车辆id',
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '投保人',
  `action` varchar(50) DEFAULT '' COMMENT '最新动态',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险订单绑定详情表';

-- ----------------------------
--  Table structure for `cdc_insurance_element`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_element`;
CREATE TABLE `cdc_insurance_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) DEFAULT '0' COMMENT '保险订单id',
  `insurance` varchar(50) DEFAULT '0' COMMENT '险种名',
  `element` varchar(50) DEFAULT '' COMMENT '要素',
  `deduction` varchar(50) DEFAULT '' COMMENT '是否免赔',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='险种和订单绑定表';

-- ----------------------------
--  Table structure for `cdc_insurance_order`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_order`;
CREATE TABLE `cdc_insurance_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order_sn` varchar(100) DEFAULT '0' COMMENT '订单号id',
  `type` tinyint(50) DEFAULT '6' COMMENT '保险',
  `user` varchar(50) DEFAULT '' COMMENT '投保人',
  `sex` varchar(50) DEFAULT '' COMMENT '性别',
  `nation` varchar(50) DEFAULT '' COMMENT '民族',
  `licence` varchar(50) DEFAULT '' COMMENT '身份证号',
  `phone` varchar(50) DEFAULT '0' COMMENT '联系人电话',
  `car` varchar(50) DEFAULT '' COMMENT '车牌号',
  `company` varchar(50) DEFAULT '' COMMENT '承保公司',
  `cost` int(10) unsigned DEFAULT '0' COMMENT '价格',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态 0:正常 100:取消',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  `check_at` int(11) DEFAULT '0' COMMENT '核保时间',
  `check_action` varchar(50) DEFAULT '未审核' COMMENT '核保结果',
  `payment_action` varchar(50) DEFAULT '未付款' COMMENT '付款状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order_sn`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险订单表';

-- ----------------------------
--  Table structure for `cdc_invitation_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_invitation_code`;
CREATE TABLE `cdc_invitation_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) DEFAULT '0' COMMENT '归属id',
  `code` varchar(6) DEFAULT NULL COMMENT '验证码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用状态 0:未使用 1:已使用',
  `created_at` int(11) DEFAULT NULL COMMENT '使用时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='邀请码表';

-- ----------------------------
--  Table structure for `cdc_mail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_mail`;
CREATE TABLE `cdc_mail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `addr` varchar(255) DEFAULT '' COMMENT '邮寄地址',
  `phone` varchar(50) DEFAULT '' COMMENT '联系电话',
  `receiver` varchar(50) DEFAULT '' COMMENT '接收人',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='邮寄地址详情表';

-- ----------------------------
--  Table structure for `cdc_member`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_member`;
CREATE TABLE `cdc_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT '' COMMENT '电话',
  `pid` int(10) DEFAULT '1' COMMENT '推荐人id',
  `email` varchar(60) CHARACTER SET utf8 DEFAULT NULL COMMENT '邮箱',
  `status` int(5) DEFAULT '1' COMMENT '状态 1:正常 0:冻结',
  `type` tinyint(2) DEFAULT '0' COMMENT '用户类型 0:未选择 1:个人用户 2:组织用户',
  `last_login_at` int(10) DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `access_token` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(18) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(18) DEFAULT NULL COMMENT '更新时间',
  `deleted_at` int(11) DEFAULT NULL COMMENT '删除时间',
  `system_switch` tinyint(2) DEFAULT '1' COMMENT '系统消息开关',
  `order_switch` tinyint(2) DEFAULT '1' COMMENT '订单跟踪消息开关',
  `check_switch` tinyint(2) DEFAULT '1' COMMENT '审核消息开关',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
--  Table structure for `cdc_member_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_member_code`;
CREATE TABLE `cdc_member_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '使用者id',
  `code_id` int(10) NOT NULL DEFAULT '0' COMMENT '邀请码id',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='邀请码消耗表';

-- ----------------------------
--  Table structure for `cdc_member_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_member_img`;
CREATE TABLE `cdc_member_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户图片表';

-- ----------------------------
--  Table structure for `cdc_member_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_member_tag`;
CREATE TABLE `cdc_member_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `tag_id` int(10) NOT NULL COMMENT 'tag_id',
  `member_id` int(10) NOT NULL COMMENT 'user_id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户端用户标签表';

-- ----------------------------
--  Table structure for `cdc_menu`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_menu`;
CREATE TABLE `cdc_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `cdc_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cdc_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_menu` VALUES ('1', '统计信息', null, '/panel/index', '1', 0x7b2269636f6e223a20226c6170746f70222c202274656d706c617465223a20223c6120687265663d277b75726c7d273e7b69636f6e7d7b6c6162656c7d3c2f613e227d), ('2', '账户信息', null, '/account/index', '2', 0x7b2269636f6e223a202275736572222c202274656d706c617465223a20223c6120687265663d277b75726c7d273e7b69636f6e7d7b6c6162656c7d3c2f613e227d), ('3', '用户管理', null, null, '3', 0x7b2269636f6e223a20227573657273227d), ('4', '服务商', '3', '/service/index', '4', null), ('5', '代理商', '3', '/agency/index', '5', null), ('6', '业务员', '3', '/salesman/index', '6', null), ('7', '会员', '3', '/member/index', '7', null), ('8', '业务', null, null, '8', 0x7b2269636f6e223a2022636172227d), ('9', '订单业务', '8', '/order/index', '9', null), ('10', '保险业务', '8', '/insurance-order/index', '10', null), ('11', '内容管理', null, null, '11', 0x7b2269636f6e223a202266696c652d746578742d6f227d), ('12', '广告', '11', '/banner/index', '12', null), ('13', '栏目', '11', '/column/index', '13', null), ('14', '文章', '11', '/article/index', '14', null), ('15', '档案管理', null, null, '15', 0x7b2269636f6e223a202266696c652d617263686976652d6f227d), ('16', '驾照', '15', '/driver/index', '16', null), ('17', '身份证', '15', '/identity/index', '17', null), ('18', '行驶证', '15', '/car/index', '18', null), ('19', '保单', '15', '/warranty/index', '19', null), ('20', '后台设置', null, null, '20', 0x7b2269636f6e223a20227772656e6368227d), ('21', '系统设置', '20', '/system/index', '21', null), ('22', '保险商设置', '20', '/insurance-company/index', '22', null), ('23', '险种设置', '20', '/insurance/index', '23', null), ('24', '平台设置', null, null, '24', 0x7b2269636f6e223a2267656172227d), ('25', '员工列表', '24', '/organization/account-index', '25', null), ('26', '角色列表', '24', '/organization/role-index', '26', null), ('27', 'APP设置', '24', '/organization/app-role-index', '27', null), ('28', '角色管理', '20', '/rbac/role-index', '28', null), ('29', '员工管理', '20', '/rbac/account-index', '29', null), ('30', '审核', null, null, '5', null), ('31', '车辆审核', '30', '/review/car-list', null, null), ('32', '驾驶证审核', '30', '/review/driver-list', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cdc_menu_group`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_menu_group`;
CREATE TABLE `cdc_menu_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL COMMENT '菜单id',
  `group_name` varchar(256) NOT NULL COMMENT '菜单组名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cdc_message_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_message_code`;
CREATE TABLE `cdc_message_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `phone` varchar(50) NOT NULL COMMENT '手机号',
  `code` varchar(50) NOT NULL COMMENT '验证码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用状态 0:未使用 1:已使用',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

-- ----------------------------
--  Table structure for `cdc_migration`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_migration`;
CREATE TABLE `cdc_migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `cdc_notice`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_notice`;
CREATE TABLE `cdc_notice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) DEFAULT '0' COMMENT 'member,user,service',
  `user_id` int(10) DEFAULT '0' COMMENT 'user',
  `content` varchar(255) DEFAULT '' COMMENT '消息内容',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  `sender` varchar(50) DEFAULT NULL COMMENT '发送人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务端消息通知表';

-- ----------------------------
--  Table structure for `cdc_order`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order`;
CREATE TABLE `cdc_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order_sn` varchar(100) NOT NULL DEFAULT '' COMMENT '订单号',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型 1:救援 2:维修 3:保养 4:上线审车 5:不上线审车',
  `user` varchar(50) DEFAULT '' COMMENT '联系人',
  `phone` varchar(50) DEFAULT '0' COMMENT '联系人电话',
  `car` varchar(50) DEFAULT '' COMMENT '车牌号',
  `pick` tinyint(1) DEFAULT '0' COMMENT '是否接车 0:否 1:接',
  `pick_at` varchar(255) DEFAULT '' COMMENT '接车时间',
  `pick_addr` varchar(255) DEFAULT '' COMMENT '接车地点',
  `distributing` tinyint(2) DEFAULT '0' COMMENT '派单类型 0:自动 1:手动',
  `service` varchar(255) DEFAULT '' COMMENT '服务商',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '完成时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单快照表';

-- ----------------------------
--  Table structure for `cdc_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order_detail`;
CREATE TABLE `cdc_order_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `car_id` int(10) NOT NULL DEFAULT '0' COMMENT '车辆id',
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '提交人',
  `service_id` int(10) DEFAULT '0' COMMENT '服务商id',
  `action` varchar(50) DEFAULT '' COMMENT '最新动态',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单详情表';

-- ----------------------------
--  Table structure for `cdc_service`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service`;
CREATE TABLE `cdc_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL COMMENT '服务商名称',
  `principal` varchar(256) NOT NULL COMMENT '负责人',
  `contact_phone` varchar(256) NOT NULL COMMENT '客服电话',
  `introduction` text COMMENT '简介',
  `address` varchar(256) NOT NULL DEFAULT '' COMMENT '地址',
  `lat` varchar(256) DEFAULT '0' COMMENT '纬度',
  `lng` varchar(256) DEFAULT '0' COMMENT '经度',
  `level` tinyint(2) NOT NULL DEFAULT '0' COMMENT '星级',
  `status` tinyint(2) DEFAULT '1' COMMENT '0禁用;1启用',
  `open_at` int(11) DEFAULT '0' COMMENT '开业时间',
  `close_at` int(11) DEFAULT '0' COMMENT '停业时间',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  `deleted_at` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT '0' COMMENT '上级账户id',
  `state` tinyint(2) DEFAULT '1' COMMENT '是否营业 1营业 0不营业',
  `principal_phone` varchar(256) DEFAULT NULL COMMENT '负责人电话',
  `type` tinyint(4) DEFAULT '1' COMMENT '1服务商 2代理商',
  `sid` int(11) DEFAULT '1' COMMENT '平台销售经理id',
  `owner_id` int(11) NOT NULL COMMENT '冗余adminuser id字段',
  `owner_username` varchar(255) DEFAULT NULL COMMENT '冗余adminuser 的用户名字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cdc_service_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service_img`;
CREATE TABLE `cdc_service_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(10) DEFAULT NULL COMMENT '服务商id',
  `img` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图名称',
  `size` double DEFAULT NULL COMMENT '文件大小',
  `status` varchar(255) DEFAULT NULL COMMENT '是否被绑定了',
  `type` tinyint(1) DEFAULT '0' COMMENT '1.封面图',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务商图';

-- ----------------------------
--  Table structure for `cdc_service_permission`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service_permission`;
CREATE TABLE `cdc_service_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '权限名',
  `service_id` int(11) DEFAULT NULL COMMENT '服务商id。暂不实现功能',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `cdc_service_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service_tag`;
CREATE TABLE `cdc_service_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `tag_id` int(10) NOT NULL COMMENT 'tag_id',
  `service_id` int(10) NOT NULL COMMENT '服务商id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务商绑定标签(服务范畴)表';

-- ----------------------------
--  Table structure for `cdc_service_user`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service_user`;
CREATE TABLE `cdc_service_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '关联adminuser表id',
  `service_id` int(11) DEFAULT NULL COMMENT '关联服务商的id',
  `type` tinyint(1) DEFAULT '0' COMMENT '账户的性质，1是服务商的主拥有者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cdc_setting`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_setting`;
CREATE TABLE `cdc_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL COMMENT '设置名',
  `value` varchar(2446) NOT NULL COMMENT '设置项值',
  `desc` varchar(255) DEFAULT NULL COMMENT '说明',
  `service_id` int(11) NOT NULL DEFAULT '0' COMMENT '0代表系统配置。 1以上代表服务商配置',
  `category` varchar(256) DEFAULT '基础设置' COMMENT '设置分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

-- ----------------------------
--  Records of `cdc_setting`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_setting` VALUES ('1', 'delivery_address', '地址|收件人姓名|联系电话', '审车收货地址', '0', '基础设置'), ('2', 'ali_sms_access_key_id', 'LTAICofjcYL5YHma', '阿里大于accessKeyId', '0', '短信设置'), ('3', 'ali_sms_access_key_secret', 'ATPhtGRC5Hvdd0zyEyKkfPgnohl5b7', '阿里大于accessKeySecret', '0', '短信设置'), ('4', 'ali_sms_template_code', 'SMS_78525146', '阿里大于短信模板Code', '0', '短信设置'), ('5', 'ali_sms_template_sign', '云乐享车', '阿里大于短信模板签名', '0', '短信设置'), ('6', 'jpush_member_appkey', '11cb6e13f6f803f31fd552ed', '极光推送客户端AppKey', '0', '客户端推送'), ('7', 'jpush_member_master_secret', '38234424c16ab032ac17332a', '极光推送客户端Master Secret', '0', '客户端推送'), ('8', 'jpush_service_appkey', '075973b97d6086b1784723df', '极光推送服务端AppKey', '0', '服务端推送'), ('9', 'jpush_service_master_secret', '5da7ebec1a4842308ac89196', '极光推送服务端Master Secret', '0', '服务端推送');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_status`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_status`;
CREATE TABLE `cdc_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '动态信息名',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作动态名字表';

-- ----------------------------
--  Table structure for `cdc_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_tag`;
CREATE TABLE `cdc_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '标签名',
  `pid` int(10) DEFAULT '0' COMMENT '上级id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
--  Table structure for `cdc_user`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_user`;
CREATE TABLE `cdc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `name` varchar(50) DEFAULT '' COMMENT '真实姓名',
  `pid` int(10) DEFAULT '1' COMMENT '推荐人id',
  `phone` varchar(50) DEFAULT '' COMMENT '电话',
  `password` varchar(80) DEFAULT NULL COMMENT '密码',
  `status` int(5) DEFAULT '1' COMMENT '状态 1:正常 0:冻结',
  `level` tinyint(4) DEFAULT '0' COMMENT '星级',
  `last_login_at` int(10) DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(50) DEFAULT NULL,
  `access_token` varchar(60) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  `deleted_at` int(11) DEFAULT NULL COMMENT '三处时间',
  `system_switch` tinyint(2) DEFAULT '1' COMMENT '系统消息开关',
  `check_switch` tinyint(2) DEFAULT '1' COMMENT '审核消息开关',
  `type` tinyint(4) DEFAULT '1' COMMENT '是否操作订单 1.不操作 2.操作',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `access_token` (`access_token`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务端用户表';

-- ----------------------------
--  Table structure for `cdc_user_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_user_img`;
CREATE TABLE `cdc_user_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务端用户图片表';

-- ----------------------------
--  Table structure for `cdc_user_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_user_tag`;
CREATE TABLE `cdc_user_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `tag_id` int(10) NOT NULL COMMENT 'tag_id',
  `user_id` int(10) NOT NULL COMMENT 'user_id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务端用户标签表';

-- ----------------------------
--  Table structure for `cdc_warranty`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_warranty`;
CREATE TABLE `cdc_warranty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT '0' COMMENT '保单对应的订单id',
  `member_id` int(11) DEFAULT '0' COMMENT '用户id',
  `compensatory_id` int(11) DEFAULT '0' COMMENT '交强险详情id',
  `business_id` int(11) DEFAULT '0' COMMENT '商业险详情id',
  `start_at` int(11) DEFAULT '0' COMMENT '生效时间',
  `end_at` int(11) DEFAULT '0' COMMENT '失效时间',
  `state` tinyint(4) DEFAULT '0' COMMENT '保单是否进行填写生成 0:未生成 1:生成',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保单表';

SET FOREIGN_KEY_CHECKS = 1;
