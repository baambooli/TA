<?php

/**
 * This is the model class for table "cities".
 *
 * The followings are the available columns in table 'cities':
 * @property integer $Id
 * @property string $Name
 * @property integer $countryId
 *
 * The followings are the available model relations:
 * @property Airports[] $airports
 * @property Countries $country
 * @property Hotels[] $hotels
 */
class City extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return City the static model class
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
        return 'cities';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name, countryId', 'required'),
            array('countryId', 'numerical', 'integerOnly' => true),
            array('Name', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, Name, countryId', 'safe', 'on' => 'search'),
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
            'airports' => array(self::HAS_MANY, 'Airports', 'CityId'),
            'country' => array(self::BELONGS_TO, 'Countries', 'countryId'),
            'hotels' => array(self::HAS_MANY, 'Hotels', 'CityId'),
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
            'countryId' => 'Country',
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
        $criteria->compare('countryId', $this->countryId);

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