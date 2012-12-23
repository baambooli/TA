<?php

/**
 * This is the model class for table "client_view".
 *
 * The followings are the available columns in table 'client_view':
 * @property integer $Id
 * @property string $Name
 * @property string $Family
 * @property string $Address
 * @property string $tell
 * @property string $PassportNumber
 * @property string $CreditCardType
 * @property string $CreditCardExpiryDate
 * @property string $CreditCardHolderName
 * @property string $CreditCardSecurityNumber
 * @property string $CreditCardNumber
 * @property integer $RoomId
 * @property string $OccupationDate
 */
class ClientView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClientView the static model class
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
		return 'client_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OccupationDate', 'required'),
			array('Id, RoomId', 'numerical', 'integerOnly'=>true),
			array('Name, PassportNumber', 'length', 'max'=>50),
			array('Family', 'length', 'max'=>70),
			array('Address', 'length', 'max'=>200),
			array('tell', 'length', 'max'=>20),
			array('CreditCardType, CreditCardExpiryDate, CreditCardHolderName, CreditCardSecurityNumber, CreditCardNumber', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Family, Address, tell, PassportNumber, CreditCardType, CreditCardExpiryDate, CreditCardHolderName, CreditCardSecurityNumber, CreditCardNumber, RoomId, OccupationDate', 'safe', 'on'=>'search'),
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
			'Name' => 'Name',
			'Family' => 'Family',
			'Address' => 'Address',
			'tell' => 'Tell',
			'PassportNumber' => 'Passport Number',
			'CreditCardType' => 'Credit Card Type',
			'CreditCardExpiryDate' => 'Credit Card Expiry Date',
			'CreditCardHolderName' => 'Credit Card Holder Name',
			'CreditCardSecurityNumber' => 'Credit Card Security Number',
			'CreditCardNumber' => 'Credit Card Number',
			'RoomId' => 'Room',
			'OccupationDate' => 'Occupation Date',
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
		$criteria->compare('CreditCardType',$this->CreditCardType,true);
		$criteria->compare('CreditCardExpiryDate',$this->CreditCardExpiryDate,true);
		$criteria->compare('CreditCardHolderName',$this->CreditCardHolderName,true);
		$criteria->compare('CreditCardSecurityNumber',$this->CreditCardSecurityNumber,true);
		$criteria->compare('CreditCardNumber',$this->CreditCardNumber,true);
		$criteria->compare('RoomId',$this->RoomId);
		$criteria->compare('OccupationDate',$this->OccupationDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}