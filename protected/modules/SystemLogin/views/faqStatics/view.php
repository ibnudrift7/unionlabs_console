<?php
$this->breadcrumbs=array(
	'Faq Statics'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FaqStatics', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add FaqStatics', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit FaqStatics', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete FaqStatics', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View FaqStatics #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'proyek_id',
		'topic_id',
		'questions',
		'answers',
		'deleted_at',
	),
)); ?>
