<?php

/**
 * This is the model class for table "allseatsofflight_view".
 *
 * The followings are the available columns in table 'allseatsofflight_view':
 * @property integer $SeatId
 * @property string $SeatNumber
 * @property string $SeatType
 * @property integer $FlightId
 * @property string $FlightNumber
 */
class AllSeatsOfFlightView extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AllSeatsOfFlightView the static model class
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
        return 'allseatsofflight_view';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('SeatNumber, SeatType, FlightNumber', 'required'),
            array('SeatId, FlightId', 'numerical', 'integerOnly' => true),
            array('SeatNumber', 'length', 'max' => 20),
            array('SeatType', 'length', 'max' => 25),
            array('FlightNumber', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('SeatId, SeatNumber, SeatType, FlightId, FlightNumber', 'safe', 'on' => 'search'),
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
            'FlightId' => 'Flight',
            'FlightNumber' => 'Flight Number',
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
        $criteria->compare('FlightId', $this->FlightId);
        $criteria->compare('FlightNumber', $this->FlightNumber, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
                ));
    }
    
    public static function findEmptySeatsOfTheFlight($flightId)
    {
        $flightId = (int) $flightId;
        
        $criteria = new CDbCriteria;
        $criteria->condition = "(FlightId = $flightId) AND " .
                "SeatId NOT IN (select SeatId from flight_clients where FlightId = $flightId)";

        $emptySeats = self::model()->findAll($criteria);

        return $emptySeats;
    }
}