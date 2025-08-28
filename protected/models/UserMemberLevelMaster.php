<?php

/**
 * This is the model class for table "uni_user_member_level_master".
 *
 * The followings are the available columns in table 'uni_user_member_level_master':
 * @property string $id
 * @property string $name
 * @property integer $min_points
 * @property string $discount_percentage
 */
class UserMemberLevelMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserMemberLevelMaster the static model class
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
		return 'uni_user_member_level_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, min_points', 'required'),
			array('min_points', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('discount_percentage', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, min_points, discount_percentage', 'safe', 'on'=>'search'),
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
			'min_points' => 'Min Points',
			'discount_percentage' => 'Discount Percentage',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('min_points',$this->min_points);
		$criteria->compare('discount_percentage',$this->discount_percentage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}