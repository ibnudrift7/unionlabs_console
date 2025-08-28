<?php

/**
 * This is the model class for table "tr_spk_subkon".
 *
 * The followings are the available columns in table 'tr_spk_subkon':
 * @property string $id
 * @property string $spk_no
 * @property string $tanggal
 * @property string $subkon_id
 * @property string $company_id
 * @property string $project_client_id
 * @property string $kategori_pekerjaan_id
 * @property string $nama_perintah_kerja
 * @property string $lokasi_pekerjaan
 * @property double $nilai_kontrak
 * @property double $sisa_kontrak
 * @property double $kurang_bayar_kontrak
 * @property string $tanggal_start
 * @property integer $lama_pengerjaan
 * @property integer $is_paid
 * @property integer $status_project
 * @property string $status_deadline
 * @property string $updated_at
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property MSubkonList $subkon
 * @property MSetCompany $company
 * @property MCustomer $projectClient
 * @property MKategoriSpk $kategoriPekerjaan
 * @property SpkSubkonDetail[] $spkSubkonDetails
 */
class SpkSubkon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpkSubkon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tr_spk_subkon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lama_pengerjaan, is_paid, status_project', 'numerical', 'integerOnly'=>true),
			array('nilai_kontrak, sisa_kontrak, kurang_bayar_kontrak', 'numerical'),
			array('spk_no, nama_perintah_kerja, lokasi_pekerjaan', 'length', 'max'=>225),
			array('subkon_id, project_client_id', 'length', 'max'=>20),
			array('company_id, kategori_pekerjaan_id', 'length', 'max'=>11),
			array('status_deadline', 'length', 'max'=>8),
			array('tanggal, tanggal_start, updated_at, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, spk_no, tanggal, subkon_id, company_id, project_client_id, kategori_pekerjaan_id, nama_perintah_kerja, lokasi_pekerjaan, nilai_kontrak, sisa_kontrak, kurang_bayar_kontrak, tanggal_start, lama_pengerjaan, is_paid, status_project, status_deadline, updated_at, created_at', 'safe', 'on'=>'search'),
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
			'subkon' => array(self::BELONGS_TO, 'MSubkonList', 'subkon_id'),
			'company' => array(self::BELONGS_TO, 'MSetCompany', 'company_id'),
			'projectClient' => array(self::BELONGS_TO, 'MCustomer', 'project_client_id'),
			'kategoriPekerjaan' => array(self::BELONGS_TO, 'MKategoriPekerjaan', 'kategori_pekerjaan_id'),
			'spkSubkonDetails' => array(self::HAS_MANY, 'SpkSubkonDetail', 'spk_subkon_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'spk_no' => 'Spk No',
			'tanggal' => 'Tanggal',
			'subkon_id' => 'Subkon',
			'company_id' => 'Company',
			'project_client_id' => 'Project Client',
			'kategori_pekerjaan_id' => 'Kategori Pekerjaan',
			'nama_perintah_kerja' => 'Nama Perintah Kerja',
			'lokasi_pekerjaan' => 'Lokasi Pekerjaan',
			'nilai_kontrak' => 'Nilai Kontrak',
			'sisa_kontrak' => 'Sisa Kontrak',
			'kurang_bayar_kontrak' => 'Kurang Bayar Kontrak',
			'tanggal_start' => 'Tanggal Start',
			'lama_pengerjaan' => 'Lama Pengerjaan',
			'is_paid' => 'Is Paid',
			'status_project' => 'Status Project',
			'status_deadline' => 'Status Deadline',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('spk_no',$this->spk_no,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('subkon_id',$this->subkon_id,true);
		// $criteria->compare('company_id',$this->company_id,true);
		
		// where company_id get from session_id>company_id
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		$criteria->compare('project_client_id',$this->project_client_id,true);
		$criteria->compare('kategori_pekerjaan_id',$this->kategori_pekerjaan_id,true);
		$criteria->compare('nama_perintah_kerja',$this->nama_perintah_kerja,true);
		$criteria->compare('lokasi_pekerjaan',$this->lokasi_pekerjaan,true);
		$criteria->compare('nilai_kontrak',$this->nilai_kontrak);
		$criteria->compare('sisa_kontrak',$this->sisa_kontrak);
		$criteria->compare('kurang_bayar_kontrak',$this->kurang_bayar_kontrak);
		$criteria->compare('tanggal_start',$this->tanggal_start,true);
		$criteria->compare('lama_pengerjaan',$this->lama_pengerjaan);
		$criteria->compare('is_paid',$this->is_paid);
		$criteria->compare('status_project',$this->status_project);
		$criteria->compare('status_deadline',$this->status_deadline,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}