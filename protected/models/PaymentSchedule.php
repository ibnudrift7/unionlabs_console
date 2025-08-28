<?php

/**
 * This is the model class for table "tr_payment_schedule".
 *
 * The followings are the available columns in table 'tr_payment_schedule':
 * @property string $id
 * @property string $staff_id
 * @property string $proyek_id
 * @property string $start_date
 * @property string $end_date
 * @property string $payment_type
 * @property double $total_amount
 * @property string $status
 * @property integer $transaction_id
 * @property integer $company_id
 * @property integer $is_paid
 * @property string $created_at
 * @property string $updated_at
 * @property integer $bank_id
 */
class PaymentSchedule extends CActiveRecord
{
	// status list draft, paid, cancelled.
	const STATUS_LIST = [
		'draft' => 'Draft',
		'paid' => 'Paid',
		'cancelled' => 'Cancelled',
	];

	const STATUS_LIST_CREATE = [
		'draft' => 'Draft',
		'cancelled' => 'Cancelled',
	];

	const PAYMENT_TYPE_LIST = [
		'mingguan' => 'Mingguan',
		// 'harian' => 'Harian',
		'bulanan' => 'Bulanan',
	];

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentSchedule the static model class
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
		return 'tr_payment_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('staff_id, proyek_id, start_date, end_date, payment_type, total_amount', 'required'),
			array('transaction_id, is_paid', 'numerical', 'integerOnly' => true),
			array('total_amount', 'numerical'),
			array('staff_id', 'length', 'max' => 20),
			array('proyek_id', 'length', 'max' => 11),
			array('payment_type', 'length', 'max' => 8),
			array('status', 'length', 'max' => 9),
			array('created_at, updated_at, company_id, bank_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, staff_id, proyek_id, start_date, end_date, payment_type, total_amount, status, transaction_id, is_paid, created_at, updated_at', 'safe', 'on' => 'search'),
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
			'staff' => array(self::BELONGS_TO, 'StaffList', 'staff_id'),
			'proyek' => array(self::BELONGS_TO, 'Proyeks', 'proyek_id'),
			'transaction' => array(self::BELONGS_TO, 'AcTransactionsList', 'transaction_id'),
			// 'payments' => array(self::HAS_MANY, 'Payment', 'payment_schedule_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'staff_id' => 'Staff',
			'proyek_id' => 'Proyek',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'payment_type' => 'Payment',
			'total_amount' => 'Total Amount',
			'status' => 'Status',
			'transaction_id' => 'Transaction',
			'is_paid' => 'Is Paid',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'bank_id' => 'Bank',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('staff_id', $this->staff_id, true);
		$criteria->compare('proyek_id', $this->proyek_id, true);
		$criteria->compare('start_date', $this->start_date, true);
		$criteria->compare('end_date', $this->end_date, true);
		$criteria->compare('payment_type', $this->payment_type, true);
		$criteria->compare('total_amount', $this->total_amount);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('transaction_id', $this->transaction_id);
		$criteria->compare('is_paid', $this->is_paid);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

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

			$this->created_at = date('Y-m-d H:i:s');
		}
		return true;
	}

	public function createReportLastMonth($search = [])
	{
		$search = [
			'start_date' => $searchs['start_date'] ?? date('Y-m-01'),
			'end_date' => $searchs['end_date'] ?? date('Y-m-t'),
			'project_id' => \Yii::app()->session['project_active'],
		];

		$query = Yii::app()->db->createCommand()
			->select('DATE(start_date) as date, SUM(total_amount) as amount')
			->from('tr_payment_schedule')
			->where('start_date >= :start_date AND end_date <= :end_date AND is_paid=1 AND company_id=:company_id', [
				':start_date' => $search['start_date'],
				':end_date' => $search['end_date'],
				':company_id' => $search['project_id'],
			])
			->queryAll();

		if (count($query) > 0 && $query[0]['date'] == null) {
			return [];
		}

		$grandTotal = array_sum(array_column($query, 'amount'));

		return [
			'data' => $query,
			'grandTotal' => $grandTotal,
		];
	}
}
