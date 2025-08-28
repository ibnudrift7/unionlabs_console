<?php
$this->breadcrumbs=array(
	'Member Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MemberList', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MemberList', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MemberList', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MemberList', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MemberList #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
		'password',
		'phone',
		'address',
		'gender',
		'created_at',
		'is_active',
		'is_verified',
		'deleted_at',
	),
)); ?>
