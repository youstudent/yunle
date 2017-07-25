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

 Date: 07/25/2017 17:49:38 PM
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
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '状态\r\n维修和保养和救援\r\n1.待派单 2.待接单 3.已接单 4.接车中 5.正在返回 6.已接车 7. 准备评估 8.已评估 9.处理中 10.待交车 11.送车中 99.已完成 100.已取消\r\n上线审车\r\n1.待派单 2.待接单 3.已接单 4.接车中 5.正在返回 6.已接车 7.处理中 8.审车成功,待交车 9.已出发 99.已完成 98.审车失败 100.已取消\r\n不上线审车\r\n1.请及时寄出证件 2.待接单 3.处理中 99.已完成 98.审车失败 100.已取消\r\n保险\r\n1.待审核 2.待付款 3.待确认 4.确认购买 5.待付款 6.已付款 99.已完成 98.审核失败 100.已取消',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_detail` VALUES ('38', '35', '1', '', '1', '', '1500872209', '0'), ('39', '36', '1', '', '1', '', '1500872447', '0'), ('40', '37', '1', '', '1', '', '1500872737', '0'), ('41', '38', '1', '', '1', '', '1500872948', '0'), ('42', '39', '1', '', '1', '', '1500873030', '0'), ('43', '40', '1', '', '1', '', '1500873071', '0'), ('44', '41', '1', '', '1', '', '1500875348', '0'), ('45', '42', '1', '', '1', '', '1500875428', '0'), ('46', '42', '1000', '', '100', '已取消', '1500876031', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_act_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_act_img`;
CREATE TABLE `cdc_act_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `act_id` int(10) NOT NULL COMMENT ' 流转id',
  `order_id` int(10) NOT NULL COMMENT '订单id',
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
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '状态\r\n1.待审核 2.待付款 3.待确认 4.确认购买 5.待付款 6.已付款 99.已完成 98.审核失败 100.已取消',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='保险订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_insurance` VALUES ('1', '49', '1', '王八蛋', '1', '', '1500000000', '0'), ('2', '49', '1', '王八蛋', '100', '取消', '1500882178', '0');
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
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='平台账号表';

