<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'type-artikel-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'clientOptions' => array(
		'validateOnSubmit' => false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			Data Type Artikel </h5>
		<div class="wrapped">
			<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 100)); ?>

			<?php echo $form->fileFieldRow($model, 'image', array(
				'hint' => '<b>Note:</b> Image size is 1600 x 400px. Larger image will be automatically cropped.',
				'style' => "width: 100%"
			)); ?>
			<?php if ($model->scenario == 'update'): ?>
				<div class="control-group">
					<label for="" class="control-label col-sm-3">&nbsp;</label>
					<div class="controls col-sm-9">
						<img style="width: 100%; max-width: 150px;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(800, 522, '/images/type_artikel/' . $model->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
					</div>
				</div>
			<?php endif; ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType' => 'submit',
				'type' => 'primary',
				'label' => $model->isNewRecord ? 'Add' : 'Save',
				'htmlOptions' => array('class' => 'btn btn-sm btn-primary'),
			)); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'submit',
				// 'type'=>'info',
				'url' => CHtml::normalizeUrl(array('index')),
				'label' => 'Batal',
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