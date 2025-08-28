<?php
$this->breadcrumbs=array(
	'Media List Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MediaListCategory','url'=>array('index')),
	array('label'=>'Add MediaListCategory','url'=>array('create')),
);
?>

<h1>Manage Media List Categories</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'media-list-category-grid',
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
