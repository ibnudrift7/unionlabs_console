<?php
$this->breadcrumbs=array(
	'Member Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MemberList','url'=>array('index')),
	array('label'=>'Add MemberList','url'=>array('create')),
);
?>

<h1>Manage Member Lists</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'member-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
		'password',
		'phone',
		/*
		'address',
		'gender',
		'created_at',
		'is_active',
		'is_verified',
		'deleted_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