-- ----------------------------
--  Records of `cdc_adminuser`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_adminuser` VALUES ('1', 'admin', '', '$2y$13$pqJnJ1.g6hcvuTUTf0E27.vpjV6ISqL9Mlfq2BHADltJ6PbDEu4VK', null, '', '10', '0', '0'), ('3', '00008', null, '$2y$13$UCoJ/HLMARfHvAedjjwpfeuYXNrApDCF7enJvxl4qZAJ7hRIXg9ne', null, null, '10', '0', '0'), ('4', '00008', null, '$2y$13$q0jOf/1pHpMc1huVMbXLcOyMcaomGSdARoHwOA4q.jMUrR.RLZHwS', null, null, '10', '0', '0'), ('5', '00008', null, '$2y$13$l6oE9D6U.MZJWM1RdPgvf.qEMX9jgnQtYtd8IZ5MoY7UDfht.ifey', null, null, '10', '0', '0'), ('6', '00008', null, '$2y$13$FRV6sA5./hB8kpZl6EREc..0AFTHgAGYogcTxiL0SiuIHiCOhqE2W', null, null, '10', '0', '0'), ('7', 'asd123', null, '$2y$13$Iok6fJaEeTnLLcs0hZhPwe8j0LoxXQL/5Ws4DWs86dnZr02eHT1yq', null, null, '10', '0', '0'), ('8', '00008', null, '$2y$13$10wwOKH4Q5d/tLYwm2Uxu.Ft/NFYq3qKotE0OIp3OXFLVZOSFCrxS', null, null, '10', '0', '0'), ('9', '123', null, '$2y$13$5SxHOYZkI9PMhyNybU3AhOF3YbU3PSHGtlISrmItZyO.caBk8N1Ae', null, null, '10', '0', '0'), ('10', '123', null, '$2y$13$PGI9F539B2fYQ5GVV9B4YOYvWRFiofwUQiQ/7crJKFJ9NCeVafp7G', null, null, '10', '0', '0'), ('11', '123', null, '$2y$13$P5PsX1yFgSXbwf0xLozuxuCiVb8QOnsUFeas7ehsSAKJABZMXcgdS', null, null, '10', '0', '0'), ('12', '123', null, '$2y$13$YLpQlg3zs0taVhBIz1ToEuCKaglbtNzUPTzh4XyxqWIKXSjbulzd2', null, null, '10', '0', '0'), ('13', '123', null, '$2y$13$1PcrPxjbwY17Kz.YjidBqumGaMN2Rd04i9HN80XcjHz1hfJgNuSYW', null, null, '10', '0', '0'), ('14', '123', null, '$2y$13$LcYvB6YjlI1rrcU7DkgoYOt/X0G1qZKholYWKpdQo7P1NlQHXS9se', null, null, '10', '0', '0'), ('15', '123', null, '$2y$13$8jNG.uPvEPORxNsXAKtYMOIebz5Kj7USqNI1A6OjP0H2Gs2aVfQqK', null, null, '10', '0', '0'), ('16', '123', null, '$2y$13$2Ks/ETrgWZCCLAzcNd9cfO7zBUwGnPD5QF1PKEka1/XLvxO2o0iOC', null, null, '10', '0', '0'), ('17', '123', null, '$2y$13$9DF.x4q3i7ZETpADxh97zecJqcPIxv4hM/f9VehNPdzQR31JOv4vG', null, null, '10', '0', '0'), ('18', '123', null, '$2y$13$8YqGSnQWLqC66Vgd/5NI1eF0.Y/I5piUu5HzHxl6gZazTeFrarO06', null, null, '10', '0', '0'), ('19', '123', null, '$2y$13$bkN5hi8qsKunKoXCiCJLaOLmwNex6EKGZiTKij13yN4oJUnJZXqrq', null, null, '10', '0', '0'), ('20', '123', null, '$2y$13$Ds3bfAZzzz3cM3SLZmH0QuhWnvR6xk.dqDViCDfVN/l/oNcc.Poq2', null, null, '10', '0', '0'), ('21', '123', null, '$2y$13$hs7Bjw0IB4PokorLfaFFCesh/AjDztlrvSKoOmSaLcHeKaGnefWNm', null, null, '10', '0', '0'), ('22', '123', null, '$2y$13$Pc2ELTLTI5MC.ioVsI8QM.oEKiBW1wgBr9GeZAeWJx1BS6JWcmLgy', null, null, '10', '0', '0'), ('23', '123', null, '$2y$13$a/5vXKdgRtJSfy34zWix4O1DBtJm9ip0FCJh2NcnvNTbxvP/QlNcy', null, null, '10', '0', '0'), ('24', '123', null, '$2y$13$ecZd9aXJG2L7.iIs0.3Dj.XjheuHPQ089QknG1xuq9pJwrctd3jiK', null, null, '10', '0', '0'), ('25', '1', null, '$2y$13$vYPk5UEcKwMoTNOIDIckjOzbCvidvJ7mKYCx6ZNFzTDfFtYV6cLyi', null, null, '10', '0', '0'), ('26', '11', null, '$2y$13$TxcCASg.ot3RtsZ3uyxTJODsuyZEnTPETag/4zNddvV2XdqauPd7W', null, null, '10', '0', '0'), ('27', '11', null, '$2y$13$j765VGo.A1FRjpWUt7HOyuai0FwYckxvL.RYNV8aOUDANEv7h7K/G', null, null, '10', '0', '0'), ('28', '11', null, '$2y$13$vLfcFIVj2HcIk7iXG0Otculit2z5qQbRFpo7eC4QSoJwr2Gv8EaTG', null, null, '10', '0', '0'), ('29', '11', null, '$2y$13$MoSpNjRluGwNggmDNYFuhuSU90z.o43vwsSp1JPKu1sYk5QgLcpIG', null, null, '10', '0', '0'), ('30', '123123', null, '$2y$13$7VBD/fVeJIEZvaMvixkC7eU82eO58CPOnzfyBvcnaLhpf6DH6hX8u', null, null, '10', '0', '0'), ('31', 'asd123', null, '$2y$13$CtMBhqfDqiuavKPoMVpYReVrYxzMLBeQcThHvTgtt3sHhHcCJbMGS', null, null, '10', '0', '0'), ('32', '这我怎么知道', null, '$2y$13$7LO1cKCTK1QEzgDynn8Q6uEHXC5eoKwKTq3ZLP3hxYbAe9O2m6IrG', null, null, '10', '0', '0'), ('35', '1', null, '$2y$13$8RgpHe8KKWmJ6pS5xa0CZ.OXPafFHTuesWkmCA2YLgZ5/NWu2Cl9O', null, null, '10', '0', '0');
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
--  Table structure for `cdc_article`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_article`;
CREATE TABLE `cdc_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '文章题目',
  `author` varchar(50) NOT NULL DEFAULT '' COMMENT '文章作者',
  `brief` varchar(50) NOT NULL DEFAULT '' COMMENT '文章的摘要',
  `content` text NOT NULL COMMENT '文章内容',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '文章状态 1 正常  0 禁用',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0 未分类 1公交车 2玩具车 3遥控车',
  `column_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属栏目id',
  `stick` tinyint(2) DEFAULT '0' COMMENT '置顶轮播状态 0:不置顶 1:置顶',
  `views` int(10) DEFAULT '100000' COMMENT '浏览量',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_article`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_article` VALUES ('1', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '11', '0', '0'), ('2', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '12', '0', '0'), ('3', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '13', '0', '0'), ('4', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '14', '0', '0'), ('5', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '21', '0', '0'), ('6', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '22', '0', '0'), ('7', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '23', '0', '0'), ('8', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '24', '0', '0'), ('9', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '25', '0', '0'), ('10', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '31', '0', '0'), ('11', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '32', '0', '0'), ('12', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '33', '0', '0'), ('13', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '34', '0', '0'), ('14', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '35', '0', '0');
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
INSERT INTO `cdc_auth_item` VALUES ('/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/assignment/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/assignment/assign', '2', null, null, null, '1500116032', '1500116032'), ('/admin/assignment/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/assignment/revoke', '2', null, null, null, '1500116032', '1500116032'), ('/admin/assignment/view', '2', null, null, null, '1500116032', '1500116032'), ('/admin/default/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/default/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/menu/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/menu/create', '2', null, null, null, '1500116032', '1500116032'), ('/admin/menu/delete', '2', null, null, null, '1500116032', '1500116032'), ('/admin/menu/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/menu/update', '2', null, null, null, '1500116032', '1500116032'), ('/admin/menu/view', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/assign', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/create', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/delete', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/remove', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/update', '2', null, null, null, '1500116032', '1500116032'), ('/admin/permission/view', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/assign', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/create', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/delete', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/remove', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/update', '2', null, null, null, '1500116032', '1500116032'), ('/admin/role/view', '2', null, null, null, '1500116032', '1500116032'), ('/admin/route/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/route/assign', '2', null, null, null, '1500116032', '1500116032'), ('/admin/route/create', '2', null, null, null, '1500116032', '1500116032'), ('/admin/route/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/route/refresh', '2', null, null, null, '1500116032', '1500116032'), ('/admin/route/remove', '2', null, null, null, '1500116032', '1500116032'), ('/admin/rule/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/rule/create', '2', null, null, null, '1500116032', '1500116032'), ('/admin/rule/delete', '2', null, null, null, '1500116032', '1500116032'), ('/admin/rule/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/rule/update', '2', null, null, null, '1500116032', '1500116032'), ('/admin/rule/view', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/*', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/activate', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/change-password', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/delete', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/index', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/login', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/logout', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/request-password-reset', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/reset-password', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/signup', '2', null, null, null, '1500116032', '1500116032'), ('/admin/user/view', '2', null, null, null, '1500116032', '1500116032'), ('/gii/*', '2', null, null, null, '1500116032', '1500116032'), ('/gii/default/*', '2', null, null, null, '1500116032', '1500116032'), ('/gii/default/action', '2', null, null, null, '1500116032', '1500116032'), ('/gii/default/diff', '2', null, null, null, '1500116032', '1500116032'), ('/gii/default/index', '2', null, null, null, '1500116032', '1500116032'), ('/gii/default/preview', '2', null, null, null, '1500116032', '1500116032'), ('/gii/default/view', '2', null, null, null, '1500116032', '1500116032'), ('/service/*', '2', null, null, null, '1500116032', '1500116032'), ('/service/create', '2', null, null, null, '1500116032', '1500116032'), ('/service/delete', '2', null, null, null, '1500116032', '1500116032'), ('/service/index', '2', null, null, null, '1500116032', '1500116032'), ('/service/update', '2', null, null, null, '1500116032', '1500116032'), ('/service/view', '2', null, null, null, '1500116032', '1500116032'), ('/site/*', '2', null, null, null, '1500116032', '1500116032'), ('/site/error', '2', null, null, null, '1500116032', '1500116032'), ('/site/index', '2', null, null, null, '1500116032', '1500116032'), ('/site/login', '2', null, null, null, '1500116032', '1500116032'), ('/site/logout', '2', null, null, null, '1500116032', '1500116032'), ('业务员', '1', null, null, null, '1500553101', '1500553101');
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
INSERT INTO `cdc_auth_item_child` VALUES ('业务员', '/admin/assignment/assign'), ('业务员', '/admin/default/*'), ('业务员', '/admin/default/index'), ('业务员', '/admin/menu/*'), ('业务员', '/admin/menu/create'), ('业务员', '/admin/menu/delete'), ('业务员', '/admin/menu/index');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
--  Records of `cdc_banner`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_banner` VALUES ('1', '啊啊', '啊啊', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_banner_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_banner_img`;
CREATE TABLE `cdc_banner_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL DEFAULT '0' COMMENT 'bannerID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='banner图片表';

-- ----------------------------
--  Records of `cdc_banner_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_banner_img` VALUES ('1', '1', '213123'), ('2', '1', '213131'), ('3', '1', '1232131');
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
  `stick` tinyint(1) NOT NULL DEFAULT '0' COMMENT '车辆默认 0:不 1:默认',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
--  Records of `cdc_car`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car` VALUES ('1', '1', '川B*111111', 'SUV', 'x小强', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '1', '1500000001', '0'), ('2', '1', '川B*222222', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000002', '0'), ('3', '2', '川B*333333', '平板车', '龙宝宝', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000003', '0'), ('4', '1', '川B*444444', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000004', '0'), ('5', '1', '川B*555555', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000005', '0'), ('6', '1', '川B*666666', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000006', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
--  Records of `cdc_car_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car_img` VALUES ('1', '1', 'up/aa/aa', '0', '0'), ('2', '1', 'up/bb/bb', '0', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `cdc_column`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_column` VALUES ('1', 'aaa', 'aaa', '0', '0'), ('2', 'bbb', 'bbb', '0', '0'), ('3', 'ccc', 'ccc', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_driving_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_driving_img`;
CREATE TABLE `cdc_driving_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driving_license_id` int(11) NOT NULL DEFAULT '0' COMMENT '车车ID',
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
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
--  Records of `cdc_driving_license`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_license` VALUES ('1', '1', '龙龙责任有限公司', '男', '美国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日', null, null), ('2', '1', '龙龙责任有限公司', '男', '中国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日', null, null), ('3', '1', '龙龙责任有限公司', '男', '中国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日', null, null);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='险种要素表';

-- ----------------------------
--  Records of `cdc_element`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_element` VALUES ('1', '1', '标准', '0', '0'), ('2', '2', '保额30W', '0', '0'), ('3', '2', '保额50W', '0', '0'), ('4', '2', '保额100W', '0', '0'), ('5', '3', '保额66W', '0', '0'), ('6', '4', '保额44W', '0', '0'), ('7', '5', '标准', '0', '0');
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
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
--  Records of `cdc_identification`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification` VALUES ('1', '1', '龙龙', '汉', '男', '1992年2月4日', '1231324656', '1992年2月5日', '1992年2月6日', '0', '0'), ('2', '2', '龙龙责任有限公司', '', '', '', '1231324656', '', '', '0', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
--  Records of `cdc_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance` VALUES ('1', '交强险', '1', '10000', '1', '1500000000', '0'), ('2', '盗抢险', '2', '20000', '1', '1500000000', '0'), ('3', '非礼险', '2', '3', '0', '1500000000', '0'), ('4', '二手险', '2', '4', '0', '1500000000', '0'), ('5', '第三者险', '2', '1', '1', '1500000000', '1');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_insurance_actimg`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_actimg`;
CREATE TABLE `cdc_insurance_actimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `act_id` int(10) NOT NULL COMMENT ' 流转id',
  `order_id` int(10) NOT NULL COMMENT '订单id',
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='保险公司表';

-- ----------------------------
--  Records of `cdc_insurance_company`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_company` VALUES ('1', '中国人寿', '人寿', '0', '0'), ('2', '中国平安', '平安', '0', '0'), ('3', '中国昂恪', '昂恪', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_insurance_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_detail`;
CREATE TABLE `cdc_insurance_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `car_id` int(10) NOT NULL DEFAULT '0' COMMENT '车辆id',
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '投保人',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='保险订单绑定详情表';

-- ----------------------------
--  Records of `cdc_insurance_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_detail` VALUES ('16', '49', '1', '1', '0', '0'), ('17', '50', '1', '1', '0', '0'), ('18', '51', '1', '1', '0', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='险种和订单绑定表';

-- ----------------------------
--  Records of `cdc_insurance_element`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_element` VALUES ('37', '49', '交强险', '标准', '不计免赔', '1500709584', '0'), ('38', '49', '盗抢险', '保额50W', '0', '1500709585', '0'), ('39', '50', '交强险', '标准', '不计免赔', '1500709691', '0'), ('40', '50', '盗抢险', '保额50W', '0', '1500709691', '0'), ('41', '51', '交强险', '标准', '不计免赔', '1500709791', '0'), ('42', '51', '盗抢险', '保额50W', '0', '1500709791', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_insurance_order`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_order`;
CREATE TABLE `cdc_insurance_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order` varchar(100) DEFAULT '0' COMMENT '订单号id',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='保险订单表';

-- ----------------------------
--  Records of `cdc_insurance_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_order` VALUES ('49', 'A722095844903228', '6', '龙龙', '男', '汉', '1231324656', '17600204335', '川B*111111', '中国人寿', '0', '0', '0', '0'), ('50', 'A722096911914373', '6', '龙龙', '男', '汉', '1231324656', '17600204335', '川B*111111', '中国人寿', '0', '0', '0', '0'), ('51', 'A722097914721659', '6', '龙龙', '不详', '汉', '1231324656', '17600204335', '川B*111111', '中国人寿', '0', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_invitation_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_invitation_code`;
CREATE TABLE `cdc_invitation_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) DEFAULT '0' COMMENT '归属id',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '验证码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用状态 0:未使用 1:已使用',
  `created_at` int(11) DEFAULT NULL COMMENT '使用时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='邀请码表';

-- ----------------------------
--  Records of `cdc_invitation_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_invitation_code` VALUES ('1', '1', '123456', '0', '1500000000', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='邮寄地址详情表';

-- ----------------------------
--  Records of `cdc_mail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_mail` VALUES ('1', '天府大道001号龙龙皇家4S店', '13111111111', '大龙哥', '0', '0');
COMMIT;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
--  Records of `cdc_member`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member` VALUES ('1', '17600204335', '1', null, '1', '1', '1500971343', '192.168.2.118', null, '1500003853', '1500950240', '1500966260'), ('2', '13111111111', '2', null, '1', '1', '1500889172', '127.0.0.1', null, '1500003853', null, null), ('3', '', '1', null, '1', '1', '0', null, null, '1500899596', '1500899596', '1500972273'), ('4', '13812345678', '1', null, '0', '2', '0', null, null, '1500899601', '1500968306', null), ('5', '138123475860', '1', null, '0', '1', '0', null, null, '1500899613', '1500968051', null), ('6', '', '1', null, '1', '1', '0', null, null, '1500899634', '1500899634', '1500967207'), ('7', '112355123', '1', null, '1', '1', '0', null, null, '1500899655', '1500968059', null), ('8', '13812345600', '1', null, '1', '1', '0', null, null, '1500899662', '1500950631', null), ('9', '13812345000', '1', null, '1', '1', '0', null, null, '1500899728', '1500950644', '1500967309'), ('10', '13812345678', '1', null, '1', '1', '0', null, null, '1500945190', '1500945190', '1500967160'), ('11', '13812345678', '1', null, '1', '1', '0', null, null, '1500946840', '1500946840', '1500967127'), ('12', '1381234567', '1', null, '1', '1', '0', null, null, '1500947015', '1500947015', '1500967121'), ('13', '123123', '1', null, '1', '1', '0', null, null, '1500947090', '1500947090', '1500967045'), ('18', '13161672102', '1', null, '1', '0', '1500970133', '192.168.2.118', null, '1500970133', null, null);
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
INSERT INTO `cdc_member_code` VALUES ('4', '18', '1', '1500970133', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_menu` VALUES ('1', '测试菜单', null, '/admin/assignment/assign', '1', null);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

-- ----------------------------
--  Records of `cdc_message_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_message_code` VALUES ('1', '17600204335', '111111', '0', '1500000000', '0'), ('2', '13111111111', '123456', '0', '1500000000', '0'), ('3', '13161672102', '111111', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_migration`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_migration`;
CREATE TABLE `cdc_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `cdc_migration`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_migration` VALUES ('m140602_111327_create_menu_table', '1500276857'), ('m160312_050000_create_user', '1500276857');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_news`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_news`;
CREATE TABLE `cdc_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) DEFAULT '0' COMMENT 'member,user,service',
  `user_id` int(10) DEFAULT '0' COMMENT 'user',
  `news` varchar(255) DEFAULT '' COMMENT '消息内容',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='服务端消息通知表';

-- ----------------------------
--  Records of `cdc_news`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_news` VALUES ('6', 'user', '1', '您成功邀请一位新会员，手机号：【13161672102】', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_order`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order`;
CREATE TABLE `cdc_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order` varchar(100) NOT NULL DEFAULT '' COMMENT '订单号',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型 1:救援 2:维修 3:保养 4:上线审车 5:不上线审车',
  `user` varchar(50) DEFAULT '' COMMENT '联系人',
  `phone` varchar(50) DEFAULT '0' COMMENT '联系人电话',
  `car` varchar(50) DEFAULT '' COMMENT '车牌号',
  `pick` tinyint(1) DEFAULT '0' COMMENT '是否接车 0:否 1:接',
  `pick_at` int(10) DEFAULT '0' COMMENT '接车时间',
  `pick_addr` varchar(255) DEFAULT '' COMMENT '接车地点',
  `distributing` tinyint(2) DEFAULT '0' COMMENT '派单类型 0:自动 1:手动',
  `service` varchar(255) DEFAULT '' COMMENT '服务商',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_at` int(10) DEFAULT '0' COMMENT '完成时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='订单快照表';

-- ----------------------------
--  Records of `cdc_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order` VALUES ('35', 'A724722094882651', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500872209', '0'), ('36', 'A724724468588303', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '1', '', '0.00', '1500872446', '0'), ('37', 'A724727368894285', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '1', '', '0.00', '1500872736', '0'), ('38', 'A724729487345426', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500872948', '0'), ('39', 'A724730303482159', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500873030', '0'), ('40', 'A724730715995719', '5', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500873071', '0'), ('41', 'A724753485228069', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '昂恪皇家4S店', '0.00', '1500875348', '0'), ('42', 'A724754278233312', '2', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '龙龙高逼格4S店', '0.00', '1500875427', '0');
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
  `service_id` int(10) NOT NULL DEFAULT '0' COMMENT '服务商id',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='订单详情表';

-- ----------------------------
--  Records of `cdc_order_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order_detail` VALUES ('11', '35', '1', '1', '1', '0', '0'), ('12', '36', '1', '1', '1', '0', '0'), ('13', '37', '1', '1', '1', '0', '0'), ('14', '38', '1', '1', '1', '0', '0'), ('15', '39', '1', '1', '1', '0', '0'), ('16', '40', '1', '1', '1', '0', '0'), ('17', '41', '1', '1', '1', '0', '0'), ('18', '42', '1', '1', '2', '0', '0');
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
  `introduction` varchar(256) DEFAULT NULL COMMENT '简介',
  `address` varchar(256) NOT NULL DEFAULT '' COMMENT '地址',
  `lat` varchar(256) DEFAULT '0' COMMENT '纬度',
  `lng` varchar(256) DEFAULT '0' COMMENT '经度',
  `level` tinyint(2) NOT NULL DEFAULT '0' COMMENT '星级',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态; 10 已启用',
  `open_at` int(11) DEFAULT '0' COMMENT '开业时间',
  `close_at` int(11) DEFAULT '0' COMMENT '停业时间',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_service`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service` VALUES ('1', '服务商名字', '小强', '10086', '简介', '成都市武侯区环球中心', '38', '106', '3', '1', '0', '0', '1500710364', '1500710364'), ('2', '啊啊啊', '龙龙', '10010', '简介', '成都啊啊啊', '38', '105', '4', '1', '0', '0', '1500710364', '1500710364');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='服务商图';

-- ----------------------------
--  Records of `cdc_service_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_img` VALUES ('1', '1', '大大', '111', '11', '1', '1', '111111/111'), ('2', '2', '小小', '222', '22', '1', '1', '22222/222');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='服务商绑定标签(服务范畴)表';

-- ----------------------------
--  Records of `cdc_service_tag`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_tag` VALUES ('1', '1', '1', '0', '0'), ('2', '2', '1', '0', '0'), ('3', '3', '1', '0', '0'), ('4', '4', '1', '0', '0'), ('5', '2', '2', '0', '0'), ('6', '3', '2', '0', '0');
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
INSERT INTO `cdc_tag` VALUES ('1', '维修', '0', '1500000000', '0'), ('2', '审车', '0', '1500000000', '0'), ('3', '保养', '0', '1500000000', '0'), ('4', '救援', '0', '1500000000', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_user`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_user`;
CREATE TABLE `cdc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `pid` int(10) DEFAULT '1' COMMENT '推荐人id',
  `phone` varchar(50) DEFAULT '' COMMENT '电话',
  `password` varchar(80) DEFAULT NULL COMMENT '密码',
  `status` int(5) DEFAULT '1' COMMENT '状态 1:正常 0:冻结',
  `last_login_at` int(10) DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(50) DEFAULT NULL,
  `access_token` varchar(60) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  `deleted_at` int(11) DEFAULT NULL COMMENT '三处时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `access_token` (`access_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='服务端用户表';

-- ----------------------------
--  Records of `cdc_user`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_user` VALUES ('1', '业务员-小强', '1', '13812345678', '$2y$13$AWaUHxc5k7CUozMQX/mOQOfDR1MDX7PpI5w2HcPrfu/TqsKr34Yz6', '1', '0', null, null, null, '1500972926', null), ('2', '业务员-小鑫', '1', '13688464645', null, '1', '0', null, null, null, null, '1500972549'), ('3', '小强', '1', '13812345678', '123456', '1', '0', null, null, '1500970599', '1500970599', '1500972540');
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

SET FOREIGN_KEY_CHECKS = 1;
