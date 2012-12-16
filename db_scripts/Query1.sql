SELECT hotel_clients.Name
     , hotel_clients.Family
     , flight_passengers.Name
     , flight_passengers.Family
     , hotels.name
     , hotels.category
     , flightes.DestinationId
     , flightes.DepartureId
     , cities.Name
     , airplane.Name
     , airplane.specificationId
     , aireplane_specifications.Type
     , aireplane_specifications.Name
FROM
  airplane
INNER JOIN aireplane_specifications
ON airplane.specificationId = aireplane_specifications.Id
INNER JOIN flightes
ON flightes.Id = airplane.FlightId
INNER JOIN cities
ON cities.Id = flightes.DepartureId
INNER JOIN flight_passengers
ON flightes.Id = flight_passengers.FlightId
INNER JOIN hotels
ON cities.Id = hotels.CityId
INNER JOIN hotel_clients
ON hotels.ID = hotel_clients.HotelId