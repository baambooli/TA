<?php

/**
 * This is the model class for table "cities_view".
 *
 * The followings are the available columns in table 'cities_view':
 * @property integer $Id
 * @property string $CityName
 * @property string $CountryName
 */
class CityView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CityView the static model class
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
		return 'cities_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CityName, CountryName', 'required'),
			array('Id', 'numerical', 'integerOnly'=>true),
			array('CityName, CountryName', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, CityName, CountryName', 'safe', 'on'=>'search'),
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
			'CityName' => 'City Name',
			'CountryName' => 'Country Name',
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
		$criteria->compare('CityName',$this->CityName,true);
		$criteria->compare('CountryName',$this->CountryName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    // By kamran
    public function primaryKey()
    {
        return 'Id';
    }
}