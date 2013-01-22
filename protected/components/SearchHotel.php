<?php

class SearchHotel
{
   public static function findRoomsUsingCriteria($modelSearchHotelForm, &$rooms)
    {
        $criteria = new CDbCriteria;
        $criteria->select = array('RoomId');
        $criteria->distinct = true;

        //NOTE: $criteria->compare: Adds a comparison expression to the condition property.
        $criteria->compare('CityName', $modelSearchHotelForm->cityName, true);
        $criteria->compare('HotelCategory', $modelSearchHotelForm->category, true);
        $criteria->compare('RoomType', $modelSearchHotelForm->roomType, true);

        // get all roomIds having the criteria in ClientRoom table
        $rooms = Search4EmptyRoomView::model()->findAll($criteria);
    }

    public static function checkAvailabilityOfRoom($modelSearchHotelForm)
    {
        $freeRoomIds = array();
        $rooms = null;

        self::findRoomsUsingCriteria($modelSearchHotelForm, $rooms);

        $startDate = str_replace('/', '-', $modelSearchHotelForm->checkinDate);
        $endDate = str_replace('/', '-', $modelSearchHotelForm->checkoutDate);

        // for each room
        foreach ($rooms as $key0 => $value0)
        {
            // find related records on Roomclient subtable or Search4EmptyRoomView
            $roomReservations = Search4EmptyRoomView::model()->findAll(
                    'RoomId = :roomId', array(':roomId' => $rooms[$key0]->RoomId));

            $isFree = true;
            foreach ($roomReservations as $key => $value)
            {
                $start = $roomReservations[$key]->CheckinDate;
                $end = $roomReservations[$key]->CheckoutDate;
                //$status = $roomReservations[$key]->RoomStatus;
                // check that the room is taken or not in that interval
                if ((($startDate >= $start) && ($startDate <= $end)) || (($endDate >= $start) && ($endDate <= $end)) || (($start >= $startDate) && ($start <= $endDate)) || (($end >= $startDate) && ($end <= $endDate))
                )
                {
                    // room is taken
                    $isFree = false;
                    break;
                }
            }
            // add free room to array
            if ($isFree)
            {
                $freeRoomIds[] = $rooms[$key0]->RoomId;
            }
        }

        // we should find all the rooms that have never come in ClientRoom
        // table to and append them to $freeRoomIds
        NeverUsedRoomsView::model()->addUnusedRooms($modelSearchHotelForm, $freeRoomIds);

        $result = '';
        $res = self::createEmptyRoomsJsonOutput($freeRoomIds, $result);

        // send the results to ajax caller function
        echo $result;

        // send the status of operation to ajax caller function
        return $res;
    }

    public static function createEmptyRoomsJsonOutput($freeRoomIds, &$result)
    {
        $result = '';
        if (count($freeRoomIds) == 0)
        {
            $result[0] = array('RoomId' => 'NOT FOUND');
            $result = json_encode($result);

            return true;
        }

        // create the collection of RoomIds
        $set = '(-1';
        foreach ($freeRoomIds as $key => $value)
        {
            $set .= ', ' . $freeRoomIds[$key];
        }
        $set .= ')';

        // get all rooms having the criteria
        $criteria = new CDbCriteria;
        $criteria->select = array('RoomId', 'RoomNumber', 'CityName', 'HotelName',
            'HotelCategory', 'RoomType', 'PricePerDay', 'HotelTel');
        $criteria->distinct = true;
        $criteria->condition = " RoomId IN $set";
        $rooms = NeverUsedRoomsView::model()->findAll($criteria);

        // create output table in as array

        foreach ($rooms as $key => $value)
        {
            $result[] = array(
                'RoomId' => $rooms[$key]->RoomId,
                'RoomNumber' => $rooms[$key]->RoomNumber,
                'CityName' => $rooms[$key]->CityName,
                'HotelName' => $rooms[$key]->HotelName,
                'HotelCategory' => $rooms[$key]->HotelCategory,
                'RoomType' => $rooms[$key]->RoomType,
                'PricePerDay' => $rooms[$key]->PricePerDay,
            );
        }

        // convert array to json
        $result = json_encode($result);
        return true;
    }
    
