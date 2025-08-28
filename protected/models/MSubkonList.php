<?php

/**
 * This is the model class for table "m_subkon_list".
 *
 * The followings are the available columns in table 'm_subkon_list':
 * @property string $id
 * @property string $name
 * @property string $jabatan
 * @property string $alamat
 * @property string $company_name
 * @property string $deleted_at
 * @property integer $company_id
 * @property integer $bank_id
 * @property string $bank_norek
 * @property string $bank_nama
 *
 * The followings are the available model relations:
 * @property TrSpkSubkon[] $trSpkSubkons
 * @property MBankList $bank
 */
class MSubkonList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MSubkonList the static model class
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
		return 'm_subkon_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, jabatan, company_name', 'length', 'max'=>225),
			array('alamat, deleted_at, company_id, bank_id, bank_norek, bank_nama', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, jabatan, alamat, company_name, deleted_at', 'safe', 'on'=>'search'),
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
			'trSpkSubkons' => array(self::HAS_MANY, 'TrSpkSubkon', 'subkon_id'),
			'bank' => array(self::BELONGS_TO, 'MBankList', 'bank_id'),
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
			'jabatan' => 'Jabatan',
			'alamat' => 'Alamat',
			'company_name' => 'Company Name',
			'deleted_at' => 'Deleted At',
			'company_id' => 'Company ID',
			'bank_id' => 'Bank Code',
			'bank_norek' => 'Bank Norek',
			'bank_nama' => 'Bank Nama',
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
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('company_name',$this->company_name,true);

		$criteria->addCondition('deleted_at IS NULL');
		$criteria->order = 't.id DESC';
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function beforeSave() {
		parent::beforeSave();
		if($this->isNewRecord) {
			$this->company_id = \Yii::app()->session['project_active'];
		}
		return true;
	}
}