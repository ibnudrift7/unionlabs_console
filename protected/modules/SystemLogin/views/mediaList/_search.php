<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'grid grid-cols-5 gap-4 customs_form_filter'),
)); ?>
	<div class="itm">
		<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255, 'placeholder' => 'Search Title')); ?>
	</div>
	<div class="itm">
		<?php echo $form->textFieldRow($model,'date_event',array('class'=>'span5', 'placeholder' => 'Search Date Event', 'readonly' => true)); ?>
	</div>
	<div class="itm">
		<?php echo $form->dropDownListRow($model, 'type_media_id', CHtml::listData(MediaTypes::model()->findAll(), 'id', 'name'), array('prompt' => 'Select Type')); ?>
	</div>
	<div class="itm">
		<?php echo $form->dropDownListRow($model, 'category_id', CHtml::listData(MediaListCategory::model()->findAll(), 'id', 'name'), array('prompt' => 'Select Category')); ?>
	</div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type' => 'primary',
			'label' => 'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
