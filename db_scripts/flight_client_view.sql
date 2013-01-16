SELECT seats.Id
     , seats.SeatNumber
     , seats.SeatType
     , aireplane_specifications.Name
     , airplanes.Name
     , airlines.Name
     , airlines.Country
     , airlines.Tell1
     , flights.FlightNumber
     , flights.Id
     , flights.TakeoffTime
     , flights.TakeoffDate
     , flights.LandingTime
     , flights.LandingDate
     , dest_cities.Name
     , dest_airports.Name
     , dest_airports.Address
     , dest_airports.Tel1
     , dep_cities.Name
     , dep_airport.Name
     , dep_airport.Address
     , dep_airport.Tel1
FROM
  flight_clients
INNER JOIN clients
ON flight_clients.ClientId = clients.Id
INNER JOIN flights
ON flight_clients.FlightId = flights.Id
INNER JOIN airplanes
ON flights.AirplaneId = airplanes.Id
INNER JOIN aireplane_specifications
ON airplanes.AirplaneSpecificationId = aireplane_specifications.Id
INNER JOIN airlines
ON airplanes.AirlineId = airlines.Id
INNER JOIN seats
ON flight_clients.SeatId = seats.Id AND seats.AirplaneSpecId = aireplane_specifications.Id
INNER JOIN airports dep_airport
ON flights.DepartureAirportId = dep_airport.Id
INNER JOIN cities dep_cities
ON dep_airport.CityId = dep_cities.Id
INNER JOIN airports dest_airports
ON flights.DestinationAirportId = dest_airports.Id
INNER JOIN cities dest_cities
ON dest_airports.CityId = dest_cities.Id