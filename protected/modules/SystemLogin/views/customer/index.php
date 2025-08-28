<?php
$this->breadcrumbs=array(
	'customers',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Customer',
'subtitle'=>'Data Customer',
);

$this->menu=array(
array('label'=>'Add Customer', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
'alerts'=>array('success'),
)); ?>

<?php endif; ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			<?=
$this->pageHeader['subtitle'] ?>
		</h5>
		<div class="wrapped datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

			<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'customer-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		'company',
		'person_name',
		'telpon',
		'phone_wa',
		// 'city_id',
		[
			'header' => 'City',
			'type' => 'raw',
			'value' => function($data) {
				if ($data->city_id) {
					return City::model()->findByPk($data->city_id)->city_name;
				}
				return '';
			},
		],
			array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
			),
			),
			)); ?>

		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function($) {
		// $('.delete').deleteAjax({})
	})
</script>