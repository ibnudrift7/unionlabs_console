<?php
$this->breadcrumbs=array(
	'Master Brands'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterBrands','url'=>array('index')),
	array('label'=>'Add MasterBrands','url'=>array('create')),
);
?>

<h1>Manage Master Brands</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-brands-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'website',
		'logo',
		'created_at',
		/*
		'updated_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
