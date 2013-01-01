<?php

/**
 * This is the model class for table "room_clients".
 *
 * The followings are the available columns in table 'room_clients':
 * @property integer $Id
 * @property integer $RoomId
 * @property integer $ClientId
 * @property string $StartDate
 * @property string $EndDate
 *
 * The followings are the available model relations:
 * @property Clients $client
 * @property Rooms $room
 */
class RoomClient extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return RoomClient the static model class
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
        return 'room_clients';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('RoomId, ClientId, StartDate, EndDate', 'required'),
            array('RoomId, ClientId', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('Id, RoomId, ClientId, StartDate, EndDate', 'safe', 'on' => 'search'),
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
            'client' => array(self::BELONGS_TO, 'Clients', 'ClientId'),
            'room' => array(self::BELONGS_TO, 'Rooms', 'RoomId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'RoomId' => 'Room',
            'ClientId' => 'Client',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
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
        $criteria->compare('RoomId', $this->RoomId);
        $criteria->compare('ClientId', $this->ClientId);
        $criteria->compare('StartDate', $this->StartDate, true);
        $criteria->compare('EndDate', $this->EndDate, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}