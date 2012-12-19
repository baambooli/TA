SELECT hotel_clients.Name AS a
     , hotel_clients.Family AS b
     , flight_passengers.Name AS c
     , flight_passengers.Family AS d
     , hotels.name AS e
     , hotels.category AS f
     , flights.DestinationId AS g
     , flights.DepartureId AS h
     , cities_destination.Name AS i
     , airplane.Name AS j
     , airplane.specificationId AS k
     , aireplane_specifications.Type AS l
     , aireplane_specifications.Name AS m
     , cities_departure.Name AS n
     , airlines.Name AS o
FROM
  airplane
INNER JOIN aireplane_specifications
ON airplane.specificationId = aireplane_specifications.Id
INNER JOIN flights
ON flights.Id = airplane.FlightId
INNER JOIN flight_passengers
ON flights.Id = flight_passengers.FlightId
INNER JOIN cities cities_departure
ON cities_departure.Id = flights.DepartureId
INNER JOIN cities cities_destination
ON cities_destination.Id = flights.DestinationId
INNER JOIN hotels
ON cities_destination.Id = hotels.CityId
INNER JOIN hotel_clients
ON hotels.ID = hotel_clients.HotelId
INNER JOIN airlines
ON airplane.AirlineName = airlines.Name