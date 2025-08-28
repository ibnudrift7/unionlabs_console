<?php
$this->breadcrumbs=array(
	'Enquire Forms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EnquireForm', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add EnquireForm', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit EnquireForm', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete EnquireForm', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View EnquireForm #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'message',
		'phones',
		'created_at',
		'ip_address',
	),
)); ?>
