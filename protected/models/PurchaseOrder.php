<?php

/**
 * This is the model class for table "tr_p".
 *
 * The followings are the available columns in table 'tr_p':
 * @property string $id
 * @property string $po_no
 * @property string $company_id
 * @property string $supplier_id
 * @property string $tanggal_po
 * @property double $grandtotal
 * @property string $notes
 * @property double $ppn_amount
 * @property double $dpp
 * @property integer $is_ppn
 * @property integer $admin_id
 * @property integer $bank_id
 * @property string $type_po
 * @property integer $is_paid
 * @property string $image
 * @property string $image_bayar
 * @property string $created_at
 * @property string $updated_at
 * @property string $preff_no_po_1
 * @property string $deleted_at
 * @property integer $status_po
 * @property integer $admin_bank
 * @property string $tgl_bayar
 * @property string $transaction_id
 * @property string $restitusi_id
 * @property string $suplier_name
 * @property integer $valid_director
 * @property string $created_by
 * @property string $proyek_id
 */
class PurchaseOrder extends CActiveRecord
{
	public $preff_no_po_1, $preff_no_po_full;
	const Type_Po_list = [
		'aset' => 'PO Aset',
		'bahan' => 'PO Bahan Material',
		'sewa_alat' => 'Sewa Alat',
	];

	const StatusPaid = [
		0 => 'Pending',
		1 => 'Lunas',
		// 2 => 'Bayar Sebagian'
	];

