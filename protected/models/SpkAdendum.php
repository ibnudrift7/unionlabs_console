<?php

/**
 * This is the model class for table "tr_spk_subkon_adendum".
 *
 * The followings are the available columns in table 'tr_spk_subkon_adendum':
 * @property string $id
 * @property string $projects_id
 * @property string $no_adendum
 * @property string $tanggal
 * @property string $tembusan_person
 * @property double $nilai_adendum
 * @property string $created_at
 * @property string $update_at
 * @property string $notes
 * @property string $deleted_at
 * @property integer $is_lunas
 * @property string $paid_date
 * @property string $image
 * @property integer $bank_id
 *
 * The followings are the available model relations:
 * @property MSetCompany $company
 * @property SpkHeader $projects
 */
class SpkAdendum extends CActiveRecord
{
	const isLunasList = [
		0 => 'Pending',
		2 => 'Sebagian',
		1 => 'Lunas',
	];
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpkAdendum the static model class
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
		return 'tr_spk_subkon_adendum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nilai_adendum', 'numerical'),
			array('projects_id', 'length', 'max' => 20),
			array('no_adendum, tembusan_person', 'length', 'max' => 225),
			array('tanggal, created_at, update_at, notes, is_lunas, deleted_at, paid_date, image, bank_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, projects_id, no_adendum, tanggal, tembusan_person, nilai_adendum, created_at, update_at', 'safe', 'on' => 'search'),
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
			// 'SpkPaymentOpnam' => array(self::HAS_MANY, 'ProjectsAdendumPaymentlog', 'adendum_id'),
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
			'no_adendum' => 'No Adendum',
			'tanggal' => 'Tanggal',
			'tembusan_person' => 'Uraian Adendum',
			'nilai_adendum' => 'Nominal Tambahan',
			'created_at' => 'Created At',
			'update_at' => 'Update At',
			'paid_date' => 'Tgl Bayar',
			'image' => 'Bukti Bayar',
			'is_lunas' => 'Status Bayar',
			'bank_id' => 'Kas Bank',
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
		$criteria->compare('company_id', $this->company_id, true);
		$criteria->compare('projects_id', $this->projects_id, true);
		$criteria->compare('no_adendum', $this->no_adendum, true);
		$criteria->compare('tanggal', $this->tanggal, true);
		$criteria->compare('tembusan_person', $this->tembusan_person, true);
		$criteria->compare('nilai_adendum', $this->nilai_adendum);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('update_at', $this->update_at, true);

		// projects_id.
		if (isset($_GET['project_id']) && $_GET['project_id'] != '') {
			$criteria->compare('projects_id', $_GET['project_id'], true);
		}

		// company_id project active
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		$criteria->condition = 'deleted_at IS NULL';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 10,
			),
		));
	}
}
