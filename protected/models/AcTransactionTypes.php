<?php

/**
 * This is the model class for table "tr_ac_transaction_types".
 *
 * The followings are the available columns in table 'tr_ac_transaction_types':
 * @property string $id
 * @property string $type_name
 * @property string $category
 * @property string $descriptions
 * @property string $deleted_at
 * @property string $codes
 */
class AcTransactionTypes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcTransactionTypes the static model class
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
		return 'tr_ac_transaction_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_name', 'length', 'max' => 225),
			array('category', 'length', 'max' => 6),
			array('descriptions, deleted_at, codes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_name, category, descriptions, codes', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_name' => 'Type Name',
			'category' => 'Category',
			'descriptions' => 'Descriptions',
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

		$criteria->compare('id', $this->id, true);
		$criteria->compare('type_name', $this->type_name, true);
		$criteria->compare('category', $this->category, true);
		$criteria->compare('descriptions', $this->descriptions, true);

		$criteria->addCondition('deleted_at IS NULL');

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 30,
			),
		));
	}
}
