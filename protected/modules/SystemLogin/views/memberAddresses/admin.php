<?php
$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserAddresses','url'=>array('index')),
	array('label'=>'Add UserAddresses','url'=>array('create')),
);
?>

<h1>Manage User Addresses</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-addresses-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'recipient_name',
		'phone',
		'address_line',
		'city',
		/*
		'province',
		'postal_code',
		'is_default',
		'created_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
