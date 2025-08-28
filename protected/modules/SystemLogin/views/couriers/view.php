<?php
$this->breadcrumbs=array(
	'Master Couriers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MasterCouriers', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MasterCouriers', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MasterCouriers', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MasterCouriers', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MasterCouriers #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'support_tracking',
		'api_endpoint',
		'created_at',
		'updated_at',
	),
)); ?>
