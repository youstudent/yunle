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

 Date: 08/23/2017 21:50:34 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_detail` VALUES ('1', '1', '5', '', '1', '订单已分派给服务商画画，等待接单', '1502956388', '0', '1'), ('2', '1', '5', '', '100', '取消订单', '1502956399', '0', '1'), ('3', '2', '5', '', '1', '订单已分派给服务商，等待接单', '1502956563', '0', '1'), ('4', '3', '2', '奥巴马', '1', '订单已分派给服务商，等待接单', '1502958072', '0', '1'), ('5', '3', '10', 'hj', '100', '订单已被服务商拒绝', '1502958092', '0', '1'), ('6', '3', '10', 'hj', '2', '', '1502958162', '0', '1'), ('7', '3', '10', 'hj', '5', '没毛病', '1502958198', '0', '1'), ('8', '3', '10', 'hj', '99', '', '1502958631', '0', '1'), ('9', '3', '10', 'hj', '100', '取消订单', '1502958852', '0', '1'), ('10', '3', '10', 'hj', '100', '', '1502958888', '0', '1'), ('11', '4', '2', '奥巴马', '1', '订单已分派给服务商，等待接单', '1502959149', '0', '1'), ('12', '4', '10', 'hj', '2', '已接单', '1502959242', '0', '1'), ('13', '5', '5', '', '1', '订单已分派给服务商画画，等待接单', '1502959294', '0', '1'), ('14', '6', '5', '', '1', '订单已分派给服务商画画，等待接单', '1502959984', '0', '1'), ('15', '4', '10', 'hj', '6', '', '1502960322', '0', '1'), ('16', '7', '2', '奥巴马', '1', '订单已分派给服务商画画，等待接单', '1502961238', '0', '1'), ('17', '8', '1', '奥巴马', '1', '订单已分派给服务商，等待接单', '1503028262', '0', '1'), ('18', '8', '10', 'hj', '2', '已接单', '1503037385', '0', '1'), ('19', '9', '6', '这是一个组织', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503409574', '0', '1'), ('20', '10', '6', '这是一个组织', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503409980', '0', '1'), ('21', '11', '6', '这是一个组织', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503410621', '0', '1'), ('22', '12', '6', '这是一个组织', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503411086', '0', '1'), ('23', '13', '7', '', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503453176', '0', '1'), ('24', '13', '16', '古月三水工', '2', '已接单', '1503453225', '0', '1'), ('25', '1', '1000', '系统', '1', '系统将订单变更为待接单', '1503478339', '0', '1'), ('26', '1', '1000', '系统', '99', '系统将订单变更为已完成', '1503479627', '0', '1'), ('27', '14', '6', '这是一个组织', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503494007', '0', '1'), ('28', '15', '6', '这是一个组织', '1', '订单已分派给服务商宇宙银河战舰4S，等待接单', '1503494052', '0', '1'), ('29', '16', '6', '这是一个组织', '1', '订单已分派给服务商，等待接单', '1503494068', '0', '1'), ('30', '16', '10', 'hj', '2', '已接单', '1503496111', '0', '1'), ('31', '16', '10', 'hj', '3', '', '1503496129', '0', '1'), ('32', '16', '10', 'hj', '100', '取消订单', '1503496149', '0', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='动态节点图片表';

-- ----------------------------
--  Records of `cdc_act_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_img` VALUES ('1', '7', '/upload/act_imgs/2017-08-17/7b2663e22274016697661d87820359e90ce7f0d5.jpeg', '1502958198', '0'), ('2', '8', '/upload/act_imgs/2017-08-17/225cb73764fa42c24acf22f4a92480e938d5c0b4.jpeg', '1502958631', '0'), ('3', '15', '/upload/act_imgs/2017-08-17/31484c64411e43c89f6d7bdd816e2c65404cef82.jpeg', '1502960322', '0'), ('4', '31', '/upload/act/ad19cd03aed10b89e9804469372619940ce26f85.jpg', '1503496129', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='保险订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_insurance` VALUES ('1', '21', '1', '奥巴马', '1', '订单创建成功,等待核保', '1503037331', '0', '1'), ('2', '21', '1', '奥巴马', '100', '取消订单', '1503037906', '0', '1'), ('3', '30', '1', '奥巴马', '1', '订单创建成功,等待核保', '1503039132', '0', '1'), ('4', '30', '1', '管理员1号', '97', '核保成功', '1503039398', '0', '3'), ('5', '30', '1', '管理员1号', '4', '已付款', '1503039519', '0', '3'), ('6', '31', '1', '奥巴马', '1', '订单创建成功,等待核保', '1503042353', '0', '1'), ('7', '32', '1', '奥巴马', '1', '订单创建成功,等待核保', '1503042518', '0', '1'), ('8', '21', '1', '管理员1号', '4', '已付款', '1503452176', '0', '3'), ('9', '21', '1', '管理员1号', '4', '已付款', '1503452203', '0', '3'), ('10', '21', '1000', '系统', '99', '系统将订单变更为已完成', '1503489087', '0', '1'), ('11', '31', '1', '管理员1号', '97', '核保成功', '1503489102', '0', '3'), ('12', '31', '1', '管理员1号', '4', '已付款', '1503489133', '0', '3'), ('13', '32', '1', '管理员1号', '97', '核保成功', '1503489156', '0', '3'), ('14', '32', '1', '管理员1号', '4', '已付款', '1503489178', '0', '3');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='平台账号表';

