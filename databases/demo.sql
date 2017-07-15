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

 Date: 07/15/2017 18:06:18 PM
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
  `status_id` varchar(255) NOT NULL DEFAULT '' COMMENT '动态信息id',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='平台账号表';

-- ----------------------------
--  Records of `cdc_adminuser`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_adminuser` VALUES ('1', 'admin', '', '$2y$13$pqJnJ1.g6hcvuTUTf0E27.vpjV6ISqL9Mlfq2BHADltJ6PbDEu4VK', null, '', '10', '0', '0'), ('3', '00008', null, '$2y$13$UCoJ/HLMARfHvAedjjwpfeuYXNrApDCF7enJvxl4qZAJ7hRIXg9ne', null, null, '10', '0', '0'), ('4', '00008', null, '$2y$13$q0jOf/1pHpMc1huVMbXLcOyMcaomGSdARoHwOA4q.jMUrR.RLZHwS', null, null, '10', '0', '0'), ('5', '00008', null, '$2y$13$l6oE9D6U.MZJWM1RdPgvf.qEMX9jgnQtYtd8IZ5MoY7UDfht.ifey', null, null, '10', '0', '0'), ('6', '00008', null, '$2y$13$FRV6sA5./hB8kpZl6EREc..0AFTHgAGYogcTxiL0SiuIHiCOhqE2W', null, null, '10', '0', '0'), ('7', 'asd123', null, '$2y$13$Iok6fJaEeTnLLcs0hZhPwe8j0LoxXQL/5Ws4DWs86dnZr02eHT1yq', null, null, '10', '0', '0'), ('8', '00008', null, '$2y$13$10wwOKH4Q5d/tLYwm2Uxu.Ft/NFYq3qKotE0OIp3OXFLVZOSFCrxS', null, null, '10', '0', '0');
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
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  `views` int(10) DEFAULT '100000' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_article`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_article` VALUES ('1', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '0', '0', '11'), ('2', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '0', '0', '12'), ('3', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '0', '0', '13'), ('4', '1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '1', '0', '0', '0', '14'), ('5', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '0', '0', '21'), ('6', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '0', '0', '22'), ('7', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '0', '0', '23'), ('8', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '0', '0', '24'), ('9', '2', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '2', '0', '0', '0', '25'), ('10', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '0', '0', '31'), ('11', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '0', '0', '32'), ('12', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '0', '0', '33'), ('13', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '0', '0', '34'), ('14', '3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '0', '3', '0', '0', '0', '35');
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
INSERT INTO `cdc_car` VALUES ('1', '1', '川B*111111', 'SUV', 'x小强', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '1', '1500000000', '0'), ('2', '1', '川B*222222', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000002', '0'), ('3', '2', '川B*333333', '平板车', '龙宝宝', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000003', '0'), ('4', '1', '川B*444444', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000004', '0'), ('5', '1', '川B*555555', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000005', '0'), ('6', '1', '川B*666666', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1500000006', '0');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_car_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_car_img`;
CREATE TABLE `cdc_car_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL DEFAULT '0' COMMENT '车车ID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
--  Records of `cdc_car_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car_img` VALUES ('1', '1', 'up/aa/aa'), ('2', '1', 'up/bb/bb');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_circulation`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_circulation`;
CREATE TABLE `cdc_circulation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '流转名',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='流转类型名称表';

