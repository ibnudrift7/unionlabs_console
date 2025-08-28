<?php
$this->breadcrumbs=array(
	'Rekening Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RekeningList', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add RekeningList', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit RekeningList', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete RekeningList', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View RekeningList #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bank_name',
		'bank_account',
		'bank_number',
		'created_at',
	),
)); ?>