-- ----------------------------
--  Records of `cdc_adminuser`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_adminuser` VALUES ('1', 'ypxl', '', '$2y$13$WAcqrza3bZ3Fvgl3S8tEUuVRbUrPdbil.XPAF2QFUh07qVNen/ByK', '', '10', '0', '0', '管理员1号', '1', '1', null), ('3', 's123123', null, '$2y$13$Hjug.LgFRZowbcjmwEzRwuHvtxmZxcyf4QouaKTwFF/zeCnDjhzqe', null, '10', '0', '0', '服务商1号', '2', '1', null), ('4', 'k12312355', null, '$2y$13$UFb7bgzWMIwCFGUQ33mmyeZ6NL21Et74uEIJK6RINAsqeGJMBmtN6', null, '10', '0', '0', '客服经理-A强55', '1', '0', null), ('6', 'ssssss', null, '$2y$13$6rk4kFh5AKSzWPErAVD/Ruf9HvtO8Lb7brLEO4PJIBv0upjFRchA.', null, '10', '0', '0', '', '2', '1', null), ('7', '试试123456', null, '$2y$13$k1QkBK93jmPsyoX1XWPKGO6u1S.Evi4SQwj9XLZMV0IbuFhPL5zJu', null, '10', '0', '0', '', '2', '1', null), ('8', 'dayuzhou', null, '$2y$13$rwvTCiEQv8LmU/6nMfsuV.DFcgBkgMcyF1vENHS6FKR2fbsV2bWwa', null, '10', '0', '0', '', '2', '1', null), ('9', '666666', null, '$2y$13$P0QUmuGzVoiPRAOnaI4QHej9XI9zuA2yUbipo4CebLqd/V/BsmHuC', null, '10', '0', '0', '', '3', '1', null), ('10', '测试服务商详情', null, '$2y$13$6S7qgJc9.MnPu04PWytY/.wJHDPFzOLJx/DZXSGWnx/wJZ9UPHWOO', null, '10', '0', '0', '', '2', '1', null), ('11', 'ssss123', null, '$2y$13$.WhPc.V2yr4O6kBv1xDZ1OUqKsniLZ4gPw5.3ZTYKxb46ccYfMK5W', null, '10', '0', '0', '', '2', '1', null), ('12', '123456789', null, '$2y$13$AfLggkVJmofRj9O6YDryuuzP4zEQgUaKz7lUF0suYgQSgIncSRV4O', null, '10', '0', '0', '', '2', '1', null), ('13', '231123213', null, '$2y$13$T/8sJQegeCkreRmjv.kDVeNE6R1LLdVP4AcLKMuMG51u5KntdyN6C', null, '10', '0', '0', '', '3', '1', null);
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_app_role`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_role` VALUES ('1', '业务员', '操作员1', '26'), ('2', '操作员', null, '26'), ('3', '默认角色组', '添加时系统生成的，将作为默认的角色组', '1'), ('4', '默认角色组', '添加时系统生成的，将作为默认的角色组', '2'), ('5', '默认角色组', '添加时系统生成的，将作为默认的角色组', '3'), ('6', '默认角色组', '添加时系统生成的，将作为默认的角色组', '4'), ('7', '默认角色组', '添加时系统生成的，将作为默认的角色组', '5'), ('8', '默认角色组', '添加时系统生成的，将作为默认的角色组', '6'), ('9', '默认角色组', '添加时系统生成的，将作为默认的角色组', '7'), ('10', '默认角色组', '添加时系统生成的，将作为默认的角色组', '8'), ('11', '默认角色组', '添加时系统生成的，将作为默认的角色组', '9'), ('12', '默认角色组', '添加时系统生成的，将作为默认的角色组', '10'), ('13', '默认角色组', '添加时系统生成的，将作为默认的角色组', '11');
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_app_role_assign`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_role_assign` VALUES ('1', '10', '1'), ('2', '12', '3'), ('3', '13', '3'), ('4', '14', '3'), ('5', '6', '3'), ('6', '7', '5'), ('7', '8', '6'), ('8', '9', '7'), ('9', '10', '6'), ('10', '11', '8'), ('11', '12', '5'), ('12', '13', '10'), ('13', '15', '3'), ('14', '16', '8'), ('15', '17', '3'), ('16', '18', '8'), ('17', '19', '3'), ('18', '20', '7'), ('19', '21', '3');
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_article`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_article` VALUES ('1', '实体经济', '啥时吃饭', '<p>实体经济实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\">实体经济实体经济<span class=\"redactor-invisible-space\">实体经济<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>', '0', '1', '11111', '1503388761', '1503388761'), ('6', '11', '111', '<p>我水水水水水水水水水水水水是是顶顶顶顶嘎嘎嘎灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌就就急急急急急急急急急急急急急急急</p>', '1', '1', '23', '1503477061', '1503477061');
COMMIT;

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
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '13', '1503457905'), ('代理商', '9', '1503299627'), ('服务商', '10', '1503304526'), ('服务商', '11', '1503391598'), ('服务商', '12', '1503455486'), ('服务商', '3', '1502847783'), ('服务商', '6', '1502954441'), ('服务商', '7', '1502954784'), ('服务商', '8', '1503043880'), ('管理员', '1', '1502847381'), ('管理员', '4', '1503478535');
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
INSERT INTO `cdc_auth_item` VALUES ('/*', '2', null, null, null, '1502791471', '1502791471'), ('/abs-route/panel-get-notice', '2', null, null, null, '1502854830', '1502854830'), ('/abs-route/panel-get-wait-check-car-order', '2', null, null, null, '1502854779', '1502854779'), ('/abs-route/panel-get-wait-check-insurance-order', '2', null, null, null, '1502854785', '1502854785'), ('/abs-route/panel-get-wait-check-insurance-order-success', '2', null, null, null, '1502854791', '1502854791'), ('/abs-route/panel-get-wait-check-order', '2', null, null, null, '1502854796', '1502854796'), ('/account/*', '2', null, null, null, '1502791471', '1502791471'), ('/account/index', '2', null, null, null, '1502791471', '1502791471'), ('/account/modify-password', '2', null, null, null, '1502855348', '1502855348'), ('/admin/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/revoke', '2', null, null, null, '1502791484', '1502791484'), ('/admin/assignment/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/default/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/default/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/menu/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/remove', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/permission/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/remove', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/role/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/assign', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/refresh', '2', null, null, null, '1502791484', '1502791484'), ('/admin/route/remove', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/create', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/update', '2', null, null, null, '1502791484', '1502791484'), ('/admin/rule/view', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/*', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/activate', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/change-password', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/delete', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/index', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/login', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/logout', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/request-password-reset', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/reset-password', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/signup', '2', null, null, null, '1502791484', '1502791484'), ('/admin/user/view', '2', null, null, null, '1502791484', '1502791484'), ('/agency/*', '2', null, null, null, '1502791471', '1502791471'), ('/agency/create', '2', null, null, null, '1502791471', '1502791471'), ('/agency/delete', '2', null, null, null, '1502791471', '1502791471'), ('/agency/index', '2', null, null, null, '1502791471', '1502791471'), ('/agency/profile', '2', null, null, null, '1502791471', '1502791471'), ('/agency/update', '2', null, null, null, '1502791471', '1502791471'), ('/agency/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/agency/view', '2', null, null, null, '1502791471', '1502791471'), ('/article/*', '2', null, null, null, '1502791471', '1502791471'), ('/article/create', '2', null, null, null, '1502791471', '1502791471'), ('/article/delete', '2', null, null, null, '1502791471', '1502791471'), ('/article/drop-down-list', '2', null, null, null, '1503402815', '1503402815'), ('/article/index', '2', null, null, null, '1502791471', '1502791471'), ('/article/set-status', '2', null, null, null, '1503454913', '1503454913'), ('/article/update', '2', null, null, null, '1502791471', '1502791471'), ('/article/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/*', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/account-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/assign', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/index', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/revoke', '2', null, null, null, '1502791471', '1502791471'), ('/assignment/view', '2', null, null, null, '1502791471', '1502791471'), ('/backend/*', '2', null, null, null, '1502791471', '1502791471'), ('/banner/*', '2', null, null, null, '1502791471', '1502791471'), ('/banner/create', '2', null, null, null, '1502791471', '1502791471'), ('/banner/delete', '2', null, null, null, '1502791471', '1502791471'), ('/banner/index', '2', null, null, null, '1502791471', '1502791471'), ('/banner/update', '2', null, null, null, '1502791471', '1502791471'), ('/banner/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/car/*', '2', null, null, null, '1502791471', '1502791471'), ('/car/create', '2', null, null, null, '1502791471', '1502791471'), ('/car/delete', '2', null, null, null, '1502791471', '1502791471'), ('/car/index', '2', null, null, null, '1502791471', '1502791471'), ('/car/update', '2', null, null, null, '1502791471', '1502791471'), ('/car/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/column/*', '2', null, null, null, '1502791471', '1502791471'), ('/column/create', '2', null, null, null, '1502791471', '1502791471'), ('/column/delete', '2', null, null, null, '1502791471', '1502791471'), ('/column/index', '2', null, null, null, '1502791471', '1502791471'), ('/column/update', '2', null, null, null, '1502791471', '1502791471'), ('/column/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/driver/*', '2', null, null, null, '1502791471', '1502791471'), ('/driver/create', '2', null, null, null, '1502791471', '1502791471'), ('/driver/delete', '2', null, null, null, '1502791471', '1502791471'), ('/driver/index', '2', null, null, null, '1502791471', '1502791471'), ('/driver/update', '2', null, null, null, '1502791471', '1502791471'), ('/driver/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/identity/*', '2', null, null, null, '1502791471', '1502791471'), ('/identity/create', '2', null, null, null, '1502791471', '1502791471'), ('/identity/delete', '2', null, null, null, '1502791471', '1502791471'), ('/identity/index', '2', null, null, null, '1502791471', '1502791471'), ('/identity/update', '2', null, null, null, '1502791471', '1502791471'), ('/identity/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/identity/view', '2', null, null, null, '1502938375', '1502938375'), ('/insurance-company/*', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/create', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/delete', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/index', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/update', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-company/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/*', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/archives', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/cancel', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/change', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/check-failed', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/check-success', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/cost', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/create', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/detail', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/index', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/info', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/insurance', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/log', '2', null, null, null, '1502791471', '1502791471'), ('/insurance-order/update', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/*', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/create', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/delete', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/index', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/insurance-order', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/set-status', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/update', '2', null, null, null, '1502791471', '1502791471'), ('/insurance/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/media/*', '2', null, null, null, '1502791471', '1502791471'), ('/media/image-delete', '2', null, null, null, '1502791471', '1502791471'), ('/media/image-upload', '2', null, null, null, '1502791471', '1502791471'), ('/member/*', '2', null, null, null, '1502791471', '1502791471'), ('/member/create', '2', null, null, null, '1502791471', '1502791471'), ('/member/index', '2', null, null, null, '1502791471', '1502791471'), ('/member/info', '2', null, null, null, '1502791471', '1502791471'), ('/member/modify-salesman', '2', null, null, null, '1502791471', '1502791471'), ('/member/real', '2', null, null, null, '1502791471', '1502791471'), ('/member/set-status', '2', null, null, null, '1502791471', '1502791471'), ('/member/soft-delete', '2', null, null, null, '1502791471', '1502791471'), ('/member/test', '2', null, null, null, '1502791471', '1502791471'), ('/member/update', '2', null, null, null, '1502791471', '1502791471'), ('/member/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/member/view', '2', null, null, null, '1502791471', '1502791471'), ('/message/*', '2', null, null, null, '1502791471', '1502791471'), ('/message/create', '2', null, null, null, '1502791471', '1502791471'), ('/message/delete', '2', null, null, null, '1502791471', '1502791471'), ('/message/index', '2', null, null, null, '1502791471', '1502791471'), ('/message/view', '2', null, null, null, '1502791471', '1502791471'), ('/notice/*', '2', null, null, null, '1502791471', '1502791471'), ('/notice/index', '2', null, null, null, '1502791471', '1502791471'), ('/order/*', '2', null, null, null, '1502791471', '1502791471'), ('/order/create', '2', null, null, null, '1502791471', '1502791471'), ('/order/index', '2', null, null, null, '1502791471', '1502791471'), ('/order/log', '2', null, null, null, '1502791471', '1502791471'), ('/order/modify-status', '2', null, null, null, '1502791471', '1502791471'), ('/order/update', '2', null, null, null, '1502791471', '1502791471'), ('/order/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/order/wall', '2', null, null, null, '1502791471', '1502791471'), ('/organization/*', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-app-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-create', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-index', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-update', '2', null, null, null, '1502791471', '1502791471'), ('/organization/account-validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-assign', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-create', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-index', '2', null, null, null, '1502791471', '1502791471'), ('/organization/app-role-update', '2', null, null, null, '1502791471', '1502791471'), ('/organization/assign-app-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/assign-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/get-app-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/get-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/modify-platform-password', '2', null, null, null, '1502791471', '1502791471'), ('/organization/remove-app-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/remove-permission', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-assign', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-create', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-index', '2', null, null, null, '1502791471', '1502791471'), ('/organization/role-update', '2', null, null, null, '1502791471', '1502791471'), ('/organization/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/panel/*', '2', null, null, null, '1502791471', '1502791471'), ('/panel/index', '2', null, null, null, '1502791471', '1502791471'), ('/panel/order-add', '2', null, null, null, '1502854077', '1502854077'), ('/panel/user-add', '2', null, null, null, '1502854075', '1502854075'), ('/panel/wait-check-insurance-order', '2', null, null, null, '1502791471', '1502791471'), ('/panel/wait-check-insurance-order-success', '2', null, null, null, '1502791471', '1502791471'), ('/panel/wait-check-order', '2', null, null, null, '1502791471', '1502791471'), ('/panel/wait-check-state', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/*', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-create', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-index', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-modify-role', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-update', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/account-validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/assign', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/assign-permission', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/get-permission', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/modify-platform-password', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/remove-permission', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-assign', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-create', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-index', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/role-update', '2', null, null, null, '1502791471', '1502791471'), ('/rbac/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/redactor/upload-file', '2', null, null, null, '1502791471', '1502791471'), ('/redactor/upload-img', '2', null, null, null, '1502791471', '1502791471'), ('/redactor/upload-img-json', '2', null, null, null, '1502791471', '1502791471'), ('/review/car-detail', '2', null, null, null, '1503300083', '1503300083'), ('/review/car-list', '2', null, null, null, '1503283443', '1503283443'), ('/review/car-out', '2', null, null, null, '1503283468', '1503283468'), ('/review/car-pass', '2', null, null, null, '1503283456', '1503283456'), ('/review/driver-detail', '2', null, null, null, '1503300113', '1503300113'), ('/review/driver-list', '2', null, null, null, '1503283490', '1503283490'), ('/review/driver-out', '2', null, null, null, '1503283506', '1503283506'), ('/review/driver-pass', '2', null, null, null, '1503283498', '1503283498'), ('/salesman/*', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/create', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/drop-down-list', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/index', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/set-status', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/soft-delete', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/update', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/salesman/view', '2', null, null, null, '1502791471', '1502791471'), ('/service/*', '2', null, null, null, '1502791471', '1502791471'), ('/service/create', '2', null, null, null, '1502791471', '1502791471'), ('/service/delete', '2', null, null, null, '1502791471', '1502791471'), ('/service/index', '2', null, null, null, '1502791471', '1502791471'), ('/service/profile', '2', null, null, null, '1502791471', '1502791471'), ('/service/set-status', '2', null, null, null, '1503038965', '1503038965'), ('/service/update', '2', null, null, null, '1502791471', '1502791471'), ('/service/validate-form', '2', null, null, null, '1502791471', '1502791471'), ('/service/view', '2', null, null, null, '1502791471', '1502791471'), ('/site/*', '2', null, null, null, '1502791471', '1502791471'), ('/site/error', '2', null, null, null, '1502791471', '1502791471'), ('/site/index', '2', null, null, null, '1502791471', '1502791471'), ('/site/init-menu', '2', null, null, null, '1502791471', '1502791471'), ('/site/login', '2', null, null, null, '1502791471', '1502791471'), ('/site/logout', '2', null, null, null, '1502791471', '1502791471'), ('/site/push-all-message', '2', null, null, null, '1502791471', '1502791471'), ('/site/push-all-message1', '2', null, null, null, '1502791471', '1502791471'), ('/site/stat', '2', null, null, null, '1502791471', '1502791471'), ('/site/test', '2', null, null, null, '1502791471', '1502791471'), ('/system/*', '2', null, null, null, '1502791471', '1502791471'), ('/system/index', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/*', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/detail', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/edit', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/index', '2', null, null, null, '1502791471', '1502791471'), ('/warranty/update', '2', null, null, null, '1502791471', '1502791471'), ('1', '1', '2', null, null, '1503490462', '1503490462'), ('业务-保险业务-时间筛选', '2', null, null, null, '1502794515', '1502794515'), ('业务-保险业务-服务商筛选', '2', null, null, null, '1502794569', '1502794569'), ('业务-保险业务-查看订单详情', '2', null, null, null, '1502794603', '1502794603'), ('业务-保险业务-联系人筛选', '2', null, null, null, '1502794532', '1502794532'), ('业务-保险业务-联系电话筛选', '2', null, null, null, '1502794543', '1502794543'), ('业务-保险业务-订单删除', '2', null, null, null, '1502794620', '1502794620'), ('业务-保险业务-订单状态筛选', '2', null, null, null, '1502794582', '1502794582'), ('业务-保险业务-车牌号筛选', '2', null, null, null, '1502794558', '1502794558'), ('业务-订单业务-业务员名筛选', '2', null, null, null, '1502794434', '1502794434'), ('业务-订单业务-时间筛选', '2', null, null, null, '1502794365', '1502794365'), ('业务-订单业务-服务商名筛选', '2', null, null, null, '1502794421', '1502794421'), ('业务-订单业务-查看流程', '2', null, null, null, '1502794338', '1502794338'), ('业务-订单业务-联系人筛选', '2', null, null, null, '1502794384', '1502794384'), ('业务-订单业务-联系电话筛选', '2', null, null, null, '1502794394', '1502794394'), ('业务-订单业务-订单列表', '2', null, null, null, '1502794260', '1502794260'), ('业务-订单业务-订单变更状态', '2', null, null, null, '1502794287', '1502794287'), ('业务-订单业务-车牌号筛选', '2', null, null, null, '1502794407', '1502794407'), ('代理商', '1', null, null, null, '1502847527', '1502847527'), ('内容管理-广告-删除广告', '2', null, null, null, '1502794725', '1502794725'), ('内容管理-广告-广告列表', '2', null, null, null, '1502862999', '1502862999'), ('内容管理-广告-查看广告详情', '2', null, null, null, '1502794716', '1502794716'), ('内容管理-广告-添加广告', '2', null, null, null, '1502794654', '1502794654'), ('内容管理-广告-编辑广告', '2', null, null, null, '1502794705', '1502794705'), ('内容管理-文章-删除文章', '2', null, null, null, '1502794837', '1502794837'), ('内容管理-文章-时间筛选', '2', null, null, null, '1502794873', '1502794873'), ('内容管理-文章-显示/隐藏文章', '2', null, null, null, '1503454945', '1503454945'), ('内容管理-文章-查看文章详情', '2', null, null, null, '1502794854', '1502794854'), ('内容管理-文章-标题筛选', '2', null, null, null, '1502794890', '1502794890'), ('内容管理-文章-添加文章', '2', null, null, null, '1502794821', '1502794821'), ('内容管理-文章-编辑文章', '2', null, null, null, '1502794829', '1502794829'), ('内容管理-栏目-删除栏目', '2', null, null, null, '1502794781', '1502794781'), ('内容管理-栏目-添加栏目', '2', null, null, null, '1502794750', '1502794750'), ('内容管理-栏目-编辑栏目', '2', null, null, null, '1502794765', '1502794765'), ('后台权限', '2', null, null, null, '1502792970', '1502792970'), ('后台权限-员工', '2', null, null, null, '1502792699', '1502792699'), ('后台权限-员工-删除', '2', null, null, null, '1502792834', '1502792834'), ('后台权限-员工-更改角色', '2', null, null, null, '1502792884', '1502792884'), ('后台权限-员工-添加员工', '2', null, null, null, '1502792760', '1502792760'), ('后台权限-员工-编辑', '2', null, null, null, '1502792795', '1502792795'), ('后台权限-角色', '2', null, null, null, '1502792653', '1502792653'), ('后台权限-角色-删除', '2', null, null, null, '1502792615', '1502792615'), ('后台权限-角色-权限', '2', null, null, null, '1502792453', '1502792453'), ('后台权限-角色-添加角色', '2', null, null, null, '1502792358', '1502792358'), ('后台权限-角色-编辑', '2', null, null, null, '1502792526', '1502792526'), ('后台设置', '2', null, null, null, '1502794672', '1502863895'), ('后台设置-保险商', '2', null, null, null, '1502795028', '1502864045'), ('后台设置-保险商-删除', '2', null, null, null, '1502795111', '1502863927'), ('后台设置-保险商-添加保险商', '2', null, null, null, '1502795082', '1502864056'), ('后台设置-保险商-编辑', '2', null, null, null, '1502795132', '1502863944'), ('后台设置-系统', '2', null, null, null, '1502794701', '1502863969'), ('后台设置-系统-基础设置', '2', null, null, null, '1502794825', '1502863986'), ('后台设置-系统-客户端推送设置', '2', null, null, null, '1502794873', '1502864012'), ('后台设置-系统-服务端推送设置', '2', null, null, null, '1502794887', '1502864028'), ('后台设置-系统-短信设置', '2', null, null, null, '1502794841', '1502864079'), ('后台设置-险种', '2', null, null, null, '1502795266', '1502864094'), ('后台设置-险种-删除', '2', null, null, null, '1502795325', '1502864108'), ('后台设置-险种-添加险种', '2', null, null, null, '1502795300', '1502864125'), ('后台设置-险种-编辑', '2', null, null, null, '1502795346', '1502864152'), ('后台设置-险种-编辑要素', '2', null, null, null, '1503281122', '1503281122'), ('后台设置-险种-设置状态', '2', null, null, null, '1502795403', '1502864192'), ('审核', '2', null, null, null, '1503279427', '1503283608'), ('审核-车辆审核', '2', null, null, null, '1503281531', '1503283682'), ('审核-车辆审核-不通过', '2', null, null, null, '1503283978', '1503283978'), ('审核-车辆审核-详情', '2', null, null, null, '1503300210', '1503300210'), ('审核-车辆审核-通过', '2', null, null, null, '1503283780', '1503283780'), ('审核-驾驶证审核', '2', null, null, null, '1503284677', '1503284677'), ('审核-驾驶证审核-不通过', '2', null, null, null, '1503284964', '1503284964'), ('审核-驾驶证审核-详情', '2', null, null, null, '1503300306', '1503300306'), ('审核-驾驶证审核-通过', '2', null, null, null, '1503284794', '1503284794'), ('客户经理', '1', null, null, null, '1502847391', '1502847391'), ('平台设置', '2', null, null, null, '1502793533', '1502952800'), ('平台设置-APP设置', '2', null, null, null, '1502794443', '1502952784'), ('平台设置-APP设置-角色列表', '2', null, null, null, '1502794480', '1502952816'), ('平台设置-APP设置-角色列表-删除', '2', null, null, null, '1502794547', '1502952830'), ('平台设置-APP设置-角色列表-权限', '2', null, null, null, '1502794580', '1502952844'), ('平台设置-APP设置-角色列表-权限-增加授权', '2', null, null, null, '1502949118', '1502952856'), ('平台设置-APP设置-角色列表-权限-移除授权', '2', null, null, null, '1502949183', '1502952875'), ('平台设置-APP设置-角色列表-添加角色', '2', null, null, null, '1502794517', '1502952888'), ('平台设置-APP设置-角色列表-编辑', '2', null, null, null, '1502794558', '1502952903'), ('平台设置-员工列表', '2', null, null, null, '1502793629', '1502953242'), ('平台设置-员工列表-删除', '2', null, null, null, '1502793918', '1502953279'), ('平台设置-员工列表-更改角色', '2', null, null, null, '1502794037', '1502953297'), ('平台设置-员工列表-添加员工', '2', null, null, null, '1502793811', '1502953317'), ('平台设置-员工列表-编辑', '2', null, null, null, '1502793857', '1502953342'), ('平台设置-角色列表', '2', null, null, null, '1502794167', '1502953367'), ('平台设置-角色列表-删除', '2', null, null, null, '1502794410', '1502953390'), ('平台设置-角色列表-权限', '2', null, null, null, '1502794372', '1502953430'), ('平台设置-角色列表-添加角色', '2', null, null, null, '1502794254', '1502953448'), ('平台设置-角色列表-编辑', '2', null, null, null, '1502794324', '1502953467'), ('服务商', '1', null, null, null, '1502847442', '1502847442'), ('档案管理-保单-保单列表', '2', null, null, null, '1502864893', '1502864893'), ('档案管理-保单-删除', '2', null, null, null, '1502795297', '1502795297'), ('档案管理-保单-承包公司筛选', '2', null, null, null, '1502795361', '1502795361'), ('档案管理-保单-时间筛选', '2', null, null, null, '1502795310', '1502795310'), ('档案管理-保单-联系人筛选', '2', null, null, null, '1502795320', '1502795320'), ('档案管理-保单-联系电话筛选', '2', null, null, null, '1502795333', '1502795333'), ('档案管理-保单-车牌号筛选', '2', null, null, null, '1502795347', '1502795347'), ('档案管理-身份证-删除身份证', '2', null, null, null, '1502795116', '1502795116'), ('档案管理-身份证-姓名筛选', '2', null, null, null, '1502795145', '1502795145'), ('档案管理-身份证-性别筛选', '2', null, null, null, '1502795151', '1502795151'), ('档案管理-身份证-时间筛选', '2', null, null, null, '1502795124', '1502795124'), ('档案管理-身份证-查看身份证详情', '2', null, null, null, '1502795100', '1502795100'), ('档案管理-身份证-添加身份证', '2', null, null, null, '1502795080', '1502795080'), ('档案管理-身份证-编辑身份证', '2', null, null, null, '1502795091', '1502795091'), ('档案管理-身份证-证件号筛选', '2', null, null, null, '1502795134', '1502795134'), ('档案管理-车辆-使用性质筛选', '2', null, null, null, '1502795270', '1502795270'), ('档案管理-车辆-删除车辆', '2', null, null, null, '1502795221', '1502795221'), ('档案管理-车辆-姓名筛选', '2', null, null, null, '1502795257', '1502795257'), ('档案管理-车辆-时间筛选', '2', null, null, null, '1502795237', '1502795237'), ('档案管理-车辆-查看车辆详情', '2', null, null, null, '1502795209', '1502795209'), ('档案管理-车辆-添加车辆', '2', null, null, null, '1502795172', '1502795172'), ('档案管理-车辆-编辑车辆', '2', null, null, null, '1502795196', '1502795196'), ('档案管理-车辆-证件号筛选', '2', null, null, null, '1502795250', '1502795250'), ('档案管理-驾照-准架车型筛选', '2', null, null, null, '1502795047', '1502795047'), ('档案管理-驾照-删除驾照', '2', null, null, null, '1502794972', '1502794972'), ('档案管理-驾照-名字筛选', '2', null, null, null, '1502795015', '1502795015'), ('档案管理-驾照-性别筛选', '2', null, null, null, '1502795029', '1502795029'), ('档案管理-驾照-时间筛选', '2', null, null, null, '1502794983', '1502794983'), ('档案管理-驾照-查看驾照详情', '2', null, null, null, '1502794960', '1502794960'), ('档案管理-驾照-添加驾照', '2', null, null, null, '1502794931', '1502794931'), ('档案管理-驾照-编辑驾照', '2', null, null, null, '1502794946', '1502794946'), ('档案管理-驾照-证件号筛选', '2', null, null, null, '1502795002', '1502795002'), ('用户管理', '2', null, null, null, '1502788245', '1502788245'), ('用户管理-业务员', '2', null, null, null, '1502793024', '1502793024'), ('用户管理-业务员-业务员状态筛选', '2', null, null, null, '1502793596', '1502793596'), ('用户管理-业务员-保险按钮', '2', null, null, null, '1502793647', '1502793647'), ('用户管理-业务员-冻结', '2', null, null, null, '1502793668', '1502793668'), ('用户管理-业务员-删除业务员', '2', null, null, null, '1502793221', '1502793221'), ('用户管理-业务员-名字筛选', '2', null, null, null, '1502793531', '1502793531'), ('用户管理-业务员-客户列表按钮', '2', null, null, null, '1502793614', '1502793614'), ('用户管理-业务员-手机号筛选', '2', null, null, null, '1502793562', '1502793562'), ('用户管理-业务员-时间筛选', '2', null, null, null, '1502793508', '1502793508'), ('用户管理-业务员-查看业务员详情', '2', null, null, null, '1502793122', '1502793122'), ('用户管理-业务员-添加业务员', '2', null, null, null, '1502793037', '1502793037'), ('用户管理-业务员-用户名筛选', '2', null, null, null, '1502793546', '1502793546'), ('用户管理-业务员-编辑业务员', '2', null, null, null, '1502793046', '1502793046'), ('用户管理-业务员-解冻', '2', null, null, null, '1502793681', '1502793681'), ('用户管理-业务员-订单按钮', '2', null, null, null, '1502793630', '1502793630'), ('用户管理-代理商', '2', null, null, null, '1502792608', '1502792608'), ('用户管理-代理商-代理商列表', '2', null, null, null, '1502792682', '1502792682'), ('用户管理-代理商-代理商名称筛选', '2', null, null, null, '1502792813', '1502792813'), ('用户管理-代理商-删除代理商', '2', null, null, null, '1502792698', '1502792698'), ('用户管理-代理商-客户经理筛选', '2', null, null, null, '1502792836', '1502792836'), ('用户管理-代理商-时间筛选', '2', null, null, null, '1502792794', '1502792794'), ('用户管理-代理商-查看代理商业务员', '2', null, null, null, '1502792777', '1502792777'), ('用户管理-代理商-查看代理商详情', '2', null, null, null, '1502792661', '1502792661'), ('用户管理-代理商-添加代理商', '2', null, null, null, '1502792631', '1502792631'), ('用户管理-代理商-编辑代理商', '2', null, null, null, '1502792646', '1502792646'), ('用户管理-代理商-负责人姓名筛选', '2', null, null, null, '1502792828', '1502792828'), ('用户管理-会员', '2', null, null, null, '1502793691', '1502793691'), ('用户管理-会员-业务员筛选', '2', null, null, null, '1502793834', '1502793834'), ('用户管理-会员-保险下单', '2', null, null, null, '1502794212', '1502794212'), ('用户管理-会员-保险订单按钮', '2', null, null, null, '1502793940', '1502793940'), ('用户管理-会员-删除会员', '2', null, null, null, '1502793750', '1502793750'), ('用户管理-会员-姓名筛选', '2', null, null, null, '1502793863', '1502793863'), ('用户管理-会员-实名认证', '2', null, null, null, '1502794004', '1502794004'), ('用户管理-会员-手机号筛选', '2', null, null, null, '1502793847', '1502793847'), ('用户管理-会员-时间筛选', '2', null, null, null, '1502793812', '1502793812'), ('用户管理-会员-普通下单', '2', null, null, null, '1502794202', '1502794202'), ('用户管理-会员-查看会员详情', '2', null, null, null, '1502793731', '1502793731'), ('用户管理-会员-添加会员', '2', null, null, null, '1502793702', '1502793702'), ('用户管理-会员-状态筛选', '2', null, null, null, '1502793893', '1502793893'), ('用户管理-会员-用户名筛选', '2', null, null, null, '1502793874', '1502793874'), ('用户管理-会员-用户类型筛选', '2', null, null, null, '1502793904', '1502793904'), ('用户管理-会员-编辑会员', '2', null, null, null, '1502793712', '1502793712'), ('用户管理-会员-订单按钮', '2', null, null, null, '1502793930', '1502793930'), ('用户管理-会员-车辆按钮', '2', null, null, null, '1502793964', '1502793964'), ('用户管理-会员-驾照按钮', '2', null, null, null, '1502793990', '1502793990'), ('用户管理-服务商', '2', null, null, null, '1502788996', '1502788996'), ('用户管理-服务商-客户经理筛选', '2', null, null, null, '1502792423', '1502792423'), ('用户管理-服务商-时间筛选', '2', null, null, null, '1502792110', '1502792110'), ('用户管理-服务商-服务商列表', '2', null, null, null, '1502791721', '1502791721'), ('用户管理-服务商-服务商名称筛选', '2', null, null, null, '1502792189', '1502792189'), ('用户管理-服务商-服务商启停', '2', null, null, null, '1503038942', '1503038942'), ('用户管理-服务商-查看服务商业务员', '2', null, null, null, '1502792048', '1502792048'), ('用户管理-服务商-查看服务商详情', '2', null, null, null, '1502791804', '1502791804'), ('用户管理-服务商-添加服务商', '2', null, null, null, '1502791654', '1502791654'), ('用户管理-服务商-电话筛选', '2', null, null, null, '1502792406', '1502792406'), ('用户管理-服务商-编辑服务商', '2', null, null, null, '1502791769', '1502791769'), ('用户管理-服务商-负责人姓名筛选', '2', null, null, null, '1502792214', '1502792214'), ('管理员', '1', null, null, null, '1502847350', '1502847350'), ('系统设置-我的信息', '2', null, null, null, '1502795503', '1502795503'), ('系统设置-我的信息-密码修改', '2', null, null, null, '1502795571', '1502795571'), ('系统设置-系统-添加设置项', '2', null, null, null, '1502794758', '1502794758'), ('系统设置-通知列表', '2', null, null, null, '1502794942', '1502794942'), ('系统设置-通知列表-新通知', '2', null, null, null, '1502794998', '1502794998'), ('统计信息', '2', null, null, null, '1502793522', '1502793522'), ('统计信息-公告', '2', null, null, null, '1502793331', '1502793331'), ('统计信息-待审核订单', '2', null, null, null, '1502793313', '1502793313'), ('统计信息-待审车订单', '2', null, null, null, '1502793244', '1502793244'), ('统计信息-待核保订单', '2', null, null, null, '1502793260', '1502793260'), ('统计信息-核保成功订单', '2', null, null, null, '1502793278', '1502793278'), ('统计信息-用户增长', '2', null, null, null, '1502793359', '1502793359'), ('统计信息-订单增长', '2', null, null, null, '1502793379', '1502793379'), ('账户信息', '2', null, null, null, '1502855119', '1502855119'), ('账户信息-修改密码', '2', null, null, null, '1502855192', '1502855192');
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
INSERT INTO `cdc_auth_item_child` VALUES ('统计信息-公告', '/abs-route/panel-get-notice'), ('统计信息-待审车订单', '/abs-route/panel-get-wait-check-car-order'), ('统计信息-待核保订单', '/abs-route/panel-get-wait-check-insurance-order'), ('统计信息-核保成功订单', '/abs-route/panel-get-wait-check-insurance-order-success'), ('统计信息-待审核订单', '/abs-route/panel-get-wait-check-order'), ('系统设置-我的信息', '/account/index'), ('账户信息', '/account/index'), ('账户信息-修改密码', '/account/modify-password'), ('管理员', '/admin/*'), ('管理员', '/admin/assignment/*'), ('管理员', '/admin/assignment/assign'), ('管理员', '/admin/assignment/index'), ('管理员', '/admin/assignment/revoke'), ('管理员', '/admin/assignment/view'), ('管理员', '/admin/default/*'), ('管理员', '/admin/default/index'), ('管理员', '/admin/menu/*'), ('管理员', '/admin/menu/create'), ('管理员', '/admin/menu/delete'), ('管理员', '/admin/menu/index'), ('管理员', '/admin/menu/update'), ('管理员', '/admin/menu/view'), ('管理员', '/admin/permission/*'), ('管理员', '/admin/permission/assign'), ('管理员', '/admin/permission/create'), ('管理员', '/admin/permission/delete'), ('管理员', '/admin/permission/index'), ('管理员', '/admin/permission/remove'), ('管理员', '/admin/permission/update'), ('管理员', '/admin/permission/view'), ('管理员', '/admin/role/*'), ('管理员', '/admin/role/assign'), ('管理员', '/admin/role/create'), ('管理员', '/admin/role/delete'), ('统计信息', '/admin/role/delete'), ('管理员', '/admin/role/index'), ('管理员', '/admin/role/remove'), ('管理员', '/admin/role/update'), ('管理员', '/admin/role/view'), ('管理员', '/admin/route/*'), ('管理员', '/admin/route/assign'), ('管理员', '/admin/route/create'), ('管理员', '/admin/route/index'), ('管理员', '/admin/route/refresh'), ('管理员', '/admin/route/remove'), ('管理员', '/admin/rule/*'), ('管理员', '/admin/rule/create'), ('管理员', '/admin/rule/delete'), ('管理员', '/admin/rule/index'), ('管理员', '/admin/rule/update'), ('管理员', '/admin/rule/view'), ('管理员', '/admin/user/*'), ('管理员', '/admin/user/activate'), ('管理员', '/admin/user/change-password'), ('管理员', '/admin/user/delete'), ('管理员', '/admin/user/index'), ('管理员', '/admin/user/login'), ('管理员', '/admin/user/logout'), ('管理员', '/admin/user/request-password-reset'), ('管理员', '/admin/user/reset-password'), ('管理员', '/admin/user/signup'), ('管理员', '/admin/user/view'), ('用户管理-代理商-添加代理商', '/agency/create'), ('用户管理-代理商-删除代理商', '/agency/delete'), ('用户管理-代理商-代理商列表', '/agency/index'), ('用户管理-代理商-编辑代理商', '/agency/update'), ('用户管理-代理商-添加代理商', '/agency/validate-form'), ('用户管理-代理商-编辑代理商', '/agency/validate-form'), ('用户管理-代理商-查看代理商详情', '/agency/view'), ('内容管理-文章-添加文章', '/article/create'), ('内容管理-文章-删除文章', '/article/delete'), ('内容管理-广告-添加广告', '/article/drop-down-list'), ('内容管理-广告-编辑广告', '/article/drop-down-list'), ('内容管理-文章-删除文章', '/article/index'), ('内容管理-文章-编辑文章', '/article/index'), ('内容管理-文章-显示/隐藏文章', '/article/set-status'), ('内容管理-文章-编辑文章', '/article/update'), ('内容管理-文章-添加文章', '/article/validate-form'), ('内容管理-文章-编辑文章', '/article/validate-form'), ('内容管理-广告-添加广告', '/banner/create'), ('内容管理-广告-删除广告', '/banner/delete'), ('内容管理-广告-删除广告', '/banner/index'), ('内容管理-广告-广告列表', '/banner/index'), ('内容管理-广告-查看广告详情', '/banner/index'), ('内容管理-广告-添加广告', '/banner/index'), ('内容管理-广告-编辑广告', '/banner/index'), ('内容管理-广告-编辑广告', '/banner/update'), ('内容管理-广告-添加广告', '/banner/validate-form'), ('内容管理-广告-编辑广告', '/banner/validate-form'), ('档案管理-车辆-添加车辆', '/car/create'), ('档案管理-车辆-添加车辆', '/car/index'), ('档案管理-车辆-编辑车辆', '/car/index'), ('档案管理-车辆-编辑车辆', '/car/update'), ('档案管理-车辆-添加车辆', '/car/validate-form'), ('档案管理-车辆-编辑车辆', '/car/validate-form'), ('内容管理-栏目-添加栏目', '/column/create'), ('内容管理-栏目-删除栏目', '/column/delete'), ('内容管理-栏目-删除栏目', '/column/index'), ('内容管理-栏目-添加栏目', '/column/index'), ('内容管理-栏目-编辑栏目', '/column/index'), ('内容管理-栏目-编辑栏目', '/column/update'), ('内容管理-栏目-编辑栏目', '/column/validate-form'), ('档案管理-驾照-添加驾照', '/driver/create'), ('档案管理-驾照-删除驾照', '/driver/delete'), ('档案管理-驾照-添加驾照', '/driver/index'), ('档案管理-驾照-编辑驾照', '/driver/update'), ('档案管理-驾照-添加驾照', '/driver/validate-form'), ('档案管理-驾照-编辑驾照', '/driver/validate-form'), ('档案管理-身份证-添加身份证', '/identity/create'), ('档案管理-身份证-删除身份证', '/identity/delete'), ('档案管理-身份证-删除身份证', '/identity/index'), ('档案管理-身份证-查看身份证详情', '/identity/index'), ('档案管理-身份证-编辑身份证', '/identity/index'), ('档案管理-身份证-编辑身份证', '/identity/update'), ('档案管理-身份证-添加身份证', '/identity/validate-form'), ('档案管理-身份证-编辑身份证', '/identity/validate-form'), ('档案管理-身份证-查看身份证详情', '/identity/view'), ('后台设置-保险商-添加保险商', '/insurance-company/create'), ('后台设置-保险商-删除', '/insurance-company/delete'), ('后台设置-保险商', '/insurance-company/index'), ('后台设置-保险商-编辑', '/insurance-company/update'), ('后台设置-保险商-添加保险商', '/insurance-company/validate-form'), ('后台设置-保险商-编辑', '/insurance-company/validate-form'), ('业务-保险业务-订单删除', '/insurance-order/index'), ('后台设置-险种-添加险种', '/insurance/create'), ('后台设置-险种-删除', '/insurance/delete'), ('后台设置-险种', '/insurance/index'), ('后台设置-险种-添加险种', '/insurance/index'), ('后台设置-险种-编辑', '/insurance/index'), ('后台设置-险种-设置状态', '/insurance/index'), ('后台设置-险种-设置状态', '/insurance/set-status'), ('后台设置-险种-编辑', '/insurance/update'), ('后台设置-险种-添加险种', '/insurance/validate-form'), ('后台设置-险种-编辑', '/insurance/validate-form'), ('用户管理-服务商-添加服务商', '/media/image-upload'), ('用户管理-服务商-编辑服务商', '/media/image-upload'), ('用户管理-会员-添加会员', '/member/create'), ('用户管理-会员-删除会员', '/member/index'), ('用户管理-会员-实名认证', '/member/index'), ('用户管理-会员-实名认证', '/member/real'), ('用户管理-会员-删除会员', '/member/soft-delete'), ('用户管理-会员-添加会员', '/member/validate-form'), ('系统设置-通知列表', '/notice/index'), ('业务-订单业务-查看流程', '/order/index'), ('业务-订单业务-订单变更状态', '/order/index'), ('业务-订单业务-查看流程', '/order/log'), ('业务-订单业务-订单变更状态', '/order/modify-status'), ('平台设置-员工列表-添加员工', '/organization/account-create'), ('平台设置-员工列表', '/organization/account-index'), ('平台设置-员工列表-更改角色', '/organization/account-modify-role'), ('平台设置-员工列表-编辑', '/organization/account-update'), ('平台设置-APP设置-角色列表-权限', '/organization/app-role-assign'), ('平台设置-APP设置-角色列表-添加角色', '/organization/app-role-create'), ('平台设置-APP设置-角色列表', '/organization/app-role-index'), ('平台设置-APP设置-角色列表-编辑', '/organization/app-role-update'), ('平台设置-APP设置-角色列表-权限-增加授权', '/organization/assign-app-permission'), ('平台设置-APP设置-角色列表-权限', '/organization/get-app-permission'), ('平台设置-APP设置-角色列表-权限-移除授权', '/organization/remove-app-permission'), ('平台设置-角色列表-权限', '/organization/role-assign'), ('平台设置-角色列表-添加角色', '/organization/role-create'), ('平台设置-角色列表', '/organization/role-index'), ('平台设置-角色列表-编辑', '/organization/role-update'), ('平台设置-APP设置-角色列表-添加角色', '/organization/validate-form'), ('平台设置-APP设置-角色列表-编辑', '/organization/validate-form'), ('统计信息', '/panel/index'), ('统计信息-订单增长', '/panel/order-add'), ('统计信息-用户增长', '/panel/user-add'), ('后台权限-员工-添加员工', '/rbac/account-create'), ('后台权限-员工', '/rbac/account-index'), ('后台权限-员工-更改角色', '/rbac/account-modify-role'), ('后台权限-员工-编辑', '/rbac/account-update'), ('后台权限-员工-编辑', '/rbac/account-validate-form'), ('系统设置-我的信息-密码修改', '/rbac/modify-platform-password'), ('后台权限-角色-权限', '/rbac/role-assign'), ('后台权限-角色-添加角色', '/rbac/role-create'), ('后台权限-角色', '/rbac/role-index'), ('后台权限-角色-编辑', '/rbac/role-update'), ('后台权限-角色-编辑', '/rbac/validate-form'), ('审核-车辆审核-详情', '/review/car-detail'), ('审核-车辆审核', '/review/car-list'), ('管理员', '/review/car-list'), ('审核-车辆审核-不通过', '/review/car-out'), ('管理员', '/review/car-out'), ('审核-车辆审核-通过', '/review/car-pass'), ('管理员', '/review/car-pass'), ('审核-驾驶证审核-详情', '/review/driver-detail'), ('审核-驾驶证审核', '/review/driver-list'), ('管理员', '/review/driver-list'), ('审核-驾驶证审核-不通过', '/review/driver-out'), ('管理员', '/review/driver-out'), ('审核-驾驶证审核-通过', '/review/driver-pass'), ('管理员', '/review/driver-pass'), ('用户管理-业务员-添加业务员', '/salesman/create'), ('用户管理-会员-添加会员', '/salesman/drop-down-list'), ('用户管理-业务员-冻结', '/salesman/index'), ('用户管理-服务商-查看服务商业务员', '/salesman/index'), ('用户管理-业务员-冻结', '/salesman/set-status'), ('用户管理-业务员-解冻', '/salesman/set-status'), ('用户管理-业务员-编辑业务员', '/salesman/update'), ('用户管理-业务员-添加业务员', '/salesman/validate-form'), ('用户管理-业务员-编辑业务员', '/salesman/validate-form'), ('用户管理-业务员-查看业务员详情', '/salesman/view'), ('用户管理-服务商-添加服务商', '/service/create'), ('用户管理-服务商', '/service/index'), ('用户管理-服务商-服务商列表', '/service/index'), ('用户管理-服务商-服务商启停', '/service/set-status'), ('用户管理-会员-编辑会员', '/service/update'), ('用户管理-服务商-编辑服务商', '/service/update'), ('用户管理-会员-编辑会员', '/service/validate-form'), ('用户管理-服务商-添加服务商', '/service/validate-form'), ('用户管理-服务商-编辑服务商', '/service/validate-form'), ('用户管理-服务商-查看服务商详情', '/service/view'), ('后台设置-系统', '/system/index'), ('档案管理-保单-保单列表', '/warranty/index'), ('代理商', '业务-保险业务-时间筛选'), ('管理员', '业务-保险业务-时间筛选'), ('代理商', '业务-保险业务-服务商筛选'), ('管理员', '业务-保险业务-服务商筛选'), ('代理商', '业务-保险业务-查看订单详情'), ('管理员', '业务-保险业务-查看订单详情'), ('代理商', '业务-保险业务-联系人筛选'), ('管理员', '业务-保险业务-联系人筛选'), ('代理商', '业务-保险业务-联系电话筛选'), ('管理员', '业务-保险业务-联系电话筛选'), ('代理商', '业务-保险业务-订单删除'), ('管理员', '业务-保险业务-订单删除'), ('代理商', '业务-保险业务-订单状态筛选'), ('管理员', '业务-保险业务-订单状态筛选'), ('代理商', '业务-保险业务-车牌号筛选'), ('管理员', '业务-保险业务-车牌号筛选'), ('管理员', '业务-订单业务-业务员名筛选'), ('管理员', '业务-订单业务-时间筛选'), ('管理员', '业务-订单业务-服务商名筛选'), ('管理员', '业务-订单业务-查看流程'), ('管理员', '业务-订单业务-联系人筛选'), ('管理员', '业务-订单业务-联系电话筛选'), ('管理员', '业务-订单业务-订单列表'), ('管理员', '业务-订单业务-订单变更状态'), ('管理员', '业务-订单业务-车牌号筛选'), ('管理员', '内容管理-广告-删除广告'), ('管理员', '内容管理-广告-广告列表'), ('管理员', '内容管理-广告-查看广告详情'), ('管理员', '内容管理-广告-添加广告'), ('管理员', '内容管理-广告-编辑广告'), ('管理员', '内容管理-文章-删除文章'), ('管理员', '内容管理-文章-时间筛选'), ('管理员', '内容管理-文章-显示/隐藏文章'), ('管理员', '内容管理-文章-查看文章详情'), ('管理员', '内容管理-文章-标题筛选'), ('管理员', '内容管理-文章-添加文章'), ('管理员', '内容管理-文章-编辑文章'), ('管理员', '内容管理-栏目-删除栏目'), ('管理员', '内容管理-栏目-添加栏目'), ('管理员', '内容管理-栏目-编辑栏目'), ('管理员', '后台权限'), ('管理员', '后台权限-员工'), ('管理员', '后台权限-员工-删除'), ('管理员', '后台权限-员工-更改角色'), ('管理员', '后台权限-员工-添加员工'), ('管理员', '后台权限-员工-编辑'), ('管理员', '后台权限-角色'), ('管理员', '后台权限-角色-删除'), ('管理员', '后台权限-角色-权限'), ('管理员', '后台权限-角色-添加角色'), ('管理员', '后台权限-角色-编辑'), ('管理员', '后台设置'), ('管理员', '后台设置-保险商'), ('管理员', '后台设置-保险商-删除'), ('管理员', '后台设置-保险商-添加保险商'), ('管理员', '后台设置-保险商-编辑'), ('管理员', '后台设置-系统'), ('管理员', '后台设置-系统-基础设置'), ('管理员', '后台设置-系统-客户端推送设置'), ('管理员', '后台设置-系统-服务端推送设置'), ('管理员', '后台设置-系统-短信设置'), ('管理员', '后台设置-险种'), ('管理员', '后台设置-险种-删除'), ('管理员', '后台设置-险种-添加险种'), ('管理员', '后台设置-险种-编辑'), ('管理员', '后台设置-险种-编辑要素'), ('管理员', '后台设置-险种-设置状态'), ('管理员', '审核'), ('管理员', '审核-车辆审核'), ('管理员', '审核-车辆审核-不通过'), ('管理员', '审核-车辆审核-通过'), ('管理员', '审核-驾驶证审核'), ('管理员', '审核-驾驶证审核-不通过'), ('管理员', '审核-驾驶证审核-通过'), ('代理商', '平台设置'), ('服务商', '平台设置'), ('管理员', '平台设置'), ('代理商', '平台设置-APP设置'), ('服务商', '平台设置-APP设置'), ('管理员', '平台设置-APP设置'), ('代理商', '平台设置-APP设置-角色列表'), ('服务商', '平台设置-APP设置-角色列表'), ('管理员', '平台设置-APP设置-角色列表'), ('代理商', '平台设置-APP设置-角色列表-删除'), ('服务商', '平台设置-APP设置-角色列表-删除'), ('管理员', '平台设置-APP设置-角色列表-删除'), ('代理商', '平台设置-APP设置-角色列表-权限'), ('服务商', '平台设置-APP设置-角色列表-权限'), ('管理员', '平台设置-APP设置-角色列表-权限'), ('管理员', '平台设置-APP设置-角色列表-权限-增加授权'), ('管理员', '平台设置-APP设置-角色列表-权限-移除授权'), ('代理商', '平台设置-APP设置-角色列表-添加角色'), ('服务商', '平台设置-APP设置-角色列表-添加角色'), ('管理员', '平台设置-APP设置-角色列表-添加角色'), ('代理商', '平台设置-APP设置-角色列表-编辑'), ('服务商', '平台设置-APP设置-角色列表-编辑'), ('管理员', '平台设置-APP设置-角色列表-编辑'), ('代理商', '平台设置-员工列表'), ('服务商', '平台设置-员工列表'), ('管理员', '平台设置-员工列表'), ('代理商', '平台设置-员工列表-删除'), ('服务商', '平台设置-员工列表-删除'), ('管理员', '平台设置-员工列表-删除'), ('代理商', '平台设置-员工列表-更改角色'), ('服务商', '平台设置-员工列表-更改角色'), ('管理员', '平台设置-员工列表-更改角色'), ('代理商', '平台设置-员工列表-添加员工'), ('服务商', '平台设置-员工列表-添加员工'), ('管理员', '平台设置-员工列表-添加员工'), ('代理商', '平台设置-员工列表-编辑'), ('服务商', '平台设置-员工列表-编辑'), ('管理员', '平台设置-员工列表-编辑'), ('代理商', '平台设置-角色列表'), ('服务商', '平台设置-角色列表'), ('管理员', '平台设置-角色列表'), ('代理商', '平台设置-角色列表-删除'), ('服务商', '平台设置-角色列表-删除'), ('管理员', '平台设置-角色列表-删除'), ('代理商', '平台设置-角色列表-权限'), ('服务商', '平台设置-角色列表-权限'), ('管理员', '平台设置-角色列表-权限'), ('代理商', '平台设置-角色列表-添加角色'), ('服务商', '平台设置-角色列表-添加角色'), ('管理员', '平台设置-角色列表-添加角色'), ('代理商', '平台设置-角色列表-编辑'), ('服务商', '平台设置-角色列表-编辑'), ('管理员', '平台设置-角色列表-编辑'), ('管理员', '档案管理-保单-保单列表'), ('管理员', '档案管理-保单-删除'), ('管理员', '档案管理-保单-承包公司筛选'), ('管理员', '档案管理-保单-时间筛选'), ('管理员', '档案管理-保单-联系人筛选'), ('管理员', '档案管理-保单-联系电话筛选'), ('管理员', '档案管理-保单-车牌号筛选'), ('管理员', '档案管理-身份证-删除身份证'), ('管理员', '档案管理-身份证-姓名筛选'), ('管理员', '档案管理-身份证-性别筛选'), ('管理员', '档案管理-身份证-时间筛选'), ('管理员', '档案管理-身份证-查看身份证详情'), ('管理员', '档案管理-身份证-添加身份证'), ('管理员', '档案管理-身份证-编辑身份证'), ('管理员', '档案管理-身份证-证件号筛选'), ('管理员', '档案管理-车辆-使用性质筛选'), ('管理员', '档案管理-车辆-删除车辆'), ('管理员', '档案管理-车辆-姓名筛选'), ('管理员', '档案管理-车辆-时间筛选'), ('管理员', '档案管理-车辆-查看车辆详情'), ('管理员', '档案管理-车辆-添加车辆'), ('管理员', '档案管理-车辆-编辑车辆'), ('管理员', '档案管理-车辆-证件号筛选'), ('管理员', '档案管理-驾照-准架车型筛选'), ('管理员', '档案管理-驾照-删除驾照'), ('管理员', '档案管理-驾照-名字筛选'), ('管理员', '档案管理-驾照-性别筛选'), ('管理员', '档案管理-驾照-时间筛选'), ('管理员', '档案管理-驾照-查看驾照详情'), ('管理员', '档案管理-驾照-添加驾照'), ('管理员', '档案管理-驾照-编辑驾照'), ('管理员', '档案管理-驾照-证件号筛选'), ('管理员', '用户管理'), ('客户经理', '用户管理-业务员'), ('管理员', '用户管理-业务员'), ('客户经理', '用户管理-业务员-业务员状态筛选'), ('管理员', '用户管理-业务员-业务员状态筛选'), ('客户经理', '用户管理-业务员-保险按钮'), ('管理员', '用户管理-业务员-保险按钮'), ('客户经理', '用户管理-业务员-冻结'), ('管理员', '用户管理-业务员-冻结'), ('客户经理', '用户管理-业务员-删除业务员'), ('管理员', '用户管理-业务员-删除业务员'), ('客户经理', '用户管理-业务员-名字筛选'), ('管理员', '用户管理-业务员-名字筛选'), ('客户经理', '用户管理-业务员-客户列表按钮'), ('管理员', '用户管理-业务员-客户列表按钮'), ('客户经理', '用户管理-业务员-手机号筛选'), ('管理员', '用户管理-业务员-手机号筛选'), ('客户经理', '用户管理-业务员-时间筛选'), ('管理员', '用户管理-业务员-时间筛选'), ('客户经理', '用户管理-业务员-查看业务员详情'), ('管理员', '用户管理-业务员-查看业务员详情'), ('客户经理', '用户管理-业务员-添加业务员'), ('管理员', '用户管理-业务员-添加业务员'), ('客户经理', '用户管理-业务员-用户名筛选'), ('管理员', '用户管理-业务员-用户名筛选'), ('客户经理', '用户管理-业务员-编辑业务员'), ('管理员', '用户管理-业务员-编辑业务员'), ('客户经理', '用户管理-业务员-解冻'), ('管理员', '用户管理-业务员-解冻'), ('客户经理', '用户管理-业务员-订单按钮'), ('管理员', '用户管理-业务员-订单按钮'), ('客户经理', '用户管理-代理商'), ('管理员', '用户管理-代理商'), ('客户经理', '用户管理-代理商-代理商列表'), ('管理员', '用户管理-代理商-代理商列表'), ('客户经理', '用户管理-代理商-代理商名称筛选'), ('管理员', '用户管理-代理商-代理商名称筛选'), ('客户经理', '用户管理-代理商-删除代理商'), ('管理员', '用户管理-代理商-删除代理商'), ('客户经理', '用户管理-代理商-客户经理筛选'), ('管理员', '用户管理-代理商-客户经理筛选'), ('客户经理', '用户管理-代理商-时间筛选'), ('管理员', '用户管理-代理商-时间筛选'), ('客户经理', '用户管理-代理商-查看代理商业务员'), ('管理员', '用户管理-代理商-查看代理商业务员'), ('客户经理', '用户管理-代理商-查看代理商详情'), ('管理员', '用户管理-代理商-查看代理商详情'), ('客户经理', '用户管理-代理商-添加代理商'), ('管理员', '用户管理-代理商-添加代理商'), ('客户经理', '用户管理-代理商-编辑代理商'), ('管理员', '用户管理-代理商-编辑代理商'), ('客户经理', '用户管理-代理商-负责人姓名筛选'), ('管理员', '用户管理-代理商-负责人姓名筛选'), ('客户经理', '用户管理-会员'), ('管理员', '用户管理-会员'), ('客户经理', '用户管理-会员-业务员筛选'), ('管理员', '用户管理-会员-业务员筛选'), ('客户经理', '用户管理-会员-保险下单'), ('管理员', '用户管理-会员-保险下单'), ('客户经理', '用户管理-会员-保险订单按钮'), ('管理员', '用户管理-会员-保险订单按钮'), ('客户经理', '用户管理-会员-删除会员'), ('管理员', '用户管理-会员-删除会员'), ('客户经理', '用户管理-会员-姓名筛选'), ('管理员', '用户管理-会员-姓名筛选'), ('客户经理', '用户管理-会员-实名认证'), ('管理员', '用户管理-会员-实名认证'), ('客户经理', '用户管理-会员-手机号筛选'), ('管理员', '用户管理-会员-手机号筛选'), ('客户经理', '用户管理-会员-时间筛选'), ('管理员', '用户管理-会员-时间筛选'), ('客户经理', '用户管理-会员-普通下单'), ('管理员', '用户管理-会员-普通下单'), ('客户经理', '用户管理-会员-查看会员详情'), ('管理员', '用户管理-会员-查看会员详情'), ('客户经理', '用户管理-会员-添加会员'), ('管理员', '用户管理-会员-添加会员'), ('客户经理', '用户管理-会员-状态筛选'), ('管理员', '用户管理-会员-状态筛选'), ('客户经理', '用户管理-会员-用户名筛选'), ('管理员', '用户管理-会员-用户名筛选'), ('客户经理', '用户管理-会员-用户类型筛选'), ('管理员', '用户管理-会员-用户类型筛选'), ('客户经理', '用户管理-会员-编辑会员'), ('管理员', '用户管理-会员-编辑会员'), ('客户经理', '用户管理-会员-订单按钮'), ('管理员', '用户管理-会员-订单按钮'), ('客户经理', '用户管理-会员-车辆按钮'), ('管理员', '用户管理-会员-车辆按钮'), ('客户经理', '用户管理-会员-驾照按钮'), ('管理员', '用户管理-会员-驾照按钮'), ('客户经理', '用户管理-服务商'), ('管理员', '用户管理-服务商'), ('客户经理', '用户管理-服务商-客户经理筛选'), ('管理员', '用户管理-服务商-客户经理筛选'), ('客户经理', '用户管理-服务商-时间筛选'), ('管理员', '用户管理-服务商-时间筛选'), ('客户经理', '用户管理-服务商-服务商列表'), ('管理员', '用户管理-服务商-服务商列表'), ('客户经理', '用户管理-服务商-服务商名称筛选'), ('管理员', '用户管理-服务商-服务商名称筛选'), ('管理员', '用户管理-服务商-服务商启停'), ('客户经理', '用户管理-服务商-查看服务商业务员'), ('管理员', '用户管理-服务商-查看服务商业务员'), ('客户经理', '用户管理-服务商-查看服务商详情'), ('管理员', '用户管理-服务商-查看服务商详情'), ('客户经理', '用户管理-服务商-添加服务商'), ('管理员', '用户管理-服务商-添加服务商'), ('客户经理', '用户管理-服务商-电话筛选'), ('管理员', '用户管理-服务商-电话筛选'), ('客户经理', '用户管理-服务商-编辑服务商'), ('管理员', '用户管理-服务商-编辑服务商'), ('客户经理', '用户管理-服务商-负责人姓名筛选'), ('管理员', '用户管理-服务商-负责人姓名筛选'), ('管理员', '系统设置-我的信息'), ('管理员', '系统设置-我的信息-密码修改'), ('管理员', '系统设置-系统-添加设置项'), ('管理员', '系统设置-通知列表'), ('管理员', '系统设置-通知列表-新通知'), ('代理商', '统计信息'), ('服务商', '统计信息'), ('管理员', '统计信息'), ('代理商', '统计信息-公告'), ('服务商', '统计信息-公告'), ('管理员', '统计信息-公告'), ('服务商', '统计信息-待审核订单'), ('管理员', '统计信息-待审核订单'), ('服务商', '统计信息-待审车订单'), ('管理员', '统计信息-待审车订单'), ('代理商', '统计信息-待核保订单'), ('服务商', '统计信息-待核保订单'), ('管理员', '统计信息-待核保订单'), ('代理商', '统计信息-核保成功订单'), ('服务商', '统计信息-核保成功订单'), ('管理员', '统计信息-核保成功订单'), ('代理商', '统计信息-用户增长'), ('服务商', '统计信息-用户增长'), ('管理员', '统计信息-用户增长'), ('代理商', '统计信息-订单增长'), ('服务商', '统计信息-订单增长'), ('管理员', '统计信息-订单增长'), ('管理员', '账户信息'), ('管理员', '账户信息-修改密码');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
--  Records of `cdc_banner`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_banner` VALUES ('12', '三生三世', '', '1', '1503477857', '1503477857', '0', '1'), ('13', '哈哈哈', '这是啥', '1', '1503481487', '1503494386', '0', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='banner图片表';

-- ----------------------------
--  Records of `cdc_banner_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_banner_img` VALUES ('4', '0', '/upload/banner/17384932017-08-23-14-24-46.png', '/upload/banner/thumb300x200angkeYPXL17384932017-08-23-14-24-46.png', '100998', '17384932017-08-23-14-24-46.png', '0'), ('5', '8', '/upload/banner/72351372017-08-23-14-43-21.png', '/upload/banner/thumb300x200angkeYPXL72351372017-08-23-14-43-21.png', '1744853', '72351372017-08-23-14-43-21.png', '0'), ('6', '0', '/upload/banner/91940872017-08-23-14-54-36.png', '/upload/banner/thumb300x200angkeYPXL91940872017-08-23-14-54-36.png', '647933', '91940872017-08-23-14-54-36.png', '0'), ('7', '8', '/upload/banner/96095522017-08-23-14-56-36.png', '/upload/banner/thumb300x200angkeYPXL96095522017-08-23-14-56-36.png', '100998', '96095522017-08-23-14-56-36.png', '1'), ('8', '0', '/upload/banner/32737472017-08-23-15-06-41.png', '/upload/banner/thumb300x200angkeYPXL32737472017-08-23-15-06-41.png', '463655', '32737472017-08-23-15-06-41.png', '0'), ('9', '12', '/upload/banner/46275602017-08-23-16-43-32.png', '/upload/banner/thumb300x200angkeYPXL46275602017-08-23-16-43-32.png', '100998', '46275602017-08-23-16-43-32.png', '1'), ('10', '0', '/upload/banner/96070412017-08-23-16-55-09.png', '/upload/banner/thumb300x200angkeYPXL96070412017-08-23-16-55-09.png', '100998', '96070412017-08-23-16-55-09.png', '0'), ('11', '0', '/upload/banner/37314282017-08-23-17-03-17.png', '/upload/banner/thumb300x200angkeYPXL37314282017-08-23-17-03-17.png', '463655', '37314282017-08-23-17-03-17.png', '0'), ('12', '0', '/upload/banner/63775532017-08-23-17-06-05.png', '/upload/banner/thumb300x200angkeYPXL63775532017-08-23-17-06-05.png', '463655', '63775532017-08-23-17-06-05.png', '0'), ('13', '0', '/upload/banner/37056892017-08-23-17-07-04.png', '/upload/banner/thumb300x200angkeYPXL37056892017-08-23-17-07-04.png', '647933', '37056892017-08-23-17-07-04.png', '0'), ('14', '0', '/upload/banner/72110452017-08-23-17-09-33.png', '/upload/banner/thumb300x200angkeYPXL72110452017-08-23-17-09-33.png', '463655', '72110452017-08-23-17-09-33.png', '0'), ('15', '0', '/upload/banner/36967502017-08-23-17-10-15.png', '/upload/banner/thumb300x200angkeYPXL36967502017-08-23-17-10-15.png', '463655', '36967502017-08-23-17-10-15.png', '0'), ('16', '0', '/upload/banner/83932772017-08-23-17-11-03.png', '/upload/banner/thumb300x200angkeYPXL83932772017-08-23-17-11-03.png', '100998', '83932772017-08-23-17-11-03.png', '0'), ('17', '0', '/upload/banner/24940162017-08-23-17-15-50.png', '/upload/banner/thumb300x200angkeYPXL24940162017-08-23-17-15-50.png', '1744853', '24940162017-08-23-17-15-50.png', '0'), ('18', '0', '/upload/banner/34614872017-08-23-17-17-16.png', '/upload/banner/thumb300x200angkeYPXL34614872017-08-23-17-17-16.png', '1744853', '34614872017-08-23-17-17-16.png', '0'), ('19', '0', '/upload/banner/33736402017-08-23-17-18-18.png', '/upload/banner/thumb300x200angkeYPXL33736402017-08-23-17-18-18.png', '100998', '33736402017-08-23-17-18-18.png', '0'), ('20', '0', '/upload/banner/71458472017-08-23-17-35-51.png', '/upload/banner/thumb300x200angkeYPXL71458472017-08-23-17-35-51.png', '100998', '71458472017-08-23-17-35-51.png', '0'), ('21', '0', '/upload/banner/12621412017-08-23-17-36-16.png', '/upload/banner/thumb300x200angkeYPXL12621412017-08-23-17-36-16.png', '100998', '12621412017-08-23-17-36-16.png', '0'), ('22', '0', '/upload/banner/72943422017-08-23-17-38-24.png', '/upload/banner/thumb300x200angkeYPXL72943422017-08-23-17-38-24.png', '463655', '72943422017-08-23-17-38-24.png', '0'), ('23', '13', '/upload/banner/16877142017-08-23-17-44-43.png', '/upload/banner/thumb300x200angkeYPXL16877142017-08-23-17-44-43.png', '100998', '16877142017-08-23-17-44-43.png', '0'), ('24', '0', '/upload/banner/87754952017-08-23-19-00-17.png', '/upload/banner/thumb300x200angkeYPXL87754952017-08-23-19-00-17.png', '463655', '87754952017-08-23-19-00-17.png', '0'), ('25', '0', '/upload/banner/80917062017-08-23-19-40-29.png', '/upload/banner/thumb300x200angkeYPXL80917062017-08-23-19-40-29.png', '1597500', '80917062017-08-23-19-40-29.png', '0'), ('26', '13', '/upload/banner/40184642017-08-23-21-16-19.png', '/upload/banner/thumb300x200angkeYPXL40184642017-08-23-21-16-19.png', '463655', '40184642017-08-23-21-16-19.png', '1'), ('27', '13', '/upload/banner/51259632017-08-23-21-17-06.png', '/upload/banner/thumb300x200angkeYPXL51259632017-08-23-21-17-06.png', '647933', '51259632017-08-23-21-17-06.png', '1'), ('28', '13', '/upload/banner/43387412017-08-23-21-19-39.png', '/upload/banner/thumb300x200angkeYPXL43387412017-08-23-21-19-39.png', '1744853', '43387412017-08-23-21-19-39.png', '1'), ('29', '0', '/upload/banner/96805792017-08-23-21-32-53.png', '/upload/banner/thumb300x200angkeYPXL96805792017-08-23-21-32-53.png', '100998', '96805792017-08-23-21-32-53.png', '0'), ('30', '0', '/upload/banner/51523432017-08-23-21-32-55.png', '/upload/banner/thumb300x200angkeYPXL51523432017-08-23-21-32-55.png', '1744853', '51523432017-08-23-21-32-55.png', '0'), ('31', '0', '/upload/banner/14713642017-08-23-21-33-47.png', '/upload/banner/thumb300x200angkeYPXL14713642017-08-23-21-33-47.png', '100998', '14713642017-08-23-21-33-47.png', '0'), ('32', '0', '/upload/banner/85787932017-08-23-21-33-48.png', '/upload/banner/thumb300x200angkeYPXL85787932017-08-23-21-33-48.png', '463655', '85787932017-08-23-21-33-48.png', '0'), ('33', '0', '/upload/banner/82263412017-08-23-21-36-15.png', '/upload/banner/thumb300x200angkeYPXL82263412017-08-23-21-36-15.png', '463655', '82263412017-08-23-21-36-15.png', '0'), ('34', '0', '/upload/banner/93111142017-08-23-21-36-16.png', '/upload/banner/thumb300x200angkeYPXL93111142017-08-23-21-36-16.png', '1744853', '93111142017-08-23-21-36-16.png', '0'), ('35', '0', '/upload/banner/90873072017-08-23-21-37-25.png', '/upload/banner/thumb300x200angkeYPXL90873072017-08-23-21-37-25.png', '100998', '90873072017-08-23-21-37-25.png', '0'), ('36', '0', '/upload/banner/28232252017-08-23-21-37-26.png', '/upload/banner/thumb300x200angkeYPXL28232252017-08-23-21-37-26.png', '463655', '28232252017-08-23-21-37-26.png', '0'), ('37', '0', '/upload/banner/97411072017-08-23-21-38-08.png', '/upload/banner/thumb300x200angkeYPXL97411072017-08-23-21-38-08.png', '463655', '97411072017-08-23-21-38-08.png', '0'), ('38', '0', '/upload/banner/88680142017-08-23-21-43-47.png', '/upload/banner/thumb300x200angkeYPXL88680142017-08-23-21-43-47.png', '1744853', '88680142017-08-23-21-43-47.png', '0'), ('39', '0', '/upload/banner/17348722017-08-23-21-45-34.png', '/upload/banner/thumb300x200angkeYPXL17348722017-08-23-21-45-34.png', '647933', '17348722017-08-23-21-45-34.png', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='商业险详情';

-- ----------------------------
--  Records of `cdc_business_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_business_detail` VALUES ('1', '', '', '0.00', '1503037331', '0', '0', '0'), ('2', '', '', '0.00', '1503039132', '0', '0', '0'), ('3', '542452', '452452452', '444.00', '1503042353', '0', '0', '0'), ('4', '', '', '0.00', '1503042518', '0', '0', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
--  Records of `cdc_car`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car` VALUES ('1', '2', '川AA780D', '小型轿车', '叶魁友', '非营运', '北京现代牌BH7164MX', 'LBEHDAEB58Y038860', '8B213508', '3', '20080708', '19200506', '0', '1', '1502955884', '1503028052'), ('2', '5', '陕AN3422', '小型轿车', '日', '非营运', '起亚牌YQZ7204A', 'LJDKAA243E09', 'EW084271', '6', '20140808', '20140606', '1', '1', '1502956217', '1503028052'), ('3', '5', '陕AN3433', '小型轿车', '日', '非营运', '起亚牌YQZ7204A', 'LJDKAA243E09', 'EW084271', '6', '20150909', '20140606', '0', '1', '1502958010', '1503028052'), ('4', '1', '沪A0M084', '小型轿车', '钱川', '非营运', '大众汽车牌SVW71611KS', 'LSVFF66R8C2116280', '416098', '8', '20121127', '20021107', '0', '1', '1503027542', '1503028052'), ('6', '1', '川AA780D', '小型轿车', '叶魁友', '非营运', '北京现代牌BH7164MX', 'LBEHDAEB58Y038860', '8B213508', '9', '20080708', '20150604', '0', '1', '1503028052', '1503028052'), ('7', '6', '陕AN3464', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1503409565', '0'), ('8', '7', '陕AN3457', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1503453149', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
--  Records of `cdc_car_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car_img` VALUES ('1', '1', '/upload/car_imgs/2017-08-17/584e5de8575745bb72db32ef5685f55e9e95f6f2.jpeg', '1502955884', '0'), ('2', '1', '/upload/car_imgs/2017-08-17/33305ddd49ada24bcaf322b97c5d4d4c9d5119f9.jpeg', '1502955884', '0'), ('3', '2', '/upload/car_imgs/2017-08-17/a8d9872337f41571616fbc0fa656dddd44aa9a4f.jpeg', '1502956217', '0'), ('4', '2', '/upload/car_imgs/2017-08-17/f6c6ac6db0bd62e5bbce5be9103bebd258992e5a.jpeg', '1502956217', '0'), ('5', '3', '/upload/car_imgs/2017-08-17/d1b0edf31be0821890905927a6f9fe6183c4522d.jpeg', '1502958010', '0'), ('6', '3', '/upload/car_imgs/2017-08-17/7f91f48d850183e6d94631d1e6cb306eac7cc0e9.jpeg', '1502958010', '0'), ('7', '4', '/upload/car_imgs/2017-08-18/8ca2a3cc3b2e15c33031c6f53963fc4051f9eaad.jpeg', '1503027542', '0'), ('8', '4', '/upload/car_imgs/2017-08-18/2ffba014cd6639cf0acc63a17b4d449d375a1c93.jpeg', '1503027542', '0'), ('9', '5', '/upload/car_imgs/2017-08-18/c8e3f859705715672193087485829353a1931a83.jpeg', '1503027749', '0'), ('10', '5', '/upload/car_imgs/2017-08-18/7e6d9fc13b1b596bac92f9b17abfaded30344f15.jpeg', '1503027749', '0'), ('11', '6', '/upload/car_imgs/2017-08-18/924bca29e222ae83fc43c7080baacb13dcb039b0.jpeg', '1503028052', '0'), ('12', '6', '/upload/car_imgs/2017-08-18/fdabba98fe2bcc99f432c14e2771515f3484ad6b.jpeg', '1503028052', '0'), ('13', '7', '/upload/car/00daae48be3dd5db7609f575dd14b87b010410bd.jpeg', '1503409565', '0'), ('14', '7', '/upload/car/1c702966fed0c6636aa7ea3bb648cd9a114e9cbb.jpeg', '1503409565', '0'), ('15', '8', '/upload/car/c0f11ffd244f8d3aa3c840faaae2c3f8be30ff4a.jpeg', '1503453149', '0'), ('16', '8', '/upload/car/41e4128d5a8179fd92e333063528ff165ec6c0bf.jpeg', '1503453149', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `cdc_column`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_column` VALUES ('1', '11333333', '113333', '1503026866', '1503454937'), ('4', '梵蒂冈十多个', '电视广告', '1503459185', '1503459185'), ('5', '', '', '1503476730', '1503476730');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='交强险详情';

-- ----------------------------
--  Records of `cdc_compensatory_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_compensatory_detail` VALUES ('1', '撒打算发', '按时发散分', '666666.00', '0.00', '1503037331', '0', '0', '0'), ('2', '', '', '0.00', '0.00', '1503039132', '0', '1503629700', '0'), ('3', '4545345', '453453', '555.00', '5.00', '1503042353', '0', '1503460800', '1503460800'), ('4', '', '', '0.00', '0.00', '1503042518', '0', '0', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='驾驶证照片表';

-- ----------------------------
--  Records of `cdc_driving_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_img` VALUES ('1', '0', '/upload/driver/150288731759943d95e09400.96479450.jpg', '0', '0', '/upload/driver/150288731759943d95e09400.96479450.jpg', '0', '27974', 0x31), ('2', '0', '/upload/driver/150288731859943d964cee23.34049577.jpg', '0', '0', '/upload/driver/150288731859943d964cee23.34049577.jpg', '0', '48615', 0x31), ('3', '0', '/upload/driver/150288738659943dda280c76.10705430.jpg', '0', '0', '/upload/driver/150288738659943dda280c76.10705430.jpg', '0', '48615', 0x31), ('4', '0', '/upload/driver/150288738659943dda8de281.76372872.png', '0', '0', '/upload/driver/150288738659943dda8de281.76372872.png', '0', '338108', 0x31), ('5', '0', '/upload/driver/1502888275599441530d33c6.29717767.jpg', '0', '0', '/upload/driver/1502888275599441530d33c6.29717767.jpg', '0', '27974', 0x31), ('6', '0', '/upload/driver/150288827559944153820d21.58248631.jpg', '0', '0', '/upload/driver/150288827559944153820d21.58248631.jpg', '0', '48615', 0x31), ('7', '0', '/upload/driver/150288831259944178898031.85621260.jpg', '0', '0', '/upload/driver/150288831259944178898031.85621260.jpg', '0', '27974', 0x31), ('8', '0', '/upload/driver/150288831259944178ee12c2.49361550.jpg', '0', '0', '/upload/driver/150288831259944178ee12c2.49361550.jpg', '0', '48615', 0x31), ('9', '0', '/upload/driver/15028884935994422d219e06.69356950.jpg', '0', '0', '/upload/driver/15028884935994422d219e06.69356950.jpg', '0', '27974', 0x31), ('10', '0', '/upload/driver/15028884935994422d81cbc6.09803386.jpg', '0', '0', '/upload/driver/15028884935994422d81cbc6.09803386.jpg', '0', '48615', 0x31), ('11', '0', '/upload/driver/1502888636599442bcd119b4.76841613.jpg', '0', '0', '/upload/driver/1502888636599442bcd119b4.76841613.jpg', '0', '48615', 0x31), ('12', '0', '/upload/driver/1502888637599442bd4f9c40.52278786.jpg', '0', '0', '/upload/driver/1502888637599442bd4f9c40.52278786.jpg', '0', '27974', 0x31), ('13', '16', '/upload/driver/1502888703599442ff0f4499.55563290.jpg', '0', '0', '/upload/driver/1502888703599442ff0f4499.55563290.jpg', '1', '27974', 0x31), ('14', '16', '/upload/driver/1502888703599442ff59c931.98962479.jpg', '0', '0', '/upload/driver/1502888703599442ff59c931.98962479.jpg', '1', '48615', 0x31), ('15', '0', '/upload/driver/1502890418599449b2b31f19.43071429.jpg', '0', '0', '/upload/driver/1502890418599449b2b31f19.43071429.jpg', '0', '27974', 0x31), ('16', '17', '/upload/driver/92053872017-08-17-09-20-59.jpg', '0', '0', '/upload/driver/thumb60x60angkeYPXL92053872017-08-17-09-20-59.jpg', '1', '27974', 0x39), ('17', '17', '/upload/driver/28995722017-08-17-09-20-59.jpg', '0', '0', '/upload/driver/thumb60x60angkeYPXL28995722017-08-17-09-20-59.jpg', '1', '48615', 0x32), ('18', '18', '/upload/driver_imgs/2017-08-17/90282a76c08c6ecc4164ebde18819511c62a93ce.jpeg', '1502959556', '0', null, null, null, null), ('19', '19', '/upload/driver_imgs/2017-08-18/e79ee00493741d274e01225f98cf02521b1ee529.jpeg', '1503027309', '0', null, null, null, null), ('20', '0', '/upload/driver/11074592017-08-18-14-58-54.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL11074592017-08-18-14-58-54.png', '0', '405387', 0x31), ('21', '0', '/upload/driver/39263292017-08-23-09-50-49.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL39263292017-08-23-09-50-49.png', '0', '450084', 0x33), ('22', '0', '/upload/driver/45584732017-08-23-09-55-21.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL45584732017-08-23-09-55-21.png', '0', '450084', 0x34), ('23', '0', '/upload/driver/78039292017-08-23-09-55-31.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL78039292017-08-23-09-55-31.png', '0', '405387', 0x37), ('24', '20', '/upload/driver/75656722017-08-23-10-09-56.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL75656722017-08-23-10-09-56.png', '1', '450084', 0x37), ('25', '20', '/upload/driver/98987292017-08-23-10-12-35.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL98987292017-08-23-10-12-35.png', '1', '450084', 0x39), ('26', '21', '/upload/driver/83982652017-08-23-16-09-54.jpg', '0', '0', '/upload/driver/thumb300x200angkeYPXL83982652017-08-23-16-09-54.jpg', '1', '4471', 0x38333938323635323031372d30382d32332d31362d30392d35342e6a7067), ('27', '21', '/upload/driver/37634482017-08-23-16-09-54.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL37634482017-08-23-16-09-54.png', '1', '85170', 0x33373633343438323031372d30382d32332d31362d30392d35342e706e67), ('28', '22', '/upload/driver/74271732017-08-23-17-09-45.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL74271732017-08-23-17-09-45.png', '1', '450084', 0x37343237313733323031372d30382d32332d31372d30392d34352e706e67), ('29', '22', '/upload/driver/21127052017-08-23-17-09-53.png', '0', '0', '/upload/driver/thumb300x200angkeYPXL21127052017-08-23-17-09-53.png', '1', '450084', 0x32313132373035323031372d30382d32332d31372d30392d35332e706e67);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
--  Records of `cdc_driving_license`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_license` VALUES ('18', '5', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'C1', '20150808', '20150808', '1', '1502959556', '0'), ('19', '1', '赖旭宇', '男', '中国', '445102198905131752', '19890513', '20110519', 'C1', '20110518', '20202020', '0', '1503453334', '1503453334'), ('20', '4', '萨芬的', '算分', '得分', '水电费', '水电费', '水电费', '水电费', '水电费', '水电费', '1', '1503454359', '1503454359'), ('21', '6', 'SaaS', '啊啊', '11', '1', '1', '11', '1', '11', '1', '1', '1503475813', '1503475813'), ('22', '6', '沙发斯蒂芬', '第三个', '第三个', '第三个', '第三个', '三个', '第三个', '第三个', '三个', '1', '1503479396', '1503479396');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='险种要素表';

-- ----------------------------
--  Records of `cdc_element`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_element` VALUES ('1', '4', '标准', '1503038912', '0'), ('2', '5', '标准', '1503038935', '0'), ('3', '6', '标准', '1503296492', '0'), ('6', '10', '默认要素', '1503299168', '0'), ('7', '10', '保额70w', '1503299168', '0'), ('8', '11', '标准', '1503476315', '0'), ('12', '12', '标准', '1503476403', '0'), ('13', '12', '22', '1503476403', '0'), ('14', '12', '222', '1503476403', '0'), ('19', '13', '标准', '1503479241', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
--  Records of `cdc_identification`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification` VALUES ('1', '1', '奥巴马', '哈尼', '男', '19610804', '510987676777767898', '20202020', '20202020', '1', '1503043720', '1503043720'), ('2', '1', '', '', '', '', '', '', '', '0', '1502955055', '0'), ('3', '2', '奥巴马', '哈尼', '男', '19610804', '512345432111234544', '20202020', '20202020', '1', '1503044445', '1503044445'), ('5', '4', '', '', '', '', '', '', '', '0', '0', '0'), ('6', '5', '', '', '', '', '', '', '', '0', '0', '0'), ('7', '3', '火星服务站', '', '', '', '775851', '', '', '1', '1503044094', '1503044094'), ('9', '6', '这是一个组织', '', '', '', '775852', '', '', '1', '1503452575', '1503452575'), ('10', '7', '', '', '', '', '', '', '', '0', '1503453077', '0'), ('11', '8', '', '', '', '', '', '', '', '0', '0', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='认证图片表';

-- ----------------------------
--  Records of `cdc_identification_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification_img` VALUES ('1', '0', '/upload/identification/58141012017-08-17-09-30-06.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL58141012017-08-17-09-30-06.jpg', '0', '27974', '58141012017-08-17-09-30-06.jpg'), ('2', '0', '/upload/identification/10905682017-08-17-09-30-07.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL10905682017-08-17-09-30-07.jpg', '0', '48615', '10905682017-08-17-09-30-07.jpg'), ('3', '0', '/upload/identification/18962562017-08-17-09-33-47.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL18962562017-08-17-09-33-47.jpg', '0', '48615', '18962562017-08-17-09-33-47.jpg'), ('4', '0', '/upload/identification/83869432017-08-17-09-33-48.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL83869432017-08-17-09-33-48.jpg', '0', '27974', '83869432017-08-17-09-33-48.jpg'), ('5', '0', '/upload/identification/75279432017-08-17-09-34-21.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL75279432017-08-17-09-34-21.jpg', '0', '48615', '75279432017-08-17-09-34-21.jpg'), ('6', '0', '/upload/identification/15684862017-08-17-09-34-22.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL15684862017-08-17-09-34-22.jpg', '0', '27974', '15684862017-08-17-09-34-22.jpg'), ('7', '0', '/upload/identification/72723762017-08-17-09-40-17.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL72723762017-08-17-09-40-17.jpg', '0', '27974', '72723762017-08-17-09-40-17.jpg'), ('8', '0', '/upload/identification/16142702017-08-17-09-40-17.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL16142702017-08-17-09-40-17.jpg', '0', '48615', '16142702017-08-17-09-40-17.jpg'), ('9', '0', '/upload/identification/40328252017-08-17-10-27-31.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL40328252017-08-17-10-27-31.jpg', '0', '27974', '40328252017-08-17-10-27-31.jpg'), ('10', '0', '/upload/identification/35067002017-08-17-10-27-31.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL35067002017-08-17-10-27-31.jpg', '0', '48615', '35067002017-08-17-10-27-31.jpg'), ('11', '1', '/upload/identification/20017722017-08-17-10-30-20.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL20017722017-08-17-10-30-20.jpg', '1', '27974', '20017722017-08-17-10-30-20.jpg'), ('12', '1', '/upload/identification/71930392017-08-17-10-30-20.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL71930392017-08-17-10-30-20.jpg', '1', '48615', '71930392017-08-17-10-30-20.jpg'), ('13', '1', '/upload/identification_imgs/2017-08-17/6b32ad138209076db1c60c6d6fd552f837259a70.jpeg', '1502955146', '0', null, null, null, null), ('14', '1', '/upload/identification_imgs/2017-08-17/26706dc633292fb99181a42b9dc2782e2fdf271b.jpeg', '1502955146', '0', null, null, null, null), ('15', '3', '/upload/identification_imgs/2017-08-17/84e14a07923d00b5d290b9b1b73d0a5686e8f3e1.jpeg', '1502955676', '0', null, null, null, null), ('16', '3', '/upload/identification_imgs/2017-08-17/d311cc3d8db7b79d3a0086dcca43e6c49decd6dc.jpeg', '1502955676', '0', null, null, null, null), ('17', '7', '/upload/identification/92339372017-08-18-16-14-02.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL92339372017-08-18-16-14-02.jpg', '1', '4471', '92339372017-08-18-16-14-02.jpg'), ('18', '7', '/upload/identification/15720942017-08-18-16-14-02.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL15720942017-08-18-16-14-02.png', '1', '85170', '15720942017-08-18-16-14-02.png'), ('19', '0', '/upload/identification/77975942017-08-18-16-18-05.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL77975942017-08-18-16-18-05.jpg', '0', '4471', '77975942017-08-18-16-18-05.jpg'), ('20', '0', '/upload/identification/83234332017-08-18-16-18-05.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL83234332017-08-18-16-18-05.png', '0', '85170', '83234332017-08-18-16-18-05.png'), ('21', '0', '/upload/identification/39940152017-08-18-16-20-42.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL39940152017-08-18-16-20-42.png', '0', '85170', '39940152017-08-18-16-20-42.png'), ('22', '9', '/upload/identification/15075562017-08-22-15-11-30.jpg', '0', '0', '/upload/identification/thumb300x200angkeYPXL15075562017-08-22-15-11-30.jpg', '1', '4471', '15075562017-08-22-15-11-30.jpg'), ('23', '9', '/upload/identification/59557052017-08-22-15-11-30.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL59557052017-08-22-15-11-30.png', '1', '85170', '59557052017-08-22-15-11-30.png'), ('24', '0', '/upload/identification/78103962017-08-23-09-42-10.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL78103962017-08-23-09-42-10.png', '0', '405387', '78103962017-08-23-09-42-10.png'), ('25', '0', '/upload/identification/86845232017-08-23-09-42-25.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL86845232017-08-23-09-42-25.png', '0', '450084', '86845232017-08-23-09-42-25.png'), ('26', '0', '/upload/identification/59165722017-08-23-09-42-46.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL59165722017-08-23-09-42-46.png', '0', '450084', '59165722017-08-23-09-42-46.png'), ('27', '0', '/upload/identification/52757722017-08-23-09-42-47.png', '0', '0', '/upload/identification/thumb300x200angkeYPXL52757722017-08-23-09-42-47.png', '0', '405387', '52757722017-08-23-09-42-47.png');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
--  Records of `cdc_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance` VALUES ('4', '古月的险种', '1', '21', '0', '1503038912', '1503038912'), ('5', '三水工的险种', '2', '111', '1', '1503038935', '1503038935'), ('13', '额外热温热玩热舞', '2', '436546', '1', '1503479226', '1503479241');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='保险公司表';

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='保险订单绑定详情表';

-- ----------------------------
--  Records of `cdc_insurance_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_detail` VALUES ('1', '21', '6', '1', '已完成', '1503037331', '1503452203'), ('2', '30', '6', '1', '已付款', '1503039132', '1503039519'), ('3', '31', '6', '1', '已付款', '1503042353', '1503489133'), ('4', '32', '6', '1', '已付款', '1503042518', '1503489178');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='险种和订单绑定表';

-- ----------------------------
--  Records of `cdc_insurance_element`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_element` VALUES ('1', '21', '中国好险种', '保额66W', '0', '1503037331', '0'), ('2', '21', '233', '保额66W', '不计免赔', '1503037331', '0'), ('3', '30', '古月的险种', '标准', '0', '1503039132', '0'), ('4', '30', '三水工的险种', '标准', '0', '1503039132', '0'), ('5', '31', '古月的险种', '标准', '0', '1503042353', '0'), ('6', '31', '三水工的险种', '标准', '不计免赔', '1503042353', '0'), ('7', '32', '三水工的险种', '标准', '0', '1503042518', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='保险订单表';

-- ----------------------------
--  Records of `cdc_insurance_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_order` VALUES ('21', 'A818373310230486', '6', '奥巴马', '男', '哈尼', '510987676777767898', '13198580936', '川AA780D', '22', '666666', '0', '1503037331', '1503452203', '0', '未审核', '已付款'), ('30', 'A818391320728290', '6', '奥巴马', '男', '哈尼', '510987676777767898', '13198580936', '川AA780D', '22', '0', '0', '1503039132', '0', '1503039398', '核保成功', '未付款'), ('31', 'A818423533375709', '6', '奥巴马', '男', '哈尼', '510987676777767898', '13198580936', '川AA780D', '22', '1004', '0', '1503042353', '1503489133', '1503489102', '核保成功', '已付款'), ('32', 'A818425182222080', '6', '奥巴马', '男', '哈尼', '510987676777767898', '13198580936', '川AA780D', '22', '26937', '0', '1503042518', '1503489178', '1503489156', '核保成功', '已付款');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='邀请码表';

-- ----------------------------
--  Records of `cdc_invitation_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_invitation_code` VALUES ('6', '6', '688888', '0', null, '0'), ('7', '7', '788888', '0', null, '0'), ('8', '8', '888888', '0', null, '0'), ('9', '9', '988888', '0', null, '0'), ('10', '10', '106666', '0', null, '0'), ('11', '11', '116666', '0', null, '0'), ('12', '12', '128888', '0', null, '0'), ('13', '13', '136666', '0', null, '0'), ('14', '14', '146666', '0', null, '0'), ('15', '15', '158888', '0', null, '0'), ('16', '16', '166666', '0', null, '0'), ('17', '17', '176666', '0', null, '0'), ('18', '18', '186666', '0', null, '0'), ('19', '19', '198888', '0', null, '0'), ('20', '20', '206666', '0', null, '0'), ('21', '21', '216666', '0', null, '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
--  Records of `cdc_member`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member` VALUES ('1', '13198580936', '10', null, '1', '1', '1503052892', '171.213.63.70', null, '1502955055', null, null, '1', '0', '1'), ('2', '13198580937', '10', null, '1', '1', '1502958116', '118.113.146.103', null, '1502955602', null, null, '1', '1', '1'), ('3', '13116161313', '7', null, '1', '2', '0', null, null, '1502955833', '1502955833', null, '1', '1', '1'), ('4', '13812345678', '10', null, '1', '1', '0', null, null, '1502955963', '1502955963', null, '1', '1', '1'), ('5', '15570378762', '9', null, '1', '1', '1502956261', '171.213.63.70', null, '1502956013', '1502956013', null, '1', '1', '1'), ('6', '13161672102', '8', null, '1', '2', '1503495315', '110.184.151.232', null, '1503100197', null, null, '1', '1', '1'), ('7', '13161672103', '16', null, '1', '0', '1503453077', '171.217.59.89', null, '1503453077', null, null, '1', '1', '1'), ('8', '18782272460', '20', null, '1', '1', '1503479990', '171.217.59.89', null, '1503479964', '1503479964', null, '1', '1', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='邀请码消耗表';

-- ----------------------------
--  Records of `cdc_member_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member_code` VALUES ('1', '1', '10', '1502955055', '0'), ('2', '2', '10', '1502955602', '0'), ('3', '6', '8', '1503100197', '0'), ('4', '7', '16', '1503453077', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户图片表';

-- ----------------------------
--  Records of `cdc_member_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member_img` VALUES ('1', '1', '/upload/photo_imgs/2017-08-18/faac4187f88347c3fe5c44a32346aaf442986a86.jpeg', '0', '1503027076'), ('2', '5', '/upload/photo_imgs/2017-08-18/38ea9265e96a4195aab690b7fe61f54d553b8162.jpeg', '0', '1503045245'), ('3', '6', '/upload/photo/cb3db8671cd0a7012734630c0a6d6fb61d54e74c.jpeg', '0', '1503403555');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

-- ----------------------------
--  Records of `cdc_message_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_message_code` VALUES ('1', '18040492737', '3154', '0', '1503127769', '0'), ('2', '18040492737', '8399', '0', '1503127939', '0'), ('3', '18040492737', '3184', '0', '1503127995', '0'), ('4', '18040492737', '2449', '0', '1503128813', '0'), ('5', '18040492737', '5418', '0', '1503128841', '0'), ('6', '18040492737', '9094', '0', '1503128876', '0'), ('7', '18040492737', '3215', '0', '1503128891', '0'), ('8', '18040492737', '1253', '0', '1503128911', '0'), ('9', '18040492737', '2635', '0', '1503128986', '0'), ('10', '18030492737', '6043', '0', '1503129028', '0'), ('11', '18030492737', '3928', '0', '1503130946', '0'), ('12', '13161672102', '2603', '0', '1503135264', '0'), ('13', '13161672102', '9003', '0', '1503384036', '0'), ('14', '13161672102', '7504', '0', '1503488696', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='服务端消息通知表';

-- ----------------------------
--  Records of `cdc_notice`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_notice` VALUES ('1', 'user', '9', '您的会员【】创建了一个【汽车维修】订单，订单号：【A817563881323769】', '1502956388', '0', null), ('2', 'member', '5', '您的【汽车维修】订单： 【A817563881323769】，已取消', '1502956399', '0', null), ('3', 'user', '9', '您的会员【】的【汽车维修】订单： 【A817563881323769】，已取消', '1502956399', '0', null), ('4', 'user', '9', '您的会员【】创建了一个【汽车保养】订单，订单号：【A817565635566703】', '1502956563', '0', null), ('5', 'member', '2', '您的管家【hj】为您创建了一个【汽车维修】订单，订单号：【A817580725673887】', '1502958072', '0', null), ('6', 'member', '2', '您的【汽车维修】订单： 【A817580725673887】，已取消', '1502958852', '0', null), ('7', 'user', '10', '您的会员【奥巴马】的【汽车维修】订单： 【A817580725673887】，已取消', '1502958853', '0', null), ('8', 'member', '2', '您的管家【hj】为您创建了一个【汽车救援】订单，订单号：【A817591489994699】', '1502959149', '0', null), ('9', 'member', '2', '您的订单： 【A817591489994699】，商家已确认接单', '1502959242', '0', null), ('10', 'user', '10', '您的会员【奥巴马】的订单【A817591489994699】，商家已确认接单', '1502959242', '0', null), ('11', 'member', '5', '您的管家【dfds】为您创建了一个【汽车保养】订单，订单号：【A817592942257389】', '1502959294', '0', null), ('12', 'member', '5', '您的管家【dfds】为您创建了一个【汽车救援】订单，订单号：【A817599842650145】', '1502959984', '0', null), ('13', 'member', '2', '您的管家【hj】为您创建了一个【汽车维修】订单，订单号：【A817612380352068】', '1502961238', '0', null), ('14', 'user', '10', '您的会员【奥巴马】创建了一个【汽车救援】订单，订单号：【A818282622382892】', '1503028262', '0', null), ('15', 'member', '1', '您的管家【hj】创建了一个【 保险 】订单，订单号：【A818373310230486】', '1503037331', '0', null), ('16', 'member', '1', '您的订单： 【A818282622382892】，商家已确认接单', '1503037385', '0', null), ('17', 'user', '10', '您的会员【奥巴马】的订单【A818282622382892】，商家已确认接单', '1503037385', '0', null), ('18', 'member', '1', '您的管家【hj】创建了一个【 保险 】订单，订单号：【A818391320728290】', '1503039132', '0', null), ('19', 'member', '1', '您的保险订单：【A818391320728290】，已核保成功，请及时确认购买', '1503039398', '0', null), ('20', 'user', '10', '您的会员【奥巴马】的保险订单【A818391320728290】，已核保成功，请及时确认购买', '1503039398', '0', null), ('21', 'member', '1', '您的管家【hj】创建了一个【 保险 】订单，订单号：【A818423533375709】', '1503042353', '0', null), ('22', 'user', '10', '您的会员【奥巴马】创建了一个【 保险 】订单，订单号：【A818425182222080】', '1503042518', '0', null), ('23', 'user', '8', '您成功邀请一位新会员，手机号：【13161672102】', '1503100197', '0', null), ('24', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车救援】订单，订单号：【A822095745757704】', '1503409574', '0', null), ('25', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车救援】订单，订单号：【A822099807991476】', '1503409981', '0', null), ('26', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车救援】订单，订单号：【A822106214819797】', '1503410621', '0', null), ('27', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车救援】订单，订单号：【A822110869911431】', '1503411087', '0', null), ('28', 'user', '16', '您成功邀请一位新会员，手机号：【13161672103】', '1503453077', '0', null), ('29', 'user', '16', '您的会员【】创建了一个【汽车救援】订单，订单号：【A823531761281200】', '1503453176', '0', null), ('30', 'member', '7', '您的订单： 【A823531761281200】，商家已确认接单', '1503453225', '0', null), ('31', 'user', '16', '您的会员【】的订单【A823531761281200】，商家已确认接单', '1503453225', '0', null), ('32', 'member', '1', '您的保险订单：【A818423533375709】，已核保成功，请及时确认购买', '1503489102', '0', null), ('33', 'user', '10', '您的会员【奥巴马】的保险订单【A818423533375709】，已核保成功，请及时确认购买', '1503489103', '0', null), ('34', 'member', '1', '您的保险订单：【A818425182222080】，已核保成功，请及时确认购买', '1503489156', '0', null), ('35', 'user', '10', '您的会员【奥巴马】的保险订单【A818425182222080】，已核保成功，请及时确认购买', '1503489157', '0', null), ('36', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车维修】订单，订单号：【A823940078832144】', '1503494008', '0', null), ('37', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车保养】订单，订单号：【A823940527682539】', '1503494052', '0', null), ('38', 'user', '8', '您的会员【这是一个组织】创建了一个【汽车救援】订单，订单号：【A823940684126107】', '1503494068', '0', null), ('39', 'member', '6', '您的订单： 【A823940684126107】，商家已确认接单', '1503496111', '0', null), ('40', 'user', '10', '您的会员【这是一个组织】的订单【A823940684126107】，商家已确认接单', '1503496112', '0', null), ('41', 'member', '6', '您的【汽车救援】订单： 【A823940684126107】，已取消', '1503496149', '0', null), ('42', 'user', '8', '您的会员【这是一个组织】的【汽车救援】订单： 【A823940684126107】，已取消', '1503496149', '0', null);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='订单快照表';

-- ----------------------------
--  Records of `cdc_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order` VALUES ('1', 'A817563881323769', '2', '咯莫', '15570378762', '陕AN3422', '1', '2017-8-17 15:51', '成都双流国际机场', '1', '画画', '0.00', '1502956388', '0'), ('2', 'A817565635566703', '3', '屠龙记', '15570378762', '陕AN3422', '0', '2017-8-17 15:55', '定位中，请稍后...', '0', 'dddddd', '0.00', '1502956563', '0'), ('3', 'A817580725673887', '2', '奥巴马', '13198580937', '川AA780D', '1', '2017-8-17 16:21', '环球中心-S1', '0', '服务商3', '0.00', '1502958072', '0'), ('4', 'A817591489994699', '1', '奥巴马', '13198580937', '川AA780D', '1', '2017-8-17 16:39', '兴业银行(环球中心支行)', '0', '服务商3', '666.00', '1502959149', '0'), ('5', 'A817592942257389', '3', '看见了咯', '15570378762', '陕AN3433', '0', '2017-8-17 16:41', '定位中，请稍后...', '1', '画画', '0.00', '1502959294', '0'), ('6', 'A817599842650145', '1', '了同', '15570378762', '陕AN3433', '1', '2017-8-17 16:51', '成都武侯祠博物馆', '1', '画画', '0.00', '1502959984', '0'), ('7', 'A817612380352068', '2', '奥巴马', '13198580937', '川AA780D', '1', '2017-8-17 4:0', '成都市民宗局', '1', '画画', '0.00', '1502961238', '0'), ('8', 'A818282622382892', '1', '奥巴马', '13198580936', '川AA780D', '1', '2017-8-18 11:50', '环球中心-S1', '0', '服务商3', '0.00', '1503028262', '0'), ('9', 'A822095745757704', '1', '这是一', '13161672102', '陕AN3464', '1', '2017-8-22 21:45', '兴业银行(环球中心支行)', '1', '宇宙银河战舰4S', '0.00', '1503409574', '0'), ('10', 'A822099807991476', '1', '这是', '13161672102', '陕AN3464', '1', '2017-8-22 21:52', '兴业银行(环球中心支行)', '1', '宇宙银河战舰4S', '0.00', '1503409980', '0'), ('11', 'A822106214819797', '1', '这是', '13161672102', '陕AN3464', '1', '2017-8-22 22:3', '兴业银行(环球中心支行)', '1', '宇宙银河战舰4S', '0.00', '1503410621', '0'), ('12', 'A822110869911431', '1', '这是', '13161672102', '陕AN3464', '1', '2017-8-22 22:11', '兴业银行(环球中心支行)', '1', '宇宙银河战舰4S', '0.00', '1503411086', '0'), ('13', 'A823531761281200', '1', 'jcj', '13161672103', '陕AN3457', '1', '2017-8-23 9:51', '兴业银行(环球中心支行)', '1', '宇宙银河战舰4S', '0.00', '1503453176', '0'), ('14', 'A823940078832144', '2', '这是一', '13161672102', '陕AN3464', '1', '2017-8-23 21:13', '环球中心w6区', '1', '宇宙银河战舰4S', '0.00', '1503494007', '0'), ('15', 'A823940527682539', '3', '这是一', '13161672102', '陕AN3464', '1', '2017-8-23 21:13', '环球中心w6区', '1', '宇宙银河战舰4S', '0.00', '1503494052', '0'), ('16', 'A823940684126107', '1', '这是一', '13161672102', '陕AN3464', '1', '2017-8-23 21:14', '环球中心w6区', '0', '服务商3', '0.00', '1503494068', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='订单详情表';

-- ----------------------------
--  Records of `cdc_order_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order_detail` VALUES ('1', '1', '2', '5', '5', '已完成', '1502956388', '0'), ('2', '2', '2', '5', '3', '待接单', '1502956563', '0'), ('3', '3', '1', '2', '4', '已取消', '1502958072', '0'), ('4', '4', '1', '2', '4', '已评估', '1502959149', '0'), ('5', '5', '3', '5', '5', '待接单', '1502959294', '0'), ('6', '6', '3', '5', '5', '待接单', '1502959984', '0'), ('7', '7', '1', '2', '5', '待接单', '1502961238', '0'), ('8', '8', '6', '1', '4', '已接单', '1503028262', '0'), ('9', '9', '7', '6', '6', '待接单', '1503409574', '0'), ('10', '10', '7', '6', '6', '待接单', '1503409980', '0'), ('11', '11', '7', '6', '6', '待接单', '1503410621', '0'), ('12', '12', '7', '6', '6', '待接单', '1503411086', '0'), ('13', '13', '8', '7', '6', '已接单', '1503453176', '0'), ('14', '14', '7', '6', '6', '待接单', '1503494007', '0'), ('15', '15', '7', '6', '6', '待接单', '1503494052', '0'), ('16', '16', '7', '6', '4', '已取消', '1503494068', '0');
COMMIT;

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_service`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service` VALUES ('1', '服务商名称', '服务商负责人', '13812345789', '<p style=\"margin-left: 20px;\">服务商简介</p>', '成都市温江区从成都五方义和科技有限公司', '30.693941', '103.862806', '1', '1', '9', '18', '1502847774', '1502847774', null, '0', '1', null, '1', '1', '2', 's123123'), ('2', '服务商名称', '服务商负责人', '13812345789', '<p style=\"margin-left: 20px;\">服务商简介</p>', '成都市温江区从成都五方义和科技有限公司', '30.693941', '103.862806', '1', '0', '9', '18', '1502847783', '1502847783', null, '0', '1', null, '1', '1', '3', 's123123'), ('3', 'dddddd', 'dddddd', '', null, '', '0', '0', '0', '1', '9', '18', '1502948835', '1502948835', null, '0', '1', '13812345678', '2', '1', '5', 'dddddd'), ('4', '服务商3', '服务商3', '13812345789', '<p>asdsd</p>', '成都市武侯区dd故事', '30.635717', '104.063159', '1', '0', '9', '18', '1502954441', '1502954441', null, '1', '1', null, '1', '1', '6', 'ssssss'), ('5', '画画', '阿萨德', '7215677', '<p>分发给的风格大方</p>', '', '30.635028', '104.147737', '1', '1', '9', '18', '1502954784', '1502954784', null, '1', '1', null, '1', '1', '7', '试试123456'), ('6', '宇宙银河战舰4S', '宇宙之光', '01012345678', '<p>没错,这就是银河护卫队</p>', '成都市青羊区银河王朝大酒店', '30.665345', '104.077832', '1', '0', '9', '18', '1503043880', '1503043880', null, '1', '1', null, '1', '1', '8', 'dayuzhou'), ('7', '发给', '发货呢', '', null, '', '0', '0', '0', '1', '9', '18', '1503299627', '1503299627', null, '0', '1', '回复', '2', '1', '9', '666666'), ('8', '123123', '123', '123', '<p>123</p>', '成都市锦江区九九勇士野战营(真人cs)传化农业基地', '30.590448', '104.168443', '1', '0', '9', '18', '1503304526', '1503304526', null, '1', '1', null, '1', '1', '10', '测试服务商详情'), ('9', '123123', '123', '123123', '<p>123asd</p>', '成都市成华区space club', '30.667142', '104.100503', '1', '1', '9', '18', '1503391598', '1503391598', null, '1', '1', null, '1', '1', '11', 'ssss123'), ('10', '规范333', '姐姐333', '烦得很33333', '<p>和法国和</p>', '', '30.573554', '103.961044', '1', '1', '9', '18', '1503455486', '1503455486', null, '1', '1', null, '1', '1', '12', '123456789'), ('11', 'sad', '214', '', null, '', '0', '0', '0', '1', '9', '18', '1503457905', '1503457905', null, '0', '1', '34214 ', '2', '1', '13', '231123213');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='服务商图';

-- ----------------------------
--  Records of `cdc_service_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_img` VALUES ('1', '2', '15028477465993a302eeab30.51283811.jpg', '/upload/service/15028477465993a302eeab30.51283811.jpg', '955818', '1', '1', '/upload/service/15028477465993a302eeab30.51283811.jpg'), ('2', '2', '15028477535993a3090ed8d1.36753978.jpg', '/upload/service/15028477535993a3090ed8d1.36753978.jpg', '955818', '1', '0', '/upload/service/15028477535993a3090ed8d1.36753978.jpg'), ('3', null, '15028480405993a42818c6c3.94580185.jpg', '/upload/service/15028480405993a42818c6c3.94580185.jpg', '955818', '0', '1', '/upload/service/15028480405993a42818c6c3.94580185.jpg'), ('4', null, '15028480405993a42834b9b3.17092988.jpg', '/upload/service/15028480405993a42834b9b3.17092988.jpg', '955818', '0', '1', '/upload/service/15028480405993a42834b9b3.17092988.jpg'), ('5', null, '15028480535993a43547c0c4.03271193.jpg', '/upload/service/15028480535993a43547c0c4.03271193.jpg', '955818', '0', '1', '/upload/service/15028480535993a43547c0c4.03271193.jpg'), ('6', null, '2017-08-16-15-17-143364327.jpg', '/upload/service/thumb640x640angkeYPXL2017-08-16-15-17-143364327.jpg', '955818', '0', '0', '/upload/service/2017-08-16-15-17-143364327.jpg'), ('7', null, '93175752017-08-16-15-19-51.jpg', '/upload/service/thumb60x60angkeYPXL93175752017-08-16-15-19-51.jpg', '955818', '0', '1', '/upload/service/93175752017-08-16-15-19-51.jpg'), ('8', null, '21538492017-08-16-15-20-05.jpg', '/upload/service/thumb640x640angkeYPXL21538492017-08-16-15-20-05.jpg', '955818', '0', '0', '/upload/service/21538492017-08-16-15-20-05.jpg'), ('9', null, '25268012017-08-16-15-20-13.jpg', '/upload/service/thumb640x640angkeYPXL25268012017-08-16-15-20-13.jpg', '955818', '0', '0', '/upload/service/25268012017-08-16-15-20-13.jpg'), ('10', null, '150294882959952dddac7339.24768087.png', '/upload/agency/150294882959952dddac7339.24768087.png', '21213', '0', '0', '/upload/agency/150294882959952dddac7339.24768087.png'), ('11', '4', '50474032017-08-17-15-20-16.jpg', '/upload/service/thumb60x60angkeYPXL50474032017-08-17-15-20-16.jpg', '27974', '1', '1', '/upload/service/50474032017-08-17-15-20-16.jpg'), ('12', '4', '11543312017-08-17-15-20-24.jpg', '/upload/service/thumb640x640angkeYPXL11543312017-08-17-15-20-24.jpg', '27974', '1', '0', '/upload/service/11543312017-08-17-15-20-24.jpg'), ('13', '4', '44321902017-08-17-15-20-25.jpg', '/upload/service/thumb640x640angkeYPXL44321902017-08-17-15-20-25.jpg', '48615', '1', '0', '/upload/service/44321902017-08-17-15-20-25.jpg'), ('14', '5', '77877362017-08-17-15-25-37.png', '/upload/service/thumb60x60angkeYPXL77877362017-08-17-15-25-37.png', '405387', '1', '1', '/upload/service/77877362017-08-17-15-25-37.png'), ('15', '5', '58113762017-08-17-15-25-44.png', '/upload/service/thumb640x640angkeYPXL58113762017-08-17-15-25-44.png', '405387', '1', '0', '/upload/service/58113762017-08-17-15-25-44.png'), ('16', null, '88979142017-08-18-16-08-58.png', '/upload/service/thumb60x60angkeYPXL88979142017-08-18-16-08-58.png', '647933', '0', '1', '/upload/service/88979142017-08-18-16-08-58.png'), ('17', '6', '70771552017-08-18-16-10-21.jpg', '/upload/service/thumb60x60angkeYPXL70771552017-08-18-16-10-21.jpg', '4471', '1', '1', '/upload/service/70771552017-08-18-16-10-21.jpg'), ('18', '6', '89536302017-08-18-16-10-35.jpg', '/upload/service/thumb640x640angkeYPXL89536302017-08-18-16-10-35.jpg', '4471', '1', '0', '/upload/service/89536302017-08-18-16-10-35.jpg'), ('19', null, '50965402017-08-21-15-09-10.png', '/upload/service/thumb60x60angkeYPXL50965402017-08-21-15-09-10.png', '405387', '0', '1', '/upload/service/50965402017-08-21-15-09-10.png'), ('20', null, '34259572017-08-21-15-09-21.png', '/upload/service/thumb640x640angkeYPXL34259572017-08-21-15-09-21.png', '405387', '0', '0', '/upload/service/34259572017-08-21-15-09-21.png'), ('21', null, '43306112017-08-21-15-09-38.png', '/upload/service/thumb640x640angkeYPXL43306112017-08-21-15-09-38.png', '405387', '0', '0', '/upload/service/43306112017-08-21-15-09-38.png'), ('22', null, '36130512017-08-21-15-09-50.png', '/upload/service/thumb640x640angkeYPXL36130512017-08-21-15-09-50.png', '405387', '0', '0', '/upload/service/36130512017-08-21-15-09-50.png'), ('23', null, '72655152017-08-21-15-10-02.png', '/upload/service/thumb640x640angkeYPXL72655152017-08-21-15-10-02.png', '405387', '0', '0', '/upload/service/72655152017-08-21-15-10-02.png'), ('24', '7', '65282842017-08-21-15-13-41.png', '/upload/agency/thumb300x200angkeYPXL65282842017-08-21-15-13-41.png', '405387', '1', '0', '/upload/agency/65282842017-08-21-15-13-41.png'), ('25', null, '96449802017-08-21-15-14-48.png', '/upload/agency/thumb300x200angkeYPXL96449802017-08-21-15-14-48.png', '405387', '0', '0', '/upload/agency/96449802017-08-21-15-14-48.png'), ('26', '8', '91159352017-08-21-16-35-10.png', '/upload/service/thumb60x60angkeYPXL91159352017-08-21-16-35-10.png', '463655', '1', '1', '/upload/service/91159352017-08-21-16-35-10.png'), ('27', '8', '41064322017-08-21-16-35-16.png', '/upload/service/thumb640x640angkeYPXL41064322017-08-21-16-35-16.png', '647933', '1', '0', '/upload/service/41064322017-08-21-16-35-16.png'), ('28', null, '95062852017-08-22-10-51-10.jpg', '/upload/service/thumb60x60angkeYPXL95062852017-08-22-10-51-10.jpg', '335337', '0', '1', '/upload/service/95062852017-08-22-10-51-10.jpg'), ('29', '9', '32849232017-08-22-16-46-13.png', '/upload/service/thumb60x60angkeYPXL32849232017-08-22-16-46-13.png', '100998', '1', '1', '/upload/service/32849232017-08-22-16-46-13.png'), ('30', '9', '77967412017-08-22-16-46-15.png', '/upload/service/thumb640x640angkeYPXL77967412017-08-22-16-46-15.png', '1744853', '1', '0', '/upload/service/77967412017-08-22-16-46-15.png'), ('31', '10', '14863912017-08-23-10-30-54.png', '/upload/service/thumb60x60angkeYPXL14863912017-08-23-10-30-54.png', '450084', '1', '1', '/upload/service/14863912017-08-23-10-30-54.png'), ('32', '10', '52094152017-08-23-10-31-00.png', '/upload/service/thumb640x640angkeYPXL52094152017-08-23-10-31-00.png', '405387', '1', '0', '/upload/service/52094152017-08-23-10-31-00.png'), ('33', '11', '68129802017-08-23-11-11-35.png', '/upload/agency/thumb300x200angkeYPXL68129802017-08-23-11-11-35.png', '450084', '1', '0', '/upload/agency/68129802017-08-23-11-11-35.png'), ('34', null, '14496632017-08-23-15-34-38.png', '/upload/service/thumb60x60angkeYPXL14496632017-08-23-15-34-38.png', '405387', '0', '1', '/upload/service/14496632017-08-23-15-34-38.png'), ('35', null, '94910482017-08-23-15-35-13.png', '/upload/service/thumb60x60angkeYPXL94910482017-08-23-15-35-13.png', '405387', '0', '1', '/upload/service/94910482017-08-23-15-35-13.png'), ('36', null, '55343132017-08-23-15-36-53.png', '/upload/service/thumb60x60angkeYPXL55343132017-08-23-15-36-53.png', '405387', '0', '1', '/upload/service/55343132017-08-23-15-36-53.png'), ('37', null, '91020992017-08-23-15-36-55.png', '/upload/service/thumb60x60angkeYPXL91020992017-08-23-15-36-55.png', '405387', '0', '1', '/upload/service/91020992017-08-23-15-36-55.png'), ('38', null, '83019192017-08-23-15-37-00.png', '/upload/service/thumb60x60angkeYPXL83019192017-08-23-15-37-00.png', '450084', '0', '1', '/upload/service/83019192017-08-23-15-37-00.png'), ('39', null, '43571862017-08-23-15-37-31.png', '/upload/service/thumb60x60angkeYPXL43571862017-08-23-15-37-31.png', '405387', '0', '1', '/upload/service/43571862017-08-23-15-37-31.png'), ('40', null, '41156032017-08-23-15-39-13.png', '/upload/service/thumb60x60angkeYPXL41156032017-08-23-15-39-13.png', '450084', '0', '1', '/upload/service/41156032017-08-23-15-39-13.png'), ('41', null, '25342372017-08-23-15-40-12.png', '/upload/service/thumb60x60angkeYPXL25342372017-08-23-15-40-12.png', '450084', '0', '1', '/upload/service/25342372017-08-23-15-40-12.png'), ('42', null, '78110302017-08-23-15-40-36.png', '/upload/service/thumb60x60angkeYPXL78110302017-08-23-15-40-36.png', '405387', '0', '1', '/upload/service/78110302017-08-23-15-40-36.png'), ('43', null, '54325372017-08-23-15-42-03.png', '/upload/service/thumb60x60angkeYPXL54325372017-08-23-15-42-03.png', '405387', '0', '1', '/upload/service/54325372017-08-23-15-42-03.png'), ('44', null, '11086002017-08-23-15-42-20.png', '/upload/service/thumb640x640angkeYPXL11086002017-08-23-15-42-20.png', '405387', '0', '0', '/upload/service/11086002017-08-23-15-42-20.png'), ('45', null, '98902692017-08-23-15-42-56.png', '/upload/service/thumb640x640angkeYPXL98902692017-08-23-15-42-56.png', '450084', '0', '0', '/upload/service/98902692017-08-23-15-42-56.png'), ('46', null, '18187612017-08-23-15-47-25.png', '/upload/service/thumb60x60angkeYPXL18187612017-08-23-15-47-25.png', '450084', '0', '1', '/upload/service/18187612017-08-23-15-47-25.png'), ('47', null, '68310482017-08-23-15-47-26.png', '/upload/service/thumb60x60angkeYPXL68310482017-08-23-15-47-26.png', '405387', '0', '1', '/upload/service/68310482017-08-23-15-47-26.png'), ('48', null, '99926142017-08-23-15-47-43.png', '/upload/service/thumb640x640angkeYPXL99926142017-08-23-15-47-43.png', '450084', '0', '0', '/upload/service/99926142017-08-23-15-47-43.png'), ('49', null, '29790642017-08-23-15-47-43.png', '/upload/service/thumb640x640angkeYPXL29790642017-08-23-15-47-43.png', '405387', '0', '0', '/upload/service/29790642017-08-23-15-47-43.png');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='服务商绑定标签(服务范畴)表';

-- ----------------------------
--  Records of `cdc_service_tag`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_tag` VALUES ('1', '4', '9', '1503391598', '0'), ('2', '1', '9', '1503391598', '0'), ('3', '2', '9', '1503391598', '0'), ('4', '1', '10', '1503455486', '0'), ('5', '2', '10', '1503455486', '0'), ('6', '3', '10', '1503455486', '0'), ('7', '4', '10', '1503455486', '0');
COMMIT;

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_service_user`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_user` VALUES ('1', '1', '2', '0'), ('2', '2', '3', '0'), ('3', '3', '5', '0'), ('4', '4', '6', '0'), ('5', '5', '7', '0'), ('6', '6', '8', '0'), ('7', '7', '9', '0'), ('8', '8', '10', '0'), ('9', '9', '11', '0'), ('10', '10', '12', '0'), ('11', '11', '13', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
--  Records of `cdc_tag`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_tag` VALUES ('1', '救援', '0', '0', '0'), ('2', '维修', '0', '0', '0'), ('3', '保养', '0', '0', '0'), ('4', '保险', '0', '0', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='服务端用户表';

-- ----------------------------
--  Records of `cdc_user`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_user` VALUES ('6', 'xiaoqiang', '小强', '1', '13812345678', '$2y$13$4GXJtHshAkTwqcDvD5hSFe0mZjoMiSpvqx/lcsran6LHYI/PQjTCW', '1', '0', '0', null, null, '1502954339', '1502954339', null, '1', '1', '1'), ('7', 'yewuyuan', '算分', '3', '13308025470', '$2y$13$JxdoUsHWsSHu.uZwzNoYY.g.DVIsbEfcCrcqbLtoPT4eoCaflPrDS', '1', '0', '0', null, null, '1502954522', '1502954522', null, '1', '1', '1'), ('8', 'yyyyyy1', '高强', '4', '13812345678', '$2y$13$91NxEgMaOyILIr3KsVIpVOTc72SCl7Bh6pslj/8IkdNbhUUc46OQW', '1', '0', '1503403025', '110.184.151.232', null, '1502954728', '1502954728', null, '1', '1', '1'), ('9', 'yewuyuan1', '后空翻', '5', '15570378762', '$2y$13$X1rxsrVjyf5CS70MVh9o8uNjTUYvxEyCzUJevf8MLhcuF7SAHhsLO', '1', '0', '1502956085', '171.213.63.70', null, '1502954842', '1502954842', null, '1', '1', '1'), ('10', 'hhhhhh', 'hj', '4', '13198580936', '$2y$13$91NxEgMaOyILIr3KsVIpVOTc72SCl7Bh6pslj/8IkdNbhUUc46OQW', '1', '0', '1503486926', '110.184.151.232', null, '1502955035', '1502955035', null, '1', '1', '1'), ('11', '121212', '测试', '6', '13161672102', '$2y$13$cK1dhQ.vHKODMCy906KZkuDsdBshr76CjCf5PsfcwXNuM9cH2qEx2', '1', '0', '0', null, null, '1503286469', '1503286469', null, '1', '1', '1'), ('12', 'asdasdasd123', '123', '3', '13812345678', '$2y$13$E8SoBfbuEr98MJs6CxqW2eTWOW2dLeQZ6f99fn1gEWxEYdula0Ebq', '1', '0', '0', null, null, '1503372401', '1503372401', null, '1', '1', '1'), ('13', '1111111', '1111111', '8', '13161672102', '$2y$13$I7WwgTy2rq9ExD7.Ejet4ucFtyJTOuvX7EAxnuyI5jobDwOyi7d6y', '1', '0', '0', null, null, '1503390237', '1503390237', null, '1', '1', '1'), ('14', '111111112', '11111121', '1', '13161672105', '$2y$13$sZLnnhqUVjkatSiba5lv4eq0.ehuUvmn8alwGffnCnLoEJ2rJb7aK', '1', '0', '0', null, null, '1503390286', '1503390286', null, '1', '1', '1'), ('15', 'hahelah', 'hahelah', '1', '13161672104', '$2y$13$Xn9QMxxlNLLs.vSwz1tyg.bbE6lkemqJoagOvRte5maZuiKc3rLZu', '1', '0', '0', null, null, '1503390518', '1503390518', null, '1', '1', '1'), ('16', 'zzzzzz', '古月三水工', '6', '13112122121', '$2y$13$1Mxcu/7Dbe7QBKCmONtL2ecpsF93xUnBrKaHdD1HzQ4hSehzvkC5C', '1', '0', '1503484979', '110.184.151.232', null, '1503452845', '1503452845', null, '1', '1', '1'), ('17', '123456789', '222', '1', '18782272460', '$2y$13$MrkpRAzZa7pY0STGu.dZ4.8H7T2iU4Ty5CEBUhkDaj6KBP3VplFYG', '1', '0', '0', null, null, '1503477715', '1503477715', null, '1', '1', '1'), ('18', 'xxxxxx', '吃吃吃吃', '6', '13115161819', '$2y$13$/oodfs3uQ/f7Rm.m6HOqZu/VnaMO8gg9Qu5dI9W9mycJ9bI2A3C7G', '1', '0', '0', null, null, '1503478008', '1503478008', null, '1', '1', '1'), ('19', '123456123', '沙发', '1', '13308025470', '$2y$13$rjDZ6duE1QYXQgN8go72ze.j.fLQxCmtpyhmfp764XYRrlAdXa/.e', '1', '0', '0', null, null, '1503478080', '1503478080', null, '1', '1', '1'), ('20', '456456456', '撒旦法', '5', '13308025470', '$2y$13$hWgMacUWN/G6t4K3mW3pj.xkgTXUAYk89GBzKd8rFYa6igfblRMvW', '0', '0', '0', null, null, '1503478176', '1503478176', null, '1', '1', '1'), ('21', '789789789', '沙发', '1', '15570378762', '$2y$13$IW4CupVRGMNvaskzuDw9CuYafn57pRziNOfpWN.7Q6JKNOekdjuXG', '1', '0', '0', null, null, '1503478228', '1503478228', null, '1', '1', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='服务端用户图片表';

-- ----------------------------
--  Records of `cdc_user_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_user_img` VALUES ('1', '16', '/upload/portrait/7b333e68e22b04302d16766812f395d2c958fa6c.jpeg', '0', '1503452996');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='保单表';

-- ----------------------------
--  Records of `cdc_warranty`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_warranty` VALUES ('1', '21', '1', '1', '1', '0', '0', '0', '1503037331', '0'), ('2', '30', '1', '2', '2', '1503629700', '0', '0', '1503039132', '0'), ('3', '31', '1', '3', '3', '1503460800', '1503460800', '0', '1503042353', '0'), ('4', '32', '1', '4', '4', '0', '0', '0', '1503042518', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
