<?php

Class SearchHotelForm extends CFormModel
{
    public $cityName;
    public $category;
    public $roomType;
    //public $noOfRooms;
    public $checkinDate;
    public $checkoutDate;

    public function rules()
    {
        return array(
            array('cityName, checkinDate, checkoutDate', 'required'),
            array('category, roomType', 'safe'), // for bunch assignment we need this line
            array('cityName, checkinDate, checkoutDate, category, roomType', 'safe', 'on' => 'search'),
        );
    }
}
?>
