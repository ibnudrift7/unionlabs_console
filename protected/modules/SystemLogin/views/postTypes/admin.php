<?php
$this->breadcrumbs=array(
	'Post Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PostTypes','url'=>array('index')),
	array('label'=>'Add PostTypes','url'=>array('create')),
);
?>

<h1>Manage Post Types</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'post-types-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'deleted_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
