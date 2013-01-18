<?php

/**
 * This is the model class for table "airlines".
 *
 * The followings are the available columns in table 'airlines':
 * @property integer $Id
 * @property string $Name
 * @property integer $CountryId
 * @property string $Address
 * @property string $Tell1
 * @property string $Tell2
 * @property string $Fax
 * @property string $Email
 *
 * The followings are the available model relations:
 * @property Airplanes[] $airplanes
 */
class Airline extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Airline the static model class
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
        return 'airlines';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name, Address, Tell1, Fax, CountryId', 'required'),
            array('Name, Address, Fax', 'length', 'max' => 255),
            array('Tell1, Tell2', 'length', 'max' => 25),
            array('Email', 'length', 'max' => 100),
            array('Email', 'email'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, Name, CountryId, Address, Tell1, Tell2, Fax, Email', 'safe', 'on' => 'search'),
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
            'airplanes' => array(self::HAS_MANY, 'Airplanes', 'AirlineId'),
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
            'CountryId' => 'Country',
            'Address' => 'Address',
            'Tell1' => 'Telephone1',
            'Tell2' => 'Telephone2',
            'Fax' => 'Fax',
            'Email' => 'Email',
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

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('Name', $this->Name, true);
        $criteria->compare('Address', $this->Address, true);
        $criteria->compare('Tell1', $this->Tell1, true);
        $criteria->compare('Tell2', $this->Tell2, true);
        $criteria->compare('Fax', $this->Fax, true);
        $criteria->compare('Email', $this->Email, true);
        $criteria->compare('CountryId', $this->CountryId, true);
        
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
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