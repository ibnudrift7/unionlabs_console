<?php

/**
 * This is the model class for table "tr_spk_list".
 *
 * The followings are the available columns in table 'tr_spk_list':
 * @property string $id
 * @property string $no_spk
 * @property string $project_id
 * @property string $company_id
 * @property string $bank_id
 * @property string $subkon_id
 * @property string $engineer_id
 * @property string $tanggal
 * @property double $nilai_proyek
 * @property double $termin_payment
 * @property double $sisa_payment
 * @property string $status
 * @property integer $is_lunas
 * @property string $nama_spk
 * @property string $lokasi_pekerjaan
 * @property string $item_pekerjaan
 * @property string $image
 * @property string $created_at
 * @property string $preffix_no
 * @property string $notes
 * @property string $deleted_at
 * @property string $subkon
 */
class SpkHeader extends CActiveRecord
{
	const statusProject = [
		'pending' => 'Pending',
		'process' => 'Process',
		'complete' => 'Completed',
		// 'overtime' => 'Overtime',
	];

	const isLunasList = [
		0 => 'Pending',
		2 => 'Sebagian',
		1 => 'Lunas',
	];

	public $preff_no_po_1;
	public $preff_no_po_full;

	const List_pref_no_1 = [
		'1' => 'SUB',
		'2' => 'SDA',
		'3' => 'PSR',
	];
	const List_pref_no_2 = [
		'1' => 'MEP',
		'2' => 'MPS',
		'3' => 'MEP-2',
	];
	const List_pref_no_3 = [
		'1' => '2025',
		'2' => '2024',
		'3' => '2023',
		'4' => '2022',
	];
	const List_pref_no_4 = [
		'1' => 'GRESIK',
		'1' => 'SURABAYA',
		'1' => 'SIDOARJO',
	];

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpkHeader the static model class
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
		return 'tr_spk_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_lunas', 'numerical', 'integerOnly' => true),
			array('nilai_proyek, termin_payment, sisa_payment', 'numerical'),
			array('no_spk, nama_spk, item_pekerjaan, preffix_no', 'length', 'max' => 225),
			array('project_id, company_id, bank_id', 'length', 'max' => 11),
			array('subkon_id', 'length', 'max' => 20),
			array('status', 'length', 'max' => 8),
			array('tanggal, lokasi_pekerjaan, created_at, notes, deleted_at, image, subkon, engineer_id', 'safe'),
			array(
				'image',
				'file',
				'maxSize' => 1024 * 1024 * 10, // 5MB
				'types' => 'jpg, png, jpeg, pdf',
				'allowEmpty' => true
			),
			// Please remove those attributes that should not be searched.
			array('id, no_spk, project_id, company_id, bank_id, subkon_id, engineer_id, tanggal, nilai_proyek, termin_payment, sisa_payment, status, is_lunas, nama_spk, lokasi_pekerjaan, item_pekerjaan, image, created_at, preffix_no, notes', 'safe', 'on' => 'search'),
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
			'projects' => array(self::BELONGS_TO, 'Proyeks', 'project_id'),
			'companies' => array(self::BELONGS_TO, 'Companies', 'company_id'),
			'banks' => array(self::BELONGS_TO, 'AcKasBank', 'bank_id'),
			'subkons' => array(self::BELONGS_TO, 'MSubkonList', 'subkon_id'),
			'engineers' => array(self::BELONGS_TO, 'EngineerList', 'engineer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_spk' => 'No. SPK',
			'project_id' => 'Project',
			'company_id' => 'Company',
			'bank_id' => 'Bank',
			'subkon_id' => 'Subkon',
			'engineer_id' => 'Engineer',
			'tanggal' => 'Tanggal',
			'nilai_proyek' => 'Nilai Proyek',
			'termin_payment' => 'Termin Payment',
			'sisa_payment' => 'Sisa Payment',
			'status' => 'Status',
			'is_lunas' => 'Is Lunas',
			'nama_spk' => 'Nama SPK',
			'lokasi_pekerjaan' => 'Lokasi Pekerjaan',
			'item_pekerjaan' => 'Item Pekerjaan',
			'image' => 'Image',
			'created_at' => 'Created At',
			'preffix_no' => 'Preffix No',
			'notes' => 'Notes',
			'subkon' => 'Mandor',
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
		$criteria->compare('no_spk', $this->no_spk, true);
		$criteria->compare('project_id', $this->project_id, true);
		// $criteria->compare('company_id', $this->company_id, true);
		$criteria->compare('bank_id', $this->bank_id, true);
		$criteria->compare('subkon_id', $this->subkon_id, true);
		$criteria->compare('engineer_id', $this->engineer_id, true);
		$criteria->compare('tanggal', $this->tanggal, true);
		$criteria->compare('nilai_proyek', $this->nilai_proyek);
		$criteria->compare('termin_payment', $this->termin_payment);
		$criteria->compare('sisa_payment', $this->sisa_payment);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('is_lunas', $this->is_lunas);
		$criteria->compare('nama_spk', $this->nama_spk, true);
		$criteria->compare('lokasi_pekerjaan', $this->lokasi_pekerjaan, true);
		$criteria->compare('item_pekerjaan', $this->item_pekerjaan, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('preffix_no', $this->preffix_no, true);
		$criteria->compare('notes', $this->notes, true);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);
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
		}
		return true;
	}

	public static function getTotalAdendum($projects_id)
	{
		// ProjectsAdendum
		$criteria = new CDbCriteria;
		$criteria->compare('t.projects_id', $projects_id);
		$criteria->select = 'SUM(t.nilai_adendum) as nilai_adendum';
		$dataRet = SpkAdendum::model()->find($criteria);

		return $dataRet->nilai_adendum ?? 0;
	}

	public static function createNumberSpk()
	{
		$def_str = 'SPK';
		$criteria = new CDbCriteria;
		$criteria->select = 'MAX(t.preffix_no) as preffix_no';
		$dataRet = SpkHeader::model()->find($criteria);
		$strPadd = str_replace('SPK', '', $dataRet->preffix_no);
		return $def_str . str_pad($strPadd + 1, 3, '0', STR_PAD_LEFT);
	}
}
