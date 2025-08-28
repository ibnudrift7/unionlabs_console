<?php

/**
 * This is the model class for table "uni_products".
 *
 * The followings are the available columns in table 'uni_products':
 * @property string $id
 * @property string $sku_code
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $category_id
 * @property integer $brand_id
 * @property string $base_price
 * @property string $sale_price
 * @property integer $stock_quantity
 * @property integer $stock_alert_threshold
 * @property integer $is_active
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
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
		return 'uni_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, slug, base_price', 'required'),
			array('brand_id, stock_quantity, stock_alert_threshold, is_active', 'numerical', 'integerOnly'=>true),
			array('sku_code', 'length', 'max'=>100),
			array('name, slug', 'length', 'max'=>150),
			array('category_id', 'length', 'max'=>20),
			array('base_price, sale_price', 'length', 'max'=>12),
			array('status', 'length', 'max'=>8),
			array('description, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sku_code, name, slug, description, category_id, brand_id, base_price, sale_price, stock_quantity, stock_alert_threshold, is_active, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sku_code' => 'Sku Code',
			'name' => 'Name',
			'slug' => 'Slug',
			'description' => 'Description',
			'category_id' => 'Category',
			'brand_id' => 'Brand',
			'base_price' => 'Base Price',
			'sale_price' => 'Sale Price',
			'stock_quantity' => 'Stock Quantity',
			'stock_alert_threshold' => 'Stock Alert Threshold',
			'is_active' => 'Is Active',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('sku_code',$this->sku_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('base_price',$this->base_price,true);
		$criteria->compare('sale_price',$this->sale_price,true);
		$criteria->compare('stock_quantity',$this->stock_quantity);
		$criteria->compare('stock_alert_threshold',$this->stock_alert_threshold);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}