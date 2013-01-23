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
            array('departureDate, destinationDate', 'type', 'type' => 'date', 'message' => 'Not a valid date!', 'dateFormat' => 'yyyy/MM/dd'),
            array('destinationDate', 'safe'), // for bunch assignment we need this line
            //array('type, departuteCity, departureDate, destinationCity, destinationDate', 'safe', 'on' => 'search'),
        );
    }
}
?>
