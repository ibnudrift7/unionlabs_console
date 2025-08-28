<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'company',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'person_name',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'telpon',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'phone_wa',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'province_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'city_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'deleted_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sorts',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'company_id',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
