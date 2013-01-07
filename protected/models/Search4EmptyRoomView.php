<?php

/**
 * This is the model class for table "search4emptyroom_view".
 *
 * The followings are the available columns in table 'search4emptyroom_view':
 * @property integer $RoomId
 * @property string $RoomNumber
 * @property string $HotelName
 * @property integer $HotelCategory
 * @property string $HotelTel
 * @property string $CityName
 * @property string $RoomType
 * @property string $PricePerDay
 * @property string $CheckinDate
 * @property string $CheckoutDate
 * @property string $RoomStatus
 * @property string $HotelAddress
 * @property string $HotelImage
 * @property integer $RoomCapacity
 * @property integer $HotelId
 */
class Search4EmptyRoomView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Search4EmptyRoomView the static model class
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
		return 'search4emptyroom_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RoomNumber, HotelName, HotelCategory, CityName, RoomType, PricePerDay, CheckinDate, CheckoutDate, RoomStatus, RoomCapacity', 'required'),
			array('RoomId, HotelCategory, RoomCapacity, HotelId', 'numerical', 'integerOnly'=>true),
			array('RoomNumber', 'length', 'max'=>30),
			array('HotelName, HotelAddress', 'length', 'max'=>255),
			array('HotelTel', 'length', 'max'=>20),
			array('CityName, RoomType, RoomStatus', 'length', 'max'=>50),
			array('PricePerDay', 'length', 'max'=>10),
			array('HotelImage', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RoomId, RoomNumber, HotelName, HotelCategory, HotelTel, CityName, RoomType, PricePerDay, CheckinDate, CheckoutDate, RoomStatus, HotelAddress, HotelImage, RoomCapacity, HotelId', 'safe', 'on'=>'search'),
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
			'RoomId' => 'Room',
			'RoomNumber' => 'Room Number',
			'HotelName' => 'Hotel Name',
			'HotelCategory' => 'Hotel Category',
			'HotelTel' => 'Hotel Tel',
			'CityName' => 'City Name',
			'RoomType' => 'Room Type',
			'PricePerDay' => 'Price Per Day',
			'CheckinDate' => 'Checkin Date',
			'CheckoutDate' => 'Checkout Date',
			'RoomStatus' => 'Room Status',
			'HotelAddress' => 'Hotel Address',
			'HotelImage' => 'Hotel Image',
			'RoomCapacity' => 'Room Capacity',
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

		$criteria->compare('RoomId',$this->RoomId);
		$criteria->compare('RoomNumber',$this->RoomNumber,true);
		$criteria->compare('HotelName',$this->HotelName,true);
		$criteria->compare('HotelCategory',$this->HotelCategory);
		$criteria->compare('HotelTel',$this->HotelTel,true);
		$criteria->compare('CityName',$this->CityName,true);
		$criteria->compare('RoomType',$this->RoomType,true);
		$criteria->compare('PricePerDay',$this->PricePerDay,true);
		$criteria->compare('CheckinDate',$this->CheckinDate,true);
		$criteria->compare('CheckoutDate',$this->CheckoutDate,true);
		$criteria->compare('RoomStatus',$this->RoomStatus,true);
		$criteria->compare('HotelAddress',$this->HotelAddress,true);
		$criteria->compare('HotelImage',$this->HotelImage,true);
		$criteria->compare('RoomCapacity',$this->RoomCapacity);
		$criteria->compare('HotelId',$this->HotelId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    // Kamran
    public function primaryKey()
    {
        return 'RoomId';
    }
}