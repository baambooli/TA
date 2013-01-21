<?php

/**
 * This is the model class for table "flight_clients".
 *
 * The followings are the available columns in table 'flight_clients':
 * @property integer $Id
 * @property integer $ClientId
 * @property integer $FlightId
 * @property integer $SeatId
 *
 * The followings are the available model relations:
 * @property Flights $flight
 * @property Seats $seat
 */
class FlightClient extends CActiveRecord
{

    const RESERVED = 'Reserved';
    const CANCELATION_REQUEST = 'Cancelation Request';
    const RESERVATION_REQUEST = 'Reservation Request';
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FlightClient the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'flight_clients';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ClientId, FlightId, SeatId, Status', 'required'),
            array('ClientId, FlightId, SeatId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ClientId, FlightId, SeatId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'flight' => array(self::BELONGS_TO, 'Flights', 'FlightId'),
            'seat' => array(self::BELONGS_TO, 'Seats', 'SeatId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'ClientId' => 'Client',
            'FlightId' => 'Flight',
            'SeatId' => 'Seat',
            'Status' => 'Status',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('ClientId', $this->ClientId);
        $criteria->compare('FlightId', $this->FlightId);
        $criteria->compare('SeatId', $this->SeatId);
        $criteria->compare('Status', $this->Status); 
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
                ));
    }

    public function getClientsFullName()
    {
        // get list of ClientFullnameView
        $clients = ClientFullnameView::model()->findAll();


        // convert them to suitable format for comboBox or listbox
        $clientsArray = CHtml::listData($clients, 'ClientId', 'FullName');

        //add one extra item
        $clientsArray[0] = 'please select...';
        
        // sort according to key
        ksort($clientsArray);

        return $clientsArray;
    }

    public function getOneClientFullName($id)
    {
        // get  ClientFullnameView
        $client = ClientFullnameView::model()->find('ClientId = :id', array(':id' => $id));
        return $client->FullName;
    }

    public function getFlightsFullInfo()
    {
        $today = date('Y/m/d');
        // just find the flights that are belong to today or the future
        $flights = FlightFullInfoView::model()->findAll('TakeoffDate >= :today'
            , array(':today' => $today));

        // convert them to suitable format for comboBox or listbox
        $flightsArray = CHtml::listData($flights, 'FlightId', 'FullInfo');

        //add one extra item
        $flightsArray[0] = 'please select...';
        
        // sort according to key
        ksort($flightsArray);

        return $flightsArray;
    }

    public function getSeats()
    {
        $seats = Seat::model()->findAll();

        // convert them to suitable format for comboBox or listbox
        $seatsArray = CHtml::listData($seats, 'Id', 'SeatNumber');

        //add one extra item
        $seatsArray[0] = 'please select...';
        
        // sort according to key
        ksort($seatsArray);

        return $seatsArray;
    }

    public function getSeat($id)
    {
        $seatId = Seat::model()->findByAttribute(array('Id' => $id));

        return $seatId;
    }
   
    public function getStatus()
    {
        return array(
            self::RESERVED => self::RESERVED,
            self::CANCELATION_REQUEST => self::CANCELATION_REQUEST,
            self::RESERVATION_REQUEST => self::RESERVATION_REQUEST,
        );
    }
    
}