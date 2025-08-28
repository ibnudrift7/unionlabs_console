<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'media-list-items-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'clientOptions' => array(
		'validateOnSubmit' => false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->errorSummary($model); ?>
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
	'selector' => '.redactor',
	'options' => array(
		'imageUpload' => $this->createUrl('admin/setting/uploadimage', array('type' => 'image')),
		'clipboardUploadUrl' => $this->createUrl('admin/setting/uploadimage', array('type' => 'clip')),
	),
	'plugins' => array(
		'clips' => array(),
	),
)); ?>
<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			Data Media List </h5>
		<div class="row">
			<div class="col-md-7">
				<div class="wrapped">
					<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
					<?php echo $form->textAreaRow($model, 'content', array('rows' => 5, 'cols' => 50, 'class' => 'span8 redactor')); ?>

					<?php echo $form->fileFieldRow($model, 'image', array(
						'hint' => '<b>Note:</b> Image size is 1600 x 400px. Larger image will be automatically cropped.',
						'style' => "width: 100%"
					)); ?>
					<?php if ($model->scenario == 'update'): ?>
						<div class="control-group">
							<label for="" class="control-label col-sm-3">&nbsp;</label>
							<div class="controls col-sm-9">
								<img style="width: 100%; max-width: 150px;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(800, 522, '/images/media/' . $model->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
							</div>
						</div>
					<?php endif; ?>
					<?php // echo $form->textFieldRow($model, 'slug', array('class' => 'span5', 'readonly' => true)); 
					?>
				</div>
				<div class="form-actions mt-3">
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
			<div class="col-md-5">
				<div class="wrapped">
					<?php echo $form->textFieldRow($model, 'video_url', array('class' => 'span5', 'maxlength' => 255)); ?>
					<?php echo $form->textFieldRow($model, 'date_event', array('class' => 'span5 datepicker', 'maxlength' => 255)); ?>
					<?php
					// echo $form->textFieldRow($model,'type_media_id',array('class'=>'span5')); 
					echo $form->dropDownListRow($model, 'type_media_id', CHtml::listData(MediaTypes::model()->findAll(), 'id', 'name'), array('prompt' => 'Select Type'));
					$crt2 = new CDbCriteria;
					$crt2->addCondition('deleted_at IS NULL');
					echo $form->dropDownListRow($model, 'category_id', CHtml::listData(MediaListCategory::model()->findAll($crt2), 'id', 'name'), array('prompt' => 'Select Category'));
					?>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="alert alert-primary fs-6 fw-light p-2" role="alert">
	<button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>
	<strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
	if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

	RedactorPlugins.advanced = {
		init: function() {
			alert(1);
		}
	}
	jQuery(function($) {
		$('.multilang').multiLang({});
	})
</script>