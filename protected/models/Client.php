<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $Id
 * @property string $Name
 * @property string $Family
 * @property string $Address
 * @property string $tell
 * @property string $PassportNumber
 * @property integer $RoomlId
 * @property string $CreditCardType
 * @property string $CreditCardExpiryDate
 * @property string $CreditCardHolderName
 * @property string $CreditCardSecurityNumber
 * @property string $CreditCardNumber
 *
 * The followings are the available model relations:
 * @property RoomClients[] $roomClients
 */
class Client extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Client the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'clients';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name, Family, BirthDay, Sex, CountryId, Address, tell, PassportNumber', 'required', 'except' => 'register'),
            array('PassportNumber, UserId', 'unique'),
            array('Name, PassportNumber', 'length', 'max' => 50),
            array('Family', 'length', 'max' => 70),
            array('Address', 'length', 'max' => 200),
            array('tell', 'length', 'max' => 20),
            array('UserId', 'safe'),
            array('CreditCardType, CreditCardExpiryDate, CreditCardHolderName, CreditCardSecurityNumber, CreditCardNumber', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, Name, Family, Address, tell, PassportNumber, CreditCardType, CreditCardExpiryDate, CreditCardHolderName, CreditCardSecurityNumber, CreditCardNumber, Sex, Image', 'safe', 'on' => 'search'),
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
            'roomClients' => array(self::HAS_MANY, 'RoomClients', 'ClientId'),
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
            'Family' => 'Family',
            'Sex' => 'Sex',
            'Image' => 'Client\'s Image',
            'tell' => 'Telephone',
            'BirthDay' => 'BirthDay (yyyy-mm-dd)',
            'CountryId' => 'Country',
            'PassportNumber' => 'Passport Number',
            'CreditCardType' => 'Credit Card Type',
            'CreditCardExpiryDate' => 'Credit Card Expiry Date',
            'CreditCardHolderName' => 'Credit Card Holder Name',
            'CreditCardSecurityNumber' => 'Credit Card Security Number',
            'CreditCardNumber' => 'Credit Card Number',
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
        // read global variable from /protected/config/main.php file
        $key = Yii::app()->params['key'];

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('Name', $this->Name, true);
        $criteria->compare('Family', $this->Family, true);
        $criteria->compare('Address', $this->Address, true);
        $criteria->compare('tell', $this->tell, true);
        $criteria->compare('PassportNumber', $this->PassportNumber, true);
        $criteria->compare('CreditCardType', $this->CreditCardType, true);
        $criteria->compare('CreditCardExpiryDate', $this->CreditCardExpiryDate, true);
        $criteria->compare('CreditCardHolderName', $this->CreditCardHolderName, true);
        $criteria->compare('CreditCardSecurityNumber', $this->CreditCardSecurityNumber, true);
        $criteria->compare('CreditCardNumber', AES::aes256Decrypt($key, $this->CreditCardNumber), true);
        $criteria->compare('UserId', $this->UserId, true);
        $criteria->compare('Sex', $this->Sex, true);
        $criteria->compare('Image', $this->Image, true);
        $criteria->compare('BirthDay', $this->BirthDay, true);
        
        // kamran
        $criteria->condition('Name NOT NULL');
        
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Create list of EmptyRooms and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getEmptyRooms($startDate, $endDate)
    {
        $rooms = Room::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $romsArray = CHtml::listData($rooms, 'Id', 'RoomNumber');
        return $roomsArray;
    }

    // get number of the Room related to the specific Id
    public function getRoomNumber($id)
    {
        $roomNumber = Room::model()->findByPK($id)->RoomNumber;
        return $roomNumber;
    }

    /**
     * Create list of countries and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getCountries()
    {
        // get list of countries
        $countries = Country::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $countriesArray = CHtml::listData($countries, 'Id', 'Name');
        return $countriesArray;
    }

    // get name of the Country related to the specific Id
    public function getCountryName($id)
    {
        // get name of Country
        $CountryName = Country::model()->findByPK($id)->Name;
        return $CountryName;
    }

}