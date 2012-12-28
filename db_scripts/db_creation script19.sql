-- Script was generated by Devart dbForge Studio for MySQL, Version 5.0.97.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 12/28/2012 1:25:27 AM
-- Server version: 5.5.16
-- Client version: 4.1

USE travelagency;

CREATE TABLE aireplane_specifications(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) NOT NULL,
  Type VARCHAR(50) NOT NULL,
  NoOfFirstClassSeats INT(11) NOT NULL,
  NoOfBusinessClassSeats INT(11) NOT NULL,
  NoOfEconomyClassSeats INT(11) NOT NULL,
  PRIMARY KEY (Id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE airlines(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(255) NOT NULL,
  Country VARCHAR(255) DEFAULT NULL,
  Address VARCHAR(255) DEFAULT NULL,
  Tell1 VARCHAR(25) NOT NULL,
  Tell2 VARCHAR(25) DEFAULT NULL,
  Fax VARCHAR(255) DEFAULT NULL,
  Email VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (Id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE authitem(
  name VARCHAR(64) NOT NULL,
  type INT(11) NOT NULL,
  description TEXT DEFAULT NULL,
  bizrule TEXT DEFAULT NULL,
  `data` TEXT DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE countries(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) NOT NULL,
  FlagURL VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX Name (Name)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE roles(
  Id INT(11) NOT NULL,
  Name VARCHAR(50) DEFAULT NULL,
  groupId INT(11) DEFAULT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX groupId (groupId)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE roomtypes(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) NOT NULL,
  Capacity INT(2) NOT NULL,
  PricePerDay DECIMAL(10, 0) NOT NULL,
  PRIMARY KEY (Id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE users(
  id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(256) NOT NULL,
  username VARCHAR(256) DEFAULT NULL,
  `password` VARCHAR(256) DEFAULT NULL,
  last_login_time DATETIME DEFAULT NULL,
  create_time DATETIME DEFAULT NULL,
  create_user_id INT(11) DEFAULT NULL,
  update_time DATETIME DEFAULT NULL,
  update_user_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE website_operators(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) DEFAULT NULL,
  Family VARCHAR(70) DEFAULT NULL,
  Tell VARCHAR(20) DEFAULT NULL,
  Address VARCHAR(200) DEFAULT NULL,
  Username VARCHAR(50) DEFAULT NULL,
  Passoword VARCHAR(100) DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX email (email),
  UNIQUE INDEX Username (Username)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE website_users(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) DEFAULT NULL,
  Family VARCHAR(70) DEFAULT NULL,
  Tell VARCHAR(20) DEFAULT NULL,
  PassportNumber VARCHAR(50) DEFAULT NULL,
  Address VARCHAR(200) DEFAULT NULL,
  Username VARCHAR(50) DEFAULT NULL,
  Passoword VARCHAR(100) DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  CreditCradType VARCHAR(20) DEFAULT NULL,
  CreditCardNumber VARCHAR(100) DEFAULT NULL,
  CreditCardSecurityNumber VARCHAR(100) DEFAULT NULL,
  PassportExpiry DATETIME DEFAULT NULL,
  CreditCardExpiry VARCHAR(100) DEFAULT NULL,
  CreditCardHolderName VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX email (email),
  UNIQUE INDEX PassportNumber (PassportNumber),
  UNIQUE INDEX Username (Username)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE airplanes(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) DEFAULT NULL,
  AirlineId INT(11) NOT NULL,
  StartDateOfWork DATE DEFAULT NULL,
  AirplaneSpecificationId INT(11) NOT NULL,
  PRIMARY KEY (Id),
  CONSTRAINT FK_airplanes_aireplane_specifications_Id FOREIGN KEY (AirplaneSpecificationId)
  REFERENCES aireplane_specifications (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_airplanes_airlines_Id FOREIGN KEY (AirlineId)
  REFERENCES airlines (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 2340
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE authassignment(
  itemname VARCHAR(64) NOT NULL,
  userid VARCHAR(64) NOT NULL,
  bizrule TEXT DEFAULT NULL,
  `data` TEXT DEFAULT NULL,
  PRIMARY KEY (itemname, userid),
  CONSTRAINT authassignment_ibfk_1 FOREIGN KEY (itemname)
  REFERENCES authitem (name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE authitemchild(
  parent VARCHAR(64) NOT NULL,
  child VARCHAR(64) NOT NULL,
  PRIMARY KEY (parent, child),
  INDEX child (child),
  CONSTRAINT authitemchild_ibfk_1 FOREIGN KEY (parent)
  REFERENCES authitem (name) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT authitemchild_ibfk_2 FOREIGN KEY (child)
  REFERENCES authitem (name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE cities(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) NOT NULL,
  countryId INT(11) NOT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX Name (Name),
  CONSTRAINT FK_cities_countries FOREIGN KEY (countryId)
  REFERENCES countries (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE clients(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(50) DEFAULT NULL,
  Family VARCHAR(70) DEFAULT NULL,
  BirthDay DATE NOT NULL,
  CountryId INT(11) NOT NULL,
  Address VARCHAR(200) DEFAULT NULL,
  tell VARCHAR(20) NOT NULL,
  PassportNumber VARCHAR(50) NOT NULL,
  CreditCardType VARCHAR(255) DEFAULT NULL,
  CreditCardExpiryDate VARCHAR(255) DEFAULT NULL,
  CreditCardHolderName VARCHAR(255) DEFAULT NULL,
  CreditCardSecurityNumber VARCHAR(255) DEFAULT NULL,
  CreditCardNumber VARCHAR(255) DEFAULT NULL,
  Email VARCHAR(50) DEFAULT NULL,
  Image VARCHAR(100) DEFAULT NULL,
  Sex VARCHAR(10) NOT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX PassportNumber (PassportNumber),
  CONSTRAINT FK_clients_countries_Id FOREIGN KEY (CountryId)
  REFERENCES countries (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 1638
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE rights(
  itemname VARCHAR(64) NOT NULL,
  type INT(11) NOT NULL,
  weight INT(11) NOT NULL,
  PRIMARY KEY (itemname),
  CONSTRAINT rights_ibfk_1 FOREIGN KEY (itemname)
  REFERENCES authitem (name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE seats(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  SeatNumber VARCHAR(20) NOT NULL,
  SeatType VARCHAR(25) NOT NULL,
  AirplaneSpecId INT(11) NOT NULL,
  PRIMARY KEY (Id),
  CONSTRAINT FK_seats_aireplane_specifications_Id FOREIGN KEY (AirplaneSpecId)
  REFERENCES aireplane_specifications (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE airports(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(100) DEFAULT NULL,
  Address VARCHAR(255) DEFAULT NULL,
  CityId INT(11) NOT NULL,
  Tel1 VARCHAR(25) NOT NULL,
  Tel2 VARCHAR(255) DEFAULT NULL,
  Fax VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Id),
  CONSTRAINT FK_airports_cities_Id FOREIGN KEY (CityId)
  REFERENCES cities (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE hotels(
  ID INT(11) NOT NULL AUTO_INCREMENT,
  Name VARCHAR(255) NOT NULL,
  Category INT(11) NOT NULL,
  CityId INT(11) NOT NULL,
  Tel VARCHAR(20) DEFAULT NULL,
  Fax VARCHAR(20) DEFAULT NULL,
  Address VARCHAR(255) DEFAULT NULL,
  URL VARCHAR(100) DEFAULT NULL,
  Email VARCHAR(100) DEFAULT NULL,
  Image VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (ID),
  UNIQUE INDEX Name (Name),
  CONSTRAINT fk_hotels_cities FOREIGN KEY (CityId)
  REFERENCES cities (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 20
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE flights(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  FlightNumber VARCHAR(50) NOT NULL,
  AirlineId INT(11) NOT NULL,
  AirplaneId INT(11) NOT NULL,
  TakeoffTime TIME NOT NULL,
  TakeoffDate DATE NOT NULL,
  LandingTime TIME NOT NULL,
  LandingDate DATE NOT NULL,
  DepartureAirportId INT(11) NOT NULL,
  DestinationAirportId INT(11) NOT NULL,
  PriceOfFirstClassSeats DOUBLE(10, 0) NOT NULL,
  PriceOfBusinessClassSeats DOUBLE(10, 0) NOT NULL,
  PriceOfEconomyClassSeats DOUBLE(10, 0) NOT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX FlightNumber (FlightNumber),
  CONSTRAINT fk_flights_airlines FOREIGN KEY (AirlineId)
  REFERENCES airlines (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_flights_airplanes_Id FOREIGN KEY (AirplaneId)
  REFERENCES airplanes (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_flights_airports_Id FOREIGN KEY (DepartureAirportId)
  REFERENCES airports (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_flights_airports_Id2 FOREIGN KEY (DestinationAirportId)
  REFERENCES airports (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE rooms(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  HotelId INT(11) NOT NULL,
  RoomNumber VARCHAR(20) NOT NULL,
  RoomTypeId INT(11) NOT NULL,
  Tell VARCHAR(25) NOT NULL,
  PRIMARY KEY (Id),
  UNIQUE INDEX RoomNumber (RoomNumber),
  CONSTRAINT fk_rooms_hotels FOREIGN KEY (HotelId)
  REFERENCES hotels (ID) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_rooms_roomsTypes FOREIGN KEY (RoomTypeId)
  REFERENCES roomtypes (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE flight_clients(
  Id INT(11) NOT NULL,
  ClientId INT(11) NOT NULL,
  FlightId INT(11) NOT NULL,
  SeatId INT(11) NOT NULL,
  PRIMARY KEY (Id),
  CONSTRAINT FK_flight_clients_clients_Id FOREIGN KEY (ClientId)
  REFERENCES clients (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_flight_passengers FOREIGN KEY (FlightId)
  REFERENCES flights (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_flight_passengers_seats_Id FOREIGN KEY (SeatId)
  REFERENCES seats (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE room_clients(
  Id INT(11) NOT NULL AUTO_INCREMENT,
  RoomId INT(11) NOT NULL,
  ClientId INT(11) NOT NULL,
  StartDate DATE NOT NULL,
  EndDate DATE NOT NULL,
  PRIMARY KEY (Id),
  CONSTRAINT FK_room_clients_clients_Id FOREIGN KEY (ClientId)
  REFERENCES clients (Id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_room_clients_rooms_Id FOREIGN KEY (RoomId)
  REFERENCES rooms (Id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
VIEW airplane_view
AS
SELECT `airplanes`.`Id` AS `Id`
     , `airplanes`.`Name` AS `AirplaneName`
     , `airlines`.`Name` AS `AirlineName`
     , `airplanes`.`StartDateOfWork` AS `StartDateOfWork`
FROM
  (`airplanes`
JOIN `airlines`
ON ((`airplanes`.`AirlineId` = `airlines`.`Id`)));

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
VIEW airport_view
AS
SELECT `airports`.`Id` AS `Id`
     , `airports`.`Name` AS `AirportName`
     , `airports`.`Address` AS `Address`
     , `cities`.`Name` AS `CityName`
     , `airports`.`Tel1` AS `Tel1`
FROM
  (`airports`
JOIN `cities`
ON ((`airports`.`CityId` = `cities`.`Id`)));

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
VIEW cities_view
AS
SELECT `cities`.`Id` AS `Id`
     , `cities`.`Name` AS `CityName`
     , `countries`.`Name` AS `CountryName`
FROM
  (`cities`
JOIN `countries`
ON ((`cities`.`countryId` = `countries`.`Id`)));

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
VIEW hotles_view
AS
SELECT `cities`.`Name` AS `CityName`
     , `hotels`.`ID` AS `ID`
     , `hotels`.`Name` AS `HotelName`
     , `hotels`.`Category` AS `Category`
FROM
  (`hotels`
JOIN `cities`
ON ((`hotels`.`CityId` = `cities`.`Id`)));

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
VIEW rooms_view
AS
SELECT `rooms`.`Id` AS `Id`
     , `hotels`.`Name` AS `HotelName`
     , `roomtypes`.`Name` AS `RoomTypeName`
     , `rooms`.`RoomNumber` AS `RoomNumber`
     , `rooms`.`Tell` AS `Tell`
FROM
  ((`rooms`
JOIN `hotels`
ON ((`rooms`.`HotelId` = `hotels`.`ID`)))
JOIN `roomtypes`
ON ((`rooms`.`RoomTypeId` = `roomtypes`.`Id`)));

CREATE OR REPLACE
DEFINER = 'root'@'localhost'
VIEW seats_view
AS
SELECT `seats`.`Id` AS `Id`
     , `seats`.`SeatNumber` AS `SeatNumber`
     , `seats`.`SeatType` AS `SeatType`
     , `aireplane_specifications`.`Name` AS `AirplaneType`
FROM
  (`seats`
JOIN `aireplane_specifications`
ON ((`seats`.`AirplaneSpecId` = `aireplane_specifications`.`Id`)));