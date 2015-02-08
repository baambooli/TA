/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : travelagency

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-02-07 20:58:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819;

-- ----------------------------
-- Records of authassignment
-- ----------------------------
INSERT INTO `authassignment` VALUES ('Admin', '1', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '11', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '12', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '27', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '28', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '29', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '37', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '39', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '40', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '41', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '42', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '43', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '5', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '6', null, 'N;');
INSERT INTO `authassignment` VALUES ('Authenticated', '9', null, 'N;');
INSERT INTO `authassignment` VALUES ('FlightOperator', '2', null, 'N;');
INSERT INTO `authassignment` VALUES ('FlightOperator', '4', null, 'N;');
INSERT INTO `authassignment` VALUES ('Guest', '18', null, 'N;');
INSERT INTO `authassignment` VALUES ('HotelOperator', '3', null, 'N;');
INSERT INTO `authassignment` VALUES ('HotelOperator', '4', null, 'N;');
