<?php
$this->breadcrumbs=array(
	'Media Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MediaTypes','url'=>array('index')),
	array('label'=>'Add MediaTypes','url'=>array('create')),
);
?>

<h1>Manage Media Types</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'media-types-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'image_cover',
		'created_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
