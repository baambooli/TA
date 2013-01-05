<?php

Class SearchHotelForm extends CFormModel
{
    public $cityName;
    public $category;
    public $roomType;
    public $noOfRooms;
    public $checkinDate;
    public $checkoutDate;

    public function rules()
    {
        return array(
            array('noOfRooms', 'numerical', 'integerOnly' => true),
            array('noOfRooms', 'numerical', 'min' => 1, 'max' =>10),
            array('cityName, noOfRooms', 'required'),
        );
    }

}
?>
