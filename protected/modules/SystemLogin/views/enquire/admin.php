<?php
$this->breadcrumbs=array(
	'Enquire Forms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EnquireForm','url'=>array('index')),
	array('label'=>'Add EnquireForm','url'=>array('create')),
);
?>

<h1>Manage Enquire Forms</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'enquire-form-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'email',
		'message',
		'phones',
		'created_at',
		/*
		'ip_address',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
