<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Warehouses', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Warehouses', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Warehouses', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Warehouses', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Warehouses #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'location',
		'created_at',
	),
)); ?>
