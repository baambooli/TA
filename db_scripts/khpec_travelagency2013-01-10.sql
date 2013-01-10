-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2013 at 09:38 AM
-- Server version: 5.1.66-cll
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `khpec_travelagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `aireplane_specifications`
--

CREATE TABLE IF NOT EXISTS `aireplane_specifications` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `NoOfFirstClassSeats` int(11) NOT NULL,
  `NoOfBusinessClassSeats` int(11) NOT NULL,
  `NoOfEconomyClassSeats` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `aireplane_specifications`
--

INSERT INTO `aireplane_specifications` (`Id`, `Name`, `Type`, `NoOfFirstClassSeats`, `NoOfBusinessClassSeats`, `NoOfEconomyClassSeats`) VALUES
(1, 'Boing 727', 'comercial', 20, 30, 40),
(2, 'Boing 737', 'comercial', 30, 40, 60),
(3, 'Boing 747', 'comercial', 100, 100, 300),
(4, 'AirBus A1', 'comercial', 100, 100, 150);

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Tell1` varchar(25) NOT NULL,
  `Tell2` varchar(25) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`Id`, `Name`, `Country`, `Address`, `Tell1`, `Tell2`, `Fax`, `Email`) VALUES
(1, 'Canada Air', 'Canada', '', '123', '', '', ''),
(2, 'KLM', '', '', '369', '', '', ''),
(3, 'British Airways', 'England', '', '987', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `airplanes`
--

CREATE TABLE IF NOT EXISTS `airplanes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `AirlineId` int(11) NOT NULL,
  `StartDateOfWork` date DEFAULT NULL,
  `AirplaneSpecificationId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_airplanes_aireplane_specifications_Id` (`AirplaneSpecificationId`),
  KEY `FK_airplanes_airlines_Id` (`AirlineId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2340 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `airplanes`
--

INSERT INTO `airplanes` (`Id`, `Name`, `AirlineId`, `StartDateOfWork`, `AirplaneSpecificationId`) VALUES
(1, 'CA-01', 1, '2010-05-12', 1),
(2, 'CA-02', 1, '2008-01-01', 2),
(3, 'KLM-01', 2, '2005-01-08', 1),
(4, 'BA-01', 3, '2000-12-04', 3),
(6, 'BA-02', 3, '2006-12-05', 4),
(7, 'CA-03', 1, '2012-12-10', 2),
(8, 'KLM-03', 2, '2012-12-19', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `airplane_view`
--
CREATE TABLE IF NOT EXISTS `airplane_view` (
`Id` int(11)
,`AirplaneName` varchar(50)
,`AirlineName` varchar(255)
,`StartDateOfWork` date
);
-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `CityId` int(11) NOT NULL,
  `Tel1` varchar(25) NOT NULL,
  `Tel2` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_airports_cities_Id` (`CityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`Id`, `Name`, `Address`, `CityId`, `Tel1`, `Tel2`, `Fax`) VALUES
(2, 'Montreal Airport', '', 1, '123', '', ''),
(9, 'Torronto', '', 2, '324', '', ''),
(10, 'Ottawa Airport', '', 3, '765', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `airport_view`
--
CREATE TABLE IF NOT EXISTS `airport_view` (
`Id` int(11)
,`AirportName` varchar(100)
,`Address` varchar(255)
,`CityName` varchar(50)
,`Tel1` varchar(25)
);
-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=819;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Authenticated', '11', NULL, 'N;'),
('Authenticated', '12', NULL, 'N;'),
('Authenticated', '27', NULL, 'N;'),
('Authenticated', '28', NULL, 'N;'),
('Authenticated', '29', NULL, 'N;'),
('Authenticated', '37', NULL, 'N;'),
('Authenticated', '39', NULL, 'N;'),
('Authenticated', '40', NULL, 'N;'),
('Authenticated', '41', NULL, 'N;'),
('Authenticated', '42', NULL, 'N;'),
('Authenticated', '43', NULL, 'N;'),
('Authenticated', '5', NULL, 'N;'),
('Authenticated', '6', NULL, 'N;'),
('Authenticated', '9', NULL, 'N;'),
('FlightOperator', '2', NULL, 'N;'),
('FlightOperator', '4', NULL, 'N;'),
('Guest', '18', NULL, 'N;'),
('HotelOperator', '3', NULL, 'N;'),
('HotelOperator', '4', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=124;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, 'Admin Role', NULL, 'N;'),
('AdminTask', 1, 'Admin Task', NULL, 'N;'),
('Airline.*', 1, NULL, NULL, 'N;'),
('Airline.Admin', 0, NULL, NULL, 'N;'),
('Airline.Create', 0, NULL, NULL, 'N;'),
('Airline.Delete', 0, NULL, NULL, 'N;'),
('Airline.Index', 0, NULL, NULL, 'N;'),
('Airline.Update', 0, NULL, NULL, 'N;'),
('Airline.View', 0, NULL, NULL, 'N;'),
('Airplane.*', 1, NULL, NULL, 'N;'),
('Airplane.Admin', 0, NULL, NULL, 'N;'),
('Airplane.Create', 0, NULL, NULL, 'N;'),
('Airplane.Delete', 0, NULL, NULL, 'N;'),
('Airplane.Index', 0, NULL, NULL, 'N;'),
('Airplane.Update', 0, NULL, NULL, 'N;'),
('Airplane.View', 0, NULL, NULL, 'N;'),
('AirPlaneSpecification.*', 1, NULL, NULL, 'N;'),
('AirPlaneSpecification.Admin', 0, NULL, NULL, 'N;'),
('AirPlaneSpecification.Create', 0, NULL, NULL, 'N;'),
('AirPlaneSpecification.Delete', 0, NULL, NULL, 'N;'),
('AirPlaneSpecification.Index', 0, NULL, NULL, 'N;'),
('AirPlaneSpecification.Update', 0, NULL, NULL, 'N;'),
('AirPlaneSpecification.View', 0, NULL, NULL, 'N;'),
('Airport.*', 1, NULL, NULL, 'N;'),
('Airport.Admin', 0, NULL, NULL, 'N;'),
('Airport.Create', 0, NULL, NULL, 'N;'),
('Airport.Delete', 0, NULL, NULL, 'N;'),
('Airport.Index', 0, NULL, NULL, 'N;'),
('Airport.Update', 0, NULL, NULL, 'N;'),
('Airport.View', 0, NULL, NULL, 'N;'),
('Authenticated', 2, 'Authenticated User', NULL, 'N;'),
('ChangeForms', 0, 'Change Forms', NULL, 'N;'),
('City.*', 1, NULL, NULL, 'N;'),
('City.Admin', 0, NULL, NULL, 'N;'),
('City.Create', 0, NULL, NULL, 'N;'),
('City.Delete', 0, NULL, NULL, 'N;'),
('City.Index', 0, NULL, NULL, 'N;'),
('City.Update', 0, NULL, NULL, 'N;'),
('City.View', 0, NULL, NULL, 'N;'),
('Client.*', 1, NULL, NULL, 'N;'),
('Client.Admin', 0, NULL, NULL, 'N;'),
('Client.Create', 0, NULL, NULL, 'N;'),
('Client.Delete', 0, NULL, NULL, 'N;'),
('Client.Index', 0, NULL, NULL, 'N;'),
('Client.Update', 0, NULL, NULL, 'N;'),
('Client.UpdateMyself', 0, NULL, NULL, 'N;'),
('Client.View', 0, NULL, NULL, 'N;'),
('Country.*', 1, NULL, NULL, 'N;'),
('Country.Admin', 0, NULL, NULL, 'N;'),
('Country.Create', 0, NULL, NULL, 'N;'),
('Country.Delete', 0, NULL, NULL, 'N;'),
('Country.Index', 0, NULL, NULL, 'N;'),
('Country.Update', 0, NULL, NULL, 'N;'),
('Country.View', 0, NULL, NULL, 'N;'),
('CreateReports', 0, 'Create Reports', NULL, 'N;'),
('CrudFlightTables', 0, 'Crud Flight Tables', NULL, 'N;'),
('CrudHisOwnInformation', 0, 'Crud His Own Information', NULL, 'N;'),
('CrudHotelTables', 0, 'Crud Hotel Tables', NULL, 'N;'),
('CrudRbacRights', 0, 'Crud Rbac Rights', NULL, 'N;'),
('Flight.*', 1, NULL, NULL, 'N;'),
('Flight.Admin', 0, NULL, NULL, 'N;'),
('Flight.Create', 0, NULL, NULL, 'N;'),
('Flight.Delete', 0, NULL, NULL, 'N;'),
('Flight.Index', 0, NULL, NULL, 'N;'),
('Flight.Update', 0, NULL, NULL, 'N;'),
('Flight.View', 0, NULL, NULL, 'N;'),
('FlightClient.*', 1, NULL, NULL, 'N;'),
('FlightClient.Admin', 0, NULL, NULL, 'N;'),
('FlightClient.Create', 0, NULL, NULL, 'N;'),
('FlightClient.Delete', 0, NULL, NULL, 'N;'),
('FlightClient.Index', 0, NULL, NULL, 'N;'),
('FlightClient.Update', 0, NULL, NULL, 'N;'),
('FlightClient.View', 0, NULL, NULL, 'N;'),
('FlightHotelOperator', 2, 'Flight Hotel Operator Role', NULL, 'N;'),
('FlightOperator', 2, 'Flight Operator Role', NULL, 'N;'),
('Guest', 2, 'Guest', NULL, 'N;'),
('Hotel.*', 1, NULL, NULL, 'N;'),
('Hotel.Admin', 0, NULL, NULL, 'N;'),
('Hotel.Create', 0, NULL, NULL, 'N;'),
('Hotel.Delete', 0, NULL, NULL, 'N;'),
('Hotel.Index', 0, NULL, NULL, 'N;'),
('Hotel.Update', 0, NULL, NULL, 'N;'),
('Hotel.View', 0, NULL, NULL, 'N;'),
('HotelOperator', 2, 'Hotel Operator Role', NULL, 'N;'),
('LoginLogout', 0, 'Login Logout', NULL, 'N;'),
('Register', 0, 'Register himself on the site', NULL, 'N;'),
('ReserveHotelAndFlights', 0, 'Reserve Hotel And Flights', NULL, 'N;'),
('Room.*', 1, NULL, NULL, 'N;'),
('Room.Admin', 0, NULL, NULL, 'N;'),
('Room.Create', 0, NULL, NULL, 'N;'),
('Room.Delete', 0, NULL, NULL, 'N;'),
('Room.Index', 0, NULL, NULL, 'N;'),
('Room.Update', 0, NULL, NULL, 'N;'),
('Room.View', 0, NULL, NULL, 'N;'),
('RoomClient.*', 1, NULL, NULL, 'N;'),
('RoomClient.Admin', 0, NULL, NULL, 'N;'),
('RoomClient.Create', 0, NULL, NULL, 'N;'),
('RoomClient.Delete', 0, NULL, NULL, 'N;'),
('RoomClient.Index', 0, NULL, NULL, 'N;'),
('RoomClient.Update', 0, NULL, NULL, 'N;'),
('RoomClient.View', 0, NULL, NULL, 'N;'),
('RoomType.*', 1, NULL, NULL, 'N;'),
('RoomType.Admin', 0, NULL, NULL, 'N;'),
('RoomType.Create', 0, NULL, NULL, 'N;'),
('RoomType.Delete', 0, NULL, NULL, 'N;'),
('RoomType.Index', 0, NULL, NULL, 'N;'),
('RoomType.Update', 0, NULL, NULL, 'N;'),
('RoomType.View', 0, NULL, NULL, 'N;'),
('SearchHotelAndFlights', 0, 'Search Hotel And Flights', NULL, 'N;'),
('Seat.*', 1, NULL, NULL, 'N;'),
('Seat.Admin', 0, NULL, NULL, 'N;'),
('Seat.Create', 0, NULL, NULL, 'N;'),
('Seat.Delete', 0, NULL, NULL, 'N;'),
('Seat.Index', 0, NULL, NULL, 'N;'),
('Seat.Update', 0, NULL, NULL, 'N;'),
('Seat.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.About', 0, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('User.Admin', 0, NULL, NULL, 'N;'),
('User.Create', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Index', 0, NULL, NULL, 'N;'),
('User.ResetPassword', 0, NULL, NULL, 'N;'),
('User.Update', 0, NULL, NULL, 'N;'),
('User.UpdateMyself', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=348;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('FlightHotelOperator', 'Airline.Admin'),
('FlightOperator', 'Airline.Admin'),
('FlightOperator', 'Airline.Create'),
('FlightOperator', 'Airline.Delete'),
('FlightOperator', 'Airline.Index'),
('FlightOperator', 'Airline.Update'),
('FlightOperator', 'Airline.View'),
('FlightOperator', 'Airplane.*'),
('FlightOperator', 'AirPlaneSpecification.*'),
('FlightOperator', 'Airport.*'),
('FlightOperator', 'Authenticated'),
('HotelOperator', 'Authenticated'),
('AdminTask', 'ChangeForms'),
('FlightOperator', 'City.*'),
('HotelOperator', 'City.*'),
('FlightOperator', 'Client.*'),
('HotelOperator', 'Client.*'),
('Authenticated', 'Client.UpdateMyself'),
('FlightOperator', 'Country.*'),
('HotelOperator', 'Country.*'),
('AdminTask', 'CreateReports'),
('FlightOperator', 'CrudFlightTables'),
('Authenticated', 'CrudHisOwnInformation'),
('HotelOperator', 'CrudHotelTables'),
('AdminTask', 'CrudRbacRights'),
('FlightOperator', 'Flight.*'),
('FlightOperator', 'FlightClient.*'),
('FlightHotelOperator', 'FlightOperator'),
('Authenticated', 'Guest'),
('HotelOperator', 'Hotel.*'),
('FlightHotelOperator', 'HotelOperator'),
('Authenticated', 'LoginLogout'),
('Guest', 'Register'),
('Authenticated', 'ReserveHotelAndFlights'),
('HotelOperator', 'Room.*'),
('HotelOperator', 'RoomClient.*'),
('HotelOperator', 'RoomType.*'),
('Guest', 'SearchHotelAndFlights'),
('FlightOperator', 'Seat.*'),
('Guest', 'Site.*'),
('Guest', 'Site.About'),
('Guest', 'Site.Contact'),
('FlightHotelOperator', 'User.Create'),
('FlightOperator', 'User.Create'),
('HotelOperator', 'User.Create'),
('Guest', 'User.ResetPassword'),
('Authenticated', 'User.UpdateMyself');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `countryId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`),
  KEY `FK_cities_countries` (`countryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Id`, `Name`, `countryId`) VALUES
(1, 'montreal', 1),
(2, 'torronto', 1),
(3, 'ottawa', 1),
(4, 'Vancouver', 1),
(5, 'Tehran', 2),
(6, 'New York', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cities_view`
--
CREATE TABLE IF NOT EXISTS `cities_view` (
`Id` int(11)
,`CityName` varchar(50)
,`CountryName` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `clientfullname_view`
--
CREATE TABLE IF NOT EXISTS `clientfullname_view` (
`ClientId` int(11)
,`FullName` varchar(390)
);
-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
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
  KEY `FK_clients_users_id` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2048 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`Id`, `Name`, `Family`, `BirthDay`, `CountryId`, `Address`, `tell`, `CreditCardType`, `CreditCardExpiryDate`, `CreditCardHolderName`, `CreditCardSecurityNumber`, `CreditCardNumber`, `Image`, `Sex`, `UserId`, `PassportNumber`, `Username`) VALUES
(1, 'kamran', 'khoshnasib fallah', '1998-10-02', 1, 'k1', '123', 'M2uUDAUu6avJrkCwO7NjvA==', 'DSPgS1hlWxqMuG22AmbYHA==', 'NFfPEIeaFjdEBNp27DF+pA==', 'tWCNgYYPyWvF/HM/ysnLeQ==', 'eKjpk8W/eTcb0Z0hrfVzaQ==', 'm3.jpg', '0', 1, 'wJsesZPVv9gFcKsOii6K5Q==', 'Admin'),
(3, 'k3', 'k3', '0000-00-00', 3, 'k3', '879', 'M2uUDAUu6avJrkCwO7NjvA==', 'YtoKfJ5UZl1vasToLxWeVA==', 'YtoKfJ5UZl1vasToLxWeVA==', 'YtoKfJ5UZl1vasToLxWeVA==', 'YtoKfJ5UZl1vasToLxWeVA==', NULL, '1', 3, 'YtoKfJ5UZl1vasToLxWeVA==', 'Hotel_Operator'),
(18, 'k4', NULL, '0000-00-00', 2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 2, NULL, 'Hotel_Flight_Operator'),
(19, 'k5', NULL, '0000-00-00', 3, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 4, NULL, 'Authenticated_User'),
(20, 'k6', NULL, '0000-00-00', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 5, NULL, 'kami'),
(22, NULL, NULL, '0000-00-00', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 9, NULL, 'n'),
(24, NULL, NULL, '0000-00-00', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 11, NULL, 'h'),
(25, 'fghyjh', 'hjghy', '1900-12-21', 1, 'bjmb', 'ghgjh', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '0SldCJ3N3o/5DA5K6MB8HQ==', '_825622', '0', 12, '4izkI/lNnccJIO2p87PHxQ==', 'hamid');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `FlagURL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=4096 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Id`, `Name`, `FlagURL`) VALUES
(1, 'Canada', 'canada.gif'),
(2, 'Iran', 'iran.png'),
(3, 'USA', 'usa.gif'),
(4, 'g4', 'g4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FlightNumber` varchar(50) NOT NULL,
  `AirlineId` int(11) NOT NULL,
  `AirplaneId` int(11) NOT NULL,
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
  KEY `fk_flights_airlines` (`AirlineId`),
  KEY `FK_flights_airplanes_Id` (`AirplaneId`),
  KEY `FK_flights_airports_Id` (`DepartureAirportId`),
  KEY `FK_flights_airports_Id2` (`DestinationAirportId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flight_clients`
--

CREATE TABLE IF NOT EXISTS `flight_clients` (
  `Id` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `FlightId` int(11) NOT NULL,
  `SeatId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_flight_clients_clients_Id` (`ClientId`),
  KEY `FK_flight_passengers` (`FlightId`),
  KEY `FK_flight_passengers_seats_Id` (`SeatId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
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
  KEY `fk_hotels_cities` (`CityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`ID`, `Name`, `Category`, `CityId`, `Tel`, `Fax`, `Address`, `URL`, `Email`, `Image`) VALUES
(9, 'Hotel1', 3, 1, NULL, NULL, NULL, NULL, 'al@yahoo.com', 'h2.jpg'),
(12, 'Hotel2', 3, 2, '123', NULL, '123', NULL, NULL, 'h3.jpg'),
(15, 'Hotel7', 3, 1, NULL, NULL, NULL, NULL, NULL, 'h4.jpg'),
(19, 'hotel19', 4, 4, NULL, NULL, NULL, NULL, '', 'hotel19'),
(20, 'hotel3', 5, 2, NULL, NULL, NULL, NULL, '', 'hotel3');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hotles_view`
--
CREATE TABLE IF NOT EXISTS `hotles_view` (
`CityName` varchar(50)
,`ID` int(11)
,`HotelName` varchar(255)
,`Category` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ReservationType` int(11) NOT NULL,
  `DepartureCity` int(11) DEFAULT NULL,
  `DestinationCity` int(11) NOT NULL,
  `DepartureTakeoffTime` datetime DEFAULT NULL,
  `DepartureLandingTime` datetime DEFAULT NULL,
  `NumberOfPassgenegrs` int(11) NOT NULL,
  `HotelId` int(11) DEFAULT NULL,
  `DepartureFlightId` int(11) DEFAULT NULL,
  `ReturnFlightId` varchar(255) DEFAULT NULL,
  `HotelCheckinDate` date DEFAULT NULL,
  `HotelCheckoutDate` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HotelId` int(11) NOT NULL,
  `RoomNumber` varchar(30) NOT NULL,
  `RoomTypeId` int(11) NOT NULL,
  `Tell` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_rooms_hotels` (`HotelId`),
  KEY `fk_rooms_roomsTypes` (`RoomTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1365 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Id`, `HotelId`, `RoomNumber`, `RoomTypeId`, `Tell`) VALUES
(2, 12, '3', 1, '123'),
(4, 9, '2', 3, '1245'),
(7, 9, '5', 1, '1234'),
(8, 12, '7', 2, '741'),
(9, 12, 'a1', 1, '123'),
(10, 12, 'a2', 1, '2'),
(11, 12, 'a3', 1, '3'),
(12, 20, 'b1', 1, '1'),
(13, 20, 'b2', 1, '3'),
(14, 9, '1', 2, '123'),
(16, 9, '3', 4, '345'),
(17, 9, '4', 5, '987'),
(18, 15, '71', 1, '123'),
(19, 15, '72', 5, '432'),
(20, 15, '73', 2, '54'),
(21, 15, '74', 3, '124'),
(22, 15, '75', 4, '221');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rooms_view`
--
CREATE TABLE IF NOT EXISTS `rooms_view` (
`Id` int(11)
,`HotelName` varchar(255)
,`RoomTypeName` varchar(50)
,`RoomNumber` varchar(30)
,`Tell` varchar(25)
);
-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE IF NOT EXISTS `roomtypes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Capacity` int(2) NOT NULL,
  `PricePerDay` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`Id`, `Name`, `Capacity`, `PricePerDay`) VALUES
(1, 'Single', 1, '100'),
(2, 'double', 2, '150'),
(3, 'Double King', 2, '200'),
(4, 'Triple', 3, '220'),
(5, 'Suit', 4, '250');

-- --------------------------------------------------------

--
-- Table structure for table `room_clients`
--

CREATE TABLE IF NOT EXISTS `room_clients` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RoomId` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_room_clients_clients_Id` (`ClientId`),
  KEY `FK_room_clients_rooms_Id` (`RoomId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1489 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `room_clients`
--

INSERT INTO `room_clients` (`Id`, `RoomId`, `ClientId`, `StartDate`, `EndDate`, `Status`) VALUES
(2, 2, 1, '2012-12-05', '2012-12-07', 'Reserved'),
(7, 4, 1, '2013-01-02', '2013-01-11', 'Reserved'),
(8, 4, 1, '2013-01-12', '2013-01-14', 'Reserved'),
(10, 4, 3, '2013-01-15', '2013-01-22', 'Cancelation Request'),
(15, 4, 1, '2013-01-30', '2013-01-31', 'Reserved'),
(16, 4, 1, '2013-01-24', '2013-01-25', 'Reservation Request'),
(18, 7, 3, '2013-01-03', '2013-01-09', 'Reserved'),
(19, 16, 3, '2013-01-03', '2013-01-15', 'Reserved'),
(20, 16, 25, '2013-01-17', '2013-01-21', 'Reserved'),
(21, 7, 1, '2013-01-16', '2013-01-20', 'Reserved'),
(25, 2, 1, '2013-01-09', '2013-01-10', 'Cancelation Request');

-- --------------------------------------------------------

--
-- Stand-in structure for view `search4emptyroom_view`
--
CREATE TABLE IF NOT EXISTS `search4emptyroom_view` (
`RoomId` int(11)
,`RoomNumber` varchar(30)
,`HotelName` varchar(255)
,`HotelCategory` int(11)
,`HotelTel` varchar(20)
,`CityName` varchar(50)
,`RoomType` varchar(50)
,`PricePerDay` decimal(10,0)
,`CheckinDate` date
,`CheckoutDate` date
,`RoomStatus` varchar(50)
,`HotelAddress` varchar(255)
,`HotelImage` varchar(100)
,`RoomCapacity` int(2)
,`HotelId` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `searchhotel_view`
--
CREATE TABLE IF NOT EXISTS `searchhotel_view` (
`HotelName` varchar(255)
,`HotelCategory` int(11)
,`HotelTel` varchar(20)
,`HotelFax` varchar(20)
,`HotelAddress` varchar(255)
,`HotelEmail` varchar(100)
,`HotelImage` varchar(100)
,`RoomNumber` varchar(30)
,`RoomTel` varchar(25)
,`RoomClientId` int(11)
,`StartDate` date
,`EndDate` date
,`Status` varchar(50)
,`ClientName` varchar(50)
,`ClientId` int(11)
,`ClientFamily` varchar(70)
,`ClientBirthDay` date
,`ClientAddress` varchar(200)
,`ClientTel` varchar(20)
,`ClientEmail` varchar(256)
,`ClientUsername` varchar(256)
,`CityName` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SeatNumber` varchar(20) NOT NULL,
  `SeatType` varchar(25) NOT NULL,
  `AirplaneSpecId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_seats_aireplane_specifications_Id` (`AirplaneSpecId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`Id`, `SeatNumber`, `SeatType`, `AirplaneSpecId`) VALUES
(1, 'a1', 'BusinessClass', 1),
(2, 'a2', 'FirstClass', 1),
(3, 'a3', 'BusinessClass', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seats_view`
--
CREATE TABLE IF NOT EXISTS `seats_view` (
`Id` int(11)
,`SeatNumber` varchar(20)
,`SeatType` varchar(25)
,`AirplaneType` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=1820 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `last_login_time`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'admin@notanaddress.com', 'Admin', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', NULL, '2012-11-15 21:34:02', 1, '2012-11-15 21:34:02', 1),
(2, 'flight@notanaddress.com', 'Flight_Operator', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(3, 'hotel@notanaddress.com', 'Hotel_Operator', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', '2012-11-16 14:05:55', '0000-00-00 00:00:00', 1, '2012-12-28 00:32:16', NULL),
(4, 'hotel_flight@yahoo.com', 'Hotel_Flight_Operator', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', NULL, '2012-12-27 23:47:04', 1, '2012-12-27 23:47:04', 1),
(5, 'user@notanaddress.com', 'Authenticated_User', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', NULL, NULL, NULL, NULL, NULL),
(8, 'kami@m.com', 'kami', '9f54acdb1e6e10fa8442dd44e88558ee5cc2f133d14e85a38861c7b539575e1a', NULL, '2013-01-01 12:10:56', 1, '2013-01-01 12:10:56', 1),
(9, 'n@n.com', 'n', '4e8388879bd6ed262a107a3b0b435986090869591c4314fbba97a2d8f2a7175b', NULL, '2013-01-01 12:15:25', 1, '2013-01-01 12:15:25', 1),
(11, 'h@wws.vom', 'h', '459047bbcf121ae3e06328bfb7322bab6721cc372d505a8f3c660cb7c8bd131d', NULL, '2013-01-01 15:02:28', NULL, '2013-01-01 15:02:28', NULL),
(12, 'hani@fgyh.com', 'hamid', '459047bbcf121ae3e06328bfb7322bab6721cc372d505a8f3c660cb7c8bd131d', NULL, '2013-01-03 18:11:51', NULL, '2013-01-03 18:11:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_operators`
--

CREATE TABLE IF NOT EXISTS `website_operators` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Family` varchar(70) DEFAULT NULL,
  `Tell` varchar(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Passoword` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `website_users`
--

CREATE TABLE IF NOT EXISTS `website_users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Family` varchar(70) DEFAULT NULL,
  `Tell` varchar(20) DEFAULT NULL,
  `PassportNumber` varchar(50) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Passoword` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `CreditCradType` varchar(20) DEFAULT NULL,
  `CreditCardNumber` varchar(100) DEFAULT NULL,
  `CreditCardSecurityNumber` varchar(100) DEFAULT NULL,
  `PassportExpiry` datetime DEFAULT NULL,
  `CreditCardExpiry` varchar(100) DEFAULT NULL,
  `CreditCardHolderName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `PassportNumber` (`PassportNumber`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure for view `airplane_view`
--
DROP TABLE IF EXISTS `airplane_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `airplane_view` AS select `airplanes`.`Id` AS `Id`,`airplanes`.`Name` AS `AirplaneName`,`airlines`.`Name` AS `AirlineName`,`airplanes`.`StartDateOfWork` AS `StartDateOfWork` from (`airplanes` join `airlines` on((`airplanes`.`AirlineId` = `airlines`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `airport_view`
--
DROP TABLE IF EXISTS `airport_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `airport_view` AS select `airports`.`Id` AS `Id`,`airports`.`Name` AS `AirportName`,`airports`.`Address` AS `Address`,`cities`.`Name` AS `CityName`,`airports`.`Tel1` AS `Tel1` from (`airports` join `cities` on((`airports`.`CityId` = `cities`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `cities_view`
--
DROP TABLE IF EXISTS `cities_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `cities_view` AS select `cities`.`Id` AS `Id`,`cities`.`Name` AS `CityName`,`countries`.`Name` AS `CountryName` from (`cities` join `countries` on((`cities`.`countryId` = `countries`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `clientfullname_view`
--
DROP TABLE IF EXISTS `clientfullname_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `clientfullname_view` AS select `clients`.`Id` AS `ClientId`,concat(`clients`.`Name`,' ',`clients`.`Family`,', username = ',convert(`users`.`username` using utf8)) AS `FullName` from (`clients` join `users` on((`clients`.`UserId` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `hotles_view`
--
DROP TABLE IF EXISTS `hotles_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `hotles_view` AS select `cities`.`Name` AS `CityName`,`hotels`.`ID` AS `ID`,`hotels`.`Name` AS `HotelName`,`hotels`.`Category` AS `Category` from (`hotels` join `cities` on((`hotels`.`CityId` = `cities`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `rooms_view`
--
DROP TABLE IF EXISTS `rooms_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `rooms_view` AS select `rooms`.`Id` AS `Id`,`hotels`.`Name` AS `HotelName`,`roomtypes`.`Name` AS `RoomTypeName`,`rooms`.`RoomNumber` AS `RoomNumber`,`rooms`.`Tell` AS `Tell` from ((`rooms` join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `roomtypes` on((`rooms`.`RoomTypeId` = `roomtypes`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `search4emptyroom_view`
--
DROP TABLE IF EXISTS `search4emptyroom_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `search4emptyroom_view` AS select `rooms`.`Id` AS `RoomId`,`rooms`.`RoomNumber` AS `RoomNumber`,`hotels`.`Name` AS `HotelName`,`hotels`.`Category` AS `HotelCategory`,`hotels`.`Tel` AS `HotelTel`,`cities`.`Name` AS `CityName`,`roomtypes`.`Name` AS `RoomType`,`roomtypes`.`PricePerDay` AS `PricePerDay`,`room_clients`.`StartDate` AS `CheckinDate`,`room_clients`.`EndDate` AS `CheckoutDate`,`room_clients`.`Status` AS `RoomStatus`,`hotels`.`Address` AS `HotelAddress`,`hotels`.`Image` AS `HotelImage`,`roomtypes`.`Capacity` AS `RoomCapacity`,`hotels`.`ID` AS `HotelId` from ((((`room_clients` join `rooms` on((`room_clients`.`RoomId` = `rooms`.`Id`))) join `roomtypes` on((`rooms`.`RoomTypeId` = `roomtypes`.`Id`))) join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `cities` on((`hotels`.`CityId` = `cities`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `searchhotel_view`
--
DROP TABLE IF EXISTS `searchhotel_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `searchhotel_view` AS select `hotels`.`Name` AS `HotelName`,`hotels`.`Category` AS `HotelCategory`,`hotels`.`Tel` AS `HotelTel`,`hotels`.`Fax` AS `HotelFax`,`hotels`.`Address` AS `HotelAddress`,`hotels`.`Email` AS `HotelEmail`,`hotels`.`Image` AS `HotelImage`,`rooms`.`RoomNumber` AS `RoomNumber`,`rooms`.`Tell` AS `RoomTel`,`room_clients`.`Id` AS `RoomClientId`,`room_clients`.`StartDate` AS `StartDate`,`room_clients`.`EndDate` AS `EndDate`,`room_clients`.`Status` AS `Status`,`clients`.`Name` AS `ClientName`,`clients`.`Id` AS `ClientId`,`clients`.`Family` AS `ClientFamily`,`clients`.`BirthDay` AS `ClientBirthDay`,`clients`.`Address` AS `ClientAddress`,`clients`.`tell` AS `ClientTel`,`users`.`email` AS `ClientEmail`,`users`.`username` AS `ClientUsername`,`cities`.`Name` AS `CityName` from (((((`room_clients` join `clients` on((`room_clients`.`ClientId` = `clients`.`Id`))) join `users` on((`clients`.`UserId` = `users`.`id`))) join `rooms` on((`room_clients`.`RoomId` = `rooms`.`Id`))) join `hotels` on((`rooms`.`HotelId` = `hotels`.`ID`))) join `cities` on((`hotels`.`CityId` = `cities`.`Id`)));

-- --------------------------------------------------------

--
-- Structure for view `seats_view`
--
DROP TABLE IF EXISTS `seats_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`khpec`@`localhost` SQL SECURITY DEFINER VIEW `seats_view` AS select `seats`.`Id` AS `Id`,`seats`.`SeatNumber` AS `SeatNumber`,`seats`.`SeatType` AS `SeatType`,`aireplane_specifications`.`Name` AS `AirplaneType` from (`seats` join `aireplane_specifications` on((`seats`.`AirplaneSpecId` = `aireplane_specifications`.`Id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airplanes`
--
ALTER TABLE `airplanes`
  ADD CONSTRAINT `FK_airplanes_aireplane_specifications_Id` FOREIGN KEY (`AirplaneSpecificationId`) REFERENCES `aireplane_specifications` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_airplanes_airlines_Id` FOREIGN KEY (`AirlineId`) REFERENCES `airlines` (`Id`);

--
-- Constraints for table `airports`
--
ALTER TABLE `airports`
  ADD CONSTRAINT `FK_airports_cities_Id` FOREIGN KEY (`CityId`) REFERENCES `cities` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `FK_cities_countries` FOREIGN KEY (`countryId`) REFERENCES `countries` (`Id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `FK_clients_countries_Id` FOREIGN KEY (`CountryId`) REFERENCES `countries` (`Id`),
  ADD CONSTRAINT `FK_clients_users_id` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `fk_flights_airlines` FOREIGN KEY (`AirlineId`) REFERENCES `airlines` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_flights_airplanes_Id` FOREIGN KEY (`AirplaneId`) REFERENCES `airplanes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_flights_airports_Id` FOREIGN KEY (`DepartureAirportId`) REFERENCES `airports` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_flights_airports_Id2` FOREIGN KEY (`DestinationAirportId`) REFERENCES `airports` (`Id`);

--
-- Constraints for table `flight_clients`
--
ALTER TABLE `flight_clients`
  ADD CONSTRAINT `FK_flight_clients_clients_Id` FOREIGN KEY (`ClientId`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_flight_passengers` FOREIGN KEY (`FlightId`) REFERENCES `flights` (`Id`),
  ADD CONSTRAINT `FK_flight_passengers_seats_Id` FOREIGN KEY (`SeatId`) REFERENCES `seats` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `fk_hotels_cities` FOREIGN KEY (`CityId`) REFERENCES `cities` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_hotels` FOREIGN KEY (`HotelId`) REFERENCES `hotels` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rooms_roomsTypes` FOREIGN KEY (`RoomTypeId`) REFERENCES `roomtypes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_clients`
--
ALTER TABLE `room_clients`
  ADD CONSTRAINT `FK_room_clients_clients_Id` FOREIGN KEY (`ClientId`) REFERENCES `clients` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_room_clients_rooms_Id` FOREIGN KEY (`RoomId`) REFERENCES `rooms` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `FK_seats_aireplane_specifications_Id` FOREIGN KEY (`AirplaneSpecId`) REFERENCES `aireplane_specifications` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
