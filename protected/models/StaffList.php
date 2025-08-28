<?php

/**
 * This is the model class for table "m_staff_list".
 *
 * The followings are the available columns in table 'm_staff_list':
 * @property string $id
 * @property string $name
 * @property string $jabatan
 * @property integer $status
 * @property double $gaji_harian
 * @property double $gaji_pokok
 * @property double $gaji_lembur
 * @property double $gaji_makan_lembur
 * @property integer $gaji_luar
 * @property string $deleted_at
 * @property string $created_at
 * @property string $phones
 * @property string $alamat
 */
class StaffList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StaffList the static model class
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
		return 'm_staff_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly' => true),
			array('gaji_harian, gaji_pokok, gaji_lembur, gaji_luar', 'numerical'),
			array('name, jabatan', 'length', 'max' => 225),
			array('deleted_at, created_at, gaji_makan_lembur, gaji_luar, phones, alamat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, jabatan, status, gaji_harian, gaji_pokok, gaji_lembur, gaji_luar, deleted_at, created_at', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'jabatan' => 'Jabatan',
			'status' => 'Status',
			'gaji_harian' => 'Gaji Harian',
			'gaji_pokok' => 'Gaji Pokok',
			'gaji_lembur' => 'Gaji Lembur',
			'gaji_luar' => 'Gaji Luar',
			'deleted_at' => 'Deleted At',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('jabatan', $this->jabatan, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('gaji_harian', $this->gaji_harian);
		$criteria->compare('gaji_pokok', $this->gaji_pokok);
		$criteria->compare('gaji_lembur', $this->gaji_lembur);
		$criteria->compare('gaji_luar', $this->gaji_luar);
		$criteria->compare('created_at', $this->created_at, true);

		$criteria->addCondition('deleted_at IS NULL');
		$criteria->order = 't.id DESC';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
