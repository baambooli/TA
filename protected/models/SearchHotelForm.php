<?php

Class SearchHotelForm extends CFormModel
{
    public $cityName;
    public $category;
    public $roomType;
    public $checkinDate;
    public $checkoutDate;

    public function rules()
    {
        return array(
            array('cityName, checkinDate, checkoutDate', 'required'),
            array('category', 'numerical', 'integerOnly' => true),
            array('checkinDate, checkoutDate', 'type', 'type' => 'date', 'message' => 'Not a valid date!', 'dateFormat' => 'yyyy/MM/dd'),
            array('category, roomType', 'safe'), // for bunch assignment we need this line
            array('cityName, checkinDate, checkoutDate, category, roomType', 'safe', 'on' => 'search'),
        );
    }
}
?>
