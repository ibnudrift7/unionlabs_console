<?php
$this->breadcrumbs=array(
	'Post Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PostComments', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PostComments', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit PostComments', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PostComments', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PostComments #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'post_id',
		'parent_comment_id',
		'member_id',
		'content',
		'created_at',
		'deleted_at',
	),
)); ?>
