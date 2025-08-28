<?php
$this->breadcrumbs=array(
	'Type Artikels'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TypeArtikel', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add TypeArtikel', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit TypeArtikel', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TypeArtikel', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View TypeArtikel #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image_cover',
		'created_at',
	),
)); ?>
