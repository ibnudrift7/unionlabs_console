<?php
$this->breadcrumbs=array(
	'Rekening Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RekeningList','url'=>array('index')),
	array('label'=>'Add RekeningList','url'=>array('create')),
);
?>

<h1>Manage Rekening Lists</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'rekening-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'bank_name',
		'bank_account',
		'bank_number',
		'created_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
