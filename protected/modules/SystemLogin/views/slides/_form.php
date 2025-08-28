<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'slides-form',
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
			Data Slides </h5>
		<div class="wrapped">

			<?php echo $form->textFieldRow($model, 'titles', array('class' => 'span5', 'maxlength' => 225)); ?>

			<?php echo $form->textAreaRow($model, 'contents', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

			<?php echo $form->textFieldRow($model, 'sorts', array('class' => 'span5')); ?>

			<?php echo $form->fileFieldRow($model, 'image', array(
				'hint' => '<b>Note:</b> Image size is 1670px X 735px. Larger image will be automatically cropped.',
				'style' => "width: 100%"
			)); ?>
			<?php if ($model->scenario == 'update'): ?>
				<div class="control-group">
					<label for="" class="control-label col-sm-3">&nbsp;</label>
					<div class="controls col-sm-9">
						<img style="width: 100%; max-width: 200px; object-fit: cover;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(800, 522, '/images/slide/' . $model->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php echo $form->fileFieldRow($model, 'image2', array(
				'hint' => '<b>Note:</b> Image size is 1280, 1279px. Larger image will be automatically cropped.',
				'style' => "width: 100%"
			)); ?>
			<?php if ($model->scenario == 'update'): ?>
				<div class="control-group">
					<label for="" class="control-label col-sm-3">&nbsp;</label>
					<div class="controls col-sm-9">
						<img style="width: 100%; max-width: 200px; object-fit: cover;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(800, 522, '/images/slide/' . $model->image2, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
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