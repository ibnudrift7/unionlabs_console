<?php

/**
 * This is the model class for table "tr_ac_kas_bank".
 *
 * The followings are the available columns in table 'tr_ac_kas_bank':
 * @property string $id
 * @property string $bank_id
 * @property string $account_number
 * @property string $bank_name
 * @property double $saldo
 * @property integer $is_active
 * @property string $deleted_at
 * @property integer $company_id
 */
class AcKasBank extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcKasBank the static model class
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
		return 'tr_ac_kas_bank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_active', 'numerical', 'integerOnly' => true),
			array('saldo', 'numerical'),
			array('bank_id', 'length', 'max' => 11),
			array('account_number, bank_name', 'length', 'max' => 225),
			array('deleted_at, company_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bank_id, account_number, bank_name, saldo, is_active, deleted_at, company_id', 'safe', 'on' => 'search'),
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
			'bank' => array(self::BELONGS_TO, 'MBankList', 'bank_id'),
			'cashFlows' => array(self::HAS_MANY, 'AcCashFlow', 'bank_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bank_id' => 'Bank',
			'account_number' => 'Account Number',
			'bank_name' => 'Bank Name',
			'saldo' => 'Saldo',
			'is_active' => 'Is Active',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('bank_id', $this->bank_id, true);
		$criteria->compare('account_number', $this->account_number, true);
		$criteria->compare('bank_name', $this->bank_name, true);
		$criteria->compare('saldo', $this->saldo);
		$criteria->compare('is_active', $this->is_active);
		$criteria->addCondition('deleted_at IS NULL');

		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function beforeSave()
	{
		parent::beforeSave();
		if ($this->isNewRecord) {
			$this->company_id = \Yii::app()->session['project_active'];
		}
		return true;
	}
}
