/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50512
Source Host           : localhost:3306
Source Database       : dxpt

Target Server Type    : MYSQL
Target Server Version : 50512
File Encoding         : 65001

Date: 2012-10-20 15:22:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` varchar(500) NOT NULL COMMENT '登陆id',
  `name` varchar(500) DEFAULT NULL COMMENT '姓名',
  `dept` int(10) DEFAULT NULL COMMENT '所属部门',
  `pid` int(10) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `fax` varchar(500) DEFAULT NULL COMMENT '传真',
  `email` varchar(500) DEFAULT NULL COMMENT '邮箱',
  `office_phone` varchar(500) DEFAULT NULL COMMENT '办公电话',
  `tel_1` varchar(500) DEFAULT NULL COMMENT '手机',
  `tel_2` varchar(500) DEFAULT NULL COMMENT '手机',
  `sex` enum('1','0') DEFAULT NULL COMMENT '男‘0’女‘1’',
  `birth` date DEFAULT NULL COMMENT '生日',
  `passwd` varchar(500) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'lzh', '赖振薇', '1', '0', '0', '', '', '82190015', '13503665968', '', '1', '1992-03-12', '202cb962ac59075b964b07152d234b70');
INSERT INTO `admin` VALUES ('2', 'wxq', '王学全', '2', '1', '0-1', null, null, '82190011', '13945013191', null, null, null, '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `admin` VALUES ('3', 'zll', '赵璐璐', '3', '1', '0-1', null, null, '82190340', '13936541395', null, null, null, '');
INSERT INTO `admin` VALUES ('4', 'wjt', '王佳彤', '4', '1', '0-1', null, null, '82190326', '13946013595', null, null, null, '');
INSERT INTO `admin` VALUES ('5', 'qfy', '曲发义', '5', '1', '0-1', null, null, '82192180', '18946077299', null, null, null, '');
INSERT INTO `admin` VALUES ('6', 'lw', '梁伟', '6', '1', '0-1', null, null, '82190787', '13654659688', null, null, null, '');
INSERT INTO `admin` VALUES ('7', 'wb', '王冰', '7', '1', '0-1', null, '', '82190712', '13504842577', '', null, null, '');
INSERT INTO `admin` VALUES ('8', 'zl', '钟蕾', '8', '1', '0-1', null, null, '82190321', '13100969445', null, null, null, '');
INSERT INTO `admin` VALUES ('9', 'qhh', '权赫花', '9', '1', '0-1', null, null, '82190732', '13313691663', null, null, null, '');
INSERT INTO `admin` VALUES ('10', 'mn', '孟楠', '10', '1', '0-1', null, null, '82191935', '15804618899', null, null, null, '');
INSERT INTO `admin` VALUES ('11', 'sfn', '宋福南', '11', '1', '0-1', null, null, '82192136', '13845066901', null, null, null, '');
INSERT INTO `admin` VALUES ('12', 'wzg', '魏志刚', '12', '1', '0-1', null, null, '82191931', '13503619328', null, null, null, '');
INSERT INTO `admin` VALUES ('13', 'zcq', '朱成秋', '13', '1', '0-1', null, null, '82191772', '13836039464', null, null, null, '');
INSERT INTO `admin` VALUES ('14', 'zql', '曾庆良', '14', '1', '0-1', null, null, '82190340', '13100969629', null, null, null, '');
INSERT INTO `admin` VALUES ('15', 'lm', '雷鸣', '15', '1', '0-1', null, null, '82192082', '13796126868', null, null, null, '');
INSERT INTO `admin` VALUES ('16', 'nsy', '倪松远', '16', '1', '0-1', null, null, '82190335', '13836032835', null, null, null, '');
INSERT INTO `admin` VALUES ('17', 'mr', '马锐', '17', '1', '0-1', null, null, '82192105', '13904615409', null, null, null, '');
INSERT INTO `admin` VALUES ('18', 'rdt', '任丹婷', '18', '1', '0-1', null, null, '82192314', '13936248316', null, null, null, '');
INSERT INTO `admin` VALUES ('19', 'ljq', '刘俊奎', '19', '1', '0-1', null, null, '82190496', '13703619101', null, null, null, '');
INSERT INTO `admin` VALUES ('20', 'yl', '姚蕾', '20', '1', '0-1', null, null, '82190483', '15945680428', null, null, null, '');
INSERT INTO `admin` VALUES ('21', 'ljf', '刘劲风', '21', '1', '0-1', null, null, '82190719', '18686802367', null, null, null, '');
INSERT INTO `admin` VALUES ('22', 'jxy', '计晓艳', '22', '1', '0-1', null, null, '82190337', '13936292917', null, null, null, '');
INSERT INTO `admin` VALUES ('23', 'qsy', '曲绍义', '23', '1', '0-1', null, null, '82190771', '13936135028', null, null, null, '');
INSERT INTO `admin` VALUES ('24', 'cl', '崔玲', '24', '1', '0-1', null, null, '82190170', '13946007200', null, null, null, '');
INSERT INTO `admin` VALUES ('25', 'zw', '张维', '25', '1', '0-1', null, null, '82192589', '13936232388', null, null, null, '');
INSERT INTO `admin` VALUES ('26', 'qkl', '秦凯伦', '26', '1', '0-1', null, null, '82190079', '13654516471', null, null, null, '');
INSERT INTO `admin` VALUES ('27', 'syy', '宋育英', '27', '1', '0-1', null, null, '82192015', '13946092591', null, null, null, '');
INSERT INTO `admin` VALUES ('28', 'xhy', '薛红岩', '28', '1', '0-1', null, null, '82190778', '13796823056', null, null, null, '');
INSERT INTO `admin` VALUES ('29', 'mwl', '马文立', '29', '1', '0-1', null, null, '82190381', '15046687136', null, null, null, '');
INSERT INTO `admin` VALUES ('30', 'ycb', '姚成滨', '30', '1', '0-1', null, null, '82190384', '13304817191', null, null, null, '');
INSERT INTO `admin` VALUES ('31', 'wl', '王璐', '31', '1', '0-1', null, null, '82190387', '18686785966', null, null, null, '');
INSERT INTO `admin` VALUES ('32', 'jy', '王基勇', '32', '1', '0-1', null, null, '82190394', '13845073568', null, null, null, '');
INSERT INTO `admin` VALUES ('33', 'hjw', '胡建伟', '33', '1', '0-1', null, null, '82190391', '15945186727', null, null, null, '');
INSERT INTO `admin` VALUES ('34', 'mgm', '苗国民', '34', '1', '0-1', null, null, '82190397', '15804635569', null, null, null, '');
INSERT INTO `admin` VALUES ('35', 'zw', '张伟', '35', '1', '0-1', null, null, '82191790', '15945183378', null, null, null, '');
INSERT INTO `admin` VALUES ('36', 'lh', '栗辉', '36', '1', '0-1', null, null, '82191548', '13766830589', null, null, null, '');
INSERT INTO `admin` VALUES ('37', 'ldc', '刘德臣', '37', '1', '0-1', null, null, '82190402', '13903659791', null, null, null, '');
INSERT INTO `admin` VALUES ('38', 'ylp', '杨丽萍', '38', '1', '0-1', null, null, '82191836', '15804639932', null, null, null, '');
INSERT INTO `admin` VALUES ('39', 'sly', '沈丽艳', '39', '1', '0-1', null, null, '82190421', '18645068056', null, null, null, '');
INSERT INTO `admin` VALUES ('40', 'lx', '', '40', '1', '0-1', null, null, '82190405', null, null, null, null, '');
INSERT INTO `admin` VALUES ('41', 'xj', '夏军', '41', '1', '0-1', null, null, '82190411', '15104536538', null, null, null, '');
INSERT INTO `admin` VALUES ('42', 'kjy', '康聚勇', '42', '1', '0-1', null, null, '82190408', '13804511066', null, null, null, '');
INSERT INTO `admin` VALUES ('43', 'yjq', '袁俊奇', '43', '1', '0-1', null, null, '82190379', '13946055491', null, null, null, '');
INSERT INTO `admin` VALUES ('44', 'cf', '崔峰', '44', '1', '0-1', null, null, '82192732', '18845157705', null, null, null, '');
INSERT INTO `admin` VALUES ('45', 'wdw', '王冬文', '45', '1', '0-1', null, null, '82191915', '18646579385', null, null, null, '');
INSERT INTO `admin` VALUES ('46', 'fyj', '付玉杰', '46', '1', '0-1', null, null, '82190535', '13069898855', null, null, null, '');
INSERT INTO `admin` VALUES ('47', 'yxf', '阎秀峰', '47', '1', '0-1', null, null, '82190052', '13836162511', null, null, null, '');
INSERT INTO `admin` VALUES ('48', 'slt', '孙良庭', '48', '1', '0-1', null, null, '82190723', '13796626731', null, null, null, '');
INSERT INTO `admin` VALUES ('49', 'zy', '赵茵', '49', '1', '0-1', null, null, '82190333', null, null, null, null, '');
INSERT INTO `admin` VALUES ('50', 'wyb', '王玉波', '50', '1', '0-1', null, null, '82190416', '13845066274', null, null, null, '');
INSERT INTO `admin` VALUES ('51', 'xb', '徐冰', '51', '1', '0-1', null, null, '82191360', '15045028555', null, null, null, '');
INSERT INTO `admin` VALUES ('52', 'chj', '曹海军', '52', '1', '0-1', null, null, '82192898', '15846589385', null, null, null, '');
INSERT INTO `admin` VALUES ('53', 'wxj', '王先军', '53', '1', '0-1', null, null, '82190883', '13936560893', null, null, null, '');
INSERT INTO `admin` VALUES ('54', 'wxy', '魏兴有', '54', '1', '0-1', null, null, '82191320', '13603652685', null, null, null, '');
INSERT INTO `admin` VALUES ('55', 'sh', '邵华', '55', '1', '0-1', null, null, '82190247', '13936134868', null, null, null, '');
INSERT INTO `admin` VALUES ('56', 'ld', '李丹', '56', '1', '0-1', null, null, '82113295', '13945165878', null, null, null, '');
INSERT INTO `admin` VALUES ('57', 'zsf', '张淑芬', '57', '1', '0-1', null, null, '86355718', '13613602188', null, null, null, '');
INSERT INTO `admin` VALUES ('58', 'ghx', '管洪霞', '58', '1', '0-1', null, null, '82190678', '13339311868', null, null, null, '');
INSERT INTO `admin` VALUES ('59', 'zdy', '张大勇', '59', '1', '0-1', null, null, '82190429', '13603610481', null, null, null, '');
INSERT INTO `admin` VALUES ('60', 'zg', '赵刚', '60', '1', '0-1', null, null, '82190433', '13836099413', null, null, null, '');
INSERT INTO `admin` VALUES ('61', 'yl', '颜良', '61', '1', '0-1', null, null, '82191767', '13836166505', null, null, null, '');
INSERT INTO `admin` VALUES ('62', 'ylin', '杨林', '62', '1', '0-1', null, null, '82190434', '13101611033', null, null, null, '');
INSERT INTO `admin` VALUES ('63', 'lgd', '李国栋', '63', '1', '0-1', null, null, '82192111-2909', '13836006051', null, null, null, '');
INSERT INTO `admin` VALUES ('64', 'zxl', '张宪林', '64', '1', '0-1', null, null, '82191817', '15114575600', null, null, null, '');
INSERT INTO `admin` VALUES ('65', 'ljt', '李俊涛', '65', '1', '0-1', null, null, '53302434', '13936151177', null, null, null, '');
INSERT INTO `admin` VALUES ('66', 'ldj', '刘德军', '66', '1', '0-1', null, null, '0458-3439133', '13945892412', null, null, null, '');
INSERT INTO `admin` VALUES ('67', 'yty', '应天玉', '67', '1', '0-1', null, null, '82190509', '13359983832', null, null, null, '');
INSERT INTO `admin` VALUES ('74', 'hanyu', '寒燠', '1', '1', '0-1', null, '', '0450-88888888', '18745708710', '', null, null, '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- Table structure for `content`
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `theme` varchar(500) DEFAULT NULL,
  `sum` int(10) unsigned NOT NULL COMMENT '这条短信发送时算成几条',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES ('1', '', '', '0');
INSERT INTO `content` VALUES ('2', '', '', '0');
INSERT INTO `content` VALUES ('3', '', '', '0');
INSERT INTO `content` VALUES ('4', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('5', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('6', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('7', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('8', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('9', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('10', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('11', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('12', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('13', '测试一下', '测试一下', '0');
INSERT INTO `content` VALUES ('14', '', '', '4');
INSERT INTO `content` VALUES ('15', '', '测试一下', '3');
INSERT INTO `content` VALUES ('16', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('17', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('18', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('19', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('20', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('21', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('22', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('23', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试一下', '3');
INSERT INTO `content` VALUES ('26', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', '测试', '2');
INSERT INTO `content` VALUES ('27', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', 'test', '1');
INSERT INTO `content` VALUES ('28', '测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧测试一下吧【东北林业大学】', 'test', '1');
INSERT INTO `content` VALUES ('29', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江【东北林业大学】', 'test', '2');
INSERT INTO `content` VALUES ('30', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江【东北林业大学】', 'test', '2');
INSERT INTO `content` VALUES ('31', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'test31', '2');
INSERT INTO `content` VALUES ('32', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'test', '2');
INSERT INTO `content` VALUES ('33', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'test', '2');
INSERT INTO `content` VALUES ('34', 'test', 'test', '1');
INSERT INTO `content` VALUES ('35', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'test', '2');
INSERT INTO `content` VALUES ('36', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'test', '2');
INSERT INTO `content` VALUES ('37', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'test', '2');
INSERT INTO `content` VALUES ('38', 'test', 'test', '1');
INSERT INTO `content` VALUES ('39', '江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎记录江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江良炎江', 'testtest', '2');
INSERT INTO `content` VALUES ('40', 'haha', 'test888', '1');
INSERT INTO `content` VALUES ('41', 'weare', 'test999', '1');
INSERT INTO `content` VALUES ('42', '测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦测试一下啦啦啦', 'test88888', '2');
INSERT INTO `content` VALUES ('43', 'ceshi', 'haha', '1');
INSERT INTO `content` VALUES ('44', 'test1test1test1test1test1', 'test1', '1');
INSERT INTO `content` VALUES ('45', 'test2test2test2test2test2test2', 'test2', '1');
INSERT INTO `content` VALUES ('46', '测试修改1', '测试修改1', '1');
INSERT INTO `content` VALUES ('47', 'sdf', 'test', '1');
INSERT INTO `content` VALUES ('48', '祝贺你被东北林业大学录取了', '无', '1');

-- ----------------------------
-- Table structure for `dept`
-- ----------------------------
DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL COMMENT '名称',
  `header` varchar(500) DEFAULT NULL COMMENT '负责人',
  `pid` int(10) unsigned DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `office_phone` varchar(500) DEFAULT NULL COMMENT '办公电话',
  `header_tel` varchar(500) DEFAULT NULL COMMENT '负责人手机',
  `email` varchar(500) DEFAULT NULL COMMENT '办公邮箱',
  `address` varchar(500) DEFAULT NULL COMMENT '部门地址',
  `introduce` varchar(500) DEFAULT NULL COMMENT '部门简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dept
-- ----------------------------
INSERT INTO `dept` VALUES ('1', '学校办公室', '赖振薇', '0', '0', '82190015', '13503665968', null, null, null);
INSERT INTO `dept` VALUES ('2', '校友基金会', '王学全', '1', '0-1', '82190011', '13945013191', null, null, null);
INSERT INTO `dept` VALUES ('3', '组织部（组织员办公室）党校', '赵璐璐', '1', '0-1', '82190340', '13936541395', null, null, null);
INSERT INTO `dept` VALUES ('4', '宣传部', '王佳彤', '1', '0-1', '82190326', '13946013595', '', '', '');
INSERT INTO `dept` VALUES ('5', '统战部', '曲发义', '1', '0-1', '82192180', '18946077299', null, null, null);
INSERT INTO `dept` VALUES ('6', '保卫部、保卫处、派出所', '梁伟', '1', '0-1', '82190787', '13654659688', null, null, null);
INSERT INTO `dept` VALUES ('7', '学生工作部、学生处（学生资助管理中心）', '王冰', '1', '0-1', '82190712', '13504842577', null, null, null);
INSERT INTO `dept` VALUES ('8', '纪委（监察处）', '钟蕾', '1', '0-1', '82190321', '13100969445', null, null, null);
INSERT INTO `dept` VALUES ('9', '工会', '权赫花', '1', '0-1', '82190732', '13313691663', null, null, null);
INSERT INTO `dept` VALUES ('10', '团委', '孟楠', '1', '0-1', '82191935', '15804618899', null, null, null);
INSERT INTO `dept` VALUES ('11', '发展规划办公室', '宋福南', '1', '0-1', '82192136', '13845066901', null, null, null);
INSERT INTO `dept` VALUES ('12', '“2011计划”办公室', '魏志刚', '1', '0-1', '82191931', '13503619328', null, null, null);
INSERT INTO `dept` VALUES ('13', '校友工作办公室', '朱成秋', '1', '0-1', '82191772', '13836039464', null, null, null);
INSERT INTO `dept` VALUES ('14', '教务处（教学督导员办公室）', '曾庆良', '1', '0-1', '82190340', '13100969629', null, null, null);
INSERT INTO `dept` VALUES ('15', '高等教育研究所（评估中心）', '雷鸣', '1', '0-1', '82192082', '13796126868', null, null, null);
INSERT INTO `dept` VALUES ('16', '人事与专家工作处', '倪松远', '1', '0-1', '82190335', '13836032835', null, null, null);
INSERT INTO `dept` VALUES ('17', '研究生院（研究生工作部、研究生管理处）', '马锐', '1', '0-1', '82192105', '13904615409', null, null, null);
INSERT INTO `dept` VALUES ('18', '招生就业指导处（毕业生就业指导中心）', '任丹婷', '1', '0-1', '82192314', '13936248316', null, null, null);
INSERT INTO `dept` VALUES ('19', '资金筹措与财务管理处', '刘俊奎', '1', '0-1', '82190496', '13703619101', null, null, null);
INSERT INTO `dept` VALUES ('20', '审计处', '姚蕾', '1', '0-1', '82190483', '15945680428', null, null, null);
INSERT INTO `dept` VALUES ('21', '科学技术研究院', '刘劲风', '1', '0-1', '82190719', '18686802367', null, null, null);
INSERT INTO `dept` VALUES ('22', '国际合作处（港澳台办公室)、国际交流学院', '计晓艳', '1', '0-1', '82190337', '13936292917', null, null, null);
INSERT INTO `dept` VALUES ('23', '资产管理处（国有资产管理办公室）', '曲绍义', '1', '0-1', '82190771', '13936135028', null, null, null);
INSERT INTO `dept` VALUES ('24', '基建处', '崔玲', '1', '0-1', '82190170', '13946007200', null, null, null);
INSERT INTO `dept` VALUES ('25', '招标管理中心', '张维', '1', '0-1', '82192589', '13936232388', null, null, null);
INSERT INTO `dept` VALUES ('26', '实验室与设备管理处（分析测试中心）', '秦凯伦', '1', '0-1', '82190079', '13654516471', null, null, null);
INSERT INTO `dept` VALUES ('27', '网络信息中心', '宋育英', '1', '0-1', '82192015', '13946092591', null, null, null);
INSERT INTO `dept` VALUES ('28', '离退休工作处', '薛红岩', '1', '0-1', '82190778', '13796823056', null, null, null);
INSERT INTO `dept` VALUES ('29', '经济管理学院', '马文立', '1', '0-1', '82190381', '15046687136', null, null, null);
INSERT INTO `dept` VALUES ('30', '林学院', '姚成滨', '1', '0-1', '82190384', '13304817191', null, null, null);
INSERT INTO `dept` VALUES ('31', '野生动物资源学院', '王璐', '1', '0-1', '82190387', '18686785966', null, null, null);
INSERT INTO `dept` VALUES ('32', '材料科学与工程学院', '王基勇', '1', '0-1', '82190394', '13845073568', null, null, null);
INSERT INTO `dept` VALUES ('33', '工程技术学院', '胡建伟', '1', '0-1', '82190391', '15945186727', null, null, null);
INSERT INTO `dept` VALUES ('34', '机电工程学院', '苗国民', '1', '0-1', '82190397', '15804635569', null, null, null);
INSERT INTO `dept` VALUES ('35', '生命科学学院', '张伟', '1', '0-1', '82191790', '15945183378', null, null, null);
INSERT INTO `dept` VALUES ('36', '园林学院', '栗辉', '1', '0-1', '82191548', '13766830589', null, null, null);
INSERT INTO `dept` VALUES ('37', '土木工程学院', '刘德臣', '1', '0-1', '82190402', '13903659791', null, null, null);
INSERT INTO `dept` VALUES ('38', '交通学院', '杨丽萍', '1', '0-1', '82191836', '15804639932', null, null, null);
INSERT INTO `dept` VALUES ('39', '信息与计算机工程学院', '沈丽艳', '1', '0-1', '82190421', '18645068056', null, null, null);
INSERT INTO `dept` VALUES ('40', '理学院', '', '1', '0-1', '82190405', null, null, null, null);
INSERT INTO `dept` VALUES ('41', '文法学院', '夏军', '1', '0-1', '82190411', '15104536538', null, null, null);
INSERT INTO `dept` VALUES ('42', '外国语学院', '康聚勇', '1', '0-1', '82190408', '13804511066', null, null, null);
INSERT INTO `dept` VALUES ('43', '成人教育学院', '袁俊奇', '1', '0-1', '82190379', '13946055491', null, null, null);
INSERT INTO `dept` VALUES ('44', '马克思主义教学研究部', '崔峰', '1', '0-1', '82192732', '18845157705', null, null, null);
INSERT INTO `dept` VALUES ('45', '体育部', '王冬文', '1', '0-1', '82191915', '18646579385', null, null, null);
INSERT INTO `dept` VALUES ('46', '森林植物生态学教育部重点实验室', '付玉杰', '1', '0-1', '82190535', '13069898855', null, null, null);
INSERT INTO `dept` VALUES ('47', '盐碱地生物资源环境研究中心、东北油田盐碱植被恢复与重建教育部重点实验室', '阎秀峰', '1', '0-1', '82190052', '13836162511', null, null, null);
INSERT INTO `dept` VALUES ('48', '后勤服务总公司', '孙良庭', '1', '0-1', '82190723', '13796626731', null, null, null);
INSERT INTO `dept` VALUES ('49', '资产经营有限公司', '赵茵', '1', '0-1', '82190333', null, null, null, null);
INSERT INTO `dept` VALUES ('50', '图书馆', '王玉波', '1', '0-1', '82190416', '13845066274', null, null, null);
INSERT INTO `dept` VALUES ('51', '档案馆', '徐冰', '1', '0-1', '82191360', '15045028555', null, null, null);
INSERT INTO `dept` VALUES ('52', '博物馆', '曹海军', '1', '0-1', '82192898', '15846589385', null, null, null);
INSERT INTO `dept` VALUES ('53', '体育馆管理中心', '王先军', '1', '0-1', '82190883', '13936560893', null, null, null);
INSERT INTO `dept` VALUES ('54', '森林防火办公室', '魏兴有', '1', '0-1', '82191320', '13603652685', null, null, null);
INSERT INTO `dept` VALUES ('55', '医院', '邵华', '1', '0-1', '82190247', '13936134868', null, null, null);
INSERT INTO `dept` VALUES ('56', '出版社有限责任公司', '李丹', '1', '0-1', '82113295', '13945165878', null, null, null);
INSERT INTO `dept` VALUES ('57', '工科教学实习中心', '张淑芬', '1', '0-1', '86355718', '13613602188', null, null, null);
INSERT INTO `dept` VALUES ('58', '汽车测试中心', '管洪霞', '1', '0-1', '82190678', '13339311868', null, null, null);
INSERT INTO `dept` VALUES ('59', '工程咨询设计研究院', '张大勇', '1', '0-1', '82190429', '13603610481', null, null, null);
INSERT INTO `dept` VALUES ('60', '建筑工程公司', '赵刚', '1', '0-1', '82190433', '13836099413', null, null, null);
INSERT INTO `dept` VALUES ('61', '木工机械质量监督检验中心', '颜良', '1', '0-1', '82191767', '13836166505', null, null, null);
INSERT INTO `dept` VALUES ('62', '服务公司', '杨林', '1', '0-1', '82190434', '13101611033', null, null, null);
INSERT INTO `dept` VALUES ('63', '专家公寓', '李国栋', '1', '0-1', '82192111-2909', '13836006051', null, null, null);
INSERT INTO `dept` VALUES ('64', '科技园区建设委员会办公室', '张宪林', '1', '0-1', '82191817', '15114575600', null, null, null);
INSERT INTO `dept` VALUES ('65', '帽儿山实验林场', '李俊涛', '1', '0-1', '53302434', '13936151177', null, null, null);
INSERT INTO `dept` VALUES ('66', '凉水实验林场', '刘德军', '1', '0-1', '0458-3439133', '13945892412', null, null, null);
INSERT INTO `dept` VALUES ('67', '黑龙江省帽儿山森林生态系统国家野外科学观测研究站（生态研究中心）', '应天玉', '1', '0-1', '82190509', '13359983832', null, null, null);

-- ----------------------------
-- Table structure for `frd_group`
-- ----------------------------
DROP TABLE IF EXISTS `frd_group`;
CREATE TABLE `frd_group` (
  `id` int(11) NOT NULL,
  `owner` varchar(500) CHARACTER SET utf8 NOT NULL,
  `group_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `note` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of frd_group
