/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : cloud_car

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-13 23:04:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cdc_act_detail
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
-- Records of cdc_act_detail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_act_img
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
-- Records of cdc_act_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_act_insurance
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
-- Records of cdc_act_insurance
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_adminuser
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='平台账号表';

-- ----------------------------
-- Records of cdc_adminuser
-- ----------------------------
INSERT INTO `cdc_adminuser` VALUES ('1', 'ypxl', '', '$2y$13$pqJnJ1.g6hcvuTUTf0E27.vpjV6ISqL9Mlfq2BHADltJ6PbDEu4VK', '', '10', '0', '0', '啊啊啊', '1', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('2', 'k123123', null, '$2y$13$cl1EtNGRoDE6ilxCnq1HzusNkikS60OE3ffoW2mBK85FpHwQJoLTy', null, '10', '0', '0', '客户经理-小强', '1', '0', null);
INSERT INTO `cdc_adminuser` VALUES ('3', 'd00001', null, '$2y$13$oUSEHB0vuSNvmAqo1miGue.A9/owDmCn2T3QBacKklDwE0TWTfjsC', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('4', 'werrgreg', null, '$2y$13$ElGHFh1avKavBRZa.LqCVup00ybpFPmatKr8b61Oh4bAUsrZiOr8W', null, '10', '0', '0', '我了个区域', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('5', 's123123', null, '$2y$13$cHfWFZfocCeLtomcO8aMUeMs4j61Qgzx5CDKr9IEsBl0Ih3jmz8K2', null, '10', '0', '0', '我睡得晚', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('6', 's1231231', null, '$2y$13$7oYuEKVm3aC5mLltFZej9uL.kMQcyPZFUL7k5v.oWc3FvhiWlX7T6', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('7', 's1231235', null, '$2y$13$oy8DoiDcCrVWShJG.tiOfO.77Qwf2FrIY6D8xFXk.HL.XLpCdUEai', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('8', 's1231234', null, '$2y$13$XAsL0W3CCUqkznbEZ4ey2uAaWXiQwK0NCH.Br4mWLqclvssRkFYJy', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('9', 's12312345', null, '$2y$13$0sao.R922rVrIgvdoC1yhuvHPOoghGMWj5yjOp9Y7ClLi9rMJwTZ2', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('10', 's12312315', null, '$2y$13$eKPnyAJ6GSatx2X5V2v2EeAaSO7udPT.JxdHNaGpev2RcENgZ7cIu', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('11', 's123123155', null, '$2y$13$1vb5bwuGefrcoPGR8UUlHu/6BpXTA8l9jaB54Lm9hhu1C/kS78nCa', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('14', 's1231231554', null, '$2y$13$KgIgqxviGSCB/52nhiQGL.AOoqVd2fKbrUrTY5WHJR/ODqSC4AjU2', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('15', 'd123123', null, '$2y$13$gU07j0Amj.BN/4sKOs8NDOnFp6aa3wzJRdR9UZT886jc6I84OggFm', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('16', 'ssss123', null, '$2y$13$7SJI3HWb2JZsaMFoNnqu.Oks7kPjzxV7vMAl7Iiqg5eemLHGP/5de', null, '10', '0', '0', '', '2', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('24', 'd123123123', null, '$2y$13$DEEoz9fIcWRfNFDtJZ9mG./hfHQx0fwgxgK4F0yOW743xfQgJTMx.', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('25', 'dd1231', null, '$2y$13$n0BVGTVodZ77iep5hi6pA.HwThTqf2dyWQcdJd6SNHBGueNQo4tfG', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('26', 'dd123123', null, '$2y$13$6HnXFqlRKpuwOzYhi02cY.FJd..u.S/.cxMoTHaJ16Uy0.dQ.9zdm', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('28', 'ddd123', null, '$2y$13$FmOY8C89XHDth9LUhCO5G.tiUty4xRw/ojt0hArFV/OhUQfxMukLK', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('29', 'ddd1234', null, '$2y$13$AorezK3UsAtDtsyMYuLa1exLq7mKdAnAITvk6v9I7LQ4XOTTPV.l6', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('30', 'dddddd', null, '$2y$13$JcYJhIPwoBF7ffL3WXNu.eVJDkDDJqPLZ5RMBMjQhEdFq5oKIOn/y', null, '10', '0', '0', '', '3', '1', null);
INSERT INTO `cdc_adminuser` VALUES ('31', 'dddd1234', null, '$2y$13$19H7.iiYGnThKTMKZon/x.eQi3k6NNCGPrJPYnjBhNU4Uwgjg2fQ6', null, '10', '0', '0', '哈哈哈', '3', '0', null);

-- ----------------------------
-- Table structure for cdc_adminuser_img
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
-- Records of cdc_adminuser_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_adminuser_tag
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
-- Records of cdc_adminuser_tag
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_app_menu
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
-- Records of cdc_app_menu
-- ----------------------------
INSERT INTO `cdc_app_menu` VALUES ('1', '首页', null, 'home');
INSERT INTO `cdc_app_menu` VALUES ('2', '待处理订单', '1', 'wait_order');
INSERT INTO `cdc_app_menu` VALUES ('3', '救援订单', '2', 'rescue_order');
INSERT INTO `cdc_app_menu` VALUES ('4', '维修订单', '2', 'fix_order');
INSERT INTO `cdc_app_menu` VALUES ('5', '保养订单', '2', 'upkeep_order');
INSERT INTO `cdc_app_menu` VALUES ('6', '审车订单', '2', 'review_order');
INSERT INTO `cdc_app_menu` VALUES ('7', '我的会员', '1', 'my_member');
INSERT INTO `cdc_app_menu` VALUES ('8', '快速入口', '7', 'quick');
INSERT INTO `cdc_app_menu` VALUES ('9', '保险', '8', 'member_insurance_order');
INSERT INTO `cdc_app_menu` VALUES ('10', '救援', '8', 'member_rescue_order');
INSERT INTO `cdc_app_menu` VALUES ('11', '维修', '8', 'member_fix_order');
INSERT INTO `cdc_app_menu` VALUES ('12', '保养', '8', 'member_upkeep_order');
INSERT INTO `cdc_app_menu` VALUES ('13', '审车', '8', 'member_review_order');
INSERT INTO `cdc_app_menu` VALUES ('14', '工作', null, 'work');
INSERT INTO `cdc_app_menu` VALUES ('15', '我的客户', '14', 'work_my_member');
INSERT INTO `cdc_app_menu` VALUES ('16', '客户订单', '14', 'member_order');
INSERT INTO `cdc_app_menu` VALUES ('17', '保单管理', '14', 'insurance_order_handle');
INSERT INTO `cdc_app_menu` VALUES ('18', '订单处理', '14', 'order_handle');
INSERT INTO `cdc_app_menu` VALUES ('19', '我的', null, 'my');
INSERT INTO `cdc_app_menu` VALUES ('20', '我的组织', '19', 'my_group');
INSERT INTO `cdc_app_menu` VALUES ('21', '个人中心', '19', 'other');
INSERT INTO `cdc_app_menu` VALUES ('22', '我的邀请码', '21', 'my_share_code');
INSERT INTO `cdc_app_menu` VALUES ('23', '消息通知', '21', 'notice');
INSERT INTO `cdc_app_menu` VALUES ('24', '联系我们', '21', 'contact_us');
INSERT INTO `cdc_app_menu` VALUES ('25', '设置', '21', 'setting');
INSERT INTO `cdc_app_menu` VALUES ('26', '营业状态开关', '19', 'my_group_switch');

-- ----------------------------
-- Table structure for cdc_app_menu_without
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
-- Records of cdc_app_menu_without
-- ----------------------------
INSERT INTO `cdc_app_menu_without` VALUES ('1', '26', '1', '17');
INSERT INTO `cdc_app_menu_without` VALUES ('3', '26', '1', '11');
INSERT INTO `cdc_app_menu_without` VALUES ('5', '26', '1', '10');

-- ----------------------------
-- Table structure for cdc_app_role
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
-- Records of cdc_app_role
-- ----------------------------
INSERT INTO `cdc_app_role` VALUES ('1', '业务员', '操作员1', '26');
INSERT INTO `cdc_app_role` VALUES ('2', '操作员', null, '26');

-- ----------------------------
-- Table structure for cdc_app_role_assign
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
-- Records of cdc_app_role_assign
-- ----------------------------
INSERT INTO `cdc_app_role_assign` VALUES ('1', '10', '1');

-- ----------------------------
-- Table structure for cdc_article
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cdc_article
-- ----------------------------
INSERT INTO `cdc_article` VALUES ('1', '123', '213', '<p>erftrfewtret</p>', '1', '1', '123', '1502363128', '1502363128');

-- ----------------------------
-- Table structure for cdc_auth_assignment
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
-- Records of cdc_auth_assignment
-- ----------------------------
INSERT INTO `cdc_auth_assignment` VALUES ('_26_小丑二', '31', '1502615470');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '18', '1502502471');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '19', '1502502587');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '20', '1502502859');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '22', '1502503323');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '26', '1502503078');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '29', '1502503554');
INSERT INTO `cdc_auth_assignment` VALUES ('代理商', '30', '1502530676');
INSERT INTO `cdc_auth_assignment` VALUES ('客服啊', '2', '1502531072');
INSERT INTO `cdc_auth_assignment` VALUES ('服务商', '1', '1502500794');
INSERT INTO `cdc_auth_assignment` VALUES ('管理员', '1', '1502446690');

-- ----------------------------
-- Table structure for cdc_auth_item
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
-- Records of cdc_auth_item
-- ----------------------------
INSERT INTO `cdc_auth_item` VALUES ('_26_什么鬼', '1', null, null, null, '1502613342', '1502613342');
INSERT INTO `cdc_auth_item` VALUES ('_26_小丑二', '1', '哈哈', null, null, '1502613157', '1502614272');
INSERT INTO `cdc_auth_item` VALUES ('_asdsd ', '1', null, null, null, '1502521887', '1502521887');
INSERT INTO `cdc_auth_item` VALUES ('_啊啊所多', '1', null, null, null, '1502521787', '1502522319');
INSERT INTO `cdc_auth_item` VALUES ('_阿萨德', '1', null, null, null, '1502521932', '1502521932');
INSERT INTO `cdc_auth_item` VALUES ('/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/abs-route/get-all-agency', '2', null, null, null, '1502507431', '1502507431');
INSERT INTO `cdc_auth_item` VALUES ('/abs-route/get-all-member', '2', null, null, null, '1502507443', '1502507443');
INSERT INTO `cdc_auth_item` VALUES ('/abs-route/get-all-salesman', '2', null, null, null, '1502507437', '1502507437');
INSERT INTO `cdc_auth_item` VALUES ('/abs-route/get-all-service', '2', null, null, null, '1502507425', '1502507425');
INSERT INTO `cdc_auth_item` VALUES ('/abs-route/get-customer-manager', '2', null, null, null, '1502507407', '1502507407');
INSERT INTO `cdc_auth_item` VALUES ('/account/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/account/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/profile', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/agency/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/article/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/article/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/article/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/article/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/article/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/article/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/backend/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/banner/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/banner/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/banner/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/banner/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/banner/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/banner/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/car/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/car/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/car/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/car/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/car/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/car/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/column/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/column/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/column/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/column/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/column/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/column/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/driver/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/driver/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/driver/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/driver/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/driver/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/driver/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/identity/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/identity/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/identity/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/identity/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/identity/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/identity/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-company/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-company/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-company/delete', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-company/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-company/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-company/validate-form', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/archives', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/cancel', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/change', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/check-failed', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/check-success', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/cost', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/detail', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/info', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/insurance', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/log', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance-order/update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/create', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/delete', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/index', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/insurance-order', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/set-status', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/update', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/insurance/validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/media/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/media/image-delete', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/media/image-upload', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/info', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/modify-salesman', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/real', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/set-status', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/soft-delete', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/test', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/member/view', '2', null, null, null, '1502444582', '1502444582');
INSERT INTO `cdc_auth_item` VALUES ('/message/create', '2', null, null, null, '1502450071', '1502450071');
INSERT INTO `cdc_auth_item` VALUES ('/message/delete', '2', null, null, null, '1502450071', '1502450071');
INSERT INTO `cdc_auth_item` VALUES ('/message/index', '2', null, null, null, '1502450071', '1502450071');
INSERT INTO `cdc_auth_item` VALUES ('/message/view', '2', null, null, null, '1502450071', '1502450071');
INSERT INTO `cdc_auth_item` VALUES ('/notice/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/notice/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/log', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/modify-status', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/order/wall', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/panel/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/panel/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/panel/wait-check-insurance-order', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/panel/wait-check-insurance-order-success', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/panel/wait-check-order', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/panel/wait-check-state', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/account-create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/account-index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/account-modify-role', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/account-update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/account-validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/get-menu', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/menu-assign', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/modify-platform-password', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/role-assign', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/role-create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/role-delete', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/role-index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/role-update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/set-menu', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/rbac/validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/redactor/*', '2', null, null, null, '1502443055', '1502443055');
INSERT INTO `cdc_auth_item` VALUES ('/redactor/upload-file', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/redactor/upload-img', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/redactor/upload-img-json', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/drop-down-list', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/set-status', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/soft-delete', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/salesman/view', '2', null, null, null, '1502444554', '1502444554');
INSERT INTO `cdc_auth_item` VALUES ('/service/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/create', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/delete', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/profile', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/validate-form', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/service/view', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/error', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/init-menu', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/login', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/logout', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/push-all-message', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/push-all-message1', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/site/test', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/system/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/system/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/warranty/*', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/warranty/detail', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/warranty/edit', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/warranty/index', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('/warranty/update', '2', null, null, null, '1502443056', '1502443056');
INSERT INTO `cdc_auth_item` VALUES ('业务员列表', '2', null, 'backend\\components\\SalesmanRule', null, '1502444344', '1502504096');
INSERT INTO `cdc_auth_item` VALUES ('业务员列表 - 获取所有业务员', '2', null, null, null, '1502507554', '1502507554');
INSERT INTO `cdc_auth_item` VALUES ('业务员添加', '2', null, null, null, '1502444373', '1502444373');
INSERT INTO `cdc_auth_item` VALUES ('业务员编辑', '2', null, null, null, '1502444390', '1502444390');
INSERT INTO `cdc_auth_item` VALUES ('业务员详情', '2', null, null, null, '1502444420', '1502444420');
INSERT INTO `cdc_auth_item` VALUES ('代理商', '1', null, null, null, '1502502422', '1502502422');
INSERT INTO `cdc_auth_item` VALUES ('代理商列表', '2', null, null, null, '1502444321', '1502444321');
INSERT INTO `cdc_auth_item` VALUES ('代理商列表 - 获取所有代理商权限', '2', null, null, null, '1502507532', '1502507532');
INSERT INTO `cdc_auth_item` VALUES ('代理商详情', '2', null, null, null, '1502444233', '1502444233');
INSERT INTO `cdc_auth_item` VALUES ('代理商账号信息', '2', null, null, null, '1502444133', '1502444133');
INSERT INTO `cdc_auth_item` VALUES ('会员列表 - 获取所有会员', '2', null, null, null, '1502507583', '1502507583');
INSERT INTO `cdc_auth_item` VALUES ('会员实名信息查看', '2', null, null, null, '1502444718', '1502444718');
INSERT INTO `cdc_auth_item` VALUES ('会员添加', '2', null, null, null, '1502444634', '1502444634');
INSERT INTO `cdc_auth_item` VALUES ('会员编辑', '2', null, null, null, '1502444659', '1502444659');
INSERT INTO `cdc_auth_item` VALUES ('会员详情', '2', null, null, null, '1502444692', '1502444692');
INSERT INTO `cdc_auth_item` VALUES ('保单列表', '2', null, null, null, '1502449862', '1502449862');
INSERT INTO `cdc_auth_item` VALUES ('保险商列表', '2', null, null, null, '1502450176', '1502450176');
INSERT INTO `cdc_auth_item` VALUES ('保险订单列表', '2', null, null, null, '1502449773', '1502449773');
INSERT INTO `cdc_auth_item` VALUES ('删除保险商', '2', null, null, null, '1502450244', '1502450244');
INSERT INTO `cdc_auth_item` VALUES ('删除通知', '2', null, null, null, '1502450143', '1502450143');
INSERT INTO `cdc_auth_item` VALUES ('删除险种', '2', null, null, null, '1502450309', '1502450309');
INSERT INTO `cdc_auth_item` VALUES ('发送通知', '2', null, null, null, '1502450108', '1502450108');
INSERT INTO `cdc_auth_item` VALUES ('变更会员业务员', '2', null, null, null, '1502444798', '1502444798');
INSERT INTO `cdc_auth_item` VALUES ('客服啊', '1', '服务商', null, null, '1502520444', '1502613546');
INSERT INTO `cdc_auth_item` VALUES ('我的信息', '2', null, null, null, '1502450355', '1502450355');
INSERT INTO `cdc_auth_item` VALUES ('服务商', '1', null, null, null, '1502450663', '1502450663');
INSERT INTO `cdc_auth_item` VALUES ('服务商列表', '2', null, null, null, '1502444301', '1502444301');
INSERT INTO `cdc_auth_item` VALUES ('服务商列表 - 获取所有服务商权限', '2', null, null, null, '1502507511', '1502507511');
INSERT INTO `cdc_auth_item` VALUES ('服务商详情', '2', null, null, null, '1502444189', '1502444189');
INSERT INTO `cdc_auth_item` VALUES ('服务商账号信息', '2', null, null, null, '1502444104', '1502444104');
INSERT INTO `cdc_auth_item` VALUES ('权限分配', '2', null, null, null, '1502450466', '1502450466');
INSERT INTO `cdc_auth_item` VALUES ('权限管理', '2', null, null, null, '1502450407', '1502450407');
INSERT INTO `cdc_auth_item` VALUES ('查看业务员', '2', null, null, null, '1502444607', '1502444607');
INSERT INTO `cdc_auth_item` VALUES ('查看通知', '2', null, null, null, '1502450125', '1502450125');
INSERT INTO `cdc_auth_item` VALUES ('添加保险商', '2', null, null, null, '1502450194', '1502450194');
INSERT INTO `cdc_auth_item` VALUES ('添加服务商', '2', null, null, null, '1502443081', '1502443081');
INSERT INTO `cdc_auth_item` VALUES ('添加险种', '2', null, null, null, '1502450288', '1502450288');
INSERT INTO `cdc_auth_item` VALUES ('用户管理', '2', null, null, null, '1502450486', '1502450486');
INSERT INTO `cdc_auth_item` VALUES ('管理员', '1', null, null, null, '1502446663', '1502446663');
INSERT INTO `cdc_auth_item` VALUES ('系统设置', '2', null, null, null, '1502449877', '1502449877');
INSERT INTO `cdc_auth_item` VALUES ('编辑保险商', '2', null, null, null, '1502450211', '1502450211');
INSERT INTO `cdc_auth_item` VALUES ('编辑服务商', '2', null, null, null, '1502443998', '1502443998');
INSERT INTO `cdc_auth_item` VALUES ('获取客户经理权限', '2', null, null, null, '1502507474', '1502507474');
INSERT INTO `cdc_auth_item` VALUES ('菜单管理', '2', null, null, null, '1502450430', '1502450430');
INSERT INTO `cdc_auth_item` VALUES ('角色管理', '2', null, null, null, '1502450447', '1502450447');
INSERT INTO `cdc_auth_item` VALUES ('订单列表', '2', null, null, null, '1502449756', '1502449756');
INSERT INTO `cdc_auth_item` VALUES ('订单池查看', '2', null, null, null, '1502449736', '1502449736');
INSERT INTO `cdc_auth_item` VALUES ('路由管理', '2', null, null, null, '1502450391', '1502450391');
INSERT INTO `cdc_auth_item` VALUES ('身份证列表', '2', null, null, null, '1502449829', '1502449829');
INSERT INTO `cdc_auth_item` VALUES ('通知列表', '2', null, null, null, '1502450086', '1502450086');
INSERT INTO `cdc_auth_item` VALUES ('险种列表', '2', null, null, null, '1502450263', '1502450263');
INSERT INTO `cdc_auth_item` VALUES ('驾照列表', '2', null, null, null, '1502449812', '1502449812');

-- ----------------------------
-- Table structure for cdc_auth_item_child
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
-- Records of cdc_auth_item_child
-- ----------------------------
INSERT INTO `cdc_auth_item_child` VALUES ('代理商列表 - 获取所有代理商权限', '/abs-route/get-all-agency');
INSERT INTO `cdc_auth_item_child` VALUES ('会员列表 - 获取所有会员', '/abs-route/get-all-member');
INSERT INTO `cdc_auth_item_child` VALUES ('业务员列表 - 获取所有业务员', '/abs-route/get-all-salesman');
INSERT INTO `cdc_auth_item_child` VALUES ('服务商列表 - 获取所有服务商权限', '/abs-route/get-all-service');
INSERT INTO `cdc_auth_item_child` VALUES ('获取客户经理权限', '/abs-route/get-customer-manager');
INSERT INTO `cdc_auth_item_child` VALUES ('权限分配', '/admin/assignment/*');
INSERT INTO `cdc_auth_item_child` VALUES ('菜单管理', '/admin/menu/*');
INSERT INTO `cdc_auth_item_child` VALUES ('权限管理', '/admin/permission/*');
INSERT INTO `cdc_auth_item_child` VALUES ('角色管理', '/admin/role/*');
INSERT INTO `cdc_auth_item_child` VALUES ('路由管理', '/admin/route/*');
INSERT INTO `cdc_auth_item_child` VALUES ('用户管理', '/admin/user/*');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商列表', '/agency/index');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商账号信息', '/agency/profile');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商详情', '/agency/view');
INSERT INTO `cdc_auth_item_child` VALUES ('驾照列表', '/driver/index');
INSERT INTO `cdc_auth_item_child` VALUES ('身份证列表', '/identity/index');
INSERT INTO `cdc_auth_item_child` VALUES ('添加保险商', '/insurance-company/create');
INSERT INTO `cdc_auth_item_child` VALUES ('删除保险商', '/insurance-company/delete');
INSERT INTO `cdc_auth_item_child` VALUES ('保险商列表', '/insurance-company/index');
INSERT INTO `cdc_auth_item_child` VALUES ('编辑保险商', '/insurance-company/update');
INSERT INTO `cdc_auth_item_child` VALUES ('编辑保险商', '/insurance-company/validate-form');
INSERT INTO `cdc_auth_item_child` VALUES ('保险订单列表', '/insurance-order/index');
INSERT INTO `cdc_auth_item_child` VALUES ('添加险种', '/insurance/create');
INSERT INTO `cdc_auth_item_child` VALUES ('删除险种', '/insurance/delete');
INSERT INTO `cdc_auth_item_child` VALUES ('险种列表', '/insurance/index');
INSERT INTO `cdc_auth_item_child` VALUES ('会员添加', '/member/create');
INSERT INTO `cdc_auth_item_child` VALUES ('变更会员业务员', '/member/modify-salesman');
INSERT INTO `cdc_auth_item_child` VALUES ('会员实名信息查看', '/member/real');
INSERT INTO `cdc_auth_item_child` VALUES ('会员编辑', '/member/update');
INSERT INTO `cdc_auth_item_child` VALUES ('会员添加', '/member/validate-form');
INSERT INTO `cdc_auth_item_child` VALUES ('会员编辑', '/member/validate-form');
INSERT INTO `cdc_auth_item_child` VALUES ('会员详情', '/member/view');
INSERT INTO `cdc_auth_item_child` VALUES ('发送通知', '/message/create');
INSERT INTO `cdc_auth_item_child` VALUES ('删除通知', '/message/delete');
INSERT INTO `cdc_auth_item_child` VALUES ('通知列表', '/message/index');
INSERT INTO `cdc_auth_item_child` VALUES ('查看通知', '/message/view');
INSERT INTO `cdc_auth_item_child` VALUES ('订单列表', '/order/index');
INSERT INTO `cdc_auth_item_child` VALUES ('订单池查看', '/order/wall');
INSERT INTO `cdc_auth_item_child` VALUES ('添加服务商', '/redactor/upload-img');
INSERT INTO `cdc_auth_item_child` VALUES ('编辑服务商', '/redactor/upload-img');
INSERT INTO `cdc_auth_item_child` VALUES ('添加服务商', '/redactor/upload-img-json');
INSERT INTO `cdc_auth_item_child` VALUES ('编辑服务商', '/redactor/upload-img-json');
INSERT INTO `cdc_auth_item_child` VALUES ('业务员添加', '/salesman/create');
INSERT INTO `cdc_auth_item_child` VALUES ('业务员列表', '/salesman/index');
INSERT INTO `cdc_auth_item_child` VALUES ('业务员编辑', '/salesman/update');
INSERT INTO `cdc_auth_item_child` VALUES ('业务员编辑', '/salesman/validate-form');
INSERT INTO `cdc_auth_item_child` VALUES ('查看业务员', '/salesman/view');
INSERT INTO `cdc_auth_item_child` VALUES ('添加服务商', '/service/create');
INSERT INTO `cdc_auth_item_child` VALUES ('服务商列表', '/service/index');
INSERT INTO `cdc_auth_item_child` VALUES ('服务商账号信息', '/service/profile');
INSERT INTO `cdc_auth_item_child` VALUES ('编辑服务商', '/service/update');
INSERT INTO `cdc_auth_item_child` VALUES ('添加服务商', '/service/validate-form');
INSERT INTO `cdc_auth_item_child` VALUES ('编辑服务商', '/service/validate-form');
INSERT INTO `cdc_auth_item_child` VALUES ('服务商详情', '/service/view');
INSERT INTO `cdc_auth_item_child` VALUES ('系统设置', '/system/index');
INSERT INTO `cdc_auth_item_child` VALUES ('保单列表', '/warranty/index');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '业务员列表');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '业务员添加');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '业务员编辑');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '业务员详情');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '代理商列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '代理商列表 - 获取所有代理商权限');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '代理商详情');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '代理商账号信息');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '会员列表 - 获取所有会员');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '会员实名信息查看');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '会员添加');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '会员添加');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '会员编辑');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '会员编辑');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '会员详情');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '会员详情');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '保单列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '保险商列表');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '保险订单列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '保险订单列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '删除保险商');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '删除通知');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '删除险种');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '发送通知');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '发送通知');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '变更会员业务员');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '我的信息');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '服务商列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '服务商列表 - 获取所有服务商权限');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '服务商详情');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '服务商账号信息');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '权限分配');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '权限分配');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '权限管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '权限管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '查看业务员');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '查看通知');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '添加保险商');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '添加服务商');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '添加险种');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '用户管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '用户管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '系统设置');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '编辑保险商');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '编辑服务商');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '获取客户经理权限');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '菜单管理');
INSERT INTO `cdc_auth_item_child` VALUES ('代理商', '角色管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '角色管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '订单列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '订单池查看');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '路由管理');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '身份证列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '通知列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '险种列表');
INSERT INTO `cdc_auth_item_child` VALUES ('管理员', '驾照列表');

-- ----------------------------
-- Table structure for cdc_auth_rule
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
-- Records of cdc_auth_rule
-- ----------------------------
INSERT INTO `cdc_auth_rule` VALUES ('backend\\components\\SalesmanRule', 0x4F3A33313A226261636B656E645C636F6D706F6E656E74735C53616C65736D616E52756C65223A333A7B733A343A226E616D65223B733A33313A226261636B656E645C636F6D706F6E656E74735C53616C65736D616E52756C65223B733A393A22637265617465644174223B693A313530323530343039363B733A393A22757064617465644174223B693A313530323530343039363B7D, '1502504096', '1502504096');

-- ----------------------------
-- Table structure for cdc_banner
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
-- Records of cdc_banner
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_banner_img
-- ----------------------------
DROP TABLE IF EXISTS `cdc_banner_img`;
CREATE TABLE `cdc_banner_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL DEFAULT '0' COMMENT 'bannerID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='banner图片表';

-- ----------------------------
-- Records of cdc_banner_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_business_detail
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
-- Records of cdc_business_detail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_car
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
-- Records of cdc_car
-- ----------------------------
INSERT INTO `cdc_car` VALUES ('1', '1', '川A88888', '军火', '高晓强1', '军用', '宝马', '1231', '1234', '12', '20123', '123123', '0', '1', '1502349541', '1502349541');
INSERT INTO `cdc_car` VALUES ('2', '1', '川A88888', '军火', '高晓强', '军用', '宝马', '1231', '1234', '12', '20123', '123123', '0', '1', '1502349461', '1502349461');

-- ----------------------------
-- Table structure for cdc_car_img
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
-- Records of cdc_car_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_column
-- ----------------------------
DROP TABLE IF EXISTS `cdc_column`;
CREATE TABLE `cdc_column` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '栏目名',
  `description` varchar(255) DEFAULT '' COMMENT '栏目描述',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of cdc_column
-- ----------------------------
INSERT INTO `cdc_column` VALUES ('1', '12', '12', '1502363085', '1502363085');

-- ----------------------------
-- Table structure for cdc_compensatory_detail
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
-- Records of cdc_compensatory_detail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_driving_img
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
-- Records of cdc_driving_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_driving_license
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
-- Records of cdc_driving_license
-- ----------------------------
INSERT INTO `cdc_driving_license` VALUES ('1', '1', '高晓强', '男', '中国', '1123', '123', '123', 'c2', '123', '123', '1', '1502351096', '1502351096');

-- ----------------------------
-- Table structure for cdc_element
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
-- Records of cdc_element
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_identification
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
-- Records of cdc_identification
-- ----------------------------
INSERT INTO `cdc_identification` VALUES ('1', '1', '', '', '', '', '', '', '', '0', '0', '0');
INSERT INTO `cdc_identification` VALUES ('2', '2', '', '', '', '', '', '', '', '0', '0', '0');

-- ----------------------------
-- Table structure for cdc_identification_img
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
-- Records of cdc_identification_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_insurance
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
-- Records of cdc_insurance
-- ----------------------------
INSERT INTO `cdc_insurance` VALUES ('1', '234234234', '2', '3234', '0', '1502363217', '1502363217');

-- ----------------------------
-- Table structure for cdc_insurance_actimg
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
-- Records of cdc_insurance_actimg
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_insurance_company
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='保险公司表';

-- ----------------------------
-- Records of cdc_insurance_company
-- ----------------------------
INSERT INTO `cdc_insurance_company` VALUES ('1', 'u', '656', '1502363199', '0', '1');

-- ----------------------------
-- Table structure for cdc_insurance_detail
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
-- Records of cdc_insurance_detail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_insurance_element
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
-- Records of cdc_insurance_element
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_insurance_order
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
-- Records of cdc_insurance_order
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_invitation_code
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='邀请码表';

-- ----------------------------
-- Records of cdc_invitation_code
-- ----------------------------
INSERT INTO `cdc_invitation_code` VALUES ('1', '1', '000001', '0', null, '0');

-- ----------------------------
-- Table structure for cdc_mail
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
-- Records of cdc_mail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_member
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
-- Records of cdc_member
-- ----------------------------
INSERT INTO `cdc_member` VALUES ('1', '13812345678', '1', null, '1', '1', '0', null, null, '1502346965', '1502346965', null, '1', '1', '1');
INSERT INTO `cdc_member` VALUES ('2', '13131313131', '1', null, '1', '1', '0', null, null, '1502362890', '1502362890', null, '1', '1', '1');

-- ----------------------------
-- Table structure for cdc_member_code
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
-- Records of cdc_member_code
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_member_img
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
-- Records of cdc_member_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_member_tag
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
-- Records of cdc_member_tag
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_menu
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
-- Records of cdc_menu
-- ----------------------------
INSERT INTO `cdc_menu` VALUES ('1', '首页', null, '/site/index', null, null);
INSERT INTO `cdc_menu` VALUES ('2', '用户管理', null, null, null, null);
INSERT INTO `cdc_menu` VALUES ('3', '服务商', '2', '/service/index', null, null);
INSERT INTO `cdc_menu` VALUES ('4', '服务商', '2', '/service/index', null, null);
INSERT INTO `cdc_menu` VALUES ('5', '代理商', '2', '/agency/index', null, null);
INSERT INTO `cdc_menu` VALUES ('6', '业务员', '2', '/salesman/index', null, null);
INSERT INTO `cdc_menu` VALUES ('7', '会员', '2', '/member/index', null, null);
INSERT INTO `cdc_menu` VALUES ('8', '业务', null, null, null, null);
INSERT INTO `cdc_menu` VALUES ('9', '订单池', '8', '/order/wall', null, null);
INSERT INTO `cdc_menu` VALUES ('10', '订单列表', '8', '/order/index', null, null);
INSERT INTO `cdc_menu` VALUES ('11', '保险订单', '8', '/insurance-order/index', null, null);
INSERT INTO `cdc_menu` VALUES ('12', '审核', null, null, null, null);
INSERT INTO `cdc_menu` VALUES ('13', '行驶证', '12', null, null, null);
INSERT INTO `cdc_menu` VALUES ('14', '驾驶证', '20', null, null, null);
INSERT INTO `cdc_menu` VALUES ('15', '服务商', '12', null, null, null);
INSERT INTO `cdc_menu` VALUES ('16', '内容', '19', null, null, null);
INSERT INTO `cdc_menu` VALUES ('17', '广告', '16', '/banner/index', null, null);
INSERT INTO `cdc_menu` VALUES ('18', '栏目', '16', '/column/index', null, null);
INSERT INTO `cdc_menu` VALUES ('19', '文章', null, '/article/index', null, null);
INSERT INTO `cdc_menu` VALUES ('20', '档案', null, null, null, null);
INSERT INTO `cdc_menu` VALUES ('21', '驾照', '20', '/driver/index', null, null);
INSERT INTO `cdc_menu` VALUES ('22', '身份证', '20', '/identity/index', null, null);
INSERT INTO `cdc_menu` VALUES ('23', '车辆', '20', '/car/index', null, null);
INSERT INTO `cdc_menu` VALUES ('24', '设置', null, null, null, null);
INSERT INTO `cdc_menu` VALUES ('25', '系统', '24', '/system/index', null, null);
INSERT INTO `cdc_menu` VALUES ('26', '通知中心', '24', null, null, null);
INSERT INTO `cdc_menu` VALUES ('27', '保险商', '24', '/insurance-company/index', null, null);
INSERT INTO `cdc_menu` VALUES ('28', '险种', '24', '/insurance/index', null, null);
INSERT INTO `cdc_menu` VALUES ('29', '我的信息', '24', '/account/index', null, null);
INSERT INTO `cdc_menu` VALUES ('30', '权限管理', null, null, null, null);
INSERT INTO `cdc_menu` VALUES ('31', '路由', '30', '/admin/role/index', null, null);
INSERT INTO `cdc_menu` VALUES ('32', '权限', '30', '/admin/assignment/index', null, null);
INSERT INTO `cdc_menu` VALUES ('33', '菜单', '30', '/admin/menu/index', null, null);
INSERT INTO `cdc_menu` VALUES ('34', '角色', '30', '/admin/role/index', null, null);
INSERT INTO `cdc_menu` VALUES ('35', '分配', '30', '/admin/assignment/index', null, null);
INSERT INTO `cdc_menu` VALUES ('36', '用户管理', '30', '/admin/user/index', null, null);

-- ----------------------------
-- Table structure for cdc_menu_group
-- ----------------------------
DROP TABLE IF EXISTS `cdc_menu_group`;
CREATE TABLE `cdc_menu_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL COMMENT '菜单id',
  `group_name` varchar(256) NOT NULL COMMENT '菜单组名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cdc_menu_group
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_message_code
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
-- Records of cdc_message_code
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_migration
-- ----------------------------
DROP TABLE IF EXISTS `cdc_migration`;
CREATE TABLE `cdc_migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of cdc_migration
-- ----------------------------
INSERT INTO `cdc_migration` VALUES ('m000000_000000_base', '1502442969');
INSERT INTO `cdc_migration` VALUES ('m140506_102106_rbac_init', '1502442971');
INSERT INTO `cdc_migration` VALUES ('m140602_111327_create_menu_table', '1502442981');
INSERT INTO `cdc_migration` VALUES ('m160312_050000_create_user', '1502442981');

-- ----------------------------
-- Table structure for cdc_notice
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
-- Records of cdc_notice
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_order
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
-- Records of cdc_order
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_order_detail
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
-- Records of cdc_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_service
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cdc_service
-- ----------------------------
INSERT INTO `cdc_service` VALUES ('1', '大枪', '小强', '', null, '', '0', '0', '0', '1', '9', '18', '1502337440', '1502337440', null, '2', '1', '123123', '2', '1', '3', 'd00001');
INSERT INTO `cdc_service` VALUES ('2', '玩儿玩儿', '味儿', '', null, '', '0', '0', '0', '1', '9', '18', '1502362752', '1502362752', null, '1', '1', '味儿', '2', '3', '4', 'werrgreg');
INSERT INTO `cdc_service` VALUES ('3', 's123123', 's123123', 's123123', null, '成都市武侯区成都市第一人民医院', '30.596286', '104.058616', '1', '1', '9', '18', '1502416785', '1502416785', null, '0', '1', null, '1', '1', '5', 's123123');
INSERT INTO `cdc_service` VALUES ('4', 's123123', 's123123', 's123123', null, '成都市双流县成都双流国际机场', '30.573554', '103.961044', '2', '1', '9', '18', '1502417531', '1502417531', null, '4', '1', null, '1', '1', '6', 's1231231');
INSERT INTO `cdc_service` VALUES ('5', '123123', '123123', '123123', null, '成都银行', '30.59091', '104.066984', '1', '1', '9', '18', '1502417812', '1502417812', null, '3', '1', null, '1', '1', '7', 's1231235');
INSERT INTO `cdc_service` VALUES ('6', '123123', '123', '123123', null, '无锡市锡山区竹苑新村123-123-3号', '31.591766', '120.383851', '1', '1', '9', '18', '1502417880', '1502417880', null, '3', '1', null, '1', '1', '8', 's1231234');
INSERT INTO `cdc_service` VALUES ('7', '123123', '123', '123123', null, '无锡市锡山区竹苑新村123-123-3号', '31.591766', '120.383851', '1', '1', '9', '18', '1502418035', '1502418035', null, '3', '1', null, '1', '1', '9', 's12312345');
INSERT INTO `cdc_service` VALUES ('8', '123123', '123', '123123', null, '四川省成都市', '30.655831', '104.081592', '1', '1', '9', '18', '1502418238', '1502418238', null, '0', '1', null, '1', '4', '10', 's12312315');
INSERT INTO `cdc_service` VALUES ('9', '123123', '123', '123123', null, '四川省成都市', '30.655831', '104.081592', '1', '1', '9', '18', '1502418369', '1502418369', null, '0', '1', null, '1', '4', '11', 's123123155');
INSERT INTO `cdc_service` VALUES ('10', '123123', '123', '123123', null, '四川省成都市', '30.655831', '104.081592', '1', '1', '9', '18', '1502418437', '1502418437', null, '0', '1', null, '1', '4', '12', 's1231231554');
INSERT INTO `cdc_service` VALUES ('11', '123123', '123', '123123', null, '四川省成都市', '30.655831', '104.081592', '1', '1', '9', '18', '1502418463', '1502418464', null, '0', '1', null, '1', '4', '13', 's1231231554');
INSERT INTO `cdc_service` VALUES ('12', '123123', '123', '123123', null, '', '30.6558312', '104.081592', '4', '1', '9', '18', '1502418577', '1502418577', null, '0', '1', null, '1', '3', '14', 's1231231554');
INSERT INTO `cdc_service` VALUES ('13', '代理商123', '代理商大', '', null, '', '0', '0', '0', '1', '9', '18', '1502421110', '1502421110', null, '4', '1', '123123', '2', '1', '15', 'd123123');
INSERT INTO `cdc_service` VALUES ('14', '123123', '123123', '123123', '<p style=\"text-align: center;\"><em><strong>我想</strong>看</em>看你是个<span style=\"color: rgb(215, 227, 188);\"><span style=\"color: rgb(217, 150, 148);\"></span>啥</span></p><p><img src=\"http://img.car.ypxl/upload/redactor/1/777de2ce58-sai-er-da.jpg\"></p>', '成都市青白江区真正饼业(阳光店)', '30.893609', '104.260532', '1', '1', '9', '18', '1502432191', '1502432191', null, '0', '1', null, '1', '3', '16', 'ssss123');
INSERT INTO `cdc_service` VALUES ('15', 'd123', 'D123', '', null, '', '0', '0', '0', '1', '9', '18', '1502501533', '1502501533', null, '0', '1', '1123123', '2', '1', '21', 'd111111');
INSERT INTO `cdc_service` VALUES ('16', '12331', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502501926', '1502501926', null, '0', '1', '123123', '2', '1', '22', 'd1231234');
INSERT INTO `cdc_service` VALUES ('17', '12331', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502501960', '1502501960', null, '0', '1', '123123', '2', '1', '23', 'd1231234');
INSERT INTO `cdc_service` VALUES ('18', '123123', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502502461', '1502502461', null, '0', '1', '123123123', '2', '1', '24', 'd123123123');
INSERT INTO `cdc_service` VALUES ('19', '123123', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502502565', '1502502565', null, '0', '1', '12312', '2', '1', '25', 'dd1231');
INSERT INTO `cdc_service` VALUES ('20', '123123', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502502856', '1502502856', null, '0', '1', '123123', '2', '1', '26', 'dd123123');
INSERT INTO `cdc_service` VALUES ('21', '123123', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502502916', '1502502916', null, '0', '1', '123123', '2', '1', '27', 'dd1231232');
INSERT INTO `cdc_service` VALUES ('22', '123123', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502503323', '1502503323', null, '0', '1', '123123', '2', '1', '28', 'ddd123');
INSERT INTO `cdc_service` VALUES ('23', '123123', '123123', '', null, '', '0', '0', '0', '1', '9', '18', '1502503554', '1502503554', null, '0', '1', '123123', '2', '1', '29', 'ddd1234');
INSERT INTO `cdc_service` VALUES ('24', '代理大王', '代理', '', null, '', '0', '0', '0', '1', '9', '18', '1502516505', '1502516505', null, '0', '1', '爱说', '2', '1', '30', 'dddddd');

-- ----------------------------
-- Table structure for cdc_service_img
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='服务商图';

-- ----------------------------
-- Records of cdc_service_img
-- ----------------------------
INSERT INTO `cdc_service_img` VALUES ('1', null, '1502333272598bc958d0d106.66460530.jpg', '/upload/service/1502333272598bc958d0d106.66460530.jpg', '955818', '0', '0', '/upload/service/1502333272598bc958d0d106.66460530.jpg');
INSERT INTO `cdc_service_img` VALUES ('2', null, '1502333459598bca138a1363.29232235.jpg', '/upload/agency/1502333459598bca138a1363.29232235.jpg', '955818', '0', '0', '/upload/agency/1502333459598bca138a1363.29232235.jpg');
INSERT INTO `cdc_service_img` VALUES ('3', null, '1502335359598bd17f6ae822.35245639.jpg', '/upload/agency/1502335359598bd17f6ae822.35245639.jpg', '955818', '0', '0', '/upload/agency/1502335359598bd17f6ae822.35245639.jpg');
INSERT INTO `cdc_service_img` VALUES ('4', null, '1502335439598bd1cf1d6045.44930936.jpg', '/upload/agency/1502335439598bd1cf1d6045.44930936.jpg', '955818', '0', '0', '/upload/agency/1502335439598bd1cf1d6045.44930936.jpg');
INSERT INTO `cdc_service_img` VALUES ('5', null, '1502335631598bd28f2e7bb6.01153028.jpg', '/upload/agency/1502335631598bd28f2e7bb6.01153028.jpg', '955818', '0', '0', '/upload/agency/1502335631598bd28f2e7bb6.01153028.jpg');
INSERT INTO `cdc_service_img` VALUES ('6', '1', '1502336010598bd40ae7a763.18183838.jpg', '/upload/agency/1502336010598bd40ae7a763.18183838.jpg', '955818', '1', '0', '/upload/agency/1502336010598bd40ae7a763.18183838.jpg');
INSERT INTO `cdc_service_img` VALUES ('7', '2', '1502362747598c3c7b4ee574.39983189.jpg', '/upload/agency/1502362747598c3c7b4ee574.39983189.jpg', '148404', '1', '0', '/upload/agency/1502362747598c3c7b4ee574.39983189.jpg');
INSERT INTO `cdc_service_img` VALUES ('8', null, '1502413516598d02cc345886.67637243.jpg', '/upload/service/1502413516598d02cc345886.67637243.jpg', '955818', '0', '1', '/upload/service/1502413516598d02cc345886.67637243.jpg');
INSERT INTO `cdc_service_img` VALUES ('9', null, '1502414292598d05d4aabbf7.50520264.jpg', '/upload/service/1502414292598d05d4aabbf7.50520264.jpg', '955818', '0', '1', '/upload/service/1502414292598d05d4aabbf7.50520264.jpg');
INSERT INTO `cdc_service_img` VALUES ('10', null, '1502414397598d063d6d8d80.73105313.jpg', '/upload/service/1502414397598d063d6d8d80.73105313.jpg', '955818', '0', '1', '/upload/service/1502414397598d063d6d8d80.73105313.jpg');
INSERT INTO `cdc_service_img` VALUES ('11', null, '1502414686598d075eed20c1.31098731.jpg', '/upload/service/1502414686598d075eed20c1.31098731.jpg', '955818', '0', '1', '/upload/service/1502414686598d075eed20c1.31098731.jpg');
INSERT INTO `cdc_service_img` VALUES ('12', null, '1502414821598d07e5b62fc3.87385449.jpg', '/upload/service/1502414821598d07e5b62fc3.87385449.jpg', '955818', '0', '1', '/upload/service/1502414821598d07e5b62fc3.87385449.jpg');
INSERT INTO `cdc_service_img` VALUES ('13', null, '1502414858598d080ac9a746.15929476.jpg', '/upload/service/1502414858598d080ac9a746.15929476.jpg', '955818', '0', '1', '/upload/service/1502414858598d080ac9a746.15929476.jpg');
INSERT INTO `cdc_service_img` VALUES ('14', null, '1502414929598d08512d6737.26779921.jpg', '/upload/service/1502414929598d08512d6737.26779921.jpg', '955818', '0', '1', '/upload/service/1502414929598d08512d6737.26779921.jpg');
INSERT INTO `cdc_service_img` VALUES ('15', null, '1502415007598d089f3d41d9.22304311.jpg', '/upload/service/1502415007598d089f3d41d9.22304311.jpg', '955818', '0', '1', '/upload/service/1502415007598d089f3d41d9.22304311.jpg');
INSERT INTO `cdc_service_img` VALUES ('16', null, '1502415035598d08bbc2fa60.83016264.jpg', '/upload/service/1502415035598d08bbc2fa60.83016264.jpg', '955818', '0', '1', '/upload/service/1502415035598d08bbc2fa60.83016264.jpg');
INSERT INTO `cdc_service_img` VALUES ('17', null, '1502415073598d08e1bdf937.93760170.jpg', '/upload/service/1502415073598d08e1bdf937.93760170.jpg', '955818', '0', '1', '/upload/service/1502415073598d08e1bdf937.93760170.jpg');
INSERT INTO `cdc_service_img` VALUES ('18', null, '1502415145598d0929446484.63358808.jpg', '/upload/service/1502415145598d0929446484.63358808.jpg', '955818', '0', '1', '/upload/service/1502415145598d0929446484.63358808.jpg');
INSERT INTO `cdc_service_img` VALUES ('19', null, '1502415176598d0948a03d80.04771166.jpg', '/upload/service/1502415176598d0948a03d80.04771166.jpg', '955818', '0', '1', '/upload/service/1502415176598d0948a03d80.04771166.jpg');
INSERT INTO `cdc_service_img` VALUES ('20', null, '1502415196598d095cd4a591.48643663.jpg', '/upload/service/1502415196598d095cd4a591.48643663.jpg', '955818', '0', '1', '/upload/service/1502415196598d095cd4a591.48643663.jpg');
INSERT INTO `cdc_service_img` VALUES ('21', null, '1502415258598d099aca0d18.58240240.jpg', '/upload/service/1502415258598d099aca0d18.58240240.jpg', '955818', '0', '1', '/upload/service/1502415258598d099aca0d18.58240240.jpg');
INSERT INTO `cdc_service_img` VALUES ('22', null, '1502415379598d0a134fd958.30706736.jpg', '/upload/service/1502415379598d0a134fd958.30706736.jpg', '955818', '0', '1', '/upload/service/1502415379598d0a134fd958.30706736.jpg');
INSERT INTO `cdc_service_img` VALUES ('23', null, '1502415434598d0a4a86e0c2.07985754.jpg', '/upload/service/1502415434598d0a4a86e0c2.07985754.jpg', '955818', '0', '1', '/upload/service/1502415434598d0a4a86e0c2.07985754.jpg');
INSERT INTO `cdc_service_img` VALUES ('24', null, '1502415503598d0a8f62ae25.99248665.jpg', '/upload/service/1502415503598d0a8f62ae25.99248665.jpg', '955818', '0', '1', '/upload/service/1502415503598d0a8f62ae25.99248665.jpg');
INSERT INTO `cdc_service_img` VALUES ('25', null, '1502415576598d0ad86cc724.82217673.jpg', '/upload/service/1502415576598d0ad86cc724.82217673.jpg', '955818', '0', '1', '/upload/service/1502415576598d0ad86cc724.82217673.jpg');
INSERT INTO `cdc_service_img` VALUES ('26', null, '1502416098598d0ce26d1d26.24315403.jpg', '/upload/service/1502416098598d0ce26d1d26.24315403.jpg', '955818', '0', '1', '/upload/service/1502416098598d0ce26d1d26.24315403.jpg');
INSERT INTO `cdc_service_img` VALUES ('27', null, '1502416145598d0d1176aff2.82142211.jpg', '/upload/service/1502416145598d0d1176aff2.82142211.jpg', '955818', '0', '1', '/upload/service/1502416145598d0d1176aff2.82142211.jpg');
INSERT INTO `cdc_service_img` VALUES ('28', null, '1502416551598d0ea7dc4c94.23428602.jpg', '/upload/service/1502416551598d0ea7dc4c94.23428602.jpg', '955818', '0', '1', '/upload/service/1502416551598d0ea7dc4c94.23428602.jpg');
INSERT INTO `cdc_service_img` VALUES ('29', null, '1502416557598d0ead064e24.65424821.jpg', '/upload/service/1502416557598d0ead064e24.65424821.jpg', '955818', '0', '0', '/upload/service/1502416557598d0ead064e24.65424821.jpg');
INSERT INTO `cdc_service_img` VALUES ('30', null, '1502416636598d0efc2997b9.13324605.jpg', '/upload/service/1502416636598d0efc2997b9.13324605.jpg', '955818', '0', '1', '/upload/service/1502416636598d0efc2997b9.13324605.jpg');
INSERT INTO `cdc_service_img` VALUES ('31', null, '1502416641598d0f014f6da7.03737093.jpg', '/upload/service/1502416641598d0f014f6da7.03737093.jpg', '955818', '0', '0', '/upload/service/1502416641598d0f014f6da7.03737093.jpg');
INSERT INTO `cdc_service_img` VALUES ('32', null, '1502417522598d127206dbb3.43491008.jpg', '/upload/service/1502417522598d127206dbb3.43491008.jpg', '955818', '0', '1', '/upload/service/1502417522598d127206dbb3.43491008.jpg');
INSERT INTO `cdc_service_img` VALUES ('33', null, '1502417524598d12746fb825.87749569.jpg', '/upload/service/1502417524598d12746fb825.87749569.jpg', '955818', '0', '0', '/upload/service/1502417524598d12746fb825.87749569.jpg');
INSERT INTO `cdc_service_img` VALUES ('34', null, '1502417524598d1274a6a242.91844592.jpg', '/upload/service/1502417524598d1274a6a242.91844592.jpg', '955818', '0', '0', '/upload/service/1502417524598d1274a6a242.91844592.jpg');
INSERT INTO `cdc_service_img` VALUES ('35', null, '1502417741598d134d099075.98674216.jpg', '/upload/service/1502417741598d134d099075.98674216.jpg', '955818', '0', '1', '/upload/service/1502417741598d134d099075.98674216.jpg');
INSERT INTO `cdc_service_img` VALUES ('36', null, '1502417745598d1351cd38a3.82609275.jpg', '/upload/service/1502417745598d1351cd38a3.82609275.jpg', '955818', '0', '0', '/upload/service/1502417745598d1351cd38a3.82609275.jpg');
INSERT INTO `cdc_service_img` VALUES ('37', null, '1502417800598d1388ddbf76.76880331.jpg', '/upload/service/1502417800598d1388ddbf76.76880331.jpg', '955818', '0', '1', '/upload/service/1502417800598d1388ddbf76.76880331.jpg');
INSERT INTO `cdc_service_img` VALUES ('38', null, '1502417801598d13897a9000.94569986.jpg', '/upload/service/1502417801598d13897a9000.94569986.jpg', '955818', '0', '0', '/upload/service/1502417801598d13897a9000.94569986.jpg');
INSERT INTO `cdc_service_img` VALUES ('39', null, '1502417865598d13c9c2fbb9.04761883.jpg', '/upload/service/1502417865598d13c9c2fbb9.04761883.jpg', '955818', '0', '1', '/upload/service/1502417865598d13c9c2fbb9.04761883.jpg');
INSERT INTO `cdc_service_img` VALUES ('40', null, '1502417869598d13cdb34d15.07527693.jpg', '/upload/service/1502417869598d13cdb34d15.07527693.jpg', '955818', '0', '0', '/upload/service/1502417869598d13cdb34d15.07527693.jpg');
INSERT INTO `cdc_service_img` VALUES ('41', '12', '1502418069598d149598dde4.02166402.jpg', '/upload/service/1502418069598d149598dde4.02166402.jpg', '955818', '1', '1', '/upload/service/1502418069598d149598dde4.02166402.jpg');
INSERT INTO `cdc_service_img` VALUES ('42', '12', '1502418073598d1499a6c520.37948882.jpg', '/upload/service/1502418073598d1499a6c520.37948882.jpg', '955818', '1', '0', '/upload/service/1502418073598d1499a6c520.37948882.jpg');
INSERT INTO `cdc_service_img` VALUES ('43', '13', '1502421104598d2070837ea3.90673617.jpg', '/upload/agency/1502421104598d2070837ea3.90673617.jpg', '955818', '1', '0', '/upload/agency/1502421104598d2070837ea3.90673617.jpg');
INSERT INTO `cdc_service_img` VALUES ('44', '14', '1502432073598d4b49902a74.40675500.jpg', '/upload/service/1502432073598d4b49902a74.40675500.jpg', '955818', '1', '1', '/upload/service/1502432073598d4b49902a74.40675500.jpg');
INSERT INTO `cdc_service_img` VALUES ('45', '14', '1502432090598d4b5ac79c94.11998677.jpg', '/upload/service/1502432090598d4b5ac79c94.11998677.jpg', '955818', '1', '0', '/upload/service/1502432090598d4b5ac79c94.11998677.jpg');
INSERT INTO `cdc_service_img` VALUES ('46', null, '1502501361598e59f16c5fe2.20150125.jpg', '/upload/agency/1502501361598e59f16c5fe2.20150125.jpg', '955818', '0', '0', '/upload/agency/1502501361598e59f16c5fe2.20150125.jpg');
INSERT INTO `cdc_service_img` VALUES ('47', null, '1502501920598e5c2047b422.71735246.jpg', '/upload/agency/1502501920598e5c2047b422.71735246.jpg', '955818', '0', '0', '/upload/agency/1502501920598e5c2047b422.71735246.jpg');
INSERT INTO `cdc_service_img` VALUES ('48', '18', '1502502454598e5e36d15be8.65653686.jpg', '/upload/agency/1502502454598e5e36d15be8.65653686.jpg', '955818', '1', '0', '/upload/agency/1502502454598e5e36d15be8.65653686.jpg');
INSERT INTO `cdc_service_img` VALUES ('49', '19', '1502502560598e5ea02c4f07.74179340.jpg', '/upload/agency/1502502560598e5ea02c4f07.74179340.jpg', '955818', '1', '0', '/upload/agency/1502502560598e5ea02c4f07.74179340.jpg');
INSERT INTO `cdc_service_img` VALUES ('50', '23', '1502502849598e5fc1f16c72.81733139.jpg', '/upload/agency/1502502849598e5fc1f16c72.81733139.jpg', '955818', '1', '0', '/upload/agency/1502502849598e5fc1f16c72.81733139.jpg');
INSERT INTO `cdc_service_img` VALUES ('51', '24', '1502516498598e95125abd05.91820338.jpg', '/upload/agency/1502516498598e95125abd05.91820338.jpg', '955818', '1', '0', '/upload/agency/1502516498598e95125abd05.91820338.jpg');

-- ----------------------------
-- Table structure for cdc_service_permission
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service_permission`;
CREATE TABLE `cdc_service_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '权限名',
  `service_id` int(11) DEFAULT NULL COMMENT '服务商id。暂不实现功能',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cdc_service_permission
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_service_tag
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
-- Records of cdc_service_tag
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_service_user
-- ----------------------------
DROP TABLE IF EXISTS `cdc_service_user`;
CREATE TABLE `cdc_service_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '关联adminuser表id',
  `service_id` int(11) DEFAULT NULL COMMENT '关联服务商的id',
  `type` tinyint(1) DEFAULT '0' COMMENT '账户的性质，1是服务商的主拥有者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cdc_service_user
-- ----------------------------
INSERT INTO `cdc_service_user` VALUES ('1', '2', '1', '1');
INSERT INTO `cdc_service_user` VALUES ('2', '24', '26', '0');
INSERT INTO `cdc_service_user` VALUES ('3', '25', '26', '0');
INSERT INTO `cdc_service_user` VALUES ('4', '26', '26', '0');
INSERT INTO `cdc_service_user` VALUES ('5', '30', '26', '0');
INSERT INTO `cdc_service_user` VALUES ('6', '31', '26', '0');

-- ----------------------------
-- Table structure for cdc_setting
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
-- Records of cdc_setting
-- ----------------------------
INSERT INTO `cdc_setting` VALUES ('1', 'delivery_address', '地址|收件人姓名|联系电话', '审车收货地址', '0', '基础设置');
INSERT INTO `cdc_setting` VALUES ('2', 'ali_sms_access_key_id', 'LTAICofjcYL5YHma', '阿里大于accessKeyId', '0', '短信设置');
INSERT INTO `cdc_setting` VALUES ('3', 'ali_sms_access_key_secret', 'ATPhtGRC5Hvdd0zyEyKkfPgnohl5b7', '阿里大于accessKeySecret', '0', '短信设置');
INSERT INTO `cdc_setting` VALUES ('4', 'ali_sms_template_code', 'SMS_78525146', '阿里大于短信模板Code', '0', '短信设置');
INSERT INTO `cdc_setting` VALUES ('5', 'ali_sms_template_sign', '云乐享车', '阿里大于短信模板签名', '0', '短信设置');
INSERT INTO `cdc_setting` VALUES ('6', 'jpush_member_appkey', '11cb6e13f6f803f31fd552ed', '极光推送客户端AppKey', '0', '客户端推送');
INSERT INTO `cdc_setting` VALUES ('7', 'jpush_member_master_secret', '38234424c16ab032ac17332a', '极光推送客户端Master Secret', '0', '客户端推送');
INSERT INTO `cdc_setting` VALUES ('8', 'jpush_service_appkey', '075973b97d6086b1784723df', '极光推送服务端AppKey', '0', '服务端推送');
INSERT INTO `cdc_setting` VALUES ('9', 'jpush_service_master_secret', '5da7ebec1a4842308ac89196', '极光推送服务端Master Secret', '0', '服务端推送');

-- ----------------------------
-- Table structure for cdc_status
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
-- Records of cdc_status
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_tag
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
-- Records of cdc_tag
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_user
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='服务端用户表';

-- ----------------------------
-- Records of cdc_user
-- ----------------------------
INSERT INTO `cdc_user` VALUES ('1', '111111', '我的天那～', '1', '13161672102', '$2y$13$ig6QCIr7fq5C1TK/9jALh.ApNvLyubzAzNbLOgSaC4nRI86DI3Cai', '1', '0', '1502502697', '192.168.2.118', null, null, '1501659455', null, '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('2', '业务员-小鑫', '小强', '1', '13688464645', null, '1', '0', '0', null, null, null, null, '1500972549', '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('3', '小强', '小勇', '1', '13812345678', '123456', '1', '0', '0', null, null, '1500970599', '1500970599', '1500972540', '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('4', 'xxxx', '握草', '1', '', '$2y$13$0hUO5aZSgtgSUTF5CkH9fOTHIcJ3YFhFJa6sxI0F3rzc0EwTFW64i', null, '0', '0', null, null, '1501469645', '1501469645', null, '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('6', 'as as ', '啊', '1', 'asd', '$2y$13$wjscXg22feR86B90xGIhOeMoZX9iKG32AnudzEzi73m69VNCNBUWC', null, '0', '0', null, null, '1501470041', '1501470041', null, '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('7', '1asdasd12', '123', '4', '13990909090', '$2y$13$GGtUZ9hyJwuk9f9iqM4YDu6Yt2Z4MSHc..fquxM4C6XbWXZ0.F2oy', '1', '0', '0', null, null, '1501645835', '1501645835', null, '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('8', 'conqina', '123123', '4', '13812345678', '$2y$13$AznDujgLrEaAjzZxPcWoEuhGL5JMec/NlS06sQGtxzcfCy/JJ39f2', '0', '0', '0', null, null, '1501646296', '1501646296', null, '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('9', 'xiaoqi', '小强', '5', '13812346581', '$2y$13$d3vzU2pAQHfA.dPv.rX0gO9FwVjoCbGhjNACAWgnbgwul3mTE1FR.', '1', '0', '0', null, null, '1501646337', '1501646337', null, '1', '1', '1');
INSERT INTO `cdc_user` VALUES ('10', 'zsdwe123', '123asd', '26', '13812345678', '$2y$13$W0Haqhoa5C04m/mWNVcqLuia1.He3zQ/st9jsxlhKOPs.dj.gwKi6', '1', '0', '0', null, null, '1501655098', '1501655098', null, '1', '1', '1');

-- ----------------------------
-- Table structure for cdc_user_img
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
-- Records of cdc_user_img
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_user_tag
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
-- Records of cdc_user_tag
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_warranty
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

-- ----------------------------
-- Records of cdc_warranty
-- ----------------------------
