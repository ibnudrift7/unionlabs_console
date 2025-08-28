<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Slides','url'=>array('index')),
	array('label'=>'Add Slides','url'=>array('create')),
);
?>

<h1>Manage Slides</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'slides-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'image',
		'titles',
		'contents',
		'sorts',
		'created_at',
		/*
		'deleted_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
