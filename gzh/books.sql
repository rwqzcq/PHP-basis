/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : books

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2018-01-31 01:14:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(32) NOT NULL,
  `price` float(10,0) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `author` varchar(10) NOT NULL,
  `info` varchar(10) NOT NULL,
  `add_time` int(15) NOT NULL,
  `adder` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('2', '交通运输书2', '13', '12-98IMF', '1', '铁道部', '铁道部', '1517326744', '铁道部');

-- ----------------------------
-- Table structure for `cat`
-- ----------------------------
DROP TABLE IF EXISTS `cat`;
CREATE TABLE `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat
-- ----------------------------
INSERT INTO `cat` VALUES ('1', '文学');
INSERT INTO `cat` VALUES ('2', '交通运输');
INSERT INTO `cat` VALUES ('3', '艺术');
INSERT INTO `cat` VALUES ('9', '艺术');
INSERT INTO `cat` VALUES ('5', '工业技术');
