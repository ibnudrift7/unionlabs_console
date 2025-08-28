<?php

/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>\n"; ?>

<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			Data <?php echo $this->modelClass; ?>
		</h5>
		<div class="wrapped">
			<?php
			foreach ($this->tableSchema->columns as $column) {
				if ($column->autoIncrement)
					continue;
			?>
				<?php echo "<?php echo " . $this->generateActiveRow($this->modelClass, $column) . "; ?>\n"; ?>

			<?php
			}
			?>
			<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Add' : 'Save',
			'htmlOptions' => array('class' => 'btn btn-sm btn-primary'),
		)); ?>\n"; ?>
			<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
			'htmlOptions' => array('class' => 'btn btn-sm btn-info'),
		)); ?>\n"; ?>
		</div>
	</div>
</div>
<div class="alert alert-primary fs-6 fw-light p-2" role="alert">
	<button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>
	<strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>