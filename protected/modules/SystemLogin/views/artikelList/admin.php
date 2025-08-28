<?php
$this->breadcrumbs=array(
	'Artikel Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ArtikelList','url'=>array('index')),
	array('label'=>'Add ArtikelList','url'=>array('create')),
);
?>

<h1>Manage Artikel Lists</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'artikel-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'image',
		'slug',
		'content',
		'dates',
		/*
		'created_at',
		'deleted_at',
		'type_artikel_id',
		'articles_category_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
