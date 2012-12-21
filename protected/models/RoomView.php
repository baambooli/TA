<?php

/**
 * This is the model class for table "rooms_view".
 *
 * The followings are the available columns in table 'rooms_view':
 * @property integer $Id
 * @property string $HotelName
 * @property string $RoomTypeName
 * @property string $RoomNumber
 * @property string $Tell
 */
class RoomView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoomView the static model class
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
		return 'rooms_view';
	}
   

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HotelName, RoomTypeName, RoomNumber, Tell', 'required'),
			array('Id', 'numerical', 'integerOnly'=>true),
			array('HotelName', 'length', 'max'=>255),
			array('RoomTypeName', 'length', 'max'=>50),
			array('RoomNumber', 'length', 'max'=>20),
			array('Tell', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, HotelName, RoomTypeName, RoomNumber, Tell', 'safe', 'on'=>'search'),
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
			'Id' => 'ID',
			'HotelName' => 'Hotel Name',
			'RoomTypeName' => 'Room Type Name',
			'RoomNumber' => 'Room Number',
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
		$criteria->compare('HotelName',$this->HotelName,true);
		$criteria->compare('RoomTypeName',$this->RoomTypeName,true);
		$criteria->compare('RoomNumber',$this->RoomNumber,true);
		$criteria->compare('Tell',$this->Tell,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    // added By kamran   
    // IMPORTANT: if we do not add a primary key to view, Gii does not create
    // corect code for us, and update, edit, delete icons does not work correctly
    
    public function primaryKey()
    {
        return 'Id';
    }
}