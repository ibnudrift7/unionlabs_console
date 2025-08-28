<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-members-form',
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
			Data UserMembers		</h5>
		<div class="wrapped">
				<div class="row">
					<div class="col-md-6">
						<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>150)); ?>
						<?php echo $form->textFieldRow($model,'date_of_birth',array('class'=>'span5 datepicker', 'placeholder' => 'YYYY-MM-DD')); ?>
						<?php echo $form->textFieldRow($model,'level_id',array('class'=>'span5','maxlength'=>20)); ?>
						<?php // echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); 
						// dropdown is_active
						echo $form->dropDownListRow($model,'is_active',array('0'=>'Inactive','1'=>'Active'),array('class'=>'span5')); 	
						?>
						<?php // echo $form->textFieldRow($model,'is_banned',array('class'=>'span5')); 
							echo $form->dropDownListRow($model,'is_banned',array('0'=>'Not Banned','1'=>'Banned'),array('class'=>'span5')); 	
						?>
					</div>
					<div class="col-md-6">
						<?php echo $form->textAreaRow($model,'password_hash',array('rows'=>1, 'cols'=>50, 'class'=>'span8')); ?>
						<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span5','maxlength'=>100)); ?>
						<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>20)); ?>
						<?php echo $form->textFieldRow($model,'points_balance',array('class'=>'span5')); ?>
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
