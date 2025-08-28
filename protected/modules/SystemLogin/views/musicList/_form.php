<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'music-list-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
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
			Data Music		</h5>
		<div class="row">
			<div class="col-md-6">
				<?php 
				// echo $form->textFieldRow($model,'album_id',array('class'=>'span5','maxlength'=>20)); 
				$crt2 = new CDbCriteria;
				$crt2->addCondition('deleted_at IS NULL');
				$crt2->addCondition('type_media_id = 2');
				echo $form->dropDownListRow($model, 'album_id', CHtml::listData(MediaListItems::model()->findAll($crt2), 'id', 'title'), array('prompt' => 'Select Album', 'required' => true));
				?>
				<?php echo $form->textFieldRow($model,'names',array('class'=>'span5','maxlength'=>225)); ?>
				
				<?php 
				// source_music upload allow mp3, mp4
				echo $form->fileFieldRow($model, 'source_music', array(
						'hint' => '<b>Note:</b> File size max 30MB, allow mp3',
						'style' => "width: 100%",
						'type' => 'file',
						'allowEmpty' => true,
					));
				?>

				<?php echo $form->fileFieldRow($model, 'image', array(
						'hint' => '<b>Note:</b> Image size is 900 x 550px. Larger image will be automatically cropped.',
						'style' => "width: 100%"
					)); ?>
					<?php if ($model->scenario == 'update'): ?>
						<div class="control-group">
							<label for="" class="control-label col-sm-3">&nbsp;</label>
							<div class="controls col-sm-9">
								<img style="width: 100%; max-width: 150px;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(900, 550, '/images/music/' . $model->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
							</div>
						</div>
					<?php endif; ?>

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
			<div class="col-md-6">
			<?php echo $form->textAreaRow($model,'contents',array('rows'=>6, 'cols'=>50, 'class'=>'span8 redactor')); ?>
			
			<?php echo $form->textFieldRow($model,'duration',array('class'=>'span5','maxlength'=>50)); ?>
				
				<?php echo $form->fileFieldRow($model, 'image_lyric', array(
						'hint' => '<b>Note:</b> Image size is 1500px. Larger image will be automatically cropped.',
						'style' => "width: 100%"
					)); ?>
					<?php if ($model->scenario == 'update'): ?>
						<div class="control-group">
							<label for="" class="control-label col-sm-3">&nbsp;</label>
							<div class="controls col-sm-9">
								<img style="width: 100%; max-width: 150px;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(900, 550, '/images/music/' . $model->image_lyric, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
							</div>
						</div>
					<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="alert alert-primary fs-6 fw-light p-2" role="alert">
	<button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>
	<strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
