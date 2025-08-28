<?php

/**
 * This is the model class for table "bw_enquire_form".
 *
 * The followings are the available columns in table 'bw_enquire_form':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string $phones
 * @property string $created_at
 * @property string $ip_address
 */
class EnquireForm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EnquireForm the static model class
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
		return 'bw_enquire_form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>100),
			array('email', 'length', 'max'=>150),
			array('phones', 'length', 'max'=>50),
			array('ip_address', 'length', 'max'=>45),
			array('message, created_at, verifyCode', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, message, phones, created_at, ip_address', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'email' => 'Email',
			'message' => 'Message',
			'phones' => 'Phones',
			'created_at' => 'Date Input',
			'ip_address' => 'Ip Address',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('phones',$this->phones,true);
		// $criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('ip_address',$this->ip_address,true);

		$criteria->order = 't.id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// beforesave 
	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->created_at = date('Y-m-d H:i:s');
			$this->ip_address = $_SERVER['REMOTE_ADDR'];
		}
		return parent::beforeSave();
	}

}