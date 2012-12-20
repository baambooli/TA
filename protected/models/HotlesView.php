<?php

/**
 * This is the model class for table "hotles_view".
 *
 * The followings are the available columns in table 'hotles_view':
 * @property string $cityName
 * @property integer $ID
 * @property string $HotelName
 * @property integer $Category
 */
class HotlesView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotlesView the static model class
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
		return 'hotles_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, Category', 'numerical', 'integerOnly'=>true),
			array('CityName', 'length', 'max'=>50),
			array('HotelName', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CityName, ID, HotelName, Category', 'safe', 'on'=>'search'),
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
			'CityName' => 'City Name',
			'ID' => 'ID',
			'HotelName' => 'Hotel Name',
			'Category' => 'Category',
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

		$criteria->compare('CityName',$this->CityName,true);
		$criteria->compare('ID',$this->ID);
		$criteria->compare('HotelName',$this->HotelName,true);
		$criteria->compare('Category',$this->Category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    // added By kamran
    // IMPORTANT: if we do not add a primary key to view, Gii does not create
    // corect code for us, and update, edit, delete icons does not work correctly
    public function primaryKey()
    {
        return 'ID';
    }
}