<?php

/**
 * This is the model class for table "tr_proyeks".
 *
 * The followings are the available columns in table 'tr_proyeks':
 * @property string $id
 * @property string $codes
 * @property string $names
 * @property integer $customer_id
 * @property string $start_date
 * @property string $end_date
 * @property string $budget
 * @property string $status
 * @property string $deleted_at
 * @property integer $company_id
 * @property string $pic
 * @property string $progress
 * @property string $notes
 * @property string $lokasi_proyek
 */
class Proyeks extends CActiveRecord
{
	const STATUS_PROJECT = [
		'pending' => 'Pending',
		'process' => 'On Progress',
		'dones' => 'Completed',
		'hold' => 'Hold',
	];
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proyeks the static model class
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
		return 'tr_proyeks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('names', 'required'),
			array('names', 'length', 'max' => 100),
			// array('customer_id', 'length', 'max' => 20),
			array('budget', 'length', 'max' => 15),
			array('status', 'length', 'max' => 11),
			array('start_date, end_date, deleted_at, company_id, codes, progress, notes, lokasi_proyek, customer_id, pic', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, names, customer_id, start_date, end_date, budget, status', 'safe', 'on' => 'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'paymentSchedules' => array(self::HAS_MANY, 'PaymentSchedule', 'proyek_id'),
			'staffs' => array(self::HAS_MANY, 'Staff', 'proyek_id'),
			'transactions' => array(self::HAS_MANY, 'AcTransactionsList', 'project_id'),
			'cashFlows' => array(self::HAS_MANY, 'AcCashFlow', 'transaction_id'),
			'bank' => array(self::BELONGS_TO, 'AcKasBank', 'bank_id'),
			'company' => array(self::BELONGS_TO, 'MSetCompany', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codes' => 'Kode Proyek',
			'names' => 'Nama Proyek',
			'customer_id' => 'Klien/Pemilik',
			'pic' => 'Penanggung Jawab (PIC)',
			'start_date' => 'Tanggal Mulai',
			'end_date' => 'Tanggal Selesai',
			'budget' => 'Total Anggaran',
			'status' => 'Status',
			'progress' => 'Progress',
			'notes' => 'Notes',
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
		$criteria->compare('names', $this->names, true);
		$criteria->compare('customer_id', $this->customer_id, true);
		$criteria->compare('start_date', $this->start_date, true);
		$criteria->compare('end_date', $this->end_date, true);
		$criteria->compare('budget', $this->budget, true);
		$criteria->compare('status', $this->status, true);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		// deleted_at is null
		$criteria->addCondition('deleted_at IS NULL');

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
