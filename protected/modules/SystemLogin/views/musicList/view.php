<?php
$this->breadcrumbs=array(
	'Music Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MusicList', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MusicList', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MusicList', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MusicList', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MusicList #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'album_id',
		'names',
		'image',
		'contents',
		'duration',
		'source_music',
		'image_lyric',
		'created_at',
		'updated_at',
		'deleted_at',
	),
)); ?>
