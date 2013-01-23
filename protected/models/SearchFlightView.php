<?php

/**
 * This is the model class for table "searchflight_view".
 *
 * The followings are the available columns in table 'searchflight_view':
 * @property integer $FlightClientId
 * @property string $Status
 * @property string $ClientFullName
 * @property string $ClientTell
 * @property string $DepartureAirportName
 * @property string $DestinationAirportName
 * @property string $FlightNumber
 * @property integer $FlightId
 * @property integer $ClientId
 * @property string $SeatNumber
 * @property string $SeatType
 * @property double $PriceOfFirstClassSeats
 * @property double $PriceOfBusinessClassSeats
 * @property double $PriceOfEconomyClassSeats
 */
class SearchFlightView extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SearchFlightView the static model class
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
        return 'searchflight_view';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ClientTell, FlightNumber, FlightId, ClientId, SeatNumber, SeatType, PriceOfFirstClassSeats, PriceOfBusinessClassSeats, PriceOfEconomyClassSeats', 'required'),
            array('FlightClientId, FlightId, ClientId', 'numerical', 'integerOnly' => true),
            array('PriceOfFirstClassSeats, PriceOfBusinessClassSeats, PriceOfEconomyClassSeats', 'numerical'),
            array('Status, SeatType', 'length', 'max' => 25),
            array('ClientFullName', 'length', 'max' => 121),
            array('ClientTell, SeatNumber', 'length', 'max' => 20),
            array('DepartureAirportName, DestinationAirportName', 'length', 'max' => 100),
            array('FlightNumber', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('FlightClientId, Status, ClientFullName, ClientTell, DepartureAirportName, DestinationAirportName, FlightNumber, FlightId, ClientId, SeatNumber, SeatType, PriceOfFirstClassSeats, PriceOfBusinessClassSeats, PriceOfEconomyClassSeats', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'FlightClientId' => 'Flight Client',
            'Status' => 'Status',
            'ClientFullName' => 'Client Full Name',
            'ClientTell' => 'Client Tell',
            'DepartureAirportName' => 'Departure Airport Name',
            'DestinationAirportName' => 'Destination Airport Name',
            'FlightNumber' => 'Flight Number',
            'FlightId' => 'Flight',
            'ClientId' => 'Client',
            'SeatNumber' => 'Seat Number',
            'SeatType' => 'Seat Type',
            'PriceOfFirstClassSeats' => 'Price Of First Class Seats',
            'PriceOfBusinessClassSeats' => 'Price Of Business Class Seats',
            'PriceOfEconomyClassSeats' => 'Price Of Economy Class Seats',
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

        $criteria->compare('FlightClientId', $this->FlightClientId);
        $criteria->compare('Status', $this->Status, true);
        $criteria->compare('ClientFullName', $this->ClientFullName, true);
        $criteria->compare('ClientTell', $this->ClientTell, true);
        $criteria->compare('DepartureAirportName', $this->DepartureAirportName, true);
        $criteria->compare('DestinationAirportName', $this->DestinationAirportName, true);
        $criteria->compare('FlightNumber', $this->FlightNumber, true);
        $criteria->compare('FlightId', $this->FlightId);
        $criteria->compare('ClientId', $this->ClientId);
        $criteria->compare('SeatNumber', $this->SeatNumber, true);
        $criteria->compare('SeatType', $this->SeatType, true);
        $criteria->compare('PriceOfFirstClassSeats', $this->PriceOfFirstClassSeats);
        $criteria->compare('PriceOfBusinessClassSeats', $this->PriceOfBusinessClassSeats);
        $criteria->compare('PriceOfEconomyClassSeats', $this->PriceOfEconomyClassSeats);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
                ));
    }

    // kamran

    public function searchMyFlightReservations($clientId)
    {
        $clientId = (int) $clientId;
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;

        // just show the logged in user info
        $criteria->condition = "ClientId = $clientId";

        $criteria->compare('FlightClientId', $this->FlightClientId);
        $criteria->compare('Status', $this->Status, true);
        $criteria->compare('ClientFullName', $this->ClientFullName, true);
        $criteria->compare('ClientTell', $this->ClientTell, true);
        $criteria->compare('DepartureAirportName', $this->DepartureAirportName, true);
        $criteria->compare('DestinationAirportName', $this->DestinationAirportName, true);
        $criteria->compare('FlightNumber', $this->FlightNumber, true);
        $criteria->compare('FlightId', $this->FlightId);
        $criteria->compare('ClientId', $this->ClientId);
        $criteria->compare('SeatNumber', $this->SeatNumber, true);
        $criteria->compare('SeatType', $this->SeatType, true);
        $criteria->compare('PriceOfFirstClassSeats', $this->PriceOfFirstClassSeats);
        $criteria->compare('PriceOfBusinessClassSeats', $this->PriceOfBusinessClassSeats);
        $criteria->compare('PriceOfEconomyClassSeats', $this->PriceOfEconomyClassSeats);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
                ));
    }

    // primary key of view
    Public function primaryKey()
    {
        return 'FlightClientId';
    }
}