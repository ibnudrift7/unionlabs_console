<?php
$this->breadcrumbs=array(
	'User Members'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserMembers', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add UserMembers', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit UserMembers', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete UserMembers', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View UserMembers #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'password_hash',
		'full_name',
		'phone',
		'date_of_birth',
		'level_id',
		'points_balance',
		'is_active',
		'is_banned',
		'created_at',
		'updated_at',
	),
)); ?>
