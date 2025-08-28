<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Products','url'=>array('index')),
	array('label'=>'Add Products','url'=>array('create')),
);
?>

<h1>Manage Products</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sku_code',
		'name',
		'slug',
		'description',
		'category_id',
		/*
		'brand_id',
		'base_price',
		'sale_price',
		'stock_quantity',
		'stock_alert_threshold',
		'is_active',
		'status',
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
