<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mcustomer-form',
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
			Data Customer		</h5>
			<div class="wrapped d-flex flex-column flex-md-row">
				<div class="itn flex-fill w-50  me-md-3 ">
					<?php echo $form->textFieldRow($model,'company',array('class'=>'span5','maxlength'=>225)); ?>

					<?php echo $form->textFieldRow($model,'person_name',array('class'=>'span5','maxlength'=>225)); ?>

					<?php echo $form->textFieldRow($model,'telpon',array('class'=>'span5','maxlength'=>50)); ?>

					
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
				<div class="itn flex-fill w-50  me-md-3 ">
					<?php echo $form->textFieldRow($model,'phone_wa',array('class'=>'span5','maxlength'=>50)); ?>
					<?php
					//echo $form->textFieldRow($model, 'province_id', array('class' => 'span5')); 
					if ($model->city_id && $model->scenario == 'update') {
						$model->province_id = $model->city->province_id;
					}

					// provinces
					echo $form->dropDownListRow($model, 'province_id', $this->province_list, array('class' => 'span5 locProvinsi', 'empty' => 'Pilih Provinsi'));
					?>

					<?php
					echo $form->dropDownListRow($model, 'city_id', [], array('class' => 'span5 locCity')); ?>

					<?php echo $form->textFieldRow($model,'sorts',array('class'=>'span5')); ?>
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
	jQuery(document).ready(function($) {
		$('.locProvinsi').change(function() {
			console.log('change province');
			var province_id = $(this).val();
			getCity(province_id);
		});

		<?php
		if ($model->city_id && $model->scenario == 'update') {
			echo "getCity(" . $model->city->province_id . ");";
		?>
			setTimeout(function() {
				$('.locCity').val(<?php echo $model->city_id; ?>);
			}, 500);
		<?php
		}
		?>

		function getCity(prov_id) {
			var province_id = prov_id;
			$.ajax({
				type: 'POST',
				url: '<?php echo CHtml::normalizeUrl(array('site/getCity')); ?>',
				data: {
					province_id: province_id
				},
				success: function(data) {
					var options = JSON.parse(data);
					var select = $('.locCity');
					select.empty();
					select.append('<option value="">Pilih Kota</option>');
					$.each(options, function(key, value) {
						select.append('<option value=' + key + '>' + value + '</option>');
					});

				}
			});
		}
	});
</script>