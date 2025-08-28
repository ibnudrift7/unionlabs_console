<?php

/**
 * This is the model class for table "tr_spk_opname".
 *
 * The followings are the available columns in table 'tr_spk_opname':
 * @property string $id
 * @property string $spk_id
 * @property string $tanggal
 * @property double $nilai_prestasi
 * @property double $nilai_retensi
 * @property double $nilai_bayar_subkon
 * @property string $image
 * @property integer $is_validasi
 * @property integer $admin_bank
 * @property string $created_at
 * @property string $notes
 * @property string $tipe_bayar
 * @property string $transaction_id
 * @property string $restitusi_id
 * @property integer $valid_director
 * @property string $created_by
 * @property string $tgl_bayar
 * @property string $deleted_at
 */
class SpkOpname extends CActiveRecord
{
	public $no_spk, $last_bayar, $n_proyek;

	const TipeBayar = [
		'retensi' => 'Retensi',
		'kasbon' => 'Kasbon',
	];

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpkOpname the static model class
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
		return 'tr_spk_opname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_validasi', 'numerical', 'integerOnly' => true),
			array('nilai_prestasi, nilai_retensi, nilai_bayar_subkon', 'numerical'),
			array('spk_id', 'length', 'max' => 20),
			array('tanggal, created_at, company_id, no_spk, image, last_bayar, n_proyek, admin_bank, transaction_id, notes, tipe_bayar, restitusi_id, valid_director, created_by, tgl_bayar, deleted_at', 'safe'),
			// The following rule is used by search().
			array(
				'image',
				'file',
				'maxSize' => 1024 * 1024 * 4, // 5MB
				'types' => 'jpg, png, jpeg, pdf',
				'allowEmpty' => true
			),
			// Please remove those attributes that should not be searched.
			array('id, spk_id, tanggal, nilai_prestasi, nilai_retensi, nilai_bayar_subkon, image, is_validasi, created_at', 'safe', 'on' => 'search'),
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
			'spk' => array(self::BELONGS_TO, 'SpkHeader', 'spk_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'spk_id' => 'Spk',
			'tanggal' => 'Tgl. Dibuat',
			'nilai_prestasi' => 'Nilai Prestasi',
			'nilai_retensi' => 'Nilai Retensi',
			'nilai_bayar_subkon' => 'Nilai Bayar Subkon',
			'image' => 'Image',
			'is_validasi' => 'Status Bayar',
			'created_at' => 'Created At',
			'admin_bank' => 'Admin Bank',
			'n_proyek' => 'Sisa Proyek',
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
		$criteria->compare('spk_id', $this->spk_id, true);
		$criteria->compare('tanggal', $this->tanggal, true);
		$criteria->compare('nilai_prestasi', $this->nilai_prestasi);
		$criteria->compare('nilai_retensi', $this->nilai_retensi);
		$criteria->compare('nilai_bayar_subkon', $this->nilai_bayar_subkon);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('is_validasi', $this->is_validasi);
		$criteria->compare('created_at', $this->created_at, true);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		if (isset($_GET['SpkOpname']['spk_id']) || isset($_GET['spk_id'])) {
			$spkId = $_GET['SpkOpname']['spk_id'] ?? $_GET['spk_id'];
			$criteria->addCondition('spk_id = :spk_id');
			$criteria->params[':spk_id'] = $spkId;
		} else if (empty($_GET['SpkOpname']['spk_id']) && empty($_GET['spk_id'])) {
			header('Location: ' . Yii::app()->createAbsoluteUrl('SystemLogin/spk/index'));
		}

		$criteria->order = 'id DESC';
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
			$this->created_at = date('Y-m-d H:i:s');
			$this->tanggal = date('Y-m-d');

			$userName = User::model()->findByAttributes(array('email' => Yii::app()->user->id))->nama;
			$this->created_by = $userName;
		}
		return true;
	}

	public function createReportLastMonth($stPage = 'home', $proyek_id, $type = 'opname', $searchs = [])
	{
		$search = [
			'start_date' => $searchs['start_date'] ?? null,
			'end_date' => $searchs['end_date'] ?? null,
			'project_id' => \Yii::app()->session['project_active'],
		];

		if ($type == 'opname') {
			$type = 'opname';
		} else {
			$type = 'adendum';
		}

		if ($type == 'opname') {
			// isset date
			$query = Yii::app()->db->createCommand()
					->select('DATE(tr_p.tanggal) as date, (tr_p.nilai_bayar_subkon) as amount')
					->from('tr_spk_opname as tr_p')
					->leftJoin('tr_spk_list', 'tr_p.spk_id = tr_spk_list.id')
					->where('tr_p.is_validasi=1 AND tr_p.company_id=:company_id AND tr_spk_list.project_id=:projects_id AND tr_p.deleted_at IS NULL', [
						':company_id' => $search['project_id'],
						':projects_id' => $proyek_id,
					]);
					$query = Yii::app()->db->createCommand()
					->select(
					// tr_p.*,
					'tr_p.tanggal as tanggal,
					tr_p.id as id,
					tr_p.spk_id as spk_id,
					tr_s.project_id as proyek_id,
					tr_p.notes as uraian,
					tr_p.tgl_bayar as tgl_bayar,
					tr_p.created_at as tgl_input,
					tr_p.nilai_bayar_subkon as amount,
					tr_p.is_validasi as is_validasi,
					tr_p.transaction_id,
					tr_p.created_by as dibuat,
					tr_s.bank_id,
					tr_pn.names as proyek_name,
					tr_banks.account_number as bank_norek,
					tr_banks.bank_name as bank_rekening,
					m_bl.nama as bank
					'
					)
					->from('tr_spk_opname as tr_p')
					->leftJoin('tr_spk_list as tr_s', 'tr_p.spk_id = tr_s.id')
					->leftJoin('tr_proyeks as tr_pn', 'tr_s.project_id = tr_pn.id')
					->leftJoin('tr_ac_kas_bank tr_banks', 'tr_s.bank_id = tr_banks.id')
					->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id')
					->where('tr_p.is_validasi=1 AND tr_p.company_id=:company_id AND tr_s.project_id=:projects_id AND tr_p.deleted_at IS NULL', [
						':company_id' => $search['project_id'],
						':projects_id' => $proyek_id,
					]);

			if (isset($search['start_date']) && isset($search['end_date']) && $search['start_date'] != null && $search['end_date'] != null) {
				$query->where('tr_p.tanggal BETWEEN :start_date AND :end_date AND tr_p.company_id=:company_id AND tr_p.projects_id=:projects_id AND tr_p.deleted_at IS NULL', [
					':start_date' => $search['start_date'],
					':end_date' => $search['end_date'],
					':company_id' => $search['project_id'],
					':projects_id' => $proyek_id,
				]);
			}
		}
		// echo "<pre>";
		// print_r($searchs);
		// echo $proyek_id . "<br>";
		// echo $query->getText();
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

	public function createReportLastDayRekap($actProyekId = false, $startDate, $endDate)
	{
		// get all field from table tr_spk_opname
		// uraian, bank, bank_norek, bank_rekening, tanggal_input, jumlah, is_validasi
		$query = Yii::app()->db->createCommand()
			->select(
			'tr_so.id, 
				tr_s.no_spk as ref_no, 
				tr_so.created_by as created_by,
				tr_so.spk_id, 
				tr_s.project_id as proyek_id,
				tr_pn.names as proyek_name,
				tr_banks.account_number as bank_norek,
				tr_banks.bank_name as bank_rekening,
				m_bl.nama as bank,
				tr_so.notes as uraian,
				tr_so.created_at as tanggal_input,
				tr_so.nilai_bayar_subkon as jumlah,
				tr_so.is_validasi as is_validasi,
				tr_so.valid_director as valid_director,
				tr_so.transaction_id'
			)
			->from('tr_spk_opname as tr_so')
			->leftJoin('tr_spk_list as tr_s', 'tr_so.spk_id = tr_s.id')
			->leftJoin('tr_proyeks as tr_pn', 'tr_s.project_id = tr_pn.id')
			->leftJoin('tr_ac_kas_bank tr_banks', 'tr_s.bank_id = tr_banks.id')
			->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id');

		if ($actProyekId == false) {
			$query->where('tr_so.company_id=:company_id AND tr_so.deleted_at IS NULL', [
				':company_id' => \Yii::app()->session['project_active'],
			]);
		} else {
			if (isset($startDate) && isset($endDate)) {
				$query->where('tr_so.tanggal BETWEEN :start_date AND :end_date AND tr_so.company_id=:company_id AND tr_s.project_id=:proyek_id AND tr_so.deleted_at IS NULL', [
					':start_date' => $startDate,
					':end_date' => $endDate,
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_so.company_id=:company_id AND tr_s.project_id=:proyek_id AND tr_so.deleted_at IS NULL', [
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			}
		}

		$query = $query->queryAll();

		return $query;
	}
}
