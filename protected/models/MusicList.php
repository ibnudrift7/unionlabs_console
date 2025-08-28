<?php

/**
 * This is the model class for table "bw_music_list".
 *
 * The followings are the available columns in table 'bw_music_list':
 * @property string $id
 * @property string $album_id
 * @property string $names
 * @property string $image
 * @property string $contents
 * @property string $duration
 * @property string $source_music
 * @property string $image_lyric
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class MusicList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MusicList the static model class
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
		return 'bw_music_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album_id', 'length', 'max'=>20),
			array('names, image, source_music', 'length', 'max'=>225),
			array('duration', 'length', 'max'=>50),
			array('contents, created_at, updated_at, deleted_at', 'safe'),
			// The following rule is used by search().
			array('image, image_lyric', 'file',
			'maxSize' => 1024 * 1024 * 3,
			'types' => 'jpg, jpeg, png',
			'allowEmpty' => true),
			array('source_music', 'file',
			'maxSize' => 1024 * 1024 * 30,
			'types' => 'mp3, mp4',
			'allowEmpty' => true),
			// The following rule is used by search().
			array('id, album_id, names, image, contents, duration, source_music, image_lyric, created_at, updated_at, deleted_at', 'safe', 'on'=>'search'),
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
			'album' => array(self::BELONGS_TO, 'MediaListItems', 'album_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'album_id' => 'Album',
			'names' => 'Names',
			'image' => 'Image Music',
			'contents' => 'Contents',
			'duration' => 'Duration',
			'source_music' => 'Source Music (mp3)',
			'image_lyric' => 'Image Lyric',
			'created_at' => 'Tgl. Input',
			'updated_at' => 'Tgl. Update',
			'deleted_at' => 'Tgl. Delete',
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
		$criteria->compare('album_id',$this->album_id,true);
		$criteria->compare('names',$this->names,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('contents',$this->contents,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('source_music',$this->source_music,true);
		$criteria->compare('image_lyric',$this->image_lyric,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		// $criteria->compare('deleted_at',$this->deleted_at,true);

		$criteria->addCondition('deleted_at IS NULL');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// before save
	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->created_at = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}

	// deleteDate
	public function deleteDate($id)
	{
		$this->updateByPk($id, array('deleted_at' => date('Y-m-d H:i:s')));
		Log::createLog("MusicListController Delete $id");
		return true;
	}

}