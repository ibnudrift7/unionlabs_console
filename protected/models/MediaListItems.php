<?php

/**
 * This is the model class for table "bw_media_list_items".
 *
 * The followings are the available columns in table 'bw_media_list_items':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $slug
 * @property string $content
 * @property string $images_song
 * @property string $video_url
 * @property string $date_event
 * @property string $created_at
 * @property string $deleted_at
 * @property integer $type_media_id
 * @property integer $category_id
 */
class MediaListItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MediaListItems the static model class
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
		return 'bw_media_list_items';
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
			array('category_id, type_media_id', 'numerical', 'integerOnly'=>true),
			array('title, slug, video_url', 'length', 'max'=>255),
			array('content, date_event, created_at, deleted_at, category_id, ', 'safe'),
			// The following rule is used by search().
			array(
				'image, images_song',
				'file',
				'maxSize' => 1024 * 1024 * 3,
				'types' => 'jpg, jpeg, png',
				'allowEmpty' => true
			),
			// Please remove those attributes that should not be searched.
			array('id, title, image, slug, content, images_song, video_url, date_event, created_at, deleted_at, type_media_id', 'safe', 'on'=>'search'),
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
			'typeMedia' => array(self::BELONGS_TO, 'MediaTypes', 'type_media_id'),
			'category' => array(self::BELONGS_TO, 'MediaCategories', 'category_id'),
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
			'images_song' => 'Image Song',
			'video_url' => 'Video Url',
			'date_event' => 'Date Event',
			'created_at' => 'Created At',
			'deleted_at' => 'Deleted At',
			'category_id' => 'Category',
			'type_media_id' => 'Type Media',
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
		$criteria->compare('images_song',$this->images_song,true);
		$criteria->compare('video_url',$this->video_url,true);
		$criteria->compare('date_event',$this->date_event,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('type_media_id',$this->type_media_id);

		$criteria->addCondition('deleted_at IS NULL');

		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function deleteDate($id)
	{
		$this->updateByPk($id, array('deleted_at' => date('Y-m-d H:i:s')));
		Log::createLog("MediaListItemsController Delete $id");
		return true;
	}

	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->created_at = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}

}