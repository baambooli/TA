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
            array('Id, ClientId, FlightId, SeatId', 'required'),
            array('Id, ClientId, FlightId, SeatId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, ClientId, FlightId, SeatId', 'safe', 'on' => 'search'),
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

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}