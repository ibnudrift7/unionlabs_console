<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-addresses-form',
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
			Data UserAddresses		</h5>
		<div class="wrapped">
			<div class="row">
				<div class="col-md-6">
					<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>20)); ?>

					<?php echo $form->textFieldRow($model,'recipient_name',array('class'=>'span5','maxlength'=>100)); ?>

					<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>20)); ?>

					<?php echo $form->textAreaRow($model,'address_line',array('rows'=>2, 'cols'=>50, 'class'=>'span8')); ?>
				</div>
				<div class="col-md-6">
					<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>100)); ?>

					<?php echo $form->textFieldRow($model,'province',array('class'=>'span5','maxlength'=>100)); ?>

					<?php echo $form->textFieldRow($model,'postal_code',array('class'=>'span5','maxlength'=>20)); ?>

					<?php 
					// echo $form->textFieldRow($model,'is_default',array('class'=>'span5')); 
					echo $form->dropDownListRow($model, 'is_default', array(0 => 'No', 1 => 'Yes'));
					?>
				</div>
			</div>

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