    public static function reserveRooms($params)
    {
        $checkinDate = $params[0];
        $checkoutDate = $params[1];
        $rooms = explode(',', $params[2]);

        // first check the client is authorized
        if (Yii::app()->user->isGuest)
        {
            $result[] = array(
                'result' => '<h3>You are not an authorized user. So you cannot reserve a room.</h3>'
            );
            echo json_encode($result);
            return true;
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

        // Reserve the rooms
        foreach ($rooms as $key => $value)
        {
            $roomClient = new RoomClient();
            $roomClient->ClientId = $clientId;
            $roomClient->RoomId = $rooms[$key];
            $roomClient->Status = RoomClient::RESERVATION_REQUEST;
            $roomClient->StartDate = $checkinDate;
            $roomClient->EndDate = $checkoutDate;
            if (!$roomClient->save())
            {
                $result[] = array(
                    'result' => '<h3>Error in saving data.</h3>'
                );
                echo json_encode($result);
                $message = 'TA LOG: ERROR in reserving roomss by user = ' . 
                    Yii::app()->user->id.', reserved room is = '.
                    $rooms[$key];
                Yii::log($message, 'error', 'application.components.searchHotel');
 
                return true;
            }
        }

        $result[] = array(
            'result' => '<h3>Your reservation request(s) saved successfully.</h3>'
        );

        echo json_encode($result);

        $message = 'TA LOG: Room reserved by user = ' . Yii::app()->user->id;
        Yii::log($message, 'info', 'application.components.searchHotel');

        return true;
    }
    
    public static function showMyRoomReservations()
    {
        // first check the client is authorized or not
        if (Yii::app()->user->isGuest)
        {
            $result = 'You are not an authorized user. So you cannot reserve a room.</h3>';
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

        $modelSearchHotelView = new SearchHotelView('searchMyHotelReservations');
        $modelSearchHotelView->unsetAttributes();  // clear any default values
        // just show information of logged in user
        $modelSearchHotelView->searchMyHotelReservations($clientId);

        if (isset($_GET['SearchHotelView']))
            $modelSearchHotelView->attributes = $_GET['SearchHotelView'];

        return array($modelSearchHotelView, $clientId) ;
    }
    
    public static function cancelMyRoomReservation($roomClientId)
    {
        $roomClientId = (int) $roomClientId;
        
        // check that this roomClientId is related to current user or not
        if (Yii::app()->user->isGuest)
        {
            $result = '<h3>You are not an authorized user. So you cannot reserve a room.</h3>';
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

        $roomClient = RoomClient::model()->find(' Id = :roomClientId', array(':roomClientId' => $roomClientId));

        if (empty($roomClient))
        {
            $result = '<h3>No data is found for this room.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false ;
        }

        if ($roomClient->ClientId != $clientId)
        {
            $result = '<h3>You are not allowed to change data that is not related to you.</h3>';
            Yii::app()->user->setFlash('error', $result);
            return false ;
        }

        if ($roomClient->Status != RoomClient::CANCELATION_REQUEST)
        {
            $roomClient->Status = RoomClient::CANCELATION_REQUEST;
        }
        else if ($roomClient->Status == RoomClient::CANCELATION_REQUEST)
        {
            $roomClient->Status = RoomClient::RESERVATION_REQUEST;
        }

        if (!$roomClient->save())
        {
            $result = '<h3> Error in canceling your reservation.</h3>';
            Yii::app()->user->setFlash('error', $result);
            
            $message = 'TA LOG: ERROR in reserving rooms by user = ' . 
                Yii::app()->user->id.', reserved flight-seat pairs are = '.
                $flightIds[$key].'-'.$seatIds[$key];
            Yii::log($message, 'error', 'application.components.searchFlight');

            return false;
        }

        $message = 'TA LOG: Room Cancelation by user = ' . Yii::app()->user->id;
        Yii::log($message, 'info', 'application.components.searchHotel');

        return true;
    }
}
?>
