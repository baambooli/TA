<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $Id
 * @property string $Name
 * @property string $Family
 * @property string $Tell
 * @property string $PassportNumber
 * @property string $Address
 * @property string $Username
 * @property string $Passoword
 * @property string $CreditCradType
 * @property string $CreditCardNumber
 * @property string $CreditCardSecurityNumber
 * @property string $PassportExpiry
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'users';
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
			array('Id', 'numerical', 'integerOnly'=>true),
			array('Name, PassportNumber, Username', 'length', 'max'=>50),
			array('Family', 'length', 'max'=>70),
			array('Tell, CreditCradType', 'length', 'max'=>20),
			array('Address', 'length', 'max'=>200),
			array('Passoword, CreditCardNumber, CreditCardSecurityNumber', 'length', 'max'=>100),
			array('PassportExpiry', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Name, Family, Tell, PassportNumber, Address, Username, Passoword, CreditCradType, CreditCardNumber, CreditCardSecurityNumber, PassportExpiry', 'safe', 'on'=>'search'),
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
			'Tell' => 'Tell',
			'PassportNumber' => 'Passport Number',
			'Address' => 'Address',
			'Username' => 'Username',
			'Passoword' => 'Passoword',
			'CreditCradType' => 'Credit Crad Type',
			'CreditCardNumber' => 'Credit Card Number',
			'CreditCardSecurityNumber' => 'Credit Card Security Number',
			'PassportExpiry' => 'Passport Expiry',
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
		$criteria->compare('Tell',$this->Tell,true);
		$criteria->compare('PassportNumber',$this->PassportNumber,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Passoword',$this->Passoword,true);
		$criteria->compare('CreditCradType',$this->CreditCradType,true);
		$criteria->compare('CreditCardNumber',$this->CreditCardNumber,true);
		$criteria->compare('CreditCardSecurityNumber',$this->CreditCardSecurityNumber,true);
		$criteria->compare('PassportExpiry',$this->PassportExpiry,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}