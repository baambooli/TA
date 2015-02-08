/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : travelagency

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-02-07 20:58:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=348;

-- ----------------------------
-- Records of authitemchild
-- ----------------------------
INSERT INTO `authitemchild` VALUES ('Authenticated', 'Airline.Admin');
INSERT INTO `authitemchild` VALUES ('FlightHotelOperator', 'Airline.Admin');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airline.Admin');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airline.Create');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airline.Delete');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airline.Index');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airline.Update');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airline.View');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airplane.*');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'AirPlaneSpecification.*');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Airport.*');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Authenticated');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'Authenticated');
INSERT INTO `authitemchild` VALUES ('AdminTask', 'ChangeForms');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'City.*');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'City.*');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Client.*');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'Client.*');
INSERT INTO `authitemchild` VALUES ('Authenticated', 'Client.UpdateMyself');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Country.*');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'Country.*');
INSERT INTO `authitemchild` VALUES ('AdminTask', 'CreateReports');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'CrudFlightTables');
INSERT INTO `authitemchild` VALUES ('Authenticated', 'CrudHisOwnInformation');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'CrudHotelTables');
INSERT INTO `authitemchild` VALUES ('AdminTask', 'CrudRbacRights');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Flight.*');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'FlightClient.*');
INSERT INTO `authitemchild` VALUES ('FlightHotelOperator', 'FlightOperator');
INSERT INTO `authitemchild` VALUES ('Authenticated', 'Guest');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'Hotel.*');
INSERT INTO `authitemchild` VALUES ('FlightHotelOperator', 'HotelOperator');
INSERT INTO `authitemchild` VALUES ('Authenticated', 'LoginLogout');
INSERT INTO `authitemchild` VALUES ('Guest', 'Register');
INSERT INTO `authitemchild` VALUES ('Authenticated', 'ReserveHotelAndFlights');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'Room.*');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'RoomClient.*');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'RoomType.*');
INSERT INTO `authitemchild` VALUES ('Guest', 'SearchHotelAndFlights');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'Seat.*');
INSERT INTO `authitemchild` VALUES ('Guest', 'Site.*');
INSERT INTO `authitemchild` VALUES ('Guest', 'Site.About');
INSERT INTO `authitemchild` VALUES ('Guest', 'Site.Contact');
INSERT INTO `authitemchild` VALUES ('FlightHotelOperator', 'User.Create');
INSERT INTO `authitemchild` VALUES ('FlightOperator', 'User.Create');
INSERT INTO `authitemchild` VALUES ('HotelOperator', 'User.Create');
INSERT INTO `authitemchild` VALUES ('Guest', 'User.ResetPassword');
INSERT INTO `authitemchild` VALUES ('Authenticated', 'User.UpdateMyself');
