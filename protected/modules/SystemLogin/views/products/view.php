<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Products', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Products', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Products', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Products', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Products #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sku_code',
		'name',
		'slug',
		'description',
		'category_id',
		'brand_id',
		'base_price',
		'sale_price',
		'stock_quantity',
		'stock_alert_threshold',
		'is_active',
		'status',
		'created_at',
		'updated_at',
	),
)); ?>
