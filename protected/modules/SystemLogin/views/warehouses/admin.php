<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Warehouses','url'=>array('index')),
	array('label'=>'Add Warehouses','url'=>array('create')),
);
?>

<h1>Manage Warehouses</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'warehouses-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'location',
		'created_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
