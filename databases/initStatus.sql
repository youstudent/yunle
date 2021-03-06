/*
 Navicat Premium Data Transfer

 Source Server         : 小强电脑
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : 192.168.2.116
 Source Database       : cloud_car

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : utf-8

 Date: 08/14/2017 14:20:14 PM
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
INSERT INTO `cdc_adminuser` VALUES ('1', 'ypxl', '', '$2y$13$pqJnJ1.g6hcvuTUTf0E27.vpjV6ISqL9Mlfq2BHADltJ6PbDEu4VK', '', '10', '0', '0', '啊啊啊', '1', '1', null);
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_app_menu_without`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_menu_without` VALUES ('1', '26', '1', '17'), ('3', '26', '1', '11'), ('5', '26', '1', '10');
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_app_role`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_role` VALUES ('1', '业务员', '操作员1', '26'), ('2', '操作员', null, '26');
COMMIT;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_app_role_assign`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_role_assign` VALUES ('1', '10', '1');
COMMIT;

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
INSERT INTO `cdc_auth_item` VALUES ('/*', '2', null, null, null, '1502443056', '1502443056'), ('/abs-route/get-all-agency', '2', null, null, null, '1502507431', '1502507431'), ('/abs-route/get-all-member', '2', null, null, null, '1502507443', '1502507443'), ('/abs-route/get-all-salesman', '2', null, null, null, '1502507437', '1502507437'), ('/abs-route/get-all-service', '2', null, null, null, '1502507425', '1502507425'), ('/abs-route/get-customer-manager', '2', null, null, null, '1502507407', '1502507407'), ('/account/*', '2', null, null, null, '1502443055', '1502443055'), ('/account/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/assignment/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/assignment/assign', '2', null, null, null, '1502443055', '1502443055'), ('/admin/assignment/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/assignment/revoke', '2', null, null, null, '1502443055', '1502443055'), ('/admin/assignment/view', '2', null, null, null, '1502443055', '1502443055'), ('/admin/default/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/default/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/menu/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/menu/create', '2', null, null, null, '1502443055', '1502443055'), ('/admin/menu/delete', '2', null, null, null, '1502443055', '1502443055'), ('/admin/menu/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/menu/update', '2', null, null, null, '1502443055', '1502443055'), ('/admin/menu/view', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/assign', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/create', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/delete', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/remove', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/update', '2', null, null, null, '1502443055', '1502443055'), ('/admin/permission/view', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/assign', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/create', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/delete', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/remove', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/update', '2', null, null, null, '1502443055', '1502443055'), ('/admin/role/view', '2', null, null, null, '1502443055', '1502443055'), ('/admin/route/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/route/assign', '2', null, null, null, '1502443055', '1502443055'), ('/admin/route/create', '2', null, null, null, '1502443055', '1502443055'), ('/admin/route/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/route/refresh', '2', null, null, null, '1502443055', '1502443055'), ('/admin/route/remove', '2', null, null, null, '1502443055', '1502443055'), ('/admin/rule/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/rule/create', '2', null, null, null, '1502443055', '1502443055'), ('/admin/rule/delete', '2', null, null, null, '1502443055', '1502443055'), ('/admin/rule/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/rule/update', '2', null, null, null, '1502443055', '1502443055'), ('/admin/rule/view', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/*', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/activate', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/change-password', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/delete', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/index', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/login', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/logout', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/request-password-reset', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/reset-password', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/signup', '2', null, null, null, '1502443055', '1502443055'), ('/admin/user/view', '2', null, null, null, '1502443055', '1502443055'), ('/agency/*', '2', null, null, null, '1502443055', '1502443055'), ('/agency/create', '2', null, null, null, '1502443055', '1502443055'), ('/agency/delete', '2', null, null, null, '1502443055', '1502443055'), ('/agency/index', '2', null, null, null, '1502443055', '1502443055'), ('/agency/profile', '2', null, null, null, '1502443055', '1502443055'), ('/agency/update', '2', null, null, null, '1502443055', '1502443055'), ('/agency/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/agency/view', '2', null, null, null, '1502443055', '1502443055'), ('/article/*', '2', null, null, null, '1502443055', '1502443055'), ('/article/create', '2', null, null, null, '1502443055', '1502443055'), ('/article/delete', '2', null, null, null, '1502443055', '1502443055'), ('/article/index', '2', null, null, null, '1502443055', '1502443055'), ('/article/update', '2', null, null, null, '1502443055', '1502443055'), ('/article/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/backend/*', '2', null, null, null, '1502443055', '1502443055'), ('/banner/*', '2', null, null, null, '1502443055', '1502443055'), ('/banner/create', '2', null, null, null, '1502443055', '1502443055'), ('/banner/delete', '2', null, null, null, '1502443055', '1502443055'), ('/banner/index', '2', null, null, null, '1502443055', '1502443055'), ('/banner/update', '2', null, null, null, '1502443055', '1502443055'), ('/banner/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/car/*', '2', null, null, null, '1502443055', '1502443055'), ('/car/create', '2', null, null, null, '1502443055', '1502443055'), ('/car/delete', '2', null, null, null, '1502443055', '1502443055'), ('/car/index', '2', null, null, null, '1502443055', '1502443055'), ('/car/update', '2', null, null, null, '1502443055', '1502443055'), ('/car/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/column/*', '2', null, null, null, '1502443055', '1502443055'), ('/column/create', '2', null, null, null, '1502443055', '1502443055'), ('/column/delete', '2', null, null, null, '1502443055', '1502443055'), ('/column/index', '2', null, null, null, '1502443055', '1502443055'), ('/column/update', '2', null, null, null, '1502443055', '1502443055'), ('/column/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/driver/*', '2', null, null, null, '1502443055', '1502443055'), ('/driver/create', '2', null, null, null, '1502443055', '1502443055'), ('/driver/delete', '2', null, null, null, '1502443055', '1502443055'), ('/driver/index', '2', null, null, null, '1502443055', '1502443055'), ('/driver/update', '2', null, null, null, '1502443055', '1502443055'), ('/driver/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/gii/*', '2', null, null, null, '1502443055', '1502443055'), ('/gii/default/*', '2', null, null, null, '1502443055', '1502443055'), ('/gii/default/action', '2', null, null, null, '1502443055', '1502443055'), ('/gii/default/diff', '2', null, null, null, '1502443055', '1502443055'), ('/gii/default/index', '2', null, null, null, '1502443055', '1502443055'), ('/gii/default/preview', '2', null, null, null, '1502443055', '1502443055'), ('/gii/default/view', '2', null, null, null, '1502443055', '1502443055'), ('/identity/*', '2', null, null, null, '1502443055', '1502443055'), ('/identity/create', '2', null, null, null, '1502443055', '1502443055'), ('/identity/delete', '2', null, null, null, '1502443055', '1502443055'), ('/identity/index', '2', null, null, null, '1502443055', '1502443055'), ('/identity/update', '2', null, null, null, '1502443055', '1502443055'), ('/identity/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-company/*', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-company/create', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-company/delete', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-company/index', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-company/update', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-company/validate-form', '2', null, null, null, '1502443055', '1502443055'), ('/insurance-order/*', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/archives', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/cancel', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/change', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/check-failed', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/check-success', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/cost', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/create', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/detail', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/index', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/info', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/insurance', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/log', '2', null, null, null, '1502443056', '1502443056'), ('/insurance-order/update', '2', null, null, null, '1502443056', '1502443056'), ('/insurance/*', '2', null, null, null, '1502443056', '1502443056'), ('/insurance/create', '2', null, null, null, '1502443055', '1502443055'), ('/insurance/delete', '2', null, null, null, '1502443056', '1502443056'), ('/insurance/index', '2', null, null, null, '1502443055', '1502443055'), ('/insurance/insurance-order', '2', null, null, null, '1502443056', '1502443056'), ('/insurance/set-status', '2', null, null, null, '1502443055', '1502443055'), ('/insurance/update', '2', null, null, null, '1502443055', '1502443055'), ('/insurance/validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/media/*', '2', null, null, null, '1502443056', '1502443056'), ('/media/image-delete', '2', null, null, null, '1502443056', '1502443056'), ('/media/image-upload', '2', null, null, null, '1502443056', '1502443056'), ('/member/*', '2', null, null, null, '1502443056', '1502443056'), ('/member/create', '2', null, null, null, '1502443056', '1502443056'), ('/member/index', '2', null, null, null, '1502443056', '1502443056'), ('/member/info', '2', null, null, null, '1502443056', '1502443056'), ('/member/modify-salesman', '2', null, null, null, '1502443056', '1502443056'), ('/member/real', '2', null, null, null, '1502443056', '1502443056'), ('/member/set-status', '2', null, null, null, '1502443056', '1502443056'), ('/member/soft-delete', '2', null, null, null, '1502443056', '1502443056'), ('/member/test', '2', null, null, null, '1502443056', '1502443056'), ('/member/update', '2', null, null, null, '1502443056', '1502443056'), ('/member/validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/member/view', '2', null, null, null, '1502444582', '1502444582'), ('/message/create', '2', null, null, null, '1502450071', '1502450071'), ('/message/delete', '2', null, null, null, '1502450071', '1502450071'), ('/message/index', '2', null, null, null, '1502450071', '1502450071'), ('/message/view', '2', null, null, null, '1502450071', '1502450071'), ('/notice/*', '2', null, null, null, '1502443056', '1502443056'), ('/notice/index', '2', null, null, null, '1502443056', '1502443056'), ('/order/*', '2', null, null, null, '1502443056', '1502443056'), ('/order/create', '2', null, null, null, '1502443056', '1502443056'), ('/order/index', '2', null, null, null, '1502443056', '1502443056'), ('/order/log', '2', null, null, null, '1502443056', '1502443056'), ('/order/modify-status', '2', null, null, null, '1502443056', '1502443056'), ('/order/update', '2', null, null, null, '1502443056', '1502443056'), ('/order/validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/order/wall', '2', null, null, null, '1502443056', '1502443056'), ('/panel/*', '2', null, null, null, '1502443056', '1502443056'), ('/panel/index', '2', null, null, null, '1502443056', '1502443056'), ('/panel/wait-check-insurance-order', '2', null, null, null, '1502443056', '1502443056'), ('/panel/wait-check-insurance-order-success', '2', null, null, null, '1502443056', '1502443056'), ('/panel/wait-check-order', '2', null, null, null, '1502443056', '1502443056'), ('/panel/wait-check-state', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/*', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/account-create', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/account-index', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/account-modify-role', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/account-update', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/account-validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/get-menu', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/menu-assign', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/modify-platform-password', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/role-assign', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/role-create', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/role-delete', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/role-index', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/role-update', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/set-menu', '2', null, null, null, '1502443056', '1502443056'), ('/rbac/validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/redactor/*', '2', null, null, null, '1502443055', '1502443055'), ('/redactor/upload-file', '2', null, null, null, '1502443056', '1502443056'), ('/redactor/upload-img', '2', null, null, null, '1502443056', '1502443056'), ('/redactor/upload-img-json', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/*', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/create', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/drop-down-list', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/index', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/set-status', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/soft-delete', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/update', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/salesman/view', '2', null, null, null, '1502444554', '1502444554'), ('/service/*', '2', null, null, null, '1502443056', '1502443056'), ('/service/create', '2', null, null, null, '1502443056', '1502443056'), ('/service/delete', '2', null, null, null, '1502443056', '1502443056'), ('/service/index', '2', null, null, null, '1502443056', '1502443056'), ('/service/profile', '2', null, null, null, '1502443056', '1502443056'), ('/service/update', '2', null, null, null, '1502443056', '1502443056'), ('/service/validate-form', '2', null, null, null, '1502443056', '1502443056'), ('/service/view', '2', null, null, null, '1502443056', '1502443056'), ('/site/*', '2', null, null, null, '1502443056', '1502443056'), ('/site/error', '2', null, null, null, '1502443056', '1502443056'), ('/site/index', '2', null, null, null, '1502443056', '1502443056'), ('/site/init-menu', '2', null, null, null, '1502443056', '1502443056'), ('/site/login', '2', null, null, null, '1502443056', '1502443056'), ('/site/logout', '2', null, null, null, '1502443056', '1502443056'), ('/site/push-all-message', '2', null, null, null, '1502443056', '1502443056'), ('/site/push-all-message1', '2', null, null, null, '1502443056', '1502443056'), ('/site/test', '2', null, null, null, '1502443056', '1502443056'), ('/system/*', '2', null, null, null, '1502443056', '1502443056'), ('/system/index', '2', null, null, null, '1502443056', '1502443056'), ('/warranty/*', '2', null, null, null, '1502443056', '1502443056'), ('/warranty/detail', '2', null, null, null, '1502443056', '1502443056'), ('/warranty/edit', '2', null, null, null, '1502443056', '1502443056'), ('/warranty/index', '2', null, null, null, '1502443056', '1502443056'), ('/warranty/update', '2', null, null, null, '1502443056', '1502443056'), ('业务员列表', '2', null, 'backend\\components\\SalesmanRule', null, '1502444344', '1502504096'), ('业务员列表 - 获取所有业务员', '2', null, null, null, '1502507554', '1502507554'), ('业务员添加', '2', null, null, null, '1502444373', '1502444373'), ('业务员编辑', '2', null, null, null, '1502444390', '1502444390'), ('业务员详情', '2', null, null, null, '1502444420', '1502444420'), ('代理商', '1', null, null, null, '1502502422', '1502502422'), ('代理商列表', '2', null, null, null, '1502444321', '1502444321'), ('代理商列表 - 获取所有代理商权限', '2', null, null, null, '1502507532', '1502507532'), ('代理商详情', '2', null, null, null, '1502444233', '1502444233'), ('代理商账号信息', '2', null, null, null, '1502444133', '1502444133'), ('会员列表 - 获取所有会员', '2', null, null, null, '1502507583', '1502507583'), ('会员实名信息查看', '2', null, null, null, '1502444718', '1502444718'), ('会员添加', '2', null, null, null, '1502444634', '1502444634'), ('会员编辑', '2', null, null, null, '1502444659', '1502444659'), ('会员详情', '2', null, null, null, '1502444692', '1502444692'), ('保单列表', '2', null, null, null, '1502449862', '1502449862'), ('保险商列表', '2', null, null, null, '1502450176', '1502450176'), ('保险订单列表', '2', null, null, null, '1502449773', '1502449773'), ('删除保险商', '2', null, null, null, '1502450244', '1502450244'), ('删除通知', '2', null, null, null, '1502450143', '1502450143'), ('删除险种', '2', null, null, null, '1502450309', '1502450309'), ('发送通知', '2', null, null, null, '1502450108', '1502450108'), ('变更会员业务员', '2', null, null, null, '1502444798', '1502444798'), ('客服啊', '1', '服务商', null, null, '1502520444', '1502613546'), ('我的信息', '2', null, null, null, '1502450355', '1502450355'), ('服务商', '1', null, null, null, '1502450663', '1502450663'), ('服务商列表', '2', null, null, null, '1502444301', '1502444301'), ('服务商列表 - 获取所有服务商权限', '2', null, null, null, '1502507511', '1502507511'), ('服务商详情', '2', null, null, null, '1502444189', '1502444189'), ('服务商账号信息', '2', null, null, null, '1502444104', '1502444104'), ('权限分配', '2', null, null, null, '1502450466', '1502450466'), ('权限管理', '2', null, null, null, '1502450407', '1502450407'), ('查看业务员', '2', null, null, null, '1502444607', '1502444607'), ('查看通知', '2', null, null, null, '1502450125', '1502450125'), ('添加保险商', '2', null, null, null, '1502450194', '1502450194'), ('添加服务商', '2', null, null, null, '1502443081', '1502443081'), ('添加险种', '2', null, null, null, '1502450288', '1502450288'), ('管理员', '1', null, null, null, '1502446663', '1502446663'), ('系统设置', '2', null, null, null, '1502449877', '1502449877'), ('编辑保险商', '2', null, null, null, '1502450211', '1502450211'), ('编辑服务商', '2', null, null, null, '1502443998', '1502443998'), ('获取客户经理权限', '2', null, null, null, '1502507474', '1502507474'), ('菜单管理', '2', null, null, null, '1502450430', '1502450430'), ('角色管理', '2', null, null, null, '1502450447', '1502450447'), ('订单列表', '2', null, null, null, '1502449756', '1502449756'), ('订单池查看', '2', null, null, null, '1502449736', '1502449736'), ('路由管理', '2', null, null, null, '1502450391', '1502450391'), ('身份证列表', '2', null, null, null, '1502449829', '1502449829'), ('通知列表', '2', null, null, null, '1502450086', '1502450086'), ('险种列表', '2', null, null, null, '1502450263', '1502450263'), ('驾照列表', '2', null, null, null, '1502449812', '1502449812');
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
INSERT INTO `cdc_auth_item_child` VALUES ('代理商列表 - 获取所有代理商权限', '/abs-route/get-all-agency'), ('会员列表 - 获取所有会员', '/abs-route/get-all-member'), ('业务员列表 - 获取所有业务员', '/abs-route/get-all-salesman'), ('服务商列表 - 获取所有服务商权限', '/abs-route/get-all-service'), ('获取客户经理权限', '/abs-route/get-customer-manager'), ('权限分配', '/admin/assignment/*'), ('菜单管理', '/admin/menu/*'), ('权限管理', '/admin/permission/*'), ('角色管理', '/admin/role/*'), ('路由管理', '/admin/route/*'), ('代理商列表', '/agency/index'), ('代理商账号信息', '/agency/profile'), ('代理商详情', '/agency/view'), ('驾照列表', '/driver/index'), ('身份证列表', '/identity/index'), ('添加保险商', '/insurance-company/create'), ('删除保险商', '/insurance-company/delete'), ('保险商列表', '/insurance-company/index'), ('编辑保险商', '/insurance-company/update'), ('编辑保险商', '/insurance-company/validate-form'), ('保险订单列表', '/insurance-order/index'), ('添加险种', '/insurance/create'), ('删除险种', '/insurance/delete'), ('险种列表', '/insurance/index'), ('会员添加', '/member/create'), ('变更会员业务员', '/member/modify-salesman'), ('会员实名信息查看', '/member/real'), ('会员编辑', '/member/update'), ('会员添加', '/member/validate-form'), ('会员编辑', '/member/validate-form'), ('会员详情', '/member/view'), ('发送通知', '/message/create'), ('删除通知', '/message/delete'), ('通知列表', '/message/index'), ('查看通知', '/message/view'), ('订单列表', '/order/index'), ('订单池查看', '/order/wall'), ('添加服务商', '/redactor/upload-img'), ('编辑服务商', '/redactor/upload-img'), ('添加服务商', '/redactor/upload-img-json'), ('编辑服务商', '/redactor/upload-img-json'), ('业务员添加', '/salesman/create'), ('业务员列表', '/salesman/index'), ('业务员编辑', '/salesman/update'), ('业务员编辑', '/salesman/validate-form'), ('查看业务员', '/salesman/view'), ('添加服务商', '/service/create'), ('服务商列表', '/service/index'), ('服务商账号信息', '/service/profile'), ('编辑服务商', '/service/update'), ('添加服务商', '/service/validate-form'), ('编辑服务商', '/service/validate-form'), ('服务商详情', '/service/view'), ('系统设置', '/system/index'), ('保单列表', '/warranty/index'), ('代理商', '业务员列表'), ('代理商', '业务员添加'), ('代理商', '业务员编辑'), ('代理商', '业务员详情'), ('管理员', '代理商列表'), ('管理员', '代理商列表 - 获取所有代理商权限'), ('管理员', '代理商详情'), ('管理员', '代理商账号信息'), ('管理员', '会员列表 - 获取所有会员'), ('管理员', '会员实名信息查看'), ('代理商', '会员添加'), ('管理员', '会员添加'), ('代理商', '会员编辑'), ('管理员', '会员编辑'), ('代理商', '会员详情'), ('管理员', '会员详情'), ('管理员', '保单列表'), ('管理员', '保险商列表'), ('代理商', '保险订单列表'), ('管理员', '保险订单列表'), ('管理员', '删除保险商'), ('管理员', '删除通知'), ('管理员', '删除险种'), ('代理商', '发送通知'), ('管理员', '发送通知'), ('管理员', '变更会员业务员'), ('管理员', '我的信息'), ('管理员', '服务商列表'), ('管理员', '服务商列表 - 获取所有服务商权限'), ('管理员', '服务商详情'), ('管理员', '服务商账号信息'), ('代理商', '权限分配'), ('管理员', '权限分配'), ('代理商', '权限管理'), ('管理员', '权限管理'), ('管理员', '查看业务员'), ('管理员', '查看通知'), ('管理员', '添加保险商'), ('管理员', '添加服务商'), ('管理员', '添加险种'), ('管理员', '系统设置'), ('管理员', '编辑保险商'), ('管理员', '编辑服务商'), ('管理员', '获取客户经理权限'), ('管理员', '菜单管理'), ('代理商', '角色管理'), ('管理员', '角色管理'), ('管理员', '订单列表'), ('管理员', '订单池查看'), ('管理员', '路由管理'), ('管理员', '身份证列表'), ('管理员', '通知列表'), ('管理员', '险种列表'), ('管理员', '驾照列表');
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
--  Records of `cdc_auth_rule`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_rule` VALUES ('backend\\components\\SalesmanRule', 0x4f3a33313a226261636b656e645c636f6d706f6e656e74735c53616c65736d616e52756c65223a333a7b733a343a226e616d65223b733a33313a226261636b656e645c636f6d706f6e656e74735c53616c65736d616e52756c65223b733a393a22637265617465644174223b693a313530323530343039363b733a393a22757064617465644174223b693a313530323530343039363b7d, '1502504096', '1502504096');
COMMIT;

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
  `action_type` tinyint(1) DEFAULT NULL COMMENT '操作类型0 内链，1外链',
  `action_value` varchar(256) DEFAULT NULL COMMENT '跳转地址',
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_menu` VALUES ('1', '首页', null, '/site/index', null, null), ('2', '用户管理', null, null, null, null), ('3', '服务商', '2', '/service/index', null, null), ('4', '服务商', '2', '/service/index', null, null), ('5', '代理商', '2', '/agency/index', null, null), ('6', '业务员', '2', '/salesman/index', null, null), ('7', '会员', '2', '/member/index', null, null), ('8', '业务', null, null, null, null), ('9', '订单池', '8', '/order/wall', null, null), ('10', '订单列表', '8', '/order/index', null, null), ('11', '保险订单', '8', '/insurance-order/index', null, null), ('12', '审核', null, null, null, null), ('13', '行驶证', '12', null, null, null), ('14', '驾驶证', '20', null, null, null), ('15', '服务商', '12', null, null, null), ('16', '内容', '19', null, null, null), ('17', '广告', '16', '/banner/index', null, null), ('18', '栏目', '16', '/column/index', null, null), ('19', '文章', null, '/article/index', null, null), ('20', '档案', null, null, null, null), ('21', '驾照', '20', '/driver/index', null, null), ('22', '身份证', '20', '/identity/index', null, null), ('23', '车辆', '20', '/car/index', null, null), ('24', '设置', null, null, null, null), ('25', '系统', '24', '/system/index', null, null), ('26', '通知中心', '24', null, null, null), ('27', '保险商', '24', '/insurance-company/index', null, null), ('28', '险种', '24', '/insurance/index', null, null), ('29', '我的信息', '24', '/account/index', null, null), ('30', '权限管理', null, null, null, null), ('31', '路由', '30', '/admin/role/index', null, null), ('32', '权限', '30', '/admin/assignment/index', null, null), ('33', '菜单', '30', '/admin/menu/index', null, null), ('34', '角色', '30', '/admin/role/index', null, null), ('35', '分配', '30', '/admin/assignment/index', null, null), ('36', '用户管理', '30', '/admin/user/index', null, null);
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
