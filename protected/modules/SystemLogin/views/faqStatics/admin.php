<?php
$this->breadcrumbs=array(
	'Faq Statics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FaqStatics','url'=>array('index')),
	array('label'=>'Add FaqStatics','url'=>array('create')),
);
?>

<h1>Manage Faq Statics</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'faq-statics-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'proyek_id',
		'topic_id',
		'questions',
		'answers',
		/*
		'deleted_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
