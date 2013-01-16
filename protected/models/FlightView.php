<?php

/**
 * This is the model class for table "flights_view".
 *
 * The followings are the available columns in table 'flights_view':
 * @property string $AirportName
 * @property string $Tel1
 * @property string $FlightNumber
 * @property integer $FlightId
 * @property string $TakeoffTime
 * @property string $TakeoffDate
 * @property string $LandingTime
 * @property string $LandingDate
 * @property string $AirplaneName
 * @property string $AirlineName
 */
class FlightView extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FlightsView the static model class
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
        return 'flights_view';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Tel1, FlightNumber, TakeoffTime, TakeoffDate, LandingTime, LandingDate, AirlineName', 'required'),
            array('FlightId', 'numerical', 'integerOnly' => true),
            array('AirportName', 'length', 'max' => 100),
            array('Tel1', 'length', 'max' => 25),
            array('FlightNumber, AirplaneName', 'length', 'max' => 50),
            array('AirlineName', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('AirportName, Tel1, FlightNumber, FlightId, TakeoffTime, TakeoffDate, LandingTime, LandingDate, AirplaneName, AirlineName', 'safe', 'on' => 'search'),
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
            'AirportName' => 'Airport Name',
            'Tel1' => 'Tel1',
            'FlightNumber' => 'Flight Number',
            'FlightId' => 'Flight',
            'TakeoffTime' => 'Takeoff Time',
            'TakeoffDate' => 'Takeoff Date',
            'LandingTime' => 'Landing Time',
            'LandingDate' => 'Landing Date',
            'AirplaneName' => 'Airplane Name',
            'AirlineName' => 'Airline Name',
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

        $criteria->compare('AirportName', $this->AirportName, true);
        $criteria->compare('Tel1', $this->Tel1, true);
        $criteria->compare('FlightNumber', $this->FlightNumber, true);
        $criteria->compare('FlightId', $this->FlightId);
        $criteria->compare('TakeoffTime', $this->TakeoffTime, true);
        $criteria->compare('TakeoffDate', $this->TakeoffDate, true);
        $criteria->compare('LandingTime', $this->LandingTime, true);
        $criteria->compare('LandingDate', $this->LandingDate, true);
        $criteria->compare('AirplaneName', $this->AirplaneName, true);
        $criteria->compare('AirlineName', $this->AirlineName, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
                ));
    }

    // Kamran
    public function primaryKey()
    {
        return 'FlightId';
    }
}