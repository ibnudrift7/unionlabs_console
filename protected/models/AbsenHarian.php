<?php

/**
 * This is the model class for table "tr_absen_harian".
 *
 * The followings are the available columns in table 'tr_absen_harian':
 * @property string $id
 * @property string $staff_id
 * @property string $proyek_id
 * @property string $tanggal
 * @property double $q_hadir
 * @property double $p_hadir
 * @property double $q_lembur
 * @property double $p_lembur
 * @property double $q_makan_lembur
 * @property double $p_makan_lembur
 * @property double $q_luar_sal
 * @property double $p_luar_sal
 * @property integer $is_gaji_pokok
 * @property integer $company_id
 * @property double $p_gaji_pokok
 * @property double $jumlah_total
 * @property string $created_at
 * @property string $deleted_at
 * @property integer $is_paid
 */
class AbsenHarian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AbsenHarian the static model class
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
		return 'tr_absen_harian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_gaji_pokok', 'numerical', 'integerOnly' => true),
			array('q_hadir, p_hadir, q_lembur, p_lembur, q_makan_lembur, p_makan_lembur, q_luar_sal, p_luar_sal, p_gaji_pokok, jumlah_total', 'numerical'),
			array('staff_id', 'length', 'max' => 20),
			array('proyek_id', 'length', 'max' => 11),
			array('tanggal, created_at, deleted_at, company_id, is_paid', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, staff_id, proyek_id, tanggal, q_hadir, p_hadir, q_lembur, p_lembur, q_makan_lembur, p_makan_lembur, q_luar_sal, p_luar_sal, is_gaji_pokok, p_gaji_pokok, jumlah_total, created_at, deleted_at', 'safe', 'on' => 'search'),
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
			'tanggal' => 'Tanggal',
			'q_hadir' => 'Qty Hadir',
			'p_hadir' => 'Price Hadir',
			'q_lembur' => 'Qty Lembur',
			'p_lembur' => 'Price Lembur',
			'q_makan_lembur' => 'Qty Makan Lembur',
			'p_makan_lembur' => 'Price Makan Lembur',
			'q_luar_sal' => 'Qty Luar Sal',
			'p_luar_sal' => 'Price Luar Sal',
			'is_gaji_pokok' => 'Is Gaji Pokok',
			'p_gaji_pokok' => 'P Gaji Pokok',
			'jumlah_total' => 'Jumlah Total',
			'created_at' => 'Created At',
			'deleted_at' => 'Deleted At',
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
		$criteria->compare('tanggal', $this->tanggal, true);
		$criteria->compare('q_hadir', $this->q_hadir);
		$criteria->compare('p_hadir', $this->p_hadir);
		$criteria->compare('q_lembur', $this->q_lembur);
		$criteria->compare('p_lembur', $this->p_lembur);
		$criteria->compare('q_makan_lembur', $this->q_makan_lembur);
		$criteria->compare('p_makan_lembur', $this->p_makan_lembur);
		$criteria->compare('q_luar_sal', $this->q_luar_sal);
		$criteria->compare('p_luar_sal', $this->p_luar_sal);
		$criteria->compare('is_gaji_pokok', $this->is_gaji_pokok);
		$criteria->compare('p_gaji_pokok', $this->p_gaji_pokok);
		$criteria->compare('jumlah_total', $this->jumlah_total);
		$criteria->compare('created_at', $this->created_at, true);

		$criteria->addCondition('deleted_at IS NULL');
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		// deleted_at is null
		$criteria->condition = 'deleted_at IS NULL';

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
