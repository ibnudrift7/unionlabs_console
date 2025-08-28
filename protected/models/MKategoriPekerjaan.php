<?php

/**
 * This is the model class for table "m_kategori_pekerjaan".
 *
 * The followings are the available columns in table 'm_kategori_pekerjaan':
 * @property string $id
 * @property integer $parent_id
 * @property string $name
 * @property string $label
 * @property string $deleted_at
 *
 * The followings are the available model relations:
 * @property TrSpkSubkonDetail[] $trSpkSubkonDetails
 * @property TrSpkSubkonDetail[] $trSpkSubkonDetails1
 */
class MKategoriPekerjaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MKategoriPekerjaan the static model class
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
		return 'm_kategori_pekerjaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name, label', 'length', 'max'=>225),
			array('deleted_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, name, label, deleted_at', 'safe', 'on'=>'search'),
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
			'trSpkSubkonDetails' => array(self::HAS_MANY, 'TrSpkSubkonDetail', 'kategori_id'),
			'trSpkSubkonDetails1' => array(self::HAS_MANY, 'TrSpkSubkonDetail', 'sub_kategori_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'name' => 'Name',
			'label' => 'Label',
			'deleted_at' => 'Deleted At',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('label',$this->label,true);
		
		$criteria->addCondition('deleted_at IS NULL');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}