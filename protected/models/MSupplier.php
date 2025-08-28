<?php

/**
 * This is the model class for table "m_supplier".
 *
 * The followings are the available columns in table 'm_supplier':
 * @property string $id
 * @property string $no_supplier
 * @property string $nama
 * @property string $alamat
 * @property string $no_npwp
 * @property string $bank_id
 * @property string $bank_name
 * @property string $bank_norek
 * @property string $created_at
 * @property string $deleted_at
 * @property string $company_id
 * @property string $npwp_no
 *
 * The followings are the available model relations:
 * @property MBankList $bank
 * @property MSetCompany $company
 * @property TrPurchaseOrder[] $trPurchaseOrders
 */
class MSupplier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MSupplier the static model class
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
		return 'm_supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_supplier, nama, bank_name, bank_norek', 'length', 'max'=>225),
			array('bank_id, company_id', 'length', 'max'=>11),
			array('alamat, no_npwp, created_at, deleted_at, telepon, npwp_no', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, no_supplier, nama, alamat, no_npwp, bank_id, bank_name, bank_norek, created_at, deleted_at, company_id', 'safe', 'on'=>'search'),
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
			'bank' => array(self::BELONGS_TO, 'MBankList', 'bank_id'),
			'company' => array(self::BELONGS_TO, 'MSetCompany', 'company_id'),
			'trPurchaseOrders' => array(self::HAS_MANY, 'TrPurchaseOrder', 'supplier_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_supplier' => 'No Supplier',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'no_npwp' => 'No Npwp',
			'bank_id' => 'Bank',
			'bank_name' => 'Bank Name',
			'bank_norek' => 'Bank Norek',
			'created_at' => 'Created At',
			'deleted_at' => 'Deleted At',
			'company_id' => 'Company',
			'telepon' => 'Telepon',
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
		$criteria->compare('no_supplier',$this->no_supplier,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_npwp',$this->no_npwp,true);
		$criteria->compare('bank_id',$this->bank_id,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_norek',$this->bank_norek,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('telepon',$this->telepon,true);

		$criteria->addCondition('deleted_at IS NULL');
		$criteria->order = 'created_at DESC';
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
		parent::beforeSave();
		if($this->isNewRecord) {
			$this->created_at = new CDbExpression('NOW()');
			$this->company_id = \Yii::app()->session['project_active'];
		}
		return true;
	}
}