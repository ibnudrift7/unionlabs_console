<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'rekening-list-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			Data RekeningList		</h5>
		<div class="wrapped">
							<?php echo $form->textFieldRow($model,'bank_name',array('class'=>'span5','maxlength'=>100)); ?>

							<?php 
								$bankAccount = array(
									'bca' => 'BCA',
									'bri' => 'BRI',
									'bni' => 'BNI',
									'mandiri' => 'Mandiri',
									'btn' => 'BTN',
									'btpn' => 'BTPN',
									'bukopin' => 'Bukopin'
								);
								echo $form->dropDownListRow($model, 'bank_account', $bankAccount, array('class'=>'span5', 'empty' => '-- Pilih Bank --'));
							?>

							<?php echo $form->textFieldRow($model,'bank_number',array('class'=>'span5','maxlength'=>50)); ?>

						<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
			'htmlOptions' => array('class' => 'btn btn-sm btn-primary'),
		)); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
			'htmlOptions' => array('class' => 'btn btn-sm btn-info'),
		)); ?>
		</div>
	</div>
</div>
<div class="alert alert-primary fs-6 fw-light p-2" role="alert">
	<button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>
	<strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
