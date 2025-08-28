<?php
$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductCategories','url'=>array('index')),
	array('label'=>'Add ProductCategories','url'=>array('create')),
);
?>

<h1>Manage Product Categories</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'product-categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'parent_id',
		'created_at',
		'updated_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
