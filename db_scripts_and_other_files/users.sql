/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : travelagency

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-02-07 20:58:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=1820;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin@notanaddress.com', 'Admin', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', null, '2012-11-15 21:34:02', '1', '2012-11-15 21:34:02', '1');
INSERT INTO `users` VALUES ('2', 'flight@notanaddress.com', 'Flight_Operator', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00', null);
INSERT INTO `users` VALUES ('3', 'hotel@notanaddress.com', 'Hotel_Operator', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', '2012-11-16 14:05:55', '0000-00-00 00:00:00', '1', '2012-12-28 00:32:16', null);
INSERT INTO `users` VALUES ('4', 'hotel_flight@yahoo.com', 'Hotel_Flight_Operator', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', null, '2012-12-27 23:47:04', '1', '2012-12-27 23:47:04', '1');
INSERT INTO `users` VALUES ('5', 'user@notanaddress.com', 'Authenticated_User', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', null, null, null, null, null);
INSERT INTO `users` VALUES ('8', 'kami@m.com', 'kami', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', null, '2013-01-01 12:10:56', '1', '2013-01-01 12:10:56', '1');
INSERT INTO `users` VALUES ('9', 'n@n.com', 'n', '4e8388879bd6ed262a107a3b0b435986090869591c4314fbba97a2d8f2a7175b', null, '2013-01-01 12:15:25', '1', '2013-01-01 12:15:25', '1');
INSERT INTO `users` VALUES ('11', 'h@wws.vom', 'h', '459047bbcf121ae3e06328bfb7322bab6721cc372d505a8f3c660cb7c8bd131d', null, '2013-01-01 15:02:28', null, '2013-01-01 15:02:28', null);
INSERT INTO `users` VALUES ('12', 'hani@fgyh.com', 'hamid', '459047bbcf121ae3e06328bfb7322bab6721cc372d505a8f3c660cb7c8bd131d', null, '2013-01-03 18:11:51', null, '2013-01-03 18:11:51', null);
