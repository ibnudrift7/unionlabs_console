<?php
$this->breadcrumbs=array(
	'Post Comments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PostComments','url'=>array('index')),
	array('label'=>'Add PostComments','url'=>array('create')),
);
?>

<h1>Manage Post Comments</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'post-comments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'post_id',
		'parent_comment_id',
		'member_id',
		'content',
		'created_at',
		/*
		'deleted_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
