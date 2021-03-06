<?php

/**
 * This is the model class for table "hotels".
 *
 * The followings are the available columns in table 'hotels':
 * @property integer $ID
 * @property string $Name
 * @property integer $Category
 * @property integer $CityId
 *
 * The followings are the available model relations:
 * @property Rooms $room
 * @property Cities $city
 */
class Hotel extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Hotel the static model class
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
        return 'hotels';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name', 'unique'),
            array('Email', 'email'),
            array('Name, Category, CityId', 'required'),
            array('CityId', 'numerical', 'integerOnly' => true),
            array('Name', 'length', 'max' => 255),
            array('Category', 'numerical', 'max' => 7, 'min' => 1, 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ID, Name, Category, CityId', 'safe', 'on' => 'search'),
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
            'city' => array(self::BELONGS_TO, 'Cities', 'CityId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ID' => 'ID',
            'Name' => 'Name',
            'Category' => 'Category',
            'CityId' => 'City',
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

        $criteria->compare('ID', $this->ID);
        $criteria->compare('HotelName', $this->Name, true);
        $criteria->compare('Category', $this->Category);
        $criteria->compare('CityName', $this->CityId);
        $criteria->compare('Tel', $this->Tel);
        $criteria->compare('Fax', $this->Fax, true);
        $criteria->compare('Address', $this->Adress);
        $criteria->compare('Email', $this->Email);
        $criteria->compare('Image', $this->Image);

        return new CActiveDataProvider('HotlesView', array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Create list of cities and their id and return as a list
     * This will be used easily in a comboBox or listbox on the view files
     * By Kmaran
     */
    public function getCities()
    {
        // get list of cities
        $cities = City::model()->findAll();
        // convert them to suitable format for comboBox or listbox
        $citiesArray = CHtml::listData($cities, 'Id', 'Name');
        return $citiesArray;
    }

    // get name of the city related to the specific Id
    public function getCityName($id)
    {
        // get name of city
        $cityName = City::model()->findByPK($id)->Name;
        return $cityName;
    }

}