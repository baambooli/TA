<?php

/**
 * This is the model class for table "airports".
 *
 * The followings are the available columns in table 'airports':
 * @property integer $Id
 * @property string $Name
 * @property string $Address
 * @property integer $CityId
 * @property string $Tel1
 * @property string $Tel2
 * @property string $Fax
 *
 * The followings are the available model relations:
 * @property Cities $city
 * @property Flights[] $flights
 * @property Flights[] $flights1
 */
class Airport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Airport the static model class
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
		return 'airports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CityId, Tel1', 'required'),
			array('CityId', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>100),
			array('Address, Tel2, Fax', 'length', 'max'=>255),
			array('Tel1', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Address, CityId, Tel1, Tel2, Fax', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'Cities', 'CityId'),
			'flights' => array(self::HAS_MANY, 'Flights', 'DepartureAirportId'),
			'flights1' => array(self::HAS_MANY, 'Flights', 'DestinationAirportId'),
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
			'Address' => 'Address',
			'CityId' => 'City',
			'Tel1' => 'Telephone1',
			'Tel2' => 'Telephone2',
			'Fax' => 'Fax',
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
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('CityId',$this->CityId);
		$criteria->compare('Tel1',$this->Tel1,true);
		$criteria->compare('Tel2',$this->Tel2,true);
		$criteria->compare('Fax',$this->Fax,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    /**
     * Create list of cities and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getCities()
    {
        // get list of cities
        $cities = City::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $citiesArray = CHtml::listData($cities, 'Id', 'Name');
        return $citiesArray;
    }
    
    // get name of the city related to the specific Id
    public function getCityName($id)
    {
        // get name of city
        $cityName = City::model()->findByPK($id)->Name;
        return $cityName;
    }
    
}