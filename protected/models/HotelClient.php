<?php

/**
 * This is the model class for table "hotel_clients".
 *
 * The followings are the available columns in table 'hotel_clients':
 * @property integer $Id
 * @property string $Name
 * @property string $Family
 * @property string $Address
 * @property string $tell
 * @property string $PassportNumber
 * @property string $RoomId
 * @property integer $HotelId
 *
 * The followings are the available model relations:
 * @property Hotels $hotels
 */
class HotelClient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelClient the static model class
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
		return 'hotel_clients';
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
			array('Id, HotelId', 'numerical', 'integerOnly'=>true),
			array('Name, PassportNumber', 'length', 'max'=>50),
			array('Family', 'length', 'max'=>70),
			array('Address', 'length', 'max'=>200),
			array('tell, RoomId', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Family, Address, tell, PassportNumber, RoomId, HotelId', 'safe', 'on'=>'search'),
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
			'hotels' => array(self::HAS_ONE, 'Hotels', 'ID'),
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
			'tell' => 'Tell',
			'PassportNumber' => 'Passport Number',
			'RoomId' => 'Room',
			'HotelId' => 'Hotel',
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
		$criteria->compare('tell',$this->tell,true);
		$criteria->compare('PassportNumber',$this->PassportNumber,true);
		$criteria->compare('RoomId',$this->RoomId,true);
		$criteria->compare('HotelId',$this->HotelId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}