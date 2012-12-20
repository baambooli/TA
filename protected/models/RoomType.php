<?php

/**
 * This is the model class for table "roomtypes".
 *
 * The followings are the available columns in table 'roomtypes':
 * @property integer $Id
 * @property string $Name
 * @property integer $Capacity
 * @property string $PricePerDay
 *
 * The followings are the available model relations:
 * @property Rooms[] $rooms
 */
class RoomType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoomType the static model class
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
		return 'roomtypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Capacity, PricePerDay', 'required'),
			array('Capacity', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>50),
			array('PricePerDay', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Capacity, PricePerDay', 'safe', 'on'=>'search'),
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
			'rooms' => array(self::HAS_MANY, 'Rooms', 'RoomTypeId'),
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
			'Capacity' => 'Capacity',
			'PricePerDay' => 'Price Per Day',
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
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('PricePerDay',$this->PricePerDay,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}