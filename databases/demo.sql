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

 Date: 07/27/2017 18:34:18 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_detail` VALUES ('38', '35', '1', '', '1', '', '1500872209', '0'), ('39', '36', '1', '', '1', '', '1500872447', '0'), ('40', '37', '1', '', '1', '', '1500872737', '0'), ('41', '38', '1', '', '1', '', '1500872948', '0'), ('42', '39', '1', '', '1', '', '1500873030', '0'), ('43', '40', '1', '', '1', '', '1500873071', '0'), ('44', '41', '1', '', '1', '', '1500875348', '0'), ('45', '42', '1', '', '1', '', '1500875428', '0'), ('46', '42', '1000', '', '100', '已取消', '1500876031', '0'), ('47', '43', '1', '', '1', '', '1500986636', '0'), ('48', '51', '1', '', '1', '', '1500987085', '0'), ('49', '53', '1', '', '1', '', '1500987174', '0'), ('50', '54', '1', '', '1', '', '1500987254', '0'), ('51', '55', '1', '', '1', '', '1500987263', '0'), ('52', '56', '1', '', '1', '', '1500987276', '0'), ('53', '57', '1', '', '1', '', '1500987291', '0'), ('54', '58', '1', '', '1', '', '1500987481', '0'), ('55', '59', '1', '', '1', '', '1500987499', '0'), ('56', '60', '1', '', '1', '', '1500987513', '0'), ('57', '61', '1', '', '2', '', '1500987590', '0'), ('58', '62', '1', '', '2', '', '1500987690', '0'), ('59', '63', '1', '', '2', '', '1501032653', '0'), ('60', '64', '1', '', '1', '', '1501038914', '0'), ('61', '65', '1', '', '1', '', '1501038951', '0'), ('62', '66', '1', '', '1', '', '1501039158', '0'), ('63', '67', '1', '', '1', '', '1501039250', '0'), ('64', '68', '1', '', '1', '', '1501039449', '0'), ('65', '69', '1', '', '1', '', '1501039479', '0'), ('66', '70', '1', '', '1', '', '1501039501', '0'), ('67', '71', '1', '', '1', '', '1501040511', '0'), ('68', '72', '1', '', '1', '', '1501040710', '0'), ('69', '73', '1', '', '1', '', '1501040872', '0'), ('70', '74', '1', '', '1', '', '1501042261', '0'), ('71', '75', '1', '', '1', '', '1501048083', '0'), ('72', '76', '1', '', '1', '', '1501048127', '0'), ('73', '77', '1', '', '1', '', '1501048265', '0'), ('74', '78', '1', '', '1', '', '1501048405', '0'), ('75', '79', '1', '', '1', '', '1501048478', '0'), ('76', '80', '1', '', '1', '', '1501048563', '0'), ('77', '81', '1', '', '1', '', '1501049210', '0'), ('78', '82', '1', '', '1', '', '1501050271', '0'), ('79', '83', '1', '', '1', '', '1501050756', '0'), ('80', '84', '1', '', '1', '', '1501051553', '0'), ('81', '85', '1', '', '1', '', '1501053566', '0'), ('82', '86', '1', '', '1', '', '1501053917', '0'), ('83', '87', '1', '', '1', '', '1501054173', '0'), ('84', '88', '1', '', '1', '', '1501054712', '0'), ('85', '89', '1', '', '1', '', '1501054770', '0'), ('86', '90', '1', '', '1', '', '1501054866', '0'), ('87', '91', '1', '', '1', '', '1501054953', '0'), ('88', '92', '1', '', '1', '', '1501055937', '0'), ('89', '93', '1', '', '1', '', '1501056194', '0'), ('90', '94', '1', '', '1', '', '1501056403', '0'), ('91', '95', '1', '', '1', '', '1501056538', '0'), ('92', '96', '1', '', '1', '', '1501056589', '0'), ('93', '97', '1', '', '1', '', '1501056646', '0'), ('94', '98', '1', '', '1', '', '1501056715', '0'), ('95', '99', '1', '', '1', '', '1501056753', '0'), ('96', '100', '1', '', '1', '', '1501056804', '0'), ('97', '101', '1', '', '1', '', '1501056904', '0'), ('98', '102', '1', '', '1', '', '1501056942', '0'), ('99', '103', '1', '', '1', '', '1501056994', '0'), ('100', '104', '1', '', '1', '', '1501057145', '0'), ('101', '105', '1', '', '1', '', '1501057149', '0'), ('102', '106', '1', '', '1', '', '1501057202', '0'), ('103', '107', '1', '', '1', '', '1501057209', '0'), ('104', '108', '1', '', '1', '', '1501057410', '0'), ('105', '109', '1', '', '1', '', '1501057446', '0'), ('106', '110', '1', '', '1', '', '1501057554', '0'), ('107', '111', '1', '', '1', '', '1501057591', '0'), ('108', '112', '1', '', '1', '', '1501058551', '0'), ('109', '113', '1', '', '1', '', '1501058769', '0'), ('110', '114', '1', '', '1', '', '1501060358', '0'), ('111', '115', '1', '', '1', '', '1501060504', '0'), ('112', '116', '1', '', '2', '', '1501060546', '0'), ('113', '117', '1', '', '1', '', '1501060569', '0'), ('114', '118', '1', '', '1', '', '1501061170', '0'), ('115', '119', '1', '', '1', '', '1501061278', '0'), ('116', '120', '1', '', '1', '', '1501061876', '0'), ('117', '121', '1', '', '1', '', '1501061910', '0'), ('118', '122', '1', '', '1', '', '1501066149', '0'), ('119', '123', '1', '', '1', '', '1501066174', '0'), ('120', '124', '1', '', '1', '', '1501067190', '0'), ('121', '124', '1', '', '100', '已取消', '1501067614', '0'), ('122', '125', '1', '', '1', '', '1501119535', '0'), ('123', '126', '1', '', '1', '', '1501121139', '0'), ('124', '126', '1', '', '100', '已取消', '1501121307', '0'), ('125', '127', '1', '', '1', '', '1501121750', '0'), ('126', '128', '1', '', '1', '', '1501126433', '0'), ('127', '129', '1', '', '1', '', '1501126546', '0'), ('128', '130', '1', '', '2', '', '1501126804', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='动态节点图片表';

-- ----------------------------
--  Records of `cdc_act_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_img` VALUES ('1', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
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
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '状态\r\n1.待审核 2.待确认 3.确认购买 4.已付款  99.已完成 98.审核失败 100.已取消',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='保险订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_insurance` VALUES ('1', '49', '1', '王八蛋', '1', '', '1500882178', '0'), ('2', '49', '1', '王八蛋', '97', '取消', '1500882179', '0'), ('3', '50', '1', '王八蛋', '1', '取消', '1500882178', '0'), ('4', '51', '1', '王八蛋', '97', '取消', '1500882178', '0'), ('5', '51', '1', '王八蛋', '100', '取消', '1500882179', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='平台用户图片表';

-- ----------------------------
--  Records of `cdc_adminuser_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_adminuser_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
COMMIT;

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
  `content` text NOT NULL COMMENT '文章内容',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '文章状态 1 正常  0 禁用',
  `column_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属栏目id',
  `views` int(10) DEFAULT '100000' COMMENT '浏览量',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_article`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_article` VALUES ('1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '1', '11', '0', '0'), ('2', '1', '1', '<p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;2016年3月21日，剑桥季幼儿英语教育专家讲学盛典北京站在汉华国际酒店完美落幕。</span></p><p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">本次大会是由东方之星学前教育机构和剑桥大学出版社联合举办，旨在与来自全国各地的园长、老师及新老合作伙伴齐聚一堂，聚焦幼儿英语，共同探讨幼儿英语教育全球发展现状与趋势。</span></p><p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">东方之星学前教育机构课程总监张颖男女士与剑桥大学高级培训师、教学代表Gavin Biggs先生出席会议并做了致辞。他们纷纷对参会者表示热烈欢迎。</span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297096.png\" title=\"1471928504.png\" alt=\"1.png\"/></p></td><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><br/></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297099.png\" title=\"1471928511.png\" alt=\"2.png\"/></p></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; 接下来由剑桥大学出版社英语教育专家Herbert Puchta博士在座的各位来宾分享国际化视野下的幼儿英语教育现状与趋势，Herbert Puchta博士作为知名神经语言学、认知心理学应用大师，利用这次机会，也和参会者进行了神经语言学在英语教学应用的交流和点拨。</span><span style=\"font-size: 10px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 16px;\"><img src=\"https://7.iyours.com.cn/14719297115.png\" title=\"1471928587.png\" alt=\"3.png\"/></span></p><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;Herbert Puchta博士现场幽默风趣的演讲、生动的课堂演绎及深入浅出的精彩剖析，获得了与会者的阵阵掌声。演讲结束后，Herbert Puchta博士现场抽出3位Super Hero，并为他们颁发了奖品——由他亲笔签名的Super Safari原版教材。</span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><img src=\"https://7.iyours.com.cn/14719297116.png\" title=\"1471928605.png\" alt=\"4.png\" style=\"white-space: normal;\"/></td><td width=\"140\" valign=\"top\"><br/></td><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><img src=\"https://7.iyours.com.cn/14719297127.png\" title=\"1471928614.png\" alt=\"5.png\" style=\"white-space: normal;\"/></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; text-align: left;\">Super Safari是剑桥大学出版社最新出版的幼儿英语课程，那它到底是一套怎样的课程呢？为了让参会老师充分了解课程内容及其独特的课程魅力，来自东方之星学前教育机构的Coco、Susie两位老师带领着大家进行了一场精彩的课程体验，参与体验的老师纷纷表达了对Super Safari的认可和喜爱。</span><br/></p><p style=\"text-align: center;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 16px;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297133.png\" title=\"1471929017.png\" alt=\"6.png\"/></p></td><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><p><br/></p></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297148.png\" title=\"1471929026.png\" alt=\"7.png\"/></p></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;你肯定会疑问，东方之星作为Super Safari在中国大陆的独家代理在课程落地的过程中会给合作伙伴提供哪些服务和支持？在本次会议上，东方之星英语课程中心市场负责人张瑞林进行了解读！<span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span><br/><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></span></p><p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;整场活动伴随着大家的掌声、笑声和满满的收获接近尾声。许多意犹未尽的老师们纷纷去咨询台体验课程并咨询合作事宜。</span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297155.png\" title=\"1471928916.png\" alt=\"9.png\" width=\"329\" height=\"253\" style=\"width: 329px; height: 253px;\"/></p></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297161.png\" title=\"1471928928.png\" alt=\"10.png\" width=\"333\" height=\"251\" style=\"width: 333px; height: 251px;\"/></p></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297168.png\" title=\"1471928938.png\" alt=\"8.png\" width=\"336\" height=\"250\" style=\"width: 336px; height: 250px;\"/></p></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; 本次会议，为满足场外老师们强烈听课的愿望，东方之星特意开通了微信直播平台。数千名场外园长、老师纷纷在平台上留言，表示了对东方之星和剑桥大学出版社的感谢。</span><span style=\"font-size: 10px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p>', '1', '1', '12', '0', '0'), ('3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '1', '13', '0', '0'), ('4', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '1', '14', '0', '0'), ('5', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '21', '0', '0'), ('6', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '22', '0', '0'), ('7', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '23', '0', '0'), ('8', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '24', '0', '0'), ('9', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '25', '0', '0'), ('10', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '31', '0', '0'), ('11', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '32', '0', '0'), ('12', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '33', '0', '0'), ('13', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '34', '0', '0'), ('14', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '35', '0', '0'), ('18', '123', '123', '123', '1', '123', '123', '1501062424', '1501062424'), ('19', '123', '1123', '123', '1', '123', '123', '1501062442', '1501062442'), ('16', '123', '123', '123', '1', '123', '123', '0', '0'), ('20', '123', '123', '123', '1', '123', '123', '1501062465', '1501062465'), ('21', '123', '123', '123', '1', '123', '123', '1501062489', '1501062489'), ('22', '123', '123', '123', '1', '123', '123', '1501062516', '1501062516'), ('17', '123', '123', '123', '1', '123', '123', '0', '0'), ('15', '123', '123', '123', '1', '123', '123', '0', '0');
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
INSERT INTO `cdc_banner_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('2', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('3', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
--  Records of `cdc_car`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car` VALUES ('1', '1', '川A*111111', '遥控车', 'x小强', '吊萝莉', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '1', '0', '1500000001', '0'), ('2', '1', '川C*222222', '玩具车', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1', '1500000002', '0'), ('3', '2', '川D*333333', '平板车', '龙宝宝', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1', '1500000003', '0'), ('4', '1', '川E*444444', '小平车', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1', '1500000004', '0'), ('6', '1', '川F*666666', 'SUV', 'x小明', '把妹', '特斯拉', '5757124AA', '666', '5', '2017年1月1日', '2017年1月1日', '0', '1', '1500000006', '0'), ('25', '2', '川G*123465', '推土车', '小勇', '玩摇滚', '特斯拉SUV', '132456BB', '666', '1', '2017年1月1日', '2017年1月1日', '0', '1', '1501124228', '0'), ('29', '2', '川H*123465', '推土车', '小勇', '玩摇滚', '特斯拉SUV', '132456BB', '666', '0', '2017年1月1日', '2017年1月1日', '0', '1', '1501124626', '0'), ('30', '2', '川I*123465', '推土车', '小勇', '玩摇滚', '特斯拉SUV', '132456BB', '666', '0', '2017年1月1日', '2017年1月1日', '0', '1', '1501124679', '0'), ('31', '2', '川J*123465', '推土车', '小勇', '玩摇滚', '特斯拉SUV', '132456BB', '666', '0', '2017年1月1日', '2017年1月1日', '0', '1', '1501125391', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
--  Records of `cdc_car_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '0', '0'), ('2', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '0', '0'), ('4', '25', '/public/upload/car_imgs/2017-07-27/69bc2908140988b01d21ba717f912b10af2586b6.jpg', '1501124228', '0'), ('5', '25', '/public/upload/car_imgs/2017-07-27/ebfe5024bcf19cbec001e9f3b6eb37c7d746a324.jpg', '1501124228', '0'), ('6', '25', '/public/upload/car_imgs/2017-07-27/0a62615aff0a3c1fc688f7e2ee3d845f7687ef08.jpg', '1501124228', '0'), ('7', '29', '/public/upload/car_imgs/2017-07-27/17d17aec0d6115204f680cd903436f62a618293f.jpg', '1501124626', '0'), ('8', '29', '/public/upload/car_imgs/2017-07-27/c8fc9d7c5f845197c7ceced5a49ac98480442569.jpg', '1501124626', '0'), ('9', '29', '/public/upload/car_imgs/2017-07-27/18315b57ab1abc375c17c64a9734a97939dc3d9d.jpg', '1501124626', '0'), ('10', '30', '/public/upload/car_imgs/2017-07-27/9f5f320fb87969ddcdbe174b5f827056e1cb3cb6.jpg', '1501124679', '0'), ('11', '30', '/public/upload/car_imgs/2017-07-27/7c5069d28d0ef021409e42aa169ff817ec6c8d6d.jpg', '1501124679', '0'), ('12', '30', '/public/upload/car_imgs/2017-07-27/81fb413cc64b79e8e530021eff6405a90b648b77.jpg', '1501124679', '0'), ('13', '31', '/public/upload/car_imgs/2017-07-27/b43e34c210c583d3cf09deadeb9c34611f6c848d.jpg', '1501125391', '0'), ('14', '31', '/public/upload/car_imgs/2017-07-27/d80c1e13716913a5102514a1385487d6dd6f9f78.jpg', '1501125391', '0'), ('15', '31', '/public/upload/car_imgs/2017-07-27/ba50584dc8796988f7a83e61a4319aff28e9177e.jpg', '1501125391', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='驾驶证照片表';

-- ----------------------------
--  Records of `cdc_driving_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
--  Records of `cdc_driving_license`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_license` VALUES ('1', '1', '龙龙责任有限公司', '男', '美国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日', '1', null, null), ('2', '1', '龙龙责任有限公司', '男', '中国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日', '1', null, null), ('3', '1', '龙龙责任有限公司', '男', '中国', '131231313', '1992年2月2日', '1992年2月3日', 'C1', '1992年2月5日', '1992年2月6日', '1', null, null);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='认证图片表';

-- ----------------------------
--  Records of `cdc_identification_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0'), ('2', '2', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0'), ('3', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0'), ('4', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='保险订单动态图标';

-- ----------------------------
--  Records of `cdc_insurance_actimg`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_actimg` VALUES ('1', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='保险公司表';

-- ----------------------------
--  Records of `cdc_insurance_company`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_company` VALUES ('6', '中国人寿', '这是一家很好的公司', '1501122798', '1501122798'), ('7', '中国平安', '这是中国平安公司,我修改了东西', '1501122826', '1501141994');
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
  `action` varchar(50) DEFAULT '' COMMENT '最新动态',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='保险订单绑定详情表';

-- ----------------------------
--  Records of `cdc_insurance_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_detail` VALUES ('16', '49', '1', '1', '核保成功', '0', '0'), ('17', '50', '1', '1', '核保失败', '0', '0'), ('18', '51', '1', '1', '核保成功', '0', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
--  Records of `cdc_member`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member` VALUES ('1', '17600204335', '1', null, '1', '1', '1501144027', '127.0.0.1', null, '1500003853', '1500950240', '1500966260'), ('2', '13111111111', '2', null, '1', '2', '1500889172', '127.0.0.1', null, '1500003853', null, null), ('3', '', '1', null, '1', '1', '0', null, null, '1500899596', '1500899596', '1500972273'), ('4', '13812345678', '1', null, '0', '2', '0', null, null, '1500899601', '1500968306', '1501120583'), ('5', '138123475860', '1', null, '0', '1', '0', null, null, '1500899613', '1500968051', '1501120598'), ('6', '', '1', null, '1', '1', '0', null, null, '1500899634', '1500899634', '1500967207'), ('7', '112355123', '1', null, '1', '1', '0', null, null, '1500899655', '1500968059', null), ('8', '13812345600', '1', null, '1', '1', '0', null, null, '1500899662', '1500950631', null), ('9', '13812345000', '1', null, '1', '1', '0', null, null, '1500899728', '1500950644', '1500967309'), ('10', '13812345678', '1', null, '1', '1', '0', null, null, '1500945190', '1500945190', '1500967160'), ('11', '13812345678', '1', null, '1', '1', '0', null, null, '1500946840', '1500946840', '1500967127'), ('12', '1381234567', '1', null, '1', '1', '0', null, null, '1500947015', '1500947015', '1500967121'), ('13', '123123', '1', null, '1', '1', '0', null, null, '1500947090', '1500947090', '1500967045'), ('18', '13161672102', '1', null, '1', '0', '1501063350', '192.168.2.142', null, '1500970133', null, null), ('19', '123', '1', null, '1', '1', '0', null, null, '1501037239', '1501037239', '1501121969'), ('20', '123', '1', null, '1', '1', '0', null, null, '1501037348', '1501037348', null), ('21', '1233', '1', null, '1', '1', '0', null, null, '1501037550', '1501037550', null), ('22', '1233', '1', null, '1', '1', '0', null, null, '1501037619', '1501037619', null), ('23', '1233', '1', null, '1', '1', '0', null, null, '1501037685', '1501037685', '1501122590'), ('24', '', '1', null, '1', '1', '0', null, null, '1501120426', '1501120426', '1501121979'), ('25', '', '1', null, '1', '1', '0', null, null, '1501121986', '1501121986', '1501121994');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户图片表';

-- ----------------------------
--  Records of `cdc_member_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

-- ----------------------------
--  Records of `cdc_message_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_message_code` VALUES ('1', '17600204335', '111111', '0', '1500000000', '0'), ('2', '13111111111', '123456', '0', '1500000000', '0'), ('3', '13161672102', '111111', '0', '0', '0'), ('4', '17600204334', '111111', '0', '0', '0');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COMMENT='服务端消息通知表';

-- ----------------------------
--  Records of `cdc_notice`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_notice` VALUES ('6', 'user', '1', '您成功邀请一位新会员，手机号：【13161672102】', '0', '0'), ('7', 'user', '1', '您的会员【龙龙】的车辆【川B*111111】信息更改请求通过', '1500987590', '0'), ('8', 'member', '1', '您的车辆【川B*111111】信息更改请求通过', '1500987590', '0'), ('9', 'user', '1', '您的会员【龙龙】创建了一个【川B*111111】订单，订单号：【A726389143433072】', '1501038914', '0'), ('10', 'user', '1', '您的会员【龙龙】创建了一个【5】订单，订单号：【A726389512414119】', '1501038951', '0'), ('11', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726391579472317】', '1501039158', '0'), ('12', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726392503285218】', '1501039250', '0'), ('13', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726394489318805】', '1501039449', '0'), ('14', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726394793716254】', '1501039479', '0'), ('15', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726395016718981】', '1501039502', '0'), ('16', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726405113526471】', '1501040511', '0'), ('17', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726407107700554】', '1501040711', '0'), ('18', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726408719692703】', '1501040872', '0'), ('19', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726422617187613】', '1501042262', '0'), ('20', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726480832897308】', '1501048083', '0'), ('21', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726481276362735】', '1501048127', '0'), ('22', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726482648131284】', '1501048265', '0'), ('23', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726484051281435】', '1501048405', '0'), ('24', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726484785663455】', '1501048478', '0'), ('25', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726485636162184】', '1501048563', '0'), ('26', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726492098701774】', '1501049210', '0'), ('27', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726502708798637】', '1501050271', '0'), ('28', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726507560316129】', '1501050756', '0'), ('29', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726515530731921】', '1501051553', '0'), ('30', 'user', '1', '您的会员【龙龙】创建了一个【4】订单，订单号：【A726535668043739】', '1501053567', '0'), ('31', 'user', '1', '您的会员【龙龙】创建了一个【4】订单，订单号：【A726539176944459】', '1501053918', '0'), ('32', 'user', '1', '您的会员【龙龙】创建了一个【4】订单，订单号：【A726541737920948】', '1501054174', '0'), ('33', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726547125139068】', '1501054712', '0'), ('34', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726547703032132】', '1501054770', '0'), ('35', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726548664177128】', '1501054866', '0'), ('36', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726549532616722】', '1501054953', '0'), ('37', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726559375019717】', '1501055937', '0'), ('38', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726561938196331】', '1501056194', '0'), ('39', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726564032456150】', '1501056403', '0'), ('40', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726565378193096】', '1501056538', '0'), ('41', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726565888562277】', '1501056589', '0'), ('42', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726566463405132】', '1501056646', '0'), ('43', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726567150244442】', '1501056715', '0'), ('44', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726567530706220】', '1501056753', '0'), ('45', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726568042225468】', '1501056804', '0'), ('46', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726569042202624】', '1501056904', '0'), ('47', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726569422604417】', '1501056942', '0'), ('48', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726569939163935】', '1501056994', '0'), ('49', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726574106822323】', '1501057411', '0'), ('50', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A726574466332903】', '1501057447', '0'), ('51', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726575541724415】', '1501057554', '0'), ('52', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726575911025593】', '1501057591', '0'), ('53', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726585514954853】', '1501058551', '0'), ('54', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726587695979613】', '1501058769', '0'), ('55', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726603581358155】', '1501060358', '0'), ('56', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726605040281618】', '1501060504', '0'), ('57', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726605465785953】', '1501060546', '0'), ('58', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726605693669040】', '1501060569', '0'), ('59', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726611703502747】', '1501061170', '0'), ('60', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726612780954371】', '1501061278', '0'), ('61', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726618763776569】', '1501061876', '0'), ('62', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726619102665978】', '1501061910', '0'), ('63', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726661491800427】', '1501066149', '0'), ('64', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726661744404948】', '1501066174', '0'), ('65', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A726671903375926】', '1501067190', '0'), ('66', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A727195349999368】', '1501119535', '0'), ('67', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A727211393296909】', '1501121139', '0'), ('68', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A727217498076145】', '1501121750', '0'), ('69', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A727264333294919】', '1501126433', '0'), ('70', 'user', '1', '您的会员【龙龙】创建了一个【1】订单，订单号：【A727265465039687】', '1501126546', '0'), ('71', 'user', '1', '您的会员【龙龙】创建了一个【2】订单，订单号：【A727268041247017】', '1501126804', '0');
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
  `pick_at` int(10) DEFAULT '0' COMMENT '接车时间',
  `pick_addr` varchar(255) DEFAULT '' COMMENT '接车地点',
  `distributing` tinyint(2) DEFAULT '0' COMMENT '派单类型 0:自动 1:手动',
  `service` varchar(255) DEFAULT '' COMMENT '服务商',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '完成时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COMMENT='订单快照表';

-- ----------------------------
--  Records of `cdc_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order` VALUES ('35', 'A724722094882651', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '昂恪皇家4S店', '0.00', '1500872209', '0'), ('36', 'A724724468588303', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '1', '', '0.00', '1500872446', '0'), ('37', 'A724727368894285', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '1', '', '0.00', '1500872736', '0'), ('38', 'A724729487345426', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500872948', '0'), ('39', 'A724730303482159', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500873030', '0'), ('40', 'A724730715995719', '5', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '', '0.00', '1500873071', '0'), ('41', 'A724753485228069', '3', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '昂恪皇家4S店', '0.00', '1500875348', '0'), ('42', 'A724754278233312', '2', '龙龙', '17600204335', '川A·10000', '1', '2017', '天府大道北段1656', '0', '龙龙高逼格4S店', '0.00', '1500875427', '0'), ('43', 'A725866367659601', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '1', '服务商名字', '0.00', '1500986636', '0'), ('51', 'A725870856496460', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '1', '啊啊啊', '0.00', '1500987085', '0'), ('53', 'A725871746687377', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '1', '啊啊啊', '0.00', '1500987174', '0'), ('54', 'A725872547833129', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '0', '啊啊啊', '0.00', '1500987254', '0'), ('55', 'A725872631157950', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '0', '啊啊啊', '0.00', '1500987263', '0'), ('56', 'A725872761705302', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '0', '啊啊啊', '0.00', '1500987276', '0'), ('57', 'A725872916264214', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-W区', '0', '啊啊啊', '0.00', '1500987291', '0'), ('58', 'A725874816402939', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1500987481', '0'), ('59', 'A725874989222792', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1500987498', '0'), ('60', 'A725875136581202', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1500987513', '0'), ('61', 'A725875902615061', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1500987590', '0'), ('62', 'A725876898531990', '5', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1500987689', '0'), ('63', 'A726326532891922', '5', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501032653', '0'), ('64', 'A726389143433072', '5', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501038914', '0'), ('65', 'A726389512414119', '5', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501038951', '0'), ('66', 'A726391579472317', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501039158', '0'), ('67', 'A726392503285218', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501039250', '0'), ('68', 'A726394489318805', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501039449', '0'), ('69', 'A726394793716254', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501039479', '0'), ('70', 'A726395016718981', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501039501', '0'), ('71', 'A726405113526471', '1', '龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501040511', '0'), ('72', 'A726407107700554', '1', '要', '17600204365', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501040710', '0'), ('73', 'A726408719692703', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501040872', '0'), ('74', 'A726422617187613', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501042261', '0'), ('75', 'A726480832897308', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501048083', '0'), ('76', 'A726481276362735', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501048127', '0'), ('77', 'A726482648131284', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501048264', '0'), ('78', 'A726484051281435', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501048405', '0'), ('79', 'A726484785663455', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501048478', '0'), ('80', 'A726485636162184', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501048563', '0'), ('81', 'A726492098701774', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '定位中，请稍后...', '0', '', '0.00', '1501049209', '0'), ('82', 'A726502708798637', '2', '龙龙', '17600204335', '川B*555555', '1', '0', '环球中心-S1', '0', '', '0.00', '1501050270', '0'), ('83', 'A726507560316129', '2', '龙龙', '17600204335', '川B*111111', '0', '2017', '环球中心-S1', '0', '', '0.00', '1501050756', '0'), ('84', 'A726515530731921', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '苏家庙', '0', '', '0.00', '1501051553', '0'), ('85', 'A726535668043739', '4', '龙龙', '17600204335', '川B*111111', '4', '2017', '环球中心-S1', '0', '', '0.00', '1501053566', '0'), ('86', 'A726539176944459', '4', '龙龙', '17600204335', '川B*111111', '5', '2017', '环球中心-S1', '0', '', '0.00', '1501053917', '0'), ('87', 'A726541737920948', '4', '龙龙', '17600204335', '川B*111111', '4', '2017', '环球中心-S1', '0', '', '0.00', '1501054173', '0'), ('88', 'A726547125139068', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '1', '服务商名字', '0.00', '1501054712', '0'), ('89', 'A726547703032132', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '1', '服务商名字', '0.00', '1501054770', '0'), ('90', 'A726548664177128', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '1', '服务商名字', '0.00', '1501054866', '0'), ('91', 'A726549532616722', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '0', '', '0.00', '1501054953', '0'), ('92', 'A726559375019717', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '0', '', '0.00', '1501055937', '0'), ('93', 'A726561938196331', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056193', '0'), ('94', 'A726564032456150', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056403', '0'), ('95', 'A726565378193096', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056537', '0'), ('96', 'A726565888562277', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056588', '0'), ('97', 'A726566463405132', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056646', '0'), ('98', 'A726567150244442', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056715', '0'), ('99', 'A726567530706220', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056753', '0'), ('100', 'A726568042225468', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056804', '0'), ('101', 'A726569042202624', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056904', '0'), ('102', 'A726569422604417', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056942', '0'), ('103', 'A726569939163935', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501056993', '0'), ('104', 'A726571457410860', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501057145', '0'), ('105', 'A726571496753087', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501057149', '0'), ('106', 'A726572019332915', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501057202', '0'), ('107', 'A726572096097323', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501057209', '0'), ('108', 'A726574106822323', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '0', '', '0.00', '1501057410', '0'), ('109', 'A726574466332903', '2', '龙龙', '17600204335', '川B*111111', '1', '2017', '环球中心-S1', '0', '', '0.00', '1501057446', '0'), ('110', 'A726575541724415', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501057554', '0'), ('111', 'A726575911025593', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501057591', '0'), ('112', 'A726585514954853', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501058551', '0'), ('113', 'A726587695979613', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501058769', '0'), ('114', 'A726603581358155', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '定位中，请稍后...', '0', '', '0.00', '1501060358', '0'), ('115', 'A726605040281618', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501060504', '0'), ('116', 'A726605465785953', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501060546', '0'), ('117', 'A726605693669040', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501060569', '0'), ('118', 'A726611703502747', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501061170', '0'), ('119', 'A726612780954371', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501061278', '0'), ('120', 'A726618763776569', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '', '0.00', '1501061876', '0'), ('121', 'A726619102665978', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '服务商名字', '0.00', '1501061910', '0'), ('122', 'A726661491800427', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '1', '服务商名字', '0.00', '1501066149', '0'), ('123', 'A726661744404948', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '1', '服务商名字', '0.00', '1501066174', '0'), ('124', 'A726671903375926', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '服务商名字', '0.00', '1501067190', '0'), ('125', 'A727195349999368', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '服务商名字', '0.00', '1501119535', '0'), ('126', 'A727211393296909', '1', '龙龙', '17600204335', '川B-444444', '1', '0', '兴业银行(环球中心支行)', '0', '啊啊啊', '0.00', '1501121139', '0'), ('127', 'A727217498076145', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '定位中，请稍后...', '0', '服务商名字', '0.00', '1501121749', '0'), ('128', 'A727264333294919', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '服务商名字', '0.00', '1501126433', '0'), ('129', 'A727265465039687', '1', '龙龙', '17600204335', '川B*111111', '1', '0', '环球中心-S1', '0', '服务商名字', '0.00', '1501126546', '0'), ('130', 'A727268041247017', '2', '龙龙', '17600204335', '川F*111111', '1', '2017', '兴业银行(环球中心支行)', '1', '服务商名字', '0.00', '1501126804', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COMMENT='订单详情表';

-- ----------------------------
--  Records of `cdc_order_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order_detail` VALUES ('11', '35', '1', '1', '1', '待接单', '0', '0'), ('12', '36', '1', '1', '1', '待接单', '0', '0'), ('13', '37', '1', '1', '1', '待接单', '0', '0'), ('14', '38', '1', '1', '1', '待接单', '0', '0'), ('15', '39', '1', '1', '1', '待接单', '0', '0'), ('16', '40', '1', '1', '1', '待接单', '0', '0'), ('17', '41', '1', '1', '1', '待接单', '0', '0'), ('18', '42', '1', '1', '2', '待接单', '0', '0'), ('19', '43', '1', '1', '1', '待接单', '1500986636', '0'), ('20', '51', '1', '1', '2', '待接单', '1500987085', '0'), ('21', '53', '1', '1', '2', '待接单', '1500987174', '0'), ('22', '54', '1', '1', null, '待接单', '1500987254', '0'), ('23', '55', '1', '1', null, '待接单', '1500987263', '0'), ('24', '56', '1', '1', null, '待接单', '1500987276', '0'), ('25', '57', '1', '1', null, '待接单', '1500987291', '0'), ('26', '58', '1', '1', null, '待接单', '1500987481', '0'), ('27', '59', '1', '1', null, '待接单', '1500987499', '0'), ('28', '60', '1', '1', null, '待接单', '1500987513', '0'), ('29', '61', '1', '1', null, '待接单', '1500987590', '0'), ('30', '62', '1', '1', null, '待接单', '1500987689', '0'), ('31', '63', '1', '1', null, '待接单', '1501032653', '0'), ('32', '64', '1', '1', null, '待接单', '1501038914', '0'), ('33', '65', '1', '1', null, '待接单', '1501038951', '0'), ('34', '66', '1', '1', null, '待接单', '1501039158', '0'), ('35', '67', '1', '1', null, '待接单', '1501039250', '0'), ('36', '68', '1', '1', null, '待接单', '1501039449', '0'), ('37', '69', '1', '1', null, '待接单', '1501039479', '0'), ('38', '70', '1', '1', null, '待接单', '1501039501', '0'), ('39', '71', '1', '1', null, '待接单', '1501040511', '0'), ('40', '72', '1', '1', null, '待接单', '1501040710', '0'), ('41', '73', '1', '1', null, '待交车', '1501040872', '0'), ('42', '74', '1', '1', null, '待交车', '1501042261', '0'), ('43', '75', '1', '1', null, '待交车', '1501048083', '0'), ('44', '76', '1', '1', null, '待交车', '1501048127', '0'), ('45', '77', '1', '1', null, '待交车', '1501048264', '0'), ('46', '78', '1', '1', null, '待交车', '1501048405', '0'), ('47', '79', '1', '1', null, '待交车', '1501048478', '0'), ('48', '80', '1', '1', null, '待交车', '1501048563', '0'), ('49', '81', '1', '1', null, '待交车', '1501049210', '0'), ('50', '82', '5', '1', null, '待交车', '1501050271', '0'), ('51', '83', '1', '1', null, '待交车', '1501050756', '0'), ('52', '84', '1', '1', null, '待交车', '1501051553', '0'), ('53', '85', '1', '1', null, '待交车', '1501053566', '0'), ('54', '86', '1', '1', null, '待交车', '1501053917', '0'), ('55', '87', '1', '1', null, '待交车', '1501054173', '0'), ('56', '88', '1', '1', '1', '待交车', '1501054712', '0'), ('57', '89', '1', '1', '1', '待交车', '1501054770', '0'), ('58', '90', '1', '1', '1', '待交车', '1501054866', '0'), ('59', '91', '1', '1', null, '待交车', '1501054953', '0'), ('60', '92', '1', '1', null, '待交车', '1501055937', '0'), ('61', '93', '1', '1', null, '待交车', '1501056193', '0'), ('62', '94', '1', '1', null, '待交车', '1501056403', '0'), ('63', '95', '1', '1', null, '待交车', '1501056537', '0'), ('64', '96', '1', '1', null, '待交车', '1501056588', '0'), ('65', '97', '1', '1', null, '待接单', '1501056646', '0'), ('66', '98', '1', '1', null, '待接单', '1501056715', '0'), ('67', '99', '1', '1', null, '待接单', '1501056753', '0'), ('68', '100', '1', '1', null, '待接单', '1501056804', '0'), ('69', '101', '1', '1', null, '待接单', '1501056904', '0'), ('70', '102', '1', '1', null, '待接单', '1501056942', '0'), ('71', '103', '1', '1', null, '待接单', '1501056994', '0'), ('72', '104', '1', '1', null, '待接单', '1501057145', '0'), ('73', '105', '1', '1', null, '待接单', '1501057149', '0'), ('74', '106', '1', '1', null, '待接单', '1501057202', '0'), ('75', '107', '1', '1', null, '待接单', '1501057209', '0'), ('76', '108', '1', '1', null, '待接单', '1501057410', '0'), ('77', '109', '1', '1', null, '待接单', '1501057446', '0'), ('78', '110', '1', '1', null, '待接单', '1501057554', '0'), ('79', '111', '1', '1', null, '待接单', '1501057591', '0'), ('80', '112', '1', '1', null, '待接单', '1501058551', '0'), ('81', '113', '1', '1', null, '待接单', '1501058769', '0'), ('82', '114', '1', '1', null, '待接单', '1501060358', '0'), ('83', '115', '1', '1', null, '带交车', '1501060504', '0'), ('84', '116', '1', '1', null, '带交车', '1501060546', '0'), ('85', '117', '1', '1', null, '带交车', '1501060569', '0'), ('86', '118', '1', '1', null, '带交车', '1501061170', '0'), ('87', '119', '1', '1', null, '带交车', '1501061278', '0'), ('88', '120', '1', '1', null, '带交车', '1501061876', '0'), ('89', '121', '1', '1', '3', '带交车', '1501061910', '0'), ('90', '122', '1', '1', '7', '带交车', '1501066149', '0'), ('91', '123', '1', '1', '7', '带交车', '1501066174', '0'), ('92', '124', '1', '1', '3', '带交车', '1501067190', '0'), ('93', '125', '1', '1', '3', '带交车', '1501119535', '0'), ('94', '126', '4', '1', '2', '带交车', '1501121139', '0'), ('95', '127', '1', '1', '1', '带交车', '1501121749', '0'), ('96', '128', '1', '1', '3', '带交车', '1501126433', '0'), ('97', '129', '1', '1', '3', '带交车', '1501126546', '0'), ('98', '130', '1', '1', '1', '带交车', '1501126804', '0');
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
INSERT INTO `cdc_service` VALUES ('1', '服务商名字', '小强', '10086', '简介', '成都市武侯区环球中心', '38', '106', '3', '1', '0', '0', '1500710364', '1500710364'), ('3', '服务商名字', '小强', '10086', '简介', '成都市武侯区环球中心', '38', '104', '3', '1', '0', '0', '1500710364', '1500710364'), ('4', '服务商名字', '小强', '10086', '简介', '成都市武侯区环球中心', '38', '103', '3', '1', '0', '0', '1500710364', '1500710364'), ('5', '啊啊啊', '龙龙', '10010', '简介', '成都啊啊啊', '38', '102', '4', '1', '0', '0', '1500710364', '1500710364'), ('6', '啊啊啊', '龙龙', '10010', '简介', '成都啊啊啊', '38', '100', '5', '1', '0', '0', '1500710364', '1500710364'), ('7', '服务商名字', '小强', '10086', '简介', '成都市武侯区环球中心', '38', '101', '5', '1', '0', '0', '1500710364', '1500710364'), ('2', '啊啊啊', '龙龙', '10010', '简介', '成都啊啊啊', '38', '105', '4', '1', '0', '0', '1500710364', '1500710364');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='服务商图';

-- ----------------------------
--  Records of `cdc_service_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_img` VALUES ('1', '1', '大大', '111', '11', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('2', '2', '小小', '222', '22', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('3', '3', '小小', '222', '22', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('4', '4', '小小', '222', '22', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('5', '5', '小小', '222', '22', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('6', '6', '小小', '222', '22', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg'), ('7', '7', '小小', '222', '22', '1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='服务商绑定标签(服务范畴)表';

-- ----------------------------
--  Records of `cdc_service_tag`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_tag` VALUES ('1', '1', '1', '0', '0'), ('2', '2', '1', '0', '0'), ('3', '3', '1', '0', '0'), ('4', '4', '1', '0', '0'), ('5', '2', '2', '0', '0'), ('6', '3', '2', '0', '0'), ('7', '1', '3', '0', '0'), ('8', '1', '4', '0', '0'), ('9', '1', '5', '0', '0'), ('10', '1', '6', '0', '0'), ('11', '1', '7', '0', '0');
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
INSERT INTO `cdc_setting` VALUES ('1', 'delivery_address', '12321425123', '审车收货地址', '0', '基础设置'), ('2', 'ali_sms_access_key_id', '234', '阿里大于accessKeyId', '0', '短信设置'), ('3', 'ali_sms_access_key_secret', '234', '阿里大于accessKeySecret', '0', '短信设置'), ('4', 'ali_sms_template_code', '123', '阿里大于短信模板Code', '0', '短信设置'), ('5', 'ali_sms_template', '123', '阿里大于短信模板', '0', '短信设置'), ('6', 'jpush_client_appkey', '123', '极光推送客户端AppKey', '0', '客户端推送'), ('7', 'jpush_client_master_secret', '123', '极光推送客户端Master Secret', '0', '客户端推送'), ('8', 'jpush_service_appkey', '12323', '极光推送服务端AppKey', '0', '服务端推送'), ('9', 'jpush_service_master_secret', '123', '极光推送服务端Master Secret', '0', '服务端推送');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `access_token` (`access_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='服务端用户表';

-- ----------------------------
--  Records of `cdc_user`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_user` VALUES ('1', '业务员-小强', null, '1', '13812345678', '$2y$13$AWaUHxc5k7CUozMQX/mOQOfDR1MDX7PpI5w2HcPrfu/TqsKr34Yz6', '1', '0', '0', null, null, null, '1500972926', null), ('2', '业务员-小鑫', null, '1', '13688464645', null, '1', '0', '0', null, null, null, null, '1500972549'), ('3', '小强', null, '1', '13812345678', '123456', '1', '0', '0', null, null, '1500970599', '1500970599', '1500972540');
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
INSERT INTO `cdc_user_img` VALUES ('1', '1', 'https://7.iyours.com.cn/article_image_20160816134603_Tginp1bgylbzvGdC.jpg', '1500000000', '0');
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

SET FOREIGN_KEY_CHECKS = 1;
