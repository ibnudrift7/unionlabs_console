<?php

/**
 * This is the model class for table "m_customer".
 *
 * The followings are the available columns in table 'm_customer':
 * @property string $id
 * @property string $company
 * @property string $person_name
 * @property string $telpon
 * @property string $phone_wa
 * @property integer $province_id
 * @property integer $city_id
 * @property string $deleted_at
 * @property integer $sorts
 * @property string $company_id
 *
 * The followings are the available model relations:
 * @property MSetCompany $company0
 * @property TrSpkSubkon[] $trSpkSubkons
 */
class MCustomer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MCustomer the static model class
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
		return 'm_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('province_id, city_id, sorts', 'numerical', 'integerOnly'=>true),
			array('company, person_name', 'length', 'max'=>225),
			array('telpon, phone_wa', 'length', 'max'=>50),
			array('company_id', 'length', 'max'=>10),
			array('deleted_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company, person_name, telpon, phone_wa, province_id, city_id, deleted_at, sorts, company_id', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'MSetCompany', 'company_id'),
			'trSpkSubkons' => array(self::HAS_MANY, 'TrSpkSubkon', 'project_client_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company' => 'Company',
			'person_name' => 'Person Name',
			'telpon' => 'Telpon',
			'phone_wa' => 'Phone Wa',
			'province_id' => 'Province',
			'city_id' => 'City',
			'deleted_at' => 'Deleted At',
			'sorts' => 'Sorts',
			'company_id' => 'Company',
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
		$criteria->compare('company',$this->company,true);
		$criteria->compare('person_name',$this->person_name,true);
		$criteria->compare('telpon',$this->telpon,true);
		$criteria->compare('phone_wa',$this->phone_wa,true);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('sorts',$this->sorts);

		$criteria->addCondition('deleted_at IS NULL');
		$criteria->order = 't.id DESC';
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 20,
			),
		));
	}

	// beforeSave
	public function beforeSave() {
		parent::beforeSave();
		if($this->isNewRecord) {
			$this->company_id = \Yii::app()->session['project_active'];
		}
		return true;
	}
}