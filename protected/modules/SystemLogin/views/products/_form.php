<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'products-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			Data Products		</h5>
		<div class="wrapped">
			<div class="row">
				<div class="col-md-6">
					<?php echo $form->textFieldRow($model,'sku_code',array('class'=>'span5','maxlength'=>100)); ?>

					<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>150)); ?>

					<?php // echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>150)); ?>

					<?php echo $form->textAreaRow($model,'description',array('rows'=>2, 'cols'=>50, 'class'=>'span8')); ?>

					<?php echo $form->textFieldRow($model,'base_price',array('class'=>'span5','maxlength'=>12)); ?>

					<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>8)); ?>
				</div>
				<div class="col-md-6">
					<?php echo $form->dropDownListRow($model,'category_id',CHtml::listData(ProductCategories::model()->findAll('deleted_at IS NULL'), 'id', 'name'), array('class'=>'span5','prompt'=>'Select Category')); ?>

					<?php echo $form->dropDownListRow($model,'brand_id',CHtml::listData(MasterBrands::model()->findAll('deleted_at IS NULL'), 'id', 'name'), array('class'=>'span5','prompt'=>'Select Brand')); ?>

					<?php echo $form->textFieldRow($model,'sale_price',array('class'=>'span5','maxlength'=>12)); ?>

					<?php echo $form->textFieldRow($model,'stock_quantity',array('class'=>'span5')); ?>

					<?php echo $form->textFieldRow($model,'stock_alert_threshold',array('class'=>'span5')); ?>

					<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>

				</div>
			</div>

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
	</div>
</div>
<div class="alert alert-primary fs-6 fw-light p-2" role="alert">
	<button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>
	<strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
