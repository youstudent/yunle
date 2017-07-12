/*
Navicat MySQL Data Transfer

Source Server         : 小强的电脑
Source Server Version : 50553
Source Host           : 192.168.2.116:3306
Source Database       : cloud_car

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-12 14:31:53
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
  `status_id` varchar(255) NOT NULL DEFAULT '' COMMENT '动态信息id',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

-- ----------------------------
-- Records of cdc_act_detail
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_adminuser
-- ----------------------------
DROP TABLE IF EXISTS `cdc_adminuser`;
CREATE TABLE `cdc_adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cdc_adminuser
-- ----------------------------
INSERT INTO `cdc_adminuser` VALUES ('1', 'admin', '', '$2y$13$okaQ5ZgRblHS6UrKHjI9S.zwba3gSfhZLQzP7jNpxy8ozEUouq6cu', null, '', '10', '0', '0');

-- ----------------------------
-- Table structure for cdc_article
-- ----------------------------
DROP TABLE IF EXISTS `cdc_article`;
CREATE TABLE `cdc_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '文章题目',
  `author` varchar(50) NOT NULL DEFAULT '' COMMENT '文章作者',
  `brief` varchar(50) NOT NULL DEFAULT '' COMMENT '文章的简介',
  `content` text NOT NULL COMMENT '文章内容',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '文章状态 1 正常  0 禁用',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0 未分类 1公交车 2玩具车 3遥控车',
  `column_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属栏目id',
  `stick` tinyint(2) DEFAULT '0' COMMENT '置顶轮播状态 0:不置顶 1:置顶',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  `views` int(10) DEFAULT '100000' COMMENT '浏览量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cdc_article
-- ----------------------------
INSERT INTO `cdc_article` VALUES ('1', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '1', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('2', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '1', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('3', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '1', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('4', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '2', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('5', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '2', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('6', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '2', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('7', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '3', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('8', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '3', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('9', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '3', '0', '1498373820', '0', '100000');
INSERT INTO `cdc_article` VALUES ('10', '拯救', '龙龙', '啊哈哈哈哈', '<p>当您厌倦了城市的喧嚣与压抑，当您感到在钢筋水泥丛林里透不过气的时候，来吧，这里是属于您自己的地盘，蓝天白云，生机盎然，所有的疲惫与烦恼都将一扫而空。</p>', '1', '0', '1', '0', '1498373820', '0', '100000');

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

-- ----------------------------
-- Table structure for cdc_banner
-- ----------------------------
DROP TABLE IF EXISTS `cdc_banner`;
CREATE TABLE `cdc_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT 'banner名字',
  `describe` text COMMENT 'banner描述',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态 1:正常 0:禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
-- Records of cdc_banner
-- ----------------------------
INSERT INTO `cdc_banner` VALUES ('1', '小黄图', '安安安安', '1');

-- ----------------------------
-- Table structure for cdc_banner_img
-- ----------------------------
DROP TABLE IF EXISTS `cdc_banner_img`;
CREATE TABLE `cdc_banner_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL DEFAULT '0' COMMENT 'bannerID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='banner图片表';

-- ----------------------------
-- Records of cdc_banner_img
-- ----------------------------
INSERT INTO `cdc_banner_img` VALUES ('1', '1', '4654646465465489798132167987913213');

-- ----------------------------
-- Table structure for cdc_car
-- ----------------------------
DROP TABLE IF EXISTS `cdc_car`;
CREATE TABLE `cdc_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) DEFAULT NULL COMMENT '所属人id',
  `license_number` varchar(50) NOT NULL DEFAULT '' COMMENT '车牌号',
  `type` varchar(50) DEFAULT '' COMMENT '车辆类型',
  `owner` varchar(255) DEFAULT '' COMMENT '车辆所有人',
  `nature` varchar(50) DEFAULT '' COMMENT '使用性质',
  `brand_num` varchar(50) DEFAULT '' COMMENT '品牌型号',
  `discern_num` varchar(50) DEFAULT '' COMMENT '识别代号',
  `motor_num` varchar(50) DEFAULT '' COMMENT '发动机编号',
  `load_num` tinyint(6) DEFAULT '0' COMMENT '荷载人数',
  `sign_at` int(10) DEFAULT '0' COMMENT '注册日期',
  `certificate_at` int(10) DEFAULT '0' COMMENT '发证日期',
  `stick` tinyint(1) NOT NULL DEFAULT '0' COMMENT '车辆默认 0:不 1:默认',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
-- Records of cdc_car
-- ----------------------------
INSERT INTO `cdc_car` VALUES ('1', '2', '川A*123456', '小轿车', '龙龙', '个人', '特斯拉', '12312312', '12321312', '1', '1499999999', '1499999999', '0', '0', '0');
INSERT INTO `cdc_car` VALUES ('2', '1', '川A*111111', '小轿车', '龙龙', '私有', '特斯拉1', '21123123', '321321312', '0', '1488888888', '1488888888', '0', '0', '0');
INSERT INTO `cdc_car` VALUES ('3', '1', '川A*122222', '小轿车', '龙龙', '公司', '特斯拉2', '231321321', '312312', '0', '1477777777', '1477777777', '0', '0', '0');
INSERT INTO `cdc_car` VALUES ('4', '1', '川A*133333', '小轿车', '龙龙', '哈哈哈', '特斯拉3', '12312321', '321321321312', '0', '1497897897', '1497897897', '1', '0', '0');
INSERT INTO `cdc_car` VALUES ('5', '1', '川A*133333', '小轿车', '龙龙', '哈哈哈', '特斯拉4', '12312321', 'KFC', '4', '1497897897', '1497897897', '0', '1499501750', '0');

-- ----------------------------
-- Table structure for cdc_car_img
-- ----------------------------
DROP TABLE IF EXISTS `cdc_car_img`;
CREATE TABLE `cdc_car_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL DEFAULT '0' COMMENT '车车ID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
-- Records of cdc_car_img
-- ----------------------------
INSERT INTO `cdc_car_img` VALUES ('1', '2', '213213123123');
INSERT INTO `cdc_car_img` VALUES ('2', '2', '12312321321321');
INSERT INTO `cdc_car_img` VALUES ('3', '3', '123132132');
INSERT INTO `cdc_car_img` VALUES ('4', '4', '1321313');

-- ----------------------------
-- Table structure for cdc_circulation
-- ----------------------------
DROP TABLE IF EXISTS `cdc_circulation`;
CREATE TABLE `cdc_circulation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '流转名',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='流转类型名称表';

-- ----------------------------
-- Records of cdc_circulation
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_circulation_img
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
-- Records of cdc_circulation_img
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of cdc_column
-- ----------------------------
INSERT INTO `cdc_column` VALUES ('1', '花花', '的世界', '0', '0');
INSERT INTO `cdc_column` VALUES ('2', '草草', '的梦想', '0', '0');
INSERT INTO `cdc_column` VALUES ('3', '龙龙', '的内裤', '0', '0');

-- ----------------------------
-- Table structure for cdc_company
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
-- Records of cdc_company
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_driving_img
-- ----------------------------
DROP TABLE IF EXISTS `cdc_driving_img`;
CREATE TABLE `cdc_driving_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driving_license_id` int(11) NOT NULL DEFAULT '0' COMMENT '车车ID',
  `img_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '存放路径',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
-- Records of cdc_driving_license
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_identification
-- ----------------------------
DROP TABLE IF EXISTS `cdc_identification`;
CREATE TABLE `cdc_identification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) NOT NULL COMMENT '所属用户id',
  `name` varchar(50) DEFAULT '' COMMENT '公司名称或姓名',
  `licence` varchar(255) DEFAULT '' COMMENT '组织机构代码或身份证号',
  `sex` varchar(50) DEFAULT '' COMMENT '性别',
  `birthday` varchar(50) DEFAULT '' COMMENT '出生年月',
  `start_at` varchar(50) DEFAULT '' COMMENT '身份证生效时间',
  `end_at` varchar(50) DEFAULT '' COMMENT '身份证失效时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
-- Records of cdc_identification
-- ----------------------------
INSERT INTO `cdc_identification` VALUES ('1', '1', '龙龙', '142326199202165019', '男', '1992年10月1日', '1991年10月1日', '1993年10月1日');
INSERT INTO `cdc_identification` VALUES ('11', '2', '龙龙', '1231324656', '', '', '', '');
INSERT INTO `cdc_identification` VALUES ('12', '3', '龙龙', '1231324656', '', '', '', '');
INSERT INTO `cdc_identification` VALUES ('13', '5', '龙1', '1231324656', '', '', '', '');

-- ----------------------------
-- Table structure for cdc_identification_img
-- ----------------------------
DROP TABLE IF EXISTS `cdc_identification_img`;
CREATE TABLE `cdc_identification_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ident_id` int(10) DEFAULT '0' COMMENT '认证详情id',
  `img_path` varchar(255) DEFAULT '' COMMENT '图片地址',
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
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '险种名',
  `cost` int(10) unsigned NOT NULL COMMENT '价格',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
-- Records of cdc_insurance
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_insurance_order
-- ----------------------------
DROP TABLE IF EXISTS `cdc_insurance_order`;
CREATE TABLE `cdc_insurance_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) NOT NULL COMMENT '用户id',
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
-- Records of cdc_insurance_order
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_invitation_code
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
-- Records of cdc_invitation_code
-- ----------------------------
INSERT INTO `cdc_invitation_code` VALUES ('1', '2', 'J2K3A3', '0', '1499753475');

-- ----------------------------
-- Table structure for cdc_message_code
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
-- Records of cdc_message_code
-- ----------------------------
INSERT INTO `cdc_message_code` VALUES ('1', '17600204335', '127', '0', '1495553266');
INSERT INTO `cdc_message_code` VALUES ('2', '13116196373', '123456', '0', '1495553266');

-- ----------------------------
-- Table structure for cdc_migration
-- ----------------------------
DROP TABLE IF EXISTS `cdc_migration`;
CREATE TABLE `cdc_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cdc_migration
-- ----------------------------
INSERT INTO `cdc_migration` VALUES ('m000000_000000_base', '1499840648');
INSERT INTO `cdc_migration` VALUES ('m140602_111327_create_menu_table', '1499840650');
INSERT INTO `cdc_migration` VALUES ('m160312_050000_create_user', '1499840650');
INSERT INTO `cdc_migration` VALUES ('m140506_102106_rbac_init', '1499840814');

-- ----------------------------
-- Table structure for cdc_order
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order`;
CREATE TABLE `cdc_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order` varchar(100) NOT NULL DEFAULT '' COMMENT '订单号',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '订单状态 0:已取消 1:正常',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of cdc_order
-- ----------------------------

-- ----------------------------
-- Table structure for cdc_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `cdc_order_detail`;
CREATE TABLE `cdc_order_detail` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单id',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `car_id` int(10) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '类型 1:救援 2:审车 3:维修 4:保养 5:保险',
  `distributing` tinyint(1) NOT NULL DEFAULT '0' COMMENT '派单类型 0:自动 1:手动',
  `cost` tinyint(7) unsigned DEFAULT '0' COMMENT '价格',
  `pick` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否接车 0:否 1:接',
  `pick_at` int(10) DEFAULT '0' COMMENT '接车时间',
  `pick_addr` varchar(255) DEFAULT '' COMMENT '接车地点',
  `post` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否送车 0:否 1:接',
  `post_at` int(10) DEFAULT '0' COMMENT '送车时间',
  `post_addr` varchar(255) DEFAULT '' COMMENT '送车地点',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单详情表';

-- ----------------------------
-- Records of cdc_order_detail
-- ----------------------------

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
  `pid` int(10) DEFAULT '1' COMMENT '推荐人id',
  `role_id` int(10) DEFAULT '5' COMMENT 'role',
  `phone` varchar(50) DEFAULT '' COMMENT '电话',
  `password` varchar(80) DEFAULT NULL COMMENT '密码',
  `email` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `status` int(5) DEFAULT '1' COMMENT '状态 1:正常 0:冻结',
  `type` tinyint(2) DEFAULT '1' COMMENT '用户类型 1:个人用户 2:组织用户 3:服务端 4:平台',
  `curr_login_at` int(10) DEFAULT '0' COMMENT '最后登录时间',
  `curr_login_ip` varchar(50) DEFAULT NULL,
  `access_token` varchar(60) DEFAULT NULL,
  `created_at` int(18) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(18) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `access_token` (`access_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cdc_user
-- ----------------------------
INSERT INTO `cdc_user` VALUES ('1', '13116196373', '1', '5', '17600204335', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '1', '1499406472', '127.0.0.1', null, '1495553266', '1499406472');
INSERT INTO `cdc_user` VALUES ('2', 'manner', '1', '5', '17600204335', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '3', '1499753475', '127.0.0.1', null, '1495553266', '1499406472');
INSERT INTO `cdc_user` VALUES ('3', '17600204335', '2', '5', '131161963731', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '1', '1499406472', '127.0.0.1', null, '1495553266', '1499406472');
INSERT INTO `cdc_user` VALUES ('4', 'aaa', '2', '5', '131161963731', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '2', '1499406472', '127.0.0.1', null, '1495553266', '1499406472');
INSERT INTO `cdc_user` VALUES ('5', 'aaaa', '2', '5', '131161963731', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '1', '1499406472', '127.0.0.1', null, '1495553266', '1499406472');
INSERT INTO `cdc_user` VALUES ('6', '1231313', '2', '5', '131161963731', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '1', '1499406472', '127.0.0.1', null, '1499406472', '1499406472');
INSERT INTO `cdc_user` VALUES ('7', '1231231', '2', '5', '131161963731', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '1', '1499406472', '127.0.0.1', null, '1499406472', '1499406472');
INSERT INTO `cdc_user` VALUES ('8', '123131', '2', '5', '131161963731', '$2y$13$vknBz7miG4O.W.mlPBLFE.0vcKiqHvMcz1xKCoZTyTPRVfEBCvvHG', 'a@a.com', '1', '1', '1499406472', '127.0.0.1', null, '1499406472', '1499406472');
INSERT INTO `cdc_user` VALUES ('9', '17600204336', '2', '5', '17600204336', null, null, '1', '1', '0', null, null, '1499763935', null);
INSERT INTO `cdc_user` VALUES ('10', '17600204337', '2', '5', '17600204337', null, null, '1', '2', '0', null, null, '1499764014', null);

-- ----------------------------
-- Table structure for cdc_user_code
-- ----------------------------
DROP TABLE IF EXISTS `cdc_user_code`;
CREATE TABLE `cdc_user_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '使用者id',
  `code_id` int(10) NOT NULL DEFAULT '0' COMMENT '邀请码id',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '使用时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='邀请码消耗表';

-- ----------------------------
-- Records of cdc_user_code
-- ----------------------------
INSERT INTO `cdc_user_code` VALUES ('1', '1', '1', '1499753475');
INSERT INTO `cdc_user_code` VALUES ('2', '9', '1', '0');
INSERT INTO `cdc_user_code` VALUES ('3', '10', '1', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息认证图片表';

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of cdc_user_tag
-- ----------------------------
