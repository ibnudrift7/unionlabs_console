<?php

/**
 * This is the model class for table "tr_overheat".
 *
 * The followings are the available columns in table 'tr_overheat':
 * @property string $id
 * @property string $company_id
 * @property string $projects_id
 * @property string $ref_no
 * @property string $tanggal
 * @property double $amount
 * @property string $image
 * @property string $image_bayar
 * @property string $dibuat
 * @property string $mengetahui
 * @property integer $is_validasi
 * @property integer $bank_id
 * @property string $created_at
 * @property string $admin_bank
 * @property string $disetujui
 * @property string $deleted_at
 * @property string $transaction_id
 * @property string $restitusi_id
 * @property string $notes
 * @property integer $valid_director
 * @property string $created_by
 * @property string $tgl_bayar
 */
class BiayaList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BiayaList the static model class
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
		return 'tr_overheat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_id', 'numerical', 'integerOnly' => true),
			array('amount', 'numerical'),
			array('company_id', 'length', 'max' => 11),
			array('projects_id', 'length', 'max' => 20),
			array('ref_no, image, image_bayar, dibuat, mengetahui', 'length', 'max' => 225),
			array('tanggal, created_at, notes, is_validasi, admin_bank, disetujui, deleted_at, transaction_id, restitusi_id, valid_director, created_by, tgl_bayar', 'safe'),
			// The following rule is used by search().
			// image, image_bayar
			array('image, image_bayar', 'file',
				'maxSize' => 1024 * 1024 * 3,
				'types' => 'jpg, jpeg, png, pdf',
				'allowEmpty' => true),
			// Please remove those attributes that should not be searched.
			array('id, company_id, projects_id, ref_no, tanggal, amount, image, image_bayar, dibuat, mengetahui, is_validasi, transaction_id, bank_id, created_at', 'safe', 'on' => 'search'),
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
			'proyek' => array(self::BELONGS_TO, 'Proyeks', 'projects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Company',
			'projects_id' => 'Projects',
			'ref_no' => 'Ref No',
			'tanggal' => 'Tanggal',
			'amount' => 'Amount',
			'image' => 'Doc Faktur',
			'image_bayar' => 'Doc Bayar',
			'dibuat' => 'Dibuat',
			'mengetahui' => 'Mengetahui',
			'transaction_id' => 'Ac Transaction',
			'bank_id' => 'Bank',
			'is_validasi' => 'Status Bayar',
			'created_at' => 'Created At',
			'valid_director' => 'ACC Direktur',
			'tgl_bayar' => 'Tgl. Bayar',
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
		// $criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('projects_id', $this->projects_id);
		$criteria->compare('ref_no', $this->ref_no, true);
		$criteria->compare('tanggal', $this->tanggal, true);
		$criteria->compare('amount', $this->amount);
		$criteria->compare('notes', $this->notes);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('image_bayar', $this->image_bayar, true);
		$criteria->compare('dibuat', $this->dibuat, true);
		$criteria->compare('mengetahui', $this->mengetahui, true);
		$criteria->compare('is_validasi', $this->is_validasi);
		$criteria->compare('transaction_id', $this->transaction_id, true);
		$criteria->compare('bank_id', $this->bank_id);
		$criteria->compare('created_at', $this->created_at, true);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		$criteria->addCondition('deleted_at IS NULL');
		$criteria->order = 'id DESC';

		// echo '<pre>';
		// print_r($criteria);
		// echo '</pre>';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function beforeSave()
	{
		parent::beforeSave();
		if ($this->isNewRecord) {
			$this->created_at = date('Y-m-d H:i:s');
			$this->company_id = \Yii::app()->session['project_active'];

			$userName = User::model()->findByAttributes(array('email' => Yii::app()->user->id))->nama;
			$this->created_by = $userName;
		}
		return true;
	}

	public function createReportLastMonth($stPage = 'home', $proyek_id, $search = [])
	{

		if (isset($search['start_date']) && isset($search['end_date'])) {
			$start_date = $search['start_date'] ?? null;
			$end_date = $search['end_date'] ?? null;
		} 

			if($stPage === 'home'){
				$query = Yii::app()->db->createCommand()
					->select('DATE(tgl_bayar) as date, (amount) as amount')
					->from('tr_overheat as tr_p')
					->where('company_id=' . \Yii::app()->session['project_active'] . ' AND projects_id=' . $proyek_id . ' AND deleted_at IS NULL');
			} else if($stPage === 'detail') {
				$query = Yii::app()->db->createCommand()
					->select(
					// tr_p.*,
					'tr_p.id as id,
					tr_p.ref_no as ref_no,
					tr_p.created_by as created_by,
					tr_p.projects_id as proyek_id,
					tr_p.notes as uraian,
					tr_p.tgl_bayar as tgl_bayar,
					tr_p.created_at as tgl_input,
					tr_p.amount as amount,
					tr_p.is_validasi as is_validasi,
					tr_p.transaction_id,
					tr_p.dibuat,
					tr_p.mengetahui,
					tr_p.bank_id,
					tr_pn.names as proyek_name,
					tr_banks.account_number as bank_norek,
					tr_banks.bank_name as bank_rekening,
					m_bl.nama as bank
					'
					)
					->from('tr_overheat as tr_p')
					->leftJoin('tr_proyeks as tr_pn', 'tr_p.projects_id = tr_pn.id')
					->leftJoin('tr_ac_kas_bank tr_banks', 'tr_p.bank_id = tr_banks.id')
					->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id')
					->where('tr_p.company_id=' . \Yii::app()->session['project_active'] . ' AND tr_p.projects_id=' . $proyek_id . ' AND tr_p.deleted_at IS NULL');
			}

		if (isset($search['start_date']) && isset($search['end_date'])) {
			$query->where('tr_p.tgl_bayar BETWEEN :start_date AND :end_date AND tr_p.company_id=:company_id AND tr_p.projects_id=:projects_id AND tr_p.deleted_at IS NULL');
			$query->bindParam(':start_date', $start_date)
				->bindParam(':end_date', $end_date)
				->bindParam(':company_id', \Yii::app()->session['project_active'])
				->bindParam(':projects_id', $proyek_id);
		} 
		// echo $query->getText();
		// exit;

		$query = $query->queryAll();

		// if (count($query) > 0 && $query[0]['date'] == null) {
		// 	return [];
		// }
		$grandTotal = array_sum(array_column($query, 'amount'));

		return [
			'data' => $query,
			'grandTotal' => $grandTotal,
		];
	}

	// create rekap search
	public function createReportLastDayRekap($actProyekId = false, $startDate, $endDate)
	{
		// get all field from table tr_overheat
		// uraian, bank, bank_norek, bank_rekening, tanggal_input, jumlah, is_validasi
		$query = Yii::app()->db->createCommand()
			->select('
				tr_o.id,
				tr_o.company_id,
				tr_o.ref_no,
				tr_o.created_by as created_by,
				tr_o.tgl_bayar as tanggal_input,
				tr_o.amount as jumlah,
				tr_o.notes as uraian,
				tr_o.is_validasi as is_validasi,
				tr_o.valid_director,
				tr_o.transaction_id,
				tr_o.bank_id,
				tr_o.created_at as created_at,
				tr_o.projects_id as proyek_id,
				tr_pn.names as proyek_name,
				tr_banks.account_number as bank_norek,
				tr_banks.bank_name as bank_rekening,
				m_bl.nama as bank
			')
			->from('tr_overheat tr_o')
			->leftJoin('tr_proyeks tr_pn', 'tr_o.projects_id = tr_pn.id')
			->leftJoin('tr_ac_kas_bank tr_banks', 'tr_o.bank_id = tr_banks.id')
			->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id');

		if ($actProyekId == false) {
			$query->where('tr_o.company_id=:company_id AND tr_o.deleted_at IS NULL', [
				':company_id' => \Yii::app()->session['project_active'],
			]);
		} else {
			if (isset($startDate) && isset($endDate)) {
				$query->where('tr_o.tgl_bayar BETWEEN :start_date AND :end_date AND tr_o.company_id=:company_id AND tr_o.projects_id=:proyek_id AND tr_o.deleted_at IS NULL', [
					':start_date' => $startDate,
					':end_date' => $endDate,
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_o.company_id=:company_id AND tr_o.projects_id=:proyek_id AND tr_o.deleted_at IS NULL', [
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			}
		}

		$query = $query->queryAll();

		return $query;
	}
}
