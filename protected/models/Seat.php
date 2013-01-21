<?php

/**
 * This is the model class for table "seats".
 *
 * The followings are the available columns in table 'seats':
 * @property integer $Id
 * @property string $SeatNumber
 * @property string $SeatType
 * @property integer $AirplaneSpecId
 *
 * The followings are the available model relations:
 * @property FlightPassengers[] $flightPassengers
 * @property AireplaneSpecifications $airplaneSpec
 */
class Seat extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Seat the static model class
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
        return 'seats';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('SeatNumber, SeatType, AirplaneSpecId', 'required'),
            array('AirplaneSpecId', 'numerical', 'integerOnly' => true),
            array('SeatNumber', 'length', 'max' => 20),
            array('SeatType', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, SeatNumber, SeatType, AirplaneSpecId', 'safe', 'on' => 'search'),
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
            'flightPassengers' => array(self::HAS_MANY, 'FlightPassengers', 'SeatId'),
            'airplaneSpec' => array(self::BELONGS_TO, 'AireplaneSpecifications', 'AirplaneSpecId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'SeatNumber' => 'Seat Number',
            'SeatType' => 'Seat Type',
            'AirplaneSpecId' => 'Airplane Specification',
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
        $criteria->compare('SeatNumber', $this->SeatNumber, true);
        $criteria->compare('SeatType', $this->SeatType, true);
        $criteria->compare('AirplaneSpecId', $this->AirplaneSpecId);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    // Kamran
    public function getTypes()
    {
        return array(
            'FirstClass' => 'FirstClass',
            'BusinessClass' => 'BusinessClass',
            'EconomyClass' => 'EconomyClass',
        );
    }

    public function getTypeName($id)
    {
        $types = array(
            'FirstClass' => 'FirstClass',
            'BusinessClass' => 'BusinessClass',
            'EconomyClass' => 'EconomyClass',
        );
        return $types[$id];
    }

    /**
     * Create list of AirplaneSpecifications and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getAirplaneSpecifications()
    {
        $airplaneSpecifications = AirplaneSpecification::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $airplaneSpecificationsArray = CHtml::listData($airplaneSpecifications, 'Id', 'Name');
        return $airplaneSpecificationsArray;
    }

    // get name of the AirplaneSpecification related to the specific Id
    public function getAirplaneSpecificationName($id)
    {
        $AirplaneSpecificationName = AirplaneSpecification::model()->findByPK($id)->Name;
        return $AirplaneSpecificationName;
    }

}