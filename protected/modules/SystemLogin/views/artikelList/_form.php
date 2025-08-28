<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'artikel-list-form',
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
			Data Artikel List </h5>
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
		<div class="wrapped">
			<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

			<?php //echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>255)); 
			?>

			<?php // echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>255)); 
			?>

			<?php echo $form->textAreaRow($model, 'content', array('rows' => 2, 'cols' => 50, 'class' => 'span8 redactor')); ?>

			<?php echo $form->textFieldRow($model, 'dates', array('class' => 'span5 datepicker')); ?>
			<?php echo $form->textFieldRow($model, 'waktu_acara', array('class' => 'span5', 'placeholder' => 'Waktu Acara, Isikan jika data event.')); ?>

			<?php // echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); 
			?>

			<?php // echo $form->textFieldRow($model,'deleted_at',array('class'=>'span5')); 
			?>

			<?php
			$list = CHtml::listData(TypeArtikel::model()->findAll(), 'id', 'name');
			echo $form->dropDownListRow($model, 'type_artikel_id', $list, array('class' => 'span5', 'empty' => '-- Pilih Jenis Artikel --'));
			// echo $form->textFieldRow($model,'type_artikel_id',array('class'=>'span5'));
			?>

			<?php
			// echo $form->textFieldRow($model,'articles_category_id',array('class'=>'span5'));
			$list = CHtml::listData(ArticlesCategory::model()->findAll(), 'id', 'name');
			echo $form->dropDownListRow($model, 'articles_category_id', $list, array('class' => 'span5', 'empty' => '-- Pilih Kategori Artikel --'));
			?>

			<?php echo $form->fileFieldRow($model, 'image', array(
				'hint' => '<b>Note:</b> Image size is 1000 x 800px. Larger image will be automatically cropped.',
				'style' => "width: 100%"
			)); ?>
			<?php if ($model->scenario == 'update'): ?>
				<div class="control-group">
					<label for="" class="control-label col-sm-3">&nbsp;</label>
					<div class="controls col-sm-9">
						<img style="width: 100%; max-width: 150px;" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(1000, 800, '/images/blog/' . $model->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" />
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