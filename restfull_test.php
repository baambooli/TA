
<?php

    echo '<h1> Hotel Query</h1>';
    $url = 'http://kamran.dev.travelagancy.com:81/index.php?r=site/searchHotel';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);

    $data = array(
        'CityName' => 'Montreal',
        'HotelCategory' => 'ALL',
        'RoomType' => 'ALL',
        'datepickerCheckin' => '2013/02/01',
        'datepickerCheckout' => '2013/02/05',
    );

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    echo 'query output is <br><br>'.$output;

    //echo '<br><br><br><br>info is<br><br>' ;
    //print_r($info);
    
    /////////////////////////////////////////////////////////////
    
    echo '<h1> Flight Query</h1>';
    $url = 'http://kamran.dev.travelagancy.com:81/index.php?r=site/searchFlight';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);

    $data = array(
        'departureAirportName' => 'Montreal, Montreal Airport',
        'destinationAirportName' => 'Toronto, Toronto Airport',
        'flightType' => 'ONE_WAY',
        'datepickerDepartureDate' => '2013/01/26',
        'datepickerDestinationDate' => '',
    );

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    echo 'query output is <br><br>'.$output;

    //echo '<br><br><br><br>info is<br><br>' ;
    //print_r($info);
?>