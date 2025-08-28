<?php

class HomeController extends Controller
{

	public function actions()
	{
		return array(
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
		);
	}

	public function actionTestmail()
	{
		// test email
		$this->layout = '//layouts/_blank';

		$model = Appointment::model()->findByPk(1);
		$m_unit = UnitMaster::model()->findByPk($model->unit_id);

		$mail = $this->renderPartial('//mail/appoint2', array(
			'model' => $model,
			'm_unit' => $m_unit,
		), true);

		$config = array(
			'to' => array($this->setting['email'], $model->email),
			'subject' => '[' . Yii::app()->name . '] lakjsdfklsjdf ' . ucwords(strtolower($m_unit->project)),
			'message' => $mail,
			'bcc' => array('fotocopysurabaya12@gmail.com'),
		);
		print_r($config);
		// Common::mail($config);
	}

	public function actionIndex()
	{
		$this->redirect(array('/SystemLogin'));
		exit;
		$this->pageTitle = ($this->setting['home_meta_title'] != '') ? $this->setting['home_meta_title'] : 'Budhist Worship - Home';
		$this->metaKey = ($this->setting['home_meta_keyword'] != '') ? $this->setting['home_meta_keyword'] : 'Budhist Worship,';
		$this->metaDesc = ($this->setting['home_meta_description'] != '') ? $this->setting['home_meta_description'] : 'Budhist Worship';

		$this->layout = '//layouts/column1';

		$this->render('index', array());
	}

	// about, donasi, contact

	public function actionAbout()
	{
		$this->layout = '//layouts/column2';
		$this->render('about', array());
	}

	public function actionDonasi()
	{
		$this->layout = '//layouts/column2';
		$this->render('donasi', array());
	}

	public function actionContact()
	{
		$this->layout = '//layouts/column2';

		$this->pageTitle = ($this->setting['contact_meta_title'] != '') ? $this->setting['contact_meta_title'] : 'Budhist Worship - Contact';
		$this->metaKey = ($this->setting['contact_meta_keyword'] != '') ? $this->setting['contact_meta_keyword'] : 'Budhist Worship, Contact';
		$this->metaDesc = ($this->setting['contact_meta_description'] != '') ? $this->setting['contact_meta_description'] : 'Budhist Worship - Contact';

		$model = new ContactForm;
		$model->scenario = 'insert';
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];

			if ($model->validate()) {
				$secret_key = "6LfZvqQrAAAAAAwKba5dPYG_06NMQRYBB576euGQ";
				$url = "https://www.google.com/recaptcha/api/siteverify";
				$data = array(
					'secret' => $secret_key,
					'response' => $_POST['g-recaptcha-response'],
					'remoteip' => $_SERVER['REMOTE_ADDR']
				);
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($ch);
				curl_close($ch);
				$response = json_decode($response);
				if ($response->success == false) {
					$model->addError('verifyCode', 'Pastikan anda sudah menyelesaikan captcha');
				} else {
					// config email
					// $messaged = $this->renderPartial('//mail/contact2', array(
					// 	'model' => $model,
					// ), TRUE);
					// $config = array(
					// 	'to' => array($model->email, $this->setting['email'], $this->setting['contact_email']),
					// 	'subject' => '[' . Yii::app()->name . '] Contact from ' . $model->email,
					// 	'message' => $messaged,
					// );
					// kirim email
					// Common::mail($config);

					// save to EnquireForm
					$enquire = new EnquireForm;
					$enquire->name = $model->name;
					$enquire->email = $model->email;
					$enquire->message = $model->message;
					$enquire->phones = $model->phones;
					$enquire->ip_address = $_SERVER['REMOTE_ADDR'];
					// check double phone, email
					$check = EnquireForm::model()->find('email = :email OR phones = :phones', array(':email' => $model->email, ':phones' => $model->phones));
					if ($check) {
						$model->addError('email', 'Email or Phone number already exists');
						return false;
					}
					$enquire->save(false);

					Yii::app()->user->setFlash('success', 'Thank you for contact us.');
					$this->refresh();
				}
			}
		}

		$this->render('contact', array(
			'model' => $model,
		));
	}


	public function actionError()
	{
		$this->layout = '//layouts/error';
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else {
				$this->layout = '//layouts/column2';

				$this->pageTitle = 'Error ' . $error['code'] . ': ' . $error['message'] . ' - ' . $this->pageTitle;
				$this->render('error', array(
					'error' => $error,
				));
			}
		}
	}
}
