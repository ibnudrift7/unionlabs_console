<?php
$this->breadcrumbs=array(
	'Media List Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MediaListCategory', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MediaListCategory', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MediaListCategory', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MediaListCategory', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MediaListCategory #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'sorts',
		'created_at',
		'deleted_at',
	),
)); ?>