-- ----------------------------

-- ----------------------------
-- Table structure for `friend`
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',
  `name` varchar(500) NOT NULL COMMENT '名字',
  `group` varchar(100) DEFAULT NULL,
  `owner` int(10) unsigned DEFAULT NULL COMMENT '好友持有者',
  `birthd` int(11) unsigned DEFAULT NULL COMMENT '生日',
  `sex` enum('1','0') DEFAULT NULL COMMENT '男 ‘0’女‘1’',
  `tel_1` varchar(500) DEFAULT NULL COMMENT '手机号码',
  `tel_2` varchar(500) DEFAULT NULL COMMENT '手机号码',
  `off_pho` varchar(500) DEFAULT NULL COMMENT '办公电话',
  `off_pho_2` varchar(500) DEFAULT NULL COMMENT '办公电话',
  `fax` varchar(500) DEFAULT NULL COMMENT '传真',
  `email` varchar(500) DEFAULT NULL COMMENT '个人邮箱',
  `fam_pho` varchar(500) DEFAULT NULL COMMENT '家庭电话',
  `fam_address` varchar(500) DEFAULT NULL COMMENT '家庭住址',
  `note` varchar(500) DEFAULT NULL COMMENT '备注',
  `depart` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('1', 'wer', '0', null, '0', '', '234324', '', '', '', '', '', '', '', '', null);
