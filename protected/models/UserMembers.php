<?php

/**
 * This is the model class for table "uni_user_members".
 *
 * The followings are the available columns in table 'uni_user_members':
 * @property string $id
 * @property string $email
 * @property string $password_hash
 * @property string $full_name
 * @property string $phone
 * @property string $date_of_birth
 * @property string $level_id
 * @property integer $points_balance
 * @property integer $is_active
 * @property integer $is_banned
 * @property string $created_at
 * @property string $updated_at
 */
class UserMembers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserMembers the static model class
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
		return 'uni_user_members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password_hash, full_name', 'required'),
			array('points_balance, is_active, is_banned', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>150),
			array('full_name', 'length', 'max'=>100),
			array('phone, level_id', 'length', 'max'=>20),
			array('date_of_birth, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password_hash, full_name, phone, date_of_birth, level_id, points_balance, is_active, is_banned, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password_hash' => 'Password Hash',
			'full_name' => 'Full Name',
			'phone' => 'Phone',
			'date_of_birth' => 'Date Of Birth',
			'level_id' => 'Level',
			'points_balance' => 'Points Balance',
			'is_active' => 'Active',
			'is_banned' => 'Banned',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password_hash',$this->password_hash,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('level_id',$this->level_id,true);
		$criteria->compare('points_balance',$this->points_balance);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_banned',$this->is_banned);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}