<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			Data User </h5>
		<div class="wrapped">

			<?php // if ($model->scenario == 'insert'): 
			?>
			<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>
			<?php // endif 
			?>

			<?php echo $form->textFieldRow($model, 'nama', array('class' => 'span5', 'maxlength' => 100)); ?>

			<?php // if ($model->scenario != 'update'): 
			?>
			<?php echo $form->passwordFieldRow($model, 'pass', array('class' => 'span5', 'maxlength' => 100)); ?>
			<?php // endif 
			?>

			<?php 
			echo $form->dropDownListRow($model, 'group_id', array(
				'0' => 'Direktur / Manager',
				'1' => 'Admin',
				'2' => 'Teknik',
			), array('empty' => '-- Pilih Hak Akses --')); 

			// get list setCompany. company_id
			$company = MSetCompany::model()->findAll();
			$listCompany = CHtml::listData($company, 'id', 'perusahaan_name');
			echo $form->dropDownListRow($model, 'company_id', $listCompany, array('empty' => '-- Pilih Company --'));
			?>

			<?php echo $form->dropDownListRow($model, 'aktif', array(
				'1' => 'Active',
				'0' => 'Non Active',
			)); ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType' => 'submit',
				'type' => 'primary',
				'label' => $model->isNewRecord ? 'Create' : 'Save',
			)); ?>
		</div>
	</div>
</div>
<div class="alert alert-primary fs-6 fw-light p-2" role="alert">
	<button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>
	<strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>