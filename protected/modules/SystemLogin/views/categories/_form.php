<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-categories-form',
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
			Data ProductCategories		</h5>
		<div class="wrapped">
							<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

							<?php 
							// echo $form->textFieldRow($model,'parent_id',array('class'=>'span5','maxlength'=>20)); 
							echo $form->dropDownListRow($model, 'parent_id', CHtml::listData(ProductCategories::model()->findAll('parent_id = 0 AND deleted_at IS NULL'), 'id', 'name'), array('prompt' => 'Select Parent Category'));
							?>

							<?php // echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

							<?php // echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

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
