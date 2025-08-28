<?php

class SiteController extends ControllerAdmin
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//array('SystemLogin.filter.AuthFilter'),
		);
	}

	public function accessRules()
	{
		return array(
			array(
				'allow',  // deny all users
				'actions' => array('error'),
				'users' => array('*'),
			),
			(!Yii::app()->user->isGuest) ?
				array(
					'allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions' => array('index', 'hotel', 'getCity'),
					'users' => array(Yii::app()->user->name),
				) :
				array(
					'deny',  // deny all users
					'users' => array('*'),
				),
		);
	}

	// getCity
	public function actionGetCity()
	{
		$province_id = $_POST['province_id'];
		if (empty($province_id)) {
			// json encode required province_id
			echo json_encode(['' => 'Pilih Provinsi']);
			return;
		}

		$city = City::model()->findAllByAttributes(array('province_id' => $province_id));
		$data = CHtml::listData($city, 'id', 'city_name');

		$options = [];
		foreach ($data as $value => $name) {
			$options[$value] = $name;
		}

		echo json_encode($options);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// $project_active = \Yii::app()->session['project_active'];
		// if (empty($project_active) || $project_active == 0) {
		// 	$userLog = User::model()->findByAttributes(array('email' => Yii::app()->user->id));
		// 	$project = MSetCompany::model()->findByAttributes(array('id' => $userLog->company_id ?? 1));

		// 	Yii::app()->session['project_active'] = $project->id;
		// 	Yii::app()->session['project_active_name'] = $project->perusahaan_name;
		// }


		$this->layout = '//layoutsAdmin/column1';
		$this->render('index', array(
			'rekapAsset' => $rekapAsset ?? [],
		));
	}

	// public function actionChangeProjects()
	// {
	// 	$project_id = $_POST['project_id'];
	// 	$project = MSetCompany::model()->findByPk($project_id);

	// 	Yii::app()->session['project_active'] = $project_id;
	// 	Yii::app()->session['project_active_name'] = $project->perusahaan_name;

	// 	echo json_encode(array('status' => 200, 'message' => 'Success change project'));
	// }

	// clean folder
	public function cleanFolder($dir)
	{
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir . "/" . $object) == "dir")
						$this->cleanFolder($dir . "/" . $object);
					else
						unlink($dir . "/" . $object);
				}
			}
			reset($objects);
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = '//layoutsAdmin/error';
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else {
				$this->render('error', $error);
			}
		}
	}

	public function hasMenu()
	{
		return true;
	}
}
