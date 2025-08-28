<?php
$this->breadcrumbs=array(
	'Mcustomers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MCustomer', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MCustomer', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MCustomer', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MCustomer', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MCustomer #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company',
		'person_name',
		'telpon',
		'phone_wa',
		'province_id',
		'city_id',
		'deleted_at',
		'sorts',
		'company_id',
	),
)); ?>
