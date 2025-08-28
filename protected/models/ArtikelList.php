<?php

/**
 * This is the model class for table "bw_artikel_list".
 *
 * The followings are the available columns in table 'bw_artikel_list':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $slug
 * @property string $content
 * @property string $dates
 * @property string $created_at
 * @property string $deleted_at
 * @property integer $type_artikel_id
 * @property integer $articles_category_id
 * @property string $waktu_acara
 */
class ArtikelList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArtikelList the static model class
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
		return 'bw_artikel_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('type_artikel_id, articles_category_id', 'numerical', 'integerOnly'=>true),
			array('title, image, slug', 'length', 'max'=>255),
			array('content, dates, created_at, deleted_at, waktu_acara', 'safe'),
			// The following rule is used by search().
			array(
				'image',
				'file',
				'maxSize' => 1024 * 1024 * 3,
				'types' => 'jpg, jpeg, png',
				'allowEmpty' => true
			),
			// Please remove those attributes that should not be searched.
			array('id, title, image, slug, content, dates, created_at, deleted_at, type_artikel_id, articles_category_id', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'ArticlesCategory', 'articles_category_id'),
			'typeArtikel' => array(self::BELONGS_TO, 'TypeArtikel', 'type_artikel_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'image' => 'Image',
			'slug' => 'Slug',
			'content' => 'Content',
			'dates' => 'Tgl. Artikel / Event',
			'created_at' => 'Created At',
			'deleted_at' => 'Deleted At',
			'type_artikel_id' => 'Type Artikel',
			'articles_category_id' => 'Articles Category',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('dates',$this->dates,true);
		$criteria->compare('type_artikel_id',$this->type_artikel_id);
		$criteria->compare('articles_category_id',$this->articles_category_id);

		$criteria->addCondition('deleted_at IS NULL');

		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->created_at = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}
}