<?php
$this->breadcrumbs=array(
	'Articles Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ArticlesCategory','url'=>array('index')),
	array('label'=>'Add ArticlesCategory','url'=>array('create')),
);
?>

<h1>Manage Articles Categories</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'articles-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'sorts',
		'created_at',
		'deleted_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