-- ----------------------------
--  Table structure for `cdc_circulation_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_circulation_img`;
CREATE TABLE `cdc_circulation_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `circulation_id` int(10) NOT NULL COMMENT ' 流转id',
  `order_id` int(10) NOT NULL COMMENT '订单id',
  `url` varchar(255) DEFAULT '' COMMENT '图片地址',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='流转图片表';

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
--  Table structure for `cdc_company`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_company`;
CREATE TABLE `cdc_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '保险公司名',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险公司表';

-- ----------------------------
--  Table structure for `cdc_driving_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_driving_img`;
CREATE TABLE `cdc_driving_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driving_license_id` int(11) NOT NULL DEFAULT '0' COMMENT '车车ID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
--  Records of `cdc_driving_license`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_license` VALUES ('1', '1', '龙龙责任有限公司', '男', '美国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日'), ('2', '1', '龙龙责任有限公司', '男', '中国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日'), ('3', '1', '龙龙责任有限公司', '男', '中国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_identification`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_identification`;
CREATE TABLE `cdc_identification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `member_id` int(10) NOT NULL COMMENT '所属用户id',
  `name` varchar(50) DEFAULT '' COMMENT '公司名称或姓名',
  `sex` varchar(50) DEFAULT '' COMMENT '性别',
  `birthday` varchar(50) DEFAULT '' COMMENT '出生年月',
  `licence` varchar(255) DEFAULT '' COMMENT '组织机构代码或身份证号',
  `start_at` varchar(50) DEFAULT '' COMMENT '身份证生效时间',
  `end_at` varchar(50) DEFAULT '' COMMENT '身份证失效时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
--  Records of `cdc_identification`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification` VALUES ('1', '1', '龙龙责任有限公司', '', '', '1231324656', '', ''), ('2', '2', '龙龙责任有限公司', '男', '', '1231324656', '1992年2月5日', '1992年2月6日');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_identification_img`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_identification_img`;
CREATE TABLE `cdc_identification_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ident_id` int(10) DEFAULT '0' COMMENT '认证详情id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='认证图片表';

-- ----------------------------
--  Table structure for `cdc_insurance`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance`;
CREATE TABLE `cdc_insurance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '险种名',
  `cost` int(10) unsigned NOT NULL COMMENT '价格',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
--  Table structure for `cdc_insurance_order`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_order`;
CREATE TABLE `cdc_insurance_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户id',
  `car_id` int(10) NOT NULL COMMENT '车辆id',
  `insurance_id` varchar(255) NOT NULL DEFAULT '' COMMENT '保险种类',
  `company_id` int(10) NOT NULL COMMENT '险种所属公司',
  `order` varchar(50) NOT NULL DEFAULT '' COMMENT '订单号',
  `chit` varchar(50) NOT NULL DEFAULT '' COMMENT '保单号',
  `cost` int(10) unsigned DEFAULT '0' COMMENT '价格',
  `tax` int(10) DEFAULT '0' COMMENT '船税车',
  `log` varchar(255) NOT NULL DEFAULT '' COMMENT '流程日志',
  `start_at` int(10) DEFAULT '0' COMMENT '生效时间',
  `end_at` int(10) DEFAULT '0' COMMENT '失效时间',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '流程状态',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险订单表';

-- ----------------------------
--  Table structure for `cdc_invitation_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_invitation_code`;
CREATE TABLE `cdc_invitation_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) DEFAULT '0' COMMENT '归属id',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '验证码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用状态 0:未使用 1:已使用',
  `created_at` int(10) DEFAULT NULL COMMENT '使用时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='邀请码表';

-- ----------------------------
--  Records of `cdc_invitation_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_invitation_code` VALUES ('1', '1', '123456', '0', '1500000000');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
--  Records of `cdc_member`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member` VALUES ('1', '17600204335', '1', null, '1', '2', '1500004594', '127.0.0.1', null, '1500003853', null), ('2', '13111111111', '1', null, '1', '1', '1500004594', '127.0.0.1', null, '1500003853', null);
COMMIT;

-- ----------------------------
--  Table structure for `cdc_member_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_member_code`;
CREATE TABLE `cdc_member_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '使用者id',
  `code_id` int(10) NOT NULL DEFAULT '0' COMMENT '邀请码id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '使用时间',
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
--  Table structure for `cdc_message_code`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_message_code`;
CREATE TABLE `cdc_message_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `phone` varchar(50) NOT NULL COMMENT '手机号',
  `code` varchar(50) NOT NULL COMMENT '验证码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用状态 0:未使用 1:已使用',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

-- ----------------------------
--  Records of `cdc_message_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_message_code` VALUES ('1', '17600204335', '123456', '1', '1500000000'), ('2', '13116196373', '123456', '0', '1500000000');
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
--  Table structure for `cdc_news`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_news`;
CREATE TABLE `cdc_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `type` tinyint(2) DEFAULT '1' COMMENT 'user类型 1:客户端 2:服务端a',
  `news` varchar(255) DEFAULT '',
  `created_at` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='消息通知表';

-- ----------------------------
--  Records of `cdc_news`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_news` VALUES ('1', '1', '1', '你是不是傻是不是傻是不是傻是不是', '1500000000'), ('2', '1', '1', '你是不是二是不是二是不是二', '1500000000'), ('3', '1', '2', '你是不是二是不是二是不是二', '1500000000');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_order`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order`;
CREATE TABLE `cdc_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order` varchar(100) NOT NULL DEFAULT '' COMMENT '订单号',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '订单状态 0:已取消 1:正常',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单快照表';

-- ----------------------------
--  Table structure for `cdc_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order_detail`;
CREATE TABLE `cdc_order_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `member_id` int(10) NOT NULL DEFAULT '0' COMMENT '提交人',
  `car_id` int(10) NOT NULL DEFAULT '0' COMMENT '车辆id',
  `facilitator` varchar(255) NOT NULL DEFAULT '' COMMENT '服务商id',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型 1:救援 2:审车 3:维修 4:保养 5:保险',
  `distributing` tinyint(1) NOT NULL DEFAULT '0' COMMENT '派单类型 0:自动 1:手动',
  `cost` tinyint(7) unsigned DEFAULT '0' COMMENT '价格',
  `pick` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否接车 0:否 1:接',
  `pick_at` varchar(50) DEFAULT '0' COMMENT '接车时间',
  `pick_addr` varchar(255) DEFAULT '' COMMENT '接车地点',
  `post` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否送车 0:否 1:接',
  `post_at` int(10) DEFAULT '0' COMMENT '送车时间',
  `post_addr` varchar(255) DEFAULT '' COMMENT '送车地点',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
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
  `introduction` varchar(256) DEFAULT NULL COMMENT '简介',
  `address` varchar(256) NOT NULL DEFAULT '' COMMENT '地址',
  `lat` varchar(256) DEFAULT '0' COMMENT '纬度',
  `lon` varchar(256) DEFAULT '0' COMMENT '经度',
  `level` tinyint(2) NOT NULL DEFAULT '0' COMMENT '星级',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态; 10 已启用',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_service`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service` VALUES ('1', '1', '1', '1', '1', '1', '0', '0', '0', '1', null, null), ('2', '1', '1', '1', '1', '1', '0', '0', '0', '1', null, null), ('3', '1', '1', '1', '1', '1', '0', '0', '0', '1', '1500107338', '1500107338'), ('4', '1', '1', '1', '1', '1', '0', '0', '0', '1', '1500107368', '1500107368'), ('5', '1', '1', '1', '1', '1', '0', '0', '0', '1', '1500107761', '1500107761'), ('6', 'asd123', 'asd123', 'asd123', 'asd123', 'asd123', '0', '0', '0', '1', '1500108638', '1500108638'), ('7', '1', '1', '1', '1', '1', '0', '0', '0', '1', '1500112546', '1500112546');
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
  `pid` int(10) DEFAULT '1' COMMENT '推荐人id',
  `phone` varchar(50) DEFAULT '' COMMENT '电话',
  `password` varchar(80) DEFAULT NULL COMMENT '密码',
  `email` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `status` int(5) DEFAULT '1' COMMENT '状态 1:正常 0:冻结',
  `type` tinyint(2) DEFAULT '0' COMMENT '用户类型 0:未选择 1:个人用户 2:组织用户 3:服务端 4:平台',
  `last_login_at` int(10) DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(50) DEFAULT NULL,
  `access_token` varchar(60) DEFAULT NULL,
  `created_at` int(18) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(18) DEFAULT NULL COMMENT '更新时间',
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

SET FOREIGN_KEY_CHECKS = 1;
