<?php

/**
 * This is the model class for table "uni_user_addresses".
 *
 * The followings are the available columns in table 'uni_user_addresses':
 * @property string $id
 * @property string $user_id
 * @property string $recipient_name
 * @property string $phone
 * @property string $address_line
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property integer $is_default
 * @property string $created_at
 */
class UserAddresses extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserAddresses the static model class
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
		return 'uni_user_addresses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, address_line', 'required'),
			array('is_default', 'numerical', 'integerOnly'=>true),
			array('user_id, phone, postal_code', 'length', 'max'=>20),
			array('recipient_name, city, province', 'length', 'max'=>100),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, recipient_name, phone, address_line, city, province, postal_code, is_default, created_at', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'recipient_name' => 'Recipient Name',
			'phone' => 'Phone',
			'address_line' => 'Address Line',
			'city' => 'City',
			'province' => 'Province',
			'postal_code' => 'Postal Code',
			'is_default' => 'Is Default',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('recipient_name',$this->recipient_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address_line',$this->address_line,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('is_default',$this->is_default);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}