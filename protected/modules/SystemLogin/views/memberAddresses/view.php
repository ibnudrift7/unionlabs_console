<?php
$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserAddresses', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add UserAddresses', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit UserAddresses', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete UserAddresses', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View UserAddresses #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'recipient_name',
		'phone',
		'address_line',
		'city',
		'province',
		'postal_code',
		'is_default',
		'created_at',
	),
)); ?>