	const List_pref_no_1 = [
		'1' => 'UAS',
	];

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PurchaseOrder the static model class
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
		return 'tr_purchase_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_ppn, admin_id, bank_id, is_paid', 'numerical', 'integerOnly' => true),
			// array('grandtotal, ppn_amount, dpp', 'numerical'),
			array('po_no, type_po, image, image_bayar', 'length', 'max' => 225),
			array('company_id', 'length', 'max' => 11),
			// array('supplier_id', 'length', 'max' => 20),
			array('grandtotal, ppn_amount, dpp, tanggal_po, notes, created_at, updated_at, deleted_at, preff_no_po_full, admin_bank, status_po, proyek_id, ongkir, supplier_id, suplier_name, tgl_bayar, transaction_id, restitusi_id, valid_director, created_by', 'safe'),
			// The following rule is used by search().
			// image, image_bayar
			array('image, image_bayar', 'file',
				'maxSize' => 1024 * 1024 * 3,
				'types' => 'jpg, jpeg, png, pdf',
				'allowEmpty' => true),
			// Please remove those attributes that should not be searched.
			array('id, po_no, company_id, supplier_id, tanggal_po, grandtotal, notes, ppn_amount, dpp, is_ppn, admin_id, bank_id, type_po, is_paid, image, image_bayar, created_at, updated_at', 'safe', 'on' => 'search'),
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
			'supplier' => array(self::BELONGS_TO, 'MSupplier', 'supplier_id'),
			'company' => array(self::BELONGS_TO, 'MSetCompany', 'company_id'),
			'bank' => array(self::BELONGS_TO, 'AcKasBank', 'bank_id'),
			'proyek' => array(self::BELONGS_TO, 'Proyeks', 'proyek_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'po_no' => 'Po No',
			'company_id' => 'Company',
			'supplier_id' => 'Supplier',
			'tanggal_po' => 'Tanggal PO',
			'grandtotal' => 'Grand Total',
			'notes' => 'Notes',
			'ppn_amount' => 'PPN',
			'dpp' => 'DPP',
			'is_ppn' => 'Is PPN',
			'admin_id' => 'Admin',
			'bank_id' => 'Bank',
			'type_po' => 'Type PO',
			'is_paid' => 'Status Bayar',
			'is_ppn' => 'Status PPN',
			'image' => 'Doc. Faktur',
			'proyek_id' => 'Proyek',
			'image_bayar' => 'Bukti Bayar',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'valid_director' => 'ACC Direktur',
			'status_po' => 'Status Bayar',
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
		$criteria->compare('po_no', $this->po_no, true);
		// $criteria->compare('company_id', $this->company_id, true);
		$criteria->compare('supplier_id', $this->supplier_id, true);
		$criteria->compare('tanggal_po', $this->tanggal_po, true);
		$criteria->compare('grandtotal', $this->grandtotal);
		$criteria->compare('notes', $this->notes, true);
		$criteria->compare('ppn_amount', $this->ppn_amount);
		$criteria->compare('dpp', $this->dpp);
		$criteria->compare('is_ppn', $this->is_ppn);
		$criteria->compare('admin_id', $this->admin_id);
		$criteria->compare('bank_id', $this->bank_id);
		$criteria->compare('is_paid', $this->is_paid);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('image_bayar', $this->image_bayar, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('type_po', $this->type_po, true);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		// deleted_at
		$criteria->addCondition('deleted_at IS NULL');
		$criteria->order = 'id DESC';

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

			$userName = User::model()->findByAttributes(array('email' => Yii::app()->user->id))->nama;
			$this->created_by = $userName;
		}
		return true;
	}

	public static function createNumberPo()
	{
		// UAS/VII-2024/SDA/ICG/025
		$last = PurchaseOrder::model()->find(array(
			'order' => 't.id DESC',
			'limit' => 1,
		));
		$getSetting = Setting::model()->getSetting(Yii::app()->language);
		$str_default = 'UAS/VII-2024/SDA/ICG';
		$dtSetting = Setting::model()->getSetting(Yii::app()->language);
		$str_static = $dtSetting['setups_preffix_no_po'];
		if (!empty($str_static)) {
			$str_default = $str_static;
		}

		if (empty($last)) {
			$str_po = '0001';
		} else {
			$last_code = $last->po_no;
			preg_match('/(\d+)$/', $last_code, $matches);
			$last_num = isset($matches[1]) ? (int)$matches[1] : 0;
			$last_num++;
			$str_po = str_pad($last_num, 4, '0', STR_PAD_LEFT);
		}
		return $str_po;
	}

	public function createReportLastMonth($stPage = 'home', $actProyekId, $type_lap = 'aset', $ppn = 0, $searchs = [])
	{
		$search = [
			'start_date' => $searchs['start_date'] ?? null,
			'end_date' => $searchs['end_date'] ?? null,
			'project_id' => \Yii::app()->session['project_active'],
			'type_lap' => $type_lap,
			'ppn' => $ppn,
		];

		$int_type = 'aset';
		switch ($type_lap) {
			case 'sewa_alat':
				$int_type = 'sewa_alat';
				break;
			case 'bahan':
				$int_type = 'bahan';
				break;
			default:
				$int_type = 'aset';
				break;
		}

		if($stPage === 'home'){
			$query = Yii::app()->db->createCommand()
				->select('DATE(tr_p.tgl_bayar) as date, 
				SUM(tr_p.grandtotal) as amount, 
				tr_p.suplier_name as supplier, 
				tr_p.company_id as company_id,
				tr_p.proyek_id as proyek_id,
				tr_p.po_no as ref_no'
				)
				->from('tr_purchase_order as tr_p');
		} else if($stPage === 'detail') {
			$query = Yii::app()->db->createCommand()
				->select(
				// tr_p.*,
				'tr_p.id as id,
					tr_p.po_no as ref_no,
					tr_p.created_by as created_by,
					tr_p.proyek_id as proyek_id,
					tr_p.notes as uraian,
					tr_p.tgl_bayar as tgl_bayar,
					tr_p.created_at as tgl_input,
					tr_p.grandtotal as amount,
					tr_p.is_paid as is_validasi,
					tr_p.valid_director,
					tr_p.transaction_id,
					tr_p.suplier_name,
					tr_p.bank_id,
					tr_pn.names as proyek_name,
					tr_banks.account_number as bank_norek,
					tr_banks.bank_name as bank_rekening,
					m_bl.nama as bank
					'
				)
				->from('tr_purchase_order as tr_p')
				->leftJoin('tr_proyeks as tr_pn', 'tr_p.proyek_id = tr_pn.id')
				->leftJoin('tr_ac_kas_bank tr_banks', 'tr_p.bank_id = tr_banks.id')
				->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id');
		}

		if ($int_type === 'sewa_alat') {
			if (isset($search['start_date']) && isset($search['end_date'])) {
				$query->where('tr_p.tgl_bayar BETWEEN :start_date AND :end_date AND tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.type_po=:type_po AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':start_date' => $search['start_date'],
					':end_date' => $search['end_date'],
					':company_id' => $search['project_id'],
					':type_po' => $int_type,
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.type_po=:type_po AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':company_id' => $search['project_id'],
					':type_po' => $int_type,
					':proyek_id' => $actProyekId,
				]);
			}
		}elseif ($int_type === 'aset') {
			if (isset($search['start_date']) && isset($search['end_date'])) {
				$query->where('tr_p.tgl_bayar BETWEEN :start_date AND :end_date AND tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.type_po=:type_po AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':start_date' => $search['start_date'],
					':end_date' => $search['end_date'],
					':company_id' => $search['project_id'],
					':type_po' => $int_type,
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.type_po=:type_po AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':company_id' => $search['project_id'],
					':type_po' => $int_type,
					':proyek_id' => $actProyekId,
				]);
			}
		} else {
			if (isset($search['start_date']) && isset($search['end_date'])) {
				$query->where('tr_p.tgl_bayar BETWEEN :start_date AND :end_date AND tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.type_po=:type_po AND tr_p.is_ppn=:is_ppn AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':start_date' => $search['start_date'],
					':end_date' => $search['end_date'],
					':company_id' => $search['project_id'],
					':type_po' => $int_type,
					':is_ppn' => $ppn,
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.type_po=:type_po AND tr_p.is_ppn=:is_ppn AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':company_id' => $search['project_id'],
					':type_po' => $int_type,
					':is_ppn' => $ppn,
					':proyek_id' => $actProyekId,
				]);
			}
		}
		// echo $int_type . ' ' . $ppn . ' ' . $actProyekId;
		// echo '<br>';
		// echo $query->getText();
		// exit;

		$query = $query->queryAll();;

		// if (count($query) > 0 && $query[0]['date'] == null) {
		// 	return [];
		// }

		$grandTotal = 0;
		if (isset($query) && count($query) > 0) {
			$grandTotal = array_sum(array_column($query, 'amount'));
		}

		return [
			'data' => $query,
			'grandTotal' => $grandTotal,
		];
	}

	public function createReportLastMonthRestitusi($stPage = 'home', $actProyekId, $searchs = [])
	{
		$search = [
			'start_date' => $searchs['start_date'] ?? null,
			'end_date' => $searchs['end_date'] ?? null,
			'project_id' => \Yii::app()->session['project_active'],
		];

		$query = Yii::app()->db->createCommand()
			// ->select('DATE(tgl_bayar) as date, SUM(ppn_amount) as amount')
			// ->from('tr_purchase_order');
			->select(
				// tr_p.*,
				'tr_p.id as id,
					tr_p.po_no as ref_no,
					tr_p.created_by as created_by,
					tr_p.proyek_id as proyek_id,
					tr_pn.names as proyek_name,
					tr_banks.account_number as bank_norek,
					tr_banks.bank_name as bank_rekening,
					m_bl.nama as bank,
					tr_p.notes as uraian,
					tr_p.created_at as tanggal_input,
					tr_p.ppn_amount as amount,
					tr_p.is_paid as is_validasi,
					tr_p.valid_director,
					tr_p.transaction_id,
					tr_p.bank_id'
			)
			->from('tr_purchase_order as tr_p')
			->leftJoin('tr_proyeks as tr_pn', 'tr_p.proyek_id = tr_pn.id')
			->leftJoin('tr_ac_kas_bank tr_banks', 'tr_p.bank_id = tr_banks.id')
			->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id');

		if (isset($search['start_date']) && isset($search['end_date']) && !empty($search['start_date']) && !empty($search['end_date'])) {
			$query->where('tr_p.tgl_bayar BETWEEN :start_date AND :end_date AND is_paid=1 AND company_id=:company_id AND proyek_id=:proyek_id AND is_ppn=1 AND deleted_at IS NULL', [
					':start_date' => $search['start_date'],
					':end_date' => $search['end_date'],
					':company_id' => $search['project_id'],
					':proyek_id' => $actProyekId,
				]);
		} else {
			$query->where('tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.proyek_id=:proyek_id AND tr_p.is_ppn=1 AND tr_p.deleted_at IS NULL AND tr_p.ppn_amount IS NOT NULL', [
				':company_id' => $search['project_id'],
				':proyek_id' => $actProyekId,
			]);
		}

		// exit;
		// echo $query->getText();
		// echo $search['project_id'] . '<br>';
		// echo $actProyekId;		
		// exit;
		$query = $query->queryAll();

		// if (count($query) > 0 && $query[0]['date'] == null) {
		// 	return [];
		// }

		$grandTotal = 0;
		if (isset($query) && count($query) > 0) {
			$grandTotal = array_sum(array_column($query, 'amount'));
		}

		return [
			'data' => $query,
			'grandTotal' => $grandTotal,
		];
	}


	// create rekap search
	public function createReportLastDayRekap($actProyekId = false, $startDate, $endDate)
	{
		// get all field from table tr_p
		// uraian, bank, bank_norek, bank_rekening, tanggal_input, jumlah, is_validasi
		$query = Yii::app()->db->createCommand()
			->select(
			// tr_p.*,
			'tr_p.id as id,
				tr_p.po_no as ref_no,
				tr_p.created_by as created_by,
				tr_p.proyek_id as proyek_id,
				tr_pn.names as proyek_name,
				tr_banks.account_number as bank_norek,
				tr_banks.bank_name as bank_rekening,
				m_bl.nama as bank,
				tr_p.notes as uraian,
				tr_p.created_at as tanggal_input,
				tr_p.grandtotal as jumlah,
				tr_p.is_paid as is_validasi,
				tr_p.valid_director,
				tr_p.transaction_id,
				tr_p.bank_id'
			)
			->from('tr_purchase_order as tr_p')
			->leftJoin('tr_proyeks as tr_pn', 'tr_p.proyek_id = tr_pn.id')
			->leftJoin('tr_ac_kas_bank tr_banks', 'tr_p.bank_id = tr_banks.id')
			->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id');

		if ($actProyekId == false) {
			$query->where('tr_p.company_id=:company_id AND tr_p.deleted_at IS NULL', [
				':company_id' => \Yii::app()->session['project_active'],
			]);
		} else {
			if (isset($startDate) && isset($endDate)) {
				$query->where('tr_p.tgl_bayar BETWEEN :start_date AND :end_date AND tr_p.company_id=:company_id AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':start_date' => $startDate,
					':end_date' => $endDate,
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_p.company_id=:company_id AND tr_p.proyek_id=:proyek_id AND tr_p.deleted_at IS NULL', [
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			}
		}

		$query = $query->queryAll();

		return $query;
	}
}
