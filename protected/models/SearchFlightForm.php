<?php

Class SearchFlightForm extends CFormModel
{
    public $type;
    public $departuteAirport;
    public $destinationAirport;
    public $departureDate;
    public $destinationDate;

    public function rules()
    {
        return array(
            array('type, departuteAirport, departureDate, destinationAirport', 'required'),
            array('destinationDate', 'safe'), // for bunch assignment we need this line
            //array('type, departuteCity, departureDate, destinationCity, destinationDate', 'safe', 'on' => 'search'),
        );
    }
}
?>
