<?php
$this->breadcrumbs=array(
	'Artikel Lists'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ArtikelList', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add ArtikelList', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit ArtikelList', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ArtikelList', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View ArtikelList #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'image',
		'slug',
		'content',
		'dates',
		'created_at',
		'deleted_at',
		'type_artikel_id',
		'articles_category_id',
	),
)); ?>
