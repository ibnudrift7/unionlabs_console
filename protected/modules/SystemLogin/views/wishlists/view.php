<?php
$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Wishlists', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Wishlists', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Wishlists', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Wishlists', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Wishlists #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'product_id',
		'created_at',
	),
)); ?>
