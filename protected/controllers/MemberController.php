<?php

class MemberController extends Controller
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

    public function actionIndex()
    {
        $session = new CHttpSession;
        $session->open();
        if (!isset($session['login_member'])) {
            $this->redirect(array('login'));
        }

        $this->layout = '//layouts/column2';
        if (isset($session['login_member'])) {
            $model = Member::model()->findByPk($session['login_member']['id']);

            if (isset($_POST['Member'])) {
                $model->attributes = $_POST['Member'];
                if ($model->pass2 != '') {
                    $model->pass = sha1($model->pass2);
                }

                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Data berhasil disimpan');
                    $this->redirect(array('index'));
                }
            }

            $model->pass = '';
            $model->pass2 = '';

            $this->render('index_list', array(
                'model' => $model,
            ));
        }
    }

    public function actionUnit()
    {
        $session = new CHttpSession;
        $session->open();
        if (!isset($session['login_member'])) {
            $this->redirect(array('login'));
        }

        if (isset($session['login_member'])) {
            $model = Member::model()->findByPk($session['login_member']['id']);

            // show data unit from ktp_no
            $criteria = new CDbCriteria;
            $criteria->addCondition('ktp_no = :ktp_no');
            $criteria->order = 't.id DESC';
            $criteria->params[':ktp_no'] = $session['login_member']['no_ktp'];
            $unit = new CActiveDataProvider('UnitMaster', array(
                'criteria' => $criteria,
                'pagination' => false,
            ));

            $this->layout = '//layouts/column2';
            $this->render('view_unit', array(
                'model' => $model,
                'units' => $unit,
            ));
        }
    }

    public function actionLogin()
    {
        $modelLogin = new LoginForm2;
        if (isset($_POST['LoginForm2'])) {
            $modelLogin->attributes = $_POST['LoginForm2'];
            // validate user input and redirect to the previous page if valid
            if ($modelLogin->validate()) {
                $data = Member::model()->find('no_ktp = :no_ktp', array(':no_ktp' => $modelLogin->username));

                $session = new CHttpSession;
                $session->open();
                $session['login_member'] = $data->attributes;

                $this->redirect(array('index'));
            } else {
                echo 'Login gagal';
            }
        }

        $this->render('login', array(
            'modelLogin' => $modelLogin,
        ));
    }

    // unit_request_st
    public function actionUnitRequestSt()
    {
        $session = new CHttpSession;
        $session->open();
        if (!isset($session['login_member'])) {
            $this->redirect(array('login'));
        }

        if (isset($_POST['id']) && isset($_POST['date_request']) && isset($_POST['time_request'])) {
            $unit = UnitMaster::model()->findByPk($_POST['id']);
            $nTime = $_POST['time_request'];
            if (strlen($nTime) < 2) {
                $nTime = '0' . $nTime;
            }

            $fixTime = strtotime($_POST['date_request'] . ' ' . $nTime . ':00');
            $unit->status_request_st = 1;
            $unit->tanggal_request_st = date('Y-m-d H:i:s', $fixTime);
            $unit->date_input_request_st = date('Y-m-d H:i:s');
            $unit->save(false);

            // send wa
            $arr_data = array(
                'code_unit' => $unit->code_unit,
                'tgl' => date('d-m-Y', $fixTime),
                'jam' => date('H:i', $fixTime),
                'nama' => $session['login_member']['first_name'],
                'no_ktp' => $session['login_member']['no_ktp'],
                'date_st' => date('d-m-Y', $fixTime),
                'phone' => $session['login_member']['phone'],
            );
            // CallWaApi
            Tt::CallWaApi($session['login_member']['no_hp'], $arr_data, 'request_st', 'admin');

            http_response_code(200);
            echo json_encode(array('status' => 'success'));
            exit;
        } else {
            http_response_code(400);
            echo json_encode(array('status' => 'failed'));
            exit;
        }
    }

    // unit_validasi_st
    public function actionUnitValidasiSt()
    {
        $session = new CHttpSession;
        $session->open();
        if (!isset($session['login_member'])) {
            $this->redirect(array('login'));
        }

        if (isset($_GET['id'])) {
            $unit = UnitMaster::model()->findByPk($_GET['id']);
            $unit->st_validasi_user = 1;
            $unit->tanggal_st_fix_user = date('Y-m-d H:i:s');
            $unit->save(false);
            Yii::app()->user->setFlash('success', 'Data berhasil divalidasi');

            $this->redirect(array('unit'));
        }
    }

    public function actionLogout()
    {
        $session = new CHttpSession;
        $session->open();
        unset($session['login_member']);
        $this->redirect(array('index'));
    }
}
