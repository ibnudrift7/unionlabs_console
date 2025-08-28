<?php
$this->breadcrumbs=array(
	'Post Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PostItems', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PostItems', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit PostItems', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PostItems', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PostItems #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'member_id',
		'title',
		'image',
		'slug',
		'content',
		'dates',
		'created_at',
		'updated_at',
		'deleted_at',
		'type_post_id',
	),
)); ?>
