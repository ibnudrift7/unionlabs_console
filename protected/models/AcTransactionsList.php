<?php

/**
 * This is the model class for table "tr_ac_transactions_list".
 *
 * The followings are the available columns in table 'tr_ac_transactions_list':
 * @property string $id
 * @property string $bank_id
 * @property string $no_trx
 * @property string $date_trx
 * @property integer $project_id
 * @property integer $type_id
 * @property integer $company_id
 * @property string $amount
 * @property string $description
 * @property string $trx_tipe
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $payment_schedule_id
 * @property string $trigger_trx_type
 * @property string $trigger_trx_no
 * @property string $paid_date
 */

class AcTransactionsList extends CActiveRecord
{
	const trigger_dana_masuk = 'dana_masuk';
	const trigger_overheat = 'overheat';
	const trigger_purchase_order = 'purchase_order';
	const trigger_opname_spk = 'opname_spk';
	const trigger_adendum_spk = 'adendum_opname_spk';
	const trigger_gaji_karyawan = 'gaji_karyawan';
	const trigger_admin_bank = 'admin_bank';
	const trigger_restitusi_pajak = 'restitusi_pajak';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcTransactionsList the static model class
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
		return 'tr_ac_transactions_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('project_id', 'numerical', 'integerOnly' => true),
			array('bank_id', 'length', 'max' => 11),
			array('amount', 'length', 'max' => 15),
			array('trx_tipe', 'length', 'max' => 6),
			array('date_trx, description, created_at, updated_at, deleted_at, type_id, payment_schedule_id, project_id, no_trx, trigger_trx_no, trigger_trx_type, company_id, paid_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bank_id, date_trx, project_id, type_id, amount, description, trx_tipe, created_at, updated_at, deleted_at, payment_schedule_id', 'safe', 'on' => 'search'),
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
			'bank' => array(self::BELONGS_TO, 'AcKasBank', 'bank_id'),
			'project' => array(self::BELONGS_TO, 'Proyeks', 'project_id'),
			'types' => array(self::BELONGS_TO, 'AcTransactionTypes', 'type_id'),
			'paymentSchedule' => array(self::BELONGS_TO, 'PaymentSchedule', 'payment_schedule_id'),
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
			'date_trx' => 'Tanggal Trx.',
			'project_id' => 'Project',
			'type_id' => 'Tipe Trx',
			'amount' => 'Nominal',
			'description' => 'Description',
			'trx_tipe' => 'Category',
			'created_at' => 'Created',
			'updated_at' => 'Updated At',
			'deleted_at' => 'Deleted At',
			'payment_schedule_id' => 'Payment Staff',
			'paid_date' => 'Tgl. Bayar',
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
		$criteria->compare('date_trx', $this->date_trx, true);
		$criteria->compare('project_id', $this->project_id);
		$criteria->compare('type_id', $this->type_id, true);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('trx_tipe', $this->trx_tipe, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('payment_schedule_id', $this->payment_schedule_id, true);

		// $criteria->compare('deleted_at',$this->deleted_at,true);
		$criteria->addCondition('t.deleted_at IS NULL');
		$criteria->addCondition('t.company_id = ' . \Yii::app()->session['project_active']);

		if (!$this->date_trx) {
			$criteria->order = 't.date_trx DESC';
		}

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 100,
			),
		));
	}

	// beforeSave
	public function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->created_at = date('Y-m-d H:i:s');
			}
			$this->company_id = \Yii::app()->session['project_active'];

			return true;
		} else {
			return false;
		}
	}

	public static function generateNoTrx()
	{
		$no_trx = 'TRX-' . time() . '-' . mt_rand(10000, 99999);
		return $no_trx;
	}

	// triggerSaveTrx
	// trigger_trx_type
	// trigger_trx_no
	// bank_id
	// project_id
	// type_id
	// trx_tipe
	// amount
	// description
	// payment_schedule_id
	// paid_date
	public static function triggerSaveTrx($trigger_trx_type, $trigger_trx_no = '', $data = array())
	{
		if (!isset($data['bank_id'])) {
			throw new CHttpException(400, 'Bank ID tidak ditemukan');
			return false;
		}
		
		$nSaveModel = AcTransactionsList::model()->findByAttributes(array(
			'trigger_trx_type' => $trigger_trx_type,
			'trigger_trx_no' => $trigger_trx_no,
		));
		if ($nSaveModel->trigger_trx_no == NULL) {
			$nSaveModel = new AcTransactionsList();
			$sts_input = 'insert';
			$data = array_merge($data, array(
				'trigger_trx_type' => $trigger_trx_type,
				'trigger_trx_no' => $trigger_trx_no,
			));
		} else if(!empty($nSaveModel->trigger_trx_no)) {
			$sts_input = 'update';
			// $nSaveModel = AcTransactionsList::model()->findByAttributes(array(
			// 	'trigger_trx_type' => $trigger_trx_type,
			// 	'trigger_trx_no' => $trigger_trx_no,
			// ));
		}
		// echo $trigger_trx_type. ' - ' . $trigger_trx_no . '<br>';
		// echo $sts_input;
		// echo '<pre>';
		// print_r($nSaveModel->attributes);
		// exit;
		
		// flow insert data get from $data
		$nSaveModel->bank_id = $data['bank_id'];
		$nSaveModel->date_trx = date('Y-m-d H:i:s');
		$nSaveModel->project_id = $data['project_id'];
		$nSaveModel->type_id = $data['type_id'];
		$nSaveModel->amount = $data['amount'];
		$nSaveModel->description = $data['description'];
		$nSaveModel->trx_tipe = $data['trx_tipe'];
		$nSaveModel->created_at = date('Y-m-d H:i:s');
		$nSaveModel->payment_schedule_id = $data['payment_schedule_id'];
		$nSaveModel->no_trx = ($sts_input === 'insert') ? self::generateNoTrx() : $nSaveModel->no_trx;
		$nSaveModel->paid_date = isset($data['paid_date']) ? $data['paid_date'] : NULL;
		
		if($sts_input == 'insert'){
			$nSaveModel->trigger_trx_type = $trigger_trx_type;
			$nSaveModel->trigger_trx_no = $trigger_trx_no;
			$nSaveModel->company_id = \Yii::app()->session['project_active'];
		}
		$nSaveModel->save(false);

			// check if bank_id is not enough balance
			/*
			if ($data['trx_tipe'] === 'kredit') {
				$bankLast = AcCashFlow::model()->getLastBalance($data['bank_id']);
				if (($bankLast) < $data['amount']) {
					return [
						'status' => 'error',
						'message' => 'Saldo Bank tidak mencukupi untuk transaksi ini, Silahkan periksa dan tambahkan saldo bank terlebih dahulu',
					];
					die();
				}
			}
			*/

			if ($nSaveModel->hasErrors()) {
				$error = $nSaveModel->getErrors();
				return [
					'status' => 'error',
					'message' => $error,
					'data' => false,
				];
				die(0);
			} else {
				return [
					'status' => 'success',
					'message' => 'Data transaksi berhasil disimpan',
					'data' => $nSaveModel->no_trx,
				];
				die(0);
			}
	}
	// end function
}
