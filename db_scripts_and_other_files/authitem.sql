/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : travelagency

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-02-07 20:58:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authitem`
-- ----------------------------
DROP TABLE IF EXISTS `authitem`;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=124;

-- ----------------------------
-- Records of authitem
-- ----------------------------
INSERT INTO `authitem` VALUES ('Admin', '2', 'Admin Role', null, 'N;');
INSERT INTO `authitem` VALUES ('AdminTask', '1', 'Admin Task', null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airline.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airplane.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('AirPlaneSpecification.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Airport.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Authenticated', '2', 'Authenticated User', null, 'N;');
INSERT INTO `authitem` VALUES ('ChangeForms', '0', 'Change Forms', null, 'N;');
INSERT INTO `authitem` VALUES ('City.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('City.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('City.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('City.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('City.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('City.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('City.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.UpdateMyself', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Client.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Country.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('CreateReports', '0', 'Create Reports', null, 'N;');
INSERT INTO `authitem` VALUES ('CrudFlightTables', '0', 'Crud Flight Tables', null, 'N;');
INSERT INTO `authitem` VALUES ('CrudHisOwnInformation', '0', 'Crud His Own Information', null, 'N;');
INSERT INTO `authitem` VALUES ('CrudHotelTables', '0', 'Crud Hotel Tables', null, 'N;');
INSERT INTO `authitem` VALUES ('CrudRbacRights', '0', 'Crud Rbac Rights', null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Flight.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightClient.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('FlightHotelOperator', '2', 'Flight Hotel Operator Role', null, 'N;');
INSERT INTO `authitem` VALUES ('FlightOperator', '2', 'Flight Operator Role', null, 'N;');
INSERT INTO `authitem` VALUES ('Guest', '2', 'Guest', null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Hotel.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('HotelOperator', '2', 'Hotel Operator Role', null, 'N;');
INSERT INTO `authitem` VALUES ('LoginLogout', '0', 'Login Logout', null, 'N;');
INSERT INTO `authitem` VALUES ('Register', '0', 'Register himself on the site', null, 'N;');
INSERT INTO `authitem` VALUES ('ReserveHotelAndFlights', '0', 'Reserve Hotel And Flights', null, 'N;');
INSERT INTO `authitem` VALUES ('Room.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Room.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Room.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Room.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Room.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Room.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Room.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomClient.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('RoomType.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('SearchHotelAndFlights', '0', 'Search Hotel And Flights', null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Seat.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.About', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Contact', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Error', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Login', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Logout', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ResetPassword', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.UpdateMyself', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.View', '0', null, null, 'N;');
