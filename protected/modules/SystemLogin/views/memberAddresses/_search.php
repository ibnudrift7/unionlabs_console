<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'recipient_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textAreaRow($model,'address_line',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'province',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'postal_code',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'is_default',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
