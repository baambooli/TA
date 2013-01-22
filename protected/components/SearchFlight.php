<?php

class SearchFlight
{

    public static function findEmptyFlights(SearchFlightForm $searchFlightForm)
    {
        if ($searchFlightForm->type == 'ONE_WAY')
        {
            return self::showOneWayFlights($searchFlightForm);
        }
        elseif ($searchFlightForm->type == 'TWO_WAYS')
        {

        }
        else
        {
            echo json_encode(array('ERROR' => 'ERROR in type of flight.'));
            return false;
        }
    }

    private static function showOneWayFlights($searchFlightForm)
    {
        $flights = NULL;
        self::getFlights($searchFlightForm, $flights);
         
        // find empty seats in each flight
        $emptySeats = array();
        foreach ($flights as $flight)
        {
            $emptySeats1 = AllSeatsOfFlightView::findEmptySeatsOfTheFlight($flight->Id);
            foreach ($emptySeats1 as $emptySeat)
            {
                $price = self::getPrice($emptySeat);

                // create unique identifier for the row -->  'FlightId,SeatId'
                $id = $emptySeat->FlightId . ',' . $emptySeat->SeatId;

                $emptySeats[] = array(
                    'FlightNumber' => $emptySeat->FlightNumber,
                    'SeatNumber' => $emptySeat->SeatNumber,
                    'SeatType' => $emptySeat->SeatType,
                    'TakeoffDate' => $emptySeat->TakeoffDate,
                    'TakeoffTime' => $emptySeat->TakeoffTime,
                    'LandingDate' => $emptySeat->LandingDate,
                    'LandingTime' => $emptySeat->LandingTime,
                    'Price' => $price,
                    'Reserve' => "<input type='checkbox' value='{$id}' name='reserveFlight'>",
                );
            }
        }

        echo json_encode($emptySeats);
        return true;
    }

    private static function getFlights($searchFlightForm, &$flights)
    {
        // find departure airportId
        $departureAirport = Airport::model()->findByAttributes(array(
            'Name' => $searchFlightForm->departuteAirport
                ));

        if (empty($departureAirport))
        {
            echo json_encode(array('ERROR' => 'ERROR. Bad departure airport name.'));
            return false;
        }
        else
        {
            $departureAirportId = $departureAirport->Id;
        }

        $destinationAirport = Airport::model()->findByAttributes(array(
            'Name' => $searchFlightForm->destinationAirport
                ));

        if (empty($destinationAirport))
        {
            echo json_encode(array('ERROR' => 'ERROR. Bad destination airport name.'));
            return false;
        }
        else
        {
            $destinationAirportId = $destinationAirport->Id;
        }

        // find all flights departuring at departureDate
        $flights = Flight::model()->findAllByAttributes(array(
            'TakeoffDate' => $searchFlightForm->departureDate,
            'DepartureAirportId' => $departureAirportId,
            'DestinationAirportId' => $destinationAirportId,
                ));

        return true;
    }

    private static function getPrice($emptySeat)
    {
        $seat = new Seat;
        if ($emptySeat->SeatType == $seat->getTypeName('FirstClass'))
        {
            $price = $emptySeat->PriceOfFirstClassSeats;
        }
        elseif ($emptySeat->SeatType == $seat->getTypeName('BusinessClass'))
        {
            $price = $emptySeat->PriceOfBusinessClassSeats;
        }
        elseif ($emptySeat->SeatType == $seat->getTypeName('EconomyClass'))
        {
            $price = $emptySeat->PriceOfBusinessClassSeats;
        }
        else
        {
            $price = 0;
        }
        return $price;
    }
}
?>
