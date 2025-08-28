<?php

/**
 * This is the model class for table "bw_mb_post_items".
 *
 * The followings are the available columns in table 'bw_mb_post_items':
 * @property string $id
 * @property string $member_id
 * @property string $title
 * @property string $image
 * @property string $slug
 * @property string $content
 * @property string $dates
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $type_post_id
 */
class PostItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostItems the static model class
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
		return 'bw_mb_post_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id', 'required'),
			array('type_post_id', 'numerical', 'integerOnly'=>true),
			array('member_id', 'length', 'max'=>10),
			array('title, image, slug', 'length', 'max'=>255),
			array('content, dates, created_at, updated_at, deleted_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, member_id, title, image, slug, content, dates, created_at, updated_at, deleted_at, type_post_id', 'safe', 'on'=>'search'),
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
			'postComments' => array(self::HAS_MANY, 'PostComments', 'post_id'),
			'postLikes' => array(self::HAS_MANY, 'PostLikes', 'post_id'),
			'member' => array(self::BELONGS_TO, 'MemberList', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'member_id' => 'Member',
			'title' => 'Title',
			'image' => 'Image',
			'slug' => 'Slug',
			'content' => 'Content',
			'dates' => 'Dates',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'deleted_at' => 'Deleted At',
			'type_post_id' => 'Type Post',
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
		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('dates',$this->dates,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('deleted_at',$this->deleted_at,true);
		$criteria->compare('type_post_id',$this->type_post_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}