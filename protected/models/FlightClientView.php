<?php

/**
 * This is the model class for table "flightclients_view".
 *
 * The followings are the available columns in table 'flightclients_view':
 * @property integer $SeatId
 * @property string $SeatNumber
 * @property string $SeatType
 * @property string $Aireplane_specificationsName
 * @property string $AirplaneName
 * @property string $AirlineName
 * @property string $AirlineCountry
 * @property string $AirlineTel
 * @property string $FlightNumber
 * @property integer $FlightId
 * @property string $TakeoffTime
 * @property string $TakeoffDate
 * @property string $LandingTime
 * @property string $LandingDate
 * @property string $DestinationCityName
 * @property string $DestinationAirportName
 * @property string $DestinationAirportAddress
 * @property string $DestinationAirportTel
 * @property string $DepartureCityName
 * @property string $DepartureAirportName
 * @property string $DepartureAirportAddress
 * @property string $DepartureAirportTel
 * @property integer $FlightClientId
 * @property string $ClientName
 * @property string $ClientFamily
 * @property string $ClientSex
 * @property string $PassportNumber
 * @property string $Username
 * @property string $AireplaneSpecificationType
 */
class FlightClientView extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FlightClientView the static model class
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
        return 'flightclients_view';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Status, SeatNumber, SeatType, Aireplane_specificationsName, AirlineName, AirlineTel, FlightNumber, TakeoffTime, TakeoffDate, LandingTime, LandingDate, DestinationCityName, DestinationAirportTel, DepartureCityName, DepartureAirportTel, FlightClientId, ClientSex, Username, AireplaneSpecificationType', 'required'),
            array('SeatId, FlightId, FlightClientId', 'numerical', 'integerOnly' => true),
            array('SeatNumber', 'length', 'max' => 20),
            array('SeatType, AirlineTel, DestinationAirportTel, DepartureAirportTel', 'length', 'max' => 25),
            array('Aireplane_specificationsName, AirplaneName, FlightNumber, DestinationCityName, DepartureCityName, ClientName, PassportNumber, AireplaneSpecificationType', 'length', 'max' => 50),
            array('AirlineName, AirlineCountry, DestinationAirportAddress, DepartureAirportAddress', 'length', 'max' => 255),
            array('DestinationAirportName, DepartureAirportName', 'length', 'max' => 100),
            array('ClientFamily', 'length', 'max' => 70),
            array('ClientSex', 'length', 'max' => 10),
            array('Username', 'length', 'max' => 256),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('SeatId, SeatNumber, SeatType, Aireplane_specificationsName, AirplaneName, AirlineName, AirlineCountry, AirlineTel, FlightNumber, FlightId, TakeoffTime, TakeoffDate, LandingTime, LandingDate, DestinationCityName, DestinationAirportName, DestinationAirportAddress, DestinationAirportTel, DepartureCityName, DepartureAirportName, DepartureAirportAddress, DepartureAirportTel, FlightClientId, ClientName, ClientFamily, ClientSex, PassportNumber, Username, AireplaneSpecificationType', 'safe', 'on' => 'search'),
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
            'SeatId' => 'Seat',
            'SeatNumber' => 'Seat Number',
            'SeatType' => 'Seat Type',
            'Aireplane_specificationsName' => 'Aireplane Specifications Name',
            'AirplaneName' => 'Airplane Name',
            'AirlineName' => 'Airline Name',
            'AirlineCountry' => 'Airline Country',
            'AirlineTel' => 'Airline Tel',
            'FlightNumber' => 'Flight Number',
            'FlightId' => 'Flight',
            'TakeoffTime' => 'Takeoff Time',
            'TakeoffDate' => 'Takeoff Date',
            'LandingTime' => 'Landing Time',
            'LandingDate' => 'Landing Date',
            'DestinationCityName' => 'Destination City Name',
            'DestinationAirportName' => 'Destination Airport Name',
            'DestinationAirportAddress' => 'Destination Airport Address',
            'DestinationAirportTel' => 'Destination Airport Tel',
            'DepartureCityName' => 'Departure City Name',
            'DepartureAirportName' => 'Departure Airport Name',
            'DepartureAirportAddress' => 'Departure Airport Address',
            'DepartureAirportTel' => 'Departure Airport Tel',
            'FlightClientId' => 'Flight Client',
            'ClientName' => 'Client Name',
            'ClientFamily' => 'Client Family',
            'ClientSex' => 'Client Sex',
            'PassportNumber' => 'Passport Number',
            'Username' => 'Username',
            'AireplaneSpecificationType' => 'Aireplane Specification Type',
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

        $criteria->compare('SeatId', $this->SeatId);
        $criteria->compare('SeatNumber', $this->SeatNumber, true);
        $criteria->compare('SeatType', $this->SeatType, true);
        $criteria->compare('Aireplane_specificationsName', $this->Aireplane_specificationsName, true);
        $criteria->compare('AirplaneName', $this->AirplaneName, true);
        $criteria->compare('AirlineName', $this->AirlineName, true);
        $criteria->compare('AirlineCountry', $this->AirlineCountry, true);
        $criteria->compare('AirlineTel', $this->AirlineTel, true);
        $criteria->compare('FlightNumber', $this->FlightNumber, true);
        $criteria->compare('FlightId', $this->FlightId);
        $criteria->compare('TakeoffTime', $this->TakeoffTime, true);
        $criteria->compare('TakeoffDate', $this->TakeoffDate, true);
        $criteria->compare('LandingTime', $this->LandingTime, true);
        $criteria->compare('LandingDate', $this->LandingDate, true);
        $criteria->compare('DestinationCityName', $this->DestinationCityName, true);
        $criteria->compare('DestinationAirportName', $this->DestinationAirportName, true);
        $criteria->compare('DestinationAirportAddress', $this->DestinationAirportAddress, true);
        $criteria->compare('DestinationAirportTel', $this->DestinationAirportTel, true);
        $criteria->compare('DepartureCityName', $this->DepartureCityName, true);
        $criteria->compare('DepartureAirportName', $this->DepartureAirportName, true);
        $criteria->compare('DepartureAirportAddress', $this->DepartureAirportAddress, true);
        $criteria->compare('DepartureAirportTel', $this->DepartureAirportTel, true);
        $criteria->compare('FlightClientId', $this->FlightClientId);
        $criteria->compare('ClientName', $this->ClientName, true);
        $criteria->compare('ClientFamily', $this->ClientFamily, true);
        $criteria->compare('ClientSex', $this->ClientSex, true);
        $criteria->compare('PassportNumber', $this->PassportNumber, true);
        $criteria->compare('Username', $this->Username, true);
        $criteria->compare('AireplaneSpecificationType', $this->AireplaneSpecificationType, true);
        $criteria->compare('Status', $this->Status, true);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
                ));
    }

    //Kamran
    public function primarykey()
    {
        return 'FlightClientId';
    }
    
    public function myDeleteFlightClient($id)
    {
        $id = (int) $id;
        $sql = " Delete from flight_clients where Id = $id";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $command->execute();
    }
}