<?php
/* gets the data from a URL */
function get_data($url) 
{
    $ch = curl_init();
    $timeout = 50;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    echo $data;
}

 get_data('http://kamran.dev.travelagancy.com:81/');

?>