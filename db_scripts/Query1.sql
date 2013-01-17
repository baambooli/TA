SELECT seats.Id
     , seats.SeatNumber
     , seats.SeatType
     , flights.Id
     , flights.FlightNumber
     , flight_clients.SeatId
FROM
  seats
INNER JOIN aireplane_specifications
ON seats.AirplaneSpecId = aireplane_specifications.Id
INNER JOIN airplanes
ON airplanes.AirplaneSpecificationId = aireplane_specifications.Id
INNER JOIN flights
ON flights.AirplaneId = airplanes.Id
LEFT OUTER JOIN flight_clients
ON flight_clients.FlightId = flights.Id
WHERE
  (flight_clients.SeatId <> seats.Id)