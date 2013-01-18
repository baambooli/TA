SELECT `seats`.`Id` AS `SeatId`
     , `seats`.`SeatNumber` AS `SeatNumber`
     , `seats`.`SeatType` AS `SeatType`
     , `flights`.`Id` AS `FlightId`
     , `flights`.`FlightNumber` AS `FlightNumber`
FROM
  (((`seats`
JOIN `aireplane_specifications`
ON ((`seats`.`AirplaneSpecId` = `aireplane_specifications`.`Id`)))
JOIN `airplanes`
ON ((`airplanes`.`AirplaneSpecificationId` = `aireplane_specifications`.`Id`)))
JOIN `flights`
ON ((`flights`.`AirplaneId` = `airplanes`.`Id`)))
where ( (FlightId = 2) AND 
  (SeatId NOT IN (SELECT `flight_clients`.`SeatId` FROM
  `flight_clients`
WHERE
  `flight_clients`.`FlightId` = 2)))
