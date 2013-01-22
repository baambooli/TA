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

                // create unique identifier for the row -->  'FlightId-SeatId'
                $id = $emptySeat->FlightId . '-' . $emptySeat->SeatId;

                $emptySeats[] = array(
                    'FlightNumber' => $emptySeat->FlightNumber,
                    'SeatNumber' => $emptySeat->SeatNumber,
                    'SeatType' => $emptySeat->SeatType,
                    'TakeoffDate' => $emptySeat->TakeoffDate.', '.$emptySeat->TakeoffTime,
                    'LandingDate' => $emptySeat->LandingDate.', '.$emptySeat->LandingTime,
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
    
    public static function reserveFlights($params)
    {
        $type = $params[0]; 
        $departureDate = $params[1];
        $destinationDate = $params[2];
        $flightSeats = explode(',', $params[3]);
        foreach ($flightSeats as $flightSeat)
        {
            $flightSeat2 = explode('-', $flightSeat);
            $flightIds[] = $flightSeat2[0]; 
            $seatIds[] = $flightSeat2[1];
        }
        
        // first check the client is authorized
        if (Yii::app()->user->isGuest)
        {
            $result[] = array(
                'result' => '<h3>You are not an authorized user. So you cannot reserve a flight.</h3>'
            );
            echo json_encode($result); 
            return false;
        }

        // get clientId
        $client = Client::model()->find('UserId = :userId', array(':userId' => Yii::app()->user->id));
        if (empty($client))
        {
            $result[] = array(
                    'result' => '<h3>No data found for this client.</h3>'
                );
                echo json_encode($result); 
                return false;
        }
        $clientId = $client->Id;

        // Reserve the flights
        foreach ($seatIds as $key => $value)
        {
            $flightClient = new FlightClient();
            $flightClient->ClientId = $clientId;
            $flightClient->FlightId = $flightIds[$key];
            $flightClient->SeatId = $seatIds[$key];
            $flightClient->Status = flightClient::RESERVATION_REQUEST;
            if (!$flightClient->save())
            {
                $result[] = array(
                    'result' => '<h3>Error in saving data.</h3>'
                );
                echo json_encode($result);
                $message = 'TA LOG: ERROR in reserving flights by user = ' . 
                    Yii::app()->user->id.', reserved flight-seat pairs are = '.
                    $flightIds[$key].'-'.$seatIds[$key];
                Yii::log($message, 'error', 'application.components.searchFlight');
 
                return false;
            }
        }

        $result[] = array(
            'result' => '<h3>Your reservation request(s) saved successfully.</h3>'
        );

        echo json_encode($result);

        $message = 'TA LOG: Flight(s) reserved by user = ' . 
            Yii::app()->user->id.', reserved flight-seat pairs are = '.$flightSeats;
        Yii::log($message, 'info', 'application.components.searchFlight');

        return true;
    }
    
    public static function ShowMyFlightSeatReservations()
    {
        // first check the client is authorized or not
        if (Yii::app()->user->isGuest)
        {
            $result = 'You are not an authorized user. So you cannot reserve a flight.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false;
        }

        // get clientId
        $client = Client::model()->find('UserId = :userId', array(':userId' => Yii::app()->user->id));
        if (empty($client))
        {
            $result = '<h3>No data is found for this client.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false;
        }
        $clientId = $client->Id;

        $modelSearchFlightView = new SearchFlightView('searchMyFlightReservations');
        $modelSearchFlightView->unsetAttributes();  // clear any default values
        // just show information of logged in user
        $modelSearchFlightView->searchMyFlightReservations($clientId);

        if (isset($_GET['SearchFlightView']))
            $modelSearchFlightView->attributes = $_GET['SearchFlightView'];

        return array($modelSearchFlightView, $clientId) ;
    }
    
    public static function cancelMyFlightReservation($flightClientId)
    {
        $flightClientId = (int) $flightClientId;
        
        // check that this flightClientId is related to current user or not
        if (Yii::app()->user->isGuest)
        {
            $result = '<h3>You are not an authorized user. So you cannot reserve a flight.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false;
        }

        // get clientId
        $client = Client::model()->find('UserId = :userId', array(':userId' => Yii::app()->user->id));
        if (empty($client))
        {
            $result = '<h3>No data has been found for this client.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false;
        }
        $clientId = $client->Id;

        // get clientId related to the submitted reservation

        $flightClient = FlightClient::model()->find(' Id = :flightClientId', array(':flightClientId' => $flightClientId));

        if (empty($flightClient))
        {
            $result = '<h3>No data is found for this flight.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false ;
        }

        if ($flightClient->ClientId != $clientId)
        {
            $result = '<h3>You are not allowed to change data that is not related to you.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false ;
        }

        if ($flightClient->Status != FlightClient::CANCELATION_REQUEST)
        {
            $flightClient->Status = FlightClient::CANCELATION_REQUEST;
        }
        else if ($flightClient->Status == FlightClient::CANCELATION_REQUEST)
        {
            $flightClient->Status = FlightClient::RESERVATION_REQUEST;
        }

        if (!$flightClient->save())
        {
            $result = '<h3> Error in canceling your reservation.</h3>';
            Yii::app()->user->setFlash('error', $result);
            
            $message = 'TA LOG: ERROR in reserving flights by user = ' . 
                Yii::app()->user->id.', reserved flight-seat pairs are = '.
                $flightIds[$key].'-'.$seatIds[$key];
            Yii::log($message, 'error', 'application.components.searchFlight');

            return false;
        }

        $message = 'TA LOG: Flight Cancelation by user = ' . Yii::app()->user->id;
        Yii::log($message, 'info', 'application.components.searchFlight');

        return true;
    }
}
?>
