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

 Date: 08/08/2017 17:31:53 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8 COMMENT='订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_detail` VALUES ('201', '194', '3', '', '1', '订单已分派给服务商，等待接单', '1501642092', '0', '1'), ('202', '195', '3', '', '1', '订单已分派给服务商老大的1S，等待接单', '1501642258', '0', '1'), ('203', '196', '3', '', '1', '订单已分派给服务商，等待接单', '1501642961', '0', '1'), ('204', '197', '3', '', '1', '订单已分派给服务商，等待接单', '1501643293', '0', '1'), ('205', '198', '3', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501654728', '0', '1'), ('206', '199', '2', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501661026', '0', '1'), ('207', '200', '3', '奥巴马', '1', '订单已分派给服务商小强皇家4S，等待接单', '1501666526', '0', '1'), ('208', '201', '3', '奥巴马', '1', '订单已分派给服务商asd，等待接单', '1501666800', '0', '1'), ('209', '199', '2', '奥巴马', '100', '取消订单', '1501670739', '0', '1'), ('210', '202', '2', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501678161', '0', '1'), ('211', '202', '2', '奥巴马', '100', '取消订单', '1501678164', '0', '1'), ('212', '203', '2', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501724415', '0', '1'), ('213', '204', '3', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501770832', '0', '1'), ('214', '205', '3', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501810583', '0', '1'), ('215', '206', '2', '奥巴马', '1', '订单已分派给服务商，等待接单', '1501812654', '0', '1'), ('216', '206', '2', '奥巴马', '100', '取消订单', '1501812664', '0', '1'), ('217', '203', '2', '奥巴马', '100', '取消订单', '1501813007', '0', '1'), ('218', '207', '13', '胡江', '1', '订单已分派给服务商，等待接单', '1501829978', '0', '1'), ('219', '208', '13', '胡江', '1', '订单已分派给服务商老大的1S，等待接单', '1501830529', '0', '1'), ('220', '209', '13', '胡江', '1', '订单已分派给服务商老大的1S，等待接单', '1501830585', '0', '1'), ('221', '210', '13', '胡江', '1', '订单已分派给服务商龙龙皇家4S，等待接单', '1501830608', '0', '1'), ('222', '211', '13', '胡江', '1', '订单已分派给服务商asd，等待接单', '1501830918', '0', '1'), ('223', '212', '13', '胡江', '1', '订单已分派给服务商，等待接单', '1501831011', '0', '1'), ('224', '213', '13', '胡江', '1', '订单已分派给服务商，等待接单', '1501831029', '0', '1'), ('225', '214', '13', '胡江', '1', '订单已分派给服务商，等待接单', '1501831102', '0', '1'), ('226', '214', '13', '胡江', '100', '取消订单', '1501831190', '0', '1'), ('227', '212', '13', '胡江', '100', '取消订单', '1501831598', '0', '1'), ('228', '215', '13', '胡江', '1', '订单已分派给服务商，等待接单', '1501839118', '0', '1'), ('229', '211', '1', '动次打次', '100', '订单已被服务商拒绝', '1501846833', '0', '1'), ('230', '201', '1', '动次打次', '100', '订单已被服务商拒绝', '1501846855', '0', '1'), ('231', '216', '13', '胡江', '1', '订单已分派给服务商，等待接单', '1501847018', '0', '1'), ('232', '219', '2', '奥巴马', '1', '订单已分派给服务商asd，等待接单', '1501852789', '0', '1'), ('233', '220', '19', '', '1', '订单已分派给服务商，等待接单', '1501897519', '0', '1'), ('234', '219', '1', '动次打次', '100', '订单已被服务商拒绝', '1501897665', '0', '1'), ('235', '223', '19', '', '1', '订单已分派给服务商，等待接单', '1501898213', '0', '1'), ('236', '223', '1', '动次打次', '100', '取消订单', '1501898473', '0', '1'), ('237', '211', '1', '动次打次', '5', '动词打次', '1501905758', '0', '1'), ('238', '211', '1', '动次打次', '6', '动词打次', '1501905839', '0', '1'), ('239', '224', '18', '次哒次动打次', '1', '订单已分派给服务商asd，等待接单', '1501922248', '0', '1'), ('240', '225', '18', '次哒次动打次', '1', '订单已分派给服务商老大的1S，等待接单', '1501922302', '0', '1'), ('241', '226', '18', '次哒次动打次', '1', '订单已分派给服务商，等待接单', '1501922499', '0', '1'), ('242', '227', '18', '次哒次动打次', '1', '订单已分派给服务商，等待接单', '1501922969', '0', '1'), ('246', '211', '1', '动次打次', '7', '555', '1501930917', '0', '1'), ('247', '211', '1', '动次打次', '8', '19:05待交车', '1501931172', '0', '1'), ('248', '228', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502070468', '0', '1'), ('249', '229', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502070674', '0', '1'), ('250', '229', '1', '动次打次', '100', '取消订单', '1502070701', '0', '1'), ('251', '230', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502070855', '0', '1'), ('252', '231', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502071196', '0', '1'), ('253', '232', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502071565', '0', '1'), ('254', '233', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502071748', '0', '1'), ('255', '233', '1', '动次打次', '100', '取消订单', '1502071791', '0', '1'), ('256', '234', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502072461', '0', '1'), ('257', '235', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502072577', '0', '1'), ('258', '235', '1', '动次打次', '100', '取消订单', '1502072634', '0', '1'), ('259', '236', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502072725', '0', '1'), ('260', '237', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502072960', '0', '1'), ('261', '238', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502073196', '0', '1'), ('262', '239', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502073243', '0', '1'), ('263', '240', '18', '次哒次动打次', '1', '订单已分派给服务商，等待接单', '1502073307', '0', '1'), ('264', '240', '1', '动次打次', '100', '取消订单', '1502073311', '0', '1'), ('265', '241', '18', '次哒次动打次', '1', '订单已分派给服务商，等待接单', '1502073314', '0', '1'), ('266', '242', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502073380', '0', '1'), ('267', '243', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502073472', '0', '1'), ('268', '244', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502073535', '0', '1'), ('269', '245', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502073625', '0', '1'), ('270', '246', '18', '次哒次动打次', '1', '订单已分派给服务商，等待接单', '1502073702', '0', '1'), ('271', '224', '1', '动次打次', '2', '已接单', '1502074305', '0', '1'), ('272', '224', '1', '动次打次', '3', '5555', '1502074338', '0', '1'), ('273', '247', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502075000', '0', '1'), ('274', '248', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502075586', '0', '1'), ('275', '249', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502085774', '0', '1'), ('276', '250', '20', '呵呵大', '1', '订单已分派给服务商，等待接单', '1502089102', '0', '1'), ('277', '224', '1', '动次打次', '5', '基督教大家', '1502089395', '0', '1'), ('278', '224', '1', '动次打次', '99', '', '1502089423', '0', '1'), ('279', '251', '20', '呵呵大', '1', '订单已分派给服务商asd，等待接单', '1502089734', '0', '1'), ('280', '252', '20', '呵呵大', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502090014', '0', '1'), ('281', '252', '1', '动次打次', '2', '已接单', '1502090033', '0', '1'), ('282', '252', '1', '动次打次', '3', '', '1502090041', '0', '1'), ('283', '252', '1', '动次打次', '4', '', '1502090060', '0', '1'), ('284', '252', '1', '动次打次', '5', '', '1502090065', '0', '1'), ('285', '252', '1', '动次打次', '6', '', '1502090069', '0', '1'), ('286', '252', '1', '动次打次', '7', '', '1502090077', '0', '1'), ('287', '252', '1', '动次打次', '8', '', '1502090081', '0', '1'), ('288', '252', '1', '动次打次', '99', '', '1502090090', '0', '1'), ('289', '253', '16', '亚伯拉罕', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502096306', '0', '1'), ('290', '253', '1', '般拌办', '2', '已接单', '1502096322', '0', '1'), ('291', '253', '1', '般拌办', '3', '我接到车啦，兄弟，我在去车场的路上了', '1502096383', '0', '1'), ('292', '254', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502162252', '0', '1'), ('293', '255', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502162263', '0', '1'), ('294', '256', '19', '奥升马', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502162478', '0', '1'), ('295', '257', '19', '奥升马', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502162504', '0', '1'), ('296', '258', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502162707', '0', '1'), ('297', '259', '19', '奥升马', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502163057', '0', '1'), ('298', '260', '19', '奥升马', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502163092', '0', '1'), ('299', '261', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502163113', '0', '1'), ('300', '262', '19', '奥升马', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502163159', '0', '1'), ('301', '263', '19', '奥升马', '1', '订单已分派给服务商，等待接单', '1502163245', '0', '1'), ('302', '263', '1', '般拌办', '2', '已接单', '1502163351', '0', '1'), ('303', '263', '1', '般拌办', '3', '朋友，我来接车了。。。就是TM有点堵，你看。。。', '1502163445', '0', '1'), ('304', '263', '1', '般拌办', '4', '我接到车了，味儿真大，修车的有你好看的了', '1502163579', '0', '1'), ('305', '263', '1', '般拌办', '5', '借到车了', '1502163724', '0', '1'), ('306', '263', '1', '般拌办', '6', '他哦8166999ZzZzZzZz现在898他现在898他你哦噢莫？你你哦哦哦哦哦哦(⊙o⊙)哦噢噢莫，莫？噢噢，莫，莫？莫，莫哦噢噢噢噢哦莫，莫你6161616', '1502170566', '0', '1'), ('307', '263', '1', '般拌办', '7', 'or磨破我哦噢噢噢噢噢哦(⊙o⊙)哦M9你呀啦来来回回就李哈哈李李好会感觉了，考虑好来啦啦操啦lj囖', '1502170630', '0', '1'), ('308', '263', '1', '般拌办', '8', '工作莫你莫哦啦咯5个敢手机刚囖科技看李快乐囖快乐李还刚就打lj莫莫说锕吖我给你钱说什么涂噢太阳莫zz谢谢有了现在中场吐科技来看啦就吐涂天李他留突突兔图腾秃感觉图解感觉林肯看看就啦了佳灵路快乐涂料图。突突兔吐吐出来上我收拾气氛联系，YYZz套路就打林肯噢科技了！快乐就图天涂题涂吐李老师爸的八，恶气of忘那我呀要题在涂料涂人个好还好刚人事处pp说刚到科技馆科技，里面了秃的替敢不林肯你看他吐快乐吐就兔就TTPS他来就看到了', '1502171497', '0', '1'), ('309', '264', '21', '昂恪', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502173358', '0', '1'), ('310', '264', '1', 'fghhh', '100', '订单已被服务商拒绝', '1502173411', '0', '1'), ('311', '265', '21', '昂恪', '1', '订单已分派给服务商，等待接单', '1502173677', '0', '1'), ('312', '266', '21', '昂恪', '1', '订单已分派给服务商，等待接单', '1502173730', '0', '1'), ('313', '267', '21', '昂恪', '1', '订单已分派给服务商，等待接单', '1502173809', '0', '1'), ('314', '268', '21', '昂恪', '1', '订单已分派给服务商，等待接单', '1502174019', '0', '1'), ('315', '269', '21', '昂恪', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502174132', '0', '1'), ('316', '270', '21', '昂恪', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502174219', '0', '1'), ('317', '271', '21', '昂恪', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502174220', '0', '1'), ('318', '271', '1', 'fghhh', '2', '已接单', '1502174251', '0', '1'), ('319', '270', '1', 'fghhh', '2', '已接单', '1502174267', '0', '1'), ('320', '263', '1', 'fghhh', '99', '5啊5', '1502174552', '0', '1'), ('321', '271', '1', 'fghhh', '99', '同我讲啦', '1502174676', '0', '1'), ('322', '272', '21', '昂恪', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502174856', '0', '1'), ('323', '272', '1', 'fghhh', '2', '已接单', '1502174985', '0', '1'), ('324', '272', '1', 'fghhh', '5', '咯破sons', '1502175035', '0', '1'), ('325', '272', '1', 'fghhh', '6', '', '1502175086', '0', '1'), ('326', '272', '1', 'fghhh', '6', '', '1502175134', '0', '1'), ('327', '272', '1', 'fghhh', '99', '', '1502175146', '0', '1'), ('328', '272', '1', 'fghhh', '4', '', '1502175171', '0', '1'), ('329', '272', '1', 'fghhh', '6', '', '1502175259', '0', '1'), ('330', '272', '1', 'fghhh', '6', '', '1502175282', '0', '1'), ('331', '251', '1', 'fghhh', '2', '已接单', '1502175311', '0', '1'), ('332', '251', '1', 'fghhh', '99', '', '1502175322', '0', '1'), ('333', '272', '1', 'fghhh', '6', '', '1502175354', '0', '1'), ('334', '272', '1', 'fghhh', '6', '', '1502175395', '0', '1'), ('335', '272', '1', 'fghhh', '99', '', '1502175408', '0', '1'), ('336', '272', '1', 'fghhh', '4', '', '1502175416', '0', '1'), ('337', '272', '1', 'fghhh', '5', '', '1502175424', '0', '1'), ('338', '272', '1', 'fghhh', '6', '', '1502175430', '0', '1'), ('339', '273', '21', '昂恪', '1', '订单已分派给服务商龙哥的4S店，等待接单', '1502175774', '0', '1'), ('340', '267', '1', 'fghhh', '100', '取消订单', '1502176057', '0', '1'), ('341', '273', '1', 'fghhh', '100', '取消订单', '1502176102', '0', '1'), ('342', '269', '1', 'fghhh', '100', '取消订单', '1502176208', '0', '1'), ('343', '262', '1', 'fghhh', '100', '取消订单', '1502176299', '0', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='动态节点图片表';

-- ----------------------------
--  Records of `cdc_act_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_img` VALUES ('1', '246', '/public/upload/act_imgs/2017-08-05/a1b80147f44dfcf5af22ce54a2c5f71c028dd9e3.jpeg', '1501930917', '0'), ('2', '247', '/public/upload/act_imgs/2017-08-05/8167947e3fe49a4a1bc5e7ecde7a2422e1100583.jpeg', '1501931172', '0'), ('3', '272', '/public/upload/act_imgs/2017-08-07/a911549deaffccaffb8812ac6bfa4ea1bad1d477.jpeg', '1502074338', '0'), ('4', '277', '/public/upload/act_imgs/2017-08-07/fea67f0aea2ec730ae44d4b7e6ba42b5a6c56cbc.jpeg', '1502089395', '0'), ('5', '291', '/public/upload/act_imgs/2017-08-07/0464193a5f57a0d725c4a5931809a49c27d404f2.jpeg', '1502096383', '0'), ('6', '291', '/public/upload/act_imgs/2017-08-07/062b8c3e1170a548af3d6261724041e9f24dd4b7.jpeg', '1502096383', '0'), ('7', '303', '/public/upload/act_imgs/2017-08-08/fe219755ecbbc0de49a68a5e48f787bddfe4d9c5.jpeg', '1502163445', '0'), ('8', '303', '/public/upload/act_imgs/2017-08-08/9cf1ff438546021b47e49a123640d20f3b04469b.jpeg', '1502163445', '0'), ('9', '303', '/public/upload/act_imgs/2017-08-08/7f6e65fc5c2254455c9967445d39e749209ead40.jpeg', '1502163445', '0'), ('10', '304', '/public/upload/act_imgs/2017-08-08/b9e963dcf99cf5c21227ced990e76a4b15517531.jpeg', '1502163579', '0'), ('11', '304', '/public/upload/act_imgs/2017-08-08/189c7a4fa6b8222b9adb484d4e60830a3489029f.jpeg', '1502163579', '0'), ('12', '305', '/public/upload/act_imgs/2017-08-08/bc61dcb1e87094ee04af2cb53488a4ea20a804db.jpeg', '1502163724', '0'), ('13', '305', '/public/upload/act_imgs/2017-08-08/ab9bd182e408782818c5e8737dd418d194a0b5b4.jpeg', '1502163724', '0'), ('14', '305', '/public/upload/act_imgs/2017-08-08/35b0787ddc9f368ad02054b2fce0e0271c6b737c.jpeg', '1502163724', '0'), ('15', '305', '/public/upload/act_imgs/2017-08-08/203155add0349d4d3951c19f1bac6ef2784709bd.jpeg', '1502163724', '0'), ('16', '305', '/public/upload/act_imgs/2017-08-08/05fa92554ebc113a960e9b71d23274f5b3e73156.jpeg', '1502163724', '0'), ('17', '305', '/public/upload/act_imgs/2017-08-08/6a5248a8efafd93017c7369ed5a06a883183bb31.jpeg', '1502163724', '0'), ('18', '306', '/public/upload/act_imgs/2017-08-08/e263aeff525a6f00d6e92e38c2463b07181bac74.jpeg', '1502170566', '0'), ('19', '306', '/public/upload/act_imgs/2017-08-08/613a64f30be64383092b2a150ebe0a1f405eacc1.jpeg', '1502170566', '0'), ('20', '306', '/public/upload/act_imgs/2017-08-08/a999b531978047a420b23927748c93257c1500f5.jpeg', '1502170566', '0'), ('21', '306', '/public/upload/act_imgs/2017-08-08/e2ad9ea4daca39f13d28ca9f48a0a38e3d40d6a3.jpeg', '1502170566', '0'), ('22', '307', '/public/upload/act_imgs/2017-08-08/3c37b4d6a9fbc2efa027268d2c6476d8c48615f2.jpeg', '1502170630', '0'), ('23', '308', '/public/upload/act_imgs/2017-08-08/ad7bb0b187f2acfa4a0ee78b410b615995076a78.jpeg', '1502171497', '0'), ('24', '320', '/public/upload/act_imgs/2017-08-08/fecb3810fce70519152c6ec9e8e75c0270327a44.jpeg', '1502174552', '0'), ('25', '321', '/public/upload/act_imgs/2017-08-08/6d530d0103bb045d7e76da51b6831f762ff134c6.jpeg', '1502174676', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COMMENT='保险订单动态详情表';

-- ----------------------------
--  Records of `cdc_act_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_act_insurance` VALUES ('130', '188', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659346', '0', '1'), ('131', '189', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659357', '0', '1'), ('132', '190', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659366', '0', '1'), ('133', '191', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659380', '0', '1'), ('134', '192', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659389', '0', '1'), ('135', '193', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659399', '0', '1'), ('136', '194', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659408', '0', '1'), ('137', '195', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659417', '0', '1'), ('138', '196', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659425', '0', '1'), ('139', '197', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659434', '0', '1'), ('140', '198', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659443', '0', '1'), ('141', '199', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659452', '0', '1'), ('142', '200', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659469', '0', '1'), ('143', '201', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659483', '0', '1'), ('144', '202', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501659492', '0', '1'), ('145', '203', '3', '奥巴马', '1', '订单创建成功,等待核保', '1501666451', '0', '1'), ('146', '204', '3', '奥巴马', '1', '订单创建成功,等待核保', '1501668662', '0', '1'), ('147', '205', '3', '奥巴马', '1', '订单创建成功,等待核保', '1501671954', '0', '1'), ('148', '202', '2', '奥巴马', '100', '取消订单', '1501680567', '0', '1'), ('149', '211', '13', '胡江', '1', '订单创建成功,等待核保', '1501829630', '0', '1'), ('150', '212', '2', '奥巴马', '1', '订单创建成功,等待核保', '1501834764', '0', '1'), ('175', '217', '2', '奥巴马', '1', '订单创建成功,等待核保', '1502095912', '0', '1'), ('176', '218', '19', '奥升马', '1', '订单创建成功,等待核保', '1502162554', '0', '1'), ('177', '219', '19', '奥升马', '1', '订单创建成功,等待核保', '1502162695', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_admin_service`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_admin_service`;
CREATE TABLE `cdc_admin_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL COMMENT '服务商id',
  `admin_id` int(11) NOT NULL COMMENT '平台用户Id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_admin_service`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_admin_service` VALUES ('1', '1', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='平台账号表';

-- ----------------------------
--  Records of `cdc_adminuser`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_adminuser` VALUES ('1', 'ypxl', '', '$2y$13$pqJnJ1.g6hcvuTUTf0E27.vpjV6ISqL9Mlfq2BHADltJ6PbDEu4VK', '', '10', '0', '0', '啊啊啊', '1', '1', null), ('3', '00008', null, '$2y$13$UCoJ/HLMARfHvAedjjwpfeuYXNrApDCF7enJvxl4qZAJ7hRIXg9ne', null, '10', '0', '0', '啊啊', '1', '0', null), ('4', '00009', null, '$2y$13$q0jOf/1pHpMc1huVMbXLcOyMcaomGSdARoHwOA4q.jMUrR.RLZHwS', null, '10', '0', '0', '啊', '1', '0', null), ('5', '00008', null, '$2y$13$l6oE9D6U.MZJWM1RdPgvf.qEMX9jgnQtYtd8IZ5MoY7UDfht.ifey', null, '10', '0', '0', '啊', '1', '0', null), ('6', '00008', null, '$2y$13$FRV6sA5./hB8kpZl6EREc..0AFTHgAGYogcTxiL0SiuIHiCOhqE2W', null, '10', '0', '0', '啊', '1', '0', null), ('7', 'asd123', null, '$2y$13$Iok6fJaEeTnLLcs0hZhPwe8j0LoxXQL/5Ws4DWs86dnZr02eHT1yq', null, '10', '0', '0', '啊', '1', '0', null), ('8', '00008', null, '$2y$13$10wwOKH4Q5d/tLYwm2Uxu.Ft/NFYq3qKotE0OIp3OXFLVZOSFCrxS', null, '10', '0', '0', '啊', '1', '0', null), ('48', 'service1123', null, '$2y$13$.IaZEjSTyVp38zlnHRd4uOmrnEUi3CnffQMFDGpeaG7H8A1s8Y8X.', null, '10', '0', '0', '啊', '1', '0', null), ('51', 'test1123', null, '$2y$13$UvkotcEcvwkaoGXK2IsSi.hPJe9uIWFQMjQJosc3kGcvAF2xef.Da', null, '10', '0', '0', '', '1', '0', null), ('52', '张小花', null, '', null, '10', '0', '0', '张小花', '1', '0', null);
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_app_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_app_menu` VALUES ('41', '首页', null, 'home'), ('42', '待处理订单', '41', 'wait_order'), ('43', '救援订单', '42', 'rescue_order'), ('44', '维修订单', '42', 'fix_order'), ('45', '保养订单', '42', 'upkeep_order'), ('46', '审车订单', '42', 'review_order'), ('47', '我的会员', '41', 'my_member'), ('48', '保险', null, 'member_insurance_order'), ('49', '救援', null, 'member_rescue_order'), ('50', '维修', null, 'member_fix_order'), ('51', '保养', null, 'member_upkeep_order'), ('52', '审车', null, 'member_review_order'), ('53', '工作', null, 'home'), ('54', '我的客户', '53', 'my_member'), ('55', '客户订单', '53', 'member_order'), ('56', '保单管理', '53', 'insurance_order_handle'), ('57', '订单处理', '53', 'order_handle'), ('58', '我的', null, 'my'), ('59', '我的组织', '58', 'my_group'), ('60', '我的邀请码', null, 'my_share_code'), ('61', '消息通知', null, 'notice'), ('62', '联系我们', null, 'contact_us'), ('63', '设置', null, 'setting');
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_article`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_article` VALUES ('1', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '1', '11', '0', '0'), ('2', '1', '1', '<p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;2016年3月21日，剑桥季幼儿英语教育专家讲学盛典北京站在汉华国际酒店完美落幕。</span></p><p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">本次大会是由东方之星学前教育机构和剑桥大学出版社联合举办，旨在与来自全国各地的园长、老师及新老合作伙伴齐聚一堂，聚焦幼儿英语，共同探讨幼儿英语教育全球发展现状与趋势。</span></p><p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">东方之星学前教育机构课程总监张颖男女士与剑桥大学高级培训师、教学代表Gavin Biggs先生出席会议并做了致辞。他们纷纷对参会者表示热烈欢迎。</span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297096.png\" title=\"1471928504.png\" alt=\"1.png\"/></p></td><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><br/></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297099.png\" title=\"1471928511.png\" alt=\"2.png\"/></p></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; 接下来由剑桥大学出版社英语教育专家Herbert Puchta博士在座的各位来宾分享国际化视野下的幼儿英语教育现状与趋势，Herbert Puchta博士作为知名神经语言学、认知心理学应用大师，利用这次机会，也和参会者进行了神经语言学在英语教学应用的交流和点拨。</span><span style=\"font-size: 10px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 16px;\"><img src=\"https://7.iyours.com.cn/14719297115.png\" title=\"1471928587.png\" alt=\"3.png\"/></span></p><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;Herbert Puchta博士现场幽默风趣的演讲、生动的课堂演绎及深入浅出的精彩剖析，获得了与会者的阵阵掌声。演讲结束后，Herbert Puchta博士现场抽出3位Super Hero，并为他们颁发了奖品——由他亲笔签名的Super Safari原版教材。</span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><img src=\"https://7.iyours.com.cn/14719297116.png\" title=\"1471928605.png\" alt=\"4.png\" style=\"white-space: normal;\"/></td><td width=\"140\" valign=\"top\"><br/></td><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><img src=\"https://7.iyours.com.cn/14719297127.png\" title=\"1471928614.png\" alt=\"5.png\" style=\"white-space: normal;\"/></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; text-align: left;\">Super Safari是剑桥大学出版社最新出版的幼儿英语课程，那它到底是一套怎样的课程呢？为了让参会老师充分了解课程内容及其独特的课程魅力，来自东方之星学前教育机构的Coco、Susie两位老师带领着大家进行了一场精彩的课程体验，参与体验的老师纷纷表达了对Super Safari的认可和喜爱。</span><br/></p><p style=\"text-align: center;\"><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 16px;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297133.png\" title=\"1471929017.png\" alt=\"6.png\"/></p></td><td width=\"140\" valign=\"top\" style=\"word-break: break-all;\"><p><br/></p></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297148.png\" title=\"1471929026.png\" alt=\"7.png\"/></p></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;你肯定会疑问，东方之星作为Super Safari在中国大陆的独家代理在课程落地的过程中会给合作伙伴提供哪些服务和支持？在本次会议上，东方之星英语课程中心市场负责人张瑞林进行了解读！<span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span><br/><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></span></p><p><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; &nbsp;整场活动伴随着大家的掌声、笑声和满满的收获接近尾声。许多意犹未尽的老师们纷纷去咨询台体验课程并咨询合作事宜。</span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"></span></p><table style=\"width: 468px;\"><tbody><tr class=\"firstRow\"><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297155.png\" title=\"1471928916.png\" alt=\"9.png\" width=\"329\" height=\"253\" style=\"width: 329px; height: 253px;\"/></p></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297161.png\" title=\"1471928928.png\" alt=\"10.png\" width=\"333\" height=\"251\" style=\"width: 333px; height: 251px;\"/></p></td><td width=\"140\" valign=\"top\"><p><img src=\"https://7.iyours.com.cn/14719297168.png\" title=\"1471928938.png\" alt=\"8.png\" width=\"336\" height=\"250\" style=\"width: 336px; height: 250px;\"/></p></td></tr></tbody></table><p style=\"text-align: left;\"><span style=\"font-size: 16px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">&nbsp; &nbsp; &nbsp; 本次会议，为满足场外老师们强烈听课的愿望，东方之星特意开通了微信直播平台。数千名场外园长、老师纷纷在平台上留言，表示了对东方之星和剑桥大学出版社的感谢。</span><span style=\"font-size: 10px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\"><br/></span></p>', '1', '1', '12', '0', '0'), ('3', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '1', '13', '0', '0'), ('4', '1', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '1', '14', '0', '0'), ('5', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '21', '0', '0'), ('6', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '22', '0', '0'), ('7', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '23', '0', '0'), ('8', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '24', '0', '0'), ('9', '2', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p><p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '2', '25', '0', '0'), ('10', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '31', '0', '0'), ('11', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '32', '0', '0'), ('12', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '33', '0', '0'), ('13', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '34', '0', '0'), ('14', '3', '1', '<p><img border=\"0\" src=\"upfiles/2009/07/1246430143_1.jpg\" alt=\"\"/></p>', '1', '3', '35', '0', '0'), ('18', '123', '123', '123', '1', '123', '123', '1501062424', '1501062424'), ('19', '123', '1123', '123', '1', '123', '123', '1501062442', '1501062442'), ('16', '123', '123', '123', '1', '123', '123', '0', '0'), ('20', '123', '123', '123', '1', '123', '123', '1501062465', '1501062465'), ('21', '123', '123', '123', '1', '123', '123', '1501062489', '1501062489'), ('22', '123', '123', '123', '1', '123', '123', '1501062516', '1501062516'), ('17', '123', '123', '123', '1', '123', '123', '0', '0'), ('15', '123', '123', '123', '1', '123', '123', '0', '0'), ('23', '123123123', '12312', '123', '1', '123', '123', '1501764203', '1501764203'), ('24', '123123', '123', '<p><img>12312</p>', '1', '123', '123', '1501830112', '1501830112');
COMMIT;

-- ----------------------------
--  Table structure for `cdc_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_auth_assignment`;
CREATE TABLE `cdc_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '平台。 1 平台 2 app',
  PRIMARY KEY (`item_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `cdc_auth_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_assignment` VALUES ('1_platform_业务员', '4', null, '1');
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
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `cdc_auth_item`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_item` VALUES ('1_platform_业务员', '1', '', null, null, '1502158460', '1502158460'), ('1_platform_代理商', '1', '', null, null, '1502158450', '1502158450'), ('1_platform_操作员', '1', '', null, null, '1502158472', '1502158472'), ('1_platform_服务商', '1', '', null, null, '1502158440', '1502158440'), ('2_app_业务员', '1', null, null, null, null, null), ('2_app_操作员', '1', null, null, null, null, null), ('2_platform_门神', '1', null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cdc_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `cdc_auth_item_child`;
CREATE TABLE `cdc_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `cdc_auth_item_child`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_auth_item_child` VALUES ('2_app_操作员', '2_app_操作员');
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
  `action_type` tinyint(1) DEFAULT NULL COMMENT '操作类型0 内链，1外链',
  `action_value` varchar(256) DEFAULT NULL COMMENT '跳转地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
--  Records of `cdc_banner`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_banner` VALUES ('1', '啊啊', '啊啊', '1', '0', '0', null, null), ('2', '哦哦', '哦哦', '1', '0', '0', null, null), ('3', '哈哈', '哈哈', '1', '0', '0', null, null), ('4', '123123', '123123', '1', '1501763186', '1501763382', null, '1231241231');
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
INSERT INTO `cdc_banner_img` VALUES ('1', '1', '/public/upload/car_imgs/2017-07-29/623ab8601112dbc42c3d6a16d10fc6e0b78003e0.jpeg'), ('2', '2', '/public/upload/car_imgs/2017-07-29/623ab8601112dbc42c3d6a16d10fc6e0b78003e0.jpeg'), ('3', '3', '/public/upload/car_imgs/2017-07-29/623ab8601112dbc42c3d6a16d10fc6e0b78003e0.jpeg');
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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COMMENT='商业险详情';

-- ----------------------------
--  Records of `cdc_business_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_business_detail` VALUES ('71', '71', '71', '71.00', '1501659346', '0', '1500000000', '1700000000'), ('72', '72', '72', '72.00', '1501659357', '0', '1500000000', '1700000000'), ('73', '73', '73', '73.00', '1501659366', '0', '1500000000', '1700000000'), ('74', '74', '74', '74.00', '1501659380', '0', '1500000000', '1700000000'), ('75', '75', '75', '75.00', '1501659389', '0', '1500000000', '1700000000'), ('76', '76', '76', '76.00', '1501659399', '0', '1500000000', '1700000000'), ('77', '77', '77', '77.00', '1501659409', '0', '1500000000', '1700000000'), ('78', '78', '78', '78.00', '1501659417', '0', '1500000000', '1700000000'), ('79', '79', '79', '79.00', '1501659425', '0', '1500000000', '1700000000'), ('80', '80', '80', '80.00', '1501659434', '0', '1500000000', '1700000000'), ('81', '81', '81', '81.00', '1501659443', '0', '1500000000', '1700000000'), ('82', '82', '82', '82.00', '1501659452', '0', '1500000000', '1700000000'), ('83', '83', '83', '83.00', '1501659469', '0', '1500000000', '1500000001'), ('84', '84', '84', '84.00', '1501659483', '0', '1700000000', '1900000000'), ('85', '85', '85', '85.00', '1501659492', '0', '1500000000', '1700000000'), ('86', '', '', '0.00', '1501666451', '0', '0', '0'), ('87', '', '', '0.00', '1501668662', '0', '0', '0'), ('88', '', '', '0.00', '1501671954', '0', '0', '0'), ('89', '', '', '0.00', '1501829630', '0', '0', '0'), ('90', '', '', '0.00', '1501834764', '0', '0', '0'), ('91', '', '', '0.00', '1502095912', '0', '0', '0'), ('92', '', '', '0.00', '1502162554', '0', '0', '0'), ('93', '', '', '0.00', '1502162695', '0', '0', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8 COMMENT='车辆信息表';

-- ----------------------------
--  Records of `cdc_car`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car` VALUES ('197', '2', '陕AN347', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501655489', '0'), ('198', '1', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501724927', '0'), ('199', '1', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501724937', '0'), ('200', '2', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501725181', '0'), ('201', null, '陕AN3488', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '0', '1501767413', '0'), ('202', '3', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501810686', '0'), ('204', '13', '浙F956N5', '小型轿车', '候磊', '非营运', '雅阁牌HG7203AB', 'LHGCP168098019244', '7922982', '3', '20100701', '20110101', '0', '1', '1501818252', '0'), ('205', '13', '浙F956NS', '小型轿车', '候磊', '非营运', '雅阎牌HG7203AB', 'LHGCP168098019244', '7922982', '3', '20100701', '20150816', '0', '1', '1501818777', '0'), ('206', '13', '皖A955D6', '小型轿年', '汪建', '非营运', '雅阁', 'LHGCM462178001841', '7702225', '2', '20101010', '20101010', '0', '1', '1501830483', '0'), ('207', null, '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '9', '20140606', '20140606', '0', '1', '1501896836', '0'), ('208', '19', '陕AN999', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501897491', '0'), ('209', null, '上458687', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501898820', '0'), ('210', null, '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501898877', '0'), ('211', '18', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501899163', '0'), ('212', null, '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501899225', '0'), ('213', '19', '陕AN3455', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1501899735', '0'), ('214', '19', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '9', '20140606', '20140606', '0', '1', '1501899761', '0'), ('215', '19', '陕AN3444', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '0', '1501899883', '0'), ('226', '19', '陕AN34225', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '0', '1501915459', '0'), ('227', '20', '蒙E76258', '重型半挂牵引车', '呼伦贝尔市晓明运输有限公司', '货运', '解放牌CA4257P2K2T1EA80', 'LFWSRXNH6AAD38754', '51676680', '4', '20101207', '20130720', '0', '1', '1502089078', '0'), ('228', '16', '陕AN34', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1502090264', '0'), ('229', '17', '看来行驶证识别失败是网络问题', '小型轿车', '人', '非营运', '起亚牌YQZ7204A', 'LJDKAA243ELM09', 'EW084211', '5', '20140606', '20140606', '0', '1', '1502090618', '0'), ('230', '21', '陕AN34656', '小型轿车', '日', '非营运', '起亚牌YQZ7204A', 'LJDKAA243E09', 'EW084271', '1', '20140606', '20140606', '0', '0', '1502173169', '0'), ('232', '22', '陕AN34', '小型轿车', '日', '非营运', '起亚牌YQZ7204A', 'LJDKAA243E09', 'EW084271', '6', '20140606', '20140606', '1', '1', '1502176843', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 COMMENT='车辆信息图片表';

-- ----------------------------
--  Records of `cdc_car_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_car_img` VALUES ('144', '193', '/public/upload/car_imgs/2017-08-02/263ef1b67931582124a5f2de99c7d0f409eae090.jpeg', '1501640727', '0'), ('145', '193', '/public/upload/car_imgs/2017-08-02/8b2a7bafa0147aa1d8257b7008a9f32741a6b327.jpeg', '1501640727', '0'), ('146', '194', '/public/upload/car_imgs/2017-08-02/c1f0e9d36ae0334e038ec6be78f1e478bbb070c8.jpeg', '1501641289', '0'), ('147', '194', '/public/upload/car_imgs/2017-08-02/5172e35184072e33bb4a8a7ce5584aaa5b93d73e.jpeg', '1501641289', '0'), ('148', '195', '/public/upload/car_imgs/2017-08-02/1a7d6d1a7af55f8cce5e4265def7cf2d7aeb22d4.jpeg', '1501641430', '0'), ('149', '195', '/public/upload/car_imgs/2017-08-02/e7f4d371fa02573f2f1774425bce3e0fb852f2d6.jpeg', '1501641430', '0'), ('150', '196', '/public/upload/car_imgs/2017-08-02/f952f19241f625b4dab0152777479694e6f40874.jpeg', '1501642055', '0'), ('151', '196', '/public/upload/car_imgs/2017-08-02/17ae6dda3eda495a04524c11ea2af84ca76da0a0.jpeg', '1501642055', '0'), ('152', '197', '/public/upload/car_imgs/2017-08-02/1a95a54c0c5afb5b385790ad774222350c4c3aba.jpeg', '1501655489', '0'), ('153', '197', '/public/upload/car_imgs/2017-08-02/f1bbcebd0457f72ca885018bf4aa0d2acbd4ccf6.jpeg', '1501655489', '0'), ('154', '198', '/public/upload/car_imgs/2017-08-03/a0464df164bacc877c41b319a431c4ba13b27d6c.jpeg', '1501724927', '0'), ('155', '198', '/public/upload/car_imgs/2017-08-03/b013149691b4b344f032e0bdb2e7c02ce8e2a429.jpeg', '1501724927', '0'), ('156', '199', '/public/upload/car_imgs/2017-08-03/8ea7dab61c1563cc112bafca0545d6c20e502023.jpeg', '1501724937', '0'), ('157', '199', '/public/upload/car_imgs/2017-08-03/01d8bbb04f52c0b651c7b8e3f7a49ec443c09004.jpeg', '1501724937', '0'), ('158', '200', '/public/upload/car_imgs/2017-08-03/6234876670bde2c187332ea90d97c923984358a8.jpeg', '1501725182', '0'), ('159', '200', '/public/upload/car_imgs/2017-08-03/43a891f14915bafd1f5d894fe5ad79b1bd18d65c.jpeg', '1501725182', '0'), ('160', '201', '/public/upload/car_imgs/2017-08-03/ad5bdc4795d8593c769f3a6c81cabd9d9e2bd1fc.jpeg', '1501767413', '0'), ('161', '201', '/public/upload/car_imgs/2017-08-03/a4f7d22994935a47bccf74440b73ce70ccef236a.jpeg', '1501767413', '0'), ('162', '202', '/public/upload/car_imgs/2017-08-04/a25405c09e6ae7a5e91d060b6f7b1422cae9c44e.jpeg', '1501810686', '0'), ('163', '202', '/public/upload/car_imgs/2017-08-04/25094ed18ba2bbe607c66e901c4331a612ba9468.jpeg', '1501810686', '0'), ('164', '203', '/public/upload/car_imgs/2017-08-04/ada5e1dd923d7cc8a239ae23f0c7bdc001e53dda.jpeg', '1501816899', '0'), ('165', '203', '/public/upload/car_imgs/2017-08-04/74d8e67e132fbd3377f9d15187b6a17f248d6dc3.jpeg', '1501816899', '0'), ('166', '204', '/public/upload/car_imgs/2017-08-04/aa96f00c302e0f82d702b6e64af41c36c9935a9e.jpeg', '1501818252', '0'), ('167', '204', '/public/upload/car_imgs/2017-08-04/b88c846b49c41c1feccb0e4eb1fd6d5f151ac870.jpeg', '1501818252', '0'), ('168', '205', '/public/upload/car_imgs/2017-08-04/ec1d0314580427a236d56b4b285b729f15e24549.jpeg', '1501818777', '0'), ('169', '205', '/public/upload/car_imgs/2017-08-04/b3dac78669cf62b5af5ae610a8738c7e8731b146.jpeg', '1501818777', '0'), ('170', '206', '/public/upload/car_imgs/2017-08-04/a5aac810b3b5f9b174788e19413109ab00b4c7c6.jpeg', '1501830483', '0'), ('171', '206', '/public/upload/car_imgs/2017-08-04/826d384def2270066186a60231acd0b63e9ca1bb.jpeg', '1501830483', '0'), ('172', '207', '/public/upload/car_imgs/2017-08-05/ca59e159f50cfa5943136120e7c37eb41def25d8.jpeg', '1501896836', '0'), ('173', '207', '/public/upload/car_imgs/2017-08-05/26204198061c9f9a1cdfb075cb87440855ef58ce.jpeg', '1501896837', '0'), ('174', '208', '/public/upload/car_imgs/2017-08-05/ffe1471c3f1258b35eb459fbc3c2dcdb1845858a.jpeg', '1501897491', '0'), ('175', '208', '/public/upload/car_imgs/2017-08-05/5959d0990b626c3e2f9989ef1aa7d7a537191bc1.jpeg', '1501897491', '0'), ('176', '209', '/public/upload/car_imgs/2017-08-05/fbd557d4217b090d18618e7fc3f86ec49a11c417.jpeg', '1501898820', '0'), ('177', '209', '/public/upload/car_imgs/2017-08-05/1cb4b7acc97f12734fdbbd954747d283dc897ad4.jpeg', '1501898820', '0'), ('178', '210', '/public/upload/car_imgs/2017-08-05/88582d9f29b9116f4b290ea11bb17b3e63b0c207.jpeg', '1501898877', '0'), ('179', '210', '/public/upload/car_imgs/2017-08-05/28a8cca295b8dc892136eddd9e51fe5f215f2ac4.jpeg', '1501898877', '0'), ('180', '211', '/public/upload/car_imgs/2017-08-05/50354eaa6c52b0fbea8550406bdce4d1e23e8e9b.jpeg', '1501899163', '0'), ('181', '211', '/public/upload/car_imgs/2017-08-05/ec635c9742a3473ead29da71f1533025d0a75a4c.jpeg', '1501899163', '0'), ('182', '212', '/public/upload/car_imgs/2017-08-05/99353b1ab9251ba6678b09559f7a4865d9f91cc3.jpeg', '1501899225', '0'), ('183', '212', '/public/upload/car_imgs/2017-08-05/955eaebd4d1689912fd585988aad777e684bd35f.jpeg', '1501899225', '0'), ('184', '213', '/public/upload/car_imgs/2017-08-05/e95e7d1512893dbca5255d6c7e3205e74de3b38c.jpeg', '1501899735', '0'), ('185', '213', '/public/upload/car_imgs/2017-08-05/1d0174fcd047482431e0613ea3b277578b2fe8cd.jpeg', '1501899735', '0'), ('186', '214', '/public/upload/car_imgs/2017-08-05/0b5d5dbf95230bc11871a4c87828fbd05f8db0e1.jpeg', '1501899761', '0'), ('187', '214', '/public/upload/car_imgs/2017-08-05/8d6ec9a2bad23df6e90ca77c0d2bb042fbd7baae.jpeg', '1501899761', '0'), ('188', '215', '/public/upload/car_imgs/2017-08-05/a66bfdcb355465b109caea4abefbce65e2f2343f.jpeg', '1501899883', '0'), ('189', '215', '/public/upload/car_imgs/2017-08-05/3b26f7ab79153e09ef9b2d62940359d485f92f34.jpeg', '1501899883', '0'), ('190', '226', '/public/upload/car_imgs/2017-08-05/fe7364cb40c3d4008142685656f5654b1b88dc86.jpeg', '1501915459', '0'), ('191', '226', '/public/upload/car_imgs/2017-08-05/99d2cb506506dbf2a930c19cb852cc54b1487681.jpeg', '1501915459', '0'), ('192', '227', '/public/upload/car_imgs/2017-08-07/63ae050506a271b9221568de60b6e517f741b36b.jpeg', '1502089078', '0'), ('193', '227', '/public/upload/car_imgs/2017-08-07/4cb15b69143fa796e44b92779bc1a491b8e0e1dd.jpeg', '1502089078', '0'), ('194', '228', '/public/upload/car_imgs/2017-08-07/c0a85eafaaab0183ea5a058e2d7d4c71ad3a46aa.jpeg', '1502090264', '0'), ('195', '228', '/public/upload/car_imgs/2017-08-07/33677a6c8371eb41ec0637dfbac0da01cbe96139.jpeg', '1502090264', '0'), ('196', '229', '/public/upload/car_imgs/2017-08-07/b1b5d1e7774f511495e8112683b341f4c454d2d8.jpeg', '1502090618', '0'), ('197', '229', '/public/upload/car_imgs/2017-08-07/bf6f9f8161a4bd6cbf1412be3bcf6c1c52d2bc17.jpeg', '1502090618', '0'), ('198', '230', '/public/upload/car_imgs/2017-08-08/1a9a49e8e4747cf7c6e84e6391750ebe2bd59d5a.jpeg', '1502173169', '0'), ('199', '230', '/public/upload/car_imgs/2017-08-08/dab1f4c6c785bfa747d1e7c364e80f0509d11968.jpeg', '1502173169', '0'), ('200', '231', '/public/upload/car_imgs/2017-08-08/884dfb22d2ea3e246659f88df8ca5898bf35460e.jpeg', '1502176461', '0'), ('201', '231', '/public/upload/car_imgs/2017-08-08/42ebdae38cf15c7ab2448b3304d65b635ccadb31.jpeg', '1502176461', '0'), ('202', '232', '/public/upload/car_imgs/2017-08-08/ef90fabcad9d51a5ec9c40eb5fc378edf3b18967.jpeg', '1502176844', '0'), ('203', '232', '/public/upload/car_imgs/2017-08-08/21b108e9b0454cefb17eaca3b11373235ebc5f71.jpeg', '1502176844', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
--  Records of `cdc_column`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_column` VALUES ('1', 'aaa', 'aaa', '0', '0'), ('2', 'bbb333', 'bbb', '0', '1501765211'), ('3', 'ccc', 'ccc', '0', '0'), ('4', '54245', '452452', '1501929178', '1501929178');
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
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COMMENT='交强险详情';

-- ----------------------------
--  Records of `cdc_compensatory_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_compensatory_detail` VALUES ('74', '74', '74', '74.00', '74.00', '1501659346', '1500000000', '1700000000', '0'), ('75', '75', '75', '75.00', '75.00', '1501659357', '1500000000', '1700000000', '0'), ('76', '76', '76', '76.00', '76.00', '1501659366', '1500000000', '1700000000', '0'), ('77', '77', '77', '77.00', '77.00', '1501659380', '1500000000', '1700000000', '0'), ('78', '78', '78', '78.00', '78.00', '1501659389', '1500000000', '1700000000', '0'), ('79', '79', '79', '79.00', '79.00', '1501659399', '1500000000', '1700000000', '0'), ('80', '80', '80', '80.00', '80.00', '1501659409', '1500000000', '1700000000', '0'), ('81', '81', '81', '81.00', '81.00', '1501659417', '1500000000', '1700000000', '0'), ('82', '82', '82', '82.00', '82.00', '1501659425', '1500000000', '1700000000', '0'), ('83', '83', '83', '83.00', '83.00', '1501659434', '1500000000', '1700000000', '0'), ('84', '84', '84', '84.00', '84.00', '1501659443', '1500000000', '1700000000', '0'), ('85', '85', '85', '85.00', '85.00', '1501659452', '1500000000', '1700000000', '0'), ('86', '86', '86', '86.00', '86.00', '1501659469', '1500000000', '1500000002', '0'), ('87', '87', '87', '87.00', '87.00', '1501659483', '1700000000', '1900000000', '0'), ('88', '88', '88', '88.00', '88.00', '1501659492', '1500000000', '1700000000', '0'), ('89', '', '', '0.00', '0.00', '1501666451', '0', '0', '0'), ('90', '', '', '0.00', '0.00', '1501668662', '0', '0', '0'), ('91', '', '', '0.00', '0.00', '1501671954', '0', '0', '0'), ('92', '', '', '0.00', '0.00', '1501829630', '0', '0', '0'), ('93', '', '', '0.00', '0.00', '1501834764', '0', '0', '0'), ('94', '', '', '0.00', '0.00', '1502095912', '0', '0', '0'), ('95', '', '', '0.00', '0.00', '1502162554', '0', '0', '0'), ('96', '', '', '0.00', '0.00', '1502162695', '0', '0', '0');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='驾驶证照片表';

-- ----------------------------
--  Records of `cdc_driving_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_img` VALUES ('17', '25', '/public/upload/driver_imgs/2017-08-02/9b3125a35678c8daa95f8d95dc3ccda30a17c882.jpeg', '1501654792', '0'), ('18', '26', '/public/upload/driver_imgs/2017-08-02/b1915a48bc890adc947ad8daccf4190e97e5b4fb.jpeg', '1501671516', '0'), ('19', '28', '/public/upload/driver_imgs/2017-08-04/b111ccd9c993921b8bd18b370c9c8ac47f5c7701.jpeg', '1501815033', '0'), ('20', '29', '/public/upload/driver_imgs/2017-08-04/973ee02a98f26c97abca80ba6f0e68532e349d4a.jpeg', '1501829509', '0'), ('21', '30', '/public/upload/driver_imgs/2017-08-05/13d5b69864437fbd9ed1cc170a7341f06f65aa6c.jpeg', '1501904425', '0'), ('22', '31', '/public/upload/driver_imgs/2017-08-05/3becde0fc51582a603257b074aef35b749728292.jpeg', '1501904466', '0'), ('23', '32', '/public/upload/driver_imgs/2017-08-05/4e24bb21e1f9ca7ab7a9ecc1e9a407f406713b9e.jpeg', '1501921291', '0'), ('24', '33', '/public/upload/driver_imgs/2017-08-05/080d69ce224f99bb402f231a377b2ae73a06af6d.jpeg', '1501921367', '0'), ('25', '34', '/public/upload/driver_imgs/2017-08-07/ac725715280ff7ea88e1bb3f2e4dcd2a5cb9aedd.jpeg', '1502085717', '0'), ('26', '35', '/public/upload/driver_imgs/2017-08-07/440664185e73ea0a59dc0ff6f07f3cfb122afba2.jpeg', '1502090214', '0'), ('27', '36', '/public/upload/driver_imgs/2017-08-07/545c01f52c6000797c838e26502b0608ca414a62.jpeg', '1502090767', '0'), ('28', '37', '/public/upload/driver_imgs/2017-08-07/07937a488fe372390648eb9a0dfac8cb54ee4bad.jpeg', '1502091138', '0'), ('29', '38', '/public/upload/driver_imgs/2017-08-07/15c252353aff4a6bc73bd8e146f9e5fbb40f3917.jpeg', '1502091342', '0'), ('30', '39', '/public/upload/driver_imgs/2017-08-07/3732fe5c2db7a068664b7d9bb8934ba24b8a1b9b.jpeg', '1502091602', '0'), ('31', '40', '/public/upload/driver_imgs/2017-08-08/1b3efd5afdca3aa24af4251ceb4195101834077f.jpeg', '1502176380', '0'), ('32', '41', '/public/upload/driver_imgs/2017-08-08/4d132a142cea1403118f0859ebc0067141144c5c.jpeg', '1502176679', '0'), ('33', '42', '/public/upload/driver_imgs/2017-08-08/1ca2373d1c38b5d552afea31a6ee486125c8e5aa.jpeg', '1502176920', '0'), ('34', '43', '/public/upload/driver_imgs/2017-08-08/3dd66759473fe3a52d6979a4447b132f3d10e949.jpeg', '1502176956', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='驾驶证表';

-- ----------------------------
--  Records of `cdc_driving_license`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_driving_license` VALUES ('26', '3', '支小宝', '男', '中国', '123456202001011234', '20110909', '20110909', 'C1', '20100909', '20100909%', '0', '1501671516', '0'), ('27', '2', '支小宝', '女', '中国', '123456202001011234', '20110909', '20110909', 'C1', '20100909', '20100909', '1', '1501671516', '0'), ('29', '13', '胡江', '男', '中国', '510321199506090015', '19950609', '20160408', 'C1', '20101010', '20101010', '0', '1501829509', '0'), ('30', '18', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '8555', '0', '1501904425', '0'), ('31', '18', '黄桂贤2', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '88', '1', '1501904466', '0'), ('32', '18', '动次打次', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '56', '1', '1501921291', '0'), ('33', '18', '玛卡瑞纳', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '86', '1', '1501921367', '0'), ('34', '19', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '5', '1', '1502085717', '0'), ('35', '16', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '5', '1', '1502090214', '0'), ('36', '17', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '55', '1', '1502090767', '0'), ('37', '20', '郑嘉荣', '男', '中国', '440782198905114717', '19890511', '20120229', 'C1', '20120229', '20202020', '0', '1502091138', '0'), ('38', '15', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '5', '1', '1502091342', '0'), ('39', '15', '黄桂贤2222', '男', '中国', '441802198503121118', '19850312', '20091013', 'CC1', '20091013', '85', '1', '1502091602', '0'), ('40', '21', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'C1', '20170808', '20170808', '0', '1502176380', '0'), ('41', '21', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'C1', '20170808', '20170808', '1', '1502176679', '0'), ('42', '22', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'C1', '20080310', '20080310', '1', '1502176920', '0'), ('43', '22', '黄桂贤', '男', '中国', '441802198503121118', '19850312', '20091013', 'C1', '20080310', '20080310', '1', '1502176956', '0');
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
  `status` tinyint(4) DEFAULT '0' COMMENT '是否认证 0:没有 1:已认证',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='会员认证信息表';

-- ----------------------------
--  Records of `cdc_identification`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification` VALUES ('1', '1', '奥巴马12', '哈尼', '0', '1961年8月04日', '1585868555', '2017.08.01', '2017.09.08', '1', '1501566317', '0'), ('2', '2', '奥巴马', '哈尼', '男', '19610804', '5', '5', '8', '1', '1501656222', '0'), ('3', '3', '奥巴马', '哈尼', '男', '19610804', '77', '7', '8', '1', '1501644761', '0'), ('4', '4', '', '', '', '', '', '', '', '0', '1501639556', '0'), ('5', '5', '', '', '', '', '', '', '', '0', '1501639556', '0'), ('6', '6', '', '', '', '', '', '', '', '0', '1501639556', '0'), ('7', '7', '', '', '', '', '', '', '', '0', '1501639556', '0'), ('8', '8', '', '', '', '', '', '', '', '0', '1501639556', '0'), ('9', '9', '', '', '', '', '', '', '', '0', '1501640800', '0'), ('10', '10', '', '', '', '', '', '', '', '0', '1501641123', '0'), ('11', '11', '', '', '', '', '', '', '', '0', '0', '0'), ('12', '12', '', '', '', '', '', '', '', '0', '1501740573', '0'), ('13', '13', '胡江', '汉', '男', '19950609', '510321199506090015', '20100707', '20100808', '1', '1501814936', '0'), ('14', '14', '', '', '', '', '', '', '', '0', '1501817179', '0'), ('15', '15', '网真慢', '哈尼', '男', '19610804', '86', '558', '568', '1', '1502091184', '0'), ('16', '16', '亚伯拉罕', '哈尼', '男', '19610804', '767', '7582', '885', '1', '1501921780', '0'), ('17', '17', '网太慢', '哈尼', '男', '19610804', '88', '855', '888', '1', '1502090529', '0'), ('18', '18', '次哒次动打次', '', '', '', '5555 585564656832', '', '', '1', '1501900765', '0'), ('19', '19', '奥升马', '哈尼', '男', '19610804', '868', '8585', '858655858', '1', '1501905144', '0'), ('20', '20', '呵呵大', '', '', '', '73838372838', '', '', '1', '1502088743', '0'), ('21', '21', '昂恪', '', '', '', '45666', '', '', '1', '1502172301', '0'), ('22', '22', '奥巴马', '哈尼', '男', '19610804', '513030199201154048', '20280808', '20280808', '1', '1502176812', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='认证图片表';

-- ----------------------------
--  Records of `cdc_identification_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_identification_img` VALUES ('22', '2', '/public/upload/identification_imgs/2017-08-02/1ba2e67b4a760fd1da1f261fa5bec89173589c69.jpeg', '1501640317', '0'), ('23', '2', '/public/upload/identification_imgs/2017-08-02/b8b6ac9643aaa30c95e6ba24730b0a2d4f6c68b6.jpeg', '1501640317', '0'), ('24', '2', '/public/upload/identification_imgs/2017-08-02/6def04ac7f36086f723f28ff06e1e7c642d85ccd.jpeg', '1501640567', '0'), ('25', '2', '/public/upload/identification_imgs/2017-08-02/0d3dc14e3e2ac2a6bb640d75a7aa52fa344baf22.jpeg', '1501640567', '0'), ('26', '3', '/public/upload/identification_imgs/2017-08-02/2b004f3e76cb15a5a1e8d46bdbd0b3b00b8beea9.jpeg', '1501644761', '0'), ('27', '3', '/public/upload/identification_imgs/2017-08-02/217913e894158a2a1c1e4f2d3141ed597ba9fd52.jpeg', '1501644761', '0'), ('28', '2', '/public/upload/identification_imgs/2017-08-02/9a1f39fb79f7d233e60042a102d7003ecbcc3daa.jpeg', '1501656222', '0'), ('29', '2', '/public/upload/identification_imgs/2017-08-02/9a1f39fb79f7d233e60042a102d7003ecbcc3daa.jpeg', '1501656222', '0'), ('30', '13', '/public/upload/identification_imgs/2017-08-04/07ab1b9cea995e6617caf479b8b35ce23e0ac9f4.jpeg', '1501814936', '0'), ('31', '13', '/public/upload/identification_imgs/2017-08-04/8c678f08b4172e5465c2d93c17f4a3c42ff3f994.jpeg', '1501814936', '0'), ('32', '18', '/public/upload/identification_imgs/2017-08-05/af1eb82981ef327e625d5909bb8f82b8b4dffe6c.jpeg', '1501900765', '0'), ('33', '18', '/public/upload/identification_imgs/2017-08-05/474fed0a3d0f644b054a53caa576e3cdd3c89ca1.jpeg', '1501900765', '0'), ('34', '19', '/public/upload/identification_imgs/2017-08-05/2f54d9ccd48f8377d4f14c2788b2aeee678e4942.jpeg', '1501905144', '0'), ('35', '19', '/public/upload/identification_imgs/2017-08-05/5f59e6edaf4f4ca5bf930c2329e9541f209558ee.jpeg', '1501905144', '0'), ('36', '16', '/public/upload/identification_imgs/2017-08-05/a67fe29dfd47b5dbf9f54a2282f81d8099df2d34.jpeg', '1501921780', '0'), ('37', '16', '/public/upload/identification_imgs/2017-08-05/d4e285fca31bce8c40901e181d876fc216a2b888.jpeg', '1501921780', '0'), ('38', '20', '/public/upload/identification_imgs/2017-08-07/374808489413377b6bab2d2dc61546c2c630dd4e.jpeg', '1502088743', '0'), ('39', '17', '/public/upload/identification_imgs/2017-08-07/07631bf6f96966b67a5875774357423eb60e5a44.jpeg', '1502090529', '0'), ('40', '17', '/public/upload/identification_imgs/2017-08-07/bce5820c49c910451f3e4e3dd05ff6a722fb02f8.jpeg', '1502090529', '0'), ('41', '15', '/public/upload/identification_imgs/2017-08-07/7ecc7ceea896fd4167439612f55bb748416ea1c9.jpeg', '1502091184', '0'), ('42', '15', '/public/upload/identification_imgs/2017-08-07/faae88f4663f7651fde0542db803907fe074f25d.jpeg', '1502091184', '0'), ('43', '21', '/public/upload/identification_imgs/2017-08-08/1261fbd36b389963865ed9414f6dcfa491a75379.jpeg', '1502172301', '0'), ('44', '21', '/public/upload/identification_imgs/2017-08-08/1ba19b04076c8e78fbc0ae4f58a221a08eb48390.jpeg', '1502172301', '0'), ('45', '21', '/public/upload/identification_imgs/2017-08-08/670c8e0146e960e8600d879f26481ab6219e5579.jpeg', '1502172301', '0'), ('46', '22', '/public/upload/identification_imgs/2017-08-08/ba3771158fa649933d113704f04c47c00bd093c9.jpeg', '1502176812', '0'), ('47', '22', '/public/upload/identification_imgs/2017-08-08/1ff38de4059885de4cee6b553769f0169b4e6572.jpeg', '1502176812', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='保险种类表';

-- ----------------------------
--  Records of `cdc_insurance`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance` VALUES ('1', '交强险', '1', '10000', '1', '1500000000', '0'), ('2', '盗抢险', '2', '20000', '1', '1500000000', '0'), ('3', '非礼险', '2', '3', '0', '1500000000', '1501682156');
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
  `status` tinyint(1) DEFAULT '1' COMMENT '1正常 0冻结',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='保险公司表';

-- ----------------------------
--  Records of `cdc_insurance_company`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_company` VALUES ('1', '中国人寿', '这是一家很好的公司', '1501122798', '1501122798', '1'), ('2', '中国平安', '这是中国平安公司,我修改了东西', '1501680427', '1501141994', '1'), ('3', '用户', '有', '1501667054', '0', '1'), ('4', '用户', '有', '1501667060', '0', '1'), ('5', '中国人寿1', '阿萨德', '1501680138', '0', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COMMENT='保险订单绑定详情表';

-- ----------------------------
--  Records of `cdc_insurance_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_detail` VALUES ('110', '188', '197', '2', '待核保', '1501659346', '1502088587'), ('111', '189', '197', '2', '待核保', '1501659357', '0'), ('112', '190', '197', '2', '待核保', '1501659366', '0'), ('113', '191', '197', '2', '待核保', '1501659380', '0'), ('114', '192', '197', '2', '待核保', '1501659389', '0'), ('115', '193', '197', '2', '待核保', '1501659399', '0'), ('116', '194', '197', '2', '待核保', '1501659408', '0'), ('117', '195', '197', '2', '待核保', '1501659416', '0'), ('118', '196', '197', '2', '待核保', '1501659425', '0'), ('119', '197', '197', '2', '待核保', '1501659434', '0'), ('120', '198', '197', '2', '待核保', '1501659443', '0'), ('121', '199', '197', '2', '待核保', '1501659452', '0'), ('122', '200', '197', '2', '待核保', '1501659469', '0'), ('123', '201', '197', '2', '待核保', '1501659483', '0'), ('124', '202', '197', '2', '已取消', '1501659492', '0'), ('125', '203', '196', '3', '待核保', '1501666451', '0'), ('126', '204', '196', '3', '待核保', '1501668661', '0'), ('127', '205', '196', '3', '待核保', '1501671954', '0'), ('128', '211', '205', '13', '待核保', '1501829630', '0'), ('129', '212', '200', '2', '待核保', '1501834764', '0'), ('130', '217', '200', '2', '待核保', '1502095912', '0'), ('131', '218', '226', '19', '待核保', '1502162554', '0'), ('132', '219', '226', '19', '待核保', '1502162695', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8 COMMENT='险种和订单绑定表';

-- ----------------------------
--  Records of `cdc_insurance_element`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_element` VALUES ('257', '188', '交强险', '标准', '不计免赔', '1501659346', '0'), ('258', '189', '交强险', '标准', '0', '1501659357', '0'), ('259', '188', '二手险', '保额44W', '0', '1501659357', '0'), ('260', '190', '交强险', '标准', '0', '1501659366', '0'), ('261', '190', '二手险', '保额44W', '0', '1501659366', '0'), ('262', '191', '非礼险', '保额66W', '0', '1501659380', '0'), ('263', '191', '二手险', '保额44W', '0', '1501659380', '0'), ('264', '191', '第三者险', '标准', '0', '1501659380', '0'), ('265', '192', '二手险', '保额44W', '0', '1501659388', '0'), ('266', '193', '非礼险', '保额66W', '0', '1501659399', '0'), ('267', '194', '第三者险', '标准', '0', '1501659408', '0'), ('268', '195', '二手险', '保额44W', '0', '1501659416', '0'), ('269', '196', '盗抢险', '保额30W', '0', '1501659425', '0'), ('270', '197', '第三者险', '标准', '0', '1501659434', '0'), ('271', '198', '非礼险', '保额66W', '0', '1501659443', '0'), ('272', '199', '二手险', '保额44W', '0', '1501659452', '0'), ('273', '200', '二手险', '保额44W', '0', '1501659469', '0'), ('274', '201', '交强险', '标准', '0', '1501659483', '0'), ('275', '202', '二手险', '保额44W', '0', '1501659492', '0'), ('276', '203', '交强险', '标准', '不计免赔', '1501666450', '0'), ('277', '203', '盗抢险', '保额30W', '不计免赔', '1501666450', '0'), ('278', '203', '非礼险', '保额66W', '0', '1501666450', '0'), ('279', '203', '二手险', '保额44W', '0', '1501666451', '0'), ('280', '204', '交强险', '标准', '0', '1501668661', '0'), ('281', '205', '二手险', '保额44W', '0', '1501671954', '0'), ('282', '205', '第三者险', '标准', '0', '1501671954', '0'), ('288', '211', '交强险', '标准', '不计免赔', '1501829630', '0'), ('289', '211', '盗抢险', '保额100W', '0', '1501829630', '0'), ('290', '211', '非礼险', '保额66W', '0', '1501829630', '0'), ('291', '212', '交强险', '标准', '0', '1501834764', '0'), ('292', '212', '盗抢险', '保额100W', '0', '1501834764', '0'), ('293', '212', '非礼险', '保额66W', '0', '1501834764', '0'), ('301', '217', '交强险', '标准', '0', '1502095912', '0'), ('302', '218', '交强险', '标准', '0', '1502162554', '0'), ('303', '219', '盗抢险', '保额30W', '0', '1502162695', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8 COMMENT='保险订单表';

-- ----------------------------
--  Records of `cdc_insurance_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_insurance_order` VALUES ('188', 'A802593462850488', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659346', '0', '0', null, ''), ('189', 'A802593568326541', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659356', '0', '0', null, ''), ('190', 'A802593661021839', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659366', '0', '0', null, ''), ('191', 'A802593797639614', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659379', '0', '0', null, ''), ('192', 'A802593886724703', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659388', '0', '0', null, ''), ('193', 'A802593989530682', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659399', '0', '0', null, ''), ('194', 'A802594085346089', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659408', '0', '0', null, ''), ('195', 'A802594166550765', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659416', '0', '0', null, ''), ('196', 'A802594250505520', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659425', '0', '0', null, ''), ('197', 'A802594338430518', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659433', '0', '0', null, ''), ('198', 'A802594428785742', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659442', '0', '0', null, ''), ('199', 'A802594519180857', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659452', '0', '0', null, ''), ('200', 'A802594689980671', '6', '奥巴驴', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659469', '0', '0', null, ''), ('201', 'A802594834488926', '6', '奥巴驴', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659483', '0', '0', null, ''), ('202', 'A802594918923793', '6', '奥巴驴', '男', '哈尼', '5', '13161672102', '陕AN347', '中国平安', '0', '0', '1501659491', '0', '0', null, ''), ('203', 'A802664506453919', '6', '奥巴马', '男', '哈尼', '77', '17600204335', '陕AN34', '中国人寿', '0', '0', '1501666450', '0', '0', null, ''), ('204', 'A802686616508565', '6', '奥巴马', '男', '哈尼', '77', '17600204335', '陕AN34', '中国平安', '0', '0', '1501668661', '0', '0', null, ''), ('205', 'A802719542081704', '6', '奥巴马', '男', '哈尼', '77', '17600204335', '陕AN34', '中国人寿', '0', '0', '1501671954', '0', '0', null, ''), ('211', 'A804296299951656', '6', '胡江', '男', '汉', '510321199506090015', '13198580936', '浙F956NS', '中国人寿', '0', '0', '1501829630', '0', '0', null, ''), ('212', 'A804347643958345', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN34', '中国人寿1', '0', '0', '1501834764', '0', '0', null, ''), ('217', 'A807959122264425', '6', '奥巴马', '男', '哈尼', '5', '13161672102', '陕AN34', '中国人寿1', '0', '0', '1502095912', '0', '0', '未审核', '未付款'), ('218', 'A808625543505110', '6', '奥升马', '男', '哈尼', '868', '13132151558', '陕AN34225', '中国人寿1', '0', '0', '1502162554', '0', '0', '未审核', '未付款'), ('219', 'A808626951625637', '6', '奥升马', '男', '哈尼', '868', '13132151558', '陕AN34225', '中国人寿1', '0', '0', '1502162695', '0', '0', '未审核', '未付款');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='邀请码表';

-- ----------------------------
--  Records of `cdc_invitation_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_invitation_code` VALUES ('1', '1', '123456', '0', '1500000000', '0'), ('2', '4', '123456', '0', null, '0');
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
  `system_switch` tinyint(2) DEFAULT '1' COMMENT '系统消息开关',
  `order_switch` tinyint(2) DEFAULT '1' COMMENT '订单跟踪消息开关',
  `check_switch` tinyint(2) DEFAULT '1' COMMENT '审核消息开关',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COMMENT='客户端用户表';

-- ----------------------------
--  Records of `cdc_member`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member` VALUES ('1', '13812345678', '4', null, '1', '1', '1501586778', '192.168.2.195', null, '1500003853', '1501593068', null, '1', '1', '1'), ('2', '13161672102', '1', null, '1', '1', '1501834565', '192.168.2.118', null, '1501636749', null, null, '1', '1', '0'), ('3', '17600204335', '1', null, '1', '1', '1501914832', '127.0.0.1', null, '1501639556', null, null, '1', '1', '1'), ('4', '17600204336', '1', null, '1', '0', '0', null, null, '1501640258', null, null, '1', '1', '1'), ('5', '17600204337', '1', null, '1', '0', '0', null, null, '1501640266', null, null, '1', '1', '1'), ('6', '17600204338', '1', null, '1', '0', '0', null, null, '1501640270', null, null, '1', '1', '1'), ('7', '17600204339', '1', null, '1', '0', '0', null, null, '1501640275', null, null, '1', '1', '1'), ('8', '17600204334', '1', null, '1', '0', '0', null, null, '1501640281', null, null, '1', '1', '1'), ('9', '17600204333', '1', null, '1', '0', '0', null, null, '1501640800', null, null, '1', '1', '1'), ('10', '17600204332', '1', null, '1', '0', '0', null, null, '1501641123', null, null, '1', '1', '1'), ('11', '13165656565', '4', null, '1', '1', '0', null, null, '1501668530', '1501668530', null, '1', '1', '1'), ('12', '13112121212', '1', null, '1', '0', '0', null, null, '1501740573', null, null, '1', '1', '1'), ('13', '13198580936', '1', null, '1', '1', '1501834739', '192.168.2.118', null, '1501814651', null, null, '1', '1', '1'), ('14', '13219890986', '1', null, '1', '0', '1501817179', '192.168.2.118', null, '1501817179', null, null, '1', '1', '1'), ('15', '13548210932', '1', null, '1', '1', '0', null, null, '1501828794', null, null, '1', '1', '1'), ('16', '13548210931', '1', null, '1', '1', '1502155917', '127.0.0.1', null, '1501828927', null, null, '1', '1', '1'), ('17', '13161672103', '1', null, '1', '1', '0', null, null, '1501829050', null, null, '1', '1', '1'), ('18', '13161672105', '1', null, '1', '2', '1501904381', '192.168.2.118', null, '1501847080', null, null, '1', '1', '1'), ('19', '13132151558', '1', null, '1', '1', '0', null, null, '1501847190', null, null, '1', '1', '1'), ('20', '13198580938', '1', null, '1', '2', '0', null, null, '1502088702', null, null, '1', '1', '1'), ('21', '13308025470', '1', null, '1', '2', '0', null, null, '1502171769', null, null, '1', '1', '1'), ('22', '18782272460', '1', null, '1', '1', '0', null, null, '1502176757', null, null, '1', '1', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='邀请码消耗表';

-- ----------------------------
--  Records of `cdc_member_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_member_code` VALUES ('6', '1', '2', '0', '0'), ('7', '2', '1', '1501636749', '0'), ('8', '3', '1', '1501639556', '0'), ('9', '4', '1', '0', '0'), ('10', '5', '1', '0', '0'), ('11', '6', '1', '0', '0'), ('12', '7', '1', '0', '0'), ('13', '8', '1', '0', '0'), ('14', '9', '1', '0', '0'), ('15', '10', '1', '0', '0'), ('16', '12', '1', '1501740573', '0'), ('17', '13', '1', '1501814651', '0'), ('18', '14', '1', '1501817179', '0'), ('19', '15', '1', '1501828794', '0'), ('20', '16', '1', '1501828928', '0'), ('21', '17', '1', '1501829050', '0'), ('22', '18', '1', '1501847080', '0'), ('23', '19', '1', '1501847190', '0'), ('24', '20', '1', '1502088702', '0'), ('25', '21', '1', '1502171769', '0'), ('26', '22', '1', '1502176757', '0');
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
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_menu`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_menu` VALUES ('1', '首页', null, '/site/index', '1', null), ('2', '首页', '1', '/site/index', '1', null), ('3', '组织', null, 'javascript:void(0);', '1', null), ('4', '会员', '3', '/member/index', '1', null), ('5', '业务员', '3', '/salesman/index', '1', null), ('6', '服务商', '3', '/service/index', '1', null), ('7', '业务', null, 'javascript:void(0);', '1', null), ('8', '订单池', '7', '/order/wall', '1', null), ('9', '订单列表', '7', '/order/index', '1', null), ('10', '保险订单', '7', '/insurance-order/index', '1', null), ('11', '审核', null, 'javascript:void(0);', '1', null), ('12', '身份证', '11', '/a/a', '1', null), ('13', '行驶证', '11', '/b/b', '1', null), ('14', '服务商', '11', '/c-order/c', '1', null), ('15', '内容', null, 'javascript:void(0);', '1', null), ('16', '行驶证', '15', '/column/index', '1', null), ('17', '服务商', '15', '/article/index', '1', null), ('18', '档案', null, 'javascript:void(0);', '1', null), ('19', '驾照', '18', '/driver/index', '1', null), ('20', '身份证', '18', '/identity/index', '1', null), ('21', '行驶证', '18', '/car/index', '1', null), ('22', '保单', '18', '/insurance-order/index', '1', null), ('23', '设置', null, 'javascript:void(0);', '1', null), ('24', '系统', '23', '/system/index', '1', null), ('25', '保险商', '23', '/insurance-company/index', '1', null), ('26', '险种', '23', '/insurance/index', '1', null), ('27', '我的信息', '23', '/service/profile', '1', null), ('28', '权限', null, 'javascript:void(0);', '1', null), ('29', '角色', '28', '/rbac/role-index', '1', null), ('30', '员工', '28', '/rbac/user', '1', null), ('31', '分配', '28', '/rbac/menu-assign', '1', null), ('32', '权限管理', null, 'javascript:void(0);', '1', null), ('33', '路由管理', '32', '/admin/route', '1', null), ('34', '权限管理', '32', '/admin/permission', '1', null), ('35', '角色管理', '32', '/admin/menu', '1', null), ('36', '权限分配', '32', '/admin/role', '1', null), ('37', '用户管理', '32', '/admin/assignment', '1', null), ('38', '用户管理', '32', '/admin/user', '1', null);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

-- ----------------------------
--  Records of `cdc_message_code`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_message_code` VALUES ('1', '18030492737', '6324', '0', '1501316637', '0'), ('2', '18030492737', '3049', '0', '1501316775', '0'), ('3', '18030492737', '3173', '-1', '1501316802', '0'), ('4', '18030492737', '1612', '-1', '1501316876', '0'), ('5', '18030492737', '8953', '-1', '1501316967', '0'), ('6', '13161672102', '8029', '-1', '1501317110', '0'), ('7', '17000000000', '0000', '0', '0', '0'), ('8', '17600204335', '6373', '-1', '1501576556', '0'), ('9', '13161672102', '6626', '0', '1501646507', '0'), ('10', '17600204335', '7121', '-1', '1501646579', '0'), ('11', '17600204335', '7095', '-1', '1501652915', '0'), ('12', '13161672102', '1430', '0', '1501654837', '0'), ('13', '13161672102', '9504', '-1', '1501655916', '0'), ('14', '13161672102', '2839', '-1', '1501656114', '0'), ('15', '13198580936', '2428', '-1', '1501669000', '0'), ('16', '13198580936', '4733', '0', '1501669008', '0'), ('17', '13198580936', '8848', '0', '1501672016', '0'), ('18', '17600204335', '8129', '-1', '1501759613', '0'), ('19', '17600204335', '3056', '-1', '1501759852', '0'), ('20', '13161672102', '6579', '-1', '1501759872', '0'), ('21', '13161672102', '7137', '0', '1501813797', '0'), ('22', '13161672102', '8907', '0', '1501813857', '0'), ('23', '13198580936', '4729', '0', '1501814620', '0'), ('24', '13219890986', '5439', '0', '1501817076', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COMMENT='服务端消息通知表';

-- ----------------------------
--  Records of `cdc_notice`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_notice` VALUES ('135', 'member', '2', '21312', '1501639556', '0'), ('136', 'member', '2', '231321', '1501642092', '0'), ('137', 'member', '2', '21312321321', '1501642259', '0'), ('138', 'member', '2', '21312321321321', '1501642961', '0'), ('139', 'member', '2', '1', '1501643293', '0'), ('140', 'member', '2', '2', '1501654728', '0'), ('141', 'member', '2', '3', '1501654729', '0'), ('142', 'member', '2', '4', '1501654730', '0'), ('143', 'member', '2', '5', '1501654731', '0'), ('144', 'member', '2', '6', '1501654732', '0'), ('146', 'member', '2', '7', '1501654733', '0'), ('147', 'member', '2', '8', '1501654734', '0'), ('148', 'member', '2', '9', '1501654735', '0'), ('149', 'member', '2', '10', '1501654736', '0'), ('150', 'user', '1', '您的会员【奥巴马】创建了一个【汽车维修】订单，订单号：【A802610259381191】', '1501661026', '0'), ('151', 'user', '1', '您的会员【奥巴马】创建了一个【汽车审车(上线)】订单，订单号：【A802665266877499】', '1501666527', '0'), ('152', 'user', '1', '您的会员【奥巴马】创建了一个【汽车救援】订单，订单号：【A802668002723927】', '1501666800', '0'), ('153', 'user', '1', '您的会员【奥巴马】创建了一个【汽车维修】订单，订单号：【A802781612082091】', '1501678161', '0'), ('154', 'user', '1', '您的会员【奥巴马】创建了一个【汽车救援】订单，订单号：【A803244154572928】', '1501724415', '0'), ('155', 'member', '3', '您的管家【龙龙】为您创建了一个【汽车审车(上线)】订单，订单号：【A803708317661588】', '1501770832', '0'), ('156', 'member', '3', '您的管家【龙龙】为您创建了一个【汽车审车(上线)】订单，订单号：【A804105828887342】', '1501810583', '0'), ('157', 'user', '1', '您的会员【奥巴马】创建了一个【汽车维修】订单，订单号：【A804126540912042】', '1501812654', '0'), ('158', 'user', '1', '您成功邀请一位新会员，手机号：【13198580936】', '1501814651', '0'), ('159', 'user', '1', '您成功邀请一位新会员，手机号：【13219890986】', '1501817179', '0'), ('160', 'user', '1', '您的会员【胡江】创建了一个【汽车审车(上线)】订单，订单号：【A804299779040694】', '1501829978', '0'), ('161', 'user', '1', '您的会员【胡江】创建了一个【汽车维修】订单，订单号：【A804305287765766】', '1501830529', '0'), ('162', 'user', '1', '您的会员【胡江】创建了一个【汽车维修】订单，订单号：【A804305856018271】', '1501830585', '0'), ('163', 'user', '1', '您的会员【胡江】创建了一个【汽车维修】订单，订单号：【A804306082291112】', '1501830608', '0'), ('164', 'user', '1', '您的会员【胡江】创建了一个【汽车维修】订单，订单号：【A804309186808755】', '1501830919', '0'), ('165', 'user', '1', '您的会员【胡江】创建了一个【汽车维修】订单，订单号：【A804310108941554】', '1501831011', '0'), ('166', 'user', '1', '您的会员【胡江】创建了一个【汽车维修】订单，订单号：【A804310290091816】', '1501831029', '0'), ('167', 'user', '1', '您的会员【胡江】创建了一个【汽车救援】订单，订单号：【A804311024143820】', '1501831102', '0'), ('168', 'user', '1', '您的会员【胡江】创建了一个【汽车救援】订单，订单号：【A804391181198547】', '1501839118', '0'), ('169', 'member', '13', '您的管家【动次打次】为您创建了一个【汽车审车(上线)】订单，订单号：【A804470181747108】', '1501847018', '0'), ('170', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A805975191921306】', '1501897519', '0'), ('171', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A805982127768082】', '1501898213', '0'), ('172', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车维修】订单，订单号：【A805222481945516】', '1501922248', '0'), ('173', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A805223018536272】', '1501922302', '0'), ('174', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A805224991229048】', '1501922499', '0'), ('175', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车维修】订单，订单号：【A805229694708008】', '1501922969', '0'), ('176', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807704686181537】', '1502070469', '0'), ('177', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807706738728955】', '1502070674', '0'), ('178', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807708548502492】', '1502070855', '0'), ('179', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807711965167808】', '1502071196', '0'), ('180', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807715649798695】', '1502071565', '0'), ('181', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807717480493334】', '1502071748', '0'), ('182', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807724615861433】', '1502072462', '0'), ('183', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807725769927491】', '1502072577', '0'), ('184', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807727252972300】', '1502072725', '0'), ('185', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807729604356763】', '1502072960', '0'), ('186', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807731964701811】', '1502073196', '0'), ('187', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807732432158580】', '1502073243', '0'), ('188', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807733074945348】', '1502073307', '0'), ('189', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807733139679043】', '1502073314', '0'), ('190', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807733800846826】', '1502073380', '0'), ('191', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807734723539577】', '1502073472', '0'), ('192', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807735349065375】', '1502073535', '0'), ('193', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807736248136856】', '1502073625', '0'), ('194', 'member', '18', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807737022921199】', '1502073702', '0'), ('195', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807750006503798】', '1502075001', '0'), ('196', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807755858388441】', '1502075586', '0'), ('197', 'member', '19', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807857741965898】', '1502085774', '0'), ('198', 'member', '20', '您的管家【动次打次】为您创建了一个【汽车维修】订单，订单号：【A807891021289372】', '1502089102', '0'), ('199', 'member', '20', '您的管家【动次打次】为您创建了一个【汽车救援】订单，订单号：【A807897345461060】', '1502089734', '0'), ('200', 'member', '20', '您的管家【动次打次】为您创建了一个【汽车维修】订单，订单号：【A807900146001205】', '1502090014', '0'), ('201', 'member', '16', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A807963063829913】', '1502096306', '0'), ('202', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A808622522442341】', '1502162252', '0'), ('203', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A808622636068809】', '1502162264', '0'), ('204', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A808624781351571】', '1502162478', '0'), ('205', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A808625040896308】', '1502162504', '0'), ('206', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车救援】订单，订单号：【A808627068962324】', '1502162707', '0'), ('207', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车救援】订单，订单号：【A808630574122844】', '1502163057', '0'), ('208', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车审车(上线)】订单，订单号：【A808630921092682】', '1502163092', '0'), ('209', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车审车(上线)】订单，订单号：【A808631136535015】', '1502163114', '0'), ('210', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A808631596521356】', '1502163160', '0'), ('211', 'member', '19', '您的管家【般拌办】为您创建了一个【汽车维修】订单，订单号：【A808632448850081】', '1502163245', '0'), ('212', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车维修】订单，订单号：【A808733584984784】', '1502173358', '0'), ('213', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车救援】订单，订单号：【A808736775507207】', '1502173677', '0'), ('214', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车维修】订单，订单号：【A808737301947386】', '1502173730', '0'), ('215', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车救援】订单，订单号：【A808738093292515】', '1502173809', '0'), ('216', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车审车(不上线)】订单，订单号：【A808740192202654】', '1502174019', '0'), ('217', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车维修】订单，订单号：【A808741326527573】', '1502174133', '0'), ('218', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车维修】订单，订单号：【A808742196957281】', '1502174220', '0'), ('219', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车维修】订单，订单号：【A808742206637802】', '1502174221', '0'), ('220', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车审车(上线)】订单，订单号：【A808748565871555】', '1502174856', '0'), ('221', 'member', '21', '您的管家【fghhh】为您创建了一个【汽车维修】订单，订单号：【A808757741216388】', '1502175774', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8 COMMENT='订单快照表';

-- ----------------------------
--  Records of `cdc_order`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order` VALUES ('194', 'A802420924591808', '2', '临渊', '17600204335', '陕AN34', '1', '2017-8-2 10:47', '兴业银行(环球中心支行)', '0', '龙龙皇家4S', '0.00', '1501642092', '0'), ('195', 'A802422586576982', '2', '哈哈', '17600204335', '陕AN34', '1', '2017-8-2 10:50', '兴业银行(环球中心支行)', '1', '老大的1S', '0.00', '1501642258', '0'), ('196', 'A802429613198899', '2', '德玛西亚', '17600204335', '陕AN34', '1', '2017-8-2 11:2', '兴业银行(环球中心支行)', '0', '龙龙皇家4S', '0.00', '1501642961', '0'), ('197', 'A802432931348612', '1', '我天', '17600204335', '陕AN34', '1', '2017-8-2 11:7', '兴业银行(环球中心支行)', '0', '龙龙皇家4S', '0.00', '1501643293', '0'), ('198', 'A802547277788853', '2', '奥巴马', '17600204335', '陕AN34', '1', '2017-8-2 14:18', '定位中，请稍后...', '0', '龙龙皇家4S', '0.00', '1501654727', '0'), ('199', 'A802610259381191', '2', '奥巴马', '13161672102', '陕AN347', '1', '2017-8-2 16:3', '兴业银行(环球中心支行)', '0', '龙龙皇家4S', '0.00', '1501661026', '0'), ('200', 'A802665266877499', '4', '奥巴马', '17600204335', '陕AN34', '1', '2017-8-3 13:22', '环球中心-S1', '1', '小强皇家4S', '0.00', '1501666526', '0'), ('201', 'A802668002723927', '1', '奥巴马', '17600204335', '陕AN34', '1', '2017-8-2 17:48', '环球中心-S1', '1', 'asd', '0.00', '1501666800', '0'), ('202', 'A802781612082091', '2', '奥巴马', '13161672102', '陕AN347', '1', '2017-8-2 20:49', '兴业银行(环球中心支行)', '0', '', '0.00', '1501678161', '0'), ('203', 'A803244154572928', '1', '奥巴马', '13161672102', '陕AN347', '1', '2017-8-3 9:40', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501724415', '0'), ('204', 'A803708317661588', '4', '奥巴马', '17600204335', '陕AN348', '1', '2017-8-3 22:33', '定位中，请稍后...', '0', '123123', '0.00', '1501770831', '0'), ('205', 'A804105828887342', '4', '奥巴马', '17600204335', '陕AN348', '1', '2017-8-4 9:36', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501810582', '0'), ('206', 'A804126540912042', '2', '奥巴马', '13161672102', '陕AN347', '1', '2017-8-4 10:10', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501812654', '0'), ('207', 'A804299779040694', '4', '胡江', '13198580936', '浙F956NS', '1', '2017-8-4 15:7', '金杯汽车销售', '0', '123123', '0.00', '1501829977', '0'), ('208', 'A804305287765766', '2', '胡江', '13198580936', '浙F956N5', '1', '2017-8-4 15:16', '环球中心-S1', '1', '老大的1S', '0.00', '1501830528', '0'), ('209', 'A804305856018271', '2', '胡江', '13198580936', '浙F956NS', '1', '2017-8-4 15:19', '环球中心-S1', '1', '老大的1S', '0.00', '1501830585', '0'), ('210', 'A804306082291112', '2', '胡江', '13198580936', '浙F956NS', '1', '2017-8-4 15:20', '环球中心-S1', '1', '龙龙皇家4S', '0.00', '1501830608', '0'), ('211', 'A804309186808755', '2', '胡江', '13198580936', '浙F956NS', '0', '2017-8-4 15:24', '环球中心-S1', '1', 'asd', '3808.00', '1501830918', '0'), ('212', 'A804310108941554', '2', '胡江', '13198580936', '皖A955D6', '0', '2017-8-4 15:26', '环球中心-S1', '0', '123123', '0.00', '1501831010', '0'), ('213', 'A804310290091816', '2', '胡江', '13198580936', '浙F956NS', '1', '2017-8-4 15:27', '环球中心-S1', '0', '123123', '0.00', '1501831029', '0'), ('214', 'A804311024143820', '1', '胡江33', '13198580936', '浙F956NS', '1', '2017-8-4 15:28', '环球中心-S1', '0', '123123', '0.00', '1501831102', '0'), ('215', 'A804391181198547', '1', '胡江', '13198580936', '浙F956NS', '1', '2017-8-4 17:41', '环球中心-S1', '0', '123123', '0.00', '1501839118', '0'), ('216', 'A804470181747108', '4', '胡江', '13198580936', '皖A955D6', '1', '2017-8-4 19:43', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501847018', '0'), ('217', '', '1', '奥巴马', '13161672102', '201', '1', '2017-08-04', '啦啦啦', '0', '1', '100.00', '1501851695', '1501851695'), ('219', 'A804527890848334', '1', '奥巴马', '13161672102', '陕AN347', '1', '2017-08-04', '123123', '0', 'asd', '123.00', '1501852789', '1501852789'), ('220', 'A805975191921306', '1', '看看', '13132151558', '陕AN999', '1', '2017-8-5 9:44', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501897519', '0'), ('223', 'A805982127768082', '1', '58', '13132151558', '陕AN999', '1', '2017-8-5 9:56', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501898212', '0'), ('224', 'A805222481945516', '2', '次哒', '13161672105', '陕AN34', '1', '2017-8-5 16:37', '兴业银行(环球中心支行)', '1', 'asd', '0.00', '1501922248', '0'), ('225', 'A805223018536272', '1', '次哒', '13161672105', '陕AN34', '1', '2017-8-5 16:38', '兴业银行(环球中心支行)', '1', '老大的1S', '0.00', '1501922301', '0'), ('226', 'A805224991229048', '1', '次哒', '13161672105', '陕AN34', '1', '2017-8-5 16:41', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501922499', '0'), ('227', 'A805229694708008', '2', '次哒', '13161672105', '陕AN34', '1', '2017-8-5 16:49', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1501922969', '0'), ('228', 'A807704686181537', '1', '奥升马', '13132151558', '陕AN3455', '1', '2017-8-7 9:47', '定位中，请稍后...', '0', '123123', '0.00', '1502070468', '0'), ('229', 'A807706738728955', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 9:50', '定位中，请稍后...', '0', '', '0.00', '1502070673', '0'), ('230', 'A807708548502492', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 9:53', '定位中，请稍后...', '0', '', '0.00', '1502070854', '0'), ('231', 'A807711965167808', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 9:59', '定位中，请稍后...', '0', '123123', '0.00', '1502071196', '0'), ('232', 'A807715649798695', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:5', '环球中心-S1', '0', '123123', '0.00', '1502071565', '0'), ('233', 'A807717480493334', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:8', '环球中心-S1', '0', '', '0.00', '1502071748', '0'), ('234', 'A807724615861433', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:20', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1502072461', '0'), ('235', 'A807725769927491', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:22', '定位中，请稍后...', '0', '', '0.00', '1502072577', '0'), ('236', 'A807727252972300', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:25', '定位中，请稍后...', '0', '', '0.00', '1502072725', '0'), ('237', 'A807729604356763', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:29', '环球中心-S1', '0', '123123', '0.00', '1502072960', '0'), ('238', 'A807731964701811', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:33', '环球中心-S1', '0', '', '0.00', '1502073196', '0'), ('239', 'A807732432158580', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:33', '环球中心-S1', '0', '', '0.00', '1502073243', '0'), ('240', 'A807733074945348', '1', '次5', '13161672105', '陕AN34', '1', '2017-8-7 10:34', '环球中心-S1', '0', '', '0.00', '1502073307', '0'), ('241', 'A807733139679043', '1', '次5', '13161672105', '陕AN34', '1', '2017-8-7 10:34', '环球中心-S1', '0', '', '0.00', '1502073314', '0'), ('242', 'A807733800846826', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:35', '环球中心-S1', '0', '123123', '0.00', '1502073380', '0'), ('243', 'A807734723539577', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:37', '环球中心-S1', '0', '', '0.00', '1502073472', '0'), ('244', 'A807735349065375', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:38', '环球中心-S1', '0', '', '0.00', '1502073534', '0'), ('245', 'A807736248136856', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 10:40', '兴业银行(环球中心支行)', '0', '', '0.00', '1502073624', '0'), ('246', 'A807737022921199', '1', '次哒', '13161672105', '陕AN34', '1', '2017-8-7 10:41', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1502073702', '0'), ('247', 'A807750006503798', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 11:3', '定位中，请稍后...', '0', '123123', '0.00', '1502075000', '0'), ('248', 'A807755858388441', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 11:12', '环球中心-S1', '0', '123123', '0.00', '1502075585', '0'), ('249', 'A807857741965898', '1', '奥升马', '13132151558', '陕AN34', '1', '2017-8-7 14:1', '环球中心-S2', '0', '老大的3S', '0.00', '1502085774', '0'), ('250', 'A807891021289372', '2', '呵呵大', '13198580938', '蒙E76258', '1', '2017-8-16 6:0', '环球中心-W3区', '0', '123123', '0.00', '1502089102', '0'), ('251', 'A807897345461060', '1', '呵呵大', '13198580938', '蒙E76258', '1', '2017-8-7 15:17', '环球中心-S1', '1', 'asd', '0.00', '1502089734', '0'), ('252', 'A807900146001205', '2', '呵呵大', '13198580938', '蒙E76258', '1', '2017-8-7 15:21', '裕民村', '1', '龙哥的4S店', null, '1502090014', '0'), ('253', 'A807963063829913', '2', '亚伯拉罕', '13548210931', '陕AN34', '1', '2017-8-7 16:58', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502096306', '0'), ('254', 'A808622522442341', '2', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:17', '环球中心-S1', '0', '', '0.00', '1502162252', '0'), ('255', 'A808622636068809', '2', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:17', '环球中心-S1', '0', '', '0.00', '1502162263', '0'), ('256', 'A808624781351571', '2', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:21', '环球中心-S1', '1', '龙哥的4S店', '0.00', '1502162478', '0'), ('257', 'A808625040896308', '2', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:21', '环球中心-S1', '1', '龙哥的4S店', '0.00', '1502162504', '0'), ('258', 'A808627068962324', '1', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:25', '兴业银行(环球中心支行)', '0', '龙哥的4S店', '0.00', '1502162706', '0'), ('259', 'A808630574122844', '1', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:30', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502163057', '0'), ('260', 'A808630921092682', '4', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:31', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502163092', '0'), ('261', 'A808631136535015', '4', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:31', '兴业银行(环球中心支行)', '0', '龙哥的4S店', '0.00', '1502163113', '0'), ('262', 'A808631596521356', '2', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:32', '定位中，请稍后...', '1', '龙哥的4S店', '0.00', '1502163159', '0'), ('263', 'A808632448850081', '2', '奥升马', '13132151558', '陕AN34225', '1', '2017-8-8 11:32', '环球中心-S2', '0', '龙哥的4S店', '4653121.00', '1502163244', '0'), ('264', 'A808733584984784', '2', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:14', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502173358', '0'), ('265', 'A808736775507207', '1', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:27', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1502173677', '0'), ('266', 'A808737301947386', '2', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:28', '兴业银行(环球中心支行)', '0', '龙龙皇家4S', '0.00', '1502173730', '0'), ('267', 'A808738093292515', '1', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:30', '兴业银行(环球中心支行)', '0', '123123', '0.00', '1502173809', '0'), ('268', 'A808740192202654', '5', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:32', '兴业银行(环球中心支行)', '0', '', '0.00', '1502174019', '0'), ('269', 'A808741326527573', '2', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:35', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502174132', '0'), ('270', 'A808742196957281', '2', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:36', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502174219', '0'), ('271', 'A808742206637802', '2', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:36', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502174220', '0'), ('272', 'A808748565871555', '4', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 14:47', '兴业银行(环球中心支行)', '1', '龙哥的4S店', '0.00', '1502174856', '0'), ('273', 'A808757741216388', '2', '昂恪', '13308025470', '陕AN34', '1', '2017-8-8 15:2', '成都华氏陶瓷艺术博物馆', '1', '龙哥的4S店', '0.00', '1502175774', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8 COMMENT='订单详情表';

-- ----------------------------
--  Records of `cdc_order_detail`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_order_detail` VALUES ('160', '194', '196', '3', '3', '待接单', '1501642092', '0'), ('161', '195', '196', '3', '2', '待接单', '1501642258', '0'), ('162', '196', '196', '3', '3', '待接单', '1501642961', '0'), ('163', '197', '196', '3', '3', '待接单', '1501643293', '0'), ('164', '198', '196', '3', '3', '待接单', '1501654727', '0'), ('165', '199', '197', '2', '3', '已取消', '1501661026', '0'), ('166', '200', '196', '3', '4', '待接单', '1501666526', '0'), ('167', '201', '196', '3', '1', '已取消', '1501666800', '0'), ('168', '202', '197', '2', '33', '已取消', '1501678161', '0'), ('169', '203', '197', '2', '33', '已取消', '1501724415', '0'), ('170', '204', '196', '3', '33', '待接单', '1501770831', '0'), ('171', '205', '196', '3', '33', '待接单', '1501810583', '0'), ('172', '206', '197', '2', '33', '已取消', '1501812654', '0'), ('173', '207', '205', '13', '33', '待接单', '1501829978', '0'), ('174', '208', '204', '13', '2', '待接单', '1501830528', '0'), ('175', '209', '205', '13', '2', '待接单', '1501830585', '0'), ('176', '210', '205', '13', '3', '待接单', '1501830608', '0'), ('177', '211', '205', '13', '1', '待交车', '1501830918', '0'), ('178', '212', '206', '13', '33', '已取消', '1501831011', '0'), ('179', '213', '205', '13', '33', '待接单', '1501831029', '0'), ('180', '214', '205', '13', '33', '已取消', '1501831102', '0'), ('181', '215', '205', '13', '33', '待接单', '1501839118', '0'), ('182', '216', '206', '13', '33', '待接单', '1501847018', '0'), ('183', '219', '197', '2', '1', '已取消', '0', '0'), ('184', '220', '208', '19', '33', '待接单', '1501897519', '0'), ('187', '223', '208', '19', '33', '已取消', '1501898212', '0'), ('188', '224', '211', '18', '1', '已完成', '1501922248', '0'), ('189', '225', '211', '18', '2', '待接单', '1501922301', '0'), ('190', '226', '211', '18', '33', '待接单', '1501922499', '0'), ('191', '227', '211', '18', '33', '待接单', '1501922969', '0'), ('192', '228', '213', '19', '33', '待接单', '1502070468', '0'), ('193', '229', '226', '19', null, '已取消', '1502070674', '0'), ('194', '230', '226', '19', null, '待接单', '1502070854', '0'), ('195', '231', '226', '19', '33', '待接单', '1502071196', '0'), ('196', '232', '226', '19', '33', '待接单', '1502071565', '0'), ('197', '233', '226', '19', null, '已取消', '1502071748', '0'), ('198', '234', '226', '19', '33', '待接单', '1502072461', '0'), ('199', '235', '226', '19', null, '已取消', '1502072577', '0'), ('200', '236', '226', '19', null, '待接单', '1502072725', '0'), ('201', '237', '226', '19', '33', '待接单', '1502072960', '0'), ('202', '238', '226', '19', null, '待接单', '1502073196', '0'), ('203', '239', '226', '19', null, '待接单', '1502073243', '0'), ('204', '240', '211', '18', null, '已取消', '1502073307', '0'), ('205', '241', '211', '18', null, '待接单', '1502073314', '0'), ('206', '242', '226', '19', '33', '待接单', '1502073380', '0'), ('207', '243', '226', '19', null, '待接单', '1502073472', '0'), ('208', '244', '226', '19', null, '待接单', '1502073535', '0'), ('209', '245', '226', '19', null, '待接单', '1502073624', '0'), ('210', '246', '211', '18', '33', '待接单', '1502073702', '0'), ('211', '247', '226', '19', '33', '待接单', '1502075000', '0'), ('212', '248', '226', '19', '33', '待接单', '1502075585', '0'), ('213', '249', '226', '19', '6', '待接单', '1502085774', '0'), ('214', '250', '227', '20', '33', '待接单', '1502089102', '0'), ('215', '251', '227', '20', '1', '已完成', '1502089734', '0'), ('216', '252', '227', '20', '1', '已完成', '1502090014', '0'), ('217', '253', '228', '16', '1', '接车中', '1502096306', '0'), ('218', '254', '226', '19', null, '待接单', '1502162252', '0'), ('219', '255', '226', '19', null, '待接单', '1502162263', '0'), ('220', '256', '226', '19', '1', '待接单', '1502162478', '0'), ('221', '257', '226', '19', '1', '待接单', '1502162504', '0'), ('222', '258', '226', '19', '1', '待接单', '1502162707', '0'), ('223', '259', '226', '19', '1', '待接单', '1502163057', '0'), ('224', '260', '226', '19', '1', '待接单', '1502163092', '0'), ('225', '261', '226', '19', '1', '待接单', '1502163113', '0'), ('226', '262', '226', '19', '1', '已取消', '1502163159', '0'), ('227', '263', '226', '19', '1', '已完成', '1502163245', '0'), ('228', '264', '230', '21', '1', '已取消', '1502173358', '0'), ('229', '265', '230', '21', '33', '待接单', '1502173677', '0'), ('230', '266', '230', '21', '3', '待接单', '1502173730', '0'), ('231', '267', '230', '21', '33', '已取消', '1502173809', '0'), ('232', '268', '230', '21', null, '待接单', '1502174019', '0'), ('233', '269', '230', '21', '1', '已取消', '1502174132', '0'), ('234', '270', '230', '21', '1', '已接单', '1502174219', '0'), ('235', '271', '230', '21', '1', '已完成', '1502174220', '0'), ('236', '272', '230', '21', '1', '返修中', '1502174856', '0'), ('237', '273', '230', '21', '1', '已取消', '1502175774', '0');
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
  `pid` int(11) DEFAULT '1' COMMENT '平台业务员id',
  `state` tinyint(2) DEFAULT '1' COMMENT '是否营业 1营业 0不营业',
  `principal_phone` varchar(256) DEFAULT NULL COMMENT '负责人电话',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cdc_service`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service` VALUES ('1', '龙哥的4S店', '小强', '10086', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都市武侯区环球中心', '38', '106', '3', '1', '0', '0', '1500710364', '1500710364', null, '1', '0', '12312312'), ('3', '龙龙皇家4S', '小强', '10086', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都市武侯区环球中心', '38', '104', '3', '1', '0', '0', '1500710364', '1500710364', null, '1', '1', null), ('4', '小强皇家4S', '小强', '10086', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都市武侯区环球中心', '38', '103', '3', '1', '0', '0', '1500710364', '1500710364', null, '1', '1', null), ('5', '老大的4S', '龙龙', '10010', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都啊啊啊', '38', '102', '4', '1', '0', '0', '1500710364', '1500710364', null, '1', '1', null), ('6', '老大的3S', '龙龙', '10010', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都啊啊啊', '38', '100', '5', '1', '0', '0', '1500710364', '1500710364', null, '1', '1', null), ('7', '老大的2S', '小强', '10086', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都市武侯区环球中心', '38', '101', '5', '1', '0', '0', '1500710364', '1500710364', null, '1', '1', null), ('2', '老大的1S', '龙龙', '10010', '<p><span style=\\\"font-size: 16px;\\\">Super Safari 幼儿英语课程（简称SS课程）是由剑桥大学出版社经验丰富的英语教育专家Herbert Puchta等编写，是专为3-6岁母语为非英语国家的学龄前儿童量身定做的英语课程。Super Safari采用“Whole Child”的全人教育理念，以触动幼儿大脑神经的精彩故事、动作歌曲和大量欢乐活动为媒体，引领幼儿进入五彩斑斓的英语世界。同时通过认知思维培养（Thinking skills）、运动感知能力训练（Motor-sensory skills）和社会价值熏陶（Social values），为幼儿日后更好的融入学校生活奠定坚实的基础。</span><span style=\\\"font-size: 14px;\\\"><br/><br/></span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038906700099.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/><span style=\\\"color: rgb(63, 63, 63);\\\"></span></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038912700000.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari 设计了四个活泼生动、色彩鲜明的卡通形象贯穿整个课程，通过这四个卡通形象的日常故事引领幼儿进入学习的新天地。朗朗上口的歌谣、歌曲让幼儿在轻松愉快的节奏中培养听说能力。Super Safari 还根据幼儿的心理生理特点设计了大量的游戏活动，让幼儿在游戏中体会英语学习的乐趣。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389196000413.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389214000415.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">学前幼儿要在富有刺激和变化的环境中锻炼全方位的能力。Super Safari能够发展幼儿以下方面的多元智能：</span></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">发展语言智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari课程中的游戏、歌曲、故事、小活动都有明确的语言目标以发展幼儿的语言智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038924100065.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">体觉和空间智能：</span></p><p><span style=\\\"font-size: 16px;\\\">SuperSafari根据幼儿精力旺盛和喜欢运动的特点，设计出大量的TPR游戏，旨在发展幼儿的体觉和空间智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389257000511.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"font-size: 16px;\\\"><span style=\\\"color: rgb(255, 0, 0);\\\">音乐智能：</span><br/>Super Safari课程中设计的朗朗上口的歌谣和歌曲旨在发展幼儿音乐智能。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038932500060.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">数理逻辑智能：<br/></span></p><p><span style=\\\"font-size: 16px;\\\">练习册中的练习（如涂色、连线、找不同、听题目找出正确答案等）旨在强化幼儿的数理逻辑智能，结合幼儿好奇心强的特点通过英语学习开发他们的思维能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038934000067.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><span style=\\\"color: rgb(255, 0, 0); font-size: 16px;\\\">人际交往智能：</span></p><p><span style=\\\"font-size: 16px;\\\">每个单元的故事旨在培养幼儿的人际交往智能-让幼儿学会如何与他人沟通、合作，这也是幼儿未来发展最重要的能力。</span></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/1470389353000910.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><br/></p><p style=\\\"text-align:center\\\"><img src=\\\"https://7.iyours.com.cn/147038936500049.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p><p><br/></p><p><span style=\\\"font-size: 16px;\\\">Super Safari每个单元都包含跨学科教学的内容，跨学科教学旨在整合与课程主题相关的其他领域知识，引导幼儿用英语扩展思维。</span></p><p style=\\\"text-align: center;\\\"><img src=\\\"https://7.iyours.com.cn/1470470539000815.png\\\" title=\\\"undefined\\\" alt=\\\"undefined\\\"/></p>', '成都啊啊啊', '38', '105', '4', '1', '0', '0', '1500710364', '1500710364', null, '1', '1', null), ('33', '123123', '123', '13812345789', '123123', '成都市双流县成都双流国际机场', '30.573554', '103.961044', '1', '1', '8', '23', '1501676524', '1501676524', null, '1', '1', null), ('34', 'asd123', '曾小凡', '123123123', '<p> zasd asda </p>', '成都市青羊区蓝光coco金沙', '30.689142', '103.991933', '1', '1', '9', '18', '1502109304', '1502109304', null, '1', '1', null);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='服务商图';

-- ----------------------------
--  Records of `cdc_service_img`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_service_img` VALUES ('1', '1', '大大', '111', '11', '1', '1', '/upload/service/150215643759891695011a95.50523999.jpg'), ('2', '2', '小小', '222', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('3', '3', '小小', '222', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('4', '4', '小小', '222', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('5', '5', '小小', '222', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('6', '6', '小小', '222', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('7', '7', '小小', '222', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('8', '33', '啊啊啊2', '22', '22', '1', '1', '/public/upload/identification_imgs/2017-07-29/2ae7bd2e911a35a8a376ef23fcd2a9cbc0fee6aa.jpeg'), ('9', '34', '150215436159890e79973f68.22169811.jpg', '/upload/service/150215436159890e79973f68.22169811.jpg', '48615', '0', '1', '/upload/service/150215436159890e79973f68.22169811.jpg'), ('10', null, '150215438759890e937f2006.04229044.jpg', '/upload/service/150215438759890e937f2006.04229044.jpg', '27974', '0', '1', '/upload/service/150215438759890e937f2006.04229044.jpg'), ('11', null, '150215565259891384a94b06.94211185.jpg', '/upload/service/150215565259891384a94b06.94211185.jpg', '27974', '0', '1', '/upload/service/150215565259891384a94b06.94211185.jpg'), ('12', null, '15021556615989138d3a5891.36765595.jpg', '/upload/service/15021556615989138d3a5891.36765595.jpg', '27974', '0', '0', '/upload/service/15021556615989138d3a5891.36765595.jpg'), ('13', null, '1502155689598913a9e1bdc2.97460473.jpg', '/upload/service/1502155689598913a9e1bdc2.97460473.jpg', '27974', '0', '1', '/upload/service/1502155689598913a9e1bdc2.97460473.jpg'), ('14', null, '1502155714598913c2292e04.42294025.jpg', '/upload/service/1502155714598913c2292e04.42294025.jpg', '27974', '0', '1', '/upload/service/1502155714598913c2292e04.42294025.jpg'), ('15', null, '15021559225989149277d3b5.69606967.jpg', '/upload/service/15021559225989149277d3b5.69606967.jpg', '27974', '0', '1', '/upload/service/15021559225989149277d3b5.69606967.jpg'), ('16', null, '1502155969598914c17c5f28.73288818.jpg', '/upload/service/1502155969598914c17c5f28.73288818.jpg', '27974', '0', '1', '/upload/service/1502155969598914c17c5f28.73288818.jpg'), ('17', null, '150215616859891588009560.40148690.jpg', '/upload/service/150215616859891588009560.40148690.jpg', '27974', '0', '1', '/upload/service/150215616859891588009560.40148690.jpg'), ('18', null, '15021564215989168585ad77.43118493.jpg', '/upload/service/15021564215989168585ad77.43118493.jpg', '27974', '0', '1', '/upload/service/15021564215989168585ad77.43118493.jpg'), ('19', null, '150215643759891695011a95.50523999.jpg', '/upload/service/150215643759891695011a95.50523999.jpg', '27974', '0', '1', '/upload/service/150215643759891695011a95.50523999.jpg'), ('20', null, '15021566325989175888c505.52370061.jpg', '/upload/service/15021566325989175888c505.52370061.jpg', '27974', '0', '1', '/upload/service/15021566325989175888c505.52370061.jpg'), ('21', null, '150215690059891864e98b72.32890748.jpg', '/upload/service/150215690059891864e98b72.32890748.jpg', '27974', '0', '1', '/upload/service/150215690059891864e98b72.32890748.jpg'), ('22', null, '15021572055989199548ba58.23210507.jpg', '/upload/service/15021572055989199548ba58.23210507.jpg', '27974', '0', '1', '/upload/service/15021572055989199548ba58.23210507.jpg'), ('23', null, '150215748659891aae845f57.46134639.jpg', '/upload/service/150215748659891aae845f57.46134639.jpg', '27974', '0', '1', '/upload/service/150215748659891aae845f57.46134639.jpg'), ('24', null, '150215771559891b930c1758.30758006.jpg', '/upload/service/150215771559891b930c1758.30758006.jpg', '27974', '0', '1', '/upload/service/150215771559891b930c1758.30758006.jpg');
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
INSERT INTO `cdc_setting` VALUES ('1', 'delivery_address', '地址|收件人姓名|联系电话', '审车收货地址', '0', '基础设置'), ('2', 'ali_sms_access_key_id', 'LTAICofjcYL5YHma', '阿里大于accessKeyId', '0', '短信设置'), ('3', 'ali_sms_access_key_secret', 'ATPhtGRC5Hvdd0zyEyKkfPgnohl5b7', '阿里大于accessKeySecret', '0', '短信设置'), ('4', 'ali_sms_template_code', 'SMS_78525146', '阿里大于短信模板Code', '0', '短信设置'), ('5', 'ali_sms_template_sign', '云乐享车', '阿里大于短信模板签名', '0', '短信设置'), ('6', 'jpush_member_appkey', '11cb6e13f6f803f31fd552ed', '极光推送客户端AppKey', '0', '客户端推送'), ('7', 'jpush_member_master_secret', '38234424c16ab032ac17332a', '极光推送客户端Master Secret', '0', '客户端推送'), ('8', 'jpush_service_appkey', '11cb6e13f6f803f31fd552ed', '极光推送服务端AppKey', '0', '服务端推送'), ('9', 'jpush_service_master_secret', '38234424c16ab032ac17332a', '极光推送服务端Master Secret', '0', '服务端推送');
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
  `system_switch` tinyint(2) DEFAULT '1' COMMENT '系统消息开关',
  `check_switch` tinyint(2) DEFAULT '1' COMMENT '审核消息开关',
  `type` tinyint(4) DEFAULT '1' COMMENT '是否操作订单 1.不操作 2.操作',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `access_token` (`access_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='服务端用户表';

-- ----------------------------
--  Records of `cdc_user`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_user` VALUES ('1', '111111', 'fghhh', '1', '13161672102', '$2y$13$ig6QCIr7fq5C1TK/9jALh.ApNvLyubzAzNbLOgSaC4nRI86DI3Cai', '1', '0', '1502177112', '192.168.2.118', null, null, '1501659455', null, '1', '1', '1'), ('2', '业务员-小鑫', '小强', '1', '13688464645', null, '1', '0', '0', null, null, null, null, '1500972549', '1', '1', '1'), ('3', '小强', '小勇', '1', '13812345678', '123456', '1', '0', '0', null, null, '1500970599', '1500970599', '1500972540', '1', '1', '1'), ('4', 'xxxx', '握草', '1', '', '$2y$13$0hUO5aZSgtgSUTF5CkH9fOTHIcJ3YFhFJa6sxI0F3rzc0EwTFW64i', null, '0', '0', null, null, '1501469645', '1501469645', null, '1', '1', '1'), ('6', 'as as ', '', null, 'asd', '$2y$13$wjscXg22feR86B90xGIhOeMoZX9iKG32AnudzEzi73m69VNCNBUWC', null, '0', '0', null, null, '1501470041', '1501470041', null, '1', '1', '1'), ('7', '1asdasd12', '123', '4', '13990909090', '$2y$13$GGtUZ9hyJwuk9f9iqM4YDu6Yt2Z4MSHc..fquxM4C6XbWXZ0.F2oy', '1', '0', '0', null, null, '1501645835', '1501645835', null, '1', '1', '1'), ('8', 'conqina', '123123', '4', '13812345678', '$2y$13$AznDujgLrEaAjzZxPcWoEuhGL5JMec/NlS06sQGtxzcfCy/JJ39f2', '0', '0', '0', null, null, '1501646296', '1501646296', null, '1', '1', '1'), ('9', 'xiaoqi', '小强', '5', '13812346581', '$2y$13$d3vzU2pAQHfA.dPv.rX0gO9FwVjoCbGhjNACAWgnbgwul3mTE1FR.', '1', '0', '0', null, null, '1501646337', '1501646337', null, '1', '1', '1'), ('10', 'zsdwe123', '123asd', '5', '13812345678', '$2y$13$W0Haqhoa5C04m/mWNVcqLuia1.He3zQ/st9jsxlhKOPs.dj.gwKi6', '1', '0', '0', null, null, '1501655098', '1501655098', null, '1', '1', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COMMENT='保单表';

-- ----------------------------
--  Records of `cdc_warranty`
-- ----------------------------
BEGIN;
INSERT INTO `cdc_warranty` VALUES ('69', '188', '2', '74', '71', '1500000000', '1700000001', '1', '1501659346', '0'), ('70', '189', '2', '75', '72', '1500000000', '1700000002', '1', '1501659357', '0'), ('71', '190', '2', '76', '73', '1500000000', '1700000003', '1', '1501659366', '0'), ('72', '191', '2', '77', '74', '1500000000', '1700000004', '1', '1501659380', '0'), ('73', '192', '2', '78', '75', '1500000000', '1700000005', '1', '1501659389', '0'), ('74', '193', '2', '79', '76', '1500000000', '1700000006', '1', '1501659399', '0'), ('75', '194', '2', '80', '77', '1500000000', '1700000007', '1', '1501659409', '0'), ('76', '195', '2', '81', '78', '1500000000', '1700000008', '1', '1501659417', '0'), ('77', '196', '2', '82', '79', '1500000000', '1500000001', '1', '1501659425', '0'), ('78', '197', '2', '83', '80', '1500000000', '1500000002', '1', '1501659434', '0'), ('79', '198', '2', '84', '81', '1500000000', '1500000003', '1', '1501659443', '0'), ('80', '199', '2', '85', '82', '1500000000', '1700000000', '1', '1501659452', '0'), ('81', '200', '2', '86', '83', '1500000000', '1500000004', '1', '1501659469', '0'), ('82', '201', '2', '87', '84', '1700000000', '1900000000', '1', '1501659484', '0'), ('83', '202', '2', '88', '85', '1500000000', '1700000000', '1', '1501659492', '0'), ('84', '203', '3', '89', '86', '1600000000', '1600000000', '1', '1501666451', '0'), ('85', '204', '3', '90', '87', '1600000000', '1600000000', '1', '1501668662', '0'), ('86', '205', '3', '91', '88', '1600000000', '1600000000', '1', '1501671954', '0'), ('87', '211', '13', '92', '89', '0', '0', '0', '1501829630', '0'), ('88', '212', '2', '93', '90', '0', '0', '0', '1501834764', '0'), ('89', '217', '2', '94', '91', '0', '0', '0', '1502095912', '0'), ('90', '218', '19', '95', '92', '0', '0', '0', '1502162554', '0'), ('91', '219', '19', '96', '93', '0', '0', '0', '1502162695', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
