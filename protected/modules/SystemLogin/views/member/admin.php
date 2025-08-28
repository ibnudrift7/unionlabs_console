<?php
$this->breadcrumbs=array(
	'User Members'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserMembers','url'=>array('index')),
	array('label'=>'Add UserMembers','url'=>array('create')),
);
?>

<h1>Manage User Members</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-members-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
		'password_hash',
		'full_name',
		'phone',
		'date_of_birth',
		/*
		'level_id',
		'points_balance',
		'is_active',
		'is_banned',
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
