<?php

/**
 * This is the model class for table "airplanes".
 *
 * The followings are the available columns in table 'airplanes':
 * @property integer $Id
 * @property string $Name
 * @property string $StartDateOfWork
 * @property integer $AirlineId
 *
 * The followings are the available model relations:
 * @property AireplaneSpecifications[] $aireplaneSpecifications
 * @property Airlines $airline
 * @property Flights[] $flights
 */
class Airplane extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Airplane the static model class
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
		return 'airplanes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, AirlineId', 'required'),
			array('AirlineId', 'numerical', 'integerOnly'=>true),
            array('StartDateOfWork', 'date'),
			array('Name', 'length', 'max'=>50),
			array('StartDateOfWork', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, StartDateOfWork, AirlineId', 'safe', 'on'=>'search'),
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
			'aireplaneSpecifications' => array(self::HAS_MANY, 'AireplaneSpecifications', 'AirplaneId'),
			'airline' => array(self::BELONGS_TO, 'Airlines', 'AirlineId'),
			'flights' => array(self::HAS_MANY, 'Flights', 'AirplaneId'),
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
			'StartDateOfWork' => 'Start Date Of Work',
			'AirlineId' => 'Airline',
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
		$criteria->compare('StartDateOfWork',$this->StartDateOfWork,true);
		$criteria->compare('AirlineId',$this->AirlineId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
     /**
     * Creates list of AirPlaneSpecifications and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getAirPlaneSpecifications()
    {
        // get list of AirPlaneSpecifications
        $airplaneSpecifications = AirPlaneSpecification::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $airplaneSpecificationsArray = CHtml::listData($airplaneSpecifications, 'Id', 'Name');
        return $airplaneSpecificationsArray;
    }
    
    // get name of the AirPlaneSpecification related to the specific Id
    public function getAirPlaneSpecificationName($id)
    {
        // get name of AirPlaneSpecification
        $airPlaneSpecificationName = AirPlaneSpecification::model()->findByPK($id)->Name;
        return $airPlaneSpecificationName;
    }
    
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
}