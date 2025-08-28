<?php
$this->breadcrumbs=array(
	'User Member Level Masters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserMemberLevelMaster','url'=>array('index')),
	array('label'=>'Add UserMemberLevelMaster','url'=>array('create')),
);
?>

<h1>Manage User Member Level Masters</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-member-level-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'min_points',
		'discount_percentage',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
