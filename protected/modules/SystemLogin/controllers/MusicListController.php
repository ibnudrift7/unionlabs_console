<?php

class MusicListController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('SystemLogin.filter.AuthFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MusicList;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MusicList']))
		{
			$model->attributes=$_POST['MusicList'];

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}
			$image_lyric = CUploadedFile::getInstance($model, 'image_lyric');
			if ($image_lyric->name != '') {
				$model->image_lyric = substr(md5(time()), 0, 5) . '-' . $image_lyric->name;
			}
			$source_music = CUploadedFile::getInstance($model, 'source_music');
			if ($source_music->name != '') {
				$model->source_music = substr(md5(time()), 0, 5) . '-' . $source_music->name;
			}

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot') . '/images/music/' . $model->image);
					}
					if ($image_lyric->name != '') {
						$image_lyric->saveAs(Yii::getPathOfAlias('webroot') . '/images/music/' . $model->image_lyric);
					}
					if ($source_music->name != '') {
						$source_music->saveAs(Yii::getPathOfAlias('webroot') . '/images/music/' . $model->source_music);
					}

					$model->save(false);

					Log::createLog("MusicListController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MusicList']))
		{
			$image = $model->image;
			$image_lyric = $model->image_lyric;
			$source_music = $model->source_music;
			$model->attributes=$_POST['MusicList'];
			$model->image = $image;
			$model->image_lyric = $image_lyric;
			$model->source_music = $source_music;

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}
			$image_lyric = CUploadedFile::getInstance($model, 'image_lyric');
			if ($image_lyric->name != '') {
				$model->image_lyric = substr(md5(time()), 0, 5) . '-' . $image_lyric->name;
			}
			$source_music = CUploadedFile::getInstance($model, 'source_music');
			if ($source_music->name != '') {
				$model->source_music = substr(md5(time()), 0, 5) . '-' . $source_music->name;
			}

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot') . '/images/music/' . $model->image);
					}

					if ($source_music->name != '') {
						$source_music->saveAs(Yii::getPathOfAlias('webroot') . '/images/music/' . $model->source_music);
					}

					if ($image_lyric->name != '') {
						$image_lyric->saveAs(Yii::getPathOfAlias('webroot') . '/images/music/' . $model->image_lyric);
					}

					$model->save(false);
					Log::createLog("MusicListController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// if(Yii::app()->request->isPostRequest)
		// {
			// we only allow deletion via POST request
			MusicList::model()->deleteDate($id);
			Log::createLog("MediaListController Delete $id");
			Yii::app()->user->setFlash('success','Data Deleted');

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			// if(!isset($_GET['ajax']))
			// isset($_POST['returnUrl']) ? $_POST['returnUrl'] :
				$this->redirect( array('index'));
		// }
		// else
			// throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new MusicList('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MusicList']))
			$model->attributes=$_GET['MusicList'];

		$dataProvider=new CActiveDataProvider('MusicList');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=MusicList::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='music-list-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
