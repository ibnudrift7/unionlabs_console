<?php

/**
 * This is the model class for table "tr_spk_subkon_payments_opnam".
 *
 * The followings are the available columns in table 'tr_spk_subkon_payments_opnam':
 * @property string $id
 * @property string $projects_id
 * @property string $adendum_id
 * @property string $jenis_pembyaran
 * @property integer $termin_ke
 * @property string $tanggal
 * @property string $nominal
 * @property string $notes
 * @property string $ac_transaction_id
 * @property integer $validasi
 * @property integer $company_id
 * @property integer $is_paid
 * @property string $image
 * @property string $created_at
 * @property integer $bank_id
 */
class SpkPaymentOpnam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpkPaymentOpnam the static model class
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
		return 'tr_spk_subkon_payments_opnam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('termin_ke, validasi, is_paid', 'numerical', 'integerOnly' => true),
			array('projects_id, adendum_id, ac_transaction_id', 'length', 'max' => 20),
			array('jenis_pembyaran', 'length', 'max' => 7),
			array('nominal', 'length', 'max' => 15),
			array('notes', 'length', 'max' => 255),
			array('image', 'length', 'max' => 225),
			array('tanggal, created_at, company_id, bank_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, projects_id, adendum_id, jenis_pembyaran, termin_ke, tanggal, nominal, notes, ac_transaction_id, validasi, is_paid, image, created_at', 'safe', 'on' => 'search'),
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
			'projects' => array(self::BELONGS_TO, 'SpkHeader', 'projects_id'),
			'adendum' => array(self::BELONGS_TO, 'SpkAdendum', 'adendum_id'),
			'detailsItem' => array(self::HAS_MANY, 'SpkPaymentOpnamItems', 'payment_opname_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'projects_id' => 'Projects',
			'adendum_id' => 'Adendum',
			'jenis_pembyaran' => 'Tipe Bayar',
			'termin_ke' => 'Termin Ke',
			'tanggal' => 'Tanggal',
			'nominal' => 'Nominal',
			'notes' => 'Notes',
			'ac_transaction_id' => 'Trx. No',
			'validasi' => 'Validasi',
			'is_paid' => 'Status Bayar',
			'image' => 'Image',
			'created_at' => 'Tanggal Opname',
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
		$criteria->compare('projects_id', $this->projects_id, true);
		// $criteria->compare('adendum_id',$this->adendum_id,true);
		// $criteria->compare('jenis_pembyaran',$this->jenis_pembyaran,true);
		$criteria->compare('termin_ke', $this->termin_ke);
		$criteria->compare('tanggal', $this->tanggal, true);
		$criteria->compare('nominal', $this->nominal, true);
		$criteria->compare('notes', $this->notes, true);
		$criteria->compare('ac_transaction_id', $this->ac_transaction_id, true);
		$criteria->compare('validasi', $this->validasi);
		$criteria->compare('is_paid', $this->is_paid);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('created_at', $this->created_at, true);

		// set default is termin, not adendum
		if (isset($_GET['type']) && $_GET['type'] !== 'termin') {
			$criteria->condition = 'adendum_id IS NOT NULL';
			$criteria->compare('jenis_pembyaran', 'adendum');
		}

		if (isset($_GET['is_paid']) && $_GET['is_paid'] !== 'all') {
			$criteria->compare('is_paid', $_GET['is_paid']);
			if ($_GET['is_paid'] == 1) {
				$criteria->compare('validasi', 1);
			}
		} else {
			$criteria->compare('is_paid', 0);
		}

		if ($this->projects_id != '') {
			$criteria->compare('projects_id', $this->projects_id);
		}

		// where company_id get from session_id>company_id
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		// echo '<pre>';
		// print_r($criteria);
		// exit;

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

	public function createReportLastMonth($type = 'opname', $searchs = [])
	{
		$searchs = [
			'start_date' => $searchs['start_date'] ?? date('Y-m-01'),
			'end_date' => $searchs['end_date'] ?? date('Y-m-t'),
			'project_id' => \Yii::app()->session['project_active'],
		];

		if ($type == 'opname') {
			$type = 'opname';
		} else {
			$type = 'adendum';
		}

		if ($type == 'opname') {
			$query = Yii::app()->db->createCommand()
				->select('DATE(tanggal) as date, SUM(nominal) as amount')
				->from('tr_spk_subkon_payments_opnam')
				->where('tanggal >= :start_date AND tanggal <= :end_date AND is_paid=1 AND company_id=:company_id AND projects_id IS NOT NULL')
				->bindValues([
					':start_date' => $searchs['start_date'],
					':end_date' => $searchs['end_date'],
					':company_id' => \Yii::app()->session['project_active'],
				])
				->queryAll();
		} else {
			$query = Yii::app()->db->createCommand()
				->select('DATE(paid_date) as date, SUM(nilai_adendum) as amount')
				->from('tr_spk_subkon_adendum')
				->where('paid_date >= :start_date AND paid_date <= :end_date AND is_lunas=1 AND company_id=:company_id AND projects_id IS NOT NULL')
				->bindValues([
					':start_date' => $searchs['start_date'],
					':end_date' => $searchs['end_date'],
					':company_id' => \Yii::app()->session['project_active'],
				])
				->queryAll();
		}

		if (count($query) > 0 && $query[0]['date'] == null) {
			return [];
		}

		$grandTotal = 0;
		if (isset($query) && count($query) > 0) {
			$grandTotal = array_sum(array_column($query, 'amount'));
		}

		return [
			'data' => $query,
			'grandTotal' => $grandTotal,
		];
	}
}
