<?php

/**
 * This is the model class for table "uni_order_detail_shipping_history".
 *
 * The followings are the available columns in table 'uni_order_detail_shipping_history':
 * @property string $id
 * @property string $order_id
 * @property string $courier_id
 * @property string $tracking_number
 * @property string $status
 * @property string $status_code
 * @property string $status_date
 * @property string $location
 * @property string $notes
 * @property string $created_at
 */
class OrderDetailShippingHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderDetailShippingHistory the static model class
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
		return 'uni_order_detail_shipping_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, courier_id, tracking_number, status, status_date', 'required'),
			array('order_id, courier_id', 'length', 'max'=>20),
			array('tracking_number', 'length', 'max'=>100),
			array('status, status_code', 'length', 'max'=>50),
			array('location', 'length', 'max'=>255),
			array('notes, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, courier_id, tracking_number, status, status_code, status_date, location, notes, created_at', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'order_id' => 'Order',
			'courier_id' => 'Courier',
			'tracking_number' => 'Tracking Number',
			'status' => 'Status',
			'status_code' => 'Status Code',
			'status_date' => 'Status Date',
			'location' => 'Location',
			'notes' => 'Notes',
			'created_at' => 'Created At',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('courier_id',$this->courier_id,true);
		$criteria->compare('tracking_number',$this->tracking_number,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('status_code',$this->status_code,true);
		$criteria->compare('status_date',$this->status_date,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}