INSERT INTO `friend` VALUES ('2', 'sdf', '0', '0', '0', '', '213', '', '', '', '', '', '', '', '', null);
INSERT INTO `friend` VALUES ('4', '寒燠', '0', '1', '0', '1', '18745708710', '', '', '', '', '', '', '', ' ', '');
INSERT INTO `friend` VALUES ('5', 'dfg', '0', '1', '0', '0', '13900120022', '', '', '', '', '', '', '', ' ', '');

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '所属用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------

-- ----------------------------
-- Table structure for `login_log`
-- ----------------------------
DROP TABLE IF EXISTS `login_log`;
CREATE TABLE `login_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',
  `user` int(11) NOT NULL COMMENT '用户名',
  `log_time` int(10) unsigned NOT NULL COMMENT '登录时间',
  `log_ip` varchar(500) DEFAULT NULL COMMENT '登陆ip',
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_log
-- ----------------------------
INSERT INTO `login_log` VALUES ('1', '1', '1343990188', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('2', '1', '1343990607', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('3', '1', '1343991607', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('4', '2', '1343991607', '127.0.0.1', '0-1');
INSERT INTO `login_log` VALUES ('5', '1', '1343991630', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('6', '1', '1344421921', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('7', '1', '1344475092', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('8', '1', '1344475247', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('9', '1', '1344475384', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('10', '1', '1344475449', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('11', '1', '1344478744', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('12', '1', '1344647858', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('13', '1', '1344648335', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('14', '1', '1345885827', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('15', '1', '1346566047', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('16', '1', '1346651711', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('17', '1', '1347411632', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('18', '1', '1347873186', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('19', '1', '1348284528', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('20', '1', '1348361626', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('21', '1', '1348376694', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('22', '1', '1348387246', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('23', '1', '1348470328', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('24', '1', '1348561260', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('25', '1', '1348621509', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('26', '1', '1348645738', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('27', '1', '1349684585', '127.0.0.1', '0');
INSERT INTO `login_log` VALUES ('28', '1', '1350028577', '127.0.0.1', '0');

-- ----------------------------
-- Table structure for `msg_assign`
-- ----------------------------
DROP TABLE IF EXISTS `msg_assign`;
CREATE TABLE `msg_assign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(10) unsigned NOT NULL COMMENT '用户',
  `user_dept` int(10) unsigned DEFAULT NULL COMMENT '用户所属部门',
  `all` int(10) unsigned DEFAULT '0' COMMENT '短信总配额',
  `assign` int(10) unsigned DEFAULT '0' COMMENT '已分配数量',
  `last_add` int(10) unsigned DEFAULT '0' COMMENT '上次增加配额',
  `used` int(10) unsigned DEFAULT '0' COMMENT '已使用数量',
  `left` int(10) unsigned DEFAULT '0' COMMENT '剩余短信数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_assign
