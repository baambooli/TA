SELECT hotel_clients.Name
     , hotel_clients.Family
     , flight_passengers.Name
     , flight_passengers.Family
     , hotels.name
     , hotels.category
     , flights.DestinationId
     , flights.DepartureId
     , cities_destination.Name
     , airplane.Name
     , airplane.specificationId
     , aireplane_specifications.Type
     , aireplane_specifications.Name
     , cities_departure.Name
FROM
  airplane
INNER JOIN aireplane_specifications
ON airplane.specificationId = aireplane_specifications.Id
INNER JOIN flightes flights
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