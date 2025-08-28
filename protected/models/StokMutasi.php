<?php

/**
 * This is the model class for table "m_ivn_stok_mutasi".
 *
 * The followings are the available columns in table 'm_ivn_stok_mutasi':
 * @property string $id
 * @property string $item_id
 * @property double $qty_total
 * @property double $volume_total
 * @property double $warning_stock
 * @property string $company_id
 *
 * The followings are the available model relations:
 * @property MItemBarang $item
 * @property MSetCompany $company
 */
class StokMutasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StokMutasi the static model class
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
		return 'm_ivn_stok_mutasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qty_total, volume_total, warning_stock', 'numerical'),
			array('item_id', 'length', 'max'=>20),
			array('company_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_id, qty_total, volume_total, warning_stock, company_id', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'MItemBarang', 'item_id'),
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
			'item_id' => 'Item',
			'qty_total' => 'Qty Total',
			'volume_total' => 'Volume Total',
			'warning_stock' => 'Warning Stock',
			'company_id' => 'Company',
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
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('qty_total',$this->qty_total);
		$criteria->compare('volume_total',$this->volume_total);
		$criteria->compare('warning_stock',$this->warning_stock);

		// where company_id get from session_id>company_id
		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}