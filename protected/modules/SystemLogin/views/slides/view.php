<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Slides', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Slides', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Slides', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Slides', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Slides #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'titles',
		'contents',
		'sorts',
		'created_at',
		'deleted_at',
	),
)); ?>
