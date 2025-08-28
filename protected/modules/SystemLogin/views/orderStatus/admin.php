<?php
$this->breadcrumbs=array(
	'Master Order Statuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterOrderStatus','url'=>array('index')),
	array('label'=>'Add MasterOrderStatus','url'=>array('create')),
);
?>

<h1>Manage Master Order Statuses</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-order-status-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'status_name',
		'sort_order',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
