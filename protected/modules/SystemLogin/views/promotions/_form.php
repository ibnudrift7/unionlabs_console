<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'promotions-form',
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
			Data Promotions		</h5>
		<div class="wrapped">
			<div class="row">
				<div class="col-6">
					<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

					<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>50)); ?>
					<?php echo $form->textAreaRow($model,'description',array('rows'=>2, 'cols'=>50, 'class'=>'span8')); ?>
					<?php echo $form->textFieldRow($model,'discount_value',array('class'=>'span5','maxlength'=>12)); ?>
					<?php echo $form->dropDownListRow($model,'is_active',array(
						'1'=>'Active',
						'0'=>'Non Active',
					),array('class'=>'span5')); ?>
				</div>
				<div class="col-6">
					<?php echo $form->textFieldRow($model,'discount_type',array('class'=>'span5','maxlength'=>7)); ?>
					
					<?php echo $form->textFieldRow($model,'min_purchase',array('class'=>'span5','maxlength'=>12)); ?>
					
					<?php echo $form->textFieldRow($model,'start_date',array('class'=>'span5')); ?>

					<?php echo $form->textFieldRow($model,'end_date',array('class'=>'span5')); ?>

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
