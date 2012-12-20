<?php

/**
 * This is the model class for table "rooms".
 *
 * The followings are the available columns in table 'rooms':
 * @property integer $Id
 * @property integer $HotelId
 * @property string $RoomNumber
 * @property integer $RoomTypeId
 * @property string $Tell
 *
 * The followings are the available model relations:
 * @property RoomClients[] $roomClients
 * @property Hotels $hotel
 * @property Roomtypes $roomType
 */
class Room extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Room the static model class
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
		return 'rooms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('HotelId, RoomTypeId, RoomNumber, Tell', 'required'),
			array('HotelId, RoomTypeId', 'numerical', 'integerOnly'=>true),
			array('RoomNumber', 'length', 'max'=>20),
			array('Tell', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, HotelId, RoomNumber, RoomTypeId, Tell', 'safe', 'on'=>'search'),
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
			'roomClients' => array(self::HAS_MANY, 'RoomClients', 'RoomId'),
			'hotel' => array(self::BELONGS_TO, 'Hotels', 'HotelId'),
			'roomType' => array(self::BELONGS_TO, 'Roomtypes', 'RoomTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'HotelId' => 'Hotel',
			'RoomNumber' => 'Room Number',
			'RoomTypeId' => 'Room Type',
			'Tell' => 'Tell',
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
		$criteria->compare('HotelId',$this->HotelId);
		$criteria->compare('RoomNumber',$this->RoomNumber,true);
		$criteria->compare('RoomTypeId',$this->RoomTypeId);
		$criteria->compare('Tell',$this->Tell,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    /**
     * Create list of cities and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getHotels()
    {
        // get the list of hotels
        $hotels = Hotel::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $hotelsArray = CHtml::listData($hotels, 'ID', 'Name');
        return $hotelsArray;
    }
    
    // get the name of the hotel related to the specific Id
    public function getHotelName($id)
    {
        // get the name of hotel
        $hotelName = Hotel::model()->findByPK($id)->Name;
        return $hotelName;
    }
    
    public function getRoomTypes()
    {
        // get the list of Rooms
        $roomTypes = RoomType::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $roomTypesArray = CHtml::listData($roomTypes, 'Id', 'Name');
        return $roomTypesArray;
    }
    // get the name of the room related to the specific Id
    public function getRoomTypeName($id)
    {
        $roomTypeName = RoomType::model()->findByPK($id)->Name;
        return $roomTypeName;
    }
}