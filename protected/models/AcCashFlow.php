<?php

/**
 * This is the model class for table "tr_ac_cash_flow".
 *
 * The followings are the available columns in table 'tr_ac_cash_flow':
 * @property string $id
 * @property string $bank_id
 * @property string $transaction_id
 * @property string $flow_date
 * @property string $amount
 * @property string $direction
 * @property string $before_balance
 * @property string $current_balance
 * @property integer $company_id
 * @property string $deleted_at
 * @property string $paid_date
 */
class AcCashFlow extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcCashFlow the static model class
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
		return 'tr_ac_cash_flow';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_id', 'length', 'max' => 11),
			array('transaction_id', 'length', 'max' => 20),
			array('amount, before_balance, current_balance', 'length', 'max' => 15),
			array('direction', 'length', 'max' => 3),
			array('flow_date, company_id, paid_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bank_id, transaction_id, flow_date, amount, direction, before_balance, current_balance', 'safe', 'on' => 'search'),
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
			'transaction' => array(self::BELONGS_TO, 'AcTransactionsList', 'transaction_id'),
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
			'transaction_id' => 'Transaction',
			'flow_date' => 'Flow Date',
			'amount' => 'Amount',
			'direction' => 'Direction',
			'paid_date' => 'Tgl. Bayar',
			'before_balance' => 'Before Balance',
			'current_balance' => 'Current Balance',
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
		$criteria->compare('transaction_id', $this->transaction_id, true);
		// $criteria->compare('flow_date', $this->flow_date, true);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('direction', $this->direction, true);
		$criteria->compare('before_balance', $this->before_balance, true);
		$criteria->compare('current_balance', $this->current_balance, true);

		//  %2025-05-01 - 2025-05-06%
		$statusSearch = false;
		if (isset($_GET['AcCashFlow']['flow_date']) && $_GET['AcCashFlow']['flow_date'] != '') {
			$criteria->addCondition("flow_date >= :start_date AND flow_date <= :end_date");
			$dates = explode(' - ', $_GET['AcCashFlow']['flow_date']);
			$start_date = date('Y-m-d', strtotime($dates[0]));
			$end_date = date('Y-m-d', strtotime($dates[1]));
			$criteria->params[':start_date'] = $start_date;
			$criteria->params[':end_date'] = $end_date . ' 23:59:59';

			$statusSearch = true;
		}

		// company_id get from active project
		$criteria->compare('t.company_id', \Yii::app()->session['project_active']);
		$criteria->addCondition('deleted_at IS NULL');

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => $statusSearch ? false : array(
				'pageSize' => 100,
			),
			'sort' => array(
				'defaultOrder' => 't.id ASC',
			),
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

	// get Calculate Mutasi Balance
	public function getMutasiBalance($bank_id, $flow_date)
	{
		if (strpos($flow_date, ' - ') !== false) {
			$dates = explode(' - ', $flow_date);
			$start_date = date('Y-m-d', strtotime($dates[0]));
			$end_date = date('Y-m-d', strtotime($dates[1])); 

			$mutasi = AcCashFlow::model()->findAll(array(
				'condition' => 'bank_id = :bank_id AND flow_date BETWEEN :start_date AND :end_date AND deleted_at IS NULL',
				'params' => array(':bank_id' => $bank_id, ':start_date' => $start_date . ' 00:00:00', ':end_date' => $end_date . ' 23:59:59'),
				'order' => 'flow_date DESC',
			));
		} else {
			$mutasi = AcCashFlow::model()->findAll(array(
				'condition' => 'bank_id = :bank_id AND flow_date <= :flow_date AND deleted_at IS NULL',
				'params' => array(':bank_id' => $bank_id, ':flow_date' => $flow_date . ' 23:59:59'),
				'order' => 'flow_date DESC',
			));
		}

		// get saldo awal, mutasi kredit, mutasi debit, saldo akhir
		$saldo_awal = 0;
		$mutasi_kredit = 0;
		$mutasi_debit = 0;
		$saldo_akhir = 0;
		// $arr_debit = [];
		foreach ($mutasi as $m) {
			if ($m->direction == 'IN') {
				$mutasi_debit += $m->amount;
				// $arr_debit[] = $m->amount;
			} else {
				$mutasi_kredit += $m->amount;
			}
			$saldo_awal = $m->before_balance;
		}
		
		$saldo_akhir = $saldo_awal + $mutasi_debit - $mutasi_kredit;
		$saldo_akhir = $saldo_akhir < 0 ? 0 : $saldo_akhir;
		$mutasi = array(
			'saldo_awal' => $saldo_awal,
			'mutasi_kredit' => $mutasi_kredit,
			'mutasi_debit' => $mutasi_debit,
			'saldo_akhir' => $saldo_akhir,
		);
		return $mutasi;
	}

	// get Calculate Last Balance Bank. AcCashFlow
	public function getLastBalance($bank_id)
	{
		$last_balance = AcCashFlow::model()->find(array(
			'condition' => 'bank_id = :bank_id',
			'params' => array(':bank_id' => $bank_id),
			'order' => 'flow_date DESC',
		));
		if ($last_balance) {
			return intval($last_balance->current_balance);
		} else {
			return 0;
		}
	}



	// syncCashFlow, scan all data from AcKasBank, and resync calculate balance
	public function syncCashFlow()
	{
		$bank = AcKasBank::model()->findAll(array(
			'condition' => 'deleted_at IS NULL AND company_id = :company_id',
			'params' => array(':company_id' => \Yii::app()->session['project_active']),
			'order' => 'bank_name ASC',
		));
		if (empty($bank)) {
			Yii::app()->user->setFlash('error', 'No bank found');
			$this->redirect(array('index'));
		}

		// sync all amount, direction (in/out), before_balance, current_balance
		foreach ($bank as $b) {
			$mutasi = AcCashFlow::model()->findAll(array(
				'condition' => 'bank_id = :bank_id AND deleted_at IS NULL',
				'params' => array(':bank_id' => $b->id),
				'order' => 't.id ASC',
			));

			// $arr_tmp = [];
			// foreach ($mutasi as $m) {
			// 	$arr_tmp[] = $m->attributes;
			// }

			$saldo_awal = 0;
			$mutasi_kredit = 0;
			$mutasi_debit = 0;
			foreach ($mutasi as $key1 => $m) {
				if ($m->direction == 'IN') {
					$mutasi_debit += $m->amount;
				} else {
					$mutasi_kredit += $m->amount;
				}
				if ($key1 == 0) {
					$saldo_awal = $m->before_balance;
				}
				if ($key1 == count($mutasi) - 1) {
					$saldo_akhir = $m->current_balance;
				}
			}

			$saldo_akhir = $saldo_awal + $mutasi_debit - $mutasi_kredit;
			$saldo_akhir = $saldo_akhir < 0 ? 0 : $saldo_akhir;

			foreach ($mutasi as $m) {
				$m->before_balance = $saldo_awal;
				if ($m->direction == 'IN') {
					$m->current_balance = $saldo_awal + $m->amount;
					$saldo_awal += $m->amount;
				} else {
					$m->current_balance = $saldo_awal - $m->amount;
					$saldo_awal -= $m->amount;
				}
				// if ($m->current_balance < 0) {
				// 	$m->current_balance = 0;
				// }
				if (!$m->save()) {
					return false;
				}
			}
		}
		return true;		
	}

}
