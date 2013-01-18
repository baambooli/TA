/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : travelagency

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-01-16 22:02:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `aireplane_specifications`
-- ----------------------------
DROP TABLE IF EXISTS `aireplane_specifications`;
CREATE TABLE `aireplane_specifications` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `NoOfFirstClassSeats` int(11) NOT NULL,
  `NoOfBusinessClassSeats` int(11) NOT NULL,
  `NoOfEconomyClassSeats` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aireplane_specifications
-- ----------------------------
INSERT INTO `aireplane_specifications` VALUES ('1', 'Boing 727', 'comercial', '20', '30', '40');
INSERT INTO `aireplane_specifications` VALUES ('2', 'Boing 737', 'comercial', '30', '40', '60');
INSERT INTO `aireplane_specifications` VALUES ('3', 'Boing 747', 'comercial', '100', '100', '300');
INSERT INTO `aireplane_specifications` VALUES ('4', 'AirBus A1', 'comercial', '100', '100', '150');

-- ----------------------------
-- Table structure for `airlines`
-- ----------------------------
DROP TABLE IF EXISTS `airlines`;
CREATE TABLE `airlines` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Tell1` varchar(25) NOT NULL,
  `Tell2` varchar(25) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of airlines
-- ----------------------------
INSERT INTO `airlines` VALUES ('1', 'Canada Air', 'Canada', '', '123', '', '', '');
INSERT INTO `airlines` VALUES ('2', 'KLM', '', '', '369', '', '', '');
INSERT INTO `airlines` VALUES ('3', 'British Airways', 'England', '', '987', '', '', '');

-- ----------------------------
-- Table structure for `airplanes`
-- ----------------------------
DROP TABLE IF EXISTS `airplanes`;
CREATE TABLE `airplanes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `AirlineId` int(11) NOT NULL,
  `StartDateOfWork` date DEFAULT NULL,
  `AirplaneSpecificationId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_airplanes_airlines_Id` (`AirlineId`),
  KEY `FK_airplanes_aireplane_specifications_Id` (`AirplaneSpecificationId`),
  CONSTRAINT `FK_airplanes_aireplane_specifications_Id` FOREIGN KEY (`AirplaneSpecificationId`) REFERENCES `aireplane_specifications` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_airplanes_airlines_Id` FOREIGN KEY (`AirlineId`) REFERENCES `airlines` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of airplanes
-- ----------------------------
INSERT INTO `airplanes` VALUES ('1', 'CA-01', '1', '2010-05-12', '1');
INSERT INTO `airplanes` VALUES ('2', 'CA-02', '1', '2008-01-01', '2');
INSERT INTO `airplanes` VALUES ('3', 'KLM-01', '2', '2005-01-08', '1');
INSERT INTO `airplanes` VALUES ('4', 'BA-01', '3', '2000-12-04', '3');
INSERT INTO `airplanes` VALUES ('6', 'BA-02', '3', '2006-12-05', '4');
INSERT INTO `airplanes` VALUES ('7', 'CA-03', '1', '2012-12-10', '2');
INSERT INTO `airplanes` VALUES ('8', 'KLM-03', '2', '2012-12-19', '3');

-- ----------------------------
-- Table structure for `airports`
-- ----------------------------
DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `CityId` int(11) NOT NULL,
  `Tel1` varchar(25) NOT NULL,
  `Tel2` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_airports_cities_Id` (`CityId`),
  CONSTRAINT `FK_airports_cities_Id` FOREIGN KEY (`CityId`) REFERENCES `cities` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of airports
-- ----------------------------
INSERT INTO `airports` VALUES ('2', 'Montreal Airport', '', '1', '123', '', '');
INSERT INTO `airports` VALUES ('9', 'Toronto Airport', '', '2', '324', '', '');
INSERT INTO `airports` VALUES ('10', 'Ottawa Airport', '', '3', '765', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authitemchild
-- ----------------------------
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

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `countryId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`),
  KEY `FK_cities_countries` (`countryId`),
  CONSTRAINT `FK_cities_countries` FOREIGN KEY (`countryId`) REFERENCES `countries` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Montreal', '1');
