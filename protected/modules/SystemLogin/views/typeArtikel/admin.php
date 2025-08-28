<?php
$this->breadcrumbs=array(
	'Type Artikels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TypeArtikel','url'=>array('index')),
	array('label'=>'Add TypeArtikel','url'=>array('create')),
);
?>

<h1>Manage Type Artikels</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'type-artikel-grid',
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
