<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'date_of_birth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'level_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'points_balance',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'is_banned',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
