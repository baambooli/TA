<?php

/**
 * This is the model class for table "flights".
 *
 * The followings are the available columns in table 'flights':
 * @property integer $Id
 * @property string $FlightNumber
 * @property integer $AirlineId
 * @property integer $AirplaneId
 * @property string $TakeoffDate
 * @property string $LandingDate
 * @property integer $DepartureAirportId
 * @property integer $DestinationAirportId
 * @property double $PriceOfFirstClassSeats
 * @property double $PriceOfBusinessClassSeats
 * @property double $PriceOfEconomyClassSeats
 *
 * The followings are the available model relations:
 * @property FlightPassengers[] $flightPassengers
 * @property Airlines $airline
 * @property Airplanes $airplane
 * @property Airports $departureAirport
 * @property Airports $destinationAirport
 */
class Flight extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Flight the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'flights';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FlightNumber, AirlineId, AirplaneId, TakeoffDate, LandingDate, TakeoffTime, LandingTime, DepartureAirportId, DestinationAirportId, PriceOfFirstClassSeats, PriceOfBusinessClassSeats, PriceOfEconomyClassSeats', 'required'),
			array('AirlineId, AirplaneId, DepartureAirportId, DestinationAirportId', 'numerical', 'integerOnly'=>true),
			array('PriceOfFirstClassSeats, PriceOfBusinessClassSeats, PriceOfEconomyClassSeats', 'numerical'),
			array('FlightNumber', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, FlightNumber, AirlineId, AirplaneId, TakeoffDate, LandingDate, DepartureAirportId, DestinationAirportId, PriceOfFirstClassSeats, PriceOfBusinessClassSeats, PriceOfEconomyClassSeats', 'safe', 'on'=>'search'),
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
			'flightPassengers' => array(self::HAS_MANY, 'FlightPassengers', 'FlightId'),
			'airline' => array(self::BELONGS_TO, 'Airlines', 'AirlineId'),
			'airplane' => array(self::BELONGS_TO, 'Airplanes', 'AirplaneId'),
			'departureAirport' => array(self::BELONGS_TO, 'Airports', 'DepartureAirportId'),
			'destinationAirport' => array(self::BELONGS_TO, 'Airports', 'DestinationAirportId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'FlightNumber' => 'Flight Number',
			'AirlineId' => 'Airline',
			'AirplaneId' => 'Airplane',
			'TakeoffDate' => 'Takeoff Date',
			'LandingDate' => 'Landing Date',
			'DepartureAirportId' => 'Departure Airport',
			'DestinationAirportId' => 'Destination Airport',
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

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('FlightNumber',$this->FlightNumber,true);
		$criteria->compare('AirlineId',$this->AirlineId);
		$criteria->compare('AirplaneId',$this->AirplaneId);
		$criteria->compare('TakeoffDate',$this->TakeoffDate,true);
		$criteria->compare('LandingDate',$this->LandingDate,true);
		$criteria->compare('DepartureAirportId',$this->DepartureAirportId);
		$criteria->compare('DestinationAirportId',$this->DestinationAirportId);
		$criteria->compare('PriceOfFirstClassSeats',$this->PriceOfFirstClassSeats);
		$criteria->compare('PriceOfBusinessClassSeats',$this->PriceOfBusinessClassSeats);
		$criteria->compare('PriceOfEconomyClassSeats',$this->PriceOfEconomyClassSeats);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    // Kamran
    public function getAirlines()
    {
        // get list of Airlines
        $airlines = Airline::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $airlinesArray = CHtml::listData($airlines, 'Id', 'Name');
        return $airlinesArray;
    }
    
    // get name of the Airline related to the specific Id
    public function getAirlineName($id)
    {
        // get name of Airline
        $airLineName = Airline::model()->findByPK($id)->Name;
        return $airLineName;
    }
    
    public function getAirports()
    {
        // get list of Airports
        $airports = Airport::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $airportsArray = CHtml::listData($airports, 'Id', 'Name');
        return $airportsArray;
    }
    
    // get name of the Airport related to the specific Id
    public function getAirportName($id)
    {
        // get name of Airport
        $airportName = Airport::model()->findByPK($id)->Name;
        return $airportName;
    }
    
     public function getAirplanes()
    {
        // get list of Airplanes
        $airplanes = Airplane::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $airplanesArray = CHtml::listData($airplanes, 'Id', 'Name');
        return $airplanesArray;
    }
    
    // get name of the Airplane related to the specific Id
    public function getAirplaneName($id)
    {
        // get name of Airplane
        $airplaneName = Airplane::model()->findByPK($id)->Name;
        return $airplaneName;
    }
}