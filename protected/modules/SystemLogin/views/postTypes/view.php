<?php
$this->breadcrumbs=array(
	'Post Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List PostTypes', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PostTypes', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit PostTypes', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PostTypes', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PostTypes #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'deleted_at',
	),
)); ?>
