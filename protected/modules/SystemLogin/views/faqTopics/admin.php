<?php
$this->breadcrumbs=array(
	'Faq Topics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FaqTopics','url'=>array('index')),
	array('label'=>'Add FaqTopics','url'=>array('create')),
);
?>

<h1>Manage Faq Topics</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'faq-topics-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
