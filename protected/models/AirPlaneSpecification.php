<?php

/**
 * This is the model class for table "aireplane_specifications".
 *
 * The followings are the available columns in table 'aireplane_specifications':
 * @property integer $Id
 * @property string $Name
 * @property string $Type
 * @property integer $NoOfFirstClassSeats
 * @property integer $NoOfBusinessClassSeats
 * @property integer $NoOfEconomyClassSeats
 * @property integer $PriceOfFirstClassSeats
 * @property integer $PriceOfBusinessClassSeats
 * @property integer $PriceOfEconomyClassSeats
 * @property integer $AirplaneId
 *
 * The followings are the available model relations:
 * @property Airplanes $airplane
 */
class AirPlaneSpecification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AirPlaneSpecification the static model class
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
		return 'aireplane_specifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NoOfFirstClassSeats, NoOfBusinessClassSeats, NoOfEconomyClassSeats', 'numerical', 'integerOnly'=>true),
			array('Name, Type', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Type, NoOfFirstClassSeats, NoOfBusinessClassSeats, NoOfEconomyClassSeats, AirplaneId', 'safe', 'on'=>'search'),
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
			'airplane' => array(self::BELONGS_TO, 'Airplanes', 'AirplaneId'),
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
			'Type' => 'Type',
			'NoOfFirstClassSeats' => 'No Of First Class Seats',
			'NoOfBusinessClassSeats' => 'No Of Business Class Seats',
			'NoOfEconomyClassSeats' => 'No Of Economy Class Seats',
			'AirplaneId' => 'Airplane',
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
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('NoOfFirstClassSeats',$this->NoOfFirstClassSeats);
		$criteria->compare('NoOfBusinessClassSeats',$this->NoOfBusinessClassSeats);
		$criteria->compare('NoOfEconomyClassSeats',$this->NoOfEconomyClassSeats);
		$criteria->compare('AirplaneId',$this->AirplaneId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getTypes()
    {
        return array(
            'comercial' => 'Comercial',
            'navy' => 'Navy',
            'private' => 'Private',
            );
            
    }
}