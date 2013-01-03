<?php

/**
 * This is the model class for table "searchhotel_view".
 *
 * The followings are the available columns in table 'searchhotel_view':
 * @property string $CountryName
 * @property string $CityName
 * @property string $HotelName
 * @property integer $HotelCategory
 * @property string $HotelTel
 * @property string $HotelFax
 * @property string $HotelAddress
 * @property string $HotelEmail
 * @property string $HotelImage
 * @property string $RoomNumber
 * @property string $RoomTel
 * @property string $RoomType
 * @property integer $RoomCapacity
 * @property integer $RoomClientId
 * @property string $StartDate
 * @property string $EndDate
 * @property string $Status
 * @property string $ClientName
 * @property string $ClientFamily
 * @property string $ClientBirthDay
 * @property string $ClientAddress
 * @property string $ClientTel
 * @property string $ClientEmail
 * @property string $ClientUsername
 */
class SearchHotelView extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SearchHotelView the static model class
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
        return 'searchhotel_view';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CountryName, CityName, HotelName, HotelCategory, RoomNumber, RoomTel, RoomType, RoomCapacity, StartDate, EndDate, ClientBirthDay, ClientTel, ClientEmail, ClientUsername', 'required'),
            array('HotelCategory, RoomCapacity, RoomClientId', 'numerical', 'integerOnly' => true),
            array('CountryName, CityName, RoomType, Status, ClientName', 'length', 'max' => 50),
            array('HotelName, HotelAddress', 'length', 'max' => 255),
            array('HotelTel, HotelFax, RoomNumber, ClientTel', 'length', 'max' => 20),
            array('HotelEmail, HotelImage', 'length', 'max' => 100),
            array('RoomTel', 'length', 'max' => 25),
            array('ClientFamily', 'length', 'max' => 70),
            array('ClientAddress', 'length', 'max' => 200),
            array('ClientEmail, ClientUsername', 'length', 'max' => 256),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('CountryName, CityName, HotelName, HotelCategory, HotelTel, HotelFax, HotelAddress, HotelEmail, HotelImage, RoomNumber, RoomTel, RoomType, RoomCapacity, RoomClientId, StartDate, EndDate, Status, ClientName, ClientFamily, ClientBirthDay, ClientAddress, ClientTel, ClientEmail, ClientUsername', 'safe', 'on' => 'search'),
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
            'CountryName' => 'Country Name',
            'CityName' => 'City Name',
            'HotelName' => 'Hotel Name',
            'HotelCategory' => 'Hotel Category',
            'HotelTel' => 'Hotel Tel',
            'HotelFax' => 'Hotel Fax',
            'HotelAddress' => 'Hotel Address',
            'HotelEmail' => 'Hotel Email',
            'HotelImage' => 'Hotel Image',
            'RoomNumber' => 'Room Number',
            'RoomTel' => 'Room Tel',
            'RoomType' => 'Room Type',
            'RoomCapacity' => 'Room Capacity',
            'RoomClientId' => 'Room Client',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
            'Status' => 'Status',
            'ClientName' => 'Client Name',
            'ClientFamily' => 'Client Family',
            'ClientBirthDay' => 'Client Birth Day',
            'ClientAddress' => 'Client Address',
            'ClientTel' => 'Client Tel',
            'ClientEmail' => 'Client Email',
            'ClientUsername' => 'Client Username',
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

        $criteria->compare('HotelName', $this->HotelName, true);
        $criteria->compare('HotelCategory', $this->HotelCategory);
        $criteria->compare('HotelTel', $this->HotelTel, true);
        $criteria->compare('HotelFax', $this->HotelFax, true);
        $criteria->compare('HotelAddress', $this->HotelAddress, true);
        $criteria->compare('HotelEmail', $this->HotelEmail, true);
        $criteria->compare('HotelImage', $this->HotelImage, true);
        $criteria->compare('RoomNumber', $this->RoomNumber, true);
        $criteria->compare('RoomTel', $this->RoomTel, true);
        $criteria->compare('RoomClientId', $this->RoomClientId);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);
        $criteria->compare('Status', $this->Status, true);
        $criteria->compare('ClientName', $this->ClientName, true);
        $criteria->compare('ClientFamily', $this->ClientFamily, true);
        $criteria->compare('ClientBirthDay', $this->ClientBirthDay, true);
        $criteria->compare('ClientAddress', $this->ClientAddress, true);
        $criteria->compare('ClientTel', $this->ClientTel, true);
        $criteria->compare('ClientEmail', $this->ClientEmail, true);
        $criteria->compare('ClientUsername', $this->ClientUsername, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    // primary key of view
    Public function primaryKey()
    {
        return 'RoomClientId';
    }

}