<?php


class MediaController extends Controller
{
	public function actionIndex()
	{
		$this->layout='//layouts/column2';

		$arType = 'video';
		$typeModel = null;
		if(Yii::app()->request->getParam('type')) {
			$typeModel = MediaTypes::model()->find('LOWER(name) = :name', array(':name' => Yii::app()->request->getParam('type')));
			if($typeModel) {
				$arType = $typeModel->name;
			}
		} else {
			// default video.
			$typeModel = MediaTypes::model()->find('LOWER(name) = :name', array(':name' => 'video'));
		}

		$category = null;
		if(Yii::app()->request->getParam('category')) {
			$category = MediaListCategory::model()->find('LOWER(t.id) = :id', array(':id' => Yii::app()->request->getParam('category')));
		}

		// MediaListItems
		$criteria2 = new CDbCriteria;
		$criteria2->addCondition('t.deleted_at IS NULL AND t.type_media_id = '. intval($typeModel->id));
		if($category) {
			$criteria2->compare('t.category_id', intval($category->id));
		}
		if(Yii::app()->request->getParam('q')) {
			$criteria2->addSearchCondition('title', Yii::app()->request->getParam('q'));
		}
		// echo '<pre>';
		// echo print_r($criteria2);
		// exit;

		$model = new CActiveDataProvider('MediaListItems', array(
			'criteria' => $criteria2,
			'pagination' => array(
				'pageSize' => 6,
			),
		));

		$this->pageTitle = ($this->setting['media_meta_title'] != '') ? $this->setting['media_meta_title'] : 'Budhist Worship - Media';
		$this->metaKey = ($this->setting['media_meta_keyword'] != '') ? $this->setting['media_meta_keyword'] : 'Budhist Worship, Media';
		$this->metaDesc = ($this->setting['media_meta_description'] != '') ? $this->setting['media_meta_description'] : 'Budhist Worship - Media';

		$this->pageTitle = ucwords(strtolower($arType)) .' - '.$this->pageTitle;
		$this->render('index', [
			'type' => $arType,
			'type_model' => $typeModel,
			'category' => $category,
			'model' => $model,
		]);
	}

	public function actionDetail($id)
	{
		$this->layout='//layouts/column2';

		$criteria = new CDbCriteria;
		$criteria->compare('LOWER(t.id)', intval($id));
		$criteria->addCondition('t.deleted_at IS NULL');
		$data = MediaListItems::model()->find($criteria);
		if(!$data) {
			$this->redirect(array('/media/index'));
		}

		$this->pageTitle = ($this->setting['media_meta_title'] != '') ? $this->setting['media_meta_title'] : 'Budhist Worship - Media' . ' - ' . $data->title;
		$this->metaKey = ($this->setting['media_meta_keyword'] != '') ? $this->setting['media_meta_keyword'] : 'Budhist Worship, Media';
		$this->metaDesc = ($this->setting['media_meta_description'] != '') ? $this->setting['media_meta_description'] : 'Budhist Worship - Media' . ' - ' . $data->title;

		$this->render('detail', [
			'data' => $data,
		]);
	}

	public function actionMusic($id)
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Music - '.$this->pageTitle;

		$criteria = new CDbCriteria;
		$criteria->compare('t.id', intval($id));
		$criteria->addCondition('t.deleted_at IS NULL');
		$data = MediaListItems::model()->find($criteria);
		if(!$data) {
			$this->redirect(array('/media/index'));
		}

		// get list music. MusicList 
		$criteria2 = new CDbCriteria;
		$criteria2->compare('t.album_id', intval($id));
		$criteria2->addCondition('t.deleted_at IS NULL');
		$data2 = MusicList::model()->findAll($criteria2);

		$this->pageTitle = 'Music - Budhist Worship - '.$this->pageTitle;
		$this->metaKey = 'Music, Budhist Worship, '.$this->metaKey;
		$this->metaDesc = 'Music, Budhist Worship, '.$this->metaDesc;

		$this->render('music-list',
			[
				'data' => $data,
				'musicData' => $data2,
			]
		);
	}
	
	public function actionMusicLyric($id)
	{
		$this->layout='//layouts/column2';
		$id = intval($id);
		$criteria = new CDbCriteria;
		$criteria->compare('t.id', $id);
		$criteria->addCondition('t.deleted_at IS NULL');
		$data = MusicList::model()->find($criteria);
		if(!$data) {
			$this->redirect(array('/media/index'));
		}
		$this->pageTitle = $data->names.' - Music Lyric - Budhist Worship';
		$this->metaKey = $data->names.', Music Lyric, Budhist Worship';
		$this->metaDesc = $data->names.', Music Lyric, Budhist Worship';

		$this->render('music-lyric', [
			'data' => $data,
		]);
	}

	public function actionMusicDetail()
	{
		$this->layout='//layouts/column2';
		$this->render('music-detail');
	}
	
	public function actionPodcast()
	{
		$this->layout='//layouts/column2';
		$this->render('podcast');
	}

	public function actionAlbum()
	{
		$this->layout='//layouts/column2';
		$this->render('album');
	}
}