INSERT INTO `cities` VALUES ('2', 'Toronto', '1');
INSERT INTO `cities` VALUES ('3', 'Ottawa', '1');
INSERT INTO `cities` VALUES ('4', 'Vancouver', '1');
INSERT INTO `cities` VALUES ('5', 'Tehran', '2');
INSERT INTO `cities` VALUES ('6', 'New York', '3');

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Family` varchar(70) DEFAULT NULL,
  `BirthDay` date NOT NULL,
  `CountryId` int(11) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `tell` varchar(20) NOT NULL,
  `CreditCardType` varchar(255) DEFAULT NULL,
  `CreditCardExpiryDate` varchar(255) DEFAULT NULL,
  `CreditCardHolderName` varchar(255) DEFAULT NULL,
  `CreditCardSecurityNumber` varchar(255) DEFAULT NULL,
  `CreditCardNumber` varchar(255) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Sex` varchar(10) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `PassportNumber` varchar(50) DEFAULT NULL,
  `Username` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_clients_countries_Id` (`CountryId`),
  KEY `FK_clients_users_id` (`UserId`),
  CONSTRAINT `FK_clients_countries_Id` FOREIGN KEY (`CountryId`) REFERENCES `countries` (`Id`),
  CONSTRAINT `FK_clients_users_id` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', 'kamran', 'khoshnasib fallah', '1998-10-02', '1', 'k1', '123', 'M2uUDAUu6avJrkCwO7NjvA==', 'DSPgS1hlWxqMuG22AmbYHA==', 'NFfPEIeaFjdEBNp27DF+pA==', 'tWCNgYYPyWvF/HM/ysnLeQ==', 'eKjpk8W/eTcb0Z0hrfVzaQ==', 'm3.jpg', '0', '1', 'wJsesZPVv9gFcKsOii6K5Q==', 'Admin');
INSERT INTO `clients` VALUES ('3', 'k3', 'k3', '0000-00-00', '3', 'k3', '879', 'M2uUDAUu6avJrkCwO7NjvA==', 'YtoKfJ5UZl1vasToLxWeVA==', 'YtoKfJ5UZl1vasToLxWeVA==', 'YtoKfJ5UZl1vasToLxWeVA==', 'YtoKfJ5UZl1vasToLxWeVA==', null, '1', '3', 'YtoKfJ5UZl1vasToLxWeVA==', 'Hotel_Operator');
INSERT INTO `clients` VALUES ('18', 'k4', 'Hotel_Flight_Operator', '0000-00-00', '2', 'Hotel_Flight_Operator`', '123', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', 'k4_474579', '0', '2', 'S+syWY5a3US5xkne4hurXw==', 'Hotel_Flight_Operator');
INSERT INTO `clients` VALUES ('19', 'Authenticated_User', 'Authenticated_User', '0000-00-00', '3', 'Authenticated_User', '43322', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', 'k5_485809', '0', '4', 'eAocNMbA/WLle6J8bYvTng==', 'Authenticated_User');
INSERT INTO `clients` VALUES ('20', 'k6', 'kami', '0000-00-00', '1', 'hmbhm', '678', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', 'k6_970581', '0', '5', 'K8ReCOE1QOMLyiyL5Rtejw==', 'kami');
INSERT INTO `clients` VALUES ('22', 'nahid', 'nahid', '0000-00-00', '1', 'na', '789', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '_496460', '1', '9', 'zQ64CHhu56rnC2q29VrKbA==', 'n');
INSERT INTO `clients` VALUES ('24', 'mic', 'mic', '0000-00-00', '1', 'vgnvhgg', '56757', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '_732574', '1', '11', 'tEXaW3Eakyak7boUvL6zhA==', 'h');
INSERT INTO `clients` VALUES ('25', 'fghyjh', 'hjghy', '1900-12-21', '1', 'bjmb', 'ghgjh', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '_825622', '0', '12', '4izkI/lNnccJIO2p87PHxQ==', 'hamid');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `FlagURL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Canada', 'canada.gif');
INSERT INTO `countries` VALUES ('2', 'Iran', 'iran.png');
INSERT INTO `countries` VALUES ('3', 'USA', 'usa.gif');
INSERT INTO `countries` VALUES ('4', 'g4', 'g4.jpg');

-- ----------------------------
-- Table structure for `flights`
-- ----------------------------
DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FlightNumber` varchar(50) NOT NULL,
  `AirplaneId` int(11) NOT NULL,
  `AirlineId` int(11) NOT NULL,
  `TakeoffTime` time NOT NULL,
  `TakeoffDate` date NOT NULL,
  `LandingTime` time NOT NULL,
  `LandingDate` date NOT NULL,
  `DepartureAirportId` int(11) NOT NULL,
  `DestinationAirportId` int(11) NOT NULL,
  `PriceOfFirstClassSeats` double(10,0) NOT NULL,
  `PriceOfBusinessClassSeats` double(10,0) NOT NULL,
  `PriceOfEconomyClassSeats` double(10,0) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `FlightNumber` (`FlightNumber`),
  KEY `FK_flights_airports_Id2` (`DestinationAirportId`),
  KEY `FK_flights_airports_Id` (`DepartureAirportId`),
  KEY `FK_flights_airplanes_Id` (`AirplaneId`),
  KEY `FK_flights_airlines_Id` (`AirlineId`),
  CONSTRAINT `FK_flights_airlines_Id` FOREIGN KEY (`AirlineId`) REFERENCES `airlines` (`Id`),
  CONSTRAINT `FK_flights_airplanes_Id` FOREIGN KEY (`AirplaneId`) REFERENCES `airplanes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_flights_airports_Id` FOREIGN KEY (`DepartureAirportId`) REFERENCES `airports` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_flights_airports_Id2` FOREIGN KEY (`DestinationAirportId`) REFERENCES `airports` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192;

-- ----------------------------
-- Records of flights
-- ----------------------------
INSERT INTO `flights` VALUES ('2', 'f11', '2', '1', '02:15:00', '2013-01-09', '02:15:00', '2013-01-17', '2', '9', '400', '300', '200');
INSERT INTO `flights` VALUES ('3', 'f2', '3', '2', '01:30:00', '2013-01-16', '01:30:00', '2013-01-17', '2', '9', '600', '500', '400');

-- ----------------------------
-- Table structure for `flight_clients`
-- ----------------------------
DROP TABLE IF EXISTS `flight_clients`;
CREATE TABLE `flight_clients` (
  `Id` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `FlightId` int(11) NOT NULL,
  `SeatId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `FlightId` (`FlightId`,`SeatId`),
  KEY `FK_flight_clients_clients_Id` (`ClientId`),
  KEY `FK_flight_passengers_seats_Id` (`SeatId`),
  CONSTRAINT `FK_flight_clients_clients_Id` FOREIGN KEY (`ClientId`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_flight_passengers` FOREIGN KEY (`FlightId`) REFERENCES `flights` (`Id`),
  CONSTRAINT `FK_flight_passengers_seats_Id` FOREIGN KEY (`SeatId`) REFERENCES `seats` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flight_clients
-- ----------------------------

-- ----------------------------
-- Table structure for `hotels`
-- ----------------------------
DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Category` int(11) NOT NULL,
  `CityId` int(11) NOT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `fk_hotels_cities` (`CityId`),
  CONSTRAINT `fk_hotels_cities` FOREIGN KEY (`CityId`) REFERENCES `cities` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotels
-- ----------------------------
INSERT INTO `hotels` VALUES ('9', 'Hotel1', '3', '1', null, null, null, null, 'al@yahoo.com', 'h2.jpg');
INSERT INTO `hotels` VALUES ('12', 'Hotel2', '3', '2', '123', null, '123', null, null, 'h3.jpg');
INSERT INTO `hotels` VALUES ('15', 'Hotel7', '4', '1', null, null, null, null, '', 'h4.jpg');
INSERT INTO `hotels` VALUES ('19', 'hotel19', '4', '4', null, null, null, null, '', 'hotel19');
INSERT INTO `hotels` VALUES ('20', 'hotel3', '5', '2', null, null, null, null, '', 'hotel3');

-- ----------------------------
-- Table structure for `rights`
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rights
-- ----------------------------

-- ----------------------------
-- Table structure for `rooms`
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HotelId` int(11) NOT NULL,
  `RoomNumber` varchar(30) NOT NULL,
  `RoomTypeId` int(11) NOT NULL,
  `Tell` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_rooms_hotels` (`HotelId`),
  KEY `fk_rooms_roomsTypes` (`RoomTypeId`),
  CONSTRAINT `fk_rooms_hotels` FOREIGN KEY (`HotelId`) REFERENCES `hotels` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rooms_roomsTypes` FOREIGN KEY (`RoomTypeId`) REFERENCES `roomtypes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('2', '12', '3', '1', '123');
INSERT INTO `rooms` VALUES ('4', '9', '2', '3', '1245');
INSERT INTO `rooms` VALUES ('7', '9', '5', '1', '1234');
INSERT INTO `rooms` VALUES ('8', '12', '7', '2', '741');
INSERT INTO `rooms` VALUES ('9', '12', 'a1', '1', '123');
INSERT INTO `rooms` VALUES ('10', '12', 'a2', '1', '2');
INSERT INTO `rooms` VALUES ('11', '12', 'a3', '1', '3');
INSERT INTO `rooms` VALUES ('12', '20', 'b1', '1', '1');
INSERT INTO `rooms` VALUES ('13', '20', 'b2', '1', '3');
INSERT INTO `rooms` VALUES ('14', '9', '1', '2', '123');
INSERT INTO `rooms` VALUES ('16', '9', '3', '4', '345');
INSERT INTO `rooms` VALUES ('17', '9', '4', '5', '987');
INSERT INTO `rooms` VALUES ('18', '15', '77', '1', '7');
INSERT INTO `rooms` VALUES ('19', '15', '771', '1', '766');
INSERT INTO `rooms` VALUES ('20', '9', '772', '1', '7434');
INSERT INTO `rooms` VALUES ('21', '15', '774', '1', '32');
INSERT INTO `rooms` VALUES ('22', '19', 'v1', '1', '123');
INSERT INTO `rooms` VALUES ('23', '19', 'v2', '1', '432');

-- ----------------------------
-- Table structure for `roomtypes`
-- ----------------------------
DROP TABLE IF EXISTS `roomtypes`;
CREATE TABLE `roomtypes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Capacity` int(2) NOT NULL,
  `PricePerDay` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096;

-- ----------------------------
-- Records of roomtypes
-- ----------------------------
INSERT INTO `roomtypes` VALUES ('1', 'Single', '1', '100');
INSERT INTO `roomtypes` VALUES ('2', 'Double', '2', '150');
INSERT INTO `roomtypes` VALUES ('3', 'Double King', '2', '200');
INSERT INTO `roomtypes` VALUES ('4', 'Triple', '3', '220');
INSERT INTO `roomtypes` VALUES ('5', 'Suite', '4', '250');

-- ----------------------------
-- Table structure for `room_clients`
-- ----------------------------
DROP TABLE IF EXISTS `room_clients`;
CREATE TABLE `room_clients` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RoomId` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_room_clients_clients_Id` (`ClientId`),
  KEY `FK_room_clients_rooms_Id` (`RoomId`),
  CONSTRAINT `FK_room_clients_clients_Id` FOREIGN KEY (`ClientId`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_room_clients_rooms_Id` FOREIGN KEY (`RoomId`) REFERENCES `rooms` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_clients
-- ----------------------------
INSERT INTO `room_clients` VALUES ('2', '2', '1', '2012-12-05', '2012-12-07', 'Reserved');
INSERT INTO `room_clients` VALUES ('7', '4', '1', '2013-01-02', '2013-01-11', 'Reserved');
INSERT INTO `room_clients` VALUES ('8', '4', '1', '2013-01-12', '2013-01-14', 'Reserved');
INSERT INTO `room_clients` VALUES ('10', '4', '3', '2013-01-15', '2013-01-22', 'Cancelation Request');
INSERT INTO `room_clients` VALUES ('15', '4', '1', '2013-01-30', '2013-01-31', 'Reserved');
INSERT INTO `room_clients` VALUES ('16', '4', '1', '2013-01-24', '2013-01-25', 'Reservation Request');
INSERT INTO `room_clients` VALUES ('18', '7', '3', '2013-01-03', '2013-01-09', 'Reserved');
INSERT INTO `room_clients` VALUES ('19', '16', '3', '2013-01-03', '2013-01-15', 'Reserved');
INSERT INTO `room_clients` VALUES ('20', '16', '25', '2013-01-17', '2013-01-21', 'Reserved');
INSERT INTO `room_clients` VALUES ('21', '7', '1', '2013-01-16', '2013-01-20', 'Reserved');
INSERT INTO `room_clients` VALUES ('25', '2', '1', '2013-01-09', '2013-01-10', 'Cancelation Request');
INSERT INTO `room_clients` VALUES ('26', '23', '1', '2013-01-22', '2013-01-28', 'Reservation Request');
INSERT INTO `room_clients` VALUES ('27', '17', '24', '2013-01-11', '2013-01-12', 'Reserved');

-- ----------------------------
-- Table structure for `seats`
-- ----------------------------
DROP TABLE IF EXISTS `seats`;
CREATE TABLE `seats` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SeatNumber` varchar(20) NOT NULL,
  `SeatType` varchar(25) NOT NULL,
  `AirplaneSpecId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_seats_aireplane_specifications_Id` (`AirplaneSpecId`),
  CONSTRAINT `FK_seats_aireplane_specifications_Id` FOREIGN KEY (`AirplaneSpecId`) REFERENCES `aireplane_specifications` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seats
-- ----------------------------
INSERT INTO `seats` VALUES ('1', 'b727_b1', 'BusinessClass', '1');
INSERT INTO `seats` VALUES ('2', 'b727_b2', 'BusinessClass', '1');
INSERT INTO `seats` VALUES ('3', 'b727_b3', 'BusinessClass', '1');
INSERT INTO `seats` VALUES ('4', 'b727_b4', 'BusinessClass', '1');
INSERT INTO `seats` VALUES ('5', 'b727_f1', 'FirstClass', '1');
INSERT INTO `seats` VALUES ('6', 'b727_f2', 'FirstClass', '1');
INSERT INTO `seats` VALUES ('7', 'b727_f3', 'FirstClass', '1');
INSERT INTO `seats` VALUES ('8', 'b727_e1', 'EconomyClass', '1');
INSERT INTO `seats` VALUES ('9', 'b727_e2', 'EconomyClass', '1');
INSERT INTO `seats` VALUES ('10', 'b727_e3', 'EconomyClass', '1');
INSERT INTO `seats` VALUES ('11', 'b727_e4', 'EconomyClass', '1');
INSERT INTO `seats` VALUES ('12', 'b737_f1', 'FirstClass', '2');
INSERT INTO `seats` VALUES ('13', 'b737_f2', 'FirstClass', '2');
INSERT INTO `seats` VALUES ('14', 'b737_f3', 'FirstClass', '2');
INSERT INTO `seats` VALUES ('15', 'b737_b1', 'BusinessClass', '2');
INSERT INTO `seats` VALUES ('16', 'b737_b2', 'BusinessClass', '2');
INSERT INTO `seats` VALUES ('17', 'b737_b3', 'BusinessClass', '2');
INSERT INTO `seats` VALUES ('18', 'b737_b4', 'BusinessClass', '2');
INSERT INTO `seats` VALUES ('19', 'b737_e1', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('20', 'b737_e2', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('21', 'b737_e3', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('22', 'b747_e1', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('23', 'b747_e2', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('24', 'b747_e3', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('25', 'b747_e4', 'EconomyClass', '2');
INSERT INTO `seats` VALUES ('26', 'b747_f1', 'FirstClass', '3');
INSERT INTO `seats` VALUES ('27', 'b747_f2', 'FirstClass', '3');
INSERT INTO `seats` VALUES ('28', 'b747_f3', 'FirstClass', '3');
INSERT INTO `seats` VALUES ('30', 'b747_b1', 'BusinessClass', '3');
INSERT INTO `seats` VALUES ('31', 'b747_b2', 'BusinessClass', '3');
INSERT INTO `seats` VALUES ('32', 'b747_b3', 'BusinessClass', '3');
INSERT INTO `seats` VALUES ('33', 'b747_b4', 'BusinessClass', '3');
INSERT INTO `seats` VALUES ('34', 'Airbus_a1_f1', 'FirstClass', '4');
INSERT INTO `seats` VALUES ('35', 'Airbus_a1_f2', 'FirstClass', '4');
INSERT INTO `seats` VALUES ('36', 'Airbus_a1_f3', 'FirstClass', '4');
INSERT INTO `seats` VALUES ('37', 'Airbus_a1_b1', 'BusinessClass', '4');
INSERT INTO `seats` VALUES ('38', 'Airbus_a1_b2', 'BusinessClass', '4');
INSERT INTO `seats` VALUES ('39', 'Airbus_a1_b3', 'BusinessClass', '4');
INSERT INTO `seats` VALUES ('40', 'Airbus_a1_b4', 'BusinessClass', '4');
INSERT INTO `seats` VALUES ('41', 'Airbus_a1_e1', 'EconomyClass', '4');
INSERT INTO `seats` VALUES ('42', 'Airbus_a1_e2', 'EconomyClass', '4');
INSERT INTO `seats` VALUES ('43', 'Airbus_a1_e3', 'EconomyClass', '4');
INSERT INTO `seats` VALUES ('44', 'Airbus_a1_e4', 'EconomyClass', '4');
INSERT INTO `seats` VALUES ('61', 'b737_e4', 'EconomyClass', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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

-- ----------------------------
-- View structure for `airplane_view`
-- ----------------------------
DROP VIEW IF EXISTS `airplane_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `airplane_view` AS select `airplanes`.`Id` AS `Id`,`airplanes`.`Name` AS `AirplaneName`,`airlines`.`Name` AS `AirlineName`,`airplanes`.`StartDateOfWork` AS `StartDateOfWork`,`aireplane_specifications`.`Name` AS `AirplaneSpec`,`aireplane_specifications`.`Type` AS `AirplaneSpecType` from ((`airplanes` join `airlines` on((`airplanes`.`AirlineId` = `airlines`.`Id`))) join `aireplane_specifications` on((`airplanes`.`AirplaneSpecificationId` = `aireplane_specifications`.`Id`))) ;

-- ----------------------------
-- View structure for `airport_view`
-- ----------------------------
DROP VIEW IF EXISTS `airport_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `airport_view` AS select `airports`.`Id` AS `Id`,`airports`.`Name` AS `AirportName`,`airports`.`Address` AS `Address`,`cities`.`Name` AS `CityName`,`airports`.`Tel1` AS `Tel1` from (`airports` join `cities` on((`airports`.`CityId` = `cities`.`Id`))) ;

-- ----------------------------
-- View structure for `cities_view`
-- ----------------------------
DROP VIEW IF EXISTS `cities_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cities_view` AS select `cities`.`Id` AS `Id`,`cities`.`Name` AS `CityName`,`countries`.`Name` AS `CountryName` from (`cities` join `countries` on((`cities`.`countryId` = `countries`.`Id`))) ;

-- ----------------------------
-- View structure for `clientfullname_view`
-- ----------------------------
DROP VIEW IF EXISTS `clientfullname_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientfullname_view` AS select `clients`.`Id` AS `ClientId`,concat(`clients`.`Name`,' ',`clients`.`Family`,', username = ',convert(`users`.`username` using utf8)) AS `FullName` from (`clients` join `users` on((`clients`.`UserId` = `users`.`id`))) ;

-- ----------------------------
-- View structure for `flightclients_view`
-- ----------------------------
DROP VIEW IF EXISTS `flightclients_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flightclients_view` AS select `seats`.`Id` AS `SeatId`,`seats`.`SeatNumber` AS `SeatNumber`,`seats`.`SeatType` AS `SeatType`,`aireplane_specifications`.`Name` AS `Aireplane_specificationsName`,`airplanes`.`Name` AS `AirplaneName`,`airlines`.`Name` AS `AirlineName`,`airlines`.`Country` AS `AirlineCountry`,`airlines`.`Tell1` AS `AirlineTel`,`flights`.`FlightNumber` AS `FlightNumber`,`flights`.`Id` AS `FlightId`,`flights`.`TakeoffTime` AS `TakeoffTime`,`flights`.`TakeoffDate` AS `TakeoffDate`,`flights`.`LandingTime` AS `LandingTime`,`flights`.`LandingDate` AS `LandingDate`,`dest_cities`.`Name` AS `DestinationCityName`,`dest_airports`.`Name` AS `DestinationAirportName`,`dest_airports`.`Address` AS `DestinationAirportAddress`,`dest_airports`.`Tel1` AS `DestinationAirportTel`,`dep_cities`.`Name` AS `DepartureCityName`,`dep_airport`.`Name` AS `DepartureAirportName`,`dep_airport`.`Address` AS `DepartureAirportAddress`,`dep_airport`.`Tel1` AS `DepartureAirportTel`,`flight_clients`.`Id` AS `FlightClientId`,`clients`.`Name` AS `ClientName`,`clients`.`Family` AS `ClientFamily`,`clients`.`Sex` AS `ClientSex`,`clients`.`PassportNumber` AS `PassportNumber`,`clients`.`Username` AS `Username`,`aireplane_specifications`.`Type` AS `AireplaneSpecificationType` from ((((((((((`flight_clients` join `clients` on((`flight_clients`.`ClientId` = `clients`.`Id`))) join `flights` on((`flight_clients`.`FlightId` = `flights`.`Id`))) join `airplanes` on((`flights`.`AirplaneId` = `airplanes`.`Id`))) join `aireplane_specifications` on((`airplanes`.`AirplaneSpecificationId` = `aireplane_specifications`.`Id`))) join `airlines` on((`airplanes`.`AirlineId` = `airlines`.`Id`))) join `seats` on(((`flight_clients`.`SeatId` = `seats`.`Id`) and (`seats`.`AirplaneSpecId` = `aireplane_specifications`.`Id`)))) join `airports` `dep_airport` on((`flights`.`DepartureAirportId` = `dep_airport`.`Id`))) join `cities` `dep_cities` on((`dep_airport`.`CityId` = `dep_cities`.`Id`))) join `airports` `dest_airports` on((`flights`.`DestinationAirportId` = `dest_airports`.`Id`))) join `cities` `dest_cities` on((`dest_airports`.`CityId` = `dest_cities`.`Id`))) ;

-- ----------------------------
-- View structure for `flights_view`
-- ----------------------------
DROP VIEW IF EXISTS `flights_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `flights_view` AS select `airports`.`Name` AS `AirportName`,`airports`.`Tel1` AS `Tel1`,`flights`.`FlightNumber` AS `FlightNumber`,`flights`.`Id` AS `FlightId`,`flights`.`TakeoffTime` AS `TakeoffTime`,`flights`.`TakeoffDate` AS `TakeoffDate`,`flights`.`LandingTime` AS `LandingTime`,`flights`.`LandingDate` AS `LandingDate`,`airplanes`.`Name` AS `AirplaneName`,`airlines`.`Name` AS `AirlineName` from (((`flights` join `airports` on((`flights`.`DepartureAirportId` = `airports`.`Id`))) join `airplanes` on((`flights`.`AirplaneId` = `airplanes`.`Id`))) join `airlines` on(((`flights`.`AirlineId` = `airlines`.`Id`) and (`airplanes`.`AirlineId` = `airlines`.`Id`)))) ;

-- ----------------------------
-- View structure for `hotles_view`
-- ----------------------------
DROP VIEW IF EXISTS `hotles_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hotles_view` AS select `cities`.`Name` AS `CityName`,`hotels`.`ID` AS `ID`,`hotels`.`Name` AS `HotelName`,`hotels`.`Category` AS `Category` from (`hotels` join `cities` on((`hotels`.`CityId` = `cities`.`Id`))) ;

-- ----------------------------
-- View structure for `neverusedrooms_view`
-- ----------------------------
DROP VIEW IF EXISTS `neverusedrooms_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `neverusedrooms_view` AS select `rooms`.`Id` AS `RoomId`,`rooms`.`RoomNumber` AS `RoomNumber`,`cities`.`Name` AS `CityName`,`hotels`.`Name` AS `HotelName`,`roomtypes`.`Name` AS `RoomType`,`hotels`.`Category` AS `HotelCategory`,`roomtypes`.`PricePerDay` AS `PricePerDay`,`hotels`.`Tel` AS `HotelTel` from (((`rooms` join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `cities` on((`hotels`.`CityId` = `cities`.`Id`))) join `roomtypes` on((`rooms`.`RoomTypeId` = `roomtypes`.`Id`))) where (not(`rooms`.`Id` in (select distinct `room_clients`.`RoomId` from `room_clients`))) ;

-- ----------------------------
-- View structure for `rooms_view`
-- ----------------------------
DROP VIEW IF EXISTS `rooms_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rooms_view` AS select `rooms`.`Id` AS `Id`,`hotels`.`Name` AS `HotelName`,`roomtypes`.`Name` AS `RoomTypeName`,`rooms`.`RoomNumber` AS `RoomNumber`,`rooms`.`Tell` AS `Tell` from ((`rooms` join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `roomtypes` on((`rooms`.`RoomTypeId` = `roomtypes`.`Id`))) ;

-- ----------------------------
-- View structure for `search4emptyroom_view`
-- ----------------------------
DROP VIEW IF EXISTS `search4emptyroom_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `search4emptyroom_view` AS select `rooms`.`Id` AS `RoomId`,`rooms`.`RoomNumber` AS `RoomNumber`,`hotels`.`Name` AS `HotelName`,`hotels`.`Category` AS `HotelCategory`,`hotels`.`Tel` AS `HotelTel`,`cities`.`Name` AS `CityName`,`roomtypes`.`Name` AS `RoomType`,`roomtypes`.`PricePerDay` AS `PricePerDay`,`room_clients`.`StartDate` AS `CheckinDate`,`room_clients`.`EndDate` AS `CheckoutDate`,`room_clients`.`Status` AS `RoomStatus`,`hotels`.`Address` AS `HotelAddress`,`hotels`.`Image` AS `HotelImage`,`roomtypes`.`Capacity` AS `RoomCapacity`,`hotels`.`ID` AS `HotelId` from ((((`room_clients` join `rooms` on((`room_clients`.`RoomId` = `rooms`.`Id`))) join `roomtypes` on((`rooms`.`RoomTypeId` = `roomtypes`.`Id`))) join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `cities` on((`hotels`.`CityId` = `cities`.`Id`))) ;

-- ----------------------------
-- View structure for `searchhotel_view`
-- ----------------------------
DROP VIEW IF EXISTS `searchhotel_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `searchhotel_view` AS select `hotels`.`Name` AS `HotelName`,`hotels`.`Category` AS `HotelCategory`,`hotels`.`Tel` AS `HotelTel`,`hotels`.`Fax` AS `HotelFax`,`hotels`.`Address` AS `HotelAddress`,`hotels`.`Email` AS `HotelEmail`,`hotels`.`Image` AS `HotelImage`,`rooms`.`RoomNumber` AS `RoomNumber`,`rooms`.`Tell` AS `RoomTel`,`room_clients`.`Id` AS `RoomClientId`,`room_clients`.`StartDate` AS `StartDate`,`room_clients`.`EndDate` AS `EndDate`,`room_clients`.`Status` AS `Status`,`clients`.`Name` AS `ClientName`,`clients`.`Id` AS `ClientId`,`clients`.`Family` AS `ClientFamily`,`clients`.`BirthDay` AS `ClientBirthDay`,`clients`.`Address` AS `ClientAddress`,`clients`.`tell` AS `ClientTel`,`users`.`email` AS `ClientEmail`,`users`.`username` AS `ClientUsername`,`cities`.`Name` AS `CityName` from (((((`room_clients` join `clients` on((`room_clients`.`ClientId` = `clients`.`Id`))) join `users` on((`clients`.`UserId` = `users`.`id`))) join `rooms` on((`room_clients`.`RoomId` = `rooms`.`Id`))) join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `cities` on((`hotels`.`CityId` = `cities`.`Id`))) ;

-- ----------------------------
-- View structure for `seats_view`
-- ----------------------------
DROP VIEW IF EXISTS `seats_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seats_view` AS select `seats`.`Id` AS `Id`,`seats`.`SeatNumber` AS `SeatNumber`,`seats`.`SeatType` AS `SeatType`,`aireplane_specifications`.`Name` AS `AirplaneType` from (`seats` join `aireplane_specifications` on((`seats`.`AirplaneSpecId` = `aireplane_specifications`.`Id`))) ;
