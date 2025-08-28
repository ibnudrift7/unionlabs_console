<?php
$this->breadcrumbs=array(
	'User Member Level Masters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UserMemberLevelMaster', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add UserMemberLevelMaster', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit UserMemberLevelMaster', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete UserMemberLevelMaster', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View UserMemberLevelMaster #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'min_points',
		'discount_percentage',
	),
)); ?>
