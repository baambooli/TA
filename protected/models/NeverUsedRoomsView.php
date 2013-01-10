<?php

/**
 * This is the model class for table "emptyrooms_view".
 *
 * The followings are the available columns in table 'emptyrooms_view':
 * @property integer $RoomId
 * @property string $RoomNumber
 * @property string $CityName
 * @property string $HotelName
 * @property string $RoomType
 * @property integer $HotelCategory
 * @property string $PricePerDay
 * @property string $HotelTel
 */
class NeverUsedRoomsView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmptyRoomsView the static model class
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
		return 'neverusedrooms_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RoomNumber, CityName, HotelName, RoomType, HotelCategory, PricePerDay', 'required'),
			array('RoomId, HotelCategory', 'numerical', 'integerOnly'=>true),
			array('RoomNumber', 'length', 'max'=>30),
			array('CityName, RoomType', 'length', 'max'=>50),
			array('HotelName', 'length', 'max'=>255),
			array('PricePerDay', 'length', 'max'=>10),
			array('HotelTel', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RoomId, RoomNumber, CityName, HotelName, RoomType, HotelCategory, PricePerDay, HotelTel', 'safe', 'on'=>'search'),
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
			'CityName' => 'City Name',
			'HotelName' => 'Hotel Name',
			'RoomType' => 'Room Type',
			'HotelCategory' => 'Hotel Category',
			'PricePerDay' => 'Price Per Day',
			'HotelTel' => 'Hotel Tel',
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
		$criteria->compare('CityName',$this->CityName,true);
		$criteria->compare('HotelName',$this->HotelName,true);
		$criteria->compare('RoomType',$this->RoomType,true);
		$criteria->compare('HotelCategory',$this->HotelCategory);
		$criteria->compare('PricePerDay',$this->PricePerDay,true);
		$criteria->compare('HotelTel',$this->HotelTel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    // Kamran
    public function primaryKey()
    {
        return 'RoomId';   
    }
    
    // adds list of rooms never been used at all to the $roomIds
    public function addUnusedRooms($modelSearchHotelForm, &$FreeRoomIds)
    {   
        $criteria = new CDbCriteria;
        $criteria->select = array('RoomId');
        $criteria->distinct = true;
        
        //$criteria->condition = 'RoomId NOT IN (select distinct RoomId from room_clients)';
        
        //NOTE: $criteria->compare: Adds a comparison expression to the condition property.
        $criteria->compare('CityName', $modelSearchHotelForm->cityName, true);
        $criteria->compare('HotelCategory', $modelSearchHotelForm->category, true);
        $criteria->compare('RoomType', $modelSearchHotelForm->roomType, true);

        // get the list of Rooms
        $unusedRooms = NeverUsedRoomsView::model()->findAll($criteria);

        foreach ($unusedRooms as $key => $value)
        {
            $FreeRoomIds[] = $unusedRooms[$key]->RoomId;       
        }
        
        return ;
    }
}