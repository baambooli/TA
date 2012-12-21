<?php

/**
 * This is the model class for table "flight_passengers".
 *
 * The followings are the available columns in table 'flight_passengers':
 * @property integer $Id
 * @property string $Name
 * @property string $Family
 * @property string $Address
 * @property string $PassportNumber
 * @property string $PassportExpirey
 * @property string $Nationality
 * @property string $Tell
 * @property integer $FlightId
 * @property string $SeatId
 *
 * The followings are the available model relations:
 * @property Flights $flight
 */
class FlightPassenger extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FlightPassenger the static model class
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
        return 'flight_passengers';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Id', 'required'),
            array('Id, FlightId', 'numerical', 'integerOnly'=>true),
            array('Name, Family, PassportNumber, Nationality', 'length', 'max'=>50),
            array('Address', 'length', 'max'=>200),
            array('Tell', 'length', 'max'=>20),
            array('SeatId', 'length', 'max'=>25),
            array('PassportExpirey', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, Name, Family, Address, PassportNumber, PassportExpirey, Nationality, Tell, FlightId, SeatId', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'Name' => 'Name',
            'Family' => 'Family',
            'Address' => 'Address',
            'PassportNumber' => 'Passport Number',
            'PassportExpirey' => 'Passport Expirey',
            'Nationality' => 'Nationality',
            'Tell' => 'Telephone',
            'FlightId' => 'Flight',
            'SeatId' => 'Seat',
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
        $criteria->compare('Name',$this->Name,true);
        $criteria->compare('Family',$this->Family,true);
        $criteria->compare('Address',$this->Address,true);
        $criteria->compare('PassportNumber',$this->PassportNumber,true);
        $criteria->compare('PassportExpirey',$this->PassportExpirey,true);
        $criteria->compare('Nationality',$this->Nationality,true);
        $criteria->compare('Tell',$this->Tell,true);
        $criteria->compare('FlightId',$this->FlightId);
        $criteria->compare('SeatId',$this->SeatId,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
     public function getFlights()
    {
        // get list of flights
        $flights = Flight::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $flightsArray = CHtml::listData($flights, 'Id', 'FlightNumber');
        return $flightsArray;
    }
    
    // get Number of the flight related to the specific Id
    public function getFlightNumber($id)
    {
        // get Number of flight
        $flightNumber = City::model()->findByPK($id)->FlightNumber;
        return $flightNumber;
    }
}