-- ----------------------------
INSERT INTO `msg_assign` VALUES ('1', '1', '1', '1000', '680', '1000', '15', '305');
INSERT INTO `msg_assign` VALUES ('2', '2', '2', '240', '100', '20', '20', '120');
INSERT INTO `msg_assign` VALUES ('3', '3', '3', '200', '100', '200', '30', '70');
INSERT INTO `msg_assign` VALUES ('4', '4', '4', '200', '100', '200', '40', '60');
INSERT INTO `msg_assign` VALUES ('9', '5', '5', '20', '0', '20', '0', '20');
INSERT INTO `msg_assign` VALUES ('10', '6', '6', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('11', '7', '7', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('12', '8', '8', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('13', '9', '9', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('14', '10', '10', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('15', '11', '11', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('16', '12', '12', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('17', '13', '13', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('18', '14', '14', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('19', '15', '15', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('20', '16', '16', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('21', '17', '17', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('22', '18', '18', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('23', '19', '19', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('24', '20', '20', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('25', '21', '21', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('26', '22', '22', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('27', '23', '23', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('28', '24', '24', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('29', '25', '25', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('30', '26', '26', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('31', '27', '27', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('32', '28', '28', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('33', '29', '29', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('34', '30', '30', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('35', '31', '31', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('36', '32', '32', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('37', '33', '33', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('38', '34', '34', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('39', '35', '35', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('40', '36', '36', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('41', '37', '37', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('42', '38', '38', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('43', '39', '39', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('44', '40', '40', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('45', '41', '41', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('46', '42', '42', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('47', '43', '43', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('48', '44', '44', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('49', '45', '45', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('50', '46', '46', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('51', '47', '47', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('52', '48', '48', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('53', '49', '49', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('54', '50', '50', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('55', '51', '51', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('56', '52', '52', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('57', '53', '53', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('58', '54', '54', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('59', '55', '55', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('60', '56', '56', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('61', '57', '57', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('62', '58', '58', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('63', '59', '59', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('64', '60', '60', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('65', '61', '61', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('66', '62', '62', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('67', '63', '63', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('68', '64', '64', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('69', '65', '65', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('70', '66', '66', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('71', '67', '67', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('261', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `msg_assign` VALUES ('262', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `msg_log`
-- ----------------------------
DROP TABLE IF EXISTS `msg_log`;
CREATE TABLE `msg_log` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id，即发送短信人id',
  `receiver` varchar(50) NOT NULL COMMENT '收信人手机号',
  `rec_name` varchar(50) DEFAULT NULL COMMENT '收信人名字',
  `cont_id` int(10) unsigned NOT NULL COMMENT '短信id',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  `path` varchar(500) NOT NULL COMMENT '用户path',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_log
-- ----------------------------
INSERT INTO `msg_log` VALUES ('0000000001', '1', '18745708710', '寒燠', '42', '1344252998', '0');
INSERT INTO `msg_log` VALUES ('0000000002', '1', '15046085646', '', '48', '1350029085', '0');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `dept` int(11) NOT NULL,
  `pid` int(10) unsigned NOT NULL COMMENT '解决该问题的管理员的id',
  `content` varchar(500) DEFAULT NULL,
  `is_deal` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否解决 ‘1’解决 ‘0’没有解决',
  `type` char(1) NOT NULL COMMENT '消息类型 ‘0’忘记密码 ‘1’申请短信配额',
  `time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('5', '2', '2', '1', '申请新密码', '0', '1', '1344153165');
INSERT INTO `news` VALUES ('6', '2', '2', '1', '申请新密码', '0', '0', '1344153167');
INSERT INTO `news` VALUES ('7', '2', '2', '1', '申请新密码', '1', '0', '1344153167');
INSERT INTO `news` VALUES ('8', '2', '2', '1', '申请新密码', '1', '0', '1344153168');
INSERT INTO `news` VALUES ('9', '2', '2', '1', '申请新密码', '0', '0', '1344154368');

-- ----------------------------
-- Table structure for `receiver`
-- ----------------------------
DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiver
-- ----------------------------

-- ----------------------------
-- Table structure for `send`
-- ----------------------------
DROP TABLE IF EXISTS `send`;
CREATE TABLE `send` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(10) unsigned NOT NULL,
  `con_id` int(11) NOT NULL,
  `login_id` int(10) unsigned NOT NULL COMMENT ' ',
  `tel` varchar(20) NOT NULL COMMENT '发送手机号',
  `name` varchar(20) DEFAULT NULL COMMENT '接受者名字',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0为定时发送,1为即时发送',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0未发,1已发',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of send
-- ----------------------------
INSERT INTO `send` VALUES ('9', '1344221362', '13', '1', '2341', 'df', '1', '1');
INSERT INTO `send` VALUES ('10', '1344221362', '13', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('11', '1344223378', '14', '1', '', '', '0', '1');
INSERT INTO `send` VALUES ('12', '1344223474', '15', '1', '', '', '1', '1');
INSERT INTO `send` VALUES ('13', '1344223647', '16', '1', '', '', '1', '1');
INSERT INTO `send` VALUES ('14', '1344223742', '18', '1', '', '', '1', '1');
INSERT INTO `send` VALUES ('15', '1344223866', '22', '1', '2341', 'df', '1', '1');
INSERT INTO `send` VALUES ('16', '1344223866', '22', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('17', '1344224198', '23', '1', '2341', 'df', '1', '1');
INSERT INTO `send` VALUES ('18', '1344224198', '23', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('21', '1344225574', '26', '1', '2341', 'df', '1', '1');
INSERT INTO `send` VALUES ('22', '1344225574', '26', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('23', '1344225660', '27', '1', '2341', 'df', '0', '0');
INSERT INTO `send` VALUES ('24', '1344225660', '27', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('25', '1344225780', '28', '1', '1874570871', '', '1', '1');
INSERT INTO `send` VALUES ('26', '1344238020', '29', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('27', '1344238681', '30', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('28', '1344240305', '0', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('29', '1344240750', '32', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('30', '1344240791', '33', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('31', '1344244447', '34', '1', 'test18745708710', '', '1', '1');
INSERT INTO `send` VALUES ('32', '1344244589', '35', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('33', '1344244633', '36', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('34', '1344244950', '37', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('35', '1344245393', '38', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('36', '1344245538', '39', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('37', '1344250873', '40', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('38', '1344251060', '41', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('39', '1344252998', '42', '1', '18745708710', '寒燠', '1', '1');
INSERT INTO `send` VALUES ('40', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('41', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('42', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('43', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('44', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('45', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('46', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('47', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('48', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('49', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('50', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('51', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('52', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('53', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('54', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('55', '1345651200', '43', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('56', '1346342400', '44', '1', '18745017074', 'df', '0', '0');
INSERT INTO `send` VALUES ('57', '1346342400', '44', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('58', '1346342400', '44', '1', '18745017074', 'df', '0', '0');
INSERT INTO `send` VALUES ('59', '1346342400', '44', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('60', '1346342400', '44', '1', '18745017074', 'df', '0', '0');
INSERT INTO `send` VALUES ('61', '1346342400', '44', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('62', '1346342400', '45', '1', '18745017074', 'df', '0', '0');
INSERT INTO `send` VALUES ('63', '1346342400', '45', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('64', '1346342400', '45', '1', '18745017074', 'df', '0', '0');
INSERT INTO `send` VALUES ('65', '1346342400', '45', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('66', '1346342400', '45', '1', '18745017074', 'df', '0', '0');
INSERT INTO `send` VALUES ('67', '1346342400', '45', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('69', '1346342400', '46', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('70', '1346342400', '46', '1', '15978417610', '', '0', '0');
INSERT INTO `send` VALUES ('71', '1346342400', '47', '1', '18745708710', '寒燠', '0', '0');
INSERT INTO `send` VALUES ('72', '1350029085', '48', '1', '15046085646', '', '1', '1');
