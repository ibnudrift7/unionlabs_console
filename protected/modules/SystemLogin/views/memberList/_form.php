<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'member-list-form',
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
			Data MemberList		</h5>
		<div class="wrapped">
							<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>100)); ?>

							<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>100)); ?>

							<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>150)); ?>

							<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>255)); ?>

							<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>50)); ?>

							<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>

							<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>1)); ?>

							<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

							<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>

							<?php echo $form->textFieldRow($model,'is_verified',array('class'=>'span5')); ?>

							<?php // echo $form->textFieldRow($model,'deleted_at',array('class'=>'span5')); ?>

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
