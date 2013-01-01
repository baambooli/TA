<?php

/**
 * This is the model class for table "airport_view".
 *
 * The followings are the available columns in table 'airport_view':
 * @property integer $Id
 * @property string $AirportName
 * @property string $Address
 * @property string $CityName
 * @property string $Tel1
 */
class AirportView extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AirportView the static model class
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
        return 'airport_view';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('AirportName, CityName, Tel1, Address', 'required'),
            array('Id', 'numerical', 'integerOnly' => true),
            array('AirportName', 'length', 'max' => 100),
            array('Address', 'length', 'max' => 255),
            array('CityName', 'length', 'max' => 50),
            array('Tel1', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, AirportName, Address, CityName, Tel1', 'safe', 'on' => 'search'),
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
            'AirportName' => 'Airport Name',
            'Address' => 'Address',
            'CityName' => 'City Name',
            'Tel1' => 'Tel1',
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
        $criteria->compare('AirportName', $this->AirportName, true);
        $criteria->compare('Address', $this->Address, true);
        $criteria->compare('CityName', $this->CityName, true);
        $criteria->compare('Tel1', $this->Tel1, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    // By kamran
    public function primaryKey()
    {
        return 'Id';
    }

}