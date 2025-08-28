<?php

/**
 * This is the model class for table "uni_orders".
 *
 * The followings are the available columns in table 'uni_orders':
 * @property string $id
 * @property string $invoice_no
 * @property string $user_id
 * @property string $status_id
 * @property string $promotion_id
 * @property string $transaction_id
 * @property string $payment_method
 * @property string $payment_status
 * @property string $payment_settlement_at
 * @property string $courier_id
 * @property string $tracking_number
 * @property string $shipping_address_id
 * @property string $total_amount
 * @property string $discount_amount
 * @property integer $points_used
 * @property string $points_value
 * @property string $final_amount
 * @property string $shipping_fee
 * @property string $tax_amount
 * @property string $ppn_amount
 * @property string $order_notes
 * @property string $admin_notes
 * @property string $canceled_at
 * @property string $returned_at
 * @property string $source_channel
 * @property string $created_at
 * @property string $updated_at
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
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
		return 'uni_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status_id, shipping_address_id, total_amount, final_amount', 'required'),
			array('points_used', 'numerical', 'integerOnly'=>true),
			array('invoice_no, payment_method, source_channel', 'length', 'max'=>50),
			array('user_id, status_id, promotion_id, courier_id, shipping_address_id', 'length', 'max'=>20),
			array('transaction_id, tracking_number', 'length', 'max'=>100),
			array('payment_status', 'length', 'max'=>10),
			array('total_amount, discount_amount, points_value, final_amount, shipping_fee, tax_amount, ppn_amount', 'length', 'max'=>12),
			array('payment_settlement_at, order_notes, admin_notes, canceled_at, returned_at, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoice_no, user_id, status_id, promotion_id, transaction_id, payment_method, payment_status, payment_settlement_at, courier_id, tracking_number, shipping_address_id, total_amount, discount_amount, points_used, points_value, final_amount, shipping_fee, tax_amount, ppn_amount, order_notes, admin_notes, canceled_at, returned_at, source_channel, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'invoice_no' => 'Invoice No',
			'user_id' => 'User',
			'status_id' => 'Status',
			'promotion_id' => 'Promotion',
			'transaction_id' => 'Transaction',
			'payment_method' => 'Payment Method',
			'payment_status' => 'Payment Status',
			'payment_settlement_at' => 'Payment Settlement At',
			'courier_id' => 'Courier',
			'tracking_number' => 'Tracking Number',
			'shipping_address_id' => 'Shipping Address',
			'total_amount' => 'Total Amount',
			'discount_amount' => 'Discount Amount',
			'points_used' => 'Points Used',
			'points_value' => 'Points Value',
			'final_amount' => 'Final Amount',
			'shipping_fee' => 'Shipping Fee',
			'tax_amount' => 'Tax Amount',
			'ppn_amount' => 'Ppn Amount',
			'order_notes' => 'Order Notes',
			'admin_notes' => 'Admin Notes',
			'canceled_at' => 'Canceled At',
			'returned_at' => 'Returned At',
			'source_channel' => 'Source Channel',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('invoice_no',$this->invoice_no,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('status_id',$this->status_id,true);
		$criteria->compare('promotion_id',$this->promotion_id,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('payment_settlement_at',$this->payment_settlement_at,true);
		$criteria->compare('courier_id',$this->courier_id,true);
		$criteria->compare('tracking_number',$this->tracking_number,true);
		$criteria->compare('shipping_address_id',$this->shipping_address_id,true);
		$criteria->compare('total_amount',$this->total_amount,true);
		$criteria->compare('discount_amount',$this->discount_amount,true);
		$criteria->compare('points_used',$this->points_used);
		$criteria->compare('points_value',$this->points_value,true);
		$criteria->compare('final_amount',$this->final_amount,true);
		$criteria->compare('shipping_fee',$this->shipping_fee,true);
		$criteria->compare('tax_amount',$this->tax_amount,true);
		$criteria->compare('ppn_amount',$this->ppn_amount,true);
		$criteria->compare('order_notes',$this->order_notes,true);
		$criteria->compare('admin_notes',$this->admin_notes,true);
		$criteria->compare('canceled_at',$this->canceled_at,true);
		$criteria->compare('returned_at',$this->returned_at,true);
		$criteria->compare('source_channel',$this->source_channel,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}