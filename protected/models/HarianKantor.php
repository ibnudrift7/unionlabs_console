<?php

/**
 * This is the model class for table "tr_harian_kantor".
 *
 * The followings are the available columns in table 'tr_harian_kantor':
 * @property string $id
 * @property string $proyek_id
 * @property integer $company_id
 * @property string $start_date
 * @property string $end_date
 * @property double $total_amount
 * @property integer $bank_id
 * @property integer $is_paid
 * @property string $dibuat
 * @property string $mengetahui
 * @property string $disetujui
 * @property string $created_at
 * @property string $updated_at
 * @property string $image
 * @property string $image_bayar
 * @property string $admin_bank
 * @property string $transaction_id
 * @property string $restitusi_id
 * @property string $notes
 * @property string $ref_no
 * @property integer $valid_director
 * @property string $created_by
 * @property string $tgl_bayar
 */
class HarianKantor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HarianKantor the static model class
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
		return 'tr_harian_kantor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proyek_id, start_date, end_date, total_amount', 'required'),
			array('company_id, bank_id, is_paid', 'numerical', 'integerOnly' => true),
			array('total_amount', 'numerical'),
			array('proyek_id', 'length', 'max' => 11),
			array('dibuat, mengetahui, disetujui', 'length', 'max' => 100),
			array('created_at, updated_at, image, image_bayar, admin_bank, deleted_at, transaction_id, restitusi_id, notes, valid_director, created_by, tgl_bayar', 'safe'),
			// The following rule is used by search().
			// image, image_bayar
			array('image, image_bayar', 'file',
				'maxSize' => 1024 * 1024 * 3,
				'types' => 'jpg, jpeg, png, pdf',
				'allowEmpty' => true),
			// Please remove those attributes that should not be searched.
			array('id, proyek_id, company_id, start_date, end_date, total_amount, transaction_id, bank_id, is_paid, dibuat, mengetahui, disetujui, created_at, updated_at', 'safe', 'on' => 'search'),
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
			'proyek' => array(self::BELONGS_TO, 'Proyeks', 'proyek_id'),
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
			'proyek_id' => 'Proyek',
			'company_id' => 'Company',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'total_amount' => 'Total Amount',
			'transaction_id' => 'Transaction',
			'bank_id' => 'Bank',
			'is_paid' => 'Status Bayar',
			'dibuat' => 'Dibuat',
			'mengetahui' => 'Mengetahui',
			'disetujui' => 'Disetujui',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'image' => 'Doc Faktur',
			'image_bayar' => 'Doc Bayar',
			'notes' => 'Catatan / Notes',
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
		$criteria->compare('proyek_id', $this->proyek_id, true);
		// $criteria->compare('company_id', $this->company_id);
		$criteria->compare('start_date', $this->start_date, true);
		$criteria->compare('end_date', $this->end_date, true);
		$criteria->compare('total_amount', $this->total_amount);
		$criteria->compare('transaction_id', $this->transaction_id);
		$criteria->compare('bank_id', $this->bank_id);
		$criteria->compare('is_paid', $this->is_paid);
		$criteria->compare('dibuat', $this->dibuat, true);
		$criteria->compare('mengetahui', $this->mengetahui, true);
		$criteria->compare('disetujui', $this->disetujui, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);
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
			$this->created_at = date('Y-m-d H:i:s');
			$this->company_id = \Yii::app()->session['project_active'];

			$userName = User::model()->findByAttributes(array('email' => Yii::app()->user->id))->nama;
			$this->created_by = $userName;
		}
		return true;
	} 

	public function createReportLastMonth($stPage = 'home', $proyek_id, $search = [])
	{
		$search = [
			'start_date' => $search['start_date'] ?? null,
			'end_date' => $search['end_date'] ?? null,
			'project_id' => \Yii::app()->session['project_active'],
		];
		if($stPage === 'home'){
			$query = \Yii::app()->db->createCommand()
			->select('DATE(tr_p.start_date) as date, (tr_p.total_amount) as amount')
			->from('tr_harian_kantor as tr_p')
			->where('tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.proyek_id=:projects_id AND tr_p.deleted_at IS NULL', [
				':company_id' => $search['project_id'],
				':projects_id' => $proyek_id,
			]);
		} else if($stPage === 'detail') {
			$query = \Yii::app()->db->createCommand()
				->select(
				// tr_p.*,
				'tr_p.id as id,
				tr_p.dibuat as created_by,
				tr_p.proyek_id as proyek_id,
				tr_p.notes as uraian,
				tr_p.tgl_bayar as tgl_bayar,
				tr_p.created_at as tgl_input,
				tr_p.total_amount as amount,
				tr_p.is_paid as is_validasi,
				tr_p.transaction_id,
				tr_p.dibuat,
				tr_p.disetujui,
				tr_p.mengetahui,
				tr_p.bank_id,
				tr_pn.names as proyek_name,
				tr_banks.account_number as bank_norek,
				tr_banks.bank_name as bank_rekening,
				m_bl.nama as bank
				'
				)
				->from('tr_harian_kantor as tr_p')
				->leftJoin('tr_proyeks as tr_pn', 'tr_p.proyek_id = tr_pn.id')
				->leftJoin('tr_ac_kas_bank tr_banks', 'tr_p.bank_id = tr_banks.id')
				->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id')
				->where('tr_p.is_paid=1 AND tr_p.company_id=:company_id AND tr_p.proyek_id=:projects_id AND tr_p.deleted_at IS NULL', [
					':company_id' => $search['project_id'],
					':projects_id' => $proyek_id,
				]);
		}
			

		if (isset($search['start_date']) && isset($search['end_date']) && $search['start_date'] != null && $search['end_date'] != null) {
			$query->where('tr_p.start_date >= :start_date AND tr_p.end_date <= :end_date AND tr_p.company_id=:company_id AND tr_p.proyek_id=:projects_id AND tr_p.deleted_at IS NULL', [
				':start_date' => $search['start_date'],
				':end_date' => $search['end_date'],
				':company_id' => $search['project_id'],
				':projects_id' => $proyek_id,
			]);
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
		// get all field from table tr_harian_kantor
		// uraian, bank, bank_norek, bank_rekening, tgl_input, jumlah, is_validasi
		$query = Yii::app()->db->createCommand()
			->select('tr_hk.id, 
			tr_hk.notes as ref_no,
			tr_hk.created_by as created_by,
			tr_hk.company_id, 
			tr_hk.start_date, 
			tr_hk.end_date, 
			tr_hk.total_amount as jumlah,
			tr_hk.is_paid as is_validasi,
			tr_hk.valid_director,
			tr_hk.transaction_id, 
			tr_hk.bank_id, 
			tr_hk.notes as uraian,
			tr_hk.created_at as tanggal_input,
			tr_hk.proyek_id as proyek_id, 
			tr_pn.names as proyek_name,
			tr_banks.account_number as bank_norek,
			tr_banks.bank_name as bank_rekening,
			m_bl.nama as bank
			')
			->from('tr_harian_kantor as tr_hk')
			->leftJoin('tr_proyeks as tr_pn', 'tr_hk.proyek_id = tr_pn.id')
			->leftJoin('tr_ac_kas_bank tr_banks', 'tr_hk.bank_id = tr_banks.id')
			->leftJoin('m_bank_list m_bl', 'tr_banks.bank_id = m_bl.id');

		if ($actProyekId == false) {
			$query->where('tr_hk.company_id=:company_id AND tr_hk.deleted_at IS NULL', [
				':company_id' => \Yii::app()->session['project_active'],
			]);
		} else {
			if (isset($startDate) && isset($endDate)) {
				$query->where('tr_hk.start_date BETWEEN :start_date AND :end_date AND tr_hk.company_id=:company_id AND tr_hk.proyek_id=:proyek_id AND tr_hk.deleted_at IS NULL', [
					':start_date' => $startDate,
					':end_date' => $endDate,
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			} else {
				$query->where('tr_hk.company_id=:company_id AND tr_hk.proyek_id=:proyek_id AND tr_hk.deleted_at IS NULL', [
					':company_id' => \Yii::app()->session['project_active'],
					':proyek_id' => $actProyekId,
				]);
			}
		}

		$query = $query->queryAll();

		return $query;
	}
}
