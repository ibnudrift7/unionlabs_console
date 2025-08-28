<?php
$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Wishlists','url'=>array('index')),
	array('label'=>'Add Wishlists','url'=>array('create')),
);
?>

<h1>Manage Wishlists</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'wishlists-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'product_id',
		'created_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
