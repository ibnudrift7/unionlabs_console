<?php
$this->breadcrumbs=array(
	'Mcustomers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MCustomer','url'=>array('index')),
	array('label'=>'Add MCustomer','url'=>array('create')),
);
?>

<h1>Manage Mcustomers</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mcustomer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'company',
		'person_name',
		'telpon',
		'phone_wa',
		'province_id',
		/*
		'city_id',
		'deleted_at',
		'sorts',
		'company_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
