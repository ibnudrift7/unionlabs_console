<?php

/**
 * This is the model class for table "bw_slides".
 *
 * The followings are the available columns in table 'bw_slides':
 * @property string $id
 * @property string $image
 * @property string $titles
 * @property string $contents
 * @property integer $sorts
 * @property string $created_at
 * @property string $deleted_at
 */
class Slides extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slides the static model class
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
		return 'bw_slides';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sorts', 'numerical', 'integerOnly'=>true),
			array('titles', 'length', 'max'=>225),
			array('contents, created_at, deleted_at', 'safe'),
			// The following rule is used by search().
			array(
				'image, image2',
				'file',
				'maxSize' => 1024 * 1024 * 3,
				'types' => 'jpg, jpeg, png',
				'allowEmpty' => true
			),
			// Please remove those attributes that should not be searched.
			array('id, image, titles, contents, sorts, created_at, deleted_at', 'safe', 'on'=>'search'),
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
			'image' => 'Image Desktop',
			'image2' => 'Image Mobile',
			'titles' => 'Titles',
			'contents' => 'Contents',
			'sorts' => 'Sorts',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('titles',$this->titles,true);
		$criteria->compare('contents',$this->contents,true);
		$criteria->compare('sorts',$this->sorts);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->addCondition('deleted_at IS NULL');

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