<?php
$this->breadcrumbs=array(
	'Master Couriers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterCouriers','url'=>array('index')),
	array('label'=>'Add MasterCouriers','url'=>array('create')),
);
?>

<h1>Manage Master Couriers</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'master-couriers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'code',
		'support_tracking',
		'api_endpoint',
		'created_at',
		/*
		'updated_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
