<?php

/**
 * This is the model class for table "tr_logs_admin_activitys".
 *
 * The followings are the available columns in table 'tr_logs_admin_activitys':
 * @property string $id
 * @property integer $admin_id
 * @property integer $company_id
 * @property string $tipe_transaksi
 * @property string $deskripsi
 * @property double $nominal
 * @property string $tipe_action
 * @property string $created_at
 * @property string $admin_name
 */
class LogsActivitys extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogsActivitys the static model class
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
		return 'tr_logs_admin_activitys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admin_id, company_id', 'numerical', 'integerOnly'=>true),
			array('nominal', 'numerical'),
			array('tipe_transaksi', 'length', 'max'=>225),
			array('tipe_action', 'length', 'max'=>6),
			array('deskripsi, created_at, admin_name', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, admin_id, company_id, tipe_transaksi, deskripsi, nominal, tipe_action, created_at, admin_name', 'safe', 'on'=>'search'),
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
			'admin_id' => 'Admin',
			'company_id' => 'Company',
			'tipe_transaksi' => 'Tipe Transaksi',
			'deskripsi' => 'Deskripsi',
			'nominal' => 'Nominal',
			'tipe_action' => 'Tipe Action',
			'created_at' => 'Tgl. Input',
			'admin_name' => 'Admin Name',
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

		// $criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('tipe_transaksi',$this->tipe_transaksi,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('nominal',$this->nominal);
		$criteria->compare('tipe_action',$this->tipe_action,true);
		$criteria->compare('admin_name',$this->admin_name,true);
		// $criteria->compare('created_at',$this->created_at,true);
		// $criteria->compare('company_id',$this->company_id);

		$criteria->compare('company_id', \Yii::app()->session['project_active']);

		$criteria->order = 'created_at DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 50,
			),
		));
	}

	// before save
	public function beforeSave()
	{
		parent::beforeSave();
		if ($this->isNewRecord) {
			$this->created_at = date('Y-m-d H:i:s');
			$this->company_id = \Yii::app()->session['project_active'];
		}
		return true;
	}

	public static function createLog($tipeTrx, $deskripsi, $nominal, $tipeAction)
	{
		// echo '<pre>';
		// echo($tipeTrx . ' - ' . $deskripsi . ' - ' . $nominal . ' - ' . $tipeAction);
		// echo '</pre>';
		// exit;
		// $tipeTrx, 
		// $deskripsi, 
		// $nominal, 
		// $tipeAction
		$userId = User::model()->findByAttributes(array('email' => Yii::app()->user->id))->id;
		$data = new LogsActivitys;
		$data->tipe_transaksi = $tipeTrx;
		$data->deskripsi = $deskripsi;
		$data->nominal = $nominal;
		$data->tipe_action = $tipeAction;
		$data->admin_id = $userId;
		$data->admin_name = \Yii::app()->user->name;
		$data->save(false);
	}
}