<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions' => array('class' => 'grid grid-cols-5 gap-4 customs_form_filter'),
)); ?>
<div class="itm">
	<?php 
	// album_id > MediaListItems
	$criteria2 = new CDbCriteria;
	$criteria2->addCondition('deleted_at IS NULL');
	echo $form->dropDownListRow($model, 'album_id', CHtml::listData(MediaListItems::model()->findAll($criteria2), 'id', 'title'), array('prompt' => 'Select Album'));
	?>
</div>
<div class="itm">
	<?php echo $form->textFieldRow($model,'names',array('class'=>'span5','maxlength'=>225, 'placeholder' => 'Search Name')); ?>
</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
</div>

<?php $this->endWidget(); ?>
