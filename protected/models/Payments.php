<?php

/**
 * This is the model class for table "uni_payments".
 *
 * The followings are the available columns in table 'uni_payments':
 * @property string $id
 * @property string $order_id
 * @property string $transaction_id
 * @property string $provider
 * @property string $method
 * @property string $amount
 * @property string $status
 * @property string $raw_response
 * @property string $created_at
 * @property string $updated_at
 */
class Payments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payments the static model class
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
		return 'uni_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, amount', 'required'),
			array('order_id', 'length', 'max'=>20),
			array('transaction_id', 'length', 'max'=>100),
			array('provider, method', 'length', 'max'=>50),
			array('amount', 'length', 'max'=>12),
			array('status', 'length', 'max'=>10),
			array('raw_response, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, transaction_id, provider, method, amount, status, raw_response, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'transaction_id' => 'Transaction',
			'provider' => 'Provider',
			'method' => 'Method',
			'amount' => 'Amount',
			'status' => 'Status',
			'raw_response' => 'Raw Response',
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
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('provider',$this->provider,true);
		$criteria->compare('method',$this->method,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('raw_response',$this->raw_response,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}