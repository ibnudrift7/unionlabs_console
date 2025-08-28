<?php
$this->breadcrumbs=array(
	'Post Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PostItems','url'=>array('index')),
	array('label'=>'Add PostItems','url'=>array('create')),
);
?>

<h1>Manage Post Items</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'post-items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'member_id',
		'title',
		'image',
		'slug',
		'content',
		/*
		'dates',
		'created_at',
		'updated_at',
		'deleted_at',
		'type_post_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
