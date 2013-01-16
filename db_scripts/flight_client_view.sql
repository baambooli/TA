SELECT seats.Id AS SeatId
     , seats.SeatNumber AS SeatNumber
     , seats.SeatType AS SeatType
     , aireplane_specifications.Name AS Aireplane_specificationsName
     , airplanes.Name AS AirplaneName
     , airlines.Name AS AirlineName
     , airlines.Country AS AirlineCountry
     , airlines.Tell1 AS AirlineTel
     , flights.FlightNumber AS FlightNumber
     , flights.Id AS FlightId
     , flights.TakeoffTime AS TakeoffTime
     , flights.TakeoffDate AS TakeoffDate
     , flights.LandingTime AS LandingTime
     , flights.LandingDate AS LandingDate
     , dest_cities.Name AS DestinationCityName
     , dest_airports.Name AS DestinationAirportName
     , dest_airports.Address AS DestinationAirportAddress
     , dest_airports.Tel1 AS DestinationAirportTel
     , dep_cities.Name AS DepartureCityName
     , dep_airport.Name AS DepartureAirportName
     , dep_airport.Address AS DepartureAirportAddress
     , dep_airport.Tel1 AS DepartureAirportTel
     , flight_clients.Id
     , clients.Name
     , clients.Family
     , clients.Sex
     , clients.PassportNumber
     , clients.Username
     , aireplane_specifications.Type